$(document).ready(function() {
    
    // Check the value of Style's dropdown when it changes;
	$('.eventschange').bind("DOMSubtreeModified",function(){
        checkDropDown();
    });
    
    function checkDropDown(){
        var style = $('#style').find(":selected").val();
		console.log(style);
        // If style is Small, hide other options;
        if (style === "1"){
            $("#style2").hide(400);
        
        // If not, show them;
        } else if (style === "2") {
            $("#style2").show(400);
            $("#background").hide();
            $("#url").hide();
            $("#grayscale2").hide();
            
        } else {
            $("#style2").show(400);
            $("#background").show();
            $("#url").show();
            $("#grayscale2").show();
        };
    };
});