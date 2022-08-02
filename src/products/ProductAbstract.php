<?php

namespace App\products;

abstract class ProductAbstract
{
    public $quality;
    public $sellIn;

    /**
     *Variable de $sellIn que denota el número de días que se tienen para vender el producto
     *Variable de $quality que denota cuán valioso es el producto
     */
    //Constructor
    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

   /**
     * retornamos un arreglo con las variables de configuran el inventario de los productos 
     */
    public function response(): array
    {
        return [
            'quality' => $this->quality,
            'sellIn' => $this->sellIn,
        ];
    }
}