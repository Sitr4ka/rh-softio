const contactInput = document.getElementById("contactInput")
contactInput.onchange = fetchEmployee;

function fetchEmployee() {
    let coordonnee = document.getElementById("contactInput").value;
    let lastNameGroup = document.getElementById('lastNameGroup')
    let firstNameGroup = document.getElementById('firstNameGroup')
    let contactErrorMsgBox = document.getElementById('contactErrorMsgBox')
    let contactErrorMsg = document.getElementById('contactErrorMsg')
    let contactField = document.getElementById('contactField')

    $.ajax({
        url: base_url('employee/getname'),
        type: 'GET',
        data: {
        coordonnee: coordonnee
    },
        success: function (response) {
            let firstname = document.getElementById('firstname')
            let lastname = document.getElementById('lastname')

            lastNameGroup.classList.remove('d-none')
            firstNameGroup.classList.remove('d-none')
            contactField.classList.add('mb-3')
            contactErrorMsgBox.classList.add('d-none')

            firstname.textContent = response.firstname
            lastname.textContent = response.lastname
        },
        error: function () {
            lastNameGroup.classList.add('d-none')
            firstNameGroup.classList.add('d-none')

            contactErrorMsg.textContent = "Aucun employé trouvé"
            contactErrorMsgBox.classList.remove('d-none')
            contactField.classList.remove('mb-3')
        },
        })
    }

new DataTable('#infoProTable', {
    "pageLength": 5,
    "language": {
        "search": "Rechercher : ",
        "lengthMenu": '<select class="form-select">' +
            '<option value="5">5</option>' +
            '<option value="10">10</option>' +
            '<option value="15">15</option>' +
            '</select>  éléments par page',
        "info": "Affichage des résultats : _START_ à _END_ sur _TOTAL_ entrées",
        "infoEmpty": "Aucune entrée à afficher",
        "infoFiltered": "(filtré de _MAX_ entrées totales)",
    }
});

const contrat = document.getElementById('typeContrat')

const today = new Date().toISOString().split('T')[0];

hireNav.classList.add('active')
employeeNav.classList.add('active')

const endDate = document.querySelector('#endDate');
const dateDebut = document.querySelector('#dateDebut');
const dateFin = document.querySelector('#dateFin');

dateDebut.value = today;
dateFin.setAttribute('min', dateDebut.value)



contrat.addEventListener('input', function () {
    if (this.value === 'CDI') {
        endDate.classList.add('d-none');
    } else {
        endDate.classList.remove('d-none');
    }
});

dateDebut.addEventListener('input', function () {
    dateFin.setAttribute('min', this.value)
})