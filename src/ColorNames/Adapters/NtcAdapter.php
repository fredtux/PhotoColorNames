<?php

namespace PhotoColorNames\ColorNames\Adapters;

use PhotoColorNames\ColorNames\iPhotoColorNamesGiver;
use PhotoColorNames\ColorNames\NoComposer\Ntc;
use PhotoColorNames\PhotoColors\ColorData;

class NtcAdapter implements iPhotoColorNamesGiver {
    public function getName(ColorData $colorData, array $nameList){
        $result = null;

        $ntc = new Ntc($nameList);
        $result = $ntc->getName($colorData);

        $result = $result[0]->getName();
        return $result[0];
    }
}