<?php
if (function_exists('mysqli_connect')) {
    echo 'mysqli extension is enabled';
} else {
    echo 'mysqli extension is not enabled';
}
?>
