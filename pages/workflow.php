<?php
$pageTitle = 'Saisons & Workflow';
include TEMPLATE_PATH . '/header.php';
?>
<section class="panel">
    <h2>Gestion des saisons</h2>
    <form class="form">
        <div class="form-grid">
            <div>
                <label for="saison-libelle">Libellé</label>
                <input type="text" id="saison-libelle" name="libelle" placeholder="2023/2024" required>
            </div>
            <div>
                <label for="saison-debut">Année de début</label>
                <input type="number" id="saison-debut" name="annee_debut" min="2010" max="2100" required>
            </div>
            <div>
                <label for="saison-fin">Année de fin</label>
                <input type="number" id="saison-fin" name="annee_fin" min="2010" max="2100" required>
            </div>
            <div>
                <label for="saison-code">Code DJSL</label>
                <input type="text" id="saison-code" name="code_djsl" maxlength="20">
            </div>
        </div>
    </form>
</section>

<section class="panel">
    <h2>Workflow de validation</h2>
    <ol class="workflow">
        <li>
            <h3>Brouillon</h3>
            <p>Saisie initiale par la Ligue ou le Club. Les contrôles de cohérence sont exécutés en temps réel.</p>
        </li>
        <li>
            <h3>À contrôler</h3>
            <p>Un profil <strong>Validation</strong> relit les données. Le passage est bloqué tant que les totaux ne sont pas cohérents.</p>
        </li>
        <li>
            <h3>Validé</h3>
            <p>Les données sont verrouillées. Toute correction nécessite une annulation motivée et revient à l'étape Brouillon.</p>
        </li>
    </ol>
</section>

<section class="panel">
    <h2>Rapprochement Ligue ⇄ Clubs</h2>
    <p>
        Le rapprochement compare les totaux de la Ligue et la somme des clubs par discipline × saison.
        Ce module affichera un indicateur visuel (vert/orange/rouge) selon l'écart constaté et le seuil configuré.
    </p>
    <table class="data-table">
        <thead>
        <tr>
            <th>Discipline</th>
            <th>Saison</th>
            <th>Total Ligue</th>
            <th>Σ Clubs</th>
            <th>Écart</th>
            <th>Statut</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Football</td>
            <td>2023/2024</td>
            <td>2500</td>
            <td>2475</td>
            <td>-25</td>
            <td><span class="tag tag-warning">À surveiller</span></td>
        </tr>
        </tbody>
    </table>
</section>
<?php include TEMPLATE_PATH . '/footer.php'; ?>
