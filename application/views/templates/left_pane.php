<!-- Left Pane -->
    <div class="span3 opacity-5">
        <?php $this->load->view('templates/calendar'); ?>

        <div id="left_pane">
            <div class="title_bar_white">Latest News</div>
            <?php foreach($news as $new): ?>
            <table class="tableOne">
                <tr>
                    <td>
                        <h5><?php echo $new->news_title; ?></h5>
                        <p><?php echo $new->news_brief; ?><p>
                    </td>
                </tr>
            </table>
            <?php endforeach; ?>

            <div class="title_bar_white">Upcoming Events</div>

            <?php foreach($events as $event): ?>
            <table class="tableOne">
                <tr>
                    <td>
                        <h5><?php echo $event->evt_name; ?></h5>
                        <p><?php echo $event->evt_date; ?><p>
                        <p><?php echo $event->evt_venue; ?><p>
                    </td>
                </tr>
            </table>
            <?php endforeach; ?>

            <div class="title_bar_white">Quick Contacts</div>

            <h5 class="white">Enter the Matrix was almost the best game ever.</h5>
            <p class="white"> Yeah Yeah Yeah</p>

            <button class="btn btn-block btn-info">Make An Appointment</button>
            <br />

            <div class="title_bar_white">Join Our Discussion Forum</div>
            <div class="bg-white text-center">
                <?php
                    $image_properties = array(
                        'src' => 'assets/img/forum_icon.png',
                        'alt' => 'Join our Forum'
                    );
                    echo img($image_properties);
                ?>
            </div>

        </div>
    </div>