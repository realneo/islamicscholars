<?php include('classes/config.php'); ?>

                <div class='span3' id='left_pane'>
                    
                    <h5>Latest News</h5>
                    <ul class='unstyled'>
                        <?php 
							$q = mysql_query("SELECT * FROM `h_newstb` ORDER BY `news_date` DESC LIMIT 5");
							while($row = mysql_fetch_array($q)){
								$row['news_date'] = date('jS M, Y', strtotime($row['news_date']));
								$date = $row['news_date'];
								$brief = $row['news_brief'];
								$id = $row['news_id'];
								echo "<li><a href='#'><i class='icon-play'></i> $brief</a></li>";
							}
						?>
                    </ul>
                    
                    <h5>Upcoming Events</h5>
                    <ul class='unstyled'>
						<?php
							$q = mysql_query("SELECT * FROM  `h_eventtb` WHERE evt_date >= CURDATE( ) ORDER BY  `evt_date` LIMIT 4");
							if(mysql_num_rows($q) > 0){
								while($row = mysql_fetch_array($q)){
									$row['evt_date'] = date('jS M, Y', strtotime($row['evt_date']));
									$date = $row['evt_date'];
									$name = $row['evt_name'];
									$id = $row['evt_id'];
									echo "<li><a href='#'><i class='icon-play'></i> $name</a></li>";
								}
							}
							else{
								echo "<li> No Upcoming Events</li>";
							}
                        ?>
                    </ul>
                    
                    <h5>Quick Contacts</h5>
                        <address>
                            Lumumba bla bla bal<br>
                            Pale pale<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>
					<h5>E-Mail</h5>
                        <address>
                            Sheikh Khamis Mataka<br>
                            <a href="mailto:#">info@islamicscholars.com</a>
                        </address>
                </div>
				<!-- left_pane -->