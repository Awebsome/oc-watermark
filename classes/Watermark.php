<?php namespace Awebsome\Watermark\Classes;

use Log;
use Storage;
use Config;
use Awebsome\Watermark\Models\Settings as Conf;
use Awebsome\Watermark\Models\Image as ImageModel;

use \Intervention\Image\ImageManagerStatic as Image;
/**
 * watermark
 */
class Watermark
{
    /**
     * make
     * ===============================================
     * crear imagen con marca de agua
     */
    public static function make($img = null, $size = 'large')
    {
        $watermark = Self::getWatermark($size);
        $image = @$img->getLocalPath();

        if($watermark && $image)
        {
            if(file_exists($image))
            {

                return Self::getMarkedImage($img, $size);

            }else return ['error' => 'Image does exists'];

        }
    }


    /**
     * getImage
     * ===============================================
     * Obtener imagen de marca de agua a utilizar
     */
    public static function getWatermark($watermark = null)
    {
        $img = null;
        $watermark = strtolower($watermark);

        // param => config field.
        $sizes = [
            'small' => 'watermark_sm',
            'large' => 'watermark_lg',
        ];

        if(isset($sizes[$watermark]))
        {
            $img = Conf::get($sizes[$watermark]);
            $img = public_path().Config::get('cms.storage.media.path').$img;

            if(file_exists($img))
                return $img;
            else return null;
        }
    }


    /**
     * getMarkedImage
     * ==============================================================
     * @param $img  object source image. ( ImageModel )
     */
    public static function getMarkedImage($img, $size)
    {
        # Imagen original ( local path )
        $source_path    = $img->getLocalPath();
        $disk_name      = $img->disk_name;
        $extension      = $img->extension;

        # Watermark
        $watermark      = Self::getWatermark($size);    # image to paste in
        $wm_file_name   = 'watermark_'.bin2hex(random_bytes(6)).'_'.$size.'.'.$extension;
        $new_file       = str_replace($disk_name, $wm_file_name, $source_path);


        $markedImg = ImageModel::where('src_id', $img->id)
            ->where('size', $size)->first();

        if(!$markedImg)
        {
            # Imagen original
            $wImg = Image::make($source_path);

            # Watermark
            $iWatermark = Image::make($watermark);

            # Insertar Watermark
            $wImg->insert($iWatermark, 'center');

            #Crear nueva imagen
            $wImg->save($new_file);

            /**
             * Save in ImageModel.
             */
            $newImage = new ImageModel;
            $newImage->src_id = $img->id;
            $newImage->path = $new_file;
            $newImage->disk_name = $wm_file_name;
            $newImage->size = $size;
            //$newImage->properties = ;
            $newImage->save();

            // Log::info("new watermark created: ".$new_file);

            $public_file = str_replace($disk_name, $wm_file_name, $img->path);

        }else {
            $public_file = str_replace($disk_name, $markedImg->disk_name, $img->path);
        }

        return [
            //'src'       => $img,
            'src_path'  => $img->path,
            'watermark' => $watermark,
            'image'     => $public_file
        ];
    }

}
