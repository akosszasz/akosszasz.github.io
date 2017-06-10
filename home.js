var didScroll = false;

window.onscroll = scrollPage;

var lastSection = "empty";
var hover = false;

setInterval(function() {
    if(didScroll) {
        didScroll = false;
    }
}, 100);

function hoverEnter() {
  hover = true;
  scrollPage();
}
function hoverLeave() {
  hover = false;
  document.getElementById(lastSection).className = lastSection;
  document.getElementById("welcome-text").className = "";
  lastSection = "empty"
  works.className = "works";
  about.className = "about";
  music.className = "music";
}

function scrollPage() {
  if(!hover) return;
  didScroll = true;
  var midDiv = document.getElementById("welcome-text");
  var works = document.getElementById("works");
  var about = document.getElementById("about");
  var music = document.getElementById("music");
  var empty = document.getElementById("empty");
  if(midDiv.getBoundingClientRect) {
      var divRect = midDiv.getBoundingClientRect();
      var checkRect = works.getBoundingClientRect();
      if(divRect.bottom < checkRect.top) {
        var lastElem = document.getElementById(lastSection);
        if(lastElem === empty) return;
        lastElem.className = lastSection;
        lastSection = "empty";
        return;
      }
      if(divRect.bottom < checkRect.bottom) {
        var lastElem = document.getElementById(lastSection);
        if(lastElem === works) return;
        lastElem.className = lastSection;
        lastSection = "works";
        works.className = "works-h";
        about.className = "";
        music.className = "";
        midDiv.className = "works-hdiv"
        return;
      }
      checkRect = about.getBoundingClientRect();
      if(divRect.bottom < checkRect.bottom) {
        var lastElem = document.getElementById(lastSection);
        if(lastElem === about) return;
        lastElem.className = lastSection;
        lastSection = "about";
        works.className = "";
        about.className = "about-h";
        music.className = "";
        midDiv.className = "about-hdiv"
        return;
      }
      checkRect = music.getBoundingClientRect();
      if(divRect.bottom < checkRect.bottom) {
        var lastElem = document.getElementById(lastSection);
        if(lastElem === music) return;
        lastElem.className = lastSection;
        lastSection = "music";
        works.className = "";
        about.className = "";
        music.className = "music-h";
        midDiv.className = "music-hdiv"
        return;
      }
    }
}

function jumpPage() {

    var midDiv = document.getElementById("welcome-text");

    if(midDiv.getBoundingClientRect) {
        var divRect = midDiv.getBoundingClientRect();

        var checkRect = document.getElementById("works").getBoundingClientRect();
        if(divRect.bottom < checkRect.top)
            return;
        if(divRect.bottom < checkRect.bottom) {
            alert("works");
            return;
        }
        checkRect = document.getElementById("about").getBoundingClientRect();
        if(divRect.bottom < checkRect.bottom) {
            alert("about");
            return;
        }
        checkRect = document.getElementById("music").getBoundingClientRect();
        if(divRect.bottom < checkRect.bottom) {
            alert("music");
            return;
        }
    }
}
