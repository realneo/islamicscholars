<?php include('template/header.php'); ?>
<title>Library</title>
<form class="form-search" method="get" action="search.php">
    <div class="input-append">
        <input type="text" class="span5 search-query" name="search" placeholder="Search Library">
        <button type="submit" class="btn" name="submit"><i class="icon icon-search"></i> Search</button>
    </div>
</form>

<div class='row'>
<ul class="thumbnails">
<?php
        $q = mysql_query("SELECT * FROM `h_librarytb` ORDER BY `lib_date` DESC");
		while($row = mysql_fetch_array($q)){
			$row['lib_date'] = date('jS M, Y', strtotime($row['lib_date']));
			if( $row['lib_cover_img'] )
			{
				$coverimage = 'images/library/'.$row['lib_cover_img'];
			}
			else
			{
				$coverimage = 'images/nocoverimage.png';
			}
			$msg="";
			if(isset($_SESSION["userlogin"])){
				$msg="<a href='#' id='download' class='btn-small btn-inverse icon pull-right'><i class='icon icon-white icon-download-alt'></i> Download</a>";
			}
			else{
				$msg="";
			}
			echo "
				<li class='span12 clearfix'>
					<div class='thumbnail clearfix'>
						<img src='$coverimage' alt='{$row['lib_title']}' class='pull-left span2 clearfix' style='margin-right:10px' width='320px' height='100px'>
						<div class='caption' class='pull-left'>
							$msg
							<a href='#' style='font-size:20px;font-weight:bold;'>{$row['lib_title']}</a><br>
							<span style='color:green;font-weight:bold;'>Description: </span><span style='color:#fff;'>{$row['lib_desc']}</span><br>
							<span style='color:green;font-weight:bold;'>Author: </span><span style='color:#fff;'> {$row['lib_author']}</span>&nbsp;&nbsp;&nbsp;<span style='color:green;font-weight:bold;'>Type: </span><span style='color:#fff;'> {$row['lib_type']}</span>
						</div>
					</div>
				</li>
				";
		}
	?>
</ul>
</div>

<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>ft span2 clearfix" style='margin-right:10px'>
            <div class="caption" class="pull-left">
                <a href="http://bootsnipp.com/" class="btn btn-inverse icon pull-right">Download</a>
                <h4><a href="#" >Luis Felipe Kaufmann</a></h4>
                <p>RB: 99384877</p>
            </div>
        </div>
    </li>
    
    <li class="span12 clearfix">
        <div class="thumbnail clearfix">
            <img src="http://placehold.it/320x200" alt="ALT NAME" class="pull-left span2 clearfix" style='margin-right:10px'>
            <div class="caption" class="pull-left">
                <a href="http://bootsnipp.com/" class="btn btn-inverse icon pull-right">Download</a>
                <h4><a href="#" >Luis Felipe Kaufmann</a></h4>
                <p>RB: 99384877</p>
            </div>
        </div>
    </li>
 
    
</ul>
</div>

<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>