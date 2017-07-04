<?php

namespace PhotoColorNames\ColorNames;

class ColorNameFactory
{
    public static function getColorNameMatcher($type)
    {
        switch ($type) {
            case 'NameThatColor':
                return new NameThatColor();
            default:
                throw new \Exception('Color name matcher has not been implemented');
        }
    }
}