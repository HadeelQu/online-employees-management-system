function vailda() {
  //var servType = document.FormE.serviceType.value;
  var dec = document.FormE.description.value;
  var serCompltet = true;
  var desCompltet = false;
  var att = false;

  // GET THE FILE INPUT.
  var fi = document.getElementById("myfile");

  // VALIDATE OR CHECK IF ANY FILE IS SELECTED.

  /*
  if (servType == "" || servType == null) {
    alert("please choose service type");
  } else {
    serCompltet = true;
  }
  */
  if (dec == "") {
    alert("please add decription");
  } else {
    desCompltet = true;
  }

  if (fi.files.length == 0) {
    alert("please uplad file or photo");
  } else {
    if (fi.files.length > 2) {
      alert("please uplad at most two file");
    } else {
      att = true;
    }
  }
  if (desCompltet && serCompltet && att) {
    //alert("update successfully");
    //window.location.replace("request-information-page.php");
    document.FormE.submit();
  }
}
