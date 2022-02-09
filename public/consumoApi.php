<?php


$ruta =  (isset($_POST['ruta'])) ? $_POST['ruta'] : '';


$data = file_get_contents('https://www.lottoland.com/api/drawings/euroJackpot');


print json_encode($res, JSON_UNESCAPED_UNICODE);

/* <?php

$data = file_get_contents('https://www.lottoland.com/api/drawings/euroJackpot');

print json_encode($data, JSON_UNESCAPED_UNICODE);

 */