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
                <h1>New Tweet <span> By <a href="https://twitter.com/adbeedu" target="_blank">@adbeedu</a> and <a href="https://twitter.com/gabulc" target="_blank">@gabulc</a></span></h1>
                <form method="POST" action="view.php?action=create">
                    <p><input class="url-input" type="text" name="url" placeholder="Paste the URL here..."/></p>
                    <p><?php echo $msg_error_url;?></p>
                    <input type="submit" value="Register"/> | <a href="view.php">Back</a>
                </form>
            </section>
        </article>
    </body>
</html>
