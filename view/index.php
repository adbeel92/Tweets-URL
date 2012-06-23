<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="styleSheet" href="style.css" type="text/css"/>
        <title>Tweets URL App</title>
    </head>
    <body>
        <h1>Tweets <span> By <a href="https://twitter.com/adbeedu" target="_blank">@adbeedu</a> and <a href="https://twitter.com/gabulc" target="_blank">@gabulc</a></span></h1>
        <p><a href="view.php?action=new">New Tweet</a></p>
        <center>
        <div id="container">
            <?php if($tweets==null){?>
            <p>Click on 'New Tweet'.</p>
            <?php }?>
            <?php foreach ($tweets as $t) { ?>
            <article class="box-tweet" style="background-image:url('<?php echo $t->getBackground_url();?>')">
                <section  id="tweet">
                    <article class="info-twitter">
                        <img src="<?php echo $t->getPhoto_url();?>" alt="img_profile" id="photo"/>
                    </article>
                    <article id="info" class="info-twitter">
                        <p>@<?php echo $t->getScreen_name();?></p>
                        <small><?php echo $t->getName();?> | 
                        <a href="view.php?action=show&id=<?php echo $t->getId();?>">See Tweet</a></small>
                    </article>
                    
                    <p id="text"><?php echo $t->getContent();?></p>
                    
                    <div id="small">
                        <small>Tweeted at: <?php echo $t->getTweeted_at();?></small>
                        <a href="view.php?action=edit&id=<?php echo $t->getId();?>">Edit</a> | 
                        <a href="view.php?action=delete&id=<?php echo $t->getId();?>" onclick="confirm('Are you sure?')" id="delete">Delete</a>
                    </div>
                </section>
            </article>
            <?php }?>
        </div>
        </center>
    </body>
</html>
