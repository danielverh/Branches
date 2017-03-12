<?php

/**
 * Created by PhpStorm.
 * User: Daniel Verhoef
 * Date: 12-3-2017
 * Time: 09:55
 */
class Page
{
    function __construct($name)
    {
        $this->name = $name;
    }
    public static function getPath($name)
    {
        return 'pages/' . $name . '.md';
    }
    public function getContent(){
        $Parsedown = new Parsedown();
        return $Parsedown->text(file_get_contents(Page::getPath($this->name)));
    }
}