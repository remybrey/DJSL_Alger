<?php
$pageTitle = 'Module Ligue';
include TEMPLATE_PATH . '/header.php';
?>
<section class="panel">
    <h2>Référentiel Ligue</h2>
    <form class="form" id="ligue-reference-form">
        <div class="form-row">
            <label for="ligue-discipline">Discipline</label>
            <select id="ligue-discipline" name="discipline" required>
                <option value="">Choisir…</option>
                <option value="FAF">Football (FAF)</option>
                <option value="FABB">Basket-ball (FABB)</option>
                <option value="FAN">Natation (FAN)</option>
                <option value="FAJ">Judo (FAJ)</option>
            </select>
        </div>
        <div class="form-row">
            <label for="ligue-nom">Nom de la ligue</label>
            <input type="text" id="ligue-nom" name="nom_ligue" maxlength="150" required>
        </div>
        <div class="form-grid">
            <div>
                <label for="ligue-email">Email</label>
                <input type="email" id="ligue-email" name="email">
            </div>
            <div>
                <label for="ligue-telephone">Téléphone</label>
                <input type="tel" id="ligue-telephone" name="telephone">
            </div>
            <div>
                <label for="ligue-statut">Statut</label>
                <select id="ligue-statut" name="statut_actif" required>
                    <option value="">Choisir…</option>
                    <option value="actif">Actif</option>
                    <option value="inactif">Inactif</option>
                </select>
            </div>
        </div>
    </form>
</section>

<section class="panel">
    <h2>Effectifs Ligue — Totaux par saison</h2>
    <form class="form" data-validate="totaux">
        <div class="form-grid">
            <div>
                <label for="ligue-saison">Saison</label>
                <input type="text" id="ligue-saison" name="saison" placeholder="2023/2024" required>
            </div>
            <div>
                <label for="ligue-filles">Filles</label>
                <input type="number" id="ligue-filles" name="filles" min="0" value="0" required data-role="filles">
            </div>
            <div>
                <label for="ligue-garcons">Garçons</label>
                <input type="number" id="ligue-garcons" name="garcons" min="0" value="0" required data-role="garcons">
            </div>
            <div>
                <label for="ligue-total">Total</label>
                <input type="number" id="ligue-total" name="total" min="0" value="0" required data-role="total">
            </div>
        </div>
        <p class="form-hint">Contrôle automatique : Filles + Garçons = Total</p>
    </form>
</section>

<section class="panel">
    <h2>Effectifs Ligue — par catégories d’âge</h2>
    <form class="form" data-validate="categories">
        <table class="data-table" aria-describedby="ligue-categories-description">
            <thead>
            <tr>
                <th>Catégorie</th>
                <th>Filles</th>
                <th>Garçons</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $categories = [
                'FB_SEN' => 'Seniors',
                'FB_U19' => 'U19',
                'FB_U17' => 'U17',
                'FB_U15' => 'U15',
                'FB_U14' => 'U14',
            ];
            foreach ($categories as $code => $label): ?>
                <tr>
                    <td><label for="ligue-cat-<?= strtolower($code) ?>"><?= htmlspecialchars($label) ?></label></td>
                    <td><input type="number" id="ligue-cat-<?= strtolower($code) ?>-f" min="0" value="0" data-role="filles-categorie"></td>
                    <td><input type="number" id="ligue-cat-<?= strtolower($code) ?>-g" min="0" value="0" data-role="garcons-categorie"></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <p id="ligue-categories-description" class="form-hint">
            Les sommes par colonne doivent correspondre aux totaux Filles/Garçons.
        </p>
    </form>
</section>

<section class="panel">
    <h2>Officiels &amp; Encadrement</h2>
    <div class="grid">
        <form class="form" data-validate="simple-total">
            <h3>Officiels par type</h3>
            <table class="data-table">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Nombre</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ([
                    'Arbitres',
                    'Juges',
                    'Commissaires',
                    'Chronométreurs'
                ] as $type): ?>
                    <tr>
                        <td><?= htmlspecialchars($type) ?></td>
                        <td><input type="number" min="0" value="0" data-role="totalisable"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="form-row">
                <label>Total officiels</label>
                <input type="number" min="0" value="0" data-role="total-general">
            </div>
        </form>
        <form class="form" data-validate="encadrement">
            <h3>Encadrement par rôle et genre</h3>
            <table class="data-table">
                <thead>
                <tr>
                    <th>Rôle</th>
                    <th>H</th>
                    <th>F</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ([
                    'Président(e)',
                    'Directeur technique',
                    'Entraîneur principal',
                    'Préparateur physique'
                ] as $role): ?>
                    <tr>
                        <td><?= htmlspecialchars($role) ?></td>
                        <td><input type="number" min="0" value="0" data-role="hommes"></td>
                        <td><input type="number" min="0" value="0" data-role="femmes"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="form-row">
                <label>Total encadrement</label>
                <input type="number" min="0" value="0" data-role="total-encadrement">
            </div>
        </form>
    </div>
</section>

<section class="panel">
    <h2>Compétitions &amp; Installations</h2>
    <div class="grid">
        <form class="form">
            <h3>Compétitions organisées</h3>
            <table class="data-table">
                <thead>
                <tr>
                    <th>Niveau</th>
                    <th>Nombre d'événements</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ([
                    'Wilaya',
                    'Régional',
                    'National',
                    'International'
                ] as $niveau): ?>
                    <tr>
                        <td><?= htmlspecialchars($niveau) ?></td>
                        <td><input type="number" min="0" value="0"></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </form>
        <form class="form">
            <h3>Installations de la ligue</h3>
            <table class="data-table">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Localisation</th>
                    <th>Propriétaire</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select>
                            <option value="">Choisir…</option>
                            <option value="salle">Salle</option>
                            <option value="stade">Stade</option>
                            <option value="piscine">Piscine</option>
                            <option value="autre">Autre</option>
                        </select>
                    </td>
                    <td><input type="text"></td>
                    <td>
                        <select>
                            <option value="">Choisir…</option>
                            <option value="DJSL">DJSL</option>
                            <option value="OCO">OCO</option>
                            <option value="APC">APC</option>
                            <option value="INFS-STS">INFS-STS</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</section>
<?php include TEMPLATE_PATH . '/footer.php'; ?>
