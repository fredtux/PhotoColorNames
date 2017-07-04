<?php

namespace PhotoColorNames\PhotoColors\Adapters;

use ColorThief\ColorThief;
use PhotoColorNames\PhotoColors;

class ColorThiefAdapter implements PhotoColors\iPhotoColorExtractor {
    public function getColors(PhotoColors\PhotoColorExtractorOptions $photoColorExtractorOptions){
        $result = array();

        $palette = ColorThief::getPalette($photoColorExtractorOptions->getImg(), $photoColorExtractorOptions->getCount());

        foreach($palette as $colors){
            $color = new PhotoColors\ColorData();
            $color->rgbIntToHex($colors[0], $colors[1], $colors[2]);
            $result[] = $color;
        }

        return $result;
    }
}