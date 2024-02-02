<?php 
	 add_action( 'wp_enqueue_scripts', 'churchill_group_enqueue_styles' );
	 function churchill_group_enqueue_styles() {
 		 		 
		 // enqueue parent styles
			wp_enqueue_style('parent-style', get_template_directory_uri() .'/style.css');
	
		// enqueue child styles
			wp_enqueue_style('child-style', get_stylesheet_directory_uri() .'/style.css', array('parent-style'));
		 
		 	wp_enqueue_style( 'google-fonts-poppins', 'https://fonts.googleapis.com/css?family=Poppins:400,700,900', false ); 
			wp_enqueue_style( 'google-fonts-ubuntu', 'https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700', false );
			wp_enqueue_style( 'google-fonts-lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700', false );
			wp_enqueue_style( 'google-fonts-muli', 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700&display=swap', false );
			wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
			wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css');
			
			if( is_page([2157,3815])) {
			wp_enqueue_style( 'stylesheet-vue', 'https://cdn.jsdelivr.net/npm/vue-slider-component@latest/theme/default.css', false );
			wp_enqueue_style( 'vue-style', 'https://unpkg.com/vue-range-component@1.0.3/dist/vue-range-slider.min.css', false );			
			
			wp_enqueue_script( 'vue-js', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js', false );
			wp_enqueue_script( 'vue-slider-component-2', 'https://unpkg.com/vue-range-component@1.0.3/dist/vue-range-slider.min.js', false );
			wp_enqueue_script( 'vue-slider-component', 'https://cdn.jsdelivr.net/npm/vue-slider-component@latest/dist/vue-slider-component.umd.min.js', false );
			//wp_enqueue_script( 'jquery.backstretch', get_stylesheet_directory_uri() . '/assets/js/jquery.backstretch.min.js', array('jquery'), '0.1', true );
			}
	 } 
	
/**
 * for new excerpt limitation on custom page template
 **/
	function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }

/**
 * Plugin class for post category image display on archive pages
 **/
if ( ! class_exists( 'CT_TAX_META' ) ) {

class CT_TAX_META {

  public function __construct() {
    //
  }
 
 /*
  * Initialize the class and start calling our hooks and filters
  * @since 1.0.0
 */
 public function init() {
   add_action( 'category_add_form_fields', array ( $this, 'add_category_image' ), 10, 2 );
   add_action( 'created_category', array ( $this, 'save_category_image' ), 10, 2 );
   add_action( 'category_edit_form_fields', array ( $this, 'update_category_image' ), 10, 2 );
   add_action( 'edited_category', array ( $this, 'updated_category_image' ), 10, 2 );
   add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
   add_action( 'admin_footer', array ( $this, 'add_script' ) );
 }

public function load_media() {
 wp_enqueue_media();
}
 
 /*
  * Add a form field in the new category page
  * @since 1.0.0
 */
 public function add_category_image ( $taxonomy ) { ?>
   <div class="form-field term-group">
     <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
     <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
     <div id="category-image-wrapper"></div>
     <p>
       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
    </p>
   </div>
 <?php
 }
 
 /*
  * Save the form field
  * @since 1.0.0
 */
 public function save_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = $_POST['category-image-id'];
     add_term_meta( $term_id, 'category-image-id', $image, true );
   }
 }
 
 /*
  * Edit the form field
  * @since 1.0.0
 */
 public function update_category_image ( $term, $taxonomy ) { ?>
   <tr class="form-field term-group-wrap">
     <th scope="row">
       <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
     </th>
     <td>
       <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
       <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
       <div id="category-image-wrapper">
         <?php if ( $image_id ) { ?>
           <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
         <?php } ?>
       </div>
       <p>
         <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
         <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
       </p>
     </td>
   </tr>
 <?php
 }

/*
 * Update the form field value
 * @since 1.0.0
 */
 public function updated_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = $_POST['category-image-id'];
     update_term_meta ( $term_id, 'category-image-id', $image );
   } else {
     update_term_meta ( $term_id, 'category-image-id', '' );
   }
 }

