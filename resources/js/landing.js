function desktop() {
  document.addEventListener("DOMContentLoaded", function () {
    let layer = document.querySelector(".sponsors");
    document.addEventListener("mousemove", (event) => {
      layer.style.transform = "translateX(-" + event.clientX / 2 / 6 + "px)";
    });
  });
}
function mobile() {}
function checkResolution() {
  var screenWidth = window.innerWidth;
  var threshold = 720; // Разрешение экрана, с которого хотите начать выполнение скрипта

  if (screenWidth >= threshold) {
    desktop();
  } else {
    mobile();
  }
}

// Проверяем разрешение при загрузке страницы
checkResolution();
