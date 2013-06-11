<?php include('template/header.php'); ?>
<?php include('template/left_pane.php');?>      
    <div class='span6' id='content'>

        <?php include('modules/image_slider.php'); ?>

        <div id="welcome_msg" class="span9">
            <div class="title_bar">Welcome to The Foundation of Sheikhs and Islamic Scholars of Tanzania</div><!-- title_bar -->
            <div class="msg_body">
                Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec ullamcorper nulla non metus auctor fringilla. Maecenas faucibus mollis interdum. Donec ullamcorper nulla non metus auctor fringilla.
                <button type="submit" class="btn  btn-mini btn-inverse">Read More</button>
            </div><!-- msg_body-->
        </div><!-- welcome_msg -->

    </div><!-- content -->

    <div class='row'>
        <div class='span4'>
            <div id="new_scholar_form" class="span4">
                <div class="title_bar_brown">Add an Islamic Scholar / Sheikh</div><!-- title_bar -->
                <div class="msg_body">
                    <form name="new_scholar_form" action="" method='post'>
                        <input class="input-xlarge" type="text" placeholder="Sheikh Ibn Kathir" />
                        <button type="submit" class="btn btn-success offset2">Add</button>
                    </form>
                </div>
            </div><!-- new_scholar_form -->

            <div id="recent_scholars" class="span4">
                <div class="title_bar_brown">Recently Added Scholars / Sheikhs</div><!-- title_bar -->
                <div class="msg_body">
                    <table class='table table-condensed table-hover'>
                        <tr>
                            <td>7th July 2013</td>
                            <td>Anwar Al Awlaki</td>
                            <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                        </tr>
                        <tr>
                            <td>7th July 2013</td>
                            <td>Ibn Kathir</td>
                            <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                        </tr>
                        <tr>
                            <td>7th July 2013</td>
                            <td>Ibn Taimia</td>
                            <td><button type="submit" class="btn btn-small btn-inverse">View</button></td>
                        </tr>
                    </table>
                </div><!-- msg_body -->
            </div><!-- recent_scholars --> 

            <div class="span9">
                <br />
                <div class="msg_body">
                    <div class="input-append">
                        <input class="input-xxlarge" id="appendedInputButton" type="text" placeholder='Type your Question Here'>
                        <button class="btn btn-success" type="button">Ask a Question</button>
                    </div>
                </div>
            </div><!-- questions -->

            <div class='span9'>
                <div class='msg_body'>
                    <table class='table table-condensed table-hover'>
                        <tr>
                            <td>1</td>
                            <td>Oh Sheikh enlighten me on how I should pray tahajjud?</td>
                            <td><button type="submit" class="btn btn-small btn-inverse">View Answer</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Oh Sheikh enlighten me on how I should pray tahajjud?</td>
                            <td><button type="submit" class="btn btn-small btn-inverse">View Answer</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Oh Sheikh enlighten me on how I should pray tahajjud?</td>
                            <td><button type="submit" class="btn btn-small btn-inverse">View Answer</button></td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>

        <div class='span5'>
            <div id="join_forum" class="span5">
                <div class="title_bar_brown">Join our Discussion Area Today</div><!-- title_bar -->
                <div class="msg_body">
                    This is our discussion area
                </div>
            </div><!-- join_forum -->     
        </div>
    </div>
</div><!-- row [main_content] -->
<br />
<?php include('template/footer.php');?> 
<?php include('template/sponsors.php');?>