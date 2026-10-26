<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo e($pageTitle); ?> | Cleaning Service</title>
  <?php include 'partials/home_styles.php'; ?>
</head>
<body>
  <?php include 'partials/header.php'; ?>
  <?php include $sidebarPartial; ?>

  <main class="page-content">
    <div class="mb-4" id="overview">
      <p class="text-body-secondary mb-1">Welcome back, <?php echo e($_SESSION['name']); ?></p>
      <h1 class="h3 mb-0"><?php echo e($pageTitle); ?></h1>
    </div>

    <div class="row g-4">
      <?php foreach ($dashboardSections as $section): ?>
        <div class="col-12 col-xl-6" id="<?php echo e($section['id']); ?>">
          <section class="card h-100 border-0 radius-10">
            <div class="card-body p-4">
              <div class="d-flex align-items-center gap-3 mb-3">
                <span class="widget-icon bg-primary text-white">
                  <span class="material-symbols-outlined"><?php echo e($section['icon']); ?></span>
                </span>
                <h2 class="h5 mb-0"><?php echo e($section['title']); ?></h2>
              </div>
              <p class="text-body-secondary mb-0"><?php echo e($section['description']); ?></p>
            </div>
          </section>
        </div>
      <?php endforeach; ?>

      <div class="col-12" id="profile">
        <section class="card border-0 radius-10">
          <div class="card-body p-4">
            <h2 class="h5 mb-3">Signed-in account</h2>
            <dl class="row mb-0">
              <dt class="col-sm-3">Name</dt>
              <dd class="col-sm-9"><?php echo e($_SESSION['name']); ?></dd>
              <dt class="col-sm-3">Email</dt>
              <dd class="col-sm-9"><?php echo e($_SESSION['email']); ?></dd>
              <dt class="col-sm-3">Account type</dt>
              <dd class="col-sm-9 text-capitalize mb-0"><?php echo e($_SESSION['role']); ?></dd>
            </dl>
          </div>
        </section>
      </div>
    </div>
  </main>

  <div class="overlay btn-toggle-menu"></div>
  <?php include 'partials/dashboard_scripts.php'; ?>
</body>
</html>
