<header class="top-header">
  <nav class="navbar navbar-expand justify-content-between">
    <button type="button" class="btn btn-link btn-toggle-menu p-0" aria-label="Toggle navigation">
      <span class="material-symbols-outlined">menu</span>
    </button>
    <div class="d-flex align-items-center gap-3">
      <span class="d-none d-sm-inline"><?php echo e($_SESSION['name']); ?></span>
      <a class="btn btn-outline-primary btn-sm" href="logout.php">Sign out</a>
    </div>
  </nav>
</header>
