<?php

namespace PhotoColorNames;

use PhotoColorNames\ColorNames\iPhotoColorNamesGiver;
use PhotoColorNames\PhotoColors\iPhotoColorExtractor;
use PhotoColorNames\PhotoColors\PhotoColorExtractorOptions;

class NameColor
{

    ### ATTRIBUTES + GETTERS AND SETTERS ###
    private $photoColor;
    private $photoColorExtractorOptions;
    private $nameGiver;
    private $nameList;

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

    /**
     * @return mixed
     */
    public function getNameGiver()
    {
        return $this->nameGiver;
    }

    /**
     * @param mixed $nameGiver
     */
    public function setNameGiver($nameGiver)
    {
        $this->nameGiver = $nameGiver;
    }

    /**
     * @return mixed
     */
    public function getNameList()
    {
        return $this->nameList;
    }

    /**
     * @param mixed $nameList
     */
    public function setNameList($nameList)
    {
        $this->nameList = $nameList;
    }
    ### END OF ATTRIBUTES + GETTERS AND SETTERS ###

    ### MAIN METHODS ###
    /**
     * NameColor constructor.
     * @param iPhotoColorExtractor|null $photoColor
     * @param PhotoColorExtractorOptions|null $photoColorExtractorOptions
     * @param iPhotoColorNamesGiver|null $nameGiver
     * @param array|null $nameList
     */
    public function __construct(iPhotoColorExtractor $photoColor = null, PhotoColorExtractorOptions $photoColorExtractorOptions = null, iPhotoColorNamesGiver $nameGiver = null, array $nameList = null)
    {
        if (!is_null($photoColor)) $this->setPhotoColor($photoColor);
        if (!is_null($photoColorExtractorOptions)) $this->setPhotoColorExtractorOptions($photoColorExtractorOptions);
        if (!is_null($nameGiver)) $this->setNameGiver($nameGiver);
        if (!is_null($nameList)) $this->setNameList($nameList);
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

    /**
     * Get the closest name for an array of ColorData objects
     * @param array $aColors
     * @param iPhotoColorNamesGiver $nameGiver
     * @param array $nameList
     * @return array
     */
    public function getNameForColorArray(array $aColors, iPhotoColorNamesGiver $nameGiver, array $nameList)
    {
        foreach ($aColors as $key => $color) {
            $color->setName($nameGiver->getName($color, $nameList));
            $aColors[$key] = $color;
        }

        return $aColors;
    }

    /**
     * Get the names of the most frequent colors in a file
     * @param iPhotoColorExtractor|null $photoColor
     * @param PhotoColorExtractorOptions|null $photoColorExtractorOptions
     * @param iPhotoColorNamesGiver|null $nameGiver
     * @param array|null $nameList
     * @return array|mixed
     */
    public function getNamesOfFrequentlyUsedColors(iPhotoColorExtractor $photoColor = null, PhotoColorExtractorOptions $photoColorExtractorOptions = null, iPhotoColorNamesGiver $nameGiver = null, array $nameList = null)
    {
        if (!is_null($photoColor)) $this->setPhotoColor($photoColor);
        if (!is_null($photoColorExtractorOptions)) $this->setPhotoColorExtractorOptions($photoColorExtractorOptions);
        if (!is_null($nameGiver)) $this->setNameGiver($nameGiver);
        if (!is_null($nameList)) $this->setNameList($nameList);

        $colors = $this->getFrequentlyUsedColors($this->getPhotoColorExtractorOptions());
        $colors = $this->getNameForColorArray($colors, $this->nameGiver, $this->nameList);

        return $colors;
    }

    ### END OF MAIN METHODS ###

}