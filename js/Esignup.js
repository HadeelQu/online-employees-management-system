function signup() {
  var fname = document.form.fname.value;
  var lname = document.form.lname.value;
  var Job = document.form.job.value;
  var emid = document.form.id.value;
  var pass = document.form.psw.value;
  var nam = false;
  var job1 = false;
  var eid = false;
  var p = false;
  if (fname == null || (fname == "" && lname == null) || lname == "") {
    alert("Please enter your Full Name");
  } else {
    nam = true;
  }
  if (Job == null || Job == "") {
    alert("Please Enter Your Job Title");
  } else {
    job1 = true;
  }
  if (emid == null || emid == "") {
    alert("Employee ID can't be empty");
  } else {
    eid = true;
  }
  if (pass == "") {
    alert("Please enter a password");
  } else if (pass.length < 8) {
    alert("The password must be 8 characters long");
  } else {
    p = true;
  }

  if (p && nam && job1 && eid) {
    //alert("sign up successfully");

    //go to employee page
    //window.location.replace("Employee.html");
    document.form.submit();
  }
}
