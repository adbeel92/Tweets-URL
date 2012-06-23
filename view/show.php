<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="styleSheet" href="style.css" type="text/css"/>
        <title>Tweets URL App</title>
    </head>
    <body>
        <h1><?php echo $tweet->getName();?>'s Tweet <span> By <a href="https://twitter.com/adbeedu" target="_blank">@adbeedu</a> and <a href="https://twitter.com/gabulc" target="_blank">@gabulc</a></span></h1>
    <center>
        <div id="container">
        <article id="box-tweet" style="background-image:url('<?php echo $tweet->getBackground_url();?>')">
            <section  id="tweet">
                <article class="info-twitter2">
                    <img src="<?php echo $tweet->getPhoto_url();?>" alt="img_profile" id="photo"/>
                </article>
                <article id="info2" class="info-twitter2">
                    <p>@<?php echo $tweet->getScreen_name();?></p>
                    <small><?php echo $tweet->getName();?></small>
                </article>

                <p id="text2"><?php echo $tweet->getContent();?></p>

                <div id="small2">
                    <small>Tweeted at: <?php echo $tweet->getTweeted_at();?></small><br/>
                    <a href="view.php?action=edit&id=<?php echo $tweet->getId();?>">Edit</a> | 
                    <a href="view.php?action=delete&id=<?php echo $tweet->getId();?>" onclick="confirm('Are you sure?')" id="delete">Delete</a> | 
                    <a href="view.php">Back</a>
                </div>
            </section>
        </article>
        </div>
    </center>
    </body>
</html>