/*
 * Add script
 * @since 1.0.0
 */
 public function add_script() { ?>
   <script>
     jQuery(document).ready( function($) {
       function ct_media_upload(button_class) {
         var _custom_media = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if ( _custom_media ) {
               $('#category-image-id').val(attachment.id);
               $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
            }
         wp.media.editor.open(button);
         return false;
       });
     }
     ct_media_upload('.ct_tax_media_button.button'); 
     $('body').on('click','.ct_tax_media_remove',function(){
       $('#category-image-id').val('');
       $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
     $(document).ajaxComplete(function(event, xhr, settings) {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
         var xml = xhr.responseXML;
         $response = $(xml).find('term_id').text();
         if($response!=""){
           // Clear the thumb image
           $('#category-image-wrapper').html('');
         }
       }
     });
   });
 </script>
 <?php }

  }
 
$CT_TAX_META = new CT_TAX_META();
$CT_TAX_META -> init();
 
}

// This theme uses wp_nav_menu() in one another location.
		register_nav_menus( array(
			'menu-2' => esc_html__( 'Secondary', 'wp-bootstrap-4' ),
			'menu-4' => esc_html__( 'footer', 'wp-bootstrap-4' ),
		) );

// Add a custom user role
$result = add_role( 'site-manager', __(
'Site Manager' ),
array( ) );

// prefix "category:" form category title
function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );

// shortcode to list all posts which come in (radish) catering page

add_shortcode( 'latest_posts_radish', 'latest_posts_radish_shortcode' );

function latest_posts_radish_shortcode( $atts ) {
    ob_start();
    $radish_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'radish',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $radish_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$grid_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $radish_query->have_posts() ) : $radish_query->the_post(); ?>
		<?php $i++; $i<0; $StyleClass = $grid_classes[$i]; ?>		
		<?php $bgImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $StyleClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $bgImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); wp_reset_query(); ?>
			
    <?php $myvariable = ob_get_clean();
    return $myvariable;
    }
}

// shortcode to list all posts which come in (amulet) security page

add_shortcode( 'latest_posts_amulet', 'latest_posts_amulet_shortcode2' );

function latest_posts_amulet_shortcode2( $atts ) {
    ob_start();
    $amulet_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'amulet',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $amulet_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$col_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $amulet_query->have_posts() ) : $amulet_query->the_post(); ?>
		<?php $i++; $i<0; $reqClass = $col_classes[$i]; ?>		
		<?php $featureImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $reqClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $featureImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); wp_reset_query(); ?>
			
    <?php $amuletVariable = ob_get_clean();
    return $amuletVariable;
    }
}

// shortcode to list all posts which come in Portfolio page

add_shortcode( 'latest_posts_portfolio', 'latest_posts_portfolio_shortcode3' );

function latest_posts_portfolio_shortcode3( $atts ) {
    ob_start();
    $pfolio_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'portfolio-by-churchill',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $pfolio_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$div_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $pfolio_query->have_posts() ) : $pfolio_query->the_post(); ?>
		<?php $i++; $i<0; $latestClass = $div_classes[$i]; ?>		
		<?php $divgpImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $latestClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $divgpImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); 
			
			wp_reset_query(); ?>
			
    <?php $pfvariable = ob_get_clean();
    return $pfvariable;
    }
}

// shortcode to list all posts which come in cleaning page

add_shortcode( 'latest_posts_cleaning', 'latest_posts_cleaning_shortcod4' );

function latest_posts_cleaning_shortcod4( $atts ) {
    ob_start();
    $cleaning_query = new WP_Query( array(
        'post_type' => 'post',
		'category_name' => 'churchill-cleaning',
        'posts_per_page' => 5,
        'order' => 'desc',
        'orderby' => 'date',
    ) );
    if ( $cleaning_query->have_posts() ) { ?>
	<?php $i = 0; ?>
						<?php 
								$cl_classes = array(
										'w-0',
										'col-md-8 col-sm-6 col-xs-12 cbox-1',
										'col-md-4 col-sm-6 col-xs-12 cbox-2',
										'col-md-4 col-sm-6 col-xs-12 cbox-3',
										'col-md-4 col-sm-6 col-xs-12 cbox-4',
										'col-md-4 col-sm-6 col-xs-12 cbox-5',
									);
								?>
	<div class="gallery row">							
        <?php while ( $cleaning_query->have_posts() ) : $cleaning_query->the_post(); ?>
		<?php $i++; $i<0; $cleaningClass = $cl_classes[$i]; ?>		
		<?php $clgpImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <div class="gallery-list <?php echo $cleaningClass;?>">
				<div class="card" id="post-<?php the_ID(); ?>" style="background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url('<?php echo $clgpImg[0]; ?>') no-repeat;">
					<div class="card-body">
						<?php echo do_shortcode("[featured-images]");?>
						<?php the_title( '<h2 class="card-title">', '</h2>' );?> 
						<p><?php echo excerpt(25);?></p>
						<br><div class="card-btn"><a class="btn-d" href="<?php the_permalink(); ?>">VIEW</a></div>
					</div>
				</div>
			</div>
            <?php endwhile;?>
	</div>		
			<?php wp_reset_postdata(); 
			
			wp_reset_query(); ?>
			
    <?php $clvariable = ob_get_clean();
    return $clvariable;
    }
}

