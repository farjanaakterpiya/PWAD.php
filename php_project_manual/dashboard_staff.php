<?php
require_once 'auth.php';
require_role('staff');

$pageTitle = 'Staff dashboard';
$sidebarPartial = 'partials/sidebar_staff.php';
$dashboardSections = [
    [
        'id' => 'work',
        'title' => 'Work overview',
        'icon' => 'work',
        'description' => 'Your staff workspace is ready. Assigned work will be shown here when available.',
    ],
    [
        'id' => 'account',
        'title' => 'Account',
        'icon' => 'account_circle',
        'description' => 'Review the name, email, and role associated with your signed-in account.',
    ],
];

include 'partials/dashboard_layout.php';
