<?php
require_once "inc/DataBase.php";

require_once "header.php";

if(isset($_GET["id"])) {
    $db = new DataBase();

    $new = $db->get_post(array(
        "table" => "news",
        "id" => $_GET["id"]
    ));

    if($new) {
    ?>

    <section class="news-view">
        <div class="container">
            <div class="section-content">
                <div class="heading">
                    <h1><?php echo $new["title"]; ?></h1>
                </div>
                <div class="news-view_content">
                    <?php echo $new["content"]; ?>
                </div>
                <div class="news-view_back">
                    <a href="/news.php">Все новости >></a>
                </div>
            </div>
        </div>
    </section>
        <?php
    }
}

require_once "footer.php";
?>