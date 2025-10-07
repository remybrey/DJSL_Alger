# Gestion administrative DJSL Alger

## Vue d'ensemble

Ce document décrit les besoins fonctionnels et les règles de gestion du lot **DJSL Alger**. La priorisation suit l'ordre demandé : d'abord le **module Ligue**, puis le **module Club**, avant les modules transverses. Toutes les informations sont rédigées en français et ne comportent aucun élément de code.

---

## Module 1 — Ligue (wilaya)

### 1. Objectif
Assurer la saisie, le contrôle et l'exploitation des données de la **Ligue de wilaya d'Alger**, discipline par discipline.

### 2. Fonctions clés
- Référentiel Ligue : discipline, identité, contacts, statut actif.
- Effectifs Ligue – Totaux : répartition Filles / Garçons / Total par discipline et saison.
- Effectifs Ligue – par catégories d'âge : chiffres F/G par catégorie fédérale.
- Officiels de Ligue : volumes par type d'officiel (arbitres, juges, commissaires, chronométreurs, etc.).
- Encadrement Ligue : comptage par rôle et par genre.
- Compétitions organisées : nombre d'événements par niveau (Wilaya, Régional, National, International) et par saison.
- Installations Ligue : type, localisation, propriétaire (si applicable).

### 3. Règles et contrôles
- Sommes obligatoires :
  - `Filles + Garçons = Total`.
  - `Somme catégories (Filles) = Filles` ; `Somme catégories (Garçons) = Garçons`.
  - `Somme officiels par type = total officiels` (si total disponible).
- Types et bornes : entiers ≥ 0, totaux obligatoires, catégories pré-remplies à 0.
- Traçabilité : audit par utilisateur (saisie / validation), horodatage, conservation des valeurs avant/après.

### 4. Restitutions & exports
- Vue Ligue par discipline : totaux, catégories, officiels, encadrement, compétitions, alertes de cohérence.
- Export PDF DJSL (FR) par discipline × saison ; export Excel/CSV des agrégats Ligue pour Alger.

### 5. Parcours de saisie & validation
1. La Ligue saisit ou met à jour ses données en statut **Brouillon** avec champs totaux obligatoires.
2. L'utilisateur **Saisie** vérifie les égalités de sommes ; les erreurs bloquantes sont signalées en ligne.
3. Passage au statut **À contrôler** : verrouillage partiel des champs critiques et notification au profil **Validation**.
4. Le profil **Validation** effectue un contrôle croisé, compare avec les agrégats Clubs et valide ou renvoie en Brouillon.
5. À la validation, un journal d'audit conserve l'état avant/après et la date de validation.

---

## Module 2 — Club (wilaya d'Alger)

### 1. Objectif
Suivre la saisie, le contrôle et l'exploitation des chiffres **au niveau des clubs** de la wilaya d'Alger.

### 2. Fonctions clés
- Référentiel Clubs : identité, commune, contacts, statut actif.
- Sections de club : discipline, rattachement fédéral, statut actif.
- Effectifs Club – Totaux : Filles / Garçons / Total par section et saison.
- Effectifs Club – par catégories d'âge : chiffres F/G par catégorie fédérale.
- Encadrement Club : rôles × genre, total encadrement.
- Installations Club : type, localisation, propriétaire.
- Palmarès Club : niveau, distinction, titre, date ou saison.

### 3. Règles et contrôles
- Sommes obligatoires :
  - `Filles + Garçons = Total`.
  - `Somme catégories (Filles) = Filles` ; `Somme catégories (Garçons) = Garçons`.
  - `Somme encadrement (rôle × genre) = total encadrement`.
- Types et bornes : entiers ≥ 0, totaux obligatoires, catégories/rôles pré-remplis à 0.
- Traçabilité : audit par utilisateur (saisie / validation), horodatage, suivi avant/après.

