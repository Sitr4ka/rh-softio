function base_url(uri) {
  return "http://localhost:8080/" + uri;
}

function alertMsg(operation, text = "", icon = "") {
  switch (operation) {
    case "enregistrement":
      text = "Enregistrement réussi";
      icon = "success";
      break;

    case "suppression":
      text = "Suppression réussi";
      icon = "success";
      break;

    case "modification":
      text = "Modification réussi";
      icon = "success";
      break;

    default:
      text = `Aucun personnel trouvé`;
      icon = "error";
      break;
  }

  Swal.fire({
    text: text,
    icon: icon,
    confirmButtonText: "ok",
  });
}
