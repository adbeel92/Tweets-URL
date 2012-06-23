<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="styleSheet" href="style.css" type="text/css"/>
        <title>Tweets URL App</title>
    </head>
    <body>
        <article>
            <section>
                <h1>Edit Tweet <span> By <a href="https://twitter.com/adbeedu" target="_blank">@adbeedu</a> and <a href="https://twitter.com/gabulc" target="_blank">@gabulc</a></span></h1>
                <form method="POST" action="view.php?action=update&id=<?php echo $tweet->getId();?>">
                    <p><input class="url-input" type="text" name="url" placeholder="Paste the URL here..." value="<?php echo $tweet->getTweet_url();?>"/></p>
                    <p><?php echo $msg_error_url;?></p>
                    <input type="submit" value="Edit"/> | <a href="view.php">Back</a>
                </form>
            </section>
        </article>
    </body>
</html>