// ^ there should only be one of these at the top of your child theme's functions.php file
add_filter( 'job_manager_default_company_logo', 'smyles_custom_job_manager_logo' );
function smyles_custom_job_manager_logo( $logo_url ){
	// Change the value below to match the filename of the custom logo you want to use
	// Place the file in a /images/ directory in your child theme's root directory.
	// The example provided assumes "/images/custom_logo.png" exists in your child theme
	$filename = 'churchill-group_200x200.png';
	
	$logo_url = get_stylesheet_directory_uri() . '/assets/images/' . $filename;
	
	return $logo_url;
	
}

// define the wpcf7_is_tel callback 
function custom_filter_wpcf7_is_tel( $result, $tel ) { 
  $result = preg_match( '/^\(?\+?([0-9]{1,4})?\)?[-\. ]?(\d{10})$/', $tel );
  return $result; 
}
         
add_filter( 'wpcf7_is_tel', 'custom_filter_wpcf7_is_tel', 10, 2 );

/* function se_post_publish_ping($post_id) {
	//should happen only on first publish
	$status = false;
	if( !empty( $_POST['post_status'] ) && ( $_POST['post_status'] == 'publish' ) && ( $_POST['original_post_status'] != 'publish' ) ) {
		$permalink = get_permalink($post_id);
		$zemanta_response = se_api(array(
			'method' => 'zemanta.post_published_ping',
			'current_url' => $permalink,
			'post_url' => $permalink,
			'post_rid' => '',
			'interface' => 'wordpress-se',
			'deployment' => 'search-everything',
			'format' => 'json'
		));
               if (!is_wp_error($zemanta_response)) {
	         $response = json_decode($zemanta_response['body']);
		 if (isset($response->status)) {
			$status = $response->status;
		 }
             }
	}
	return $status;
}

$args = [
    'method' => 'POST',
    'timeout' => 10,
    'headers' => array( 'SYNERGYTOKEN' => '***********************************', 'Content-Type' => 'application/json'  ) //add headers here
];

$response = wp_remote_post( '/cati_development/RestAPI/Cati/?t=CreateWebLead', $args );
*/
add_filter('wpcf7_map_meta_cap', 'change_cf7_capabilities',10,1);
 
function change_cf7_capabilities($meta_caps) {
 
    $meta_caps = array(
        'wpcf7_edit_contact_form' => 'cf7_edit_forms',
	'wpcf7_edit_contact_forms' => 'cf7_edit_forms',
	'wpcf7_read_contact_forms' => 'cf7_read_forms',
	'wpcf7_delete_contact_form' => 'cf7_delete_forms',
	'wpcf7_manage_integration' => 'cf7_manage_integration' );
 
    return $meta_caps;
 
}
// menu for South East Asians
if (function_exists('geoip_detect2_get_info_from_current_ip')) {
	$userInfo = geoip_detect2_get_info_from_current_ip();
	if ($userInfo->country->isoCode == 'SG' || $userInfo->country->isoCode == 'BN' || $userInfo->country->isoCode == 'MM'|| $userInfo->country->isoCode == 'KH' || $userInfo->country->isoCode == 'TL' || $userInfo->country->isoCode == 'ID' || $userInfo->country->isoCode == 'LA' || $userInfo->country->isoCode == 'MY' || $userInfo->country->isoCode == 'PH' || $userInfo->country->isoCode == 'TH' || $userInfo->country->isoCode == 'VN' || $userInfo->country->isoCode == 'AE' || $userInfo->country->isoCode == 'OM' || $userInfo->country->isoCode == 'QA' || $userInfo->country->isoCode == 'SA' || $userInfo->country->isoCode == 'BH' || $userInfo->country->isoCode == 'AU' || $userInfo->country->isoCode == 'NZ') {
		echo '<style>#wp-megamenu-item-4952{display:none;}#wp-megamenu-item-4742{display:inline-block !important;}.all-countries{display:none !important;}.asian-countries{display:inline-block !important;}</style>';
	}
} 
