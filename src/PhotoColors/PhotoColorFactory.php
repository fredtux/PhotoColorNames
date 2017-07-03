<?php

namespace PhotoColorNames\PhotoColors;

class PhotoColorFactory
{
    public static function getColorExtractor($type){
        switch($type){
            case 'GetMostCommonColors':
                return new GetMostCommonColors();
            default:
                throw new \Exception('Color extractor has not been implemented');
        }
    }
}