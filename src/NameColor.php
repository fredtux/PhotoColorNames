<?php

namespace PhotoColorNames;

use PhotoColorNames\PhotoColors\iPhotoColor;
use PhotoColorNames\PhotoColors\PhotoColorOptions;

class NameColor
{

    ### ATTRIBUTES + GETTERS AND SETTERS ###
    private $photoColor;
    private $photoColorOptions;

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
    public function getPhotoColorOptions()
    {
        return $this->photoColorOptions;
    }

    /**
     * @param mixed $photoColorOptions
     */
    public function setPhotoColorOptions($photoColorOptions)
    {
        $this->photoColorOptions = $photoColorOptions;
    }
    ### END OF ATTRIBUTES + GETTERS AND SETTERS ###

    ### MAIN METHODS ###
    /**
     * NameColor constructor.
     * @param iPhotoColor|null $photoColor
     * @param PhotoColorOptions|null $photoColorOptions
     */
    public function __construct(iPhotoColor $photoColor = null, PhotoColorOptions $photoColorOptions = null)
    {
        if (!is_null($photoColor)) $this->setPhotoColor($photoColor);
        if (!is_null($photoColorOptions)) $this->setPhotoColorOptions($photoColorOptions);
    }

    /**
     * Get top colors in the photo
     * @param PhotoColorOptions|null $photoColorOptions
     * @return mixed
     */
    public function getFrequentlyUsedColors(PhotoColorOptions $photoColorOptions = null)
    {
        if (!is_null($photoColorOptions)) $this->setPhotoColorOptions($photoColorOptions);

        $arrColor = $this->photoColor->getColor($this->getPhotoColorOptions());

        return $arrColor;
    }
    ### END OF MAIN METHODS ###

}