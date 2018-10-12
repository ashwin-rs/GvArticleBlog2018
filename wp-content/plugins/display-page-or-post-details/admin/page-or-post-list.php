<?php
defined('ABSPATH') or die("restricted access");
function dpopd_list()
{
	global $wpdb;
	//$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}dpopd_settings");
?>
	<div class="wrap">
		<h1>Shortcode List <a href="<?php echo admin_url('admin.php?page=dpopd-list&view=addnew'); ?>" class="page-title-action" role="button">Add New</a></h1>
		<?php include_once('page-or-post-message.php');?>
		<form method="post" name="dpopd_deleteForm" id="dpopd_deleteForm" action="<?php echo get_admin_url().'admin-post.php'; ?>">
			<input type="hidden" name="action" value="dpopd-submit-delete-form-data" />  
			<input type="hidden" id="dpopd_id" name="dpopd_id" value=""/> 
			<div class="tablenav top" id="tablenavtop_id">
				<div class="alignleft actions bulkactions">
					<label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
					<select name="dpopd_select_action_top" id="bulk-action-selector-top">
						<option value="-1">Bulk Actions</option>
						<option value="delete" class="hide-if-no-js">Delete</option>
					</select>
					<input type="button" id="doaction" class="button action"  onclick="dpopd_how_many();" value="Apply">
				</div>
				<div class="tablenav-pages one-page">
					<?php
							$table_name = "{$wpdb->prefix}dpopd_settings";
							$customPagHTML     = "";
							$query             = "SELECT * FROM $table_name";
							$total_query     = "SELECT COUNT(1) FROM (${query}) AS combined_table";
							$total             = $wpdb->get_var( $total_query );
							$items_per_page = 8;
							$page             = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
							$offset         = ( $page * $items_per_page ) - $items_per_page;
							$result         = $wpdb->get_results( $query . " ORDER BY id DESC LIMIT ${offset}, ${items_per_page}");
							$totalPage         = ceil($total / $items_per_page);
							$pagination_link=paginate_links( array(
							'base' => add_query_arg( 'cpage', '%#%' ),
							'format' => '',
							'prev_next'=> true,
							'prev_text'          => __('« '),
							'next_text'          => __(' »'),
							'total' => $totalPage,
							'current' => $page
							));
							if($totalPage > 1){
							$customPagHTML     =  '<span class="displaying-num" id="">'.$total.' items </span>	<span class="displaying-num">Page '.$page.' of '.$totalPage.'</span>'.$pagination_link;
							
							}		
							?>
					<?php echo $customPagHTML;?>
				</div>
			</div>
			<table class="wp-list-table widefat fixed striped posts">
				<thead>
				  <tr>
					<th>
						<input id="dpopd_root_checkbox_id_top" type="checkbox"  style="margin-left:0px;margin-right:5px;" value="1" onclick="dpopd_all_check_top()">
						<span>Page or Post Name</span>
					</th>
					<th>Category</th>
					<th colspan="2">Shortcode</th>
				  </tr>
				</thead>
				
				<tbody id="the-list">					  
						<?php	
						$count_item=0;
						foreach ($result as $key => $object) {  
							$id     = !empty($object->id) ? $object->id : '';
							$cat_name  = !empty($object->cat_name)? $object->cat_name : '';
							$page_id     = !empty($object->page_id) ? $object->page_id : '';
							$post_id     = !empty($object->post_id) ? $object->post_id : '';
							if($page_id!='')
							{
								$page_or_post_id=$page_id;
							}
							else if($post_id!='')
							{
								$page_or_post_id=$post_id;
							}
							
							$page_name = !empty($object->page_name)? $object->page_name : '';
							$post_name = !empty($object->post_name)? $object->post_name : '';
							if($page_name!='')
							{
								$page_or_post_name=$page_name;
							}
							else if($post_name!='')
							{
								$page_or_post_name=$post_name;
							}
							$count_item++;
						?>								
						<tr>
							<td>
								<input id="delete_check_id_<?php echo $id; ?>" class="dpopd_delete_check_class" type="checkbox" name="delete_check[]" onclick="dpopd_each_check(<?php echo $id; ?>)" value="<?php echo $id; ?>">								
							<a href="<?php echo admin_url('admin.php?page=dpopd-list&view=edit&dpopd_id='.$id); ?>"><?php echo $page_or_post_name; ?></a>
								<div class="row-actions" style="margin-left: 25px;">
									<span class="edit"><a href="<?php echo admin_url('admin.php?page=dpopd-list&view=edit&dpopd_id='.$id); ?>" aria-label="Edit “Sample Page”">Edit</a></span>
		    					</div>
							</td>
							<td><a href="<?php echo admin_url('admin.php?page=dpopd-list&view=edit&dpopd_id='.$id); ?>"><?php echo $cat_name; ?></a>
								
							</td>
							<td colspan="2"><strong>[dpopdDisplay id="<?php echo $page_or_post_id; ?>"]</strong>
								<br>
								<span>Shortcode for .php file <br> <?php $str='<?php do_shortcode("[dpopdDisplay id="'.$page_or_post_id.'"]")?>'; echo highlight_string($str,TRUE) ?></span>
							</td>
						</tr>
						<?php	} if($count_item==0){?>
						<tr><td colspan="5">No Shortcode found</td></tr>	
						<?php } ?>
				</tbody>
				</div>
				<tfoot>
				  <tr>
					<th>
						<input id="dpopd_root_checkbox_id_bottom" type="checkbox" style="margin-left:0px;margin-right:5px;" value="1" onclick="dpopd_all_check_bottom()">
						<span>Page or Post Name</span>
					</th>
					<th>Category</th>
					<th colspan="2">Shortcode</th>	
				  </tr>
				</tfoot>
			</table>
			<div class="tablenav bottom" id="tablenavbottom_id">
				<div class="alignleft actions bulkactions">
					<label for="bulk-action-selector-bottom" class="screen-reader-text">Select bulk action</label><select name="dpopd_select_action_bottom" id="bulk-action-selector-bottom">
							<option value="-1">Bulk Actions</option>
							<option value="delete" class="hide-if-no-js">Delete</option>
						</select>
					<input type="submit" id="doaction2" class="button action" onclick="dpopd_how_many();" value="Apply">
				</div>
				<div class="tablenav-pages one-page"><span class="displaying-num" id="total_item_bottom_id"></span></div>
				<br class="clear">
			</div>
			<script> 
				var count_item = <?php echo $count_item; ?>;
				if(count_item == 0)
				{
					document.getElementById('tablenavbottom_id').style.display="none";
					document.getElementById('tablenavtop_id').style.display="none";
				}
			</script>
		</form>	
	</div>	
<?php } ?>