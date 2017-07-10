<?php

namespace PhotoColorNames\ColorNames;

use PhotoColorNames\PhotoColors\ColorData;

interface iPhotoColorNamesGiver{
    public function getName(ColorData $colorName, array $nameList);
}