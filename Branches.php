<?php

/**
 * Created by PhpStorm.
 * User: Daniel Verhoef
 * Date: 12-3-2017
 * Time: 09:50
 */
require_once 'Parsedown.php';
require_once 'Page.php';

class Branches
{
    function __construct()
    {
        $raw_json = file_get_contents('branches.json');
        $this->json = json_decode($raw_json, true);
    }

    public function getPage($name)
    {
        if ($name === null) {
            return $this->getHomepage();
        } else {
            foreach (scandir('pages') as $file) {
                if (is_file('pages/' . $file)) {
                    if ($file === $name . ".md") {
                        return new Page($name);
                    }
                }
            }
        }
        return new Page('404');
    }

    public function getHomepage()
    {
        return new Page('index');
    }

    public function getRPages()
    {
        return $this->json["pages"];
    }
}