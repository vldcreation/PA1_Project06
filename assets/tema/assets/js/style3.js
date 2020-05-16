$(window).on('load', function() {
    var pre_loader = $('#loader-wrapper');
    pre_loader.delay(2000).fadeOut( 'slow', function() {
      $(this).remove();
    });
  });

  $(window).on('load', function() {
    var pre_loader = $('#loader');
    pre_loader.delay(2000).fadeOut( 'slow', function() {
      $(this).remove();
    });
  });

  $(window).on('load', function() {
    var pre_loader = $('#loader-section section-left');
    pre_loader.delay(2000).fadeOut( 'slow', function() {
      $(this).remove();
    });
  });

  $(window).on('load', function() {
    var pre_loader = $('#loader-section section-right');
    pre_loader.delay(2000).fadeOut( 'slow', function() {
      $(this).remove();
    });
  });