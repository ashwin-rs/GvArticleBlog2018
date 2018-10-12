<?php
defined('ABSPATH') or die("restricted access");
function dpopd_insert()
{
	global $current_user;
	if(!dpopd_check_current_user_level())
		{
			wp_die( __('<h2>You do not have enough permissions to access this page.</h2>') );
		}
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}dpopd_settings");
?>
	<div class="wrap">
		<?php if(isset($_GET['in_msg']) && $_GET['in_msg']=="error"){?><h3 style="color:red;	">Already you have created the shorcode for this page try another !!</h1><?php }?>
        <h1>Check the follwing settings</h1>
       <p>If you have any type of query releted to Alert customization then please contact with query to <b><a href="mailto:rupamhazra@gmail.com">rupamhazra@gmail.com</a></b></p>
       <p><b>If this plugin is usefull for you then please rate it <a href="https://wordpress.org/plugins/mapping-multiple-urls-redirect-same-page/">here</a>.</b></p>
        <form name="insert_form" method="post" action="<?php echo get_admin_url().'admin-post.php'; ?>" onsubmit="return dpopd_insert_valid_check()" novalidate>    
			<?php wp_nonce_field( 'dpopd_in_verify' ); ?>
            <input type="hidden" name="action" value="dpopd-submit-insert-form-data" />  
             <input type="hidden" name="page_name" id="page_name" value="" />
             <input type="hidden" name="post_name" id="post_name" value="" />
            <p>
				<label class="input_label" id="" for="title">Select Category : </label>
				<select name="cat_name" id="cat_name" style="width:20%;height: 35px;"onchange="check_options();">
					<option value="page" selected>Page</option>
					<option value="post">Post</option>	
				</select>
			</p> 
			<div id="select_page_div">
				<p>
					<label class="input_label" id="" for="title" style="margin-right: 32px;">Select Page : </label>
					<select name="page_id" id="page_id" style="width:20%;height: 35px;" onchange="select_page_name();"> 
						<option value="-1"><?php echo esc_attr( __( 'Select page' ) ); ?></option> 
							<?php 
							  $pages = get_pages(); 
							  foreach ( $pages as $page ) 
							  {
							  	$option = '<option value="' . $page->ID . '">';
								$option .= $page->post_title;
								$option .= '</option>';
								echo $option;
							  }
							  
								foreach ($results as $key => $object) 
								{
									$page_id_exist=$object->page_id;
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
			<div id="select_post_div" style="display:none;">
				<p>
					<label class="input_label" id="" for="title" style="margin-right: 35px;">Select Post : </label>
					<select name="post_id" id="post_id" style="width:20%;height: 35px;" onchange="select_post_name();"> 
						<option value="-1"><?php echo esc_attr( __( 'Select post' ) ); ?></option> 
					 	<?php 
					 		  $args=array('post_type' => 'post','post_status' => 'publish');
							  $pages1 = get_posts($args); 
							  foreach ( $pages1 as $page1 ) 
							  {
							  	$option = '<option value="' . $page1->ID . '">';
								$option .= $page1->post_title;
								$option .= '</option>';
								echo $option;
							  }			
							foreach ($results as $key => $object) 
							{
								$post_id_exist=$object->post_id; 
					 	?>
					 	<script>
					 			var select = document.getElementById("post_id");
					 			var post_id_exist="<?php echo $post_id_exist; ?>";
					 				for (i=0;i<select.length;  i++) {
									   if (select.options[i].value == post_id_exist) {
									     select.remove(i);
									   }
									}								
					 		</script> 
					 	<?php }	 ?>
					</select>
				</p>
			</div>
			<div id="valid_div" style="display:none;"><span style="color:red;">Please check atleast one checkbox</span></div>
			<div id="page_content_div_id" class="page_div_class">
				<p>
					<input type="checkbox" name="page_title_check" id="page_title_check">Check to display <b>Page Title</b>.
				</p>
				<p>
					<input type="checkbox" name="page_content_check" id="page_content_check">Check to display <b>Page Content</b>.
				</p>
				<p>
					<input type="checkbox" name="page_featuared_image_check" id="page_featuared_image_check" onclick="page_featured_image_check_dimention();">Check to display <b>Page Featuared Image</b>.
				</p>
				<div id="page_featured_image_dimention_div" style="display:none;">
					<p>
						
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="thumbnail" checked onclick="page_featured_image_width_height_check(this.value);">Thumbnail 
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="medium" onclick="page_featured_image_width_height_check(this.value);">Medium
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="large" onclick="page_featured_image_width_height_check(this.value);">Large 
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="full" onclick="page_featured_image_width_height_check(this.value);">Full 
						<input type="radio" name="page_featured_image_dimention" id="page_featured_image_dimention" value="custom" onclick="page_featured_image_width_height_check(this.value);">Custom
					</p>
						<p id="page_featured_image_width_height_p" style="display:none;">
							Width : <input type="number"  style="height:35px;width:8%" name="page_featured_image_width" id="page_featured_image_width" value="150">px
							Height : <input type="number" style="height:35px;width:8%" name="page_featured_image_height" id="page_featured_image_height" value="150">px
						</p>
					
				</div>
				<p>
					<input type="checkbox" name="page_author_check" id="page_author_check">Check to display <b>Page Author</b>.
				</p>
				<p>
					<input type="checkbox" name="page_custom_fields_check" id="page_custom_fields_check" onclick="check_custom_field_page();">Check to display <b>Page Custom Fileds</b>.
				</p>
				<div id="page_custom_fields_div" style="display:none;">
					<input type="text"  name="page_custom_field" id="page_custom_field" class="input_box own_input" placeholder="Ex. custom fileds1,custom field2" required/><br>
					<span>If more then one custom field then you have to write like<b>custom field 1,custom field 2</b></span>
				</div>
				<p>
					<input type="checkbox" name="page_comment_check" id="page_comment_check" onclick="page_comment_display_check();">Check to display <b>Page Comments</b>.
				</p>
				<div id="page_comment_check_div" style="margin-left:20px;display:none;">
						<span id="page_comment_error_span" style="color:red;display:none;">Check atleaset one checkbox</span>
					<p><input type="checkbox" name="page_comment_check_avatar" id="page_comment_check_avatar" onclick="page_comment_check_avatar_size_fu();">Check to display <b>avatar. </b>
					</p>
						<div id="page_comment_check_avatar_div" style="display:none;">
							<p><input type="number" name="page_comment_check_avatar_size" id="page_comment_check_avatar_size" placeholder='avatar size like 32 or 50 or any' value="50">px
								<br><span style='font-size:13px;'>Please note: Default it's take 32.This size you define which displayed as <b>50px x 50px or 32px x 32px</b></span>
							</p>
						</div>
					<p><input type="checkbox" name="page_comment_check_author" id="page_comment_check_author">Check to display Comments <b>Author. </b>
					</p>
					<p><input type="checkbox" name="page_comment_check_author_email" id="page_comment_check_author_email">Check to display <b>Author Email. </b>
					</p>
					<p><input type="checkbox" name="page_comment_check_date" id="page_comment_check_date">Check to display Comments <b>Date. </b>
					</p>
					<p><input type="checkbox" name="page_comment_check_content" id="page_comment_check_content">Check to display Comments <b>Content. </b>
					</p>
					<p><input type="checkbox" name="page_comment_check_number" id="page_comment_check_number">Check to display <b>No. of Comment. </b>
					</p>
				</div>
			</div>
			<div id="post_content_div_id" class="post_div_class" style="display:none;">
				<p>
					<input type="checkbox" name="post_category_check" id="post_category_check">Check to display <b>Post Category</b>.
				</p>
				<p>
					<input type="checkbox" name="post_tags_check" id="post_tags_check">Check to display <b>Post Tags</b>.
				</p>
				<p>
					<input type="checkbox" name="post_title_check" id="post_title_check">Check to display <b>Post Title</b>.
				</p>
				<p>
					<input type="checkbox" name="post_content_check" id="post_content_check">Check to display <b>Post Content</b>.
				</p>
				<p>
					<input type="checkbox" name="post_featuared_image_check" id="post_featuared_image_check" onclick="post_featured_image_check_dimention();">Check to display <b>Post Featuared Image</b>.
				</p>
				<div id="post_featured_image_dimention_div" style="display:none;">
					<p>
						
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="thumbnail" checked onclick="post_featured_image_width_height_check(this.value);">Thumbnail 
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="medium" onclick="post_featured_image_width_height_check(this.value);">Medium
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="large" onclick="post_featured_image_width_height_check(this.value);">Large 
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="full" onclick="post_featured_image_width_height_check(this.value);">Full 
						<input type="radio" name="post_featured_image_dimention" id="post_featured_image_dimention" value="custom" onclick="post_featured_image_width_height_check(this.value);">Custom 
					</p>
					<p id="post_featured_image_width_height_p" style="display:none;">
							Width : <input type="number" style="height:35px;width:8%" name="post_featured_image_width" id="post_featured_image_width" value="150">px
							Height : <input type="number" style="height:35px;width:8%" name="post_featured_image_height" id="post_featured_image_height" value="150">px
						</p>
					
				</div>
				<p>
					<input type="checkbox" name="post_author_check" id="post_author_check">Check to display <b>Post Author</b>.
				</p>
				<p>
					<input type="checkbox" name="post_custom_fields_check" id="post_custom_fields_check" onclick="check_custom_field_post();">Check to display <b>Post Custom Fileds</b>.
				</p>
				<div id="post_custom_fields_div" style="display:none;">
					<input type="text"  name="post_custom_field" id="post_custom_field" class="input_box own_input" placeholder="Ex. custom fileds1,custom field2" required/><br>
					<span>If more then one custom field then you have to write like  <b> custom field 1 , custom field 2</b></span>
				</div>
				<p>
					<input type="checkbox" name="post_comment_check" id="post_comment_check" onclick="post_comment_display_check();">Check to display <b>Post Comments</b>.
				</p>
				<div id="post_comment_check_div" style="margin-left:20px;display:none;">
					<span id="post_comment_error_span" style="color:red;display:none;">Check atleaset one checkbox</span>
					<p><input type="checkbox" name="post_comment_check_avatar" id="post_comment_check_avatar" onclick="post_comment_check_avatar_size_fu();">Check to display <b>avatar. </b>
					</p>
					<div id="post_comment_check_avatar_div" style="display:none;">
							<p><input type="number" name="post_comment_check_avatar_size" id="post_comment_check_avatar_size" placeholder='avatar size like 32 or 50 or any' value="50">px
								<br><span style='font-size:13px;'>Please note: Default it's take 32.This size you define which displayed as <b>50px x 50px or 32px x 32px</b></span>
							</p>
						</div>
					<p><input type="checkbox" name="post_comment_check_author" id="post_comment_check_author">Check to display Comments <b>Author. </b>
					</p>
					<p><input type="checkbox" name="post_comment_check_author_email" id="post_comment_check_author_email">Check to display <b>Author Email. </b>
					</p>
					<p><input type="checkbox" name="post_comment_check_date" id="post_comment_check_date">Check to display Comments <b>Date. </b>
					</p>
					<p><input type="checkbox" name="post_comment_check_content" id="post_comment_check_content">Check to display Comments <b>Content. </b>
					</p>
					<p><input type="checkbox" name="post_comment_check_number" id="post_comment_check_number">Check to display <b>No. of Comment. </b>
					</p>
				</div>
			</div>
			<input type="submit" class="button button-primary button-large" name="Submit" value="Save Settings" />				
        </form>
    </div>
<?php }?>