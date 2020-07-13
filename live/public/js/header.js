var appearTag = function () {
  const back = document.getElementById("back");

	if(back.style.display=="block"){
		// noneで非表示
		back.style.display ="none";
	}else{
		// blockで表示
		back.style.display ="block";
	}
}