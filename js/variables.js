		"use strict";   
		var konado_testipause = 3000,
			konado_testianimate = 2000;
		var konado_testiscroll = false;
							konado_testiscroll = true;
					var konado_catenumber = 6,
			konado_catescrollnumber = 2,
			konado_catepause = 3000,
			konado_cateanimate = 700;
		var konado_catescroll = false;
					var konado_menu_number = 10;
		var konado_sticky_header = false;
			
		jQuery(document).ready(function(){
			jQuery("#ws").focus(function(){
				if(jQuery(this).val()=="Search product..."){
					jQuery(this).val("");
				}
			});
			jQuery("#ws").focusout(function(){
				if(jQuery(this).val()==""){
					jQuery(this).val("Search product...");
				}
			});
			jQuery("#wsearchsubmit").on('click',function(){
				if(jQuery("#ws").val()=="Search product..." || jQuery("#ws").val()==""){
					jQuery("#ws").focus();
					return false;
				}
			});
			jQuery("#search_input").focus(function(){
				if(jQuery(this).val()=="Search..."){
					jQuery(this).val("");
				}
			});
			jQuery("#search_input").focusout(function(){
				if(jQuery(this).val()==""){
					jQuery(this).val("Search...");
				}
			});
			jQuery("#blogsearchsubmit").on('click',function(){
				if(jQuery("#search_input").val()=="Search..." || jQuery("#search_input").val()==""){
					jQuery("#search_input").focus();
					return false;
				}
			});
		});
		