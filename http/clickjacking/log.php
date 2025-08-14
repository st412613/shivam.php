<?php
file_put_contents("click-log.txt", "[".date("Y-m-d H:i:s")."] Button clicked\n", FILE_APPEND);
