/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {

  $(document).ready(function() {

    // Trigger open/close menu on click
    $('#block-discover-generic-user-block .menu-hook').click(
      function () {
        var submenu = $(this).next(".menu-links");
        if (submenu.is(":visible")) {
          submenu.fadeOut();
          $(this).removeClass("active_menu");
          submenu.children(".close-menu-link").remove();
        } else {
          submenu.fadeIn();
          $(this).addClass("active_menu").next(".menu-links").append('<div class="close-menu-link"></div');
        }
      }
    );

    // Hide the submenu when clicking the 'x'
    $(".close-menu-link").live("click",
      function() {
        $(this).parent().prev(".menu-hook").removeClass("active_menu");
        $(this).parent(".menu-links").fadeOut();
        $(this).remove()
      }
    );

    // jQuery Masonry for Plans
    $('.pinterest-view').masonry({
      itemSelector : '.pinterest-item',
      isResizable : true,
      isFitWidth: true,
      columnWidth : 218
    });

  });

})(jQuery, Drupal, this, this.document);
