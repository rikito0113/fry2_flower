
/*
 *
 * fujiwara
 * scene.js
 * チュートリアルとメモリー時に使用
 *
 * あらかじめbladeファイルでグローバル変数として宣言しておく
 * (ex)
 * <script>
 *     let tutorialPhrase = @json($tutorial_phrase);
 * </script>
 *
*/

let count = 0;
let wrapperElement;

window.addEventListener('load', function() {
    wrapperElement = document.getElementById("wrapper-scene");

    createGirlChat(tutorialPhrase[count]['content']);
    count++;
    createPlayerChat(tutorialPhrase[count]['content']);
})

/*
 * div要素作成(girl)
 *
 * @param string phrase
*/
function createGirlChat(phrase) {
    var newGirlElement = document.createElement("div");
    newGirlElement.setAttribute("class", "chat-text-left");
    var newGirlContent = document.createElement("div");
    newGirlContent.setAttribute("class", "chat-text");
    var content = document.createTextNode(phrase);
    newGirlContent.appendChild(content);
    newGirlElement.appendChild(newGirlContent);

    wrapperElement.appendChild(newGirlElement);

    // 改行
    wrapperElement.appendChild(document.createElement("br"));
    wrapperElement.appendChild(document.createElement("br"));
}


/*
 * div要素作成(player)
 *
 * @param string phrase
*/
function createPlayerChat(phrase) {
    var newPlayerElement = document.createElement("div");
    newPlayerElement.setAttribute("class", "chat-text-right");
    var newPlayerContent = document.createElement("div");
    newPlayerContent.setAttribute("class", "chat-text");
    var content = document.createTextNode(phrase);
    newPlayerContent.appendChild(content);
    newPlayerElement.appendChild(newPlayerContent);

    wrapperElement.appendChild(newPlayerElement);

    // 改行
    wrapperElement.appendChild(document.createElement("br"));
    wrapperElement.appendChild(document.createElement("br"));
    wrapperElement.appendChild(document.createElement("br"));
}

function nextClick() {
    count++;
    if (tutorialPhrase[count]) {
        createGirlChat(tutorialPhrase[count]['content']);

        count++;
        createPlayerChat(tutorialPhrase[count]['content']);

        ////// 背景画像の切り替え //////
        var imgId = tutorialPhrase[count]['img_id'];
        wrapperElement.style.backgroundImage = "url('../images/tutorial/"+imgId+".png')";
        wrapperElement.style.backgroundSize = "contain";
        wrapperElement.style.backgroundRepeat = "no-repeat";
        wrapperElement.style.backgroundPosition = "center";
        wrapperElement.style.width = "100%";
        wrapperElement.scrollIntoView(false);
    }
}