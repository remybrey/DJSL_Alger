(function () {
    'use strict';

    function updateTotals(form) {
        const filles = form.querySelector('[data-role="filles"]');
        const garcons = form.querySelector('[data-role="garcons"]');
        const total = form.querySelector('[data-role="total"]');

        if (filles && garcons && total) {
            const somme = Number(filles.value || 0) + Number(garcons.value || 0);
            total.setCustomValidity('');
            if (Number(total.value || 0) !== somme) {
                total.setCustomValidity('La somme Filles + Garçons doit être égale au total.');
            }
        }
    }

    function updateCategories(form) {
        const totalFilles = document.querySelector('form[data-validate="totaux"] [data-role="filles"]');
        const totalGarcons = document.querySelector('form[data-validate="totaux"] [data-role="garcons"]');
        const fillesInputs = form.querySelectorAll('[data-role="filles-categorie"]');
        const garconsInputs = form.querySelectorAll('[data-role="garcons-categorie"]');

        const somme = (inputs) => Array.from(inputs).reduce((acc, input) => acc + Number(input.value || 0), 0);

        const sommeFilles = somme(fillesInputs);
        const sommeGarcons = somme(garconsInputs);

        fillesInputs.forEach((input) => input.setCustomValidity(''));
        garconsInputs.forEach((input) => input.setCustomValidity(''));

        if (totalFilles && sommeFilles !== Number(totalFilles.value || 0)) {
            fillesInputs.forEach((input) => input.setCustomValidity('La somme des filles doit correspondre au total.'));
        }

        if (totalGarcons && sommeGarcons !== Number(totalGarcons.value || 0)) {
            garconsInputs.forEach((input) => input.setCustomValidity('La somme des garçons doit correspondre au total.'));
        }
    }

    function updateEncadrement(form) {
        const lignes = form.querySelectorAll('tbody tr');
        let totalCalcule = 0;
        lignes.forEach((ligne) => {
            const hommes = Number(ligne.querySelector('[data-role="hommes"]').value || 0);
            const femmes = Number(ligne.querySelector('[data-role="femmes"]').value || 0);
            totalCalcule += hommes + femmes;
        });

        const total = form.querySelector('[data-role="total-encadrement"]');
        if (total) {
            total.setCustomValidity('');
            if (Number(total.value || 0) !== totalCalcule) {
                total.setCustomValidity('Le total encadrement doit correspondre à la somme H + F.');
            }
        }
    }

    function updateSimpleTotal(form) {
        const inputs = form.querySelectorAll('[data-role="totalisable"]');
        const total = form.querySelector('[data-role="total-general"]');
        if (!total) {
            return;
        }
        const somme = Array.from(inputs).reduce((acc, input) => acc + Number(input.value || 0), 0);
        total.setCustomValidity('');
        if (Number(total.value || 0) !== somme) {
            total.setCustomValidity('Le total doit correspondre à la somme des lignes.');
        }
    }

    function bindForm(form) {
        const validationType = form.dataset.validate;
        if (!validationType) {
            return;
        }

        form.addEventListener('input', function () {
            switch (validationType) {
                case 'totaux':
                    updateTotals(form);
                    break;
                case 'categories':
                    updateCategories(form);
                    break;
                case 'encadrement':
                    updateEncadrement(form);
                    break;
                case 'simple-total':
                    updateSimpleTotal(form);
                    break;
            }
        });

        // Initial validation
        switch (validationType) {
            case 'totaux':
                updateTotals(form);
                break;
            case 'categories':
                updateCategories(form);
                break;
            case 'encadrement':
                updateEncadrement(form);
                break;
            case 'simple-total':
                updateSimpleTotal(form);
                break;
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        document
            .querySelectorAll('form[data-validate]')
            .forEach((form) => bindForm(form));
    });
})();
