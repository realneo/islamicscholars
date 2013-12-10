<?php include('classes/config.php'); ?>
	<div class='span3 opacity-5'>       
	<h5 class="well well-small opacity-5">Latest News</h5>
	    <?php 
			$q = mysql_query("SELECT * FROM `h_newstb` ORDER BY `news_date` DESC LIMIT 5");
			while($row = mysql_fetch_array($q)){
				$row['news_date'] = date('jS M, Y', strtotime($row['news_date']));
				$date = $row['news_date'];
				$brief = $row['news_brief'];
				$title = $row['news_title'];
				$id = $row['news_id'];
				echo "
					<a href='new.php?id={$id}'><strong>{$title}</strong></a><br />
					{$brief}<br />
				";
				//echo "<li><a href='new.php?id={$id}'>$brief</a></li>";
			}
		?>
	<h5 class='well well-small opacity-5'>Upcoming Events</h5>
		<?php
			$q = mysql_query("SELECT * FROM  `h_eventtb` WHERE evt_date >= CURDATE( ) ORDER BY  `evt_date` LIMIT 4");
			if(mysql_num_rows($q) > 0){
				while($row = mysql_fetch_array($q)){
					$row['evt_date'] = date('jS M, Y', strtotime($row['evt_date']));
					$date = $row['evt_date'];
					$name = $row['evt_name'];
					$id = $row['evt_id'];
					
					echo "
						<a href='event.php?id={$id}'><strong>{$date}</strong></a><br />
						{$name}<br />
					";
					//echo "<li><a href='event.php?id={$id}'><i class='icon-play'></i> $name</a></li>";
				}
			}
			else{
				echo "No Upcoming Events";
			}
	    ?>
	
	<h5 class='well well-small opacity-5'>Quick Contacts</h5>
		<address>
			P.O Box 71571<br />
			Kariakoo Morogoro / Lumumba road 2nd Floor.<br />
			Dar Es Salaam<br />
			
			Mobile<br />
			+255713603050 / +255784603050<br />
			
			Telephone<br />
			+255 22 21184050 / 2184544<br />
			
			Fax<br />
			+255-22-2184279<br />
		</address>
	</div>
	<!-- left_pane -->