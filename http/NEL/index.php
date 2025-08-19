<?php
// 🔒 Content Security Policy + NEL headers
header("Content-Security-Policy: 
    default-src 'self'; 
    script-src 'self'; 
    connect-src 'self'; 
    media-src 'self'; 
    frame-src https://getbootstrap.com; 
    object-src 'none';
    base-uri 'self';
    form-action 'self';
");

header("Report-To: {\"group\":\"network-errors\",\"max_age\":10886400,\"endpoints\":[{\"url\":\"http://localhost/nel-endpoint.php\"}]}");
header("NEL: {\"report_to\":\"network-errors\",\"max_age\":10886400,\"include_subdomains\":true}");

$file = 'video.mp4';

if (isset($_GET['action']) && $_GET['action'] === 'download') {
    if (!file_exists($file)) {
        header("HTTP/1.1 404 Not Found");
        exit;
    }

    $size = filesize($file);
    $start = 0;
    $end = $size - 1;

    // Max chunk size 500 KB
    $max_chunk = 200;

    if (isset($_SERVER['HTTP_RANGE'])) {
        if (preg_match('/bytes=(\d*)-(\d*)/', $_SERVER['HTTP_RANGE'], $matches)) {
            if ($matches[1] !== '') {
                $start = intval($matches[1]);
            }
            if ($matches[2] !== '') {
                $end = intval($matches[2]);
            }
        }
    }

    if (($end - $start + 1) > $max_chunk) {
        $end = $start + $max_chunk - 1;
    }

    if ($end >= $size) {
        $end = $size - 1;
    }

    if ($start > $end || $start >= $size) {
        header("HTTP/1.1 416 Requested Range Not Satisfiable");
        header("Content-Range: bytes */$size");
        exit;
    }

    header("HTTP/1.1 206 Partial Content");
    header("Content-Range: bytes $start-$end/$size");

    $length = $end - $start + 1;

    header("Content-Type: video/mp4");
    header("Accept-Ranges: bytes");
    header("Content-Length: $length");

    $fp = fopen($file, 'rb');
    fseek($fp, $start);

    while (!feof($fp) && ($pos = ftell($fp)) <= $end) {
        $buffer = ($pos + 8192 > $end) ? ($end - $pos + 1) : 8192;
        echo fread($fp, $buffer);
        flush();
    }

    fclose($fp);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>PHP NEL + Range Request</title>
</head>
<body>

<h1>🎥 Range Streaming with NEL (500KB Chunk)</h1>

<video width="600" controls src="?action=download"></video>

<h2>📦 Fetch Chunk (0–9999999 bytes)</h2>
<button id="fetchRange">Fetch with Range Header</button>
<pre id="output"></pre>

<script>
document.getElementById('fetchRange').addEventListener('click', () => {
    fetch('?action=download', {
        headers: {
            'Range': 'bytes=0-9999999'
        }
    })
    .then(response => {
        if (response.status === 206) {
            return response.arrayBuffer();
        } else {
            throw new Error('Range request failed');
        }
    })
    .then(buffer => {
        document.getElementById('output').textContent = 
            `✔️ Received ${buffer.byteLength} bytes (chunk).`;
    })
    .catch(err => {
        document.getElementById('output').textContent = '❌ Error: ' + err.message;
    });
});
</script>

</body>
</html>
