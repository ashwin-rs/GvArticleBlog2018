<?php
defined('ABSPATH') or die("restricted access");
function dpopd_insert_data_process()
{
	global $wpdb;
	if(isset($_POST['cat_name'])&& $_POST['cat_name']!="")
	{		
		if($_POST['cat_name']=="page")
		{
			$cat_name=$_POST['cat_name'];
			$page_name=!empty($_POST['page_name'])? $_POST['page_name'] :'';
			$page_id=!empty($_POST['page_id']) ? $_POST['page_id']:'';
			$page_title_check=!empty($_POST['page_title_check']) ? $_POST['page_title_check'] :'';
			$page_content_check=!empty($_POST['page_content_check']) ? $_POST['page_content_check'] :'';
			$page_featuared_image_check=!empty($_POST['page_featuared_image_check']) ? $_POST['page_featuared_image_check']:'';
			$page_featured_image_dimention=!empty($_POST['page_featured_image_dimention']) ? $_POST['page_featured_image_dimention']:'';
			if($page_featured_image_dimention=="custom")
			{
				$page_featured_image_width=!empty($_POST['page_featured_image_width']) ? $_POST['page_featured_image_width']:'';
				$page_featured_image_height=!empty($_POST['page_featured_image_height']) ? $_POST['page_featured_image_height']:'';
			}
			$page_author_check=!empty($_POST['page_author_check']) ? $_POST['page_author_check'] : '';
			$page_custom_fields_check=!empty($_POST['page_custom_fields_check']) ? $_POST['page_custom_fields_check']:'';
			$page_custom_field=!empty($_POST['page_custom_field']) ? $_POST['page_custom_field'] :'';
			$page_comment_check=!empty($_POST['page_comment_check']) ? $_POST['page_comment_check'] :'';
			if($page_comment_check!="")
			{
				$page_comment_check_avatar=!empty($_POST['page_comment_check_avatar']) ? $_POST['page_comment_check_avatar'] :'';
				$page_comment_check_avatar_size=!empty($_POST['page_comment_check_avatar_size']) ? $_POST['page_comment_check_avatar_size'] :'';
				$page_comment_check_author=!empty($_POST['page_comment_check_author']) ? $_POST['page_comment_check_author'] :'';
				$page_comment_check_author_email=!empty($_POST['page_comment_check_author_email']) ? $_POST['page_comment_check_author_email'] :'';
				$page_comment_check_content=!empty($_POST['page_comment_check_content']) ? $_POST['page_comment_check_content'] :'';
				$page_comment_check_date=!empty($_POST['page_comment_check_date']) ? $_POST['page_comment_check_date'] :'';
				$page_comment_check_number=!empty($_POST['page_comment_check_number']) ? $_POST['page_comment_check_number'] :'';
			}
			$data=array(
						'cat_name'							=> $cat_name,
						'page_name'							=> "Page Name : ".$page_name,
						'page_id' 							=> $page_id,
						'page_title_check'					=> $page_title_check,
						'page_content_check'				=> $page_content_check,
						'page_featuared_image_check'		=> $page_featuared_image_check,
						'page_featured_image_dimention'		=> $page_featured_image_dimention,
						'page_featured_image_width'			=> $page_featured_image_width,
						'page_featured_image_height'		=> $page_featured_image_height,
						'page_author_check' 				=> $page_author_check,
						'page_custom_fields_check' 			=> $page_custom_fields_check,
						'page_custom_field'  				=> $page_custom_field,
						'page_comment_check'				=> $page_comment_check,
						'page_comment_check_avatar'			=> $page_comment_check_avatar,
						'page_comment_check_avatar_size'	=> $page_comment_check_avatar_size,
						'page_comment_check_author'			=> $page_comment_check_author,
						'page_comment_check_author_email'	=> $page_comment_check_author_email,
						'page_comment_check_content'		=> $page_comment_check_content,
						'page_comment_check_date'	 		=> $page_comment_check_date,
						'page_comment_check_number'			=> $page_comment_check_number
						);	
								
		}
		if($_POST['cat_name']=="post")
		{
			$cat_name=$_POST['cat_name'];
			$post_name=!empty($_POST['post_name']) ? $_POST['post_name']:'';
			$post_id=!empty($_POST['post_id']) ? $_POST['post_id']:'';
			$post_category_check=!empty($_POST['post_category_check']) ? $_POST['post_category_check'] :'';
			$post_tags_check=!empty($_POST['post_tags_check'])? $_POST['post_tags_check']:'';
			$post_title_check=!empty($_POST['post_title_check']) ? $_POST['post_title_check'] :'';
			$post_content_check=!empty($_POST['post_content_check']) ? $_POST['post_content_check']:'';
			$post_featuared_image_check=!empty($_POST['post_featuared_image_check']) ? $_POST['post_featuared_image_check'] :'';
			$post_featured_image_dimention=!empty($_POST['post_featured_image_dimention']) ? $_POST['post_featured_image_dimention']:'';
			if($post_featured_image_dimention=="custom")
			{
				$post_featured_image_width=!empty($_POST['post_featured_image_width']) ? $_POST['post_featured_image_width']:'';
				$post_featured_image_height=!empty($_POST['post_featured_image_height']) ? $_POST['post_featured_image_height']:'';
			}
			$post_author_check=!empty($_POST['post_author_check']) ? $_POST['post_author_check']:'';
			$post_custom_fields_check=!empty($_POST['post_custom_fields_check']) ? $_POST['post_custom_fields_check']:'';
			$post_custom_field=!empty($_POST['post_custom_field']) ? $_POST['post_custom_field']:'';
			$post_comment_check=!empty($_POST['post_comment_check']) ? $_POST['post_comment_check'] :'';
			if($post_comment_check!="")
			{
				$post_comment_check_avatar=!empty($_POST['post_comment_check_avatar']) ? $_POST['post_comment_check_avatar'] :'';
				$post_comment_check_avatar_size=!empty($_POST['post_comment_check_avatar_size']) ? $_POST['post_comment_check_avatar_size'] :'';
				$post_comment_check_author=!empty($_POST['post_comment_check_author']) ? $_POST['post_comment_check_author'] :'';
				$post_comment_check_author_email=!empty($_POST['post_comment_check_author_email']) ? $_POST['post_comment_check_author_email'] :'';
				$post_comment_check_content=!empty($_POST['post_comment_check_content']) ? $_POST['post_comment_check_content'] :'';
				$post_comment_check_date=!empty($_POST['post_comment_check_date']) ? $_POST['post_comment_check_date'] :'';
				$post_comment_check_number=!empty($_POST['post_comment_check_number']) ? $_POST['post_comment_check_number'] :'';
			}
			$data=array(
						'cat_name'							=> $cat_name,
						'post_name'							=> "Post Name : ".$post_name,
						'post_id' 							=> $post_id,
						'post_category_check'				=> $post_category_check,
						'post_tags_check'					=> $post_tags_check,
						'post_title_check'					=> $post_title_check,
						'post_content_check'				=> $post_content_check,
						'post_featuared_image_check'		=> $post_featuared_image_check,
						'post_featured_image_dimention'		=> $post_featured_image_dimention,
						'post_featured_image_width'			=> $post_featured_image_width,
						'post_featured_image_height'		=> $post_featured_image_height,
						'post_author_check' 				=> $post_author_check,
						'post_custom_fields_check' 			=> $post_custom_fields_check,
						'post_custom_field'  				=> $post_custom_field,
						'post_comment_check'				=> $post_comment_check,
						'post_comment_check_avatar'			=> $post_comment_check_avatar,
						'post_comment_check_avatar_size'	=> $post_comment_check_avatar_size,
						'post_comment_check_author'			=> $post_comment_check_author,
						'post_comment_check_author_email'	=> $post_comment_check_author_email,
						'post_comment_check_content'		=> $post_comment_check_content,
						'post_comment_check_date'	 		=> $post_comment_check_date,
						'post_comment_check_number'	 		=> $post_comment_check_number
						);	
		}
			$wpdb->insert($wpdb->prefix.'dpopd_settings', $data);	
			wp_redirect( admin_url('admin.php?page=dpopd-list&in_msg=suc') );
			exit();	
	}
}
function dpopd_edit_data_process()
{
	global $wpdb;
	if(isset($_POST['cat_name'])&& $_POST['cat_name']!="" && isset($_POST['dpopd_id']) && $_POST['dpopd_id']!="")
	{		
		if($_POST['cat_name']=="page")
		{
			$cat_name=$_POST['cat_name'];
			$page_name=!empty($_POST['page_name'])? $_POST['page_name'] :'';
			$page_id=!empty($_POST['page_id']) ? $_POST['page_id']:'';
			$page_title_check=!empty($_POST['page_title_check']) ? $_POST['page_title_check'] :'';
			$page_content_check=!empty($_POST['page_content_check']) ? $_POST['page_content_check'] :'';
			$page_featuared_image_check=!empty($_POST['page_featuared_image_check']) ? $_POST['page_featuared_image_check']:'';
			$page_featured_image_dimention=!empty($_POST['page_featured_image_dimention']) ? $_POST['page_featured_image_dimention']:'';
			if($page_featured_image_dimention=="custom")
			{
				$page_featured_image_width=!empty($_POST['page_featured_image_width']) ? $_POST['page_featured_image_width']:'';
				$page_featured_image_height=!empty($_POST['page_featured_image_height']) ? $_POST['page_featured_image_height']:'';
			}
			$page_author_check=!empty($_POST['page_author_check']) ? $_POST['page_author_check'] : '';
			$page_custom_fields_check=!empty($_POST['page_custom_fields_check']) ? $_POST['page_custom_fields_check']:'';
			$page_custom_field=!empty($_POST['page_custom_field']) ? $_POST['page_custom_field'] :'';
			$page_comment_check=!empty($_POST['page_comment_check']) ? $_POST['page_comment_check'] :'';
			if($page_comment_check!="")
			{
				$page_comment_check_avatar=!empty($_POST['page_comment_check_avatar']) ? $_POST['page_comment_check_avatar'] :'';
				$page_comment_check_avatar_size=!empty($_POST['page_comment_check_avatar_size']) ? $_POST['page_comment_check_avatar_size'] :'';
				$page_comment_check_author=!empty($_POST['page_comment_check_author']) ? $_POST['page_comment_check_author'] :'';
				$page_comment_check_author_email=!empty($_POST['page_comment_check_author_email']) ? $_POST['page_comment_check_author_email'] :'';
				$page_comment_check_content=!empty($_POST['page_comment_check_content']) ? $_POST['page_comment_check_content'] :'';
				$page_comment_check_date=!empty($_POST['page_comment_check_date']) ? $_POST['page_comment_check_date'] :'';
				$page_comment_check_number=!empty($_POST['page_comment_check_number']) ? $_POST['page_comment_check_number'] :'';
			}
			$data=array(
						'cat_name'							=> $cat_name,
						'page_name'							=> "Page Name : ".$page_name,
						'page_id' 							=> $page_id,
						'page_title_check'					=> $page_title_check,
						'page_content_check'				=> $page_content_check,
						'page_featuared_image_check'		=> $page_featuared_image_check,
						'page_featured_image_dimention'		=> $page_featured_image_dimention,
						'page_featured_image_width'			=> $page_featured_image_width,
						'page_featured_image_height'		=> $page_featured_image_height,
						'page_author_check' 				=> $page_author_check,
						'page_custom_fields_check' 			=> $page_custom_fields_check,
						'page_custom_field'  				=> $page_custom_field,
						'page_comment_check'				=> $page_comment_check,
						'page_comment_check_avatar'			=> $page_comment_check_avatar,
						'page_comment_check_avatar_size'	=> $page_comment_check_avatar_size,
						'page_comment_check_author'			=> $page_comment_check_author,
						'page_comment_check_author_email'	=> $page_comment_check_author_email,
						'page_comment_check_content'		=> $page_comment_check_content,
						'page_comment_check_date'	 		=> $page_comment_check_date,
						'page_comment_check_number'			=> $page_comment_check_number
						);				
		}
		if($_POST['cat_name']=="post")
		{
			$cat_name=$_POST['cat_name'];
			$post_name=!empty($_POST['post_name']) ? $_POST['post_name']:'';
			$post_id=!empty($_POST['post_id']) ? $_POST['post_id']:'';
			$post_category_check=!empty($_POST['post_category_check']) ? $_POST['post_category_check'] :'';
			$post_tags_check=!empty($_POST['post_tags_check'])? $_POST['post_tags_check']:'';
			$post_title_check=!empty($_POST['post_title_check']) ? $_POST['post_title_check'] :'';
			$post_content_check=!empty($_POST['post_content_check']) ? $_POST['post_content_check']:'';
			$post_featuared_image_check=!empty($_POST['post_featuared_image_check']) ? $_POST['post_featuared_image_check'] :'';
			$post_featured_image_dimention=!empty($_POST['post_featured_image_dimention']) ? $_POST['post_featured_image_dimention']:'';
			if($post_featured_image_dimention=="custom")
			{
				$post_featured_image_width=!empty($_POST['post_featured_image_width']) ? $_POST['post_featured_image_width']:'';
				$post_featured_image_height=!empty($_POST['post_featured_image_height']) ? $_POST['post_featured_image_height']:'';
			}
			$post_author_check=!empty($_POST['post_author_check']) ? $_POST['post_author_check']:'';
			$post_custom_fields_check=!empty($_POST['post_custom_fields_check']) ? $_POST['post_custom_fields_check']:'';
			$post_custom_field=!empty($_POST['post_custom_field']) ? $_POST['post_custom_field']:'';
			$post_comment_check=!empty($_POST['post_comment_check']) ? $_POST['post_comment_check'] :'';
			if($post_comment_check!="")
			{
				$post_comment_check_avatar=!empty($_POST['post_comment_check_avatar']) ? $_POST['post_comment_check_avatar'] :'';
				$post_comment_check_avatar_size=!empty($_POST['post_comment_check_avatar_size']) ? $_POST['post_comment_check_avatar_size'] :'';
				$post_comment_check_author=!empty($_POST['post_comment_check_author']) ? $_POST['post_comment_check_author'] :'';
				$post_comment_check_author_email=!empty($_POST['post_comment_check_author_email']) ? $_POST['post_comment_check_author_email'] :'';
				$post_comment_check_content=!empty($_POST['post_comment_check_content']) ? $_POST['post_comment_check_content'] :'';
				$post_comment_check_date=!empty($_POST['post_comment_check_date']) ? $_POST['post_comment_check_date'] :'';
				$post_comment_check_number=!empty($_POST['post_comment_check_number']) ? $_POST['post_comment_check_number'] :'';
			}
			$data=array(
						'cat_name'							=> $cat_name,
						'post_name'							=> "Post Name : ".$post_name,
						'post_id' 							=> $post_id,
						'post_category_check'				=> $post_category_check,
						'post_tags_check'					=> $post_tags_check,
						'post_title_check'					=> $post_title_check,
						'post_content_check'				=> $post_content_check,
						'post_featuared_image_check'		=> $post_featuared_image_check,
						'post_featured_image_dimention'		=> $post_featured_image_dimention,
						'post_featured_image_width'			=> $post_featured_image_width,
						'post_featured_image_height'		=> $post_featured_image_height,
						'post_author_check' 				=> $post_author_check,
						'post_custom_fields_check' 			=> $post_custom_fields_check,
						'post_custom_field'  				=> $post_custom_field,
						'post_comment_check'				=> $post_comment_check,
						'post_comment_check_avatar'			=> $post_comment_check_avatar,
						'post_comment_check_avatar_size'	=> $post_comment_check_avatar_size,
						'post_comment_check_author'			=> $post_comment_check_author,
						'post_comment_check_author_email'	=> $post_comment_check_author_email,
						'post_comment_check_content'		=> $post_comment_check_content,
						'post_comment_check_date'	 		=> $post_comment_check_date,
						'post_comment_check_number'	 		=> $post_comment_check_number
						);	
		}
		$where =array('id'=>$_POST['dpopd_id']);
		$wpdb->update($wpdb->prefix.'dpopd_settings', $data, $where);	
		wp_redirect( admin_url('admin.php?page=dpopd-list&ed_msg=suc'));		
		exit();	
	}
}
function dpopd_delete_data_process()
{
	global $wpdb;
	if(isset($_POST['dpopd_id']) && $_POST['dpopd_id']!="" && (isset($_POST['dpopd_select_action_top']) && $_POST['dpopd_select_action_top']=="delete" || isset($_POST['dpopd_select_action_bottom']) && $_POST['dpopd_select_action_bottom']=="delete"))
	{	
		$id_array=explode(",",$_POST['dpopd_id']);
		foreach($id_array as $id)
		{
			$where = array('id' => $id);
			$wpdb->delete($wpdb->prefix.'dpopd_settings',$where);
		}
		wp_redirect(admin_url('admin.php?page=dpopd-list&dl_msg=suc'));
	}
	else
	{
		wp_redirect(admin_url('admin.php?page=dpopd-list'));		
	}
	exit();
}