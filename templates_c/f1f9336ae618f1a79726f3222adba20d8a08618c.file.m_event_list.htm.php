<<<<<<< HEAD:admin/templates_c/114f7e41df81caab6afe33180d2418b731912d48.file.event_list.htm.php
<?php /* Smarty version Smarty-3.1.11, created on 2013-12-22 13:39:30
         compiled from "/Users/Administrator/Sites/islamicscholars/admin/templates/event_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:189416820452089342640cc8-82308303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.11, created on 2013-06-23 06:06:12
         compiled from "/Users/Administrator/Sites/islamicscholars/templates/m_event_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:147709831951c67434835212-73398661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/f1f9336ae618f1a79726f3222adba20d8a08618c.file.m_event_list.htm.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1f9336ae618f1a79726f3222adba20d8a08618c' => 
    array (
<<<<<<< HEAD:admin/templates_c/114f7e41df81caab6afe33180d2418b731912d48.file.event_list.htm.php
      0 => '/Users/Administrator/Sites/islamicscholars/admin/templates/event_list.htm',
      1 => 1387715782,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189416820452089342640cc8-82308303',
=======
      0 => '/Users/Administrator/Sites/islamicscholars/templates/m_event_list.htm',
      1 => 1371732709,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147709831951c67434835212-73398661',
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/f1f9336ae618f1a79726f3222adba20d8a08618c.file.m_event_list.htm.php
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52089342760d92_09271615',
  'variables' => 
  array (
    'static_url' => 0,
    'event_lst' => 0,
    'no' => 0,
    'value' => 0,
    'event_page' => 0,
  ),
  'has_nocache_code' => false,
<<<<<<< HEAD:admin/templates_c/114f7e41df81caab6afe33180d2418b731912d48.file.event_list.htm.php
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52089342760d92_09271615')) {function content_52089342760d92_09271615($_smarty_tpl) {?>
=======
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c674348e7762_34845203',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c674348e7762_34845203')) {function content_51c674348e7762_34845203($_smarty_tpl) {?>
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/f1f9336ae618f1a79726f3222adba20d8a08618c.file.m_event_list.htm.php
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

<body>
    <header id="header">
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
                <a class="current">View Events</a>
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
<<<<<<< HEAD:admin/templates_c/114f7e41df81caab6afe33180d2418b731912d48.file.event_list.htm.php
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
=======
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
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/f1f9336ae618f1a79726f3222adba20d8a08618c.file.m_event_list.htm.php
		<h3>News</h3>
        <ul class="toggle">
            <li class="icn_new_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_news/add/" >Add News</a></li>
            <li class="icn_edit_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_news/index/1" >View News</a></li>
        </ul>
		<h3>Calendar</h3>
<<<<<<< HEAD:admin/templates_c/114f7e41df81caab6afe33180d2418b731912d48.file.event_list.htm.php
        <ul class="toggle">
            <li class="icn_new_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_calendar/index/" >Set Calendar</a></li>
=======
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
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/f1f9336ae618f1a79726f3222adba20d8a08618c.file.m_event_list.htm.php
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
        <article class="module width_full">
            <header>
                <h3 class="tabs_involved">Manage Events</h3>
                <ul class="tabs">
                    <li><a href="#tab1">Events</a></li>
		</ul>
            </header>
            <div class="tab_container">
                <div id="tab1" class="tab_content">
                    <table class="tablesorter" cellspacing="0"> 
			<thead> 
                            <tr> 
                            <th>No.</th> 
                            <th>Date</th> 
                            <th>Name</th> 
                            <th>Actions</th> 
                            </tr> 
			</thead> 
			<tbody> 
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['event_lst']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                            
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['no']->value++;?>
 </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['evt_date'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['evt_title'];?>
</td>
                                             <td>
                                                <a href='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_event/edit/ahsdfasfs8d7fas88<?php echo $_smarty_tpl->tpl_vars['value']->value['evt_id'];?>
72asdyhf897a' class='edit'><input type='image'src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/images/admin/icn_edit_article.png' title='Edit'></a>
                                                <a href='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_event/delete/asdf87asdf7868<?php echo $_smarty_tpl->tpl_vars['value']->value['evt_id'];?>
7868sad6f8' class='delete'><input type='image'src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/images/admin/icn_trash.png' title='Trash'></a>
                                            </td>
                                        </tr>
                                       
                  <?php } ?>

                                        			</tbody> 
                    </table>
                </div><!-- end of #tab2 -->	
            </div><!-- end of .tab_container -->		
        </article><!-- end of content manager article -->
    <div class="spacer" align="right" style="margin-right:30px; margin-top:10px">
    <?php echo $_smarty_tpl->tpl_vars['event_page']->value;?>

    </div>
    </section>
    <script type="text/javascript">
        $('.delete').click(function(){
            if(confirm('Are you sure you want to delete?') == true)
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    </script>
</body>
</html>
<?php }} ?>