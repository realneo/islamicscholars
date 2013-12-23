<?php /* Smarty version Smarty-3.1.11, created on 2013-06-23 06:06:32
         compiled from "/Users/Administrator/Sites/islamicscholars/templates/events.htm" */ ?>
<?php /*%%SmartyHeaderCode:131869164351c67448329556-29663232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ae5bb7b028bc7ad8f5999f4913b87db1e3e9654' => 
    array (
      0 => '/Users/Administrator/Sites/islamicscholars/templates/events.htm',
      1 => 1371937539,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131869164351c67448329556-29663232',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pastEvents' => 0,
    'value' => 0,
    'currentmonthEvents' => 0,
    'nextmonthEvents' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c67448380ab4_51625768',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c67448380ab4_51625768')) {function content_51c67448380ab4_51625768($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class='row'>
    <div class='span4'>
        <div class='title_bar_brown'>Past Events</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pastEvents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['evt_title'];?>
</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
					<?php } ?>
            </table>
        </div><!-- msg_body -->
    </div>
    
    <div class='span4'>
        <div class='title_bar_brown'>Current Month Events</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currentmonthEvents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['evt_title'];?>
</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
					<?php } ?>
            </table>
        </div><!-- msg_body -->
    </div>
    
    <div class='span4'>
        <div class='title_bar_brown'>Next Month Events</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
 					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nextmonthEvents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
               <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['value']->value['evt_title'];?>
</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
					<?php } ?>
            </table>
        </div><!-- msg_body -->
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('sponsors.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>