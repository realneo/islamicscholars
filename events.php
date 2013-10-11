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