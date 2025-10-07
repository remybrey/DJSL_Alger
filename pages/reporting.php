<?php
$pageTitle = 'Reporting & Exports';
include TEMPLATE_PATH . '/header.php';
?>
<section class="panel">
    <h2>Tableaux de bord</h2>
    <p>
        Cette section présentera les synthèses agrégées (wilaya, ligues, clubs). Le prototype propose
        un aperçu des indicateurs ciblés avant la connexion à la base de données.
    </p>
    <div class="grid">
        <article class="card">
            <h3>Clubs</h3>
            <p>Total clubs actifs : <strong>128</strong></p>
            <p>Sections sportives : <strong>312</strong></p>
            <p>Dernière mise à jour : <strong>15/01/2024</strong></p>
        </article>
        <article class="card">
            <h3>Ligues</h3>
            <p>Total licenciés : <strong>8 450</strong></p>
            <p>Encadrants : <strong>425</strong></p>
            <p>Officiels : <strong>285</strong></p>
        </article>
        <article class="card">
            <h3>Alertes</h3>
            <ul>
                <li>2 ligues en incohérence F/G vs Total</li>
                <li>5 clubs en retard de validation</li>
                <li>1 discipline en dépassement de seuil rapprochement</li>
            </ul>
        </article>
    </div>
</section>

<section class="panel">
    <h2>Exports</h2>
    <ul class="export-list">
        <li><button type="button" class="button">Exporter PDF Ligue</button></li>
        <li><button type="button" class="button">Exporter PDF Club</button></li>
        <li><button type="button" class="button">Exporter Excel Agrégats Wilaya</button></li>
        <li><button type="button" class="button">Exporter CSV Clubs</button></li>
    </ul>
    <p class="form-hint">
        Les boutons déclencheront les scripts PHP générant les exports (bibliothèque Dompdf / PhpSpreadsheet).
    </p>
</section>
<?php include TEMPLATE_PATH . '/footer.php'; ?>
