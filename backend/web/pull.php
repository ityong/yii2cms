<?php

$last_line = exec('git pull', $retval);

echo 'result:';

echo "<pre>";
print_r($retval);

echo "</pre>";

