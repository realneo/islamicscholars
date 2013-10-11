<?php include('template/header.php'); ?>
<title>Event</title>
 <?php
                       $evt_id = $_GET['id'];
                       $q = mysql_query("SELECT * FROM `h_eventtb` WHERE `evt_id` = '$evt_id'");
                       while($row = mysql_fetch_array($q)){
                           $name = $row['evt_name'];
                           $venue = $row['evt_venue'];
                           $date = $row['evt_date'];
                           $desc = $row['evt_desc'];
                           $image = $row['evt_img1'];
						   $image2 = $row['evt_img2'];
						   $image3 = $row['evt_img3'];
						   $image4 = $row['evt_img4'];
						   $image5 = $row['evt_img5'];
						   $image6 = $row['evt_img6'];
						   $image7 = $row['evt_img7'];
						   $image8 = $row['evt_img8'];
						   $image9 = $row['evt_img9'];
						   $image10 = $row['evt_img10'];
						   if($image == ""){
							$img = "";
						   }
						   else{
							$img = "<li><img src='images/events/$image' alt='$name' width='710px' height='350px'/></li>";
						   }
						   if($image2 == ""){
						   $img2 = "";
						   }
						   else{
						   $img2 = "<li><img src='images/events/$image2' alt='$name' width='710px' height='350px'/></li>";
						   }
						   if($image3 == ""){
						   $img3 = "";
						   }
						   else{
						   $img3 = "<li><img src='images/events/$image3' alt='$name' width='710px' height='350px'/></li>";
						   }
						   if($image4 == ""){
						   $img4 = "";
						   }
						   else{
						   $img4 = "<li><img src='images/events/$image4' alt='$name' width='710px' height='350px'/></li>";
						   }
						   if($image5 == ""){
						   $img5 = "";
						   }
						   else{
						   $img5 = "<li><img src='images/events/$image5' alt='$name' width='710px' height='350px'/></li>";
						   }
						   if($image6 == ""){
						   $img6 = "";
						   }
						   else{
						   $img6 = "<li><img src='images/events/$image6' alt='$name' width='710px' height='350px'/></li>";
						   }
						   if($image7 == ""){
						   $img7 = "";
						   }
						   else{
						   $img7 = "<li><img src='images/events/$image7' alt='$name' width='710px' height='350px'/></li>";
						   }
						   if($image8 == ""){
						   $img8 = "";
						   }
						   else{
						   $img8 = "<li><img src='images/events/$image8' alt='$name' width='710px' height='350px'/></li>";
						   }
						   if($image9 == ""){
						   $img9 = "";
						   }
						   else{
						   $img9 = "<li><img src='images/events/$image9' alt='$name' width='710px' height='350px'/></li>";
						   }
						   if($image10 == ""){
						   $img10 = "";
						   }
						   else{
						   $img10 = "<li><img src='images/events/$image10' alt='$name' width='710px' height='350px'/></li>";
						   }
                           echo"
								<div class='row'>
									<div class='span10 offset1'><h1 align='left' style='color:white;'>$name</h1></div>
									<div id='pic_slider' class='span10 offset1'>
										<table width='100%'><tr><td class='flexslider' width='100%'>
										<ul class='slides'>
											$img $img2 $img3 $img4 $img5 $img6 $img7 $img8 $img9 $img10
										</ul></td></tr>
									</table>
									</div><!-- pic_slider -->
									<div class='span10 offset1' id='pic_desc'>
										<div id='desc'>
											$desc
										</div>
									</div>
								</div>
								<br>
                           ";
                       }
                    ?>
<div class='row'>
    <div class='span6'>
        <div class='title_bar_brown'>Past Events</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover' width='100%'>
                <?php
					$q = mysql_query("SELECT * FROM  `h_eventtb` WHERE evt_date <= CURDATE( ) ORDER BY  `evt_date` LIMIT 4");
					if(mysql_num_rows($q) > 0){
						while($row = mysql_fetch_array($q)){
							$row['evt_date'] = date('jS M, Y', strtotime($row['evt_date']));
							$date = $row['evt_date'];
							$name = $row['evt_name'];
							$id = $row['evt_id'];
							echo "<tr><td width='75%'>$name</td><td width='25%'><a href='event.php?id=$id'><button type='submit' class='btn btn-small btn-inverse'>View Event</button></a></td></tr>";
						}
					}
					else{
						echo "<tr><td> No Past Events</td><td></td></tr>";
					}
				?>
            </table>
        </div><!-- msg_body -->
    </div>
    
    <div class='span6'>
        <div class='title_bar_brown'>Upcoming Events</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
			<?php
					$q = mysql_query("SELECT * FROM  `h_eventtb` WHERE evt_date >= CURDATE( ) ORDER BY  `evt_date` LIMIT 4");
					if(mysql_num_rows($q) > 0){
						while($row = mysql_fetch_array($q)){
							$row['evt_date'] = date('jS M, Y', strtotime($row['evt_date']));
							$date = $row['evt_date'];
							$name = $row['evt_name'];
							$id = $row['evt_id'];
							echo "<tr><td width='75%'>$name</td><td width='25%'>$date</td></tr>";
						}
					}
					else{
						echo "<tr><td> No Upcoming Events</td><td></td></tr>";
					}
				?>
            </table>
        </div><!-- msg_body -->
    </div>
    
    <!--<div class='span4'>
        <div class='title_bar_brown'>All Events</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
			<?php
					$q = mysql_query("SELECT * FROM  `h_eventtb` WHERE evt_date ORDER BY  `evt_date` LIMIT 4");
					if(mysql_num_rows($q) > 0){
						while($row = mysql_fetch_array($q)){
							$row['evt_date'] = date('jS M, Y', strtotime($row['evt_date']));
							$date = $row['evt_date'];
							$name = $row['evt_name'];
							$id = $row['evt_id'];
							echo "<tr><td width='65%'>$name</td><td width='35%'><a href='event.php?id=$id'><button type='submit' class='btn btn-small btn-inverse'>View Event</button></a></td></tr>";
						}
					}
					else{
						echo "<tr><td> No All Events</td><td></td></tr>";
					}
				?>
            </table>
        </div>msg_body -->
    <!--</div>-->
</div>

<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>