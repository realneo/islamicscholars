<?php /* Smarty version Smarty-3.1.11, created on 2013-06-23 06:06:23
         compiled from "/Users/Administrator/Sites/islamicscholars/templates/header.htm" */ ?>
<?php /*%%SmartyHeaderCode:158472513551c62e6b5f3546-59075120%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93ab71021aac8665e3a877b506d2f283b875438c' => 
    array (
      0 => '/Users/Administrator/Sites/islamicscholars/templates/header.htm',
      1 => 1371947057,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158472513551c62e6b5f3546-59075120',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c62e6b66cc32_73120128',
  'variables' => 
  array (
    'static_url' => 0,
    'islogin' => 0,
    'user_name' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c62e6b66cc32_73120128')) {function content_51c62e6b66cc32_73120128($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header_tag.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <body>
        <div class='container'>
            <div class='row'>
				<?php echo $_smarty_tpl->getSubTemplate ('calendar.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                <div id='header'class='span6'>
                    <div id='row'>
                        <div class='span6 offset3'>
                            <div id='register_now'>Don't have an account? <a href='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/index/register'>Register Now</a></div><!-- register_now -->
                            <div id="login_form">
								<div id="signin" style="display:<?php if ($_smarty_tpl->tpl_vars['islogin']->value=='1'){?>none<?php }else{ ?>block<?php }?>">
                                    <form class="form-inline">
                                        <input type="email" id="log_email" class="input-medium" placeholder="Email">
                                        <input type="password" id="log_pass" class="input-medium" placeholder="Password">
                                        <button type="button" class="btn btn-success" onClick="login('<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
');">Sign in</button>
                                    </form>
                                </div>
                                <div id="signout" style="display:<?php if ($_smarty_tpl->tpl_vars['islogin']->value=='1'){?>block<?php }else{ ?>none<?php }?>">
                                		<span style="color:#999">Hello <span id="span_login_user"><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
</span>!</span>
                                        <button type="button" class="btn btn-success" onClick="logout('<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
');">Sign out</button>
                                </div>
                            </div><!-- login_form --> 
                        </div>
                    </div>
                    <div id='green_strip'></div><!-- green_strip -->
                    <h3 class='span8 offset1'>The Foundation of Sheikhs and Islamic Scholars of Tanzania</h3>
                    <div id='logo'><img src='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/images/logo.png' alt='logo' width='120'/></div><!-- logo -->
                    <button class="btn btn-large btn-warning span2 offset7" type="button">Donate Now</button>
                    <div id='nav' class="nav nav-tabs span7 lead">
                            <li <?php if ($_smarty_tpl->tpl_vars['menu']->value=='1'){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/">Home</a></li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu']->value=='2'){?> class="active" <?php }?>><a href="#">About Us</a></li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu']->value=='3'){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/scholar/index">Imams & Scholars</a></li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu']->value=='4'){?> class="active" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/event/index">Events</a></li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu']->value=='5'){?> class="active" <?php }?>><a href="#">Library</a></li>
                            <li <?php if ($_smarty_tpl->tpl_vars['menu']->value=='6'){?> class="active" <?php }?>><a href="#">Contact Us</a></li>
                    </div><!-- nav -->
                </div><!-- header -->
            </div><!-- row [top_content] --><?php }} ?>