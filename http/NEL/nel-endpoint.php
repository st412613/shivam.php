<?php
$report = file_get_contents("php://input");
file_put_contents("nel-log.json", $report . "\n", FILE_APPEND);
http_response_code(204); // No content
?>
