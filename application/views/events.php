<div class="span9">

        <div class="title_bar_white ">Events</div>
        <?php foreach($all_events as $event): ?>
        <div class="opacity-5 span17 file-hover ">

            <div class="span18 padding-all-5"><?php echo img("assets/img/events/$event->evt_img"); ?></div>

            <div class="span19 white ">
                <div class="heading3 padding-all-5"><?php echo $event->evt_name; ?></div>

                <span class='lighter font-13'><?php echo $event->evt_date . " | " . $event->evt_venue;?></span>
                <a href="<?php echo 'event_item?id='.$event->evt_id; ?>" class="btn btn-default btn-small pull-right margin-bottom-5 margin-bottom-5"> Read More</a>
            </div>
        </div>
        <div class='span9'></div>
        <?php endforeach; ?>

    
</div>