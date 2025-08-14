<?php
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
    $max_chunk = 1200000; // bytes

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

    // Adjust end to limit chunk size to max_chunk bytes
    if (($end - $start + 1) > $max_chunk) {
        $end = $start + $max_chunk - 1;
    }

    // Make sure end doesn't exceed file size
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
        if ($pos + 8192 > $end) {
            $buffer = $end - $pos + 1;
        } else {
            $buffer = 8192;
        }
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
<title>Range Request with 500KB Chunk Limit</title>
</head>
<body>

<h1>Range Request with Max 500KB Chunk</h1>

<h2>Video Streaming (auto range request)</h2>
<video width="600" controls src="?action=download"></video>

<h2>JavaScript fetch() with Range Header</h2>
<button id="fetchRange">Fetch bytes 0-9999999 (but server limits 500KB)</button>
<pre id="output"></pre>

<script>
document.getElementById('fetchRange').addEventListener('click', () => {
    fetch('?action=download', {
        headers: {
            'Range': 'bytes=0-9999999' // big range, server limits to 500KB
        }
    })
    .then(response => {
        if (response.status === 206) {
            return response.arrayBuffer();
        } else {
            throw new Error('Range request not supported or failed');
        }
    })
    .then(buffer => {
        document.getElementById('output').textContent = 
            `Received ${buffer.byteLength} bytes (max 500KB chunk).`;
    })
    .catch(err => {
        document.getElementById('output').textContent = 'Error: ' + err.message;
    });
});
</script>

</body>
</html>
