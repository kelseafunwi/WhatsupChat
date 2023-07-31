<?php
    define('TIMEZONE', 'Africa/Douala');
    date_default_timezone_set(TIMEZONE);

    function last_seen($date_time) {
        $timestamp = strtotime($date_time);
        
        $timeString = ['second', 'minute', 'hour', 'day', 'month', 'year'];
        $timeRange = [60, 60, 24, 30, 12];
        
        $diff = time() - $timestamp;
        for ($i = 0; $i < count($timeRange) && $diff >= $timeRange[$i]; $i++) {
            $diff = $diff / $timeRange[$i];
        }

        $diff = round($diff);
        if ($diff < 60 && $timeString[$i]  == 'second') {
            $output = 'Active';
            return $output;
            // it defintely remained on seconds
        } else {
            return $diff . " " . $timeString[$i] . "(s) agoa";
        }
    }
?>