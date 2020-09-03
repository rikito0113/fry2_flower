var appearTag = function () {
  var tags = document.getElementsByName("tag");

  for(let tag of tags)
  {
    if(tag.style.display=="block"){
      // noneで非表示
      tag.style.display ="none";
    }else{
      // blockで表示
      tag.style.display ="block";
    }
  }
};

var mySwiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'vertical',
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  })
