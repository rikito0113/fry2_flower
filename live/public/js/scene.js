
/*
 *
 * fujiwara
 * scene.js
 * チュートリアルとメモリー時に使用
 *
 * あらかじめbladeファイルでグローバル変数として宣言しておく
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

function nextClick() {
    count++;
    createGirlChat(tutorialPhrase[count]['content']);

    count++;
    createPlayerChat(tutorialPhrase[count]['content']);

    ////// 背景画像の切り替え //////
    var imgId = tutorialPhrase[count]['img_id'];
    wrapperElement.style.backgroundImage = "url('./images/tutorial/${imgId}.png')";
}


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
}
