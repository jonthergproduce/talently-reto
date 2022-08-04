<?php

namespace App;

use App\sale\SaleBasket;
use Exception;

class VillaPeruana
{
    public $name;
    public $quality;
    public $sellIn;

    public function __construct($name,  $sellIn, $quality)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public static function of($name, $sellIn, $quality): VillaPeruana
    {
        return new static($name,$sellIn, $quality);
    }

    public function tick()
    {
        $saleBasket = new SaleBasket();
        $sale = $saleBasket->make($this->name, $this->sellIn, $this->quality);
        $responseData = $sale->tick();

        $this->sellIn = $responseData['sellIn'] ?? $this->sellIn;
        $this->quality = $responseData['quality'] ?? $this->quality;
    }
}
