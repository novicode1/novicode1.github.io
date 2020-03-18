class Tic {
  constructor() {
    this.storage = new Array();
    this.pattern = new Array();
    this.button = document.querySelectorAll('.box');
    this.play = 1;
    this.winPlay = null;
  }

  buildPattern() {
    this.pattern.push(
      [0, 1, 2],
      [1, 2, 3],

      [4, 5, 6],
      [5, 6, 7],

      [8, 9, 10],
      [9, 10, 11],

      [12, 13, 14],
      [13, 14, 15],

      [0, 4, 8],
      [4, 8, 12],

      [1, 5, 9],
      [5, 9, 13],

      [2, 6, 10],
      [6, 10, 14],

      [3, 7, 11],
      [7, 11, 15],

      [4, 9, 14],
      [0, 5, 10],
      [5, 10, 15],
      [1, 6, 11],

      [2, 5, 8],
      [3, 6, 9],
      [6, 9, 12],

      [7, 10, 13],
    );
  }

  buildStorage() {
    this.storage = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
  }

  getWin(getPlay, getPattern) {
    let count = 0;

    for (let i in getPattern) {
      if (this.storage[getPattern[i]] === getPlay) {
        count++;
      }
    }

    if (count === 3) {
      this.winPlay = getPlay;
    }
  }

  confirmPattern(getPlay, aiValidate) {
    let returnValue = false;

    for (let i in this.pattern) {
      let matchCount = 0;

      for (let j in this.pattern[i]) {
        let matchIndex = this.pattern[i][j];

        if (this.storage[matchIndex] === getPlay) {
          matchCount++;
        }
        else if (this.storage[matchIndex] > 0) {
          matchCount--;
        }
      }

      if (matchCount > 1 && aiValidate) {
        returnValue = this.pattern[i];

        break;
      }
      else if (matchCount > 2 && !aiValidate) {
        returnValue = this.pattern[i];

        break;
      }
    }

    return returnValue;
  }

  computerMove() {
    let patternResult = this.confirmPattern(1, true);

    if (!patternResult) {
      let isNext = true;

      while (isNext) {
        let random = Math.floor(Math.random() * 9);

        if (this.storage[random] === 0) {
          this.storage[random] = this.play;

          isNext = false;

          this.buildTable();
          this.play = 1;
        }
        else {
          for (let i in this.storage) {
            isNext = false;

            if (this.storage[i] === 0) {
              isNext = true;

              break;
            }
          }
        }
      }
    }
    else {
      for (let i in patternResult) {
        if (this.storage[patternResult[i]] === 0) {
          this.storage[patternResult[i]] = this.play;

          this.buildTable();
          this.play = 1;
        }
      }
    }
  }

  buildTable() {
    let tic = this;
    let countStorage = 0;

    for (let i in this.storage) {
      if (this.storage[i] == 0) {
        countStorage++;
      }
    }

    Array.prototype.forEach.call(this.button, function(btn, i) {
      btn.classList.remove('blue');
      btn.classList.remove('red');

      switch(tic.storage[i]) {
        case 1:
          btn.classList.add('blue');

          break;
        case 2:
          btn.classList.add('red');

          break;
      }
    });

    if (this.play === 0) {
      this.play = 1;
    }
    else if (this.play === 1) {
      this.play = 2;

      tic.computerMove();
    }

    tic.getWin(1, tic.confirmPattern(1, false));
    tic.getWin(2, tic.confirmPattern(2, false));

    if (!!this.winPlay) {
      alert('Игрок ' + this.winPlay + ' Выиграл! за ' + (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds))
      setTimeout(this.reset, 1200);
      return
    }
    else if (countStorage == 0) {
      if (confirm('Ничья!')) {
        this.reset();
      }
    }
  }

  main() {
    this.buildPattern();
    this.buildStorage();
  }

  reset() {
    document.location.reload(true);
    timer();
  }
}

let tic = new Tic();

tic.main();

Array.prototype.forEach.call(tic.button, function(btn, i) {
  btn.addEventListener('click', function() {
    if (tic.play === 1) {
      if (tic.storage[i] === 0) {
        tic.storage[i] = tic.play;

        tic.buildTable();

        if (hours !== 0 || seconds !== 0 || minutes !== 0) return
        timer();
      }
    }
  });
});

let h1 = document.getElementById('timer'),
    seconds = 0, minutes = 0, hours = 0, t;

function add() {
  seconds++;
  if (seconds >= 60) {
    seconds = 0;
    minutes++;

    if (minutes >= 60) {
      minutes = 0;
      hours++;
    }
  }

  h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);

  timer();
}

function timer() {
  t = setTimeout(add, 1000);
}
