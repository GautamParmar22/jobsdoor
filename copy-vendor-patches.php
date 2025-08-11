<?php

function rrmdir($src)
{
    if (!file_exists($src)) return;
    $dir = opendir($src);
    while (false !== ($file = readdir($dir))) {
        if ($file != '.' && $file != '..') {
            $full = "$src/$file";
            if (is_dir($full)) {
                rrmdir($full);
            } else {
                unlink($full);
            }
        }
    }
    closedir($dir);
    rmdir($src);
}

function rcopy($src, $dst)
{
    if (is_dir($src)) {
        if (!file_exists($dst)) mkdir($dst, 0755, true);
        $files = scandir($src);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                rcopy("$src/$file", "$dst/$file");
            }
        }
    } else if (file_exists($src)) {
        copy($src, $dst);
    }
}

// Map of [source => destination]
$files = [
    // Example: 'path/to/source' => 'path/to/destination'
    //'libraries/calcinai/xero-php/src/XeroPHP/Application' => 'vendor/calcinai/xero-php/src/XeroPHP/Application',
   
];

foreach ($files as $src => $dst) {
    if (is_dir($src)) {
        rrmdir($dst); // remove existing destination folder
        rcopy($src, $dst);
        echo "Copied folder: $src => $dst\n";
    } elseif (is_file($src)) {
        copy($src, $dst);
        echo "Copied file: $src => $dst\n";
    }
}
