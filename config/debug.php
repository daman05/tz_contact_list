<?php
function debug($arr, $n = null)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';

    if ($n !== null) {
        die();
    }
}
