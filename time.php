<?php
date_default_timezone_set("America/New_York");
            $current = new DateTime('now');
            $current_time = $current->format('Y-m-d H:i:s');
echo $current_time;
?>