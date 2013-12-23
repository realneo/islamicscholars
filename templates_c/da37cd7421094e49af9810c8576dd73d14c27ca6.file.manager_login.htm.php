<<<<<<< HEAD:admin/templates_c/0e5cf99d1723242f5a3f07be4957121d6dc6b4d9.file.manager_login.htm.php
<?php /* Smarty version Smarty-3.1.11, created on 2013-08-12 09:48:14
         compiled from "/Users/Administrator/Sites/islamicscholars/admin/templates/manager_login.htm" */ ?>
<?php /*%%SmartyHeaderCode:5314886825208933e72d9e3-01802526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.1.11, created on 2013-06-23 02:16:20
         compiled from "/Users/Administrator/Sites/islamicscholars/templates/manager_login.htm" */ ?>
<?php /*%%SmartyHeaderCode:48312071551c63e542e9e96-94517945%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/da37cd7421094e49af9810c8576dd73d14c27ca6.file.manager_login.htm.php
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da37cd7421094e49af9810c8576dd73d14c27ca6' => 
    array (
      0 => '/Users/Administrator/Sites/islamicscholars/templates/manager_login.htm',
      1 => 1370965412,
      2 => 'file',
    ),
  ),
<<<<<<< HEAD:admin/templates_c/0e5cf99d1723242f5a3f07be4957121d6dc6b4d9.file.manager_login.htm.php
  'nocache_hash' => '5314886825208933e72d9e3-01802526',
=======
  'nocache_hash' => '48312071551c63e542e9e96-94517945',
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/da37cd7421094e49af9810c8576dd73d14c27ca6.file.manager_login.htm.php
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
<<<<<<< HEAD:admin/templates_c/0e5cf99d1723242f5a3f07be4957121d6dc6b4d9.file.manager_login.htm.php
  'unifunc' => 'content_5208933e81e262_63576577',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5208933e81e262_63576577')) {function content_5208933e81e262_63576577($_smarty_tpl) {?>
=======
  'unifunc' => 'content_51c63e5430e0e3_05043010',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c63e5430e0e3_05043010')) {function content_51c63e5430e0e3_05043010($_smarty_tpl) {?>
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/da37cd7421094e49af9810c8576dd73d14c27ca6.file.manager_login.htm.php
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/css/admin/main.css" />
        <title>Said John | Admin</title>
    </head>
    <body>
        <div id="strip"></div><!-- strip -->
        <div id="container">      
            <div id="login_box">
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_login/usercheck" name="loginForm" id="loginForm">
                    <table>
                        <caption>SAID JOHN ADMIN</caption>
                        <tr>
                            <th>Username:</th>
                            <td><input type="text" name="username" value="" /></td>
                        </tr>
                        <tr>
                            <th>Password:</th>
                            <td><input type="password" name="password" value="" /></td>
                        </tr>
                        <tr>
                            <th></th>   
                            <td align="right"><button type="submit">Authorised Login</button></td>
                        </tr>
                    </table>
</form>
            </div><!-- login_box -->
            <div id="login_footer">Developed by Yoteyote</div><!-- login_footer -->
        </div><!-- container -->
    </body>
</html><?php }} ?>