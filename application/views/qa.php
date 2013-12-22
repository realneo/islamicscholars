<div class="span9">
<!-- Questions and Answers -->
    <div class="title_bar_white">Questions & Answers</div>
    <div class="opacity-7">
        <table class="tableOne lighter">
            <tr>
                <th>No</th>
                <th>Question</th>
                <th>View Answer</th>
            </tr>
            <?php foreach($questions as $question): ?>
                <tr>
                    <td><?php echo $question->qu_id; ?></td>
                    <td><?php echo $question->qu_content; ?></td>
                    <td><?php echo anchor("site/qns_item?id=$question->qu_id", 'View Answer', array('class' => 'btn btn-inverse btn-small'));?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</div>