<?php

namespace PhotoColorNames\PhotoColors;

interface iPhotoColorExtractor{
    public function getColors(PhotoColorExtractorOptions $photoColorExtractorOptions);
}