<?php namespace Awebsome\Watermark;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Awebsome\Watermark\Components\Watermark' => 'Watermark'
        ];
    }

    public function register()
    {
        $this->registerConsoleCommand('awebsome.watermark', 'Awebsome\Watermark\Console\Clear');
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => 'Watermark',
                'description' => 'Watermark configuration',
                'category'    => 'system::lang.system.categories.system',
                'icon'        => 'icon-certificate',
                'class'       => 'Awebsome\Watermark\Models\Settings',
                'keywords'    => 'awebsome gallery Watermark',
                'permissions' => ['awebsome.watermark.settings']
            ]
        ];
    }
}
