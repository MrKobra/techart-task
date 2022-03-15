<?php if(isset($args)): ?>
    <div class="news-card">
        <header class="news-card_header">
            <div class="date">
                <span><?php echo DateTime::createFromFormat("U", $args["idate"])->format("d.m.Y"); ?></span>
            </div>
            <div class="news-card_title">
                <a href="<?php echo "view.php?id={$args['id']}"; ?>"><?php echo $args['title']; ?></a>
            </div>
        </header>
        <div class="news-card_announce">
            <p><?php echo $args['announce']; ?></p>
        </div>
    </div>
<?php endif; ?>
