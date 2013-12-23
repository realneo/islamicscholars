<?php /* Smarty version Smarty-3.1.11, created on 2013-12-23 08:49:02
         compiled from "/Users/Administrator/Sites/islamicscholars/admin/templates/manager_login.htm" */ ?>
<?php /*%%SmartyHeaderCode:5314886825208933e72d9e3-01802526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e5cf99d1723242f5a3f07be4957121d6dc6b4d9' => 
    array (
      0 => '/Users/Administrator/Sites/islamicscholars/admin/templates/manager_login.htm',
      1 => 1387784929,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5314886825208933e72d9e3-01802526',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5208933e81e262_63576577',
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5208933e81e262_63576577')) {function content_5208933e81e262_63576577($_smarty_tpl) {?>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/css/admin/main.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/css/bootstrap.css" />
        <title>Said John | Admin</title>
    </head>
    <body>
        <div id="strip"></div><!-- strip -->
        <div id="container">      
            <div id="login_box">
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/m_login/usercheck" name="loginForm" id="loginForm">
                    <table>
                        <caption>Admin Area</caption>
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
                            <td align="right"><button type="submit">Authorized Login</button></td>
                        </tr>
                    </table>
                </form>
            </div><!-- login_box -->
            <div id="login_footer">Developed by <a href='http://www.yoteyote.com'>Yoteyote</a></div><!-- login_footer -->
        </div><!-- container -->
    </body>
</html><?php }} ?>