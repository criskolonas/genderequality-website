//Creates Section Card and events and returns the created card
function createSectionCard(aTitle,aContent,anImage) {
  //Creates HTML elements
  var card = document.createElement("div");
  card.className = "col-sm";
  var cardbody = document.createElement("div");
  cardbody.className = "card h-100 card-body";
  cardbody.style.width = "18rem";
  var cardimage = document.createElement("img");
  cardimage.className = "card-img-top";
  cardimage.src=anImage;
  var cardbody2 = document.createElement("div");
  cardbody2.className = "card-body";
  var cardtitle = document.createElement("p");
  cardtitle.className = "card-text";
  cardtitle.textContent = aTitle;
  var cardeditbtn = document.createElement("button");
  cardeditbtn.type = "button";
  cardeditbtn.className = "btn btn-warning";
  cardeditbtn.textContent = "Edit";
  var carddeletebtn = document.createElement("button");
  carddeletebtn.type = "button";
  carddeletebtn.className = "btn btn-danger";
  carddeletebtn.textContent = "Delete";
  carddeletebtn.addEventListener("click",function(){createDelEvent(card)});
  cardeditbtn.addEventListener("click",function(){createEditEvent(aTitle,aContent)});
  //Binds created elements together
  cardbody2.appendChild(cardtitle);
  cardbody.appendChild(cardimage);
  cardbody.appendChild(cardbody2);
  cardbody.appendChild(cardeditbtn);
  cardbody.appendChild(carddeletebtn);
  card.appendChild(cardbody);
  return card;
};


//Creates Event to delete section with a fade-out effect
function createDelEvent(card) {
    var fadeTarget = card;
    var fadeEffect = setInterval(function() {
      if (!fadeTarget.style.opacity) {
        fadeTarget.style.opacity = 1;
      }
      if (fadeTarget.style.opacity > 0) {
        fadeTarget.style.opacity -= 0.1;
      } else {
        clearInterval(fadeEffect);
      }
    }, 25);
    setTimeout(function() {
      card.remove();
    }, 400);
};

//Adds Event to create a modal box for section content editing
function createEditEvent(title,content) {
    var modal = document.createElement("div");
    modal.className = "modal";
    var modalbox = document.createElement("div");
    modalbox.className = "modal-content"
    var done = document.createElement("button");
    done.className = "btn btn-success";
    done.id = "donebtn";
    done.textContent = "Done";
    var titlebox = document.createElement("textarea");
    titlebox.className = "titlebox";
    titlebox.rows = 1;
    titlebox.cols = 15;
    titlebox.value = title;
    var textbox = document.createElement('textarea');
    textbox.className = "textbox";
    textbox.rows = 15;
    textbox.cols = 15;
    textbox.value = content;
    var imgupload = document.createElement("input");
    imgupload.setAttribute("type", "file");
    var modalcontainer = document.getElementById('modal-container');
    modalbox.appendChild(titlebox);
    modalbox.appendChild(textbox);
    modalbox.appendChild(imgupload);
    modalbox.appendChild(done);
    modal.appendChild(modalbox);
    modalcontainer.appendChild(modal);

    modal.style.display = "block";
    //Hides modal on button click
    done.onclick = function() {
      modal.style.display = "none";
    }
};

//Appends created Card to HTML
function appendCard(title,content,image) {
  var cardContainer = document.getElementById('card-container');
  cardContainer.appendChild(createSectionCard(title,content,image));
};
