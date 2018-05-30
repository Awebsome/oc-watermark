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

/*

    use \Intervention\Image\ImageManagerStatic as Image;
    use Awebsome\Gallery\Classes\Watermark;
    $watermark = Watermark::getImgLg();

        $watermark = Image::make($watermark);

        $image = File::find(43)->getLocalPath();


        // create new Intervention Image
        $img = Image::make($image);

        // create a new Image instance for inserting

        $result = $img->insert($watermark, 'center');

        // insert watermark at bottom-right corner with 10px offset
        //$img->insert('public/watermark.png', 'bottom-right', 10, 10);
        $result = $img->save($image);

        $print = '<pre>'.json_encode($result, JSON_PRETTY_PRINT).'</pre>';
        return $print;
*/
