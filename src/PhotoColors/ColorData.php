<?php

namespace PhotoColorNames\PhotoColors;

class ColorData{
    private $rgb;
    private $frequency;

    /**
     * @return mixed
     */
    public function getRgb () {
        return $this->rgb;
    }

    /**
     * @param mixed $rgb
     */
    public function setRgb ($rgb) {
        $this->rgb = $rgb;
    }

    /**
     * @return mixed
     */
    public function getFrequency () {
        return $this->frequency;
    }

    /**
     * @param mixed $frequency
     */
    public function setFrequency ($frequency) {
        $this->frequency = $frequency;
    }

    public function __construct ($rgb = null, $frequency = null) {
        $this->setRgb($rgb);
        $this->setFrequency($frequency);
    }

    public function rgbIntToHex($red, $green, $blue){
        $this->rgb = '#';
        $this->rgb .= base_convert($red, 10, 16) . base_convert($green, 10, 16) . base_convert($blue, 10, 16);
    }
}