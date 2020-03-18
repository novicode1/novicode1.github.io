
changeImg = () => {
  document.getElementById('first-img').style.backgroundImage = "url('image-2.png')";
};

changeBlock = () => {
  const elements = document.getElementsByClassName('third-block');
  for (let i = 0; i < elements.length; i++) {
    elements[i].style.width = '400px';
    elements[i].style.backgroundColor = "orange";
    elements[i].innerHTML = "Ура!";
  }
};


// Показать полупрозрачный DIV, чтобы затенить страницу
// (форма располагается не внутри него, а рядом, потому что она не должна быть полупрозрачной)
function showCover() {
  let coverDiv = document.createElement('div');
  coverDiv.id = 'cover-div';
  document.body.style.overflowY = 'hidden';
  document.body.append(coverDiv);
}

function hideCover() {
  document.getElementById('cover-div').remove();
  document.body.style.overflowY = '';
}

function showPrompt(text, callback) {
  showCover();
  let form = document.getElementById('prompt-form');
  let container = document.getElementById('prompt-form-container');
  document.getElementById('prompt-message').innerHTML = text;
  form.text.value = '';

  function complete(value) {
    hideCover();
    container.style.display = 'none';
    document.onkeydown = null;
    callback(value);
  }

  form.onsubmit = function() {
    let value = form.text.value;
    if (value === '') return false;

    complete(value);
    return false;
  };

  form.cancel.onclick = function() {
    complete(null);
  };

  document.onkeydown = function(e) {
    if (e.key === 'Escape') {
      complete(null);
    }
  };

  let lastElem = form.elements[form.elements.length - 1];
  let firstElem = form.elements[0];

  lastElem.onkeydown = function(e) {
    if (e.key === 'Tab' && !e.shiftKey) {
      firstElem.focus();
      return false;
    }
  };

  firstElem.onkeydown = function(e) {
    if (e.key === 'Tab' && e.shiftKey) {
      lastElem.focus();
      return false;
    }
  };

  container.style.display = 'block';
  form.elements.text.focus();
}

document.getElementById('show-button').onclick = function() {
  showPrompt("Введите ваше имя: ", function(value) {
    alert("Привет, " + value + "! Рады тебя видеть :)");
  });
};

const colors = ['white', 'blue', 'green', 'black', 'pink'];
let color;

changeColor = () => {
  color = colors.shift();
  colors.push(color);
  document.body.style.background = color;
};

