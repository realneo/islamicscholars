<?php include('template/header.php'); ?>
<title>Search</title>
<form class="form-search" method="get" action="search.php">
    <div class="input-append">
        <input type="text" class="span5 search-query" name="search" placeholder="Search Library">
        <button type="submit" class="btn" name="submit"><i class="icon icon-search"></i> Search</button>
    </div>
</form>
<?php
    
$button = $_GET ['submit'];
$search = $_GET ['search'];
  
if(strlen($search)<=1)
echo "<span style='color:#fff;'>Search term too short</span><br>";
else{
echo "<span style='color:#fff;'>You searched for <b>$search</b></span> <hr size='1'></br>";
    
$search_exploded = explode (" ", $search);
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="lib_title LIKE '%$search_each%' OR lib_author LIKE '%$search_each%'";
else
$construct .="AND lib_title LIKE '%$search_each%' OR lib_author LIKE '%$search_each%'"; 
}
  
$constructs ="SELECT * FROM h_librarytb WHERE $construct";
$run = mysql_query($constructs);
    
$foundnum = mysql_num_rows($run);
    
if ($foundnum==0)
echo "<span style='color:#fff;'>Sorry, there are no matching result for <b>$search</b>.</br>Please check your spelling<br></span>";
else
{
  
echo "<span style='color:#fff;'>$foundnum results found !</span><p>";
  
$per_page = 6;
$start = $_GET['start'];
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0;
$getquery = mysql_query("SELECT * FROM h_librarytb WHERE $construct LIMIT $start, $per_page");
  ?>
 <div class='row'>
<ul class="thumbnails"> 
<?php
while($runrows = mysql_fetch_assoc($getquery))
{
	$runrows['lib_date'] = date('jS M, Y', strtotime($runrows['lib_date']));
	if( $runrows['lib_cover_img'] )
	{
		$coverimage = 'images/library/coverimage'.$runrows['lib_cover_img'];
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
				<img src='$coverimage' alt='{$runrows['lib_title']}' class='pull-left span2 clearfix' style='margin-right:10px' width='320px' height='100px'>
				<div class='caption' class='pull-left'>
					$msg
					<a href='#' style='font-size:20px;font-weight:bold;'>{$runrows['lib_title']}</a><br>
					<span style='color:green;font-weight:bold;'>Description: </span><span style='color:#fff;'>{$runrows['lib_desc']}</span><br>
					<span style='color:green;font-weight:bold;'>Author: </span><span style='color:#fff;'> {$runrows['lib_author']}</span>&nbsp;&nbsp;&nbsp;<span style='color:green;font-weight:bold;'>Type: </span><span style='color:#fff;'> {$runrows['lib_type']}</span>
				</div>
			</div>
		</li>
	";
}
?>
 </ul>
</div>
<?php
//Pagination Starts
echo "<center>";
  
$prev = $start - $per_page;
$next = $start + $per_page;
                       
$adjacents = 3;
$last = $max_pages - 1;
  
if($max_pages > 1)
{  
//previous button
if (!($start<=0))
echo " <a href='search.php?search=$search&submit=Search&start=$prev'>Prev</a> ";   
          
//pages
if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
{
$i = 0;  
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search&start=$i'>$counter</a> ";
} 
$i = $i + $per_page;                
}
}
elseif($max_pages > 5 + ($adjacents * 2))    //enough pages to hide some
{
//close to beginning; only hide later pages
if(($start/$per_page) < 1 + ($adjacents * 2))       
{
$i = 0;
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search&start=$i'>$counter</a> ";
}
$i = $i + $per_page;                                      
}
                          
}
//in middle; hide some front and some back
elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo " <a href='search.php?search=$search&submit=Search&start=0'>1</a> ";
echo " <a href='search.php?search=$search&submit=Search&start=$per_page'>2</a> .... ";
 
$i = $start;                
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search&start=$i'>$counter</a> ";
}  
$i = $i + $per_page;               
}
                                  
}
//close to end; only hide early pages
else
{
echo " <a href='search.php?search=$search&submit=Search&start=0'>1</a> ";
echo " <a href='search.php?search=$search&submit=Search&start=$per_page'>2</a> .... ";
 
$i = $start;               
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='search.php?search=$search&submit=Search&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='search.php?search=$search&submit=Search&start=$i'>$counter</a> ";  
}
$i = $i + $per_page;             
}
}
}
          
//next button
if (!($start >=$foundnum-$per_page))
echo " <a href='search.php?search=$search&submit=Search&start=$next'>Next</a> ";   
}  
echo "</center>";
}
}
?>
<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>