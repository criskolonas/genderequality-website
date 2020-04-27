function register(){
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
}
function login(){
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0px";
}
function loginchoose(form)
{
  if(form.usrid.value=="admin" && form.passwrd.value=="admin")
  {
    alert("Welcome Admin");
    window.open("editcontent.html");
  }else{
    alert("Welcome Member");
    window.location.assign("index.html");
  }


}
