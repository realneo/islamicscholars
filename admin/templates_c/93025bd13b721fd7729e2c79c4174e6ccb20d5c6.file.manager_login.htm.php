<?php /* Smarty version Smarty-3.1.11, created on 2013-12-26 14:36:21
         compiled from "C:\wamp\www\islamicscholars\admin\templates\manager_login.htm" */ ?>
<?php /*%%SmartyHeaderCode:2807352b860f1030d53-87651756%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93025bd13b721fd7729e2c79c4174e6ccb20d5c6' => 
    array (
      0 => 'C:\\wamp\\www\\islamicscholars\\admin\\templates\\manager_login.htm',
      1 => 1388068328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2807352b860f1030d53-87651756',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_52b860f133e212_07821608',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52b860f133e212_07821608')) {function content_52b860f133e212_07821608($_smarty_tpl) {?><html><head>
    <link type="text/css" rel="stylesheet" href="http://localhost/islamicscholars/admin/static/css/admin/main.css">
    <link type="text/css" rel="stylesheet" href="http://localhost/islamicscholars/admin/static/css/bootstrap.css">

    <link rel="icon" type="image/png" href="http://yoteyote.com/demo/scholars/assets/img/favicon.png">
    <title>IslamicScholars | Admin </title>
</head>
<body>
<div id="strip"></div><!-- strip -->
<div id="container">
    <div id="logo-centre">
        <img src="http://yoteyote.com/demo/scholars/assets/img/logo.png">
    </div>
    <div id="login_box">
        <form method="post" action="http://localhost/islamicscholars/admin/index.php/m_login/usercheck" name="loginForm" id="loginForm">
            <table>
                <caption>Admin Area</caption>
                <tbody><tr>
                    <th>Username:</th>
                    <td><input type="text" name="username" value=""></td>
                </tr>
                <tr>
                    <th>Password:</th>
                    <td><input type="password" name="password" value=""></td>
                </tr>
                <tr>
                    <th></th>
                    <td align="right"><button type="submit">Authorized Login</button></td>
                </tr>
                </tbody></table>
        </form>
    </div><!-- login_box -->
    <div id="login_footer">All rights reserved 2014 Developed by <a href="http://www.yoteyote.com">Yoteyote</a></div><!-- login_footer -->
</div><!-- container -->

</body></html><?php }} ?>