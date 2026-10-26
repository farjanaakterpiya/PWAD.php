<?php
require_once 'auth.php';
require_role('customer');

$pageTitle = 'Customer dashboard';
$sidebarPartial = 'partials/sidebar_customer.php';
$dashboardSections = [
    [
        'id' => 'services',
        'title' => 'Services',
        'icon' => 'cleaning_services',
        'description' => 'Your customer workspace is ready. Service options will be shown here when available.',
    ],
    [
        'id' => 'account',
        'title' => 'Account',
        'icon' => 'account_circle',
        'description' => 'Review the name, email, and role associated with your signed-in account.',
    ],
];

include 'partials/dashboard_layout.php';
