  $(document).ready(function() {

    $(document).delegate('.thunbnailA', 'mouseenter', function() {
      $(this).find(".leyendaThumbnailA").animate({
        top: '60%'
      }, 300)
    });

    $(document).delegate('.thunbnailA', 'mouseleave', function() {
      $(this).find(".leyendaThumbnailA").animate({
        top: '100%'
      }, 100)
    });

  });