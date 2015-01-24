$(document).ready(function() {
   
    $('.stylestyle3').hide();
   
	$('#displaymarker').on( "click", function() {
        $("#markercnt").toggle();
    });
	$('#advanced').on( "click", function() {
        $("#advancedtips").toggle();
		$("#tips").toggle();
    });
	
    // Check the value of Style's dropdown when it changes;
	$('.eventschange').bind("DOMSubtreeModified",function(){
        checkDropDown();
    });
    
    function checkDropDown(){
        var style = $('#style').find(":selected").val();
        // If style is Small, hide other options;
        if (style === "1"){
            $("#style2").hide(400);
			$('.stylestyle3').hide();
        
        // If not, show them;
        } else if (style === "2") {
            $("#style2").show(400);
            $("#background").show();
            $("#url").hide();
            $("#grayscale2").show();
			$('.stylestyle3').show();
            
        } else {
            $("#style2").show(400);
            $("#background").hide();
            $("#url").show();
            $("#grayscale2").hide();
			$('.stylestyle3').hide();
        };
    };
});