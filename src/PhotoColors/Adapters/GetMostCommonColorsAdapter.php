<?php

namespace PhotoColorNames\PhotoColors\Adapters;

use PhotoColorNames\PhotoColors\NoComposer;
use PhotoColorNames\PhotoColors;

class GetMostCommonColorsAdapter implements PhotoColors\iPhotoColorExtractor
{
    public function getColors (PhotoColors\PhotoColorExtractorOptions $photoColorExtractorOptions) {
        $result = array();

        $getMostCommonColors = new NoComposer\GetMostCommonColors();

        $palette = $getMostCommonColors->getColor($photoColorExtractorOptions);
        foreach($palette as $colorCode => $frequency){
            $color = new PhotoColors\ColorData();
            $color->setRgb('#' . $colorCode);
            $color->setFrequency($frequency);

            $result[] = $color;
        }

        return $result;
    }
}