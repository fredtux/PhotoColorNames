<?php

namespace PhotoColorNames;

use PhotoColorNames\PhotoColors\iPhotoColorExtractor;
use PhotoColorNames\PhotoColors\PhotoColorExtractorOptions;

class NameColor
{

    ### ATTRIBUTES + GETTERS AND SETTERS ###
    private $photoColor;
    private $photoColorExtractorOptions;

    /**
     * @return mixed
     */
    public function getPhotoColor()
    {
        return $this->photoColor;
    }

    /**
     * @param mixed $photoColor
     */
    public function setPhotoColor($photoColor)
    {
        $this->photoColor = $photoColor;
    }

    /**
     * @return mixed
     */
    public function getPhotoColorExtractorOptions()
    {
        return $this->photoColorExtractorOptions;
    }

    /**
     * @param mixed $photoColorExtractorOptions
     */
    public function setPhotoColorExtractorOptions($photoColorExtractorOptions)
    {
        $this->photoColorExtractorOptions = $photoColorExtractorOptions;
    }
    ### END OF ATTRIBUTES + GETTERS AND SETTERS ###

    ### MAIN METHODS ###
    /**
     * NameColor constructor.
     * @param iPhotoColorExtractor|null $photoColor
     * @param PhotoColorExtractorOptions|null $photoColorExtractorOptions
     */
    public function __construct(iPhotoColorExtractor $photoColor = null, PhotoColorExtractorOptions $photoColorExtractorOptions = null)
    {
        if (!is_null($photoColor)) $this->setPhotoColor($photoColor);
        if (!is_null($photoColorExtractorOptions)) $this->setPhotoColorExtractorOptions($photoColorExtractorOptions);
    }

    /**
     * Get top colors in the photo
     * @param PhotoColorExtractorOptions|null $photoColorExtractorOptions
     * @return mixed
     */
    public function getFrequentlyUsedColors(PhotoColorExtractorOptions $photoColorExtractorOptions = null)
    {
        if (!is_null($photoColorExtractorOptions)) $this->setPhotoColorExtractorOptions($photoColorExtractorOptions);

        $arrColor = $this->getPhotoColor()->getColors($this->getPhotoColorExtractorOptions());

        return $arrColor;
    }

    public function getNameForColorArray(){
        #TODO
    }

    public function getNamesOfFrequentlyUsedColors(iPhotoColorExtractor $photoColor = null, PhotoColorExtractorOptions $photoColorExtractorOptions = null){
        if (!is_null($photoColor)) $this->setPhotoColor($photoColor);
        if (!is_null($photoColorExtractorOptions)) $this->setPhotoColorExtractorOptions($photoColorExtractorOptions);

        $colors = $this->getFrequentlyUsedColors($this->getPhotoColorExtractorOptions());

        #TODO
    }
    ### END OF MAIN METHODS ###

}