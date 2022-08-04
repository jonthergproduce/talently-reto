<?php

namespace App\products;

use App\interfaces\TemplateTick;

class Tumi extends AbstractProduct implements TemplateTick
{
    public function tick(): array
    {
        return $this->responseData();
    }
}