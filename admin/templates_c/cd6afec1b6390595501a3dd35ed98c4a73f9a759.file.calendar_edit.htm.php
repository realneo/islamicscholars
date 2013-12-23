<?php /* Smarty version Smarty-3.1.11, created on 2013-12-23 08:37:05
         compiled from "/Users/Administrator/Sites/islamicscholars/admin/templates/calendar_edit.htm" */ ?>
<?php /*%%SmartyHeaderCode:1050404789520899a1d7f6e8-18009740%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd6afec1b6390595501a3dd35ed98c4a73f9a759' => 
    array (
      0 => '/Users/Administrator/Sites/islamicscholars/admin/templates/calendar_edit.htm',
      1 => 1387783836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1050404789520899a1d7f6e8-18009740',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_520899a201ca66_72587193',
  'variables' => 
  array (
    'static_url' => 0,
    'day' => 0,
    'month_string' => 0,
    'year' => 0,
    'month' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_520899a201ca66_72587193')) {function content_520899a201ca66_72587193($_smarty_tpl) {?>
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
		<h3>Calendar</h3>
        <ul class="toggle">
            <li class="icn_new_article"><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_calendar/index/" >Set Calendar</a></li>
        </ul>

        <footer>
                <hr />
                <p><strong>Copyright &copy; 2013 Said John</strong></p>
                <p>Developed by <a href="http://www.yoteyote.com">Yoteyote</a></p>
        </footer>
</aside><!-- end of sidebar -->    <section id="main" class="column">		
                <div class="clear"></div>
        <form name="add_event_form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_calendar/index">
        <article class="module width_full">
            <header><h3>Set Calendar</h3></header>
            <div class="module_content">
            <fieldset>
                <label>Current Date</label>
				<span style="font-size:14px; font-weight:bold;" id="dateString"><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
th <?php echo $_smarty_tpl->tpl_vars['month_string']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</span>
            </fieldset>
            <fieldset>
                <label>Year</label>
                <input type="text" onkeyup="if(isNaN(value))execCommand('undo');" id="year" name ="year" value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" maxlength="4" />
            </fieldset>
            <fieldset>
                <label>Month</label>
				<select id="month" name="month">
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='1'){?> selected <?php }?> value="1">Muharram</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='2'){?> selected <?php }?> value="2">Safar</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='3'){?> selected <?php }?> value="3">Rabiul Awal</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='4'){?> selected <?php }?> value="4">Rabiul Akhir</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='5'){?> selected <?php }?> value="5">Jamadil Awal</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='6'){?> selected <?php }?> value="6">Jamadil Akhir</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='7'){?> selected <?php }?> value="7">Rejab</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='8'){?> selected <?php }?> value="8">Syaaban</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='9'){?> selected <?php }?> value="9">Ramadhan</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='10'){?> selected <?php }?> value="10">Syawal</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='11'){?> selected <?php }?> value="11">Zulkaedah</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['month']->value=='12'){?> selected <?php }?> value="12">Zulhijjah</option>
                </select>
            </fieldset>    
            <fieldset>
                <label>Day</label>
				<select id="day" name="day">
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='1'){?> selected <?php }?> value="1">1</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='2'){?> selected <?php }?> value="2">2</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='3'){?> selected <?php }?> value="3">3</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='4'){?> selected <?php }?> value="4">4</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='5'){?> selected <?php }?> value="5">5</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='6'){?> selected <?php }?> value="6">6</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='7'){?> selected <?php }?> value="7">7</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='8'){?> selected <?php }?> value="8">8</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='9'){?> selected <?php }?> value="9">9</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='10'){?> selected <?php }?> value="10">10</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='11'){?> selected <?php }?> value="11">11</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='12'){?> selected <?php }?> value="12">12</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='13'){?> selected <?php }?> value="13">13</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='14'){?> selected <?php }?> value="14">14</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='15'){?> selected <?php }?> value="15">15</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='16'){?> selected <?php }?> value="16">16</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='17'){?> selected <?php }?> value="17">17</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='18'){?> selected <?php }?> value="18">18</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='19'){?> selected <?php }?> value="19">19</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='20'){?> selected <?php }?> value="20">20</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='21'){?> selected <?php }?> value="21">21</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='22'){?> selected <?php }?> value="22">22</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='23'){?> selected <?php }?> value="23">23</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='24'){?> selected <?php }?> value="24">24</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='25'){?> selected <?php }?> value="25">25</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='26'){?> selected <?php }?> value="26">26</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='27'){?> selected <?php }?> value="27">27</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='28'){?> selected <?php }?> value="28">28</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='29'){?> selected <?php }?> value="29">29</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='30'){?> selected <?php }?> value="30">30</option>
					<option  <?php if ($_smarty_tpl->tpl_vars['day']->value=='31'){?> selected <?php }?> value="31">31</option>
                </select>
            </fieldset>  
            <div class="clear"></div>
            </div>
            <footer>
                <div class="submit_link">
                    <input type="submit" name="addData" value="Update Calendar" onClick="return check_data();" class="alt_btn">
                    <input type="reset" value="Reset">
                </div>
            </footer>
        </form>
		</article><!-- end of post new article -->
		<div class="spacer"></div>
	</section>
<script language="javascript" type="text/javascript">
function check_data(){
	var name_obj = document.getElementById("year");
	if(name_obj.value == ""){
		alert("Input Year");
		name_obj.focus();
		return false;
	}
	if(parseInt(name_obj.value) < 100 || parseInt(name_obj.value) > 3000){
		alert("Input Year correctly");
		name_obj.focus();
		return false;
	}
}
setInterval("updateDate()", 1000);

function updateDate(){
	$.ajax({
	  url : '<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_calendar/getDate',
		type: "POST",
		processData: false,
		contentType: false,
		complete:function(){
		},
		success:function(msg){
			var obj = document.getElementById("dateString");
			obj.innerHTML = msg;
		}
	});
}
</script>
</body>

</html>
<?php }} ?>