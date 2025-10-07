<?php
$pageTitle = 'Tableau de bord';
include TEMPLATE_PATH . '/header.php';
?>
<section class="panel">
    <h2>Bienvenue</h2>
    <p>
        Ce prototype amorce la construction de l'application de gestion DJSL Alger.
        Utilisez le menu pour parcourir les modules et préparer les futures intégrations
        (saisie des ligues, clubs, référentiels et reporting).
    </p>
    <div class="grid">
        <article class="card">
            <h3>Prochaines étapes techniques</h3>
            <ul>
                <li>Configurer la base MySQL (copie de <code>config/database.example.php</code>).</li>
                <li>Mettre en place les migrations de structure (tables ligues, clubs, référentiels, saisons).</li>
                <li>Brancher les formulaires de saisie aux contrôleurs et validations PHP.</li>
                <li>Déployer les contrôles front-end (JavaScript) et back-end (PHP) des totaux.</li>
            </ul>
        </article>
        <article class="card">
            <h3>Modules couverts</h3>
            <ul>
                <li>Module Ligue — référentiel, effectifs, encadrement, officiels.</li>
                <li>Module Club — sections, effectifs, palmarès et installations.</li>
                <li>Référentiels — disciplines, catégories, rôles, niveaux.</li>
                <li>Workflow — saisons, statuts et rapprochement Ligue/Clubs.</li>
            </ul>
        </article>
    </div>
</section>
<?php include TEMPLATE_PATH . '/footer.php'; ?>
