if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
const scroll = new LocomotiveScroll({
    el: document.querySelector('.MainHome, .MainPage, .MainCart, .MainDetails, body'),
    smooth: true
});