<?php

namespace PhotoColorNames\ColorNames;

class ColorNamesFactory
{
    public static function getColorNameGiver($type){
        switch($type){
            case 'ntc':
                return new Adapters\NtcAdapter();
            default:
                throw new \Exception('Color name giver has not been implemented');
        }
    }
}