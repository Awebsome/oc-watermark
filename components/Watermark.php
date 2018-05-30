<?php namespace Awebsome\Watermark\Components;

use Cms\Classes\ComponentBase;
use Awebsome\Watermark\Classes\Watermark as WatermarkHelper;

class Watermark extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Watermark',
            'description' => ''
        ];
    }

    public function make($image = null, $type = 'large')
    {
        $result = WatermarkHelper::make($image, $type);

        return $result;
    }

    public function defineProperties()
    {
        return [];
    }
}
