// Select DOM Items
const menuBtn = document.querySelector('.menu-btn');
const menu = document.querySelector('.menu');
const menuNav = document.querySelector('.menu-nav');
const menuBranding = document.querySelector('.menu-branding');
const navItems = document.querySelectorAll('.nav-item');

// Set Initial State Of Menu
let showMenu = false;

menuBtn.addEventListener('click', toggleMenu);

function toggleMenu() {
  if (!showMenu) {
    menuBtn.classList.add('close');
    menu.classList.add('show');
    menuNav.classList.add('show');
    menuBranding.classList.add('show');
    navItems.forEach(item => item.classList.add('show'));

    // Set Menu State
    showMenu = true;
  } else {
    menuBtn.classList.remove('close');
    menu.classList.remove('show');
    menuNav.classList.remove('show');
    menuBranding.classList.remove('show');
    navItems.forEach(item => item.classList.remove('show'));

    // Set Menu State
    showMenu = false;
  }
}


// preloader jquery function

// $(window).on("load", function () {
//   $(".preloader").addClass("complete");
// });

$(window).on("load", function () {
  $(".preloader").fadeOut(2500);
});


// progress bar jquery 


function move(item, percent) {
  var elem = document.getElementById(item);
  var width = 10;
  var id = setInterval(frame, 30);
  function frame() {
    if (width >= percent) {
      clearInterval(id);
    } else {
      width++;
      elem.style.width = width + '%';
      elem.innerHTML = width * 1 + '%';
    }
  }
}

move("skill-html", 80);
move("skill-css", 85);
move("skill-jquery", 60);
move("skill-php", 70);
move("skill-sql", 60);
move("skill-english", 60);
move("skill-russion", 50);
move("skill-turkish", 99);


