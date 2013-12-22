<div class="span9">
    <?php foreach($scholar_item as $scholar): ?>
    <div class="row">
        <div class='span2 opacity-5 lighter'>
            <img src='img/scholars/scholar.png' alt='' />
            <div class="white padding-all-5">Date of Birth: <br /><?php echo $scholar->sclar_birth; ?></div>
            <div class="white padding-all-5">Type: <br /><?php echo $scholar->sclar_type; ?></div>
            <div class="white padding-all-5">From: <br /><?php echo $scholar->sclar_from; ?></div>
        </div>
        <div class='span7'>
            <div class="title_bar_white span7"><?php echo "ID: ". $scholar->sclar_id . " | ". $scholar->sclar_date; ?></div>
            <div class="span7 opacity-9 white heading1 padding-all-5"><?php echo $scholar->sclar_name; ?></div>
            <div class="span7 opacity-5 white padding-all-5 lighter"><?php echo $scholar->sclar_life; ?></div> 
        </div>
    </div>
    <?php endforeach; ?>
    
    <br />
    <div class='row'>
        <div class='span9'>
            <div class="title_bar_white span9">Imams / Scholars / Sheikhs</div>
        <?php foreach($scholars as $scholar): ?>
        <div class="opacity-5 span9">
            <div class="span1"><img src="img/library/<?php echo $scholar->sclar_img; ?>" alt="" /></div>
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