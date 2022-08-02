<?php

namespace App\products;

use App\interfaces\SellingTemplateInterface;

class NormalProduct extends ProductAbstract implements SellingTemplateInterface
{
    /**
     * Lógica de productos diferentes a Tumi, CafeProduct, TicketsVip y PiscoPeruano
     * Retornamos el arreglo de la clase abstracta response()
     */
    public function tick(): array
    {
        --$this->sellIn;

        if ($this->quality > 0) {
            --$this->quality;
        }
        if ($this->sellIn < 0 && $this->quality > 0) {
            --$this->quality;
        }
        return $this->response();
    }
}