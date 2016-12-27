<?php
/**
 * Created by PhpStorm.
 * User: m_luosu
 * Date: 2016/12/27
 * Time: 18:06
 */

require_once('./MGQrCodeReader/MGQrCodeReader.php');

// test
$img_path = './image/';

$dir = scandir($img_path);
$ignoredFiles = [
    '.',
    '..'
];
$MGQrCodeReader = new \MGQrCodeReader\MGQrCodeReader();

foreach($dir as $index=>$file) {
    if(in_array($file, $ignoredFiles)) continue;

    $stime = microtime(true);
    $smem = convert();

    echo '---------', "\n",'start at: ', $stime, "\n",'start mem: ', $smem, "\n";
    echo $file, "\n";

    echo $MGQrCodeReader->read($img_path. $file);

    $etime = microtime(true);
    $emem = convert();
    echo "\n",
    'end at: ',$etime, "\n",
    'end mem: ',$emem, "\n",
    'cost time: ', number_format(($etime-$stime), 6, '.', '').' seconds', "\n",
    '---------', "\n";
}

function convert(){
    $size = memory_get_usage(true);
    $unit=array('b','kb','mb','gb','tb','pb');
    return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
}