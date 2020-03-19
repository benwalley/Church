<?php
define("IFRAME_FILE", __DIR__ . '../../data/iframe.txt');
define("BANNER_ENABLE_FILE", __DIR__ . '../../data/enable.txt');
define("BANNER_CONTENTS_FILE", __DIR__ . '../../data/banner-content.txt');
define("PASSWORD", '!!avX7scJErz3Ka-dhaktLbdLLsW!vyE3kKjWrB387sVHEKtvG6Bfznky8KKGKUo');

/**
 * @param $file
 * @return false|string
 */
function getData($file)
{
    try {
        $iframeFileLocation = $file;
        return file_get_contents($iframeFileLocation);
    }catch (\Exception $exception) {
        return "";
    }
}

/**
 * @param $file
 * @param $data
 * @return string
 */
function setData($file, $data)
{
    try {
        $iframe = fopen($file, "w");
        fwrite($iframe, $data);
    } catch (\Exception $exception) {
        return "";
    }
}

function isBannerEnabled()
{
    $checkValue = getData(BANNER_ENABLE_FILE);
    if (!$checkValue || $checkValue == "off") {
        return false;
    } else {
        return true;
    }
}

function isLive()
{
    $beginDay = 'sun';
    $beginHour = '12';
    $beginMin = '00';
    $endDay = 'sun';
    $endHour = '2';
    $endMin = '00';
}

