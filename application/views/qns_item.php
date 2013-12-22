<div class="span9">
    <?php foreach($qns_item as $qns): ?>
    <div class="row">
        <div class="title_bar_white span9"><?php echo "ID: ". $qns->qu_id . " | ". $qns->qu_date; ?></div>
        <div class="span9 opacity-9 white heading1 padding-all-5"><?php echo $qns->qu_content; ?></div>
        <div class="span9 opacity-7 white padding-all-5"><?php echo $qns->qu_answer_content; ?></div>
    </div>
    <?php endforeach; ?>
    
</div>