<?php
// Split an array into chunks of 5 elements each
$chunks = array_chunk(range(1,25), 5);
echo count($chunks); // 5
