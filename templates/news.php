<?php
require_once "inc/DataBase.php";
require_once "inc/functions.php";

$db = new DataBase();
?>

<section class="news">
    <div class="container">
        <div class="section-content">
            <div class="heading">
                <h1>Новости</h1>
            </div>
            <div class="news-container">
                <?php
                $args = array(
                    "table" => "news",
                    "count" => 5,
                    "orderby" => "idate",
                    "order" => "DESC",
                    "page" => (isset($_GET['page'])) ? $_GET['page'] : 1
                );
                $news = $db->get_posts($args);
                foreach ($news as $new) {
                    get_template("templates/news-announce-card.php", $new);
                }
                ?>
            </div>
            <?php get_template("templates/pagination.php", $args); ?>
        </div>
    </div>
</section>