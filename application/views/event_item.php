<div class="span9">
    <?php foreach($event_item as $event): ?>
    <div class="row">
        <div class="title_bar_white span9"><?php echo "ID: ". $event->evt_id . " | ". $event->evt_date; ?></div>
        <div class="span9 opacity-9 white heading1 padding-all-10"><?php echo $event->evt_name; ?></div>
        <div class='span9 text-center opacity-5 padding-all-10'><?php echo img("assets/img/events/$event->evt_img"); ?></div>
        <div class="span9 opacity-7 white padding-all-10"><?php echo $event->evt_venue; ?></div>
        <div class="span9 opacity-5 white padding-all-10"><?php echo $event->evt_desc; ?></div>
    </div>
    <?php endforeach; ?>
</div>


