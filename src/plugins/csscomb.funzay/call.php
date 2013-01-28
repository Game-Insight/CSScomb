<?php
require_once __DIR__ . '/../../csscomb.php';

/* Обертка для вызова CSScomb с сортировкой команды Funzay */
$csscomb  = new csscomb();
$sortOrder = file_get_contents(__DIR__ . '/funzaySortOrder.json');

var_dump(json_decode($sortOrder));

if (is_dir($argv[1]))
    foreach (glob("{$argv[1]}/*.css") as $path)
        $cssfiles[] = $path;

foreach (isset($cssfiles) ? $cssfiles : array($argv[1]) as $path)
    file_put_contents($path, $csscomb->csscomb(
            file_get_contents($path), false, $sortOrder)
    );
