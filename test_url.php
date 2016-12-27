<?php
/**
 * Created by PhpStorm.
 * User: m_luosu
 * Date: 2016/12/27
 * Time: 18:06
 */

require_once('./MGQrCodeReader/MGQrCodeReader.php');

// test
$urls = [
    'http://ww4.sinaimg.cn/large/a13e4f59gw1fb5juam1duj20a00880to.jpg',
    'http://ww1.sinaimg.cn/large/a13e4f59gw1fb5julnh73j20jf0f00uu.jpg'
];


$MGQrCodeReader = new \MGQrCodeReader\MGQrCodeReader();

foreach($urls as $index=>$url) {

    $stime = microtime(true);
    $smem = convert();

    echo '---------', "\n",'start at: ', $stime, "\n",'start mem: ', $smem, "\n";
    echo $url, "\n";

    echo $MGQrCodeReader->read($url);

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