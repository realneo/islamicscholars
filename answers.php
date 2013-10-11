<?php include('template/header.php'); ?>
<title>FAQ</title>
<?php include('template/left_pane.php');?>      
    <div class="row">
	<div class='span9' id='content'>
				<?php
					$ques_id = $_GET['id'];
				?>
                    <?php
					
						$q = mysql_query("select * from h_querytb where qu_id='$ques_id'");
						while($row = mysql_fetch_array($q)){
							$quid = $row['qu_id'];
							$userid = $row['user_id'];
							$qucont = $row['qu_content'];
							$qudate = date('jS M, Y', strtotime($row['qu_date']));
							$adminid = $row['admin_id'];
							$quanscont = $row['qu_answer_content'];
							$quansdate = date('jS M, Y', strtotime($row['qu_answer_date']));
							
							echo "
							<div class='span9' style='margin-top:10px;'>
							<div class='msg_body'>
								<h2>Q: $qucont</h2>
							</div>
							</div>
							<div class='span9' style='margin-top:10px;'>
							<div class='msg_body'>
								<h2>A: <span class='pull-right' style='font-size:12px;color:#000;'>Answered on: $quansdate</span></h2>
								<p style='font-size:15px;color:#000;'>$quanscont</p>
							</div>
							</div>
								";
						}
					?>
                

    </div>
	</div><!-- content -->
<br />
<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>