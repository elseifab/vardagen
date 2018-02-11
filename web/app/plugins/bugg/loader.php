<?php
/*
Plugin Name: Buggar för WordPress i vardagen
*/
defined('ABSPATH') or die('No script kiddies please!');


/*
    Bugg 1,
        introducerar remote request mot server som inte finns
        eller som inte svarar.
*/
add_action('init', function () {
    $url = 'https://www.elseif.se/slow.php';
    $response = wp_remote_post($url, [
        'method' => 'POST',
        'timeout' => 5,
    ]);
});
