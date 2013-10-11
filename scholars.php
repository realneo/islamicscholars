<?php include('template/header.php'); ?>
<title>Scholars</title>
<div class="row">
    <div class="span12">
        <div class='msg_body'>
           <h2>Imam & Scholars</h2> 
           <div class="input-append">
		   <form action="searchscholars.php" method="get">
                <input class="input-xxlarge" id="appendedInputButton" type="text" name="search" placeholder='Search for Imam / Scholar'>
                <button class="btn btn-success" type="submit" name="submit"><i class="icon icon-white icon-search"></i> Search</button>
			</form>
            </div>
        </div><!-- msg_body -->
    </div>
</div>
<p>
<?php
	$q = mysql_query("SELECT * FROM `h_scholartb` ORDER BY `sclar_date` DESC");
	while($row = mysql_fetch_array($q)){
		$row['sclar_date'] = date('jS M, Y', strtotime($row['sclar_date']));
		if( $row['sclar_img'] )
		{
			$sclarimage = 'images/scholars/'.$row['sclar_img'];
		}
		else
		{
			$sclarimage = 'images/noscholarimage.png';
		}
		echo "
		<div class='row'>
			<div class='span12'>
				<div class='row'>
					<div class='span12'>
						<a href='scholar.php?id={$row['sclar_id']}' style='font-size:25px;'>{$row['sclar_name']}</a><p>
					</div>
				</div>
				<div class='row'>
					<div class='span2'><a href='scholar.php?id={$row['sclar_id']}' class='thumbnail'><img src='$sclarimage' title='{$row['sclar_name']}'></a></div>
					<div class='span10'>
						<p style='overflow:hidden;height:62px;'>{$row['sclar_life']}</p>
						<a href='scholar.php?id={$row['sclar_id']}'><button type='submit' class='btn btn-small btn-inverse'>Read More</button></a>
					</div>
				</div>
			</div>
		</div>
		<hr>";
	}
?>

<div class='row'>
    <div class='span4'>
        <div class='title_bar_brown'>Recently Added Imams & Scholars</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
				<?php
					$q = mysql_query("SELECT * FROM `h_scholartb` WHERE sclar_date = CURDATE( ) ORDER BY `sclar_date` DESC LIMIT 5");
					if(mysql_num_rows($q) > 0){
					while($row = mysql_fetch_array($q)){
						$id = $row['sclar_id'];
						$name = $row['sclar_name'];
						echo "
							<tr>
								<td width='85%'>$name</td>
								<td width='15%'><a href='scholar.php?id=$id'><button type='submit' class='btn btn-small btn-inverse'>View</button></a></td>
							</tr>
							";
					}
					}
					else{
						echo "<tr><td>No Recently Added Imams & Scholars</td></tr>";
					}
				?>
            </table>
        </div><!-- msg_body -->
    </div>
    
    <div class='span4'>
        <div class='title_bar_brown'>Present Added Imams & Scholars</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
                <?php
					$q = mysql_query("SELECT * FROM `h_scholartb` WHERE sclar_date <= CURDATE( ) ORDER BY `sclar_date` DESC LIMIT 5");
					while($row = mysql_fetch_array($q)){
						$id = $row['sclar_id'];
						$name = $row['sclar_name'];
						echo "
							<tr>
								<td width='85%'>$name</td>
								<td width='15%'><a href='scholar.php?id=$id'><button type='submit' class='btn btn-small btn-inverse'>View</button></a></td>
							</tr>
							";
					}
				?>
            </table>
        </div><!-- msg_body -->
    </div>
    
    <div class='span4'>
        <div class='title_bar_brown'>Past Added Imams & Scholars</div>
        <div class='msg_body'>
            <table class='table table-condensed table-hover'>
                <?php
					$q = mysql_query("SELECT * FROM `h_scholartb` WHERE sclar_date <= CURDATE( ) ORDER BY `sclar_date` DESC LIMIT 5");
					while($row = mysql_fetch_array($q)){
						$id = $row['sclar_id'];
						$name = $row['sclar_name'];
						echo "
							<tr>
								<td width='85%'>$name</td>
								<td width='15%'><a href='scholar.php?id=$id'><button type='submit' class='btn btn-small btn-inverse'>View</button></a></td>
							</tr>
							";
					}
				?>
            </table>
        </div><!-- msg_body -->
    </div>
</div>

<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>e class='table table-condensed table-hover'>
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

<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>