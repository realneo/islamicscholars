<?php /* Smarty version Smarty-3.1.11, created on 2013-12-22 13:39:52
         compiled from "/Users/Administrator/Sites/islamicscholars/admin/templates/scholar_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:22937479520899793d45a4-43351461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55b624d6f802aac6074134ee64a62d75756ea9c5' => 
    array (
      0 => '/Users/Administrator/Sites/islamicscholars/admin/templates/scholar_add.htm',
      1 => 1387715782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22937479520899793d45a4-43351461',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5208997945eb02_82884367',
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5208997945eb02_82884367')) {function content_5208997945eb02_82884367($_smarty_tpl) {?>
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
                <a class="current">Add an Event</a>
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
        <form name="add_scholar_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_scholar/add/" enctype="multipart/form-data">
        <article class="module width_full">
            <header><h3>Add New Scholar</h3></header>
            <div class="module_content">
            <fieldset>
                <label>Name</label>
                <input type="text" id="name" name ="name" value="" />
            </fieldset>
            <fieldset>
                <label>Birth Day</label>
                <input type="text" name ="date" value="" id="datepicker" onclick="javascript:NewCssCal('datepicker','YYYYMMDD')"/>
            </fieldset>
            <fieldset>
                <label>School</label>
                <div style="clear:both; margin-bottom:10px">
				<input type="text" style="width:500px" id="school_name">
                <input type="button" value="Add School" onClick="add_school();">
				</div>
                <div id="school_pane">
				</div>
            </fieldset>  
            <fieldset>
                <label>Link</label>
                <div style="clear:both; margin-bottom:10px">
				<input type="text" style="width:500px" id="link_name">
                <input type="button" value="Add Link" onClick="add_link();">
				</div>
                <div id="link_pane">
				</div>
            </fieldset>  
            <fieldset>
                <label>Life</label>
                <textarea name ="life"  class='textarea'></textarea>
            </fieldset>  
            <fieldset>
                <label>Picture</label>
                <input type="file" name ="image" />
            </fieldset>   
            <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <input type="submit" name="addScholar" value="Add New Scholar"  onClick="return check_data();" class="alt_btn">
                    <input type="reset" value="Reset">
                </div>
            </footer>
			<input type="hidden" id="schools" name="schools" value="">
			<input type="hidden" id="links" name="links" value="">
        </form>
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>
<script language="javascript" type="text/javascript">
var school_count = 0;
var link_count = 0;
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