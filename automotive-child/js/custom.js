jQuery( document ).ready(function() {
	//Toggle sidebar left
	jQuery('.toggle').click(function(){
		jQuery('.sidebar_left').toggleClass("sidebar-collapsed");
	});
	//Add datepicker in form
	jQuery('.datepick').each(function(){
    	jQuery(this).datepicker();
	});
});