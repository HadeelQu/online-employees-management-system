var Des = document.getElementById("Des");
var servType;
var Dec;
var serCompltet;
var desCompltet;
var att;
var fi;
var X;
function addRequest() {

  Des = document.form.description.value;
  X = document.getElementById("form");
  var nam = false;
  var p = false;

  if (X.description.value.length > 450) {
    alert("You can't write more than 450 character!");
  } else if (X.description.value == '') {
    alert("You must write request description");
  } else {
    p = true;
  }

  if (p) {
    att = false;


    fi = document.getElementById("myfile");

  

    if (fi.files.length == 0) {
      alert("please uplad file or photo");
    } else {
      if (fi.files.length > 2) {
        alert("please uplad at most two file or photo");
      } else {
        att = true;
      }
    }

    if (att) {
 
      document.form.submit();
    }
  }
}
