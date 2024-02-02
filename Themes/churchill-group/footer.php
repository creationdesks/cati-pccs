<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_4
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer text-center bg-white mt-4 text-muted">
		<section class="footer-widgets text-left">
			<div class="container-fluid">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="col-lg-6 col-md-12">
							<aside class="widget-area footer-1-area mb-2">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-2-area mb-2">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="col-lg-6 col-md-12">
							<aside class="widget-area footer-3-area mb-2">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-4-area mb-2">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</aside>
						</div>
					<?php endif; ?>
				</div>
				<!-- /.row -->
			</div>
		</section>
		<div class="container-fluid footer-nav">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark">
						<?php
						wp_nav_menu( array(
							'theme_location'  => 'menu-4',
							'menu_id'         => 'footer-menu',
							'container'       => 'div',
							'container_class' => 'navbar-collapse',
							'container_id'    => 'secondary-menu-wrap',
							'menu_class'      => 'navbar-nav ml-auto',
							'fallback_cb'     => '__return_false',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 2,
							'walker'          => new WP_bootstrap_4_walker_nav_menu()
						) );
					?>
					</nav>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="site-info">
					<span>Copyright © 2021 </span><a href="<?php echo esc_url( '#' ); ?>">Cati</a>
					<span class="sep"> | Powered by</span>
					<a href="<?php echo esc_url( '#' ); ?>">Skyline MicroSites</a>
				</div><!-- .site-info -->
				</div><!-- /column -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<a id="back2Top" title="Back to top" href="#">&#10148;</a>
