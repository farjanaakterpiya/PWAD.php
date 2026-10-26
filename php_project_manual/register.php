<?php
require_once 'auth.php';

if (isset($_SESSION['role'])) {
    redirect_to_role_dashboard();
}

$registrationError = '';
$registrationComplete = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        $registrationError = 'Your session expired. Please try again.';
    } elseif ($name === '' || strlen($name) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $registrationError = 'Enter your name and a valid email address.';
    } elseif ($phone === '' || strlen($phone) > 20) {
        $registrationError = 'Enter a phone number no longer than 20 characters.';
    } elseif (strlen($password) < 8) {
        $registrationError = 'Your password must be at least 8 characters long.';
    } elseif ($password !== $confirmPassword) {
        $registrationError = 'The passwords do not match.';
    } else {
        require_once 'dbconfig.php';

        try {
            $check = $conn->prepare('SELECT email FROM users WHERE email = ? LIMIT 1');
            $check->bind_param('s', $email);
            $check->execute();
            $check->store_result();
            $emailExists = $check->num_rows > 0;
            $check->close();

            if ($emailExists) {
                $registrationError = 'An account with that email already exists.';
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $role = 'customer';
                $insert = $conn->prepare('INSERT INTO users (name, email, phone, password, role) VALUES (?, ?, ?, ?, ?)');
                $insert->bind_param('sssss', $name, $email, $phone, $passwordHash, $role);
                $insert->execute();
                $insert->close();
                $registrationComplete = true;
            }
        } catch (mysqli_sql_exception $exception) {
            error_log('Registration database error: ' . $exception->getMessage());
            $registrationError = $exception->getCode() === 1062
                ? 'An account with that email already exists.'
                : 'Unable to create your account right now. Please try again later.';
        }
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create account | Cleaning Service</title>
  <?php include 'partials/home_styles.php'; ?>
</head>
<body>
  <main class="container py-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-5">
        <div class="card border-0 shadow">
          <div class="card-body p-4 p-md-5">
            <h1 class="h3 mb-2">Create a customer account</h1>
            <p class="text-body-secondary mb-4">Staff and administrator accounts are provisioned separately.</p>

            <?php if ($registrationComplete): ?>
              <div class="alert alert-success" role="status">Your account is ready. <a href="index.php">Sign in</a>.</div>
            <?php else: ?>
              <?php if ($registrationError !== ''): ?>
                <div class="alert alert-danger" role="alert"><?php echo e($registrationError); ?></div>
              <?php endif; ?>
              <form method="post" action="register.php">
                <input type="hidden" name="csrf_token" value="<?php echo e(csrf_token()); ?>">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" maxlength="100" required autocomplete="name"
                         value="<?php echo e($_POST['name'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email" required autocomplete="email"
                         value="<?php echo e($_POST['email'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="tel" class="form-control" id="phone" name="phone" maxlength="20" required autocomplete="tel"
                         value="<?php echo e($_POST['phone'] ?? ''); ?>">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" minlength="8" required autocomplete="new-password">
                </div>
                <div class="mb-4">
                  <label for="confirm_password" class="form-label">Confirm password</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="8" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Create account</button>
              </form>
            <?php endif; ?>

            <p class="mb-0 mt-4 text-center">Already registered? <a href="index.php">Sign in</a></p>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
