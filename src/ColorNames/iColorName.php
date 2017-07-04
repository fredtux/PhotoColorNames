<?php

namespace PhotoColorNames\ColorNames;

use PhotoColorNames\Colors\Color;

interface iColorName
{
    public function getName(Color $color);
}