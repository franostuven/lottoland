<?php

$data = file_get_contents('https://www.lottoland.com/api/drawings/euroJackpot');

print json_encode($data, JSON_UNESCAPED_UNICODE);
