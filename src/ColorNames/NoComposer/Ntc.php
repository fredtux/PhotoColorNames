<?php
/**
 * Ported from: http://chir.ag/projects/ntc/
 * Licensed under Creative Commons 2.5: https://creativecommons.org/licenses/by/2.5/
 */

namespace PhotoColorNames\ColorNames\NoComposer;

use PhotoColorNames\PhotoColors\ColorData;

class Ntc
{
    private $names;

    /**
     * @return mixed
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param mixed $names
     */
    public function setNames($names)
    {
        $this->names = $names;
    }

    public function __construct(array $names)
    {
        $this->setNames($names);

        foreach ($this->names as $code => $name) {
            $color = new ColorData(array('type' => 'rgb', 'color' => $code));
            $this->names[$code][] = $color->getRgb();
            $color->rgbToHsl();
            $this->names[$code][] = $color->getHsl();
        }
    }

    public function getName(ColorData $color)
    {
        $color->rgbToHsl();
        $rgb = $color->getRgb();

        $ndf1 = 0;
        $ndf2 = 0;
        $ndf = 0;
        $cl = -1;
        $df = -1;

        foreach ($this->names as $code => $name) {
            if ($rgb == $code) return array($code, $name, true);

            $currColor = new ColorData(array('type' => 'rgb', 'color' => $code));
            $currColor->rgbToHsl();

            $ndf1 = pow($color->getRedInt() - $currColor->getRedInt(), 2)
                + pow($color->getGreenInt() - $currColor->getGreenInt(), 2)
                + pow($color->getBlueInt() - $currColor->getBlueInt(), 2);
            $ndf2 = pow($color->getHue() - $currColor->getHue(), 2)
                + pow($color->getSaturation() - $currColor->getSaturation(), 2)
                + pow($color->getLightness() - $currColor->getLightness(), 2);
            $ndf = $ndf1 + $ndf2 * 2;

            if ($df < 0 || $df > $ndf) {
                $df = $ndf;
                $cl = $currColor;
                $cl->setName($name);
            }
        }

        if (is_int($cl) && $cl == -1) {
            return array('#000000', 'Invalid Color :' . $color->getRgb(), false);
        } else {
            return array($cl, false);
        }
    }
}