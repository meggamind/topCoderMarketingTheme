( function( $ ) {
  if (/MSIE \d|Trident.*rv:|Edge/.test(navigator.userAgent)) {
    $('.image-container').each(function () {
        var $container = $(this);
        var imgEle = $container.find('img');

        // mask element for blending mode
        var maskEle = $container.find('div.image-mask');
        var imgUrl = imgEle.prop('src');

        if (imgUrl) {
            if (maskEle.length > 0) {
                // attach the background image style to image mask element if exist
                maskEle.css('backgroundImage', 'url(' + imgUrl + ')');
            } else {
                $container.css('backgroundImage', 'url(' + imgUrl + ')').addClass('image-object-fit');
            }
        }
    });
  }
} )( jQuery );
