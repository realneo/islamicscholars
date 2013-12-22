<div class="span9">
    <?php foreach($news_item as $news): ?>
    <div class="row">
        <div class="title_bar_white span9"><?php echo "ID: ". $news->news_id . " | ". $news->news_date; ?></div>
        <div class="span9 opacity-9 white heading1 padding-all-5"><?php echo $news->news_title; ?></div>
        <div class="span9 opacity-7 white padding-all-5"><?php echo $news->news_brief; ?></div>
        <div class="span9 opacity-5 white padding-all-5"><?php echo $news->news_content; ?></div>
    </div>
    <?php endforeach; ?>
    <br />
    <br />
    <div class="title_bar_white">Other News</div>
    <?php foreach($new as $n): ?>
    <table class="tableOne opacity-5">
        <tr>
            <td>
                <a href="<?php echo 'news_item?id='.$n->news_id; ?>">
                    <h5><?php echo $n->news_title; ?></h5>
                    <p><?php echo $n->news_brief; ?><p>
                </a>
            </td>
        </tr>
    </table>
    <?php endforeach; ?>
    
</div>