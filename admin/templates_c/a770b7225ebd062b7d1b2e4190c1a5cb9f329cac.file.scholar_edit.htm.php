<?php /* Smarty version Smarty-3.1.11, created on 2013-12-27 07:09:09
         compiled from "C:\wamp\www\islamicscholars\admin\templates\scholar_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1901152badfa1ceb512-81313042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a770b7225ebd062b7d1b2e4190c1a5cb9f329cac' => 
    array (
      0 => 'C:\\wamp\\www\\islamicscholars\\admin\\templates\\scholar_edit.htm',
      1 => 1388128040,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1901152badfa1ceb512-81313042',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52badfa2780be3_92887147',
  'variables' => 
  array (
    'static_url' => 0,
    'param' => 0,
    'data' => 0,
    'school_lst' => 0,
    'school_no' => 0,
    'value' => 0,
    'link_lst' => 0,
    'link_no' => 0,
    'image_path' => 0,
    'school_cnt' => 0,
    'link_cnt' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52badfa2780be3_92887147')) {function content_52badfa2780be3_92887147($_smarty_tpl) {?>
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

	//On Click scholar
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
</script>
<script src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector:'.textarea',
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
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
                <a class="current">Add an Scholar</a>
            </article>
        </div>
    </section><!-- end of secondary bar -->
    <aside id="sidebar" class="column">
<!--
        <h3>Content</h3>
        <ul class="toggle">
            <li class="icn_new_article"><a href="#">Introduction Message</a></li>
            <li class="icn_edit_article"><a href="#">About Us</a></li>
        </ul>
-->
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
        <h3>Admin</h3>
        <ul class="toggle">
            <li class="icn_jump_back"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_login/logout/">Logout</a></li>
        </ul>

        <footer>
                <hr />
                <p><strong>Copyright &copy; 2014 Islamic Scholars</strong></p>
                <p>Developed by <a href="http://www.yoteyote.com">Yoteyote</a></p>
        </footer>
</aside><!-- end of sidebar -->    <section id="main" class="column">		
                <div class="clear"></div>
        <form name="add_scholar_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_scholar/edit/<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" enctype="multipart/form-data">
        <article class="module width_full">
            <header><h3>Add New Scholar</h3></header>
            <div class="module_content">
            <fieldset>
                <label>Name</label>
                <input type="text" id="name" name ="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sclar_name'];?>
" />
            </fieldset>
            <fieldset>
                <label>Birth Day</label>
                <input type="text" name ="date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['sclar_birth'];?>
" id="datepicker" onclick="javascript:NewCssCal('datepicker','YYYYMMDD')"/>
            </fieldset>    
            <fieldset>
                <label>School</label>
                <div style="clear:both; margin-bottom:10px">
				<input type="text" style="width:500px" id="school_name">
                <input type="button" value="Add School" onClick="add_school();">
				</div>
                <div id="school_pane">
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['school_lst']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                	<span style="display:none"><?php echo $_smarty_tpl->tpl_vars['school_no']->value++;?>
</span>
                    <div id="school_<?php echo $_smarty_tpl->tpl_vars['school_no']->value;?>
" style="clear:both; margin-left:50px">
                    <div id="school_value_<?php echo $_smarty_tpl->tpl_vars['school_no']->value;?>
" style="float:left;margin-top:5px; width:auto; min-width:200px"><?php echo $_smarty_tpl->tpl_vars['value']->value['schl_name'];?>
</div>
                    <div style="float:left"><input type="button" value="Delete" onClick="del_school(<?php echo $_smarty_tpl->tpl_vars['school_no']->value;?>
);"></div>
                    </div>
                <?php } ?>
				</div>
            </fieldset>  
            <fieldset>
                <label>Link</label>
                <div style="clear:both; margin-bottom:10px">
				<input type="text" style="width:500px" id="link_name">
                <input type="button" value="Add Link" onClick="add_link();">
				</div>
                <div id="link_pane">
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_lst']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                	<span style="display:none"><?php echo $_smarty_tpl->tpl_vars['link_no']->value++;?>
</span>
                    <div id="link_<?php echo $_smarty_tpl->tpl_vars['link_no']->value;?>
" style="clear:both; margin-left:50px">
                    <div id="link_value_<?php echo $_smarty_tpl->tpl_vars['link_no']->value;?>
" style="float:left;margin-top:5px; width:auto; min-width:200px"><?php echo $_smarty_tpl->tpl_vars['value']->value['res_link'];?>
</div>
                    <div style="float:left"><input type="button" value="Delete" onClick="del_link(<?php echo $_smarty_tpl->tpl_vars['link_no']->value;?>
);"></div>
                    </div>
                <?php } ?>
				</div>
            </fieldset>  
            <fieldset>
                <label>Life</label>
                <textarea name ="life"  class='textarea'><?php echo $_smarty_tpl->tpl_vars['data']->value['sclar_life'];?>
</textarea>
            </fieldset>  
            <fieldset>
                <label>Picture</label>
                <?php if ($_smarty_tpl->tpl_vars['image_path']->value!=''){?>
                <input type="image" style="margin-left:-100px;" src="../../../<?php echo $_smarty_tpl->tpl_vars['image_path']->value;?>
" width="100px" height="100px">
                <?php }?>
                <input type="file" name ="image" />
            </fieldset>   
            <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <input type="submit" name="addScholar" value="Update Scholar"  onClick="return check_data();" class="alt_btn">
                    <input type="reset" value="Reset">
                </div>
            </footer>
			<input type="hidden" id="schools" name="schools" value="">
			<input type="hidden" id="links" name="links" value="">
			<input type="hidden" id="school_count" name="school_count" value="<?php echo $_smarty_tpl->tpl_vars['school_cnt']->value;?>
">
			<input type="hidden" id="link_count" name="link_count" value="<?php echo $_smarty_tpl->tpl_vars['link_cnt']->value;?>
">
        </form>
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>
<script language="javascript" type="text/javascript">
var school_count = document.getElementById("school_count").value;
var link_count = document.getElementById("link_count").value;
function add_school(){
	var name_obj = document.getElementById("school_name");
	if(name_obj.value == ""){
		alert("Input School");
		name_obj.focus();
		return;
	}
	
	school_count ++;
	var obj = document.getElementById("school_pane");
	var html = obj.innerHTML;
	html += '<div id="school_'+school_count+'" style="clear:both; margin-left:50px">';
	html += 	'<div id="school_value_'+school_count+'" style="float:left;margin-top:5px; width:auto; min-width:200px">'+name_obj.value+'</div>';
	html += 	'<div style="float:left"><input type="button" value="Delete" onClick="del_school('+school_count+');"></div>';
	html += '</div>'
	obj.innerHTML = html;
}

function del_school(id){
	var obj = document.getElementById("school_"+id);
	obj.style.display = "none";
}

function add_link(){
	var name_obj = document.getElementById("link_name");
	if(name_obj.value == ""){
		alert("Input Link");
		name_obj.focus();
		return;
	}
	
	link_count ++;
	var obj = document.getElementById("link_pane");
	var html = obj.innerHTML;
	html += '<div id="link_'+link_count+'" style="clear:both; margin-left:50px">';
	html += 	'<div id="link_value_'+link_count+'" style="float:left;margin-top:5px; width:auto; min-width:200px">'+name_obj.value+'</div>';
	html += 	'<div style="float:left"><input type="button" value="Delete" onClick="del_link('+link_count+');"></div>';
	html += '</div>'
	obj.innerHTML = html;
}

function del_link(id){
	var obj = document.getElementById("link_"+id);
	obj.style.display = "none";
}

function check_data(){
	var name_obj = document.getElementById("name");
	if(name_obj.value == ""){
		alert("Input Name");
		name_obj.focus();
		return false;
	}
	
	var school_str = "";
	for(var i=1; i<=school_count; i++){
		var obj = document.getElementById("school_value_"+i);
		if(obj){
			var schoolObj = document.getElementById("school_"+i);
			if(schoolObj.style.display != "none"){
				school_str += ("@/!@#^SI@#DF@#@!~HI"+obj.innerHTML);
			}
		}
	}
	var schools = document.getElementById("schools");
	schools.value = school_str;

	var link_str = "";
	for(var i=1; i<=link_count; i++){
		var obj = document.getElementById("link_value_"+i);
		if(obj){
			var linkObj = document.getElementById("link_"+i);
			if(linkObj.style.display != "none"){
				link_str += ("@/!@#^SI@#DF@#@!~HI"+obj.innerHTML);
			}
		}
	}
	var links = document.getElementById("links");
	links.value = link_str;
	return true;
}

</script>
</body>

</html>
<?php }} ?>