// make the tabs element stick to top if it has the class `is-sticky`
// only one sticky element is supported at a time
(function() {
  var tabs = document.querySelector('.tabs-bar-wrap.is-sticky');

  if (!tabs) {
    return;
  }

  var fixed,
    offsetTop = tabs.offsetTop,
    navbar = document.querySelector('.nav-bar-wrap');

  if (navbar && navbar.classList.contains('fixed')) {
    tabs.classList.add('has-top');
    offsetTop -= navbar.offsetHeight;
  }

  function checkScrollPosition() {
    if (offsetTop < window.pageYOffset && !fixed) {
      fixed = true;
      tabs.classList.add('fixed');
    }

    if (offsetTop >= window.pageYOffset && fixed) {
      fixed = false;
      tabs.classList.remove('fixed');
    }
  }

  // position on scroll
  window.addEventListener('scroll', checkScrollPosition, false);
  // listen for content ready
  document.addEventListener('DOMContentLoaded', checkScrollPosition, false);
  // ie listener
  document.addEventListener('onreadystatechange', checkScrollPosition, false);
})();
