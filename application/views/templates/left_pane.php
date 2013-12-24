<!-- Left Pane -->
    <div class="span3 opacity-5">
        <?php $this->load->view('templates/calendar'); ?>

        <div id="left_pane">
            <div class="title_bar_white">Latest News</div>
            <?php foreach($news as $new): ?>
            <table class="tableOne">
                <tr>
                    <td>
                        <?php echo anchor("site/news_item?id=$new->news_id", "<h5>$new->news_title</h5><p>$new->news_brief</p>");?>
                    </td>
                </tr>
            </table>
            <?php endforeach; ?>

            <div class="title_bar_white">Upcoming Events</div>

            <?php foreach($events as $event): ?>
            <table class="tableOne">
                <tr>
                    <td>
                        <?php echo anchor(
                                "site/event_item?id=$event->evt_id", 
                                "<h5>$event->evt_name</h5>
                                <p>$event->evt_date</p>
                                <p>$event->evt_venue</p>")
                        ;?>
                        
                    </td>
                </tr>
            </table>
            <?php endforeach; ?>

            <div class="title_bar_white">Quick Contacts</div>

            <p class="white"><br /><br />P.O Box 71571
                Kariakoo Morogoro / <br /><br />Lumumba road 2nd Floor.
                <br /><br />Dar Es Salam</p><br />
            <p class="white"><strong>Mobile </strong><br /><br />
                +255713603050 / +255784603050<br /><br />

                <br /><strong>Telephone</strong><br /><br />
                +255 22 21184050 / 2184544<br />

                <br /><strong>Fax</strong><br /><br />
                +255-22-2184279</p>

            <button class="btn btn-block btn-info">Make An Appointment</button>
            <br />

            <div class="title_bar_white">Join Our Discussion Forum</div>
            <div class="bg-white text-center">
                <?php
                    $image_properties = array(
                        'src' => 'assets/img/forum_icon.png',
                        'alt' => 'Join our Forum'
                    );
                    
                    echo anchor("forum", img($image_properties));
                ?>
            </div>

        </div>
    </div>