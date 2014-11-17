  function prepareList() {
      $('#expList').find('li:has(ul)')
        .click( function(event) {
          if (this == event.target) {
            $(".clickHide").toggle();
            $(this).toggleClass('expanded');
            $(this).children('ul').toggle('medium');
            $(this).children('ul').css("font-size", ".5em");
          }
          event.stopPropagation();
        })
        .addClass('collapsed')
        .children('ul').hide();
      };
     
      $(document).ready( function() {
          prepareList();
      });