<div class="span9">
    <div class="title_bar_white span9">Imams / Scholars / Sheikhs</div>
        <?php foreach($scholars as $scholar): ?>
        <div class="opacity-5 span9">
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