<?php /* Smarty version Smarty-3.1.11, created on 2013-06-22 16:19:16
         compiled from "C:\xampp\htdocs\hmvc\templates\m_lib_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:2303851c5b2641d4514-43368048%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd587b83d06fd5d6c945894116696d28d1958c45a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hmvc\\templates\\m_lib_edit.htm',
      1 => 1371714938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2303851c5b2641d4514-43368048',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
    'param' => 0,
    'data' => 0,
    'scholar_lst' => 0,
    'value' => 0,
    'image_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c5b2642dec83_74410762',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c5b2642dec83_74410762')) {function content_51c5b2642dec83_74410762($_smarty_tpl) {?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard | Admin Panel</title>
	
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/css/admin/jquery-ui-1.10.3.custom.min.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/css/admin/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/css/admin/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/js/jquery-1.9.1.js" type="text/javascript"></script>
        <script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/js/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/js/datetimepicker_css.js"></script>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/js/jquery.equalHeight.js"></script>
	<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/js/application.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
	
var formdata = false; // for upload with ajax	
if (window.FormData) {
	formdata = new FormData();
}

  function fn_make_upload(){

		var fileObj = document.getElementById("browse");
		var i = 0, len = fileObj.files.length, img, reader, file;
		
		for ( ; i < len; i++ ) {
			file = fileObj.files[i];
		
//				if (!!file.type.match(/image.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}
				if (formdata) {
					formdata.append("images[]", file);
				}
//				}	
		}
		var obj = document.getElementById('filename_div');
		obj.innerHTML = "Uploading ...";
		if (formdata) {
			$.ajax({
			  url : '<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_lib/upload/',
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				complete:function(){
				},
				success:function(msg){
					if(msg != "fail"){
						var obj2 = document.getElementById('lib_file');
						obj2.value = msg;
					}
					var obj = document.getElementById('filename_div');
						obj.innerHTML = "";

					if (window.FormData) {
						formdata = new FormData();
					}
					else
						formdata = false;
				}
			});
		}
  }
	
</script>

</head>

<body>    <header id="header">
            <hgroup>
                    <h1 class="site_title"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_event/index/1">Website Admin</a></h1>
                    <h2 class="section_title">Dashboard</h2>
                    <div class="btn_view_site"><a href="../index.php">View Site</a></div>
            </hgroup>
    </header> <!-- end of header bar -->
    <section id="secondary_bar">
        <div class="user">
            <p>admin <!--(<a href="#">3 Messages</a>)--></p>
            <a class="logout_user" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_login/logout/" title="Logout">Logout</a>
        </div>
        <div class="breadcrumbs_container">
            <article class="breadcrumbs">
                <a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_event/index/1">Website Admin</a> 
                <div class="breadcrumb_divider"></div> 
                <a class="current">Add an Library</a>
            </article>
        </div>
    </section><!-- end of secondary bar -->
    <aside id="sidebar" class="column">
        <h3>Events</h3>
        <ul class="toggle">
            <li class="icn_categories"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_event/add/" >Add Event</a></li>
            <li class="icn_edit_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_event/index/1" >View Events</a></li>
        </ul>
        <h3>Users</h3>
        <ul class="toggle">
            <li class="icn_add_user"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_user/add/" >Add New User</a></li>
            <li class="icn_view_users"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_user/index/1" >View Users</a></li>
        </ul>
        <h3>Scholars</h3>
        <ul class="toggle">
            <li class="icn_new_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_scholar/add/" >Add Scholar</a></li>
            <li class="icn_edit_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_scholar/index/1" >View Scholars</a></li>
        </ul>
        <h3>Libraries</h3>
        <ul class="toggle">
                <li class="icn_folder"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_lib/add/">Add Library</a></li>
                <li class="icn_photo"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_lib/index/1">View Libraries</a></li>
        </ul>
		<h3>News</h3>
        <ul class="toggle">
            <li class="icn_new_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_news/add/" >Add News</a></li>
            <li class="icn_edit_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_news/index/1" >View News</a></li>
        </ul>
        <h3>Calendar</h3>
        <ul class="toggle">
            <li class="icn_new_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_calendar/index/" >Set Calendar</a></li>
        </ul>
		<h3>Q &amp; A</h3>
        <ul class="toggle">
            <li class="icn_edit_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_query/index/1" >View Queries</a></li>
        </ul>
		<h3>Appointment</h3>
        <ul class="toggle">
            <li class="icn_edit_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_appoint/index/1" >View appointments</a></li>
        </ul>
<h3>Admin</h3>
        <ul class="toggle">
            <li class="icn_jump_back"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_login/logout/">Logout</a></li>
        </ul>

        <footer>
                <hr />
                <p><strong>Copyright &copy; 2013 Said John</strong></p>
                <p>Developed by <a href="http://www.yoteyote.com">Yoteyote</a></p>
        </footer>
</aside><!-- end of sidebar -->    <section id="main" class="column">		
                <div class="clear"></div>
        <form name="add_event_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_lib/edit/<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" enctype="multipart/form-data">
        <article class="module width_full">
            <header><h3>Add New Library</h3></header>
            <div class="module_content">
            <fieldset>
                <label>Title</label>
                <input type="text" name ="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['lib_title'];?>
" />
            </fieldset>
            <fieldset>
                <label>Description</label>
                <textarea name ="description"><?php echo $_smarty_tpl->tpl_vars['data']->value['lib_desc'];?>
</textarea>
            </fieldset>  
            <fieldset>
                <label>Author</label>
                <select name="author">
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scholar_lst']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                	<option  <?php if ($_smarty_tpl->tpl_vars['data']->value['lib_author']==$_smarty_tpl->tpl_vars['value']->value['sclar_id']){?> selected <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['value']->value['sclar_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['sclar_name'];?>
</option>
                <?php } ?>
                </select>
            </fieldset>  
            <fieldset>
                <label>Cover Picture</label>
                <?php if ($_smarty_tpl->tpl_vars['image_path']->value!=''){?>
                <input type="image" style="margin-left:-100px;" src="../../../<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
" width="100px" height="100px">
                <?php }?>
                <input type="file" name ="image" />
            </fieldset>   
            <fieldset>
                <label>Type</label>
				<input style="margin-left:-120px;" type="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['lib_type']=='1'){?> checked <?php }?> id="radio1" name="type">book&nbsp;
				<input type="radio" value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['lib_type']=='2'){?> checked <?php }?> id="radio2" name="type">flash&nbsp;
				<input type="radio" value="3" <?php if ($_smarty_tpl->tpl_vars['data']->value['lib_type']=='3'){?> checked <?php }?> id="radio3" name="type">mp3&nbsp;
				<input type="radio" value="4" <?php if ($_smarty_tpl->tpl_vars['data']->value['lib_type']=='4'){?> checked <?php }?> id="radio4" name="type">video
            </fieldset>   
            <fieldset>
                <label>File</label>
                <input type="file" id="browse" name ="fileupload" onChange="fn_make_upload();"/>
                <div id="filename_div" style="max-width:300px; margin-left:10px;"><?php echo $_smarty_tpl->tpl_vars['data']->value['lib_file'];?>
</div>
            </fieldset>   
            <fieldset>
                <label>Date</label>
                <input type="text" name ="date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['lib_date'];?>
" id="datepicker" onclick="javascript:NewCssCal('datepicker','YYYYMMDD')"/>
            </fieldset>    
 
            <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <input type="hidden" name="lib_file" id="lib_file" value="">
                    <input type="submit" name="addLib" value="Update Library" onClick="return check_data();" class="alt_btn">
                    <input type="reset" value="Reset">
                </div>
            </footer>
        </form>
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>
<script language="javascript" type="text/javascript">
function check_data(){
	var name_obj = document.getElementById("name");
	if(name_obj.value == ""){
		alert("Input Title");
		name_obj.focus();
		return false;
	}
}
</script>


</body>

</html>
<?php }} ?>