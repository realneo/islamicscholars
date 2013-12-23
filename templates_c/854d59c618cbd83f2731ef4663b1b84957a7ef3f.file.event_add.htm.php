<<<<<<< HEAD:admin/templates_c/854d59c618cbd83f2731ef4663b1b84957a7ef3f.file.event_add.htm.php
<?php /* Smarty version Smarty-3.1.11, created on 2013-06-14 11:17:00
=======
<?php /* Smarty version Smarty-3.1.11, created on 2013-06-20 10:43:10
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/854d59c618cbd83f2731ef4663b1b84957a7ef3f.file.event_add.htm.php
         compiled from "C:\xampp\htdocs\hmvc\templates\event_add.htm" */ ?>
<?php /*%%SmartyHeaderCode:3223251b732c1376ae7-60276317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '854d59c618cbd83f2731ef4663b1b84957a7ef3f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hmvc\\templates\\event_add.htm',
<<<<<<< HEAD:admin/templates_c/854d59c618cbd83f2731ef4663b1b84957a7ef3f.file.event_add.htm.php
      1 => 1371201417,
=======
      1 => 1371714919,
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/854d59c618cbd83f2731ef4663b1b84957a7ef3f.file.event_add.htm.php
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3223251b732c1376ae7-60276317',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51b732c13baac0_02278724',
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b732c13baac0_02278724')) {function content_51b732c13baac0_02278724($_smarty_tpl) {?>
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
<<<<<<< HEAD:admin/templates_c/854d59c618cbd83f2731ef4663b1b84957a7ef3f.file.event_add.htm.php
        <ul class="toggle">
            <li class="icn_new_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_scholar/add/" >Add Scholar</a></li>
            <li class="icn_edit_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_scholar/index/1" >View Scholars</a></li>
        </ul>
        <h3>Libraries</h3>
        <ul class="toggle">
=======
        <ul class="toggle">
            <li class="icn_new_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_scholar/add/" >Add Scholar</a></li>
            <li class="icn_edit_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_scholar/index/1" >View Scholars</a></li>
        </ul>
        <h3>Libraries</h3>
        <ul class="toggle">
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/854d59c618cbd83f2731ef4663b1b84957a7ef3f.file.event_add.htm.php
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
<<<<<<< HEAD:admin/templates_c/854d59c618cbd83f2731ef4663b1b84957a7ef3f.file.event_add.htm.php
        <h3>Admin</h3>
=======
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
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/854d59c618cbd83f2731ef4663b1b84957a7ef3f.file.event_add.htm.php
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
/index.php/m_event/add/" enctype="multipart/form-data">
        <article class="module width_full">
            <header><h3>Add New Event</h3></header>
            <div class="module_content">
            <fieldset>
                <label>Title</label>
                <input type="text" name ="name" id="name" value="" />
            </fieldset>
            <fieldset>
                <label>Venue</label>
                <input type="text" name ="venue" value="" />
            </fieldset>
            <fieldset>
                <label>Date</label>
                <input type="text" name ="date" value="" id="datepicker" onclick="javascript:NewCssCal('datepicker','YYYYMMDD')"/>
            </fieldset>    
            <fieldset>
                <label>Description</label>
                <textarea name ="description"></textarea>
            </fieldset>  
            <fieldset>
                <label>Image</label>
                <input type="file" name ="image" />
            </fieldset>   
            <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <input type="submit" name="addEvent" value="Add New Event" onClick="return check_data();" class="alt_btn">
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