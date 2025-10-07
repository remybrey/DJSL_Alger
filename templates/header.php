<?php
if (!isset($pageTitle)) {
    $pageTitle = 'DJSL Alger';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?> · DJSL Alger</title>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<header class="site-header">
    <h1>Direction de la Jeunesse et des Sports et des Loisirs — Alger</h1>
    <p class="subtitle">Pilotage des Ligues et Clubs — Portail de gestion</p>
</header>
<?php include TEMPLATE_PATH . '/navigation.php'; ?>
<main class="site-content">
