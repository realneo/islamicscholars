<<<<<<< HEAD:events.php
<?php include('template/header.php'); ?>
<title>Events</title>
<div class="title_bar">UPCOMING EVENTS</div>
<ul class="thumbnails" style="margin-top:10px;">
    <?php
        $q = mysql_query("SELECT * FROM `h_eventtb` WHERE evt_date >= CURDATE( ) ORDER BY `evt_date` ASC");
		while($row = mysql_fetch_array($q)){
			$row['evt_date'] = date('jS M, Y', strtotime($row['evt_date']));
			if( $row['evt_img1'] )
			{
				$image = 'images/events/'.$row['evt_img1'];
			}
			else
			{
				$image = 'images/noevent.png';
			}
			echo "
				<li class='span4'>
					<div class='thumbnail'><img src='$image' alt='{$row['evt_name']}' width='290px' height='181px'>
						<div class='caption'>
							<h3>{$row['evt_name']}</h3>
							<p>{$row['evt_venue']}</p>
							<p>{$row['evt_date']}<span class='label label-success pull-right'>Next</span></p>
						</div>
					</div>
				</li>
				";
		}
	?>
</ul>
<div class="title_bar ">ALL PREVIOUS EVENTS</div>
<ul class="thumbnails" style="margin-top:10px;">
    <?php
        $q = mysql_query("SELECT * FROM `h_eventtb` WHERE evt_date <= CURDATE( ) ORDER BY `evt_date` DESC");
		while($row = mysql_fetch_array($q)){
			$row['evt_date'] = date('jS M, Y', strtotime($row['evt_date']));
			if( $row['evt_img1'] )
			{
				$image = 'images/events/'.$row['evt_img1'];
			}
			else
			{
				$image = 'images/noevent.png';
			}
			echo "
				<li class='span4'>
					<div class='thumbnail'><img src='$image' alt='{$row['evt_name']}' width='290px' height='181px'>
						<div class='caption'>
							<h3>{$row['evt_name']}</h3>
							<p>{$row['evt_venue']}</p>
							<p>{$row['evt_date']}</p>
							<p align='center'><a href='event.php?id={$row['evt_id']}' class='btn btn-inverse btn-block'>View Event</a></p>
						</div>
					</div>
				</li>
				";
		}
	?>
</ul>

<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>ld.it/320x200" alt="ALT NAME">
            <div class="caption">
                <h3>Event Name</h3>
                <p>Description</p>  
                <p align="center"><a href="#" class="btn btn-inverse btn-block">Open</a></p>
            </div>
        </div>
    </li>
    
    <li class="span4">
        <div class="thumbnail"><img src="http://placehold.it/320x200" alt="ALT NAME">
            <div class="caption">
                <h3>Event Name</h3>
                <p>Description</p>  
                <p align="center"><a href="#" class="btn btn-inverse btn-block">Open</a></p>
            </div>
        </div>
    </li>
    
    <li class="span4">
        <div class="thumbnail"><img src="http://placehold.it/320x200" alt="ALT NAME">
            <div class="caption">
                <h3>Event Name</h3>
                <p>Description</p>  
                <p align="center"><a href="#" class="btn btn-inverse btn-block">Open</a></p>
            </div>
        </div>
    </li>
    
    
</ul>

<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>
=======
<?php /* Smarty version Smarty-3.1.11, created on 2013-06-22 11:16:53
         compiled from "C:\xampp\htdocs\hmvc\templates\scholars.htm" */ ?>
<?php /*%%SmartyHeaderCode:1934751c56b859b7f83-60939352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '972b60e02365e415f49b884c0eda4c14c4a4db61' => 
    array (
      0 => 'C:\\xampp\\htdocs\\hmvc\\templates\\scholars.htm',
      1 => 1371892584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1934751c56b859b7f83-60939352',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51c56b859ec7a6_74859766',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51c56b859ec7a6_74859766')) {function content_51c56b859ec7a6_74859766($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="row">
    <div class="span12">
        <div class='msg_body'>
           <h2>Imam & Scholars</h2> 
           <div class="input-append">
                <input class="input-xxlarge" id="appendedInputButton" type="text" placeholder='Imam Taymiyyah'>
                <button class="btn btn-success" type="button">Search</button>
            </div>
        </div><!-- msg_body -->
    </div>
</div>

<div class='row'>
    <div class='span4'>
        <div class='title_bar_brown'>Recently Added Imams & Scholars</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
                <tr>
                    <td>Sheikh Anwar Al Awlaki</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Sheikh Anwar Al Awlaki</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Imam Ahmad</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Sheikh Anwar Al Awlaki</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Imam Ahmad</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
            </table>
        </div><!-- msg_body -->
    </div>
    
    <div class='span4'>
        <div class='title_bar_brown'>Recently Added Imams & Scholars</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
                <tr>
                    <td>Sheikh Anwar Al Awlaki</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Sheikh Anwar Al Awlaki</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Imam Ahmad</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Sheikh Anwar Al Awlaki</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Imam Ahmad</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
            </table>
        </div><!-- msg_body -->
    </div>
    
    <div class='span4'>
        <div class='title_bar_brown'>Recently Added Imams & Scholars</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
                <tr>
                    <td>Sheikh Anwar Al Awlaki</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Sheikh Anwar Al Awlaki</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Imam Ahmad</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Sheikh Anwar Al Awlaki</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
                <tr>
                    <td>Imam Ahmad</td>
                    <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                </tr>
            </table>
        </div><!-- msg_body -->
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ('sponsors.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>
>>>>>>> 52c70a0be4f8225b22b7d3ef71d074a8bee5574b:templates_c/972b60e02365e415f49b884c0eda4c14c4a4db61.file.scholars.htm.php
