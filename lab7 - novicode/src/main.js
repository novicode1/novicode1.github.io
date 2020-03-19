let colors = ['red', 'blue', 'green', 'black', 'pink'];

function changeColor() {
  document.body.style.background = colors[getRandomInt(5)];
};

function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

function changeImg () {
  document.getElementById('first-img').style.backgroundImage = "url('image-2.png')";
};

function changeBlock () {
  let textBlock = document.getElementsByClassName('text-block')[0];
  textBlock.style.width = '400px';
  textBlock.style.backgroundColor = colors[getRandomInt(5)];
  textBlock.innerHTML = "Ура!";
};

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
    if (value === null) return;
    callback(value);
  }

  form.onsubmit = function(event) {
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