<?php wp_footer(); ?>
<!-- Forgot client password --> 
<script>
/*Scroll to top when arrow up clicked BEGIN*/
jQuery(window).scroll(function() {
    var height = jQuery(window).scrollTop();
    if (height > 100) {
        jQuery('#back2Top').fadeIn();
    } else {
        jQuery('#back2Top').fadeOut();
    }
});
jQuery(document).ready(function() {
    jQuery("#back2Top").click(function(event) {
        event.preventDefault();
        jQuery("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

});
 /*Scroll to top when arrow up clicked END*/
 </script>
 <?php if( is_page([2157,3815])) { ?>
 <script>
Vue.config.devtools = false;
Vue.config.productionTip = false;

let app = new Vue({
  el: "#app",
  data() {
    return {
      value: 1,
      options: {
		eventType: 'auto',  
		dotSize: 23,
        width: 'auto',
        height: 15,
		label: 'Number of buildings',
		contained: false,
        data: null,
        min: 1,
        max: 100,
        interval:1,
		disabled: false,
        clickable: true,
        duration: 0.5,
        adsorb: false,
        lazy: false,
		show: true,
        speed: 1,
		tooltip: 'active',
        tooltipDir: 'top',
        useKeyboard: false,
        keydownHook: null,
        dragOnClick: false,
        enableCross: true,
        fixed: false,
        minRange: void 0,
        maxRange: void 0,
        order: true,
        marks: false,
        dotOptions: void 0,
        process: true,
        dotStyle: void 0,
        railStyle: void 0,
        tooltipStyle: {
          backgroundColor: "#cad509",
          borderColor: "#cad509"
		},
        processStyle: {
          backgroundColor: "#cad509"
        },
        stepStyle: void 0,
        stepActiveStyle: void 0,
        labelStyle: void 0,
        labelActiveStyle: void 0,
      }
	}
  },
  methods: {
  },
  mounted () {
  },
  components: {
    'vueSlider': window[ 'vue-slider-component' ],
  },
  watch: {
     rangeSlider(range) {
         this.value = (range);
    }
  }
})
 </script>
 
 <script>
 jQuery(document).ready(function($) {
  $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
 });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
  });
 </script>
 <script type='text/javascript'>
jQuery(document).ready(function($){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script>
jQuery(document).ready(function($){
$(function(){
        var stickyHeaderTop = $('#desktop-menu').offset().top;
		var stickyMbTop = $('#vuSlider').offset().top;
		var x = window.matchMedia("(max-width: 1024px)");
		var y = window.matchMedia("(max-width: 767px)");
		$('#priceSlider').css({display: 'none'});
		$('#orRow').css({display: 'none'});
		function myFunction(x){
			$.x.addListener( myFunction ); 
		}
		function myFunction(y){
			$.y.addListener( myFunction );
		}
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
					$('#vuSlider').css({'padding-top': '30px'});
					$('#desktop-menu').css({display: 'none'});
					$('#billing-desktop').css({display: 'none'});
					$('#moduleBox').css({display: 'none'});
					$('#stickytypeheader').css({display: 'block', 'animation': 'fade-in 1s'});
					$('#priceSlider').css({display: 'none'});
					$('#orRow').css({display: 'none'});
					$('#priceInput').css({display: 'none'});
					if (x.matches){
						$('#app').css({position: 'none', top: 'none', 'z-index': '0', right: '0', left: '0', 'background-color': 'none', 'padding-top': '0'});
						$('.panel-group').addClass('marginNoTop');
					} else {
						$('#app').css({position: 'fixed', top: '0', 'z-index': '3', right: '-15px', left: '-15px', 'background-color': '#fff', 'padding-top': '0px'});
						$('.panel-group').removeClass('marginNoTop');
						$('.panel-group').addClass('marginTop');	
					}
					
				} else {
					$('#desktop-menu').css({display: 'block'});
					$('#billing-desktop').css({display: 'flex'});
					$('#moduleBox').css({display: 'flex'});
					$('#stickytypeheader').css({display: 'none', 'animation': 'fade-out 1s'});
					$('.panel-group').removeClass('marginTop');
					$('.panel-group').addClass('marginNoTop');
					$('#priceSlider').css({display: 'none'});
					$('#orRow').css({display: 'none'});
					$('#priceInput').css({display: 'flex'});
					if (x.matches){
						$('#app').css({position: 'none', top: 'none', 'z-index': '0', right: '0', left: '0', 'background-color': 'none', 'padding-top': '0px'});
					}else {
						$('#app').css({position: 'static'});
					}
				}
				
				if( $(window).scrollTop() > stickyMbTop && (x.matches) ){
					$('#vuSlider').css({position: 'fixed', top: '0px', 'z-index': '3', 'background-color': '#fff', 'padding-top': '50px', 'padding-bottom': '20px', 'height':'100px'});
					$('#priceSlider').css({display: 'none'});
					$('#orRow').css({display: 'none'});
					$('#priceInput').css({display: 'none'});
					$('#billing-mobile').css({display: 'none'});
					$('#monthlyBillingMb').css({width: '100%', position: 'fixed', top: '90px', 'z-index': '3', left: '0', 'background-color': '#fff'});
					$('#annualBillingMb').css({width: '100%', position: 'fixed', top: '90px', 'z-index': '3', left: '0', 'background-color': '#fff'});
					$('#monthlyBillingMb .button-slider__wrapper').css({left: '30%'});
					$('#annualBillingMb .button-slider__wrapper').css({left: '30%'});
					if (y.matches){
						$('#vuSlider').css({height:'auto'});
						$('#monthlyBillingMb').css({top: '500px'});
						$('#annualBillingMb').css({top: '500px'});
						$('#monthlyBillingMb .button-slider__wrapper').css({left: '15%', position:'fixed', top:'0'});
						$('#annualBillingMb .button-slider__wrapper').css({left: '15%', position:'fixed', top:'0'});
					} else {
						$('#monthlyBillingMb').css({top: '50px'});
						$('#annualBillingMb').css({top: '50px'});
						$('#monthlyBillingMb .button-slider__wrapper').css({left: '30%', position:'absolute'});
						$('#annualBillingMb .button-slider__wrapper').css({left: '30%', position:'absolute'});
					}
					$('#pills-home-mb .container #pills-tabContent').css({'margin-top': '130px'});
					$('#pills-profile-mb .container #pills-tabContent').css({'margin-top': '130px'});
				} else {
					$('#vuSlider').css({position: 'static', display: 'block'});
					if (x.matches){	
					$('#billing-mobile').css({display: 'flex'});
					$('#monthlyBillingMb').css({width: 'auto', position: 'static', top: 'unset', 'z-index': 'unset', right: '0', left: '0', 'background-color': 'none', 'padding-top': '0'});
					$('#annualBillingMb').css({width: 'auto', position: 'static', top: 'unset', 'z-index': 'unset', right: '0', left: '0', 'background-color': 'none', 'padding-top': '0'});
					$('#monthlyBillingMb .button-slider__wrapper').css({left: '15%', position:'static', top:'none'});
					$('#annualBillingMb .button-slider__wrapper').css({left: '15%', position:'static', top:'none'});
					$('#pills-home-mb .container #pills-tabContent').css({'margin-top': '50px'});
					$('#pills-profile-mb .container #pills-tabContent').css({'margin-top': '50px'});
					$('#priceSlider').css({display: 'none'});
					$('#orRow').css({display: 'none'});
					$('#priceInput').css({display: 'flex'});
					} else {
						$('#billing-mobile').css({display: 'none'});
						$('#monthlyBillingMb').css({display: 'none'});
						$('#annualBillingMb').css({display: 'none'});
					}
				}
				if ($(window).scrollTop() >= $('#scroller-anchor-top').offset().top){
					$("#app #vuSlider").css({display:'none'});
					if (x.matches){
						$("#app #vuSlider").css({display:'block'});
						} 
					$("#app #stickytypeheader").css({display:'none'});
					$('#monthlyBillingMb .button-slider__wrapper').css({left: '15%', position:'static', top:'unset'});
					$('#annualBillingMb .button-slider__wrapper').css({left: '15%', position:'static', top:'unser'});
					$('#monthlyBillingMb').css({width: 'auto', position: 'static', top: 'unset', 'z-index': 'unset', right: '0', left: '0', 'background-color': 'none', 'padding-top': '0'});
					$('#annualBillingMb').css({width: 'auto', position: 'static', top: 'unset', 'z-index': 'unset', right: '0', left: '0', 'background-color': 'none', 'padding-top': '0'});
					$("#vuSlider").css({display:'none'});
					} else {
						$("#app #vuSlider").css({display: 'block'});
					}
		});
		

    //This check if the tab is active and then activate the select buttons
	if ($('#pills-profile-tab').hasClass('active')){
        $('#annual-pack').css({display: 'flex'});
		$('#monthly-pack').css({display: 'none'});
	} 
    $('#pills-home-tab').on('click', function() {
		$('#monthly-pack').css({display: 'flex'});
		$('#annual-pack').css({display: 'none'});
	});
	$('#pills-profile-tab').on('click', function() {
		$('#annual-pack').css({display: 'flex'});
		$('#monthly-pack').css({display: 'none'});
	});
	
	//This check if the tab is active in mobile version and then activate the select buttons
	if ($('#pills-profile-tab-mb').hasClass('active')){
        $('.annual-pack').css({display: 'flex'});
		$('.monthly-pack').css({display: 'none'});
	} 
    $('#pills-home-tab-mb').on('click', function() {
		$('.monthly-pack').css({display: 'flex'});
		$('.annual-pack').css({display: 'none'});
	});
	$('#pills-profile-tab-mb').on('click', function() {
		$('.annual-pack').css({display: 'flex'});
		$('.monthly-pack').css({display: 'none'});
	});

});
  
  //reloading a page when using browser back button
   var perfEntries = performance.getEntriesByType("navigation");

if (perfEntries[0].type === "back_forward") {
	if(/chrom(e|ium)/.test(navigator.userAgent.toLowerCase())){
    location.reload(true);
	}
	$("#solutionsInput").val('1');
}

  });
  
</script>
<script>
jQuery(document).ready(function($){
$(document).on('click', '#ueberTab a', function(e) {
          otherTabs = $(this).attr('data-secondary').split(',');
          for(i= 0; i<otherTabs.length;i++) {
            nav = $('<ul class="nav d-none" id="tmpNav"></ul>');
            nav.append('<li class="nav-item"><a href="#" data-toggle="tab" data-target="' + otherTabs[i] + '">nav</a></li>"');
            nav.find('a').tab('show');
          }
        });
	});
</script>
<script>
jQuery(document).ready(function($){
$(function() {
    // Open Popup
    $('[popup-open]').on('click', function() {
        var popup_name = $(this).attr('popup-open');
 $('[popup-name="' + popup_name + '"]').fadeIn(300);
   $('html').css({'overflow-y': 'hidden'}); 
     });
 
    // Close Popup
    $('[popup-close]').on('click', function() {
 var popup_name = $(this).attr('popup-close');
 $('[popup-name="' + popup_name + '"]').fadeOut(300);
 $('html').css({'overflow-y': 'auto'});
     });
 
    // Close Popup When Click Outside
    $('.popup').on('click', function() {
 var popup_name = $(this).find('[popup-close]').attr('popup-close');
 $('[popup-name="' + popup_name + '"]').fadeOut(300);
    }).children().click(function() {
 return false;
    });
	
	// button actions on popup
	$('#monthlyBtn').on('click', function(){
		$('#pills-home-tab').trigger('click');
		setTimeout(function(){ $('.close-button').trigger('click'); }, 100);
	});
	$('#yearlyBtn').on('click', function(){
		$('#pills-profile-tab').trigger('click');
		setTimeout(function(){ $('.close-button').trigger('click'); }, 100);
	});
});
});
</script>
<script>
	var inputBox = document.getElementById("solutionsInput");
            
                var invalidChars = [
                    "-",
                    "+",
                    "e",
                    "."
                ];

                inputBox.addEventListener("input", function() {
                    this.value = this.value.replace(/[e\+\-\.]/gi, "");
                });
                

                inputBox.addEventListener("keydown", function(e) {
                    if (invalidChars.includes(e.key)) {
                        e.preventDefault();
                    }
                });
				
	
</script>
<?php } ?>
<?php if (is_page('2157')): ?>
<!--home page custom JS-->
<script>
 jQuery(document).ready(function($) {
	$('#vue-slider input').change && $('#priceUrl').click( function(){
	  var buildingsCount = $('.vue-slider-dot-tooltip-text').text();
	/* desktop version */ 
	document.getElementById("essential-select").href = `/pricing-plans/?cycle=Monthly&plan=Essentials&buildings=${buildingsCount}`;
	document.getElementById("advanced-select").href = `/pricing-plans/?cycle=Monthly&plan=Advanced&buildings=${buildingsCount}`;
	document.getElementById("enterprise-select").href = `/pricing-plans/?cycle=Monthly&plan=Enterprise&buildings=${buildingsCount}`;
	document.getElementById("annualEssential-select").href = `/pricing-plans/?cycle=Annual&plan=Essentials&buildings=${buildingsCount}`;
	document.getElementById("annualAdvanced-select").href = `/pricing-plans/?cycle=Annual&plan=Advanced&buildings=${buildingsCount}`;	
	document.getElementById("annualEnterprise-select").href = `/pricing-plans/?cycle=Annual&plan=Enterprise&buildings=${buildingsCount}`;
		
    /* desktop scroll version */
	document.getElementById("essential-select-scroll").href = `/pricing-plans/?cycle=Monthly&plan=Essentials&buildings=${buildingsCount}`;
	document.getElementById("advanced-select-scroll").href = `/pricing-plans/?cycle=Monthly&plan=Advanced&buildings=${buildingsCount}`;
	document.getElementById("enterprise-select-scroll").href = `/pricing-plans/?cycle=Monthly&plan=Enterprise&buildings=${buildingsCount}`;
	document.getElementById("annualEssential-select-scroll").href = `/pricing-plans/?cycle=Annual&plan=Essentials&buildings=${buildingsCount}`;
	document.getElementById("annualAdvanced-select-scroll").href = `/pricing-plans/?cycle=Annual&plan=Advanced&buildings=${buildingsCount}`;	
	document.getElementById("annualEnterprise-select-scroll").href = `/pricing-plans/?cycle=Annual&plan=Enterprise&buildings=${buildingsCount}`;
		
	/* Mobile version */
	document.getElementById("essential-select-mobile").href = `/pricing-plans/?cycle=Monthly&plan=Essentials&buildings=${buildingsCount}`;
	document.getElementById("advanced-select-mobile").href = `/pricing-plans/?cycle=Monthly&plan=Advanced&buildings=${buildingsCount}`;
	document.getElementById("enterprise-select-mobile").href = `/pricing-plans/?cycle=Monthly&plan=Enterprise&buildings=${buildingsCount}`;
	document.getElementById("annualEssential-select-mobile").href = `/pricing-plans/?cycle=Annual&plan=Essentials&buildings=${buildingsCount}`;
	document.getElementById("annualAdvanced-select-mobile").href = `/pricing-plans/?cycle=Annual&plan=Advanced&buildings=${buildingsCount}`;	
	document.getElementById("annualEnterprise-select-mobile").href = `/pricing-plans/?cycle=Annual&plan=Enterprise&buildings=${buildingsCount}`;
			
	//var sVal = $('.vue-slider-dot-tooltip-text').text();
	//var iNum = parseInt(sVal);
	//if (iNum >= 100){
		//$('#buildingUnits-message').text("Need more buildings? Enter the exact number of buildings here to calculate price on your requirements.");
		//$('#buildingUnits-message').css("padding", "7px");
		//$('.triangle-left').css("display", "block");
	//} else{
	//	$('#buildingUnits-message').text("");
	//	$('#buildingUnits-message').css("padding", "0px");
	//	$('.triangle-left').css("display", "none");
	//}
	const numInputs = document.querySelectorAll('input[type=number]')
	numInputs.forEach(function(input) {
	   input.addEventListener('change', function(e) {
	   if (e.target.value == '') {
	   e.target.value = 0
		}
	  })
	})
	
  });
   setTimeout(function(){ $('#vue-slider input').change && $('#priceUrl').click }, 1000);
   setInterval(function(){ $('#priceUrl').trigger('click'); }, 1000);
});
 </script>
