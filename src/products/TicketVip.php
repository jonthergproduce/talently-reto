<?php

namespace App\products;

use App\interfaces\TemplateTick;

class TicketVip extends AbstractProduct implements TemplateTick
{

    public function tick(): array
    {
        if ($this->quality < 50) {
            ++$this->quality;

            if ($this->sellIn < 11 && $this->quality < 50) {
                ++$this->quality;
            }
            if ($this->sellIn < 6 && $this->quality < 50) {
                ++$this->quality;
            }
        }

        --$this->sellIn;

        if ($this->sellIn < 0) {
            $this->quality -= $this->quality;
        }

        return $this->responseData();
    }
}