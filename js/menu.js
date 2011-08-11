
function initMenu() {
  jQuery('#menu-main-menu ul:first').show();
  jQuery('#menu-main-menu li a').click(
    function() {
      var checkElement = jQuery(this).next();
      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
        return true;
        }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
        jQuery('#menu-main-menu ul:visible').slideUp('normal');
        checkElement.slideDown('normal');
        return true;
        }
      else{return true;}
      }
    );
  }
jQuery(document).ready(function() {initMenu();});