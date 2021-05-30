
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

function setRandomSocialLink() {
  let href;
  let src;
  let alt;
  const r = Math.random();
  if (r < .2) {
    alt = 'twitter';
    href = 'https://twitter.com/KevinAWorkman';
    class_ = '<i class="fab fa-twitter"></i>';
  } else if (r < .4) {
    alt = 'facebook';
    href = 'http://www.facebook.com/HappyCoding.io';
    class_ = '<i class="fab fa-facebook"></i>';
  } else if (r < .6) {
    alt = 'github';
    href = 'https://github.com/KevinWorkman/HappyCoding';
    class_ = '<i class="fab fa-github"></i>';
  } else if (r < .8) {
    alt = 'etsy';
    href = 'https://www.etsy.com/shop/HappyCoding';
    class_ = '<i class="fab fa-etsy"></i>';
  } else {
    alt = 'youtube';
    href = 'https://youtube.com/kevinaworkman';
    class_ = '<i class="fab fa-youtube"></i>';
  }

  const aElement = document.getElementById('social-nav-link');
  const imgElement = document.getElementById('social-nav-img');

  aElement.href = 'https://github.com/suhaas-livcd';//href;
  imgElement.innerHTML = '<i class="fab fa-github"></i>';//class_;
}

window.onload = function () {
  setRandomBackground();
}

// if (Modernizr.csstransitions) {
//   setInterval(randomizeNavColor, 10000);
// }
