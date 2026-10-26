<aside class="sidebar-wrapper">
  <div class="sidebar-header">
    <div class="logo-icon"><img src="assets/images/logo-icon.png" class="logo-img" alt=""></div>
    <div class="logo-name flex-grow-1"><h5 class="mb-0">Cleaning Service</h5></div>
    <button type="button" class="sidebar-close btn p-0" aria-label="Close sidebar">
      <span class="material-symbols-outlined">close</span>
    </button>
  </div>
  <nav class="sidebar-nav" aria-label="Administrator navigation">
    <ul class="metismenu" id="menu">
      <li><a href="dashboard_admin.php#overview"><span class="material-symbols-outlined">dashboard</span><span class="menu-title">Dashboard</span></a></li>
      <li><a href="dashboard_admin.php#administration"><span class="material-symbols-outlined">admin_panel_settings</span><span class="menu-title">Administration</span></a></li>
      <li><a href="dashboard_admin.php#account"><span class="material-symbols-outlined">account_circle</span><span class="menu-title">Account</span></a></li>
    </ul>
  </nav>
  <div class="sidebar-bottom d-flex align-items-center px-3 gap-3">
    <div class="user-img"><img src="assets/images/avatars/01.png" alt=""></div>
    <div class="user-info">
      <h5 class="mb-0 user-name"><?php echo e($_SESSION['name']); ?></h5>
      <p class="mb-0 user-designation">Administrator</p>
    </div>
    <a class="ms-auto" href="logout.php" aria-label="Sign out"><span class="material-symbols-outlined">logout</span></a>
  </div>
</aside>
