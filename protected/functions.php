<?php
//maintenance mode
/*
	function maintenace_mode() {
      if ( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {wp_die('Maintenance.');}
}
add_action('get_header', 'maintenace_mode');
*/
//maintenance end

	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("http://code.jquery.com/jquery-1.7.2.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
	
	
	

if ( is_admin() ) {
    function add_post_enctype() {
        echo "<script type='text/javascript'>
                  jQuery(document).ready(function(){
                      jQuery('#post').attr('enctype','multipart/form-data');
                  });
              </script>";
    }
    add_action('admin_head', 'add_post_enctype');
}

add_action('admin_menu', 'create_meta_box');
add_action('save_post', 'save_postdata');

$new_meta_boxes =
array(

"start" => array(
"name" => "start",
"type" => "start"),


"image" => array(
"name" => "image",
"std" => "",
"type" => "image",
"title" => "Image"), 
 


"yustisi_image_label" => array(
"name" => "yustisi_image_label",
"std" => "",
"type" => "text",
"title" => "Image Label"),


"wps_subtitle" => array(
"name" => "wps_subtitle",
"std" => "",
"type" => "text",
"title" => "Subtitle"),

"end" => array(
"name" => "end",
"type" => "end"),
);


function new_meta_boxes() {
global $post, $new_meta_boxes;

foreach($new_meta_boxes as $meta_box) {
$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'', true);

if($meta_box_value == "")
$meta_box_value = $meta_box['std'];

echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce("yustisi-custom").'" />';
if($meta_box['type'] == "start") {

echo "<div class='optionsbox'><style type='text/css'>.optionsbox {
display:block;
width:auto;
float:none;
overflow: hidden;
}

.optionsbox input, .optionsbox textarea {
outline:none;
padding:5px;
color:#999;
}

.optionsbox input:focus, .optionsbox textarea:focus {
border-color:#999;
color:#666;
}

.optionsbox p {
margin-bottom:20px;
}

.optionsbox label {
width:140px;
display:block;
float:left;
margin-top:3px;
}

.optionsbox small {
padding-left:140px;
padding-top:3px;
color:#999;
}
</style>";

} else if($meta_box['type'] == "end") { 

	echo '</div>';

} else if($meta_box['type'] == "image") { 

	echo $meta_box['before'];
	
	echo '<div style="background:#f4f4f4;padding:10px;height:120px;margin:0 0 20px 0;display:block">';
	
	if($meta_box_value) { echo '<img style="float:right" src="'.get_bloginfo('template_directory').'/thumb.php?src='.$meta_box_value.'&w=120&h=120" alt="" />'; }

	echo'<p><label for="'.$meta_box['name'].'_upload">'.$meta_box['title'].'</label>';
	echo'<input type="file" name="'.$meta_box['name'].'_upload" size="55" /><br />';
	echo'<small>Upload image here</small></p>';
	
	echo'<p><label>&nbsp;</label>';
	echo'<input type="text" name="'.$meta_box['name'].'" value="'.$meta_box_value.'" size="55" /><br />';
	echo'<small>or add a URL to the image here</small></p>';

	echo '</div>';
	
} else if($meta_box['type'] == "text") { 

	echo $meta_box['before'];
	
	echo'<p style="margin-bottom:20px;"><label style="width:140px;display:block;float:left;margin-top:3px;" for="'.$meta_box['name'].'">'.$meta_box['title'].'</label>';
	echo'<input style="color:#666;" type="text" name="'.$meta_box['name'].'" value="'.$meta_box_value.'" size="55" /><br />';
	echo'<small style="padding-left:140px;padding-top:3px;">'.$meta_box['description'].'</small></p>';

} else if($meta_box['type'] == "checkbox") { 

	echo $meta_box['before'];
	
	echo'<p style="margin-bottom:20px;"><label style="width:140px;display:block;float:left;margin-top:3px;" for="'.$meta_box['name'].'">'.$meta_box['title'].'</label>';
	if($meta_box_value) { $checked = "checked=\"checked\""; } else { $checked = ""; }
	echo '<input style="display:block;float:left;width:20px;margin:5px 0 0 0;" '.$checked.' type="checkbox" name="'.$meta_box['name'].'" /><br/>';
	echo'<small style="clear:both;padding-left:140px;padding-top:3px;display:block;">'.$meta_box['description'].'</small></p>';

} else if($meta_box['type'] == "textarea") { 

	echo $meta_box['before'];
	echo'<p style="margin-bottom:20px;"><label style="width:140px;display:block;float:left;margin-top:3px;" for="'.$meta_box['name'].'">'.$meta_box['title'].'</label>';
	echo'<textarea style="color:#666;" name="'.$meta_box['name'].'" cols="50" rows="4">'.stripslashes($meta_box_value).'</textarea><br />';
	echo'<small style="padding-left:140px;padding-top:3px;">'.$meta_box['description'].'</small></p>';

} 

}
}


function create_meta_box() {
global $theme_name;
	if ( function_exists('add_meta_box') ) {
		add_meta_box( 'new-meta-boxes', 'Post Options', 'new_meta_boxes', 'post', 'normal', 'high' );
		add_meta_box( 'new-meta-boxes', 'Page Options', 'new_meta_boxes', 'page', 'normal', 'high' );
	}
}


function save_postdata($post_id) {
	global $post, $new_meta_boxes;
	//$post_id = wp_is_post_revision($post_id);
	
	
	foreach($new_meta_boxes as $meta_box) {
		
		
		
		
		if (!wp_verify_nonce($_POST[$meta_box['name'].'_noncename'],'yustisi-custom')) {
			return $post_id;
		  }
		  if ('page' == $_POST['post_type']){
			if (!current_user_can('edit_page', $post_id)){
			  return $post_id;
			}
		  } else {
			if (!current_user_can('edit_post', $post_id)){
			  return $post_id;
			}
		  }
	
		$imageuploadlocation = "";
		$metaboxname = "";
		$metaboxname_upload = "";
		
		if($meta_box['type'] == 'image') {
			
			$metaboxname = $meta_box['name'];
			$metaboxname_upload = $metaboxname.'_upload';
			
			if($_FILES[$metaboxname_upload]['name'] != "") {
				$overrides = array( 'test_form' => false);
				$imagefile=wp_handle_upload($_FILES[$metaboxname_upload], $overrides);
				$imageuploadlocation = $imagefile['url'];
				delete_post_meta($post_id, $metaboxname, get_post_meta($post_id, $metaboxname, true));
				add_post_meta($post_id, $metaboxname, $imageuploadlocation, true);
			} else {
				$imageuploadlocation = get_post_meta($post_id, $metaboxname, true);
				delete_post_meta($post_id, $metaboxname, get_post_meta($post_id, $metaboxname, true));
				add_post_meta($post_id, $metaboxname, $_POST[$metaboxname], true);
			} 
			
		
		} else {
			
			
			$data = $_POST[$meta_box['name'].''];
			/*
			$data_ .= $data;
			if($meta_box['name'] == 'yustisi_image_label'){
				
				update_post_meta($post_id, "yustisi_image_label", $_POST["yustisi_image_label"]);
				echo $post_id;
				exit();
			}
			
			*/
			
			if(get_post_meta($post_id, $meta_box['name'].'') == ""){
				//add_post_meta($post_id, $meta_box['name'].'', $data, true);
				add_post_meta($post_id, $meta_box['name'], $data);
				//echo $data_;
				//echo 'b';
				
			}elseif($data != get_post_meta($post_id, $meta_box['name'].'', true)){
				update_post_meta($post_id, $meta_box['name'].'', $data);
				//echo $data;
				//exit();
			}elseif($data == "") {
				delete_post_meta($post_id, $meta_box['name'].'', get_post_meta($post_id, $meta_box['name'].'', true));
				//echo 'c';
				//exit();
				
			}
			
		
		}
	
	
	}
	
}




add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
return 40; }

function yustisi_subtitle($before="", $after="", $display=true){
  global $post;
  $subtitle = $before . get_post_meta($post->ID, "wps_subtitle", true) . $after;
  if($display){
    echo $subtitle;
  } else {
    return $subtitle;
  }
}
function yustisi_get_the_subtitle($id, $before="", $after="", $display=true){
  $subtitle = $before . get_post_meta($id, "wps_subtitle", true) . $after;
  if($display){
    echo $subtitle;
  } else {
    return $subtitle;
  }
}
function yustisi_image_label($before="", $after="", $display=true){
  global $post;
  $subtitle = $before . get_post_meta($post->ID, "yustisi_image_label", true) . $after;
  if($display){
    echo $subtitle;
  } else {
    return $subtitle;
  }
}
function get_the_time_lang_ID( $the_time )
{
	$days = array(
		'Sunday' => 'Minggu'
		, 'Monday' => 'Senin'
		, 'Tuesday' => 'Selasa'
		, 'Wednesday' => 'Rabu'
		, 'Thursday' => 'Kamis'
		, 'Friday' => 'Jumat'
		, 'Saturday' => 'Sabtu'
	);
	$months = array(
		'January' => 'Januari'
		, 'February' => 'Februari'
		, 'March' => 'Maret'
		, 'April' => 'April'
		, 'May' => 'Mei'
		, 'June' => 'Juni'
		, 'July' => 'Juli'
		, 'August' => 'Agustus'
		, 'September' => 'September'
		, 'October' => 'Oktober'
		, 'November' => 'November'
		, 'December' => 'Desember'
	);
	$the_time = str_replace( array_keys( $days ), array_values( $days ), $the_time );
	$the_time = str_replace( array_keys( $months ), array_values( $months ), $the_time );
	return $the_time;
}
add_filter( 'get_the_time' , 'get_the_time_lang_ID' );


function my_custom_login_logo() {
    echo '<style type="text/css">
       .login h1 a { background-image:url('.get_bloginfo('template_directory').'/images/yustisi-login-logo.png) !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');
?>