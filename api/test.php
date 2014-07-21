<?php
header('Content-Type: application/json');
$output = system('restartApache.bat');
echo "<pre>$output</pre>";
?>