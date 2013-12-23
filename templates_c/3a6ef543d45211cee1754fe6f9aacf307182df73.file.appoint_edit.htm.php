<?php /* Smarty version Smarty-3.1.11, created on 2013-06-20 12:21:13
         compiled from "C:\xampp\htdocs\hmvc\templates\appoint_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:959551c2d720929ef7-59206929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a6ef543d45211cee1754fe6f9aacf307182df73' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hmvc\\templates\\appoint_edit.htm',
      1 => 1371723671,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '959551c2d720929ef7-59206929',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c2d7209c8fe0_56484983',
  'variables' => 
  array (
    'static_url' => 0,
    'param' => 0,
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c2d7209c8fe0_56484983')) {function content_51c2d7209c8fe0_56484983($_smarty_tpl) {?>
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
                <a class="current">Add News</a>
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
/index.php/m_appoint/edit/<?php echo $_smarty_tpl->tpl_vars['param']->value;?>
" enctype="multipart/form-data">
        <article class="module width_full">
            <header><h3>Edit Appointment</h3></header>
            <div class="module_content">
            <fieldset>
                <label>User</label>
                <?php echo $_smarty_tpl->tpl_vars['data']->value['apt_user_name'];?>

                <input type="hidden" id="username" name="username" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apt_user_name'];?>
">
            </fieldset>
            <fieldset>
                <label>Appointment</label>
                <?php echo $_smarty_tpl->tpl_vars['data']->value['apt_content'];?>

                <input type="hidden" id="appoint" name="appoint" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apt_content'];?>
">
            </fieldset>
            <fieldset>
                <label>Email</label>
                <?php echo $_smarty_tpl->tpl_vars['data']->value['apt_email'];?>

                <input type="hidden" id="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apt_email'];?>
">
            </fieldset>    
            <fieldset>
                <label>Date</label>
                <?php echo $_smarty_tpl->tpl_vars['data']->value['apt_date'];?>

                <input type="hidden" id="date" name="date" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['apt_date'];?>
">
            </fieldset>    
            <fieldset>
                <label>Answer</label>
				<select id="state" name="state">
					<option  <?php if ($_smarty_tpl->tpl_vars['data']->value['apt_state']=='0'){?> selected <?php }?> value="0">None</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['data']->value['apt_state']=='1'){?> selected <?php }?> value="1">Accept</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['data']->value['apt_state']=='2'){?> selected <?php }?> value="2">Decline</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['data']->value['apt_state']=='3'){?> selected <?php }?> value="3">Postpone</option>
                </select>
            </fieldset>     
            <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <input type="submit" name="addAppoint" onClick="return check_data();"  value="Update Appointment" class="alt_btn">
                    <input type="submit" value="Reset">
                </div>
            </footer>
        </article><!-- end of post new article -->
        </form>
		<div class="spacer"></div>
	</section>
<script language="javascript" type="text/javascript">
function check_data(){
	return true;
}
</script>
    </body>
</html>
<?php }} ?>