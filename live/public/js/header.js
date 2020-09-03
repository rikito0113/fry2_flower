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
}

var mySwiper = new Swiper ('.swiper-container', {
    effect: "flip",
    loop: true,
    pagination: '.swiper-pagination',
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
  })
