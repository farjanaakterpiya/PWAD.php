<?php
require_once 'auth.php';
require_role('admin');

$pageTitle = 'Administrator dashboard';
$sidebarPartial = 'partials/sidebar_admin.php';
$dashboardSections = [
    [
        'id' => 'administration',
        'title' => 'Administration',
        'icon' => 'admin_panel_settings',
        'description' => 'Your administrator account has access to the administration workspace.',
    ],
    [
        'id' => 'account',
        'title' => 'Account',
        'icon' => 'account_circle',
        'description' => 'Review the name, email, and role associated with your signed-in account.',
    ],
];

include 'partials/dashboard_layout.php';
