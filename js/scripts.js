( function( $ ) {

  /* youtube video Id */
  var videoId = window.videoId = "";

  (function () {

      // toggles HeaderSearch section
      function toggleHeaderSearchInit() {
        var searchLink = document.querySelector('.main-header .search-link');
        var mainHeader = document.querySelector('.main-header');
        if (searchLink) {
          searchLink.addEventListener('click', function () {
            if (!mainHeader.classList.contains('has-search-bar')) {
              mainHeader.classList.add('has-search-bar');
            } else {
              mainHeader.classList.remove('has-search-bar');
            }
          })
          $('.text-ctrl').on('input', function (e) {
            if (e.target.value) {
              $(e.target).addClass('text-ctrl-has-value');
            } else {
              $(e.target).removeClass('text-ctrl-has-value');
            }
          });
          $('.text-ctrl').map(function (i, textCtrl) {
            var $textCtrl = $(textCtrl);
            if (textCtrl.nextElementSibling) {
              $(textCtrl.nextElementSibling).on('click', function () {
                $textCtrl.val('');
                $textCtrl.removeClass('text-ctrl-has-value');
              })
            }
          });
        }
      }

      toggleHeaderSearchInit();

      // searchInit
      function searchInit() {
        var searchCardTemplate = "<div class='search-card'>\
     <h3 class='search-card-title'><a class='title-link'></a></h3>\
     <div class='desc'></div>\
     <div class='actions'>\
      <a class='target-link'></a>\
     </div>\
     </div>";

      };

      searchInit();

      // menuInit
      function menuInit() {
        var $body = $('body');
        $('.nav-mobile').on('click', function(e){
          e.stopPropagation();
        });

        function closeNav() {
          $body.removeClass('nav-open');
          $body.off('click', closeNav)
        }
        $('.main-header .toggle-link').on('click', function () {
          if ($body.hasClass('nav-open')){
            $body.removeClass('nav-open');
            setTimeout(function () {
              $body.off('click', closeNav)
            }, 0);
          } else{
            $body.addClass('nav-open');

            setTimeout(function () {
              $body.on('click', closeNav)
            }, 0);
          }
        });
      }
      menuInit();

      var canHideSubmenu = false;

      function submenuInit() {
        $('.nav-menu .nav-menu-item').on('click', function () {
          var id = $(this).attr('data-submenu');
          if (!!id) {
            hideSubmenu();
            $('#' + id).addClass('active is-expanded');
            canHideSubmenu = false;
          } else {
            canHideSubmenu = true;
          }
        })
        /*
        $('.nav-menu .nav-menu-item').on('mouseleave', function () {
          var id = $(this).attr('data-submenu');
          canHideSubmenu = true;
          displayActiveSubnav();
        })
        */

        var subMenus = $('.bar-submenu');
        subMenus.on('mouseenter', function(){
          canHideSubmenu = false;
        })
        subMenus.on('mouseleave', function () {
          canHideSubmenu = true;
          displayActiveSubnav();
        })

        $('.nav-bar-wrap').on('click', function (e) {
          e.stopPropagation();
        });

        $('body').on('click', function() {
          canHideSubmenu = true;
          displayActiveSubnav();
        });

        function hideSubmenu() {
          $('.bar-submenu').removeClass('active');
        }

        // when mouse moves away in desktop view, then displays the subnav list for the active menu item
        function displayActiveSubnav(){
          var activeMenu = $('.nav-menu .active');
          var activeNavId = activeMenu.attr('data-submenu');
          window.setTimeout(function(){
            if (!!canHideSubmenu && !window.matchMedia('(max-width: 768px)').matches) {
              $('.bar-submenu.active').removeClass('active');
              $('#'+activeNavId).addClass('active');
            }
          }, 500)
        }

        displayActiveSubnav();

        // toggle sub nav expansion
        subMenus.map(function(i, subMenu){
          var $subMenu = $(subMenu);
          var link = $subMenu.find('.submenu-toggle-icon');
          link.on('click', function () {
            $subMenu.toggleClass('is-expanded');
          })
        });

      }
      submenuInit();

      // find '.panel-grid' with '.solution-wrap' in it and create a carousel child
      function initSolutionCarousel(){
        var panelGrids = $('.panel-grid');

        panelGrids.map(function(i, panelGrid){
          var solutions = $(panelGrid).find('.solution-wrap');
          if (solutions.length) {
            var carousel=$('<div class="carousel-wrap"><ul class="carousel-slider"/><div class="carousel-navigation"><div class="prev"/><div class="page"/><div class="next"/></div>');
            var slider = carousel.find('.carousel-slider');
            solutions.map(function(i,solution){
              slider.append($('<li class="carousel-slider-item"/>').append($(solution).clone()))
            });

            $(panelGrid).children().map(function(i, child){
              $(child).addClass('hide-md')
            });
            $(panelGrid).append(carousel)

          }
        })
      }

      initSolutionCarousel();

      function resizePlayer() {
        var $modal = $('.modal');
        var $ytPlayer = $('#ytplayer');
        var maxWidth = $modal.width();
        var maxHeight = $modal.height();
        console.log(maxWidth, maxHeight);
        if (maxWidth / maxHeight > 16 / 9) {
          $ytPlayer.css('width', maxHeight / 9 * 16).css('height', maxHeight);
        } else {
          $ytPlayer.css('width', maxWidth).css('height', maxWidth / 16 * 9);
        }
      }

      $('.modal .btn-close').on('click', function (e) {
        e.stopPropagation();
        $('.modal-wrap').removeClass('active');
        !!player && player.stopVideo();
        $(window).off('resize', resizePlayer);
      })

       $('.modal-wrap').on('click', function(e){
         if ($(this)[0] === e.target) {
           !!player && player.stopVideo();
           $('.modal-wrap').removeClass('active');
           $(window).off('resize', resizePlayer);
         }
       })


      //shows modal
      $('.btn-show-modal').on('click', function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        id=id.replace('#','');
        $('#video-modal').addClass('active');

        //embed video
        videoId = id;
        $(window).on('resize', resizePlayer);
        resizePlayer();
        !!player && !!player.loadVideoById ? player.loadVideoById(videoId) : embedVideo();
      })

      //youtube video embedder
      function embedVideo() {
        // Load the IFrame Player API code asynchronously.
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/player_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
      }

      $('.video-embedder, [data-video-id]').each(function () {
        var vid = $(this).attr('data-videoId');
        videoId = vid;
        embedVideo();
      });

      $('[data-video-id]').click(function() {
        var videoId = this.getAttribute('data-video-id');
        if (videoId) {
            player = new YT.Player(this, {
                height: '360',
                width: '640',
                videoId: videoId,
                playerVars: {'autoplay': 1}
            });
        }
      });



      //masonry init
      function initItMasonry() {
        if($('.dynamic-height-tiles ').length > 0) {
        $('.dynamic-height-tiles ').masonry({
          itemSelector: '.section-col'
        });
      }
    }

    initItMasonry();

    //function to bind show hide toggle
    $('.show-hide-card .typo-body-large').on('click', function(){
      var card = $(this).closest('.show-hide-card');
      if(card.hasClass('open')){
        card.removeClass('open');
      }else{
        card.addClass('open');
      }
    });

  })();

  // Replace the 'ytplayer' element with an <iframe> and
  // YouTube player after the API code downloads.
  var player;
  window.onYouTubePlayerAPIReady = function() {
    player = new YT.Player('ytplayer', {
      videoId: videoId,
      playerVars: {
        autoplay: 1,
        autohide: 1
      }
    });
  }

  // Footer toggle sub list
  $('.show-bottom-list').click(function(){
    var subList = $( $(this).data('list') );
    if (subList.hasClass('is-show')) {
      subList.removeClass('is-show');
    } else {
      $('.bottom-sub-list').removeClass('is-show');
      subList.addClass('is-show');
      $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    }
  });

  // enables disables news tabs
  function setNewsTab(tabName, e) {
    $('.tabs-bar .active').removeClass('active');
    $(e.target).addClass('active');

    $('.tab-section').addClass('disabled').removeClass('active');
    if (tabName === 'all') {
      $('.tab-section').removeClass('disabled');
    } else {
      $('#' + tabName).removeClass('disabled').addClass('active');
      $('.tablink-' + tabName).addClass('active');
    }
  }

  $('.tc-btn-loadmore').click(function(){

		var button = $(this),
        old_text = button.text(),
		    data = {
    			'action': 'loadmore',
    			'query': tc_loadmore_params.posts,
    			'page' : tc_loadmore_params.current_page
    		};

		$.ajax({
			url : tc_loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) {
					button.text( old_text );
          $('.load-more-insert').append(data);
					tc_loadmore_params.current_page++;

					if ( tc_loadmore_params.current_page == tc_loadmore_params.max_page ) {
            button.remove(); // if last page, remove the button
          }
				} else {
					button.remove(); // if no data, remove the button as well
				}
			}
		});
	});


    // filter by tags
  $('.taglist').on( 'change', $('.js-tag-filter .chkel'), function(){
    var activeTags = [];
    $('.taglist .chkel').each(function(i, item){
      if ($(item).is(':checked')) {
        activeTags.push($(item).val());
      }
    })


    // filterListByTags
    filterListByTags(activeTags, $('.story-list .grid-cell'));
  })

  //dynamically adding tags to filer list by aggeragation tags from the bloglist
  function dynamicallyAddTags(){
    if($('.js-aggregate-tags').length > 0) {
      var tagList = $('.story-list .grid-cell');
      var tags = {};
      tagList.map(function(i, item){
        var tagVal = $(item).attr('data-tags');
        if (!!tagVal && tagVal !== "") {
          var tagVals = tagVal.split(',');
          tagVals.map(function(tagItem, i){
            var tagLbl = tagItem.toLowerCase();
            if (!!tagLbl && tagLbl !== '' ){
              tags[tagLbl] = (!!tags[tagLbl]
                ? {
                  "count": parseInt(tags[tagLbl].count) + 1,
                  "label": tagItem
                }
                : {"count":1, "label": tagItem});
            }
          })
        }
      })

      populateTagListFilterOptions(tags, $('.taglist-group .taglist'));
    }
  }

  dynamicallyAddTags();

  // populates taglist filter options
  function populateTagListFilterOptions(tagVals, tagsList) {
    $(tagsList).html(' ');
    var tagListTemplate = $('<li class="seperation-t-xxs">\
      <label class="tc-checkbox-bar fluid js-tag-filter">\
        <input type="checkbox" class="chkel" value="">\
        <span class="label"></span>\
      </label>\
    </li>');

    Object.keys(tagVals).map(function(key, i){
      var clonedTemplate = tagListTemplate.clone();
      var item = tagVals[key];

      $('.chkel', clonedTemplate).attr('value', item.label);
      $('.label', clonedTemplate).html(item.label + ' (' + item.count + ')');

      $(tagsList).append(clonedTemplate);
    })
  }

  // if no tags paresent in all the tags then hides the tag section from the filter list popup
  function hideFilterTagListIfNoTag(){
    if ($('.js-hide-tagfilter-if-no-tag').length>0){
      var tagList = $('.story-list .grid-cell');

      var noTag = true;
      tagList.map(function(i, item){
        var tagVal = $(item).attr('data-tags');
        if(!!tagVal && tagVal!==""){
          noTag = false;
        }
      })

      if(noTag){
        $('.filter-popup .taglist-group').addClass('disabled');
      }
    }
  }

  hideFilterTagListIfNoTag();

  /*
  toggles filter popup
  */
  $('.js-toggle-filter-pop').on('click', function(e){
    e.stopPropagation();
    var p = $(this).parent();
    var pop = $('.filter-popup', p);
    var body = $('body');

    function showPop(){
      pop.addClass('open');
    }
    function hidePop(){
      pop.removeClass('open');
    }

    pop.on('click', function(e){
      e.stopPropagation();
    })

    if(pop.hasClass('open')){
      hidePop();
      $('body').off('click', hidePop);
    } else {
      showPop();
      $('body').on('click', hidePop);
    };
  })

  /*
    js set sortorder or bloglist
  */
  $('.js-set-sortorder').on('click', function(e){
    e.preventDefault();
    var order = $(this).attr('data-order');
    var popList = $(this).closest('.filter-popup .list');
    var sortList = $('.story-list');
    var storyListItems = $('.grid-cell', sortList);

    $('.active', popList).removeClass('active');
    $(this).addClass('active');

    if(order === 'most-popular') {
      resetSortByChronological(sortList);
      sortByPopularity(storyListItems);
    } else if (order === 'chronological') {
      resetSortByPopularity(storyListItems);
      sortByChronological(sortList);
    } else { // Posts are added to the dom by Wordpress in Reverse Chronological order by default
      resetSortByPopularity(storyListItems);
      resetSortByChronological(sortList);
    }
  })

  /* sorts items based on popularity */
  function sortByPopularity(list) {
    var maxPopularity = 99999999;
    list.map(function (i, item) {
      var popularity = $(item).attr('data-popularity');
      $(item).css('order', maxPopularity - popularity);
    })
  }

  function resetSortByPopularity(list) {
    list.map(function (i, item) {
      var popularity = $(item).attr('data-popularity');
      $(item).css('order', 0);
    })
  }

  function sortByChronological(listContainer) {
    $(listContainer).css('flex-flow', 'row-reverse wrap-reverse');
  }

  function resetSortByChronological(listContainer) {
    $(listContainer).css('flex-flow', 'row wrap');
  }

  /* filter list by tags */
  function filterListByTags(tagList, itemList){
    if (!tagList || tagList.length === 0){
      //show all items
      itemList.map(function(i, item){
        $(item).removeClass('disabled');
      })
    } else {
      itemList.map(function(i,item){
        var tagListStr = tagList.toString();
        $(item).addClass('disabled');
        var itemTags = $(item).attr('data-tags');
        itemTags = itemTags.toLowerCase();

        tagList.map(function (tagItem, i) {
          if ($.trim(tagListStr) !== '' && itemTags.indexOf(tagItem.toLowerCase()) > -1) {
            console.log($(item));
            $(item).removeClass('disabled');
          }
        })


      })
    }
  }

  /*
   * Trims extra whitespace from the query when searching
   */
  $('.search-bar-con').on('submit', function() {
    var input = $('#search-query');
    input.val($.trim(input.val()));
    return true;
  });

  $('.search-wrap').on('submit', function() {
    var input = $('#search-query-mobile');
    input.val($.trim(input.val()));
    return true;
  });

  // full width background - max width content
  $('.container-full').wrapInner("<div class='container-full-wrap'></div>");


} )( jQuery );
