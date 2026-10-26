<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function dashboard_for_role($role)
{
    $dashboards = [
        'admin' => 'dashboard_admin.php',
        'customer' => 'dashboard_customer.php',
        'staff' => 'dashboard_staff.php',
    ];

    return $dashboards[$role] ?? null;
}

function redirect_to_role_dashboard()
{
    $dashboard = dashboard_for_role($_SESSION['role'] ?? '');
    if ($dashboard === null) {
        unset($_SESSION['email'], $_SESSION['name'], $_SESSION['role']);
        header('Location: index.php');
        exit;
    }

    header('Location: ' . $dashboard);
    exit;
}

function require_role($requiredRole)
{
    if (!isset($_SESSION['email'], $_SESSION['role'])) {
        header('Location: index.php');
        exit;
    }

    if ($_SESSION['role'] !== $requiredRole) {
        redirect_to_role_dashboard();
    }
}

function csrf_token()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    return $_SESSION['csrf_token'];
}

function verify_csrf_token($token)
{
    return isset($_SESSION['csrf_token']) && is_string($token)
        && hash_equals($_SESSION['csrf_token'], $token);
}

function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
