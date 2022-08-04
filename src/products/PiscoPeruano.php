<?php

namespace App\products;

use App\interfaces\TemplateTick;

class PiscoPeruano extends AbstractProduct implements TemplateTick
{

    public function tick(): array
    {
        --$this->sellIn;
        if ($this->quality < 50) {
            ++$this->quality;
        }
        if ($this->sellIn < 0 && $this->quality < 50) {
            ++$this->quality;
        }
        return $this->responseData();
    }
}