<?php

$last_line = system('git pull', $retval);

echo "<pre>";

print_r($retval);

echo "</pre>";

