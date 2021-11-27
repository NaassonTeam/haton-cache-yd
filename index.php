<?php
$key = 'page_' . md5('https://haton.ru' . $_SERVER['REQUEST_URI']);
$html = file_get_contents('page_0a90f7e091d6ba352959853bf9621035');
echo $html;
