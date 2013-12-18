<div class="span9">

    <!-- Corousel -->
    <?php $this->load->view('corousel'); ?>

    <!-- Welcome Message -->
    <div class="title_bar_white">Welcome Message</div>
    <div class="opacity-5 white">
        <?php foreach ($welcome_msg as $msg): ?>
            <?php echo $msg->text; ?>
        <?php endforeach; ?>
    </div>

    <br />

    <!-- Questions and Answers -->
    <div class="title_bar_white">Questions & Answers</div>
    <div class="opacity-7">
        <table class="tableOne">
            <tr>
                <th>No</th>
                <th>Question</th>
                <th>View Answer</th>
            </tr>
            <?php foreach($questions as $question): ?>
                <tr>
                    <td><?php echo $question->qu_id; ?></td>
                    <td><?php echo $question->qu_content; ?></td>
                    <td><a href="#" class="btn btn-inverse">View Answer</a></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <br />
    <!-- Imams and Scholars -->
    <div class='row'>
        <div class='span5'>
            <div class="title_bar_white">Sheikhs, Imams and Scholars</div>
            <div class="opacity-7">
                <table class="tableOne">
                    <tr>
                        <th>No</th>
                        <th>Imam / Scholar / Sheikh</th>
                        <th>View</th>
                    </tr>
                    <?php foreach($scholars as $scholar): ?>
                        <tr>
                            <td><?php echo $scholar->sclar_id; ?></td>
                            <td><?php echo $scholar->sclar_name; ?></td>
                            <td><a href="#" class="btn btn-inverse">View</a></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>
        </div>
        
        <div class='span4'>
            <div class="opacity-7">
                <a href='#' class='btn btn-block btn-success btn-large'>JOIN US</a>
                <p class='white text-center'>Register Now and be part of the bigger community for the best of the Ummah</p>
                <ul class='white'>
                    <li>Ask questions to our trusted scholars</li>
                    <li>Join Discussions</li>
                    <li>Get updates</li>
                    <li>A source of Muslims to Join Hands</li>
                </ul>
            </div>
        </div>
    </div>
</div>