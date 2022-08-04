<?php

namespace App\products;

use App\interfaces\TemplateTick;

class CafeProduct extends AbstractProduct implements TemplateTick
{

    public function tick(): array
    {
        if ($this->quality > 0) {
            $this->quality -= 2;

            if ($this->sellIn === 0) {
                $this->quality -= 2;
            } elseif ($this->sellIn < 0) {
                $this->quality -= 2;
            }
        }
        --$this->sellIn;
        return $this->responseData();
    }
}