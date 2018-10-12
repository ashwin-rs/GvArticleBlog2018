<?php
defined('ABSPATH') or die("restricted access");
function dpopd_edit()
{
?>
	<div class="wrap">
        <h1>Check the follwing settings</h1>
         <p>If you have any type of query releted to Alert customization then please contact with query to <b><a href="mailto:rupamhazra@gmail.com">rupamhazra@gmail.com</a></b></p>
       <p><b>If this plugin is usefull for you then please rate it <a href="https://wordpress.org/plugins/mapping-multiple-urls-redirect-same-page/">here</a>.</b></p>
        <form name="edit_form" method="post" action="<?php echo get_admin_url().'admin-post.php'; ?>" onsubmit="return dpopd_insert_valid_check()" novalidate>    
			<?php wp_nonce_field( 'dpopd_ed_verify' ); ?>
            <input type="hidden" name="action" value="dpopd-submit-edit-form-data" />  
            <input type="hidden" name="page_name" id="page_name" value="" />
            <input type="hidden" name="post_name" id="post_name" value="" />
             <?php 
			if(isset($_GET['dpopd_id'])&& $_GET['dpopd_id']!="")
			{
				$dpopd_id=$_GET['dpopd_id'];
				global $wpdb;
				$results_array = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}dpopd_settings WHERE id=$dpopd_id");
				foreach ($results_array as $key => $object_edit) 
				{	
					$page_id=$object_edit->page_id;
					$post_id=$object_edit->post_id;

					$page_name = !empty($object_edit->page_name)? $object_edit->page_name : '';
					$post_name = !empty($object_edit->post_name)? $object_edit->post_name : '';
					if($page_name!='')
					{
						$page_or_post_name=$page_name;
					}
					else if($post_name!='')
					{
						$page_or_post_name=$post_name;
					}
					$cat_name=$object_edit->cat_name;				
					if($cat_name=="page")
					{
						$style_page="display:none;";
					?>
					<script>
					window.onload=function(){select_page_name();};
					</script>	
					<?php	
					}
					elseif($cat_name=="post")
					{
						$style_post="display:none;";
					?>
					<script>
					window.onload=function(){select_post_name();};
					</script>
					<?php	
					}
					$page_custom_fields_check=$object_edit->page_custom_fields_check;
					$post_custom_fields_check=$object_edit->post_custom_fields_check;
					if($page_custom_fields_check=="")
					{
						$style_custom_page="display:none;";
					}
					if($post_custom_fields_check=="")
					{
						$style_custom_post="display:none;";
					}
				}
			?>
			<input type="hidden" name="dpopd_id" id="dpopd_id" value="<?php echo $dpopd_id; ?>" />
            <p>
				<label class="input_label" id="" for="title">Select Category : </label>
				<select name="cat_name" id="cat_name" style="width:20%;height: 35px;"onchange="check_options();">
					<option value="page" <?php echo $cat_name =="page" ? "selected" :"" ?>>Page</option>
					<option value="post" <?php echo $cat_name =="post" ? "selected" :"" ?>>Post</option>	
				</select>
			</p> 
			<div id="select_page_div" style="<?php echo $style_post; ?>">
				<p>
					<label class="input_label" id="" for="title" style="margin-right: 32px;">Select Page : </label>
					<select name="page_id" id="page_id" style="width:20%;height: 35px;" onchange="select_page_name();"> 
					 	<?php 
							  $pages = get_pages(); // get all pages
							  foreach ( $pages as $page ) 
							  {
							  	$selected = $page->ID == $page_id ? "selected":'';
							  	$option = '<option value="' . $page->ID . '"'.$selected.'>';
								$option .= $page->post_title;
								$option .= '</option>';
								echo $option;
							  }
							  $results = $wpdb->get_results( "SELECT * FROM wp_dpopd_settings"); // existing page or post id check query
							  foreach ($results as $key => $object) 
								{
									$page_id_exist=$object->page_id;
									if($page_id_exist==$page_id)
									{
										$page_id_exist="";
									}
					 	?>
					 	<script>
					 			var select = document.getElementById("page_id");
					 			var page_id_exist="<?php echo $page_id_exist; ?>";
					 				for (i=0;i<select.length;  i++) {
									   if (select.options[i].value== page_id_exist) {
									     select.remove(i);
									   }
									}								
					 		</script> 
					 		<?php }	 ?>
					</select>
				</p>
			</div>
			<div id="select_post_div" style="<?php echo $style_page; ?>">
				<p>
					<label class="input_label" id="" for="title" style="margin-right: 35px;">Select Post : </label>
					<select name="post_id" id="post_id" style="width:20%;height: 35px;" onchange="select_post_name();"> 
					 	<?php 
					 		  $args=array('post_type' => 'post','post_status' => 'publish');
							  $posts = get_posts($args);  // get all post through argument array
							  foreach ( $posts as $post ) 
							  {
							  	$selected = $post->ID == $post_id ? "selected":'';
							  	$option = '<option value="' . $post->ID . '"'.$selected.'>';
								$option .= $post->post_title;
								$option .= '</option>';
								echo $option;
							  }
							  foreach ($results as $key => $object) 
								{
									$post_id_exist=$object->post_id;
									if($post_id_exist==$post_id)
									{
										$post_id_exist="";
									}
					 	?>
					 	<script>
					 			var select = document.getElementById("post_id");
					 			var post_id_exist="<?php echo $post_id_exist; ?>";
					 				for (i=0;i<select.length;  i++) {
									   if (select.options[i].value== post_id_exist) {
									     select.remove(i);
									   }
									}								
					 		</script> 
					 		<?php }	 ?>
					</select>
				</p>
			</div>
			<div id="valid_div" style="display:none;"><span style="color:red;">Please check atleast one checkbox</span></div>
			<div id="page_content_div_id" class="page_div_class" style="<?php echo $style_post;?>">
				<p>
					<input type="checkbox" name="page_title_check" id="page_title_check" <?php echo $object_edit->page_title_check =="on" ? "checked" :"" ?>>Check to display <b>Page Title</b>.
				</p>
				<p>
					<input type="checkbox" name="page_content_check" id="page_content_check" <?php echo $object_edit->page_content_check =="on" ? "checked" :"" ?>>Check to display <b>Page Content</b>.
				</p>
				<p>
					<input type="checkbox" name="page_featuared_image_check" id="page_featuared_image_check" <?php echo $object_edit->page_featuared_image_check =="on" ? "checked" :"" ?> onclick="page_featured_image_check_dimention();">Check to display <b>Page Featuared Image</b>.
				</p>
				<div id="page_featured_image_dimention_div" style="display:<?php echo $object_edit->page_featuared_image_check =="on" ? 'block':'none';?>">
					<p>
						
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="thumbnail" <?php echo $object_edit->page_featured_image_dimention=="thumbnail" ? 'checked' :''?> onclick="page_featured_image_width_height_check(this.value);">Thumbnail 
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="medium" <?php echo $object_edit->page_featured_image_dimention=="medium" ? 'checked' :''?> onclick="page_featured_image_width_height_check(this.value);">Medium
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="large" <?php echo $object_edit->page_featured_image_dimention=="large" ? 'checked' :''?> onclick="page_featured_image_width_height_check(this.value);">Large 
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="full"  <?php echo $object_edit->page_featured_image_dimention=="full" ? 'checked' :''?> onclick="page_featured_image_width_height_check(this.value);">Full 
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="custom" <?php echo $object_edit->page_featured_image_dimention=="custom" ? 'checked' :''?> onclick="page_featured_image_width_height_check(this.value);">Custom
					</p>
					<p id="page_featured_image_width_height_p" style="display:<?php echo $object_edit->page_featured_image_dimention=="custom" ? 'block;' :'none;'?>">
							Width : <input type="number" style="height:35px;width:8%;" name="page_featured_image_width" id="page_featured_image_width" value="<?php echo $object_edit->page_featured_image_width!="" ? $object_edit->page_featured_image_width :'150'?>">px
							Height : <input type="number" style="height:35px;width:8%;" name="page_featured_image_height" id="page_featured_image_height" value="<?php echo $object_edit->page_featured_image_height!="" ? $object_edit->page_featured_image_height :'150'?>">px
						</p>
				</div>
				<p>
					<input type="checkbox" name="page_author_check" id="page_author_check" <?php echo $object_edit->page_author_check =="on" ? "checked" :"" ?>>Check to display <b>Page Author</b>.
				</p>
				<p>
					<input type="checkbox" name="page_custom_fields_check" id="page_custom_fields_check" onclick="check_custom_field_page();" <?php echo $object_edit->page_custom_fields_check =="on" ? "checked" :"" ?>>Check to display <b>Page Custom Fileds</b>.
				</p>
				<div id="page_custom_fields_div" style="<?php echo $style_custom_page; ?>">
					<input type="text"  name="page_custom_field" id="page_custom_field" value="<?php echo $object_edit->page_custom_field!="" ? $object_edit->page_custom_field :"" ?>" class="input_box own_input" placeholder="Ex. custom fileds1,custom field2" required/><br>
					<span>If more then one custom field then you have to write like  <b> custom field 1 , custom field 2</b></span>
				</div>
				<p>
					<input type="checkbox" name="page_comment_check" id="page_comment_check" onclick="page_comment_display_check();"  <?php echo $object_edit->page_comment_check =="on" ? "checked" :"" ?>>Check to display <b>Page Comments</b>.
				</p>
				<div id="page_comment_check_div" style="margin-left:20px;display:<?php echo $object_edit->page_comment_check=="on" ? 'block;' :'none;'?>">
						<span id="page_comment_error_span" style="color:red;display:none;">Check atleaset one checkbox</span>
					<p><input type="checkbox" name="page_comment_check_avatar" id="page_comment_check_avatar" <?php echo $object_edit->page_comment_check_avatar =="on" ? "checked" :"" ?> onclick="page_comment_check_avatar_size_fu();">Check to display <b>avatar. </b>
					</p>
					<div id="page_comment_check_avatar_div" style="display:<?php echo $object_edit->page_comment_check_avatar=="on" ? 'block;' :'none;'?>">
							<p><input type="number" name="page_comment_check_avatar_size" id="page_comment_check_avatar_size" placeholder='avatar size like 32 or 50 or any' value="<?php echo $object_edit->page_comment_check_avatar_size!="" ? $object_edit->page_comment_check_avatar_size : 50 ?>">px
								<br><span style='font-size:13px;'>Please note: Default it's take 50. This size you define which displayed as <b>50px x 50px or 32px x 32px</b></span>
							</p>
					</div>
					<p><input type="checkbox" name="page_comment_check_author" id="page_comment_check_author" <?php echo $object_edit->page_comment_check_author =="on" ? "checked" :"" ?>>Check to display Comments <b>Author. </b>
					</p>
					<p><input type="checkbox" name="page_comment_check_author_email" id="page_comment_check_author_email" <?php echo $object_edit->page_comment_check_author_email =="on" ? "checked" :"" ?>>Check to display <b>Author Email. </b>
					</p>
					<p><input type="checkbox" name="page_comment_check_date" id="page_comment_check_date" <?php echo $object_edit->page_comment_check_date =="on" ? "checked" :"" ?>>Check to display Comments <b>Date. </b>
					</p>
					<p><input type="checkbox" name="page_comment_check_content" id="page_comment_check_content" <?php echo $object_edit->page_comment_check_content =="on" ? "checked" :"" ?>>Check to display Comments <b>Content. </b>
					</p>
					<p><input type="checkbox" name="page_comment_check_number" id="page_comment_check_number" <?php echo $object_edit->page_comment_check_number =="on" ? "checked" :"" ?>>Check to display  <b>No. of Comments. </b>
					</p>

				</div>
			</div>
			<div id="post_content_div_id" class="post_div_class" style="<?php echo $style_page; ?>">
				<p>
					<input type="checkbox" name="post_category_check" id="post_category_check" <?php echo $object_edit->post_category_check =="on" ? "checked" :"" ?>>Check to display <b>Post Category</b>.
				</p>
				<p>
					<input type="checkbox" name="post_tags_check" id="post_tags_check" <?php echo $object_edit->post_tags_check =="on" ? "checked" :"" ?>>Check to display <b>Post Tags</b>.
				</p>
				<p>
					<input type="checkbox" name="post_title_check" id="post_title_check" <?php echo $object_edit->post_title_check =="on" ? "checked" :"" ?>>Check to display <b>Post Title</b>.
				</p>
				<p>
					<input type="checkbox" name="post_content_check" id="post_content_check" <?php echo $object_edit->post_content_check =="on" ? "checked" :"" ?>>Check to display <b>Post Content</b>.
				</p>
				<p>
					<input type="checkbox" name="post_featuared_image_check" id="post_featuared_image_check" <?php echo $object_edit->post_featuared_image_check =="on" ? "checked" :"" ?> onclick="post_featured_image_check_dimention();">Check to display <b>Post Featuared Image</b>.
				</p>
				<div id="post_featured_image_dimention_div" style="display:<?php echo $object_edit->post_featuared_image_check =="on" ? 'block':'none';?>">
					<p>
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="thumbnail" <?php echo $object_edit->post_featured_image_dimention=="thumbnail" ? 'checked' :''?> onclick="post_featured_image_width_height_check(this.value);">Thumbnail 
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="medium" <?php echo $object_edit->post_featured_image_dimention=="medium" ? 'checked' :''?> onclick="post_featured_image_width_height_check(this.value);">Medium
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="large" <?php echo $object_edit->post_featured_image_dimention=="large" ? 'checked' :''?> onclick="post_featured_image_width_height_check(this.value);">Large 
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="full" <?php echo $object_edit->post_featured_image_dimention=="full" ? 'checked' :''?> onclick="post_featured_image_width_height_check(this.value);">Full 
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="custom" <?php echo $object_edit->post_featured_image_dimention=="custom" ? 'checked' :''?> onclick="post_featured_image_width_height_check(this.value);">Custom
						
					</p>
					<p id="post_featured_image_width_height_p" style="display:<?php echo $object_edit->post_featured_image_dimention=="custom" ? 'block;' :'none;'?>">
							Width : <input type="number" style="height:35px;width:8%;" name="post_featured_image_width" id="post_featured_image_width" value="<?php echo $object_edit->post_featured_image_width!="" ? $object_edit->post_featured_image_width :'150'?>">px
							Height : <input type="number" style="height:35px;width:8%;" name="post_featured_image_height" id="post_featured_image_height" value="<?php echo $object_edit->post_featured_image_height!="" ? $object_edit->post_featured_image_height :'150'?>">px
						</p>
				</div>
				<p>
					<input type="checkbox" name="post_author_check" id="post_author_check" <?php echo $object_edit->post_author_check =="on" ? "checked" :"" ?>>Check to display <b>Post Author</b>.
				</p>
				<p>
					<input type="checkbox" name="post_custom_fields_check" id="post_custom_fields_check" onclick="check_custom_field_post();" <?php echo $object_edit->post_custom_fields_check =="on" ? "checked" :"" ?>>Check to display <b>Post Custom Fileds</b>.
				</p>
				<div id="post_custom_fields_div" style="<?php echo $style_custom_post; ?>">
					<input type="text"  name="post_custom_field" id="post_custom_field" value="<?php echo $object_edit->post_custom_field!="" ? $object_edit->post_custom_field :"" ?>" class="input_box own_input" placeholder="Ex. custom fileds1,custom field2" required/><br>
					<span>If more then one custom field then you have to write like  <b> custom field 1 , custom field 2</b></span>
				</div>
				<p>
					<input type="checkbox" name="post_comment_check" id="post_comment_check" onclick="post_comment_display_check();" <?php echo $object_edit->post_comment_check =="on" ? "checked" :"" ?>>Check to display <b>Post Comments</b>.
				</p>
				<div id="post_comment_check_div" style="margin-left:20px;display:<?php echo $object_edit->post_comment_check=="on" ? 'block;' :'none;'?>">
						<span id="post_comment_error_span" style="color:red;display:none;">Check atleaset one checkbox</span>
					<p><input type="checkbox" name="post_comment_check_avatar" id="post_comment_check_avatar" <?php echo $object_edit->post_comment_check_avatar =="on" ? "checked" :"" ?> onclick="post_comment_check_avatar_size_fu();">Check to display <b>avatar. </b>
					</p>
					<div id="post_comment_check_avatar_div" style="display:<?php echo $object_edit->post_comment_check_avatar=="on" ? 'block;' :'none;'?>">
							<p><input type="number" name="post_comment_check_avatar_size" id="post_comment_check_avatar_size" placeholder='avatar size like 32 or 50 or any' value='<?php echo $object_edit->post_comment_check_avatar_size!="" ? $object_edit->post_comment_check_avatar_size : 50 ?>'>px
								<br><span style='font-size:13px;'>Please note: Default it's take 50.This size you define which displayed as <b>50px x 50px or 32px x 32px</b></span>
							</p>
					</div>
					<p><input type="checkbox" name="post_comment_check_author" id="post_comment_check_author" <?php echo $object_edit->post_comment_check_author =="on" ? "checked" :"" ?>>Check to display Comments <b>Author. </b>
					</p>
					<p><input type="checkbox" name="post_comment_check_author_email" id="post_comment_check_author_email" <?php echo $object_edit->post_comment_check_author_email =="on" ? "checked" :"" ?>>Check to display <b>Author Email. </b>
					</p>
					<p><input type="checkbox" name="post_comment_check_date" id="post_comment_check_date" <?php echo $object_edit->post_comment_check_date =="on" ? "checked" :"" ?>>Check to display Comments <b>Date. </b>
					</p>
					<p><input type="checkbox" name="post_comment_check_content" id="post_comment_check_content" <?php echo $object_edit->post_comment_check_content =="on" ? "checked" :"" ?>>Check to display Comments <b>Content. </b>
					</p>
					<p><input type="checkbox" name="post_comment_check_number" id="post_comment_check_number" <?php echo $object_edit->post_comment_check_number =="on" ? "checked" :"" ?>>Check to display <b>No. of Comments. </b>
					</p>
				</div>
			</div>
			<input type="submit" class="button button-primary button-large" name="Submit" value="Save Settings" />			
			<?php  } ?>	
        </form>

    </div>
<?php }?>