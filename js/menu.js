
jQuery(function() {
  //when page opens-----------------
  //add css style to first word main link
  $mainlinks = jQuery('#main ul.menu > li > a');
  jQuery($mainlinks).each(function(i,val){
    $linktext = jQuery(val).text();
    $firstword = $linktext.indexOf(' ') > 0 ? $linktext.substr(0,$linktext.indexOf(' ')) : $linktext ;
    $linktext = $linktext.replace($firstword,'<span>' + $firstword + '</span>');
    jQuery(val).html($linktext);
    });
  $mainlinks.find('span').css('font-weight','bold');
  //select the current-menu-item
  $element = jQuery('#main li.current-menu-item');
  //modify element css
  //$element.children('a').css('font-weight','bold');
  //if menu level 2, show the ul list menu
  if(jQuery($element).children('ul.sub-menu').length || jQuery($element).parent('ul.sub-menu').length){
  //select the ul
    $ulelement = jQuery($element).parent().hasClass('menu') ? jQuery($element).children('ul') : jQuery($element).parent();
    $ulelement.show();
    $ulelement.siblings('a').css({'padding-top':'2px','height':'auto','color':'#ffe5ae','margin-left':'5px'});
    $ulelement.parent().css({'min-height':'79px','background-color':'#a40c34'});
    $ulelement.children().find('a').css('margin-left','5px');
  }
  
  //interactive behavior----------------
  jQuery('#main ul.menu > li').not('li.current-menu-parent, li.current-menu-item').hover(
    function() {
      jQuery(this).css('background-color','#A40C34');
      jQuery('a',this).css('color','#FFE5AE');
      },
    function() {
      jQuery(this).css('background-color','#FFE5AE');
      jQuery('a',this).css('color','#731B36');
      }
    );
  /*jQuery('#main ul.menu > li.current-menu-parent, #main ul.menu > li.current-menu-item').siblings().hover(
    function() {
      jQuery(this).css('min-height','77px')
                  .children('ul:hidden').show()
                                        .siblings('a')
                                        .css('padding-top','18px')
                                        .css('height','auto');
      },
    function() {
      jQuery(this).children('ul').hide()
                                .siblings('a')
                                .css('padding-top','37px')
                                .css('height','40px');
      }
    );*/
  
  //change title style for hover-tmpl
  $specialTitle = jQuery('article.hero-footer h1.entry-title');
  if($specialTitle.length > 0){
    jQuery($specialTitle).each(function(i,val){
      $titletext = jQuery(val).text();
      $firstword = $titletext.indexOf(' ') > 0 ? $titletext.substr(0,$titletext.indexOf(' ')) : $titletext ;
      $titletext = $titletext.replace($firstword,'<span>' + $firstword + '</span>');
      jQuery(val).html($titletext);
      });
  }
  
  //add link to quote paragraph
  jQuery('#aside_quote p').wrapInner('<a href="' + jQuery('#aside_quote li a').attr('href') + '" />');
});