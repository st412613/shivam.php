<?php
// CSS header
header("Content-Type: text/css");

// Cache this CSS for 1 hour (3600 seconds)
header("Cache-Control: public, max-age=3600");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 3600) . " GMT");
?>

/* Simple CSS */
body {
    background-color: #f4f4f4;
    font-family: Arial, sans-serif;
    color: #222;
}

h1 {
    color: #3366ff;
}
