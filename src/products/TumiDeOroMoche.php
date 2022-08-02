<?php

namespace App\products;

use App\interfaces\SellingTemplateInterface;

class TumiDeOroMoche extends ProductAbstract implements SellingTemplateInterface
{
    /**
     *Los productos Tumi, siendo un producto legendario, nunca debe ser vendido o bajaría su Quality
     * Retornamos el arreglo de la clase abstracta response()
    */
    public function tick(): array
    {
        return $this->response();
    }
}