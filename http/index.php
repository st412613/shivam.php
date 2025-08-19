<?php
// Proper headers
header("Accept-CH: DPR, Viewport-Width, Device-Memory");
 // ✅ cache enabled for 1 hour
header("Vary: Cookie, Viewport-Width");        // ✅ inform cache about variation
header("Content-Type: text/html; charset=UTF-8");


// Set cookie if not already set
if (!isset($_COOKIE["username"])) {
    setcookie("username", "shivam", time() + 3600, "/"); // 1 hour
    $message = "Cookie set! Reload the page to read it.";
    
} else {
    $username = htmlspecialchars($_COOKIE["username"]);
    $message = "Welcome back, $username!";
}

// Read client hint
$viewportWidth = isset($_SERVER['HTTP_VIEWPORT_WIDTH']) ? (int)$_SERVER['HTTP_VIEWPORT_WIDTH'] : null;

// Pick image
$image = ($viewportWidth && $viewportWidth > 900) ? './eye.jpg' : './mobile.jpg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie + Client Hints Demo</title>
    <script>
        const serverHints = <?php echo json_encode($_SERVER, JSON_PRETTY_PRINT); ?>;
        console.log("Hints from server:", serverHints);
    </script>
</head>
<body>
    <h1>PHP Cookie + Client Hints Example</h1>
    <p><?php echo $message; ?></p>
    <img src="<?php echo htmlspecialchars($image); ?>" width="100%" alt="shiva" />
</body>
</html>
