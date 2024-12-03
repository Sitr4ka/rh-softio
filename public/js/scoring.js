$("#scoringNav").addClass("active");

$("#searchBtn").click(function (e) {
  fetchEmploye();
});

/**
 * Used to display employee appointments between a date interval
 * @return void
 */
function fetchEmploye() {
  const searchKeyWord = $("#keyWord").val();
  const startDate = $("#startDate").val();
  const endDate = $("#endDate").val();

  $.ajax({
    type: "GET",
    url: base_url("employee/getAttendance"),
    data: {
      coordonnee: searchKeyWord,
      startDate: startDate,
      endDate: endDate,
    },
    success: function (response) {
      const apointments = response.apointments;
      
      $("#lastname").text(response.lastname);
      $("#firstname").text(response.firstname);

      $("#apointment-table tbody").empty();
      if (apointments) {
        apointments.forEach((elt) => {
          newAppointment(elt);
        });
      } else console.log("Aucune enregistrement trouvée");
    },
    error: function (e) {
      $("#apointment-table tbody").empty();
      lastname.textContent = "";
      firstname.textContent = "";
      $("#lastname").text("");
      $("#firstname").text("");
    },
  });
}

/**
 * Used to add row into the appointment table
 * @param {Object} scoring
 * @returns void
 */
function newAppointment(scoring) {
  let row =
    "<tr>" +
      "<td class='text-center'>" + scoring["date"] + "</td>" +
      "<td class='text-center'>" + scoring["observation"] + "</td>" +
    "<tr>";
  $("#apointment-table tbody").append(row);
}
