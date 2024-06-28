//admin pro
(function () {
    const floodBtn = document.getElementById("btn-flood");
    const windstormBtn = document.getElementById("btn-windstorm");
    const popupFlood = document.getElementById("popup-flood");
    const popupWindstorm = document.getElementById("popup-windstorm");
    const floodExit = document.getElementById("floodExit");
    const windstormExit = document.getElementById("windstormExit");
  
    if (floodBtn && windstormBtn) {
      floodBtn.addEventListener("click", () => {
        document.body.classList.add("overflow-hidden");
        popupFlood.classList.replace("d-none", "d-block");
      });
  
      floodExit.addEventListener("click", () => {
        document.body.classList.remove("overflow-hidden");
        popupFlood.classList.replace("d-block", "d-none");
      });
      windstormBtn.addEventListener("click", () => {
        document.body.classList.add("overflow-hidden");
        popupWindstorm.classList.replace("d-none", "d-block");
      });
  
      windstormExit.addEventListener("click", () => {
        document.body.classList.remove("overflow-hidden");
        popupWindstorm.classList.replace("d-block", "d-none");
      });
    }
  })();
  