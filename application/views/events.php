<div class="span9">
    <div class='row'>
        <div class="title_bar_white span9">Events</div>
        <?php foreach($all_events as $event): ?>
        <div class="opacity-5 span9">

            <div class="span1"><img src="img/events/<?php echo $event->evt_img; ?>" alt="" /></div>

            <div class="span1"><?php echo img("assets/img/events/$event->evt_img"); ?></div>

            <div class="span7 white ">
                <div class="heading2"><?php echo $event->evt_name; ?></div>
                <p class='lighter font-12'><?php echo $event->evt_desc; ?></p>
                <span class='lighter font-13'><?php echo $event->evt_date . " | " . $event->evt_venue;?></span>
                <a href="<?php echo 'event_item?id='.$event->evt_id; ?>" class="btn btn-default btn-small pull-right"> Read More</a>
            </div>
        </div>
        <div class='span9'></div>
        <?php endforeach; ?>
    </div>
    
</div>