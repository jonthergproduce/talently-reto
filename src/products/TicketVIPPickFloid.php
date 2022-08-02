<?php

namespace App\products;

use App\interfaces\SellingTemplateInterface;

class TicketVIPPickFloid extends ProductAbstract implements SellingTemplateInterface
{

    /**
     *Los TicketsVip, así como "Pisco Peruano", incrementan su Quality conforme su SellIn se acerca a 0 
     *El Quality incrementa en 2 cuando faltan 10 días o menos y en 3 cuando faltan 5 días o menos 
     *El Quality disminuye a 0 después del concierto.
     *Retornamos el arreglo de la clase abstracta response()
     */
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

        return $this->response();
    }
}