
/*This code is used to clear the input text for creating event*/
$(document).ready(function () {
    $(".reset").click(function() {
        $(this).closest('form').find("input[type=text], textarea").val("");
    })

});



/*Here we add a read more to paragragraphs that are long*/
$(document).ready(function() {

    /* Count of paragraphs shown */
    var cutCount = 2;

    $("#description_paragraph p").each(function (i) {
        i++;
        if(i == cutCount) {
            $(this).append(' <a href="javascript:void(1)" onclick="$(\'#testID p\').show(); $(this).hide()">Read more</b>')   
        }
        if(i > cutCount) {
         $(this).hide();
     }
 });

});

/*This Java Script is for the datatable*/

$(document).ready(function() {
  $('#example').DataTable( {
    responsive: true
} );

} );


/*Here we hide the long text in the description to fit the td*/
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 100;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});