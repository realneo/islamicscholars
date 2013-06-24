<?php /* Smarty version Smarty-3.1.11, created on 2013-06-22 10:38:42
         compiled from "C:\xampp\htdocs\hmvc\templates\calendar.htm" */ ?>
<?php /*%%SmartyHeaderCode:2695551c562924dca60-32184412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2233521001945a682e91da7806025dc89a64f8e1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hmvc\\templates\\calendar.htm',
      1 => 1371890022,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2695551c562924dca60-32184412',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'static_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c562924e22c5_22539471',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c562924e22c5_22539471')) {function content_51c562924e22c5_22539471($_smarty_tpl) {?><div id='calendar' class='span3'>
    <span class="blacktext_16" style="margin-left:20px; margin-top:10px;">Hijri Calendar</span>
    <span style="clear:left; float:left; margin-left:20px; margin-top:5px;"><img src="<?php echo $_smarty_tpl->tpl_vars['static_url']->value;?>
/static/images/13_img.gif" /></span>
    <span class="blacktext_16" style="margin-left:10px; margin-top:10px; letter-spacing:-0.03em">Rabiu’Thani 1434</span>
    <div style="clear:both; float:left; margin-left:5px; margin-top:10px">
        <table cellspacing="0">
            <tr height="30" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <th width="40" scope="col">Mn</th>
                <th width="40" scope="col">Tu</th>
                <th width="40" scope="col">We</th>
                <th width="40" scope="col">Th</th>
                <th width="40" scope="col">Fr</th>
                <th width="40" scope="col">Sa</th>
                <th width="40" scope="col">Su</th>                                
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td></td><td></td><td></td><td></td><td></td><td></td><td>1</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td>
            </tr>
            <tr align="center" style="font-family:'Myriad Pro'; font-size:16; color:#333">
                <td>30</td><td>31</td><td></td><td></td><td></td><td></td><td></td>
            </tr>
        </table>
    </div>
</div><!-- calendar --><?php }} ?>