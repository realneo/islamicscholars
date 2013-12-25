<div class="span9">
    <?php foreach($scholar_item as $scholar): ?>
    <div class="row">
        <div class='span14 opacity-10 '>
            <div class="padding-all-5 size-100"><?php echo img("assets/img/scholars/$scholar->sclar_img"); ?></div>
            <div class="brown padding-all-10"><strong>Date of Birth:</strong> <br /><?php echo $scholar->sclar_birth; ?></div>
            <div class="brown padding-all-10"><strong>Type:</strong> <br /><?php echo $scholar->sclar_type; ?></div>
            <div class="brown padding-all-10"><strong>From:</strong> <br /><?php echo $scholar->sclar_from; ?></div>
        </div>
        <div class='span15'>
            <div class="title_bar_white span7"><?php echo "ID: ". $scholar->sclar_id . " | ". $scholar->sclar_date; ?></div>
            <div class="span16 opacity-9 white heading1 padding-all-10"><?php echo $scholar->sclar_name; ?></div>
            <div class="span16 opacity-10 brown padding-all-10 lighter"><?php echo $scholar->sclar_life; ?></div>
        </div>
    </div>
    <?php endforeach; ?>
    
    <br />
    <div class='row'>
        <div class='span9'>
            <div class="title_bar_white span9">Imams / Scholars / Sheikhs</div>
        <?php foreach($scholars as $scholar): ?>
        <div class="opacity-5 padding-all-5 span9 file-hover">
            <div class="span1"><?php echo img("assets/img/scholars/$scholar->sclar_img"); ?></div>
                <div class="span7 white">
                    <div class="heading2"><?php echo $scholar->sclar_name; ?></div>
                    <span class='lighter font-13'><?php echo $scholar->sclar_type . " | " . $scholar->sclar_from . " | " . $scholar->sclar_birth;?></span> 
                    <?php echo anchor("site/scholar_item?id=$scholar->sclar_id", 'Read More', array('class' => 'btn btn-default btn-small pull-right'));?>
                </div>
        </div>
    <div class='span9'></div>
    <?php endforeach; ?>
        </div>
    </div>
</div>