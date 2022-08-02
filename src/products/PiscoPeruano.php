<?php

namespace App\products;

use App\interfaces\SellingTemplateInterface;

class PiscoPeruano extends ProductAbstract implements SellingTemplateInterface
{
    /**
     * Los productos PiscoPeruano, en realidad, incrementan en Quality mientras más viejos están
     * Retornamos el arreglo de la clase abstracta response()
    */
    public function tick(): array
    {
        --$this->sellIn;
        if ($this->quality < 50) {
            ++$this->quality;
        }
        if ($this->sellIn < 0 && $this->quality < 50) {
            ++$this->quality;
        }
        return $this->response();
    }
}