<?php
$pageTitle = 'Module Club';
include TEMPLATE_PATH . '/header.php';
?>
<section class="panel">
    <h2>Référentiel Club</h2>
    <form class="form" id="club-reference-form">
        <div class="form-grid">
            <div>
                <label for="club-nom">Nom du club</label>
                <input type="text" id="club-nom" name="nom_club" maxlength="150" required>
            </div>
            <div>
                <label for="club-abreviation">Abréviation</label>
                <input type="text" id="club-abreviation" name="abreviation" maxlength="15">
            </div>
            <div>
                <label for="club-commune">Commune</label>
                <input type="text" id="club-commune" name="commune" required>
            </div>
            <div>
                <label for="club-statut">Statut</label>
                <select id="club-statut" name="statut_actif" required>
                    <option value="">Choisir…</option>
                    <option value="actif">Actif</option>
                    <option value="inactif">Inactif</option>
                </select>
            </div>
        </div>
        <div class="form-grid">
            <div>
                <label for="club-email">Email</label>
                <input type="email" id="club-email" name="email">
            </div>
            <div>
                <label for="club-telephone">Téléphone</label>
                <input type="tel" id="club-telephone" name="telephone">
            </div>
            <div>
                <label for="club-creation">Année de création</label>
                <input type="number" id="club-creation" name="annee_creation" min="1900" max="<?= date('Y') ?>">
            </div>
        </div>
    </form>
</section>

<section class="panel">
    <h2>Sections du club</h2>
    <form class="form">
        <table class="data-table">
            <thead>
            <tr>
                <th>Discipline</th>
                <th>Fédération</th>
                <th>Statut</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <select>
                        <option value="">Choisir…</option>
                        <option value="FAF">Football</option>
                        <option value="FABB">Basket-ball</option>
                        <option value="FAN">Natation</option>
                        <option value="FAJ">Judo</option>
                    </select>
                </td>
                <td><input type="text" placeholder="Fédération de rattachement"></td>
                <td>
                    <select>
                        <option value="">Choisir…</option>
                        <option value="actif">Actif</option>
                        <option value="inactif">Inactif</option>
                    </select>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</section>

<section class="panel">
    <h2>Effectifs Club — Totaux</h2>
    <form class="form" data-validate="totaux">
        <div class="form-grid">
            <div>
                <label for="club-saison">Saison</label>
                <input type="text" id="club-saison" name="saison" placeholder="2023/2024" required>
            </div>
            <div>
                <label for="club-filles">Filles</label>
                <input type="number" id="club-filles" name="filles" min="0" value="0" required data-role="filles">
            </div>
            <div>
                <label for="club-garcons">Garçons</label>
                <input type="number" id="club-garcons" name="garcons" min="0" value="0" required data-role="garcons">
            </div>
            <div>
                <label for="club-total">Total</label>
                <input type="number" id="club-total" name="total" min="0" value="0" required data-role="total">
            </div>
        </div>
        <p class="form-hint">Contrôle automatique : Filles + Garçons = Total</p>
    </form>
</section>

<section class="panel">
    <h2>Effectifs Club — par catégories d’âge</h2>
    <form class="form" data-validate="categories">
        <table class="data-table" aria-describedby="club-categories-description">
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
                'BK_U10' => 'U10',
                'BK_U12' => 'U12',
                'BK_U14' => 'U14',
                'BK_U16' => 'U16',
                'BK_U18' => 'U18',
                'BK_SEN' => 'Seniors',
            ];
            foreach ($categories as $code => $label): ?>
                <tr>
                    <td><label for="club-cat-<?= strtolower($code) ?>"><?= htmlspecialchars($label) ?></label></td>
                    <td><input type="number" id="club-cat-<?= strtolower($code) ?>-f" min="0" value="0" data-role="filles-categorie"></td>
                    <td><input type="number" id="club-cat-<?= strtolower($code) ?>-g" min="0" value="0" data-role="garcons-categorie"></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <p id="club-categories-description" class="form-hint">
            Les sommes par colonne doivent correspondre aux totaux Filles/Garçons.
        </p>
    </form>
</section>

<section class="panel">
    <h2>Encadrement, Installations &amp; Palmarès</h2>
    <div class="grid">
        <form class="form" data-validate="encadrement">
            <h3>Encadrement</h3>
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
                    'Secrétaire général(e)',
                    'Entraîneur',
                    'Préparateur physique',
                    'Médecin'
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
        <form class="form">
            <h3>Installations</h3>
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
                            <option value="dojo">Dojo</option>
                            <option value="autre">Autre</option>
                        </select>
                    </td>
                    <td><input type="text" placeholder="Adresse"></td>
                    <td>
                        <select>
                            <option value="">Choisir…</option>
                            <option value="club">Club</option>
                            <option value="APC">APC</option>
                            <option value="DJSL">DJSL</option>
                            <option value="privé">Privé</option>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
    <form class="form">
        <h3>Palmarès</h3>
        <table class="data-table">
            <thead>
            <tr>
                <th>Saison</th>
                <th>Niveau</th>
                <th>Distinction</th>
                <th>Titre</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="text" placeholder="2022/2023"></td>
                <td>
                    <select>
                        <option value="">Choisir…</option>
                        <option value="wilaya">Wilaya</option>
                        <option value="regional">Régional</option>
                        <option value="national">National</option>
                        <option value="international">International</option>
                    </select>
                </td>
                <td><input type="text" placeholder="Distinction"></td>
                <td><input type="text" placeholder="Titre"></td>
                <td><input type="date"></td>
            </tr>
            </tbody>
        </table>
    </form>
</section>
<?php include TEMPLATE_PATH . '/footer.php'; ?>
