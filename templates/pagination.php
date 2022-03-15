<?php
global $db;

if(isset($args)) {
    if(array_key_exists("count", $args)) {
        $post_count_page = $args["count"];
        unset($args["count"]);

        if(array_key_exists("offset", $args)) {
            unset($args["offset"]);
        }

        $posts = $db->get_posts($args);
        $post_count = count($posts);

        if($post_count / $post_count_page > 1) {
        ?>
            <div class="pagination">
                <p><strong>Страницы:</strong></p>
                <ul>
                    <?php
                        for ($i = 1; $post_count > 0; $i++) {
                            ?>
                            <li <?php if(isset($_GET['page']) && $_GET['page'] == $i) { echo "class='active'"; } ?>><a href="?<?php echo "page={$i}"; ?>"><?php echo $i; ?></a></li>
                            <?php
                            $post_count -= $post_count_page;
                        }
                    ?>
                </ul>
            </div>
        <?php
        }
    }
}