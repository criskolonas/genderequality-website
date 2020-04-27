//getting the required DOM elements
var table = document.getElementById("membertable");
var idbox = document.getElementById("idbox");
var emailbox = document.getElementById("emailbox");
var passbox = document.getElementById("passbox");
var done = document.getElementById("donebtn");
var modal = document.getElementById("modd");
//Creates a member row and adds edit and delete events
function createMember() {
  var member = table.insertRow(table.length);
  var memid = member.insertCell(0);
  var mememail = member.insertCell(1);
  var mempass = member.insertCell(2);
  //creating html elements
  memid.innerHTML = "ID";
  mememail.innerHTML = "@email.com";
  mempass.innerHTML = "123";
  var edit = member.insertCell(3);
  var editbtn = document.createElement("button");
  editbtn.className = "btn btn";
  editbtn.setAttribute('type', 'button');
  editbtn.innerHTML = "Edit";
  var delet = member.insertCell(4);
  var deletebtn = document.createElement("button");
  deletebtn.className = "btn btn";
  deletebtn.setAttribute('type', 'button');
  deletebtn.innerHTML = "Delete";

  editbtn.addEventListener("click", function() {
    rowEdit(memid, mememail, mempass)
  });



  deletebtn.addEventListener("click", function() {
    rowRemove(member.rowIndex)
  });
  //Appending to HTML
  delet.appendChild(deletebtn);
  edit.appendChild(editbtn);

};
//Replaces values with inputs. Event listener for "Enter" key.
function rowEdit(memid, mememail, mempass) {
  memid.innerHTML = "<input type = 'text'  id = 'idinput' />";
  memid.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      memid.innerHTML = document.getElementById("idinput").value;
    }
  });
  mememail.innerHTML = "<input type = 'text' id = 'emailinput' />";
  mememail.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      mememail.innerHTML = document.getElementById("emailinput").value;
    }
  });
  mempass.innerHTML = "<input type = 'text' id = 'passinput' />";
  mempass.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
      mempass.innerHTML = document.getElementById("passinput").value;
    }
  });
};
//removes selected row
function rowRemove(index) {
  table.deleteRow(index)

}
