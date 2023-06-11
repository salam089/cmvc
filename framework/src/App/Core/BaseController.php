<?php
namespace App\Core;
use Jenssegers\Blade\Blade;

class BaseController
{
    public $views, $cache;
    public function __construct($request,$data=null)
    {
        $this->views = __DIR__ . '/../../views';
        $this->cache = __DIR__ . '/cache';
    }

    function render_template()
    {

       return $blade = new Blade($this->views,  $this->cache);
       
    }
}