### 4. Restitutions & exports
- Vue Club : statut, cohérence (OK/KO), détails sections/catégories/encadrement/installations/palmarès.
- Export PDF DJSL (FR) par section × saison ; export Excel/CSV Clubs (wilaya d'Alger).

### 5. Parcours de saisie & validation
1. Chaque club dispose d'un tableau de bord listant ses sections actives/inactives et l'état des campagnes en cours.
2. En statut **Brouillon**, les formulaires proposent des valeurs par défaut à 0 pour éviter les oublis de catégories ou de rôles.
3. Les contrôles bloquants empêchent la soumission tant que `Filles + Garçons ≠ Total` ou que les sommes par catégorie sont incohérentes.
4. Après passage à **À contrôler**, un responsable Ligue ou DJSL relit les données ; des écarts par rapport aux totaux Ligue sont mis en évidence.
5. Le statut **Validé** verrouille la saisie et déclenche la génération automatique des exports PDF/Excel pour archivage.

---

## Modules transverses (après Ligue & Club)

### M3 — Référentiels (FR)
- Disciplines / Fédérations (extensibles).
- Catégories d'âge par fédération (listes fermées ci-dessous).
- Rôles d'encadrement.
- Types d'officiels.
- Niveaux.
- Types et propriétaires d'installations.

#### Référentiel Catégories – Lot DJSL Alger
*(Années de naissance paramétrées par saison dans le module Saisons.)*

**Football (FAF)** — liste définitive pour Alger
| Code   | Libellé |
| ------ | ------- |
| FB_SEN | Seniors |
| FB_U19 | U19     |
| FB_U17 | U17     |
| FB_U15 | U15     |
| FB_U14 | U14     |

**Basket-ball (FABB)** — validation Ligue d'Alger en attente
| Code   | Libellé |
| ------ | ------- |
| BK_U10 | U10     |
| BK_U12 | U12     |
| BK_U14 | U14     |
| BK_U16 | U16     |
| BK_U18 | U18     |
| BK_SEN | Seniors |

**Natation (FAN)** — validation Ligue d'Alger en attente
| Code   | Libellé   |
| ------ | --------- |
| SW_AV  | Avenirs   |
| SW_JE  | Jeunes    |
| SW_JR  | Juniors   |
| SW_SEN | Seniors   |
| SW_MA* | Maîtres*  |

**Judo (FAJ)** — validation Ligue d'Alger en attente
| Code    | Libellé    |
| ------- | ---------- |
| JD_PO   | Poussins   |
| JD_BE   | Benjamins  |
| JD_MI   | Minimes    |
| JD_CA   | Cadets     |
| JD_JU   | Juniors    |
| JD_SEN  | Seniors    |
| JD_VET* | Vétérans*  |

*(Les entrées marquées d'un astérisque sont optionnelles.)*

### M4 — Saisons & workflow
- Saisons multi-annuelles (ex. 2019/2020, 2022/2023) avec gestion d'ouverture et de clôture.
- Workflow : **Brouillon → À contrôler → Validé** (verrouillage, annulation motivée pour corrections).
- Rapprochement Clubs ⇄ Ligue (signalisation, non bloquant MVP) : Σ Clubs (discipline × saison) vs Total Ligue, seuil d'alerte configurable.

### M5 — Contrôles, audit & sécurité
- Blocage en cas d'incohérences (sommes, totaux manquants, valeurs négatives ou décimales).
- Audit complet : qui / quand / avant → après / adresse IP, avec export du journal.
- Accès restreint DJSL Alger, séparation des rôles Saisie vs Validation (double regard recommandé).

### M6 — Reporting & exports
- Tableaux Clubs, Ligues, agrégats wilaya Alger, filtres par saison, discipline, commune, etc.
- PDF DJSL (FR) standardisés + exports Excel/CSV (clubs, ligues, wilaya).

---

## Dictionnaire de données (extraits)

### Conventions générales
- Types : texte court (≤150), texte long (≤500), email, téléphone, enum, entier ≥ 0, date (AAAA-MM-JJ).
- Champs système automatiques : `id`, `créé_le`, `créé_par`, `modifié_le`, `modifié_par`.
- Référentiels : valeurs fermées (disciplines, catégories d'âge, rôles, types d'officiels, niveaux, installations).

### Module Ligue — Champs obligatoires & règles
- Référentiel Ligue : discipline (enum), nom_ligue (unique par discipline), email, téléphone, statut_actif.
- Effectifs totaux : saison, filles, garçons, total (égalité F+G=Total).
- Effectifs par catégorie : catégorie autorisée, filles_cat, garçons_cat (sommes alignées sur les totaux).
- Officiels : type_officiel, nombre (somme = total officiels si affiché).
- Encadrement : rôle, genre, nombre (somme par rôle = H+F ; somme globale = total encadrement si présent).
- Compétitions : niveau, événements.
- Installations : type_installation, localisation, propriétaire.

### Module Club — Champs obligatoires & règles
- Référentiel Club : nom (unique), abréviation, commune, adresse, email, téléphone, année de création, statut_actif.
- Sections : discipline, fédération, statut_section (unicité club × discipline).
- Effectifs totaux : saison, filles, garçons, total (égalité F+G=Total).
- Effectifs par catégorie : catégorie active, filles_cat, garçons_cat (sommes alignées sur les totaux).
- Encadrement : rôle, genre, nombre (sommes conformes au total encadrement).
- Installations : type_installation, localisation, propriétaire.
- Palmarès : niveau, distinction, titre, date/saison.

### Transverse — Règles complémentaires
- Contrôles globaux : entiers ≥ 0, totaux non vides, sommes catégories = totaux, sommes encadrement = total.
- Signalisation clubs ⇄ ligue : écart informatif (non bloquant) avec seuil paramétrable.
- Workflow : blocage tant que les contrôles bloquants ne sont pas satisfaits ; passage à Validé réservé au profil Validation.

---

## Definition of Done
- Modules Ligue et Club opérationnels (saisie, contrôles, audit, exports).
- Référentiels FR gelés (disciplines, catégories, rôles, types d'officiels, niveaux, installations).
- Workflow de validation actif avec verrouillage après statut Validé.
- Rapprochement Clubs ⇄ Ligue disponible avec affichage des écarts et seuil configurable.
- Exports PDF/Excel produits sans incohérences.

---

## Décisions et validations
1. **Catégories** : listes ci-dessus confirmées ; mention explicite des entrées optionnelles (Maîtres, Vétérans) en attente de validation Ligue d'Alger.
2. **Types d'officiels** : maintien de la liste de base (Arbitres, Juges, Commissaires, Chronométreurs) par discipline, extensible si besoin.
3. **Double regard** : recommandé et intégré comme séparation stricte des rôles Saisie vs Validation.
4. **Pièces jointes** : à prévoir en **version 2** (non activées au MVP).