<?php endif; ?> 
<?php if (is_page('3815')): ?>
<script>
//function SelectRedirect(){
//	switch(document.getElementById('solutonsModules').value)
	//{
//case "fleet":
//window.location="/pricing-plans-test/?module=fleet";
//break;

//case "people":
//window.location="/pricing-plans-test/?module=people";
//break;

//case "asset":
//window.location="/pricing-plans-test/?module=asset";
//break;
//}// end of switch 
//}
<!--home page custom JS-->
jQuery(document).ready(function($) {
	$('#vue-slider input').change && $('#priceUrl').click( function(){
	  var buildingsCount = $('.vue-slider-dot-tooltip-text').text();
	/* desktop version */ 
	document.getElementById("enterprise-select").href = `/pricing-plans/?cycle=Monthly&plan=Enterprise&buildings=${buildingsCount}`;
	document.getElementById("annualEnterprise-select").href = `/pricing-plans/?cycle=Annual&plan=Enterprise&buildings=${buildingsCount}`;
	document.getElementById("essential-test").href = `/Subscriptions/new/?cycle=Monthly&plan=Essential&buildings=${buildingsCount}`;
	document.getElementById("advanced-test").href = `/Subscriptions/new/?cycle=Monthly&plan=Advanced&buildings=${buildingsCount}`;
	document.getElementById("annualEssential-test").href = `/Subscriptions/new/?cycle=Annual&plan=Essential&buildings=${buildingsCount}`;
	document.getElementById("annualAdvanced-test").href = `/Subscriptions/new/?cycle=Annual&plan=Advanced&buildings=${buildingsCount}`;	
	
    /* desktop scroll version */
	//document.getElementById("enterprise-select-scroll").href = `/pricing-plans/?cycle=Monthly&plan=Enterprise&buildings=${buildingsCount}`;
	//document.getElementById("annualEnterprise-select-scroll").href = `/pricing-plans/?cycle=Annual&plan=Enterprise&buildings=${buildingsCount}`;
	//document.getElementById("essential-scroll").href = `/Subscriptions/new/?cycle=Monthly&plan=Essential&buildings=${buildingsCount}`;
	//document.getElementById("advanced-scroll").href = `/Subscriptions/new/?cycle=Monthly&plan=Advanced&buildings=${buildingsCount}`;
	//document.getElementById("annualEssential-scroll").href = `/Subscriptions/new/?cycle=Annual&plan=Essential&buildings=${buildingsCount}`;
	//document.getElementById("annualAdvanced-scroll").href = `/Subscriptions/new/?cycle=Annual&plan=Advanced&buildings=${buildingsCount}`;	
	
	/* Mobile version */
	document.getElementById("enterprise-select-mobile").href = `/pricing-plans/?cycle=Monthly&plan=Enterprise&buildings=${buildingsCount}`;
	document.getElementById("annualEnterprise-select-mobile").href = `/pricing-plans/?cycle=Annual&plan=Enterprise&buildings=${buildingsCount}`;
	document.getElementById("essential-mobile").href = `/Subscriptions/new/?cycle=Monthly&plan=Essential&buildings=${buildingsCount}`;
	document.getElementById("advanced-mobile").href = `/Subscriptions/new/?cycle=Monthly&plan=Advanced&buildings=${buildingsCount}`;
	document.getElementById("annualEssential-mobile").href = `/Subscriptions/new/?cycle=Annual&plan=Essential&buildings=${buildingsCount}`;
	document.getElementById("annualAdvanced-mobile").href = `/Subscriptions/new/?cycle=Annual&plan=Advanced&buildings=${buildingsCount}`;	
		
	//var sVal = $('.vue-slider-dot-tooltip-text').text();
	//var iNum = parseInt(sVal);
	//if (iNum >= 100){
		//$('#buildingUnits-message').text("Need more buildings? Enter the exact number of buildings here to calculate price on your requirements.");
		//$('#buildingUnits-message').css("padding", "7px");
		//$('.triangle-left').css("display", "block");
	//} else{
		//$('#buildingUnits-message').text("");
		//$('#buildingUnits-message').css("padding", "0px");
		//$('.triangle-left').css("display", "none");
	//}
	const numInputs = document.querySelectorAll('input[type=number]')
	numInputs.forEach(function(input) {
	   input.addEventListener('change', function(e) {
	   if (e.target.value == '') {
	   e.target.value = 0
		}
	  })
	})
	
  });
   setTimeout(function(){ $('#vue-slider input').change && $('#priceUrl').click }, 1000);
   setInterval(function(){ $('#priceUrl').trigger('click'); }, 1000);
});

</script>
<?php endif; ?> 
  </body>
</html>
