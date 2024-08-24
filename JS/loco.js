if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
const scroll = new LocomotiveScroll({
    el: document.querySelector('body'),
    smooth: true
});