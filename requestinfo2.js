function Editreq(id) {
  //go to edit page
  window.location.href = "edit.php?id=" + id;
}

function approveReq(id) {
     alert("approve successfully");
  window.location.href = "request-information-page.php?id=" + id + "&action=approve";
}

function declineReq(id) {
    alert("decline successfully");
  window.location.href = "request-information-page.php?id=" + id + "&action=decline";
}


