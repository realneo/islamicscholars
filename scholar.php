<?php include('template/header.php'); ?>
<title>Scholar</title>
<?php
	$sclar_id = $_GET['id'];
	
	?>
	<?php
	$s = mysql_query("SELECT *, GROUP_CONCAT(res_link SEPARATOR ' , ') scholar_reslink  FROM h_scholartb as h , h_resourcetb as r WHERE h.sclar_id = r.sclar_id AND h.sclar_id = '$sclar_id'");
	while($row = mysql_fetch_array($s)){
		$resid = $row['res_id'];
		$resname = $row['res_name'];
		//$resname = explode(", ", $row['scholar_res']);
		//$reslink = $row['scholar_reslink'];
		$reslink = explode(", ", $row['scholar_reslink']);
		
		$msg = "";
		if($resid){
			$msg = "<span style='color:#000;'>Resources:</span><br>";
			foreach($reslink AS $reslinks){
				$msg .= "<a href='http://$reslinks' targer='_blank' style='color:#00f;'>$reslinks</a><br>";
			}
		}
		else{
			$msg = "<span style='color:#000;'>No Resources</span>";
		}
	}
	?>
	<?php
	$q = mysql_query("SELECT *, GROUP_CONCAT(schl_name SEPARATOR ' , ') scholar_schools FROM h_scholartb as h, h_schooltb as s WHERE h.sclar_id = s.sclar_id AND h.sclar_id = '$sclar_id'");
	
	while($row = mysql_fetch_array($q)){
		$name = $row['sclar_name'];
		$birth = date('jS M, Y', strtotime($row['sclar_birth']));
	    $life = $row['sclar_life'];
	    $from = $row['sclar_from'];
		$type = $row['sclar_type'];
		$school = explode(", ", $row['scholar_schools']);
		if( $row['sclar_img'] )
		{
			$image = 'images/scholars/'.$row['sclar_img'];
		}
		else
		{
			$image = 'images/noscholarimage.png';
		}
		
		$sch = "";
		if($resid){
			$sch = "<span style='color:#000;'>Schools:</span><br>";
			foreach($school AS $schools){
				$sch .= "&gt;$schools<br>";
			}
		}
		else{
			$sch = "<span style='color:#000;'>No School</span>";
		}
		
		echo "<div class='row'>
				<div class='span4'>
					<div class='msg_body'>
					   <img src='$image' title='$name' width='100%' height='300px'>
					   <p style='color:#000;'>Date Of Birth: $birth</p>
					   <p style='color:#000;'>From: $from</p>
					   $sch
					   $msg
					</div>  
				</div>
				<div class='span8'>
					<div class='msg_body'>
						<h1>$name <span style='font-size:19px;'>($type)</span></h1>
						<p style='color:#000;'>$life</p>
					</div>
				</div>
			</div>";
	}

?>
<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>