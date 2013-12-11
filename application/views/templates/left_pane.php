<?php 
	
?>
<div class='opacity-5 span3'>
	<div class="well well-small opacity-5">New</div>
	<div>
		<ul>
			<?php foreach ($news as $news_item): ?>
			
			    <h2><?php echo $news_item['news_title']; ?></h2>
			    <div id="main">
			        <?php echo $news_item['news_brief']; ?>
			    </div>
			    <p><a href="#">View article</a></p>
			
			<?php endforeach; ?>
		</ul>
	</div>
</div><!-- left_pane -->