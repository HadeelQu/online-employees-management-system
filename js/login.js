function login() {
  var name1 = document.form.uname.value;
  var pass = document.form.psw.value;
  var nam = false;
  var p = false;
  if (name1 == null || name1 == "") {
    alert("Please enter a username");
  } else {
    nam = true;
  }

  if (pass == "") {
    alert("Please enter a password");
  } else if (pass.length < 8) {
    alert("The password must be 8 characters long");
  } else {
    p = true;
  }

  if (p && nam) {
    //alert("login  successfully");
    //window.location.replace("Manager.html");
    document.form.submit();
  }
}
