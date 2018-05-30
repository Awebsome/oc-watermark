<?php namespace Awebsome\Watermark\Models;

use Model;
use \Intervention\Image\ImageManagerStatic as ImageManage;

/**
 * Image Model
 */
class Image extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'awebsome_watermark_images';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function beforeDelete()
    {
        if(file_exists($this->path))
        {
            unlink($this->path);
        }
    }

}
