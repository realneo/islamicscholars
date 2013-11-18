<?php include('template/header.php'); ?>
<title>FAQ</title>
<?php include('template/left_pane.php');?>  
<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}
else
{
    $user_id = "";	
}
?>    
    <div class="row">
	<div class='span9' id='content'>
			<?php
				$msg = "";
				if(isset($_POST['send'])){
					$ques = $_POST['ques'];
					if ($ques != "") {
						$sqlCommand = "INSERT INTO h_querytb VALUES('', '$user_id','$ques',now(),'','','','no')";  
						$query = mysql_query($sqlCommand) or die (mysql_error());
						$msg = "<span style='color:green;'>Jazakallahu Khairan for your contribution.</span>";
						header ("Location: questions.php");
					}
					else{
						$msg = "<span style='color:red;'>Please type in your Question.</span>";
					}
				}
				else{
					
				}
			?>
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
								<form action='' method='post' enctype='multipart/form-data'>
								<textarea placeholder='Type your Question' rows='1' style='width: 554px; height: 45px;' wrap='hard' name='ques'></textarea>
								<button class='btn btn-success' type='submit' name='send'>Ask a Question</button>
								</form>
							</div>
							<span>$msg</span>
						</div>
					</div>";
				}
			?>
			<div class='span9' style="margin-top:10px;">
                <div class='msg_body'>
						<?php
							$per_page = 10;
							$pages_query = mysql_query("SELECT COUNT('qu_id') from h_querytb");
							$pages = ceil(mysql_result($pages_query, 0) / $per_page);

							$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
							$start = ($page - 1) * $per_page;
							$q = mysql_query("SELECT * FROM  `h_querytb` ORDER BY  `qu_id` DESC LIMIT $start, $per_page");
							
							if(mysql_num_rows($q) > 0){
								echo "<table class='table table-condensed table-hover'>";
								while($row = mysql_fetch_assoc($q)){
									$row['qu_date'] = date('jS M, Y', strtotime($row['qu_date']));
									$date = $row['qu_date'];
									$content = $row['qu_content'];
									$id = $row['qu_id'];
									$quanswered = $row['qu_answered'];
									$msg = "";
									if($quanswered == 'yes')
									{
										$msg = "<a href='answers.php?id=$user_id'><button type='submit' class='btn btn-small btn-inverse'>View Answer</button></a>";
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
							echo "</table>"; 
							
							$prev = $page - 1;
							$next = $page + 1;
							
							echo "<center>";
							
							if(!($page<=1)){
								echo "<a href='questions.php?page=$prev'>Prev</a> ";
							}
							
							if($pages >= 1){
								for($x=1;$x<=$pages;$x++){
									echo ($x == $page) ? '<a href="?page='.$x.'" style="font-weight:bold;">'.$x.'</a> ':'<a href="?page='.$x.'">'.$x.'</a> ';
								}
							}
							
							if(!($page>=$pages)){
								echo "<a href='questions.php?page=$next'>Next</a> ";
							}
							echo "</center>";
                        ?>
                </div>
            </div>

    </div>
	</div><!-- content -->
<br />
<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>