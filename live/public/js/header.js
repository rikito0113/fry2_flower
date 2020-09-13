var appearTag = function () {
  var tags = document.getElementsByName("tag");

  console.log("click");

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
