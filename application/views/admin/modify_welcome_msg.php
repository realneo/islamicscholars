<html>
    <head>
        <title>Modify Welcome Message</title>
    </head>
    <body>
        <?php
            echo form_open('site/update_msg');
            
            echo form_textarea('text', "{$welcome_msg}");
            echo form_submit('submit', 'Save Changes');
            
            echo form_close();
        ?>
    </body>
</html>