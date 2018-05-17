(function () {

  // toggles HeaderSearch section
  function toggleHeaderSearchInit() {
    var searchLink = document.querySelector('.main-header .search-link');
    var mainHeader = document.querySelector('.main-header');
    
    searchLink.addEventListener('click', function () {
      if (!mainHeader.classList.contains('has-search-bar')) {
        mainHeader.classList.add('has-search-bar');
      } else {
        mainHeader.classList.remove('has-search-bar');
      }
    })
  }

  toggleHeaderSearchInit();
})();