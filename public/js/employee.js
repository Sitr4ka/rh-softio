new DataTable('#employeeTable', {
    "pageLength": 5,
    "language": {
        "search": "Rechercher : ",
        "lengthMenu": '<select class="form-select">' +
            '<option value="5">5</option>' +
            '<option value="10">10</option>' +
            '<option value="15">15</option>' +
            '</select> éléments par page',
        "info": "Affichage des résultats : _START_ à _END_ sur _TOTAL_ entrées",
        "infoEmpty": "Aucune entrée à afficher",
        "infoFiltered": "(filtré de _MAX_ entrées totales)",
    }
});
infoPersoNav.classList.add('active')
employeeNav.classList.add('active')

