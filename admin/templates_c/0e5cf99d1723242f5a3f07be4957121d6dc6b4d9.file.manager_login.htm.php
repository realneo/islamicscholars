<?php /* Smarty version Smarty-3.1.11, created on 2013-06-12 03:57:18
         compiled from "/Users/Administrator/Sites/islamicscholars/admin/templates/manager_login.htm" */ ?>
<?php /*%%SmartyHeaderCode:136726405751b7d57e46ab28-33265441%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e5cf99d1723242f5a3f07be4957121d6dc6b4d9' => 
    array (
      0 => '/Users/Administrator/Sites/islamicscholars/admin/templates/manager_login.htm',
      1 => 1370965412,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136726405751b7d57e46ab28-33265441',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51b7d57e4929b3_24582514',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51b7d57e4929b3_24582514')) {function content_51b7d57e4929b3_24582514($_smarty_tpl) {?>
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