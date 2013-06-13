<?php /* Smarty version Smarty-3.1.11, created on 2013-06-11 18:45:11
         compiled from "C:\xampp\htdocs\hmvc\templates\news_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:150851b75417e5e674-27243086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d67d1a5e964207e0a8481e95f7f6196bbe71736' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hmvc\\templates\\news_edit.htm',
      1 => 1370967624,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150851b75417e5e674-27243086',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
    'param' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51b75417ec4809_26020554',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b75417ec4809_26020554')) {function content_51b75417ec4809_26020554($_smarty_tpl) {?>
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
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
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
                    <h1 class="site_title"><a href="index.html">Website Admin</a></h1>
                    <h2 class="section_title">Dashboard</h2>
                    <div class="btn_view_site"><a href="../index.php">View Site</a></div>
            </hgroup>
    </header> <!-- end of header bar -->
    <section id="secondary_bar">
        <div class="user">
            <p>admin <!--(<a href="#">3 Messages</a>)--></p>
            <a class="logout_user" href="{$static_url}/index.php/m_login/logout/" title="Logout">Logout</a>
        </div>
        <div class="breadcrumbs_container">
            <article class="breadcrumbs">
                <a href="home.php">Website Admin</a> 
                <div class="breadcrumb_divider"></div> 
                <a class="current">Add News</a>
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
<!--
        <h3>Projects</h3>
        <ul class="toggle">
                <li class="icn_folder"><a href="#">Add Project</a></li>
                <li class="icn_photo"><a href="view_projects.php">View Projects</a></li>
        </ul>
-->
        <h3>News</h3>
        <ul class="toggle">
            <li class="icn_new_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_news/add/" >Add News</a></li>
            <li class="icn_edit_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_news/index/1" >View News</a></li>
        </ul>
<!--
        <h3>Biography</h3>
        <ul class="toggle">
            <li class="icn_new_article"><a href="biography.php">Add Biography</a></li>
            <li class="icn_edit_article"><a href="view_biography.php">View Biography</a></li>
        </ul>
-->
        <h3>Admin</h3>
        <ul class="toggle">
            <li class="icn_jump_back"><a href="{$static_url}/index.php/m_login/logout/">Logout</a></li>
        </ul>

        <footer>
                <hr />
                <p><strong>Copyright &copy; 2013 Said John</strong></p>
                <p>Developed by <a href="http://www.yoteyote.com">Yoteyote</a></p>
        </footer>
</aside><!-- end of sidebar -->    <section id="main" class="column">	
                <div class="clear"></div>
        <form name="add_event_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_news/edit/<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" enctype="multipart/form-data">
        <article class="module width_full">
            <header><h3>Edit News</h3></header>
            <div class="module_content">
            <fieldset>
                <label>Title</label>
                <input type="text" name ="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['news_title'];?>
" />
            </fieldset>
            <fieldset>
                <label>Brief</label>
                <textarea name ="brief"><?php echo $_smarty_tpl->tpl_vars['data']->value['news_brief'];?>
</textarea>
            </fieldset>
            <fieldset>
                <label>Date</label>
                <input type="text" name ="date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['news_date'];?>
" id="datepicker" />
            </fieldset>    
            <fieldset>
                <label>Description</label>
                <textarea name ="description" class='textarea'><?php echo $_smarty_tpl->tpl_vars['data']->value['news_content'];?>
</textarea>
            </fieldset>     
            <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <input type="submit" name="addNews"  value="Update News" class="alt_btn">
                    <input type="submit" value="Reset">
                </div>
            </footer>
        </article><!-- end of post new article -->
        </form>
		<div class="spacer"></div>
	</section>
    </body>
</html>
<?php }} ?>