jQuery(document).ready(function($){
	//Tabs Navigation Admin
	$(".saic-tab-content").hide(); //Hide all content
	$("#saic-tabs a:first").addClass("nav-tab-active").show(); //Activate first tab
	$(".saic-tab-content:first").show(); //Show first tab content
	
	//On Click Event
	$("#saic-tabs a").click(function() {
		$("#saic-tabs a").removeClass("nav-tab-active"); //Remove any "active" class
		$(this).addClass("nav-tab-active"); //Add "active" class to selected tab
		$(".saic-tab-content").removeClass("active").hide(); //Remove any "active" class and Hide all tab content
		var activeTab = $(this).attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn().addClass("active"); //Fade in the active content
		return false;
	});
	
	
	
	
});
