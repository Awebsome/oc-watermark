<?php namespace Awebsome\Watermark\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Images Back-end Controller
 */
class Images extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Awebsome.Watermark', 'watermark', 'images');
    }
}
