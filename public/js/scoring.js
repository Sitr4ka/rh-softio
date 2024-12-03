const today = new Date().toISOString().split("T")[0];
const dateInput = document.getElementsByClassName("datePointage");
const navMenu = document.getElementById("scoringNav");
const searchBtn = document.getElementById("searchBtn");

navMenu.classList.add("active");

//Inputs:
const firstname = document.getElementById("firstname");
const lastname = document.getElementById("lastname");

searchBtn.onclick = fetchEmploye;

//Search employees
function fetchEmploye() {
  const searchKeyWord = document.getElementById("keyWord").value;
  const startDate = document.getElementById("startDate").value;
  const endDate = document.getElementById("endDate").value;

  $.ajax({
    type: "GET",
    url: base_url("employee/getname"),
    data: {
      coordonnee: searchKeyWord,
      startDate: startDate,
      endDate: endDate,
    },
    success: function (response) {
      lastname.textContent = response.lastname;
      firstname.textContent = response.firstname;
    },
    error: function (e) {
      lastname.textContent = "";
      firstname.textContent = "";
    },
  });
}

/**
 * Modification
 */

$("#datePointage").change(function () {
  fetchEmployeByDate();
});

function fetchEmployeByDate() {
  const date = $("#datePointage").val();
  let row = "";

  $.ajax({
    type: "GET",
    url: base_url("scoring/fetch"),
    data: {
      datePointage: date,
    },
    success: function (response) {
      // $("#scoringTable tbody").empty();
      response.forEach((emp) => {
        // newRow(emp);
      });
    },
    error: function (response) {
      console.log(response.error);
    },
  });
}

/**
 *
 * @param {object} emp
 */

function newRow(emp) {
  let row = 
      "<tr>" + 
      "<td class='text-center'>" + emp["idEmploye"] + "</td>" + 
      "<td class='text-center'>" + emp["nom"] + "</td>" + 
      "<td class='text-center'>" + emp["prenoms"] + "</td>" + 
      "<td class='text-center'>" + emp["contact"] + "</td>" + 
      "<td class='d-flex gap-2 justify-content-center'>" +
          "<button type='button' " + 
              "class='btn btn-success' " + 
              "data-bs-target='#editScoring" + emp["idEmploye"] + "'>" + 
              "Pointage" +
          "</button>" + 
      "</td>" + 
      "</tr>";
  $("#scoringTable tbody").append(row);
}

