<?php
require_once 'auth.php';

if (isset($_SESSION['email'], $_SESSION['role'])) {
    redirect_to_role_dashboard();
}

$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'dbconfig.php';

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $loginError = 'Your session expired. Please try again.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
        $loginError = 'Enter a valid email address and password.';
    } else {
        try {
            $statement = $conn->prepare('SELECT name, password, role, is_active FROM users WHERE email = ? LIMIT 1');
            $statement->bind_param('s', $email);
            $statement->execute();
            $statement->bind_result($name, $storedPassword, $role, $isActive);
            $userFound = $statement->fetch();
            $statement->close();

            $allowedRoles = ['admin', 'customer', 'staff'];
            $passwordIsValid = false;
            if ($userFound && (int) $isActive === 1 && is_string($storedPassword) && in_array($role, $allowedRoles, true)) {
                $passwordIsValid = password_verify($password, $storedPassword);
                $legacyPassword = sha1($password);

                if (!$passwordIsValid && hash_equals($storedPassword, $legacyPassword)) {
                    $passwordIsValid = true;
                    $newPasswordHash = password_hash($password, PASSWORD_DEFAULT);
                    $update = $conn->prepare('UPDATE users SET password = ? WHERE email = ?');
                    $update->bind_param('ss', $newPasswordHash, $email);
                    $update->execute();
                    $update->close();
                }
            }

            if ($passwordIsValid) {
                session_regenerate_id(true);
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['role'] = $role;
                redirect_to_role_dashboard();
            }

            $loginError = 'The email or password is incorrect.';
        } catch (mysqli_sql_exception $exception) {
            error_log('Login database error: ' . $exception->getMessage());
            $loginError = 'Unable to sign in right now. Please try again later.';
        }
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign in | Cleaning Service</title>
  <?php include 'partials/home_styles.php'; ?>
</head>
<body>
  <main class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-5">
        <div class="card border-0 shadow">
          <div class="card-body p-4 p-md-5">
            <h1 class="h3 mb-2">Welcome back</h1>
            <p class="text-body-secondary mb-4">Sign in to your cleaning service account.</p>

            <?php if ($loginError !== ''): ?>
              <div class="alert alert-danger" role="alert"><?php echo e($loginError); ?></div>
            <?php endif; ?>

            <form method="post" action="index.php">
              <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autocomplete="email"
                       value="<?php echo e($_POST['email'] ?? ''); ?>">
              </div>
              <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
              </div>
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </form>

            <p class="mb-0 mt-4 text-center">New customer? <a href="register.php">Create an account</a></p>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
