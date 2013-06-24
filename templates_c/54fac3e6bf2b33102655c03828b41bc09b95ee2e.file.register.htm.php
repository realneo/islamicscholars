<?php /* Smarty version Smarty-3.1.11, created on 2013-06-22 14:58:50
         compiled from "C:\xampp\htdocs\hmvc\templates\register.htm" */ ?>
<?php /*%%SmartyHeaderCode:2147551c56b08ca28a1-39376712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54fac3e6bf2b33102655c03828b41bc09b95ee2e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hmvc\\templates\\register.htm',
      1 => 1371905348,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2147551c56b08ca28a1-39376712',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c56b08cd7441_01928176',
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c56b08cd7441_01928176')) {function content_51c56b08cd7441_01928176($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class='row'>
    <div class='span8 temp_place_holder' style='padding:210px 0px;'><h1 align="center">Advert</h1></div>
    
    <div class='span4'>
        
         <div class='title_bar_brown'>Please fill in the form to Register</div><!-- title_bar_brown -->
        <div class='msg_body'>
            <form name='register_form' action='<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/index.php/index/register' method='post'>
                    <h2>Sign Up</h2>
                    <label>First Name</label>
                    <input type="text" id="firstname" name="firstname" class="span3">
                    <label>Last Name</label>
                    <input type="text" id="lastname" name="lastname" class="span3">
                    <label>Email Address</label>
                    <input type="email" id="email" name="email" class="span3">
                    <label>Re-Enter Email</label>
                    <input type="text" id="re_email" name="re_email" class="span3">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="span3">
                    <label><input type="checkbox" name="terms"> I agree with the <a href="#">Terms and Conditions</a>.</label>
                    <input type="submit" value="Sign up" name="signup"  onClick="return check_register_data();" class="btn btn-success pull-right">
                    <div class="clearfix"></div>
                </form>
        </div><!-- msg_body --> 
    </div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ('footer.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('sponsors.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>