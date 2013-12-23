<?php /* Smarty version Smarty-3.1.11, created on 2013-06-20 12:10:18
         compiled from "C:\xampp\htdocs\hmvc\templates\query_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:1364551c2b9a2afb5a7-73627736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e807d4e49bb710b37d2fd18eca901b7aced18b7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hmvc\\templates\\query_list.htm',
      1 => 1371723014,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1364551c2b9a2afb5a7-73627736',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c2b9a2b941d4_01725676',
  'variables' => 
  array (
    'static_url' => 0,
    'query_lst' => 0,
    'no' => 0,
    'value' => 0,
    'query_page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c2b9a2b941d4_01725676')) {function content_51c2b9a2b941d4_01725676($_smarty_tpl) {?>
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
        <article class="module width_full">
            <header>
                <h3 class="tabs_involved">Manage Queries</h3>
                <ul class="tabs">
                    <li><a href="#tab1">Queries</a></li>
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
                            <th>Query</th> 
                            <th>State</th> 
                            <th>Actions</th> 
                            </tr> 
			</thead> 
			<tbody> 
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['query_lst']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                            
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['no']->value++;?>
 </td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['qu_date'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['qu_user_name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['qu_content'];?>
</td>
                                            <td><?php if ($_smarty_tpl->tpl_vars['value']->value['qu_answer_content']!=''){?>Answered<?php }else{ ?>----------<?php }?></td>
                                             <td>
                                                <a href='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_query/edit/df79as7f798<?php echo $_smarty_tpl->tpl_vars['value']->value['qu_id'];?>
a9sfas80f8awse00835' class='edit'><input type='image'src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/images/admin/icn_edit_article.png' title='Edit'></a>
                                                <a href='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_query/delete/8asd0fas6a87sf68<?php echo $_smarty_tpl->tpl_vars['value']->value['qu_id'];?>
832as98f9fa3008' class='delete'><input type='image'src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
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
    <?php echo $_smarty_tpl->tpl_vars['query_page']->value;?>

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