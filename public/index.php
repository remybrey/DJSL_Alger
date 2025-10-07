<?php
require_once dirname(__DIR__) . '/src/bootstrap.php';

$page = $_GET['page'] ?? 'dashboard';
$allowedPages = [
    'dashboard' => 'dashboard.php',
    'ligue' => 'ligue.php',
    'club' => 'club.php',
    'referentiels' => 'referentiels.php',
    'workflow' => 'workflow.php',
    'reporting' => 'reporting.php',
];

if (!array_key_exists($page, $allowedPages)) {
    http_response_code(404);
    $pageTitle = 'Page introuvable';
    include TEMPLATE_PATH . '/header.php';
    echo '<section class="panel"><h2>Erreur 404</h2><p>La page demandée n\'existe pas encore.</p></section>';
    include TEMPLATE_PATH . '/footer.php';
    exit;
}

require VIEW_PATH . '/' . $allowedPages[$page];
