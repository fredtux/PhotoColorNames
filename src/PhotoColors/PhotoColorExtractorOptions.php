<?php

namespace PhotoColorNames\PhotoColors;

class PhotoColorExtractorOptions
{
    private $img;
    private $count;
    private $reduce_brightness;
    private $reduce_gradients;
    private $delta;

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getReduceBrightness()
    {
        return $this->reduce_brightness;
    }

    /**
     * @param mixed $reduce_brightness
     */
    public function setReduceBrightness($reduce_brightness)
    {
        $this->reduce_brightness = $reduce_brightness;
    }

    /**
     * @return mixed
     */
    public function getReduceGradients()
    {
        return $this->reduce_gradients;
    }

    /**
     * @param mixed $reduce_gradients
     */
    public function setReduceGradients($reduce_gradients)
    {
        $this->reduce_gradients = $reduce_gradients;
    }

    /**
     * @return mixed
     */
    public function getDelta()
    {
        return $this->delta;
    }

    /**
     * @param mixed $delta
     */
    public function setDelta($delta)
    {
        $this->delta = $delta;
    }

    public function __construct($img, $count = NULL, $reduce_brightness = NULL, $reduce_gradients = NULL, $delta = NULL)
    {
        $this->setImg($img);
        if (!is_null($count)) $this->setCount($count);
        if (!is_null($reduce_brightness)) $this->setReduceBrightness($reduce_brightness);
        if (!is_null($reduce_gradients)) $this->setReduceGradients($reduce_gradients);
        if (!is_null($delta)) $this->setDelta($delta);
    }

    /**
     * Bulk set attributes
     *
     * @param $img
     * @param $count
     * @param $reduce_brightness
     * @param $reduce_gradients
     * @param $delta
     */
    public function setOptions($img, $count, $reduce_brightness, $reduce_gradients, $delta)
    {
        $this->setImg($img);
        $this->setCount($count);
        $this->setReduceBrightness($reduce_brightness);
        $this->setReduceGradients($reduce_gradients);
        $this->setDelta($delta);
    }

    /**
     * Sets default options without setting an image
     */
    public function setDefaultOptions()
    {
        $this->setCount(20);
        $this->setReduceBrightness(true);
        $this->setReduceGradients(true);
        $this->setDelta(16);
    }
}