$(document).ready(function() {
    
    // Check the value of Style's dropdown when it changes;
	$('.eventschange').bind("DOMSubtreeModified",function(){
        checkDropDown();
    });
    
    function checkDropDown(){
        var style = $('#style').find(":selected").text();
        
        // If style is Small, hide other options;
        if (style === "Small"){
            $("#style2").hide(400);
        
        // If not, show them;
        } else if (style === "Large") {
            $("#style2").show(400);
            $("#background").hide();
            $("#url").hide();
            
        } else {
            $("#style2").show(400);
            $("#background").show();
            $("#url").show();
        };
    };
});