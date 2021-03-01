<?php

namespace App\Http\Models;

use App\Http\Models\Base;

class Project extends Base
{
    public $engteam = ['In House','JDM','ODM','Design House','Commercial'];
    public $format = ['Tablet','Smart Home','AR/VR'];

    public function getFormatAttribure(){
        return $this->format[$this->format];
    }
}
