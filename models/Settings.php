<?php namespace Awebsome\Watermark\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'awebsome_watermark_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}
