<?php

namespace App\products;

abstract class AbstractProduct
{
    public $sellIn;
    public $quality;

    public function __construct($sellIn, $quality)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function responseData(): array
    {
        return [
            'sellIn' => $this->sellIn,
            'quality' => $this->quality

        ];
    }
}