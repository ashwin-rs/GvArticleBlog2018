function check_options()
{
	if(document.getElementById('cat_name').value=="page")
	{
		document.getElementById('page_content_div_id').style.display="block";
		document.getElementById('post_content_div_id').style.display="none";
		document.getElementById('page_custom_fields_check').checked=false;
		document.getElementById('page_custom_fields_div').style.display="none";
		document.getElementById('select_page_div').style.display="block";
		document.getElementById('select_post_div').style.display="none";
		document.getElementById('valid_div').style.display="none"; 
	}
	else if(document.getElementById('cat_name').value=="post")
	{
		document.getElementById('post_content_div_id').style.display="block";
		document.getElementById('page_content_div_id').style.display="none";
		document.getElementById('post_custom_fields_check').checked=false;
		document.getElementById('post_custom_fields_div').style.display="none";
		document.getElementById('select_post_div').style.display="block";
		document.getElementById('select_page_div').style.display="none";
		document.getElementById('valid_div').style.display="none"; 
	}
}
function check_custom_field_page()
{
	if(document.getElementById('page_custom_fields_check').checked==true)
	{
		document.getElementById('page_custom_fields_div').style.display="block";
	}
	else
	{
		document.getElementById('page_custom_fields_div').style.display="none";
		document.getElementById('page_custom_field').value="";
	}
}
function check_custom_field_post()
{
	if(document.getElementById('post_custom_fields_check').checked==true)
	{
		document.getElementById('post_custom_fields_div').style.display="block";
	}
	else
	{
		document.getElementById('post_custom_fields_div').style.display="none";
		document.getElementById('post_custom_field').value="";
	}
}

function dpopd_insert_valid_check() 
{
	if(document.getElementById('cat_name').value=="page")     
	{
		if(document.getElementById('page_id').value=="-1")
		{
			document.getElementById('page_id').style.border="1px solid #dc8a8a"; 
			return false;  
		}
		if(document.getElementById('page_title_check').checked==false && document.getElementById('page_content_check').checked==false && document.getElementById('page_featuared_image_check').checked==false &&
		document.getElementById('page_author_check').checked==false)
		{
			document.getElementById('valid_div').style.display="block"; 
			return false;        
		}
		if(document.getElementById('page_custom_fields_check').checked==true)
		{
			if(document.getElementById('page_custom_field').value.trim()=="")
			{
				document.getElementById('page_custom_field').style.border="1px solid #dc8a8a";
				return false;
			}
		}
		if(document.getElementById('page_comment_check').checked==true)    
		{
			if(document.getElementById('page_comment_check_author').checked==false && document.getElementById('page_comment_check_content').checked==false)
			{
				document.getElementById('page_comment_error_span').style.display="block";
				return false;
			}
		}
		if(document.getElementById('page_comment_check_avatar').checked==true)
		{
			if(document.getElementById('page_comment_check_avatar_size').value.trim()=="")
			{
				document.getElementById('page_comment_check_avatar_size').style.border="1px solid #dc8a8a";
				return false;
			}
		}
	}
	if(document.getElementById('cat_name').value=="post")     
	{
		if(document.getElementById('post_id').value=="-1")
		{
			document.getElementById('post_id').style.border="1px solid #dc8a8a"; 
			return false;  
		}

		if(document.getElementById('post_category_check').checked==false && document.getElementById('post_content_check').checked==false &&
		document.getElementById('post_author_check').checked==false && document.getElementById('post_title_check').checked==false && document.getElementById('post_tags_check').checked==false && document.getElementById('post_featuared_image_check').checked==false && document.getElementById('post_author_check').checked==false && document.getElementById('post_custom_fields_check').checked==false)
		{
			document.getElementById('valid_div').style.display="block"; 
			return false;        
		}
		if(document.getElementById('post_custom_fields_check').checked==true)
		{
			if(document.getElementById('post_custom_field').value.trim()=="")
			{
				document.getElementById('post_custom_field').style.border="1px solid #dc8a8a";
				return false;
			}
			
		}
		if(document.getElementById('post_comment_check').checked==true)    
		{
			if(document.getElementById('post_comment_check_author').checked==false && document.getElementById('post_comment_check_content').checked==false)
			{
				document.getElementById('post_comment_error_span').style.display="block";
				return false;
			}
		}
		if(document.getElementById('post_comment_check_avatar').checked==true)
		{
			if(document.getElementById('post_comment_check_avatar_size').value.trim()=="")
			{
				document.getElementById('post_comment_check_avatar_size').style.border="1px solid #dc8a8a";
				return false;
			}
		}     
	}	
}
function select_page_name()
{
	var select_id = document.getElementById("page_id");
	var page_name = select_id.options[select_id.selectedIndex].text
	document.getElementById('page_name').value=page_name;
}
function select_post_name()
{
	var select_id = document.getElementById("post_id");
	var post_name = select_id.options[select_id.selectedIndex].text
	document.getElementById('post_name').value=post_name;
}

function dpopd_how_many()
{
	var checkedValue = ""; 
	var inputElements = document.getElementsByClassName('dpopd_delete_check_class');
	for(var i=0; inputElements[i]; ++i)
	{
      	if(inputElements[i].checked)
      	{
           checkedValue += inputElements[i].value +",";
      	}
	}
	document.getElementById('dpopd_id').value=checkedValue;
	document.getElementById("dpopd_deleteForm").submit();
}
function dpopd_all_check_top()
{
	if(document.getElementById('dpopd_root_checkbox_id_top').checked==true)
	{
		document.getElementById('dpopd_root_checkbox_id_bottom').checked=true;
		var inputElements = document.getElementsByClassName('dpopd_delete_check_class');
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=true;
		}
	}
	else
	{
		document.getElementById('dpopd_root_checkbox_id_bottom').checked=false;
		var inputElements = document.getElementsByClassName('dpopd_delete_check_class');
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=false;
		}
	}
}
function dpopd_all_check_bottom()
{
	if(document.getElementById('dpopd_root_checkbox_id_bottom').checked==true)
	{
		document.getElementById('dpopd_root_checkbox_id_top').checked=true;
		var inputElements = document.getElementsByClassName('dpopd_delete_check_class');
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=true;
		}
	}
	else
	{
		document.getElementById('dpopd_root_checkbox_id_top').checked=false;
		var inputElements = document.getElementsByClassName('dpopd_delete_check_class');
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=false;
		}
	}
}
function dpopd_each_check(which_id)
{
	var inputElements = document.getElementsByClassName('dpopd_delete_check_class');
	if(document.getElementById('dpopd_root_checkbox_id_top').checked==true || document.getElementById('dpopd_root_checkbox_id_bottom').checked==true)
	{
		document.getElementById('dpopd_root_checkbox_id_top').checked=false;
		document.getElementById('dpopd_root_checkbox_id_bottom').checked=false;
		for(var i=0; inputElements[i]; ++i)
		{
			inputElements[i].checked=true;
			if(inputElements[i].value==which_id)
			{
				inputElements[i].checked=false;
			}		
		}
	}
}

function page_featured_image_check_dimention()
{
	if(document.getElementById('page_featuared_image_check').checked==true)
	{
		document.getElementById('page_featured_image_dimention_div').style.display="block";
	}
	else
	{
		document.getElementById('page_featured_image_dimention_div').style.display="none";
	}
}
function post_featured_image_check_dimention()
{
	if(document.getElementById('post_featuared_image_check').checked==true)
	{
		document.getElementById('post_featured_image_dimention_div').style.display="block";
	}
	else
	{
		document.getElementById('post_featured_image_dimention_div').style.display="none";
	}
}
function page_featured_image_width_height_check(which_value)
{
	if(which_value=="custom")
	{
		document.getElementById('page_featured_image_width_height_p').style.display="block";
		document.getElementById('page_featured_image_height').value=150;
		document.getElementById('page_featured_image_width').value=150;
	}
	else
	{
		document.getElementById('page_featured_image_width_height_p').style.display="none";
		document.getElementById('page_featured_image_height').value="";
		document.getElementById('page_featured_image_width').value="";
	}
}
function post_featured_image_width_height_check(which_value)
{
	if(which_value=="custom")
	{
		document.getElementById('post_featured_image_width_height_p').style.display="block";
		document.getElementById('post_featured_image_height').value=150;
		document.getElementById('post_featured_image_width').value=150;
	}
	else
	{
		document.getElementById('post_featured_image_width_height_p').style.display="none";
		document.getElementById('post_featured_image_height').value="";
		document.getElementById('post_featured_image_width').value="";
	}
}
function page_comment_display_check()
{
	if(document.getElementById('page_comment_check').checked==true)
	{
		document.getElementById('page_comment_check_div').style.display="block";
	}
	else
	{
		document.getElementById('page_comment_check_div').style.display="none";
		document.getElementById('page_comment_check_author').checked=false;
		document.getElementById('page_comment_check_content').checked=false;
	}
}
function post_comment_display_check()
{
	if(document.getElementById('post_comment_check').checked==true)
	{
		document.getElementById('post_comment_check_div').style.display="block";
	}
	else
	{
		document.getElementById('post_comment_check_div').style.display="none";
		document.getElementById('post_comment_check_author').checked=false;
		document.getElementById('post_comment_check_content').checked=false;

	}
}
function page_comment_check_avatar_size_fu()
{
	if(document.getElementById('page_comment_check_avatar').checked==true)
	{
		document.getElementById('page_comment_check_avatar_div').style.display="block";
		document.getElementById('page_comment_check_avatar_size').value=50;
	}
	else
	{
		document.getElementById('page_comment_check_avatar_div').style.display="none";
		document.getElementById('page_comment_check_avatar_size').value="";
	}
}
function post_comment_check_avatar_size_fu()
{
	if(document.getElementById('post_comment_check_avatar').checked==true)
	{
		document.getElementById('post_comment_check_avatar_div').style.display="block";
		document.getElementById('post_comment_check_avatar_size').value=50;
	}
	else
	{
		document.getElementById('post_comment_check_avatar_div').style.display="none";
		document.getElementById('post_comment_check_avatar_size').value="";
	}
}

