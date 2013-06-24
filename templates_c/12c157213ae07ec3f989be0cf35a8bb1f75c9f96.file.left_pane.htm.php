<?php /* Smarty version Smarty-3.1.11, created on 2013-06-22 17:02:27
         compiled from "C:\xampp\htdocs\hmvc\templates\left_pane.htm" */ ?>
<?php /*%%SmartyHeaderCode:2436051c562924f0cc7-21512100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12c157213ae07ec3f989be0cf35a8bb1f75c9f96' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hmvc\\templates\\left_pane.htm',
      1 => 1371913342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2436051c562924f0cc7-21512100',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c562924f32f8_25780999',
  'variables' => 
  array (
    'news_list' => 0,
    'value' => 0,
    'event_list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c562924f32f8_25780999')) {function content_51c562924f32f8_25780999($_smarty_tpl) {?><div class="row">
                <div class='span3' id='left_pane'>
                    <h5>Latest News</h5>
                    <ul class='unstyled'>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                        <li><a href="#"><i class="icon-play"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value['news_title'];?>
</a></li>
					<?php } ?>
                    </ul>
                    <h5>Upcoming Events</h5>
                    <ul class='unstyled'>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['event_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                        <li><a href="#"><i class="icon-play"></i> <?php echo $_smarty_tpl->tpl_vars['value']->value['evt_title'];?>
 </a></li>
					<?php } ?>
                    </ul>
                    
                    <h5>New Articles</h5>
                    <ul class='unstyled'>
                        <li><a href="#"><i class="icon-play"></i>Marriage and Divorces</a></li>
                        <li><a href="#"><i class="icon-play"></i> Two</a></li>
                        <li><a href="#"><i class="icon-play"></i> Three</a></li>
                        <li><a href="#"><i class="icon-play"></i> Four</a></li>
                        <li><a href="#"><i class="icon-play"></i> Five</a></li>
                    </ul>
                    
                    <h5>Quick Contacts</h5>
                        <address>
                            Lumumba bla bla bal<br>
                            Pale pale<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>
     
                        <address>
                            Sheikh Khamis Mataka<br>
                            <a href="mailto:#">info@islamicscholars.com</a>
                        </address>
                    
                    <h5>Join Our Newsletter</h5>
                        <div class="input-append">
                            <input class="span2" id="appendedInputButton" type="text">
                            <button class="btn btn-success" type="button">Join</button>
                        </div>
                </div><!-- left_pane --><?php }} ?>