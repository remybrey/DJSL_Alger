<?php
$pageTitle = 'Référentiels';
include TEMPLATE_PATH . '/header.php';
?>
<section class="panel">
    <h2>Référentiels disciplinaires</h2>
    <p>
        Les référentiels structurent les valeurs saisissables dans l'application. Cette page propose
        une première visualisation statique en attendant l'implémentation des écrans d'administration.
    </p>
    <div class="grid">
        <article class="card">
            <h3>Disciplines &amp; fédérations</h3>
            <ul>
                <li>FAF — Football</li>
                <li>FABB — Basket-ball</li>
                <li>FAN — Natation</li>
                <li>FAJ — Judo</li>
            </ul>
        </article>
        <article class="card">
            <h3>Types d'officiels</h3>
            <ul>
                <li>Arbitres</li>
                <li>Juges</li>
                <li>Commissaires</li>
                <li>Chronométreurs</li>
            </ul>
        </article>
        <article class="card">
            <h3>Rôles d'encadrement</h3>
            <ul>
                <li>Président(e)</li>
                <li>Directeur technique</li>
                <li>Entraîneur</li>
                <li>Médecin</li>
                <li>Préparateur physique</li>
            </ul>
        </article>
    </div>
</section>

<section class="panel">
    <h2>Catégories d’âge</h2>
    <div class="grid">
        <article class="card">
            <h3>Football (FAF)</h3>
            <ul>
                <li>FB_SEN — Seniors</li>
                <li>FB_U19 — U19</li>
                <li>FB_U17 — U17</li>
                <li>FB_U15 — U15</li>
                <li>FB_U14 — U14</li>
            </ul>
        </article>
        <article class="card">
            <h3>Basket-ball (FABB)</h3>
            <ul>
                <li>BK_U10 — U10</li>
                <li>BK_U12 — U12</li>
                <li>BK_U14 — U14</li>
                <li>BK_U16 — U16</li>
                <li>BK_U18 — U18</li>
                <li>BK_SEN — Seniors</li>
            </ul>
        </article>
        <article class="card">
            <h3>Natation (FAN)</h3>
            <ul>
                <li>SW_AV — Avenirs</li>
                <li>SW_JE — Jeunes</li>
                <li>SW_JR — Juniors</li>
                <li>SW_SEN — Seniors</li>
                <li>SW_MA — Maîtres (option)</li>
            </ul>
        </article>
        <article class="card">
            <h3>Judo (FAJ)</h3>
            <ul>
                <li>JD_PO — Poussins</li>
                <li>JD_BE — Benjamins</li>
                <li>JD_MI — Minimes</li>
                <li>JD_CA — Cadets</li>
                <li>JD_JU — Juniors</li>
                <li>JD_SEN — Seniors</li>
                <li>JD_VET — Vétérans (option)</li>
            </ul>
        </article>
    </div>
</section>
<?php include TEMPLATE_PATH . '/footer.php'; ?>
