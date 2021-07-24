
function setRandomBackground() {
  // https://stackoverflow.com/questions/22692588/random-hex-generator-only-grey-colors/22692743
  // var value = Math.random() * 0xFF | 0;
  // var grayscale = (value << 16) | (value << 8) | value;
  // var color = '#' + grayscale.toString(16);
  // console.log(color);
  // document.getElementsByTagName("body")[0].style.backgroundColor = '#ececec';
}

function randomizeNavColor() {
  const bgColor = 'rgb(' +
    randomInt(220, 255) + ', ' +
    randomInt(220, 255) + ', ' +
    randomInt(220, 255) + ')';
  document.getElementsByTagName("nav")[0].style.backgroundColor = bgColor;

  Array.from(document.querySelectorAll(".random-color")).forEach(el => {
    const fgColor = 'rgb(' +
      randomInt(0, 50) + ', ' +
      randomInt(0, 50) + ', ' +
      randomInt(0, 50) + ')';
    el.style.color = fgColor;
  });
}

function randomInt(min, max) {
  return Math.floor(min + Math.random() * (max - min));
}

window.onload = function () {
  setRandomBackground();
}

// if (Modernizr.csstransitions) {
//   setInterval(randomizeNavColor, 10000);
// }
