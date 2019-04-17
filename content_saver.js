document.body.style.border = "5px solid red";

function openPage() {
  browser.tabs.create({
    url: "https://google.com"
  });
}

browser.browserAction.onClicked.addListener(openPage);

/*
document.addEventListener("click", function(e) {
	var gettingCurrent = browser.tabs.getCurrent();
	console.log(gettingCurrent);

  if (!e.target.classList.contains("page-choice")) {
    return;
  }

  var chosenPage = "https://" + e.target.textContent;
  browser.tabs.create({
    url: chosenPage
  });

});*/