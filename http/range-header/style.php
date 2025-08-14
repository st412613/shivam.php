<?php
// CSS header
header("Content-Type: text/css");

// Cache this CSS for 1 hour (3600 seconds)
header("Set-Cookie: id=a3fWa; Expires=Thu, 21 Oct 2021 07:28:00 GMT; Secure; HttpOnly");
// header("Expires: " . gmdate("D, d M Y H:i:s", time() + 3600) . " GMT");
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
