<?php

function get_template($path, $params = []) {
    $args = $params;
    include $path;
}