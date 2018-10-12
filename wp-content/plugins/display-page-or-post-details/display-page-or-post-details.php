<?php
/*
Plugin Name: Display Page or Post Details
Description: Shortcode to show a page or post details like (title, content, feature image, category name, author name, custom fields, tags) using a post or page id
Version: 2.0
Author: Rupam Hazra
*/
defined('ABSPATH') or die("restricted access");
if(is_admin())
{
	include_once(dirname(__FILE__).'/admin/page-or-post-menu.php');
	include_once(dirname(__FILE__).'/admin/page-or-post-list.php');
	include_once(dirname(__FILE__).'/admin/page-or-post-insert.php');
	include_once(dirname(__FILE__).'/admin/page-or-post-edit.php');
	include_once(dirname(__FILE__).'/admin/page-or-post-process.php');
	add_action( 'admin_enqueue_scripts', 'dpopd_scripts_css' );	
}
else
{
	add_action( 'wp_enqueue_scripts', 'dpopd_scripts_css' );	
}
function dpopd_scripts_css()
{	
	if( is_admin() )
	{	
		wp_enqueue_style('page-or-post-admin-styles',plugins_url('admin/css/page-or-post-admin-styles.css',__FILE__));
		wp_enqueue_script('page-or-post-admin-script',plugins_url('admin/js/page-or-post-admin-script.js',__FILE__));
	}
	else
	{
		wp_enqueue_style('front-end-styles',plugins_url('public/css/front-end-styles.css',__FILE__));
	}
} 
function dpopd_display($atts)
{
	$a = shortcode_atts(array('id' => null),$atts);
	dpopd_query_select($a['id']);
}
function dpopd_query_select($id)
{
	if($id!=null && $id!="")
	{
		$page_or_post_id=$id;
		global $wpdb;
		$results_array = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}dpopd_settings WHERE page_id=$page_or_post_id OR post_id=$page_or_post_id");
		$post  = get_post($page_or_post_id);
		$html.= "<div class='container'>";
		foreach ($results_array as $key => $object_edit) 
		{
			/* page details from db*/
			$page_title_check=$object_edit->page_title_check;
			$page_content_check=$object_edit->page_content_check;
			$page_featuared_image_check=$object_edit->page_featuared_image_check;
			$page_featured_image_dimention=$object_edit->page_featured_image_dimention;
			$page_featured_image_width=$object_edit->page_featured_image_width;
			$page_featured_image_height=$object_edit->page_featured_image_height;
			$page_author_check=$object_edit->page_author_check;
			$page_custom_fields_check=$object_edit->page_custom_fields_check;
			$page_custom_field=$object_edit->page_custom_field;
			$page_comment_check=$object_edit->page_comment_check;
			$page_comment_check_avatar=$object_edit->page_comment_check_avatar;
			$page_comment_check_avatar_size=$object_edit->page_comment_check_avatar_size;
			$page_comment_check_author=$object_edit->page_comment_check_author;
			$page_comment_check_author_email=$object_edit->page_comment_check_author_email;
			$page_comment_check_content=$object_edit->page_comment_check_content;
			$page_comment_check_date=$object_edit->page_comment_check_date;
			$page_comment_check_number=$object_edit->page_comment_check_number;
			/* post details from db*/
			$post_category_check=$object_edit->post_category_check;
			$post_tags_check=$object_edit->post_tags_check;
			$post_title_check=$object_edit->post_title_check;
			$post_content_check=$object_edit->post_content_check;
			$post_featuared_image_check=$object_edit->post_featuared_image_check;
			$post_featured_image_dimention=$object_edit->post_featured_image_dimention;
			$post_featured_image_width=$object_edit->post_featured_image_width;
			$post_featured_image_height=$object_edit->post_featured_image_height;
			$post_author_check=$object_edit->post_author_check;
			$post_custom_fields_check=$object_edit->post_custom_fields_check;
			$post_custom_field=$object_edit->post_custom_field;
			$post_comment_check=$object_edit->post_comment_check;
			$post_comment_check_avatar=$object_edit->post_comment_check_avatar;
			$post_comment_check_avatar_size=$object_edit->post_comment_check_avatar_size;
			$post_comment_check_author=$object_edit->post_comment_check_author;
			$post_comment_check_author_email=$object_edit->post_comment_check_author_email;
			$post_comment_check_content=$object_edit->post_comment_check_content;
			$post_comment_check_date=$object_edit->post_comment_check_date;
			$post_comment_check_number=$object_edit->post_comment_check_number;
			$html.="<div class='row'>";
			if($page_title_check == "on" || $post_title_check == "on")
			{
				$title = apply_filters('the_title', isset($post->post_title) ? $post->post_title: '');
				$html.="<div class='col-sm-12'>".$title."</div>";
			}
			if($page_content_check=="on" || $post_content_check=="on")
			{
				$content = apply_filters('the_content', isset($post->post_content) ? $post->post_content : '');
				$html.="<div class='col-sm-12'>".$content."</div>";
			}
			if($page_featuared_image_check=="on" || $post_featuared_image_check=="on")
			{
				if($post_featured_image_dimention!="")
				{
					if($post_featured_image_dimention=="custom")
					{
						$dimention=array($post_featured_image_width,$post_featured_image_height);
					}
					else
					{
						$dimention=$post_featured_image_dimention;
					}
				}
				else if($page_featured_image_dimention!="")
				{
					if($page_featured_image_dimention=="custom")
					{
						$dimention=array($page_featured_image_width,$page_featured_image_height);
					}
					else
					{
						$dimention=$page_featured_image_dimention;
					}
				}
				$feature_image = get_the_post_thumbnail($page_or_post_id,$dimention);//post-thumbnail is default value or you can decleare width and height
				$html.="<div class='col-sm-12'>".$feature_image."</div>";
			}
			if($page_author_check=="on" || $post_author_check=="on")
			{
				$author = get_the_author_meta('login');
				$author = isset($author)? $author:'';
				$html.="<div class='col-sm-12'>".$author."</div>";
			}
			if($page_custom_fields_check=="on" || $post_custom_fields_check=="on")
			{
				if($page_custom_field!="")
				{
					$custom_fields = $page_custom_field;
				}
				if($post_custom_field!="" )
				{
					$custom_fields = $post_custom_field;
				}
					$custom_field_array = get_post_custom($page_or_post_id);
					$custom_field_array = isset($custom_field_array)? $custom_field_array:'';
					$custom_fields_inputs=explode(",",$custom_fields);
					foreach($custom_fields_inputs as $custom_fields)
					{
						foreach($custom_field_array as $master_key=>$value){
							if($master_key==$custom_fields)
							{
								foreach($value as $key=>$value_yes)
								{	
									$html.="<div class='col-sm-12'>".$value_yes."</div>";
								}
							}				
						}
					}
			}
			if($post_category_check=="on")
			{
				$category_detail = get_the_category($page_or_post_id);
				$category_detail = isset($category_detail)? $category_detail:'';
				foreach($category_detail as $cd)
				{
					$html.="<div class='col-sm-12'>".$cd->cat_name."</div>";
				}
			}
			if($post_tags_check=="on")
			{
				$tags_detail=wp_get_post_tags( $page_or_post_id);
				$tags_detail = isset($tags_detail)? $tags_detail:'';
				foreach($tags_detail as $td)
				{
					$html.="<div class='col-sm-12'>".$td->name."</div>";
				}
			}

		$html.="</div>";		
		if($post_comment_check=="on" || $page_comment_check=="on")
		{
			$comments = get_comments('post_id='.$page_or_post_id);
			$count=0;
			
				foreach($comments as $comment)
				{ 
					$count ++;
					$html.="<div class='row'>";
					$html.="<div class='col-sm-3'>";
					if($post_comment_check_avatar=="on" || $page_comment_check_avatar=="on")
					{
						if($post_comment_check_avatar!="")
						{
							$post_or_post_comment_check_avatar_size=$post_comment_check_avatar_size;
						}
						else if($page_comment_check_avatar!="")
						{
							$post_or_post_comment_check_avatar_size=$page_comment_check_avatar_size;
						}
						$html.="<div>".get_avatar($comment->comment_ID,$post_or_post_comment_check_avatar_size)."</div>";
					}
					$html.="</div>";
					$html.="<div class='col-sm-9'>";
					if($post_comment_check_author == "on" || $page_comment_check_author == "on")
					{
						$html.= "<div>".($comment->comment_author)."</div>";
					}
					if($post_comment_check_author_email=="on" || $page_comment_check_author_email=="on")
					{
						$html.=  "<div>".($comment->comment_author_email)."</div>";
					}																												
					if($post_comment_check_date == "on" || $page_comment_check_date == "on")
					{	
						$html.=  "<div><span class='date_span'>".get_comment_date('F j, Y \a\t g:i a',$comment->comment_ID)."</span></div>";	
					}
					$html.="</div>";
					$html.="<div class='col-sm-12'>";
					if( $post_comment_check_content =="on" || $page_comment_check_content == "on")
					{
						$html.=  "<div>".($comment->comment_content)."</div>";	
								
					}
					$html.="</div>";	
					$html.="</div>";	
				}
				if($page_comment_check_number =="on" || $post_comment_check_number == "on")
				{
					$html.=  "<div class='row'><div class='col-sm-12'>"."Total no.of Comment : ".("[".$count."]")."</div></div>";
				}
			$html.= "</div>";
			
		}
	}
	echo $html;	
	}
}
function dpopd_check_current_user_level()
{
	global $current_user;
	if ( current_user_can('level_3') )
	{
			return true;
	}
}
function dpopd_page_or_post_main()
{
	global $current_user;
	$dpopd_page_or_post_view='list';
	if(isset($_GET['view']) && $_GET['view'])
	{
		$dpopd_page_or_post_view = trim($_GET['view']);
	}
	if(isset($_POST['view']) && $_POST['view'])
	{
		$dpopd_page_or_post_view = trim($_POST['view']);
	}

	if (!empty($dpopd_page_or_post_view) && $dpopd_page_or_post_view == 'list')
	{
		dpopd_list();
	}
	else if (!empty($dpopd_page_or_post_view) && $dpopd_page_or_post_view == 'addnew')
	{
		if(!dpopd_check_current_user_level())
		{
			wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
		}	
		dpopd_insert();
	}
	else if (!empty($dpopd_page_or_post_view) && $dpopd_page_or_post_view == 'edit')
	{
		if(!dpopd_check_current_user_level())
		{
			wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
		}	
		dpopd_edit();
	}
}
function dpopd_activate()
{
		//create or update table
		dpopd_create_table();		
		// Clear the permalinks
		flush_rewrite_rules();
}
function dpopd_deactivate()
{
		// Clear the permalinks
		flush_rewrite_rules();
}
function dpopd_uninstall()
{
		dpopd_remove_table();
}
function dpopd_create_table()
{
	global $wpdb;	
	require_once(ABSPATH . '/wp-admin/includes/upgrade.php');	
	if (!isset ($wpdb->charset))
	{
		$charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
	}
	if (!isset ($wpdb->collate))
	{
		$charset_collate .= " COLLATE {$wpdb->collate}";
	}	
	$table_name = "wp_dpopd_settings";
	$sql = "CREATE TABLE IF NOT EXISTS " . $table_name . " (
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `cat_name` varchar(20) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `page_name` varchar(100) DEFAULT NULL,
  `page_title_check` varchar(4) DEFAULT NULL,
  `page_content_check` varchar(4) DEFAULT NULL,
  `page_featuared_image_check` varchar(4) DEFAULT NULL,
  `page_featured_image_dimention` varchar(15) DEFAULT NULL,
  `page_featured_image_height` varchar(15) DEFAULT NULL,
  `page_featured_image_width` varchar(15) DEFAULT NULL,
  `page_author_check` varchar(4) DEFAULT NULL,
  `page_custom_fields_check` varchar(4) DEFAULT NULL,
  `page_custom_field` varchar(500) DEFAULT NULL,
  `page_comment_check` varchar(4) DEFAULT NULL,
  `page_comment_check_avatar` varchar(4) DEFAULT NULL,
  `page_comment_check_avatar_size` int(200) DEFAULT NULL,
  `page_comment_check_author` varchar(4) DEFAULT NULL,
  `page_comment_check_author_email` varchar(4) DEFAULT NULL,
  `page_comment_check_content` varchar(4) DEFAULT NULL,
  `page_comment_check_date` varchar(4) DEFAULT NULL,
  `page_comment_check_number` varchar(4) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `post_name` varchar(100) DEFAULT NULL,
  `post_category_check` varchar(4) DEFAULT NULL,
  `post_tags_check` varchar(4) DEFAULT NULL,
  `post_title_check` varchar(4) DEFAULT NULL,
  `post_content_check` varchar(4) DEFAULT NULL,
  `post_featuared_image_check` varchar(4) DEFAULT NULL,
  `post_featured_image_dimention` varchar(15) DEFAULT NULL,
  `post_featured_image_height` varchar(15) DEFAULT NULL,
  `post_featured_image_width` varchar(15) DEFAULT NULL,
  `post_author_check` varchar(4) DEFAULT NULL,
  `post_custom_fields_check` varchar(4) DEFAULT NULL,
  `post_custom_field` varchar(500) DEFAULT NULL,
  `post_comment_check` varchar(4) DEFAULT NULL,
  `post_comment_check_avatar` varchar(4) DEFAULT NULL,
  `post_comment_check_avatar_size` int(200) DEFAULT NULL,
  `post_comment_check_author` varchar(4) DEFAULT NULL,
  `post_comment_check_author_email` varchar(4) DEFAULT NULL,
  `post_comment_check_content` varchar(4) DEFAULT NULL,
  `post_comment_check_date` varchar(4) DEFAULT NULL,
  `post_comment_check_number` varchar(4) DEFAULT NULL,
				  PRIMARY KEY (`id`)
			) $charset_collate;";
	dbDelta($sql);
}
function dpopd_remove_table()
{
	global $wpdb;
	$table = $wpdb->prefix."dpopd_settings";
	$wpdb->query("DROP TABLE IF EXISTS $table");
}
register_activation_hook(__FILE__,'dpopd_activate' ); // resgister hook
register_deactivation_hook( __FILE__,'dpopd_deactivate');
register_uninstall_hook( __FILE__, 'dpopd_uninstall' ); // uninstall plugin
add_action('admin_menu', 'add_dpopd_options'); // add menu hook
add_shortcode( 'dpopdDisplay', 'dpopd_display' );
add_action( 'admin_post_dpopd-submit-insert-form-data', 'dpopd_insert_data_process' ); // insert action decleared
add_action( 'admin_post_dpopd-submit-edit-form-data', 'dpopd_edit_data_process' ); // edit action decleared
add_action( 'admin_post_dpopd-submit-delete-form-data', 'dpopd_delete_data_process' ); // delete action decleared
?>