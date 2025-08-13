<?php
// Set content type
header("Content-Type: text/html");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP CSS Cache Example</title>
    
    <!-- Link CSS file -->
    <link rel="stylesheet" href="style.php?v=1.0"> <!-- `v=1.0` is cache-busting query (optional) -->
</head>
<body>
    <h1>Hello Shivam Bhai 👋</h1>
    <p>This is a PHP page with external CSS.</p>
</body>
</html>
