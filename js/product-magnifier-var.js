"use strict";
// product-magnifier var
	var konado_magnifier_vars;
	var yith_magnifier_options = {
		
		sliderOptions: {
			responsive: konado_magnifier_vars.responsive,
			circular: konado_magnifier_vars.circular,
			infinite: konado_magnifier_vars.infinite,
			direction: 'left',
            debug: false,
            auto: false,
            align: 'left',
            height: 'auto',
            //height: "100%", //turn vertical
            //width: 100,  
			prev    : {
				button  : "#slider-prev",
				key     : "left"
			},
			next    : {
				button  : "#slider-next",
				key     : "right"
			},
			scroll : {
				items     : 1,
				pauseOnHover: true
			},
			items   : {
				visible: Number(konado_magnifier_vars.visible),
			},
			swipe : {
				onTouch:    true,
				onMouse:    true
			},
			mousewheel : {
				items: 1
			}
		},
		
		showTitle: false,
		zoomWidth: konado_magnifier_vars.zoomWidth,
		zoomHeight: konado_magnifier_vars.zoomHeight,
		position: konado_magnifier_vars.position,
		lensOpacity: konado_magnifier_vars.lensOpacity,
		softFocus: konado_magnifier_vars.softFocus,
		adjustY: 0,
		disableRightClick: false,
		phoneBehavior: konado_magnifier_vars.phoneBehavior,
		loadingLabel: konado_magnifier_vars.loadingLabel,
	};