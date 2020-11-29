var mySwiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

})

function bodyBackgroundSelection(list) {
  var profile = Math.floor(Math.random() * (list.length-2))
  var path = "url(/assets/images/backgrounds/"+list[profile]+")";
  document.body.style.backgroundImage = path;
  document.body.style.backgroundSize = "cover";
}


