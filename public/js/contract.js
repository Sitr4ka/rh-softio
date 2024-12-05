let coordonnee = null;
$("#contactInput").change(function (e) {
  coordonnee = $("#contactInput").val();
  if (coordonnee == "") {
    $("#lastNameGroup").addClass("d-none");
    $("#firstNameGroup").addClass("d-none");
  } else {
    fetchEmployee();
  }
});

function fetchEmployee() {
  $.ajax({
    url: base_url("employee/getname"),
    type: "GET",
    data: {
      coordonnee: coordonnee,
    },
    success: function (response) {
      $("#lastNameGroup").removeClass("d-none");
      $("#firstNameGroup").removeClass("d-none");
      $("#contactField").addClass("mb-3");
      $("#contactErrorMsgBox").addClass("d-none");

      $("#lastname").text(response.lastname);
      $("#firstname").text(response.firstname);
    },
    error: function () {
      $("#lastNameGroup").addClass("d-none");
      $("#firstNameGroup").addClass("d-none");

      $("#contactErrorMsg").text("Aucun employé trouvé");
      $("#contactErrorMsgBox").removeClass("d-none");
      $("#contactField").removeClass("mb-3");
    },
  });
}

// Custom datatble library
new DataTable("#infoProTable", {
  pageLength: 5,
  language: {
    search: "Rechercher : ",
    lengthMenu:
      '<select class="form-select">' +
      '<option value="5">5</option>' +
      '<option value="10">10</option>' +
      '<option value="15">15</option>' +
      "</select>  éléments par page",
    info: "Affichage des résultats : _START_ à _END_ sur _TOTAL_ entrées",
    infoEmpty: "Aucune entrée à afficher",
    infoFiltered: "(filtré de _MAX_ entrées totales)",
  },
});

const today = new Date().toISOString().split("T")[0];

hireNav.classList.add("active");
employeeNav.classList.add("active");

const endDate = document.querySelector("#endDate");
const dateDebut = document.querySelector("#dateDebut");
const dateFin = document.querySelector("#dateFin");

dateDebut.value = today;
dateFin.setAttribute("min", dateDebut.value);

const contrat = document.getElementById("typeContrat");
contrat.addEventListener("input", function () {
  if (this.value === "CDI") {
    endDate.classList.add("d-none");
  } else {
    endDate.classList.remove("d-none");
  }
});

dateDebut.addEventListener("input", function () {
  dateFin.setAttribute("min", this.value);
});