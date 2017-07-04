<?php

namespace PhotoColorNames\Colors;

#TODO
/**
 * rgb si hsl = clase care sa aiba ambele convert to <->
 * metoda pentru preluarea codului rgb
 */

class Color{
    private $rgb;
    private $hsl;

    /**
     * @return mixed
     */
    public function getRgb()
    {
        return $this->rgb;
    }

    /**
     * @param mixed $rgb
     */
    public function setRgb($rgb)
    {
        $this->rgb = $rgb;
    }

    /**
     * @return mixed
     */
    public function getHsl()
    {
        return $this->hsl;
    }

    /**
     * @param mixed $hsl
     */
    public function setHsl($hsl)
    {
        $this->hsl = $hsl;
    }

    public function __construct($color, $type){
        switch($type){
            case 'hsl':
                $this->setHsl($color);
                $this->setRgb($this->hslTorgb($color));
                break;
            case 'rgb':
                $this->setRgb($color);
                $this->setHsl($this->rgbTohsl($color));
                break;
            default:
                throw new \Exception('Unrecognized color type');
        }
    }

    /**
     * @param $rgb
     * @return string
     */
    private function rgbTohsl($rgb){
        $hsl = '';
#TODO
        return $hsl;
    }

    /**
     * @param $hsl
     * @return string
     */
    private function hslTorgb($hsl){
        $rgb = '';
#TODO
        return $rgb;
    }
}