<?php /* Smarty version Smarty-3.1.11, created on 2013-06-23 01:08:27
         compiled from "/Users/Administrator/Sites/islamicscholars/templates/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:189144255651c62e6b4ed758-30121061%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3051e34ad82bc5fd89e65e51af443770361be1e7' => 
    array (
      0 => '/Users/Administrator/Sites/islamicscholars/templates/index.htm',
      1 => 1371934749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189144255651c62e6b4ed758-30121061',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'scholar_list' => 0,
    'value' => 0,
    'query_list' => 0,
    'no' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c62e6b5e7948_01316815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c62e6b5e7948_01316815')) {function content_51c62e6b5e7948_01316815($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('left_pane.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class='span6' id='content'>

		<?php echo $_smarty_tpl->getSubTemplate ('image_slider.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div id="welcome_msg" class="span9">
            <div class="title_bar">Welcome to The Foundation of Sheikhs and Islamic Scholars of Tanzania</div><!-- title_bar -->
            <div class="msg_body">
                Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec ullamcorper nulla non metus auctor fringilla. Maecenas faucibus mollis interdum. Donec ullamcorper nulla non metus auctor fringilla.
                <button type="submit" class="btn  btn-mini btn-inverse">Read More</button>
            </div><!-- msg_body-->
        </div><!-- welcome_msg -->

    </div><!-- content -->

    <div class='row'>
        <div class='span4'>
            <div id="new_scholar_form" class="span4">
                <div class="title_bar_brown">Add an Islamic Scholar / Sheikh</div><!-- title_bar -->
                <div class="msg_body">
                    <form name="new_scholar_form" action="" method='post'>
                        <input class="input-xlarge" type="text" placeholder="Sheikh Ibn Kathir" />
                        <button type="submit" class="btn btn-success offset2">Add</button>
                    </form>
                </div>
            </div><!-- new_scholar_form -->

            <div id="recent_scholars" class="span4">
                <div class="title_bar_brown">Recently Added Scholars / Sheikhs</div><!-- title_bar -->
                <div class="msg_body">
                    <table class='table table-condensed table-hover'>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['scholar_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['sclar_reg_date'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['sclar_name'];?>
</td>
                            <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                        </tr>
					<?php } ?>
                    </table>
                </div><!-- msg_body -->
            </div><!-- recent_scholars --> 

            <div class="span9">
                <br />
                <div class="msg_body">
                    <div class="input-append">
                        <input class="input-xxlarge" id="appendedInputButton" type="text" placeholder='Type your Question Here'>
                        <button class="btn btn-success" type="button" onclick="addQuestion();">Ask a Question</button>
                    </div>
                </div>
            </div><!-- questions -->

            <div class='span9'>
                <div class='msg_body'>
                    <table class='table table-condensed table-hover'>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['query_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
?> 
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['no']->value++;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['qu_content'];?>
</td>
                            <td><?php if ($_smarty_tpl->tpl_vars['value']->value['qu_answer_content']!=''){?><button type="submit" class="btn btn-small btn-inverse">View Answer</button><?php }?></td>
                        </tr>
					<?php } ?>
                    </table>
                </div>
            </div>

        </div>

        <div class='span5'>
            <div id="join_forum" class="span5">
                <div class="title_bar_brown">Join our Discussion Area Today</div><!-- title_bar -->
                <div class="msg_body">
                    This is our discussion area
                </div>
            </div><!-- join_forum -->     
        </div>
    </div>
</div><!-- row [main_content] -->
<br />
<?php echo $_smarty_tpl->getSubTemplate ('footer.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('sponsors.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>