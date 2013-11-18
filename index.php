<?php include('template/header.php'); ?>
<title>Home Page</title>
<?php include('template/left_pane.php');?>       
    <div class="row">
	<div class='span9' id='content'>

        <?php include('modules/image_slider.php'); ?>
        <div id="welcome_msg" class="span9">
            <div class="title_bar">Welcome to The Foundation of Sheikhs and Islamic Scholars of Tanzania <button type="submit" class="btn  btn-mini btn-inverse pull-right msg_read_btn">Read More</button></div><!-- title_bar -->
            <div class="msg_body two_lines" id='msg_body'>
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.
                Islam and Christianity are the two main religions with big number of believers in Tanzania and they are the main religions in which political, public leaders and most businessmen come from.  
            </div><!-- msg_body-->
        </div><!-- welcome_msg -->
		
            <!--<div id="join_forum" class="span9">
                <div class="title_bar_brown">Join our Discussion Area Today</div>
                <div class="msg_body">
                    This is our discussion area
                </div>
        </div>-->
		
        <div id="recent_scholars" class="span6">
            <div class="title_bar_brown">Recently Added Scholars / Sheikhs</div><!-- title_bar -->
            <div class="msg_body">
                <table class='table table-condensed table-hover'>
                <?php
                    $q = mysql_query("SELECT * FROM  `h_scholartb` ORDER BY  `sclar_date` DESC LIMIT 4");
                    if(mysql_num_rows($q) > 0){
                        while($row = mysql_fetch_array($q)){
                            $row['sclar_date'] = date('jS M, Y', strtotime($row['sclar_date']));
                            $date = $row['sclar_date'];
                            $scholar_name = $row['sclar_name'];
                            $id = $row['sclar_id'];
                            echo "<tr><td width='25%' style='font-weight:bold;'>$date</td><td width='65%'>$scholar_name</td><td width='10%'><button type='submit' class='btn btn-small btn-inverse'>View</button></td></tr>";
                        }
                    }else{
                        echo "<tr><td></td><td>No Recently Added Scholars / Sheikhs</td><td></td></tr>";
                    }
                    ?>
                </table>
            </div><!-- msg_body -->
        </div><!-- recent_scholars -->
        <?php
            if(!isset($_SESSION["userlogin"])){
                echo "";
            }
            else{
                echo "<div class='span9'>
                        <br />
                        <div class='title_bar_brown'>ASK A QUESTION</div>
                        <div class='msg_body'>
                            <div class='input-append'>
                                <form name='new_question' action='' method='post' enctype='multipart/form-data'>
                                    <textarea placeholder='Type your Question' rows='1' style='width: 554px; height: 45px;' wrap='hard' name='ques' id='question'></textarea>
                                    <button class='btn btn-success' type='submit' name='send' id='q_btn'>Ask a Question</button>
                                </form>
                            </div>
                            <div id='msg'></div>
                        </div>
                </div>";
            }
        ?>
			<div class='span9' style="margin-top:10px;">
                <div class='msg_body'>
                    <table class='table table-condensed table-hover'>
						<?php
							$q = mysql_query("SELECT * FROM  `h_querytb` ORDER BY  `qu_id` DESC LIMIT 4");
							if(mysql_num_rows($q) > 0){
								while($row = mysql_fetch_array($q)){
									$row['qu_date'] = date('jS M, Y', strtotime($row['qu_date']));
									$date = $row['qu_date'];
									$content = $row['qu_content'];
									$id = $row['qu_id'];
									$quanswered = $row['qu_answered'];
									$msg = "";
									if($quanswered == 'yes')
									{
										$msg = "<a href='answers.php?id=$id'><button type='submit' class='btn btn-small btn-inverse'>View Answer</button></a>";
									}
									else{
										$msg = "<button class='btn btn-small btn-inverse'>Not Answered</button>";
									}
									echo "<tr><td width='15%' style='font-weight:bold;'>$date</td><td width='67%'>$content</td><td width='18%' style='text-align:right;'>$msg</td></tr>";
								}
							}
							else{
								echo "<tr><td></td><td>No Questions</td><td></td></tr>";
							}
                        ?>
                    </table>
                </div>
            </div>

    </div>
	</div><!-- content -->
<br />
<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>