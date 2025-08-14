<?php
// Tell browser to send client hints in future requests
header("Accept-CH: DPR, Viewport-Width, Device-Memory");
header("Vary: Viewport-Width"); // 🔁 Ensure correct caching per viewport

// Set cookie if not already set
if (!isset($_COOKIE["username"])) {
    setcookie("username", "shivam", time() + 3600, "/"); // 1 hour
    $message = "Cookie set! Reload the page to read it.";
} else {
    $username = htmlspecialchars($_COOKIE["username"]); // ✅ sanitize
    $message = "Welcome back, $username!";
}

// Safely read the client hint
$viewportWidth = isset($_SERVER['HTTP_VIEWPORT_WIDTH']) ? (int)$_SERVER['HTTP_VIEWPORT_WIDTH'] : null;

// Select image based on viewport width
if ($viewportWidth && $viewportWidth > 900) {
    $image = './eye.jpg';
} else {
    $image = './mobile.jpg';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie + Client Hints Demo</title>
    <script>
        // Log the entire $_SERVER array
        const serverHints = <?php echo json_encode($_SERVER, JSON_PRETTY_PRINT); ?>;
        console.log("Hints from server:", serverHints);
    </script>
</head>
<body>
    <h1>PHP Cookie + Client Hints Example</h1>
    <p><?php echo $message; ?></p>

    <img  src="<?php echo htmlspecialchars($image); ?>" width = "100%" alt="shiva" />
</body>
</html>
