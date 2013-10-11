<?php include('template/header.php'); ?>
<title>Search Scholars</title>
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
    
$button = $_GET ['submit'];
$search = $_GET ['search'];
  
if(strlen($search)<=1)
echo "<br><span style='color:#fff;'>Search term too short</span><br>";
else{
echo "<br><span style='color:#fff;'>You searched for <b>$search</b></span> <hr size='1'></br>";
    
$search_exploded = explode (" ", $search);
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="sclar_name LIKE '%$search_each%'";
else
$construct .="AND sclar_name LIKE '%$search_each%'"; 
}
  
$constructs ="SELECT * FROM h_scholartb WHERE $construct";
$run = mysql_query($constructs);
    
$foundnum = mysql_num_rows($run);
    
if ($foundnum==0)
echo "<span style='color:#fff;'>Sorry, there are no matching result for <b>$search</b>.</br>Please check your spelling<br></span>";
else
{
  
echo "<span style='color:#fff;'>$foundnum results found !</span><p>";
  
$per_page = 5;
$start = $_GET['start'];
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0;
$getquery = mysql_query("SELECT * FROM h_scholartb WHERE $construct LIMIT $start, $per_page");
  ?>
<?php
while($runrows = mysql_fetch_assoc($getquery))
{
	$runrows['sclar_date'] = date('jS M, Y', strtotime($runrows['sclar_date']));
		if( $runrows['sclar_img'] )
		{
			$sclarimage = 'images/scholars/'.$runrows['sclar_img'];
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
						<a href='scholar.php?id={$runrows['sclar_id']}' style='font-size:25px;'>{$runrows['sclar_name']}</a><p>
					</div>
				</div>
				<div class='row'>
					<div class='span2'><a href='scholar.php?id={$runrows['sclar_id']}' class='thumbnail'><img src='$sclarimage' title='{$runrows['sclar_name']}'></a></div>
					<div class='span10'>
						<p>{$runrows['sclar_life']}</p>
						<a href='scholar.php?id={$runrows['sclar_id']}'><button type='submit' class='btn btn-small btn-inverse'>Read More</button></a>
					</div>
				</div>
			</div>
		</div>
		<hr>";
}
?>

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
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$prev'>Prev</a> ";   
          
//pages
if ($max_pages < 7 + ($adjacents * 2))   //not enough pages to bother breaking it up
{
$i = 0;  
for ($counter = 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$i'>$counter</a> ";
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
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$i'>$counter</a> ";
}
$i = $i + $per_page;                                      
}
                          
}
//in middle; hide some front and some back
elseif($max_pages - ($adjacents * 2) > ($start / $per_page) && ($start / $per_page) > ($adjacents * 2))
{
echo " <a href='searchscholars.php?search=$search&submit=Search&start=0'>1</a> ";
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$per_page'>2</a> .... ";
 
$i = $start;                
for ($counter = ($start/$per_page)+1; $counter < ($start / $per_page) + $adjacents + 2; $counter++)
{
if ($i == $start){
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$i'>$counter</a> ";
}  
$i = $i + $per_page;               
}
                                  
}
//close to end; only hide early pages
else
{
echo " <a href='searchscholars.php?search=$search&submit=Search&start=0'>1</a> ";
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$per_page'>2</a> .... ";
 
$i = $start;               
for ($counter = ($start / $per_page) + 1; $counter <= $max_pages; $counter++)
{
if ($i == $start){
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$i'><b>$counter</b></a> ";
}
else {
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$i'>$counter</a> ";  
}
$i = $i + $per_page;             
}
}
}
          
//next button
if (!($start >=$foundnum-$per_page))
echo " <a href='searchscholars.php?search=$search&submit=Search&start=$next'>Next</a> ";   
}  
echo "</center>";
}
}
?>
<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>