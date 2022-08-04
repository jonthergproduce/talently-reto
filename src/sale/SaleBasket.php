<?php

namespace App\sale;

use App\products\CafeProduct;
use App\products\NormalProduct;
use App\products\PiscoPeruano;
use App\products\TicketVip;
use App\products\Tumi;
use Exception;

class SaleBasket
{

    public function make($name,  $sellIn, $quality)
    {
        switch ($name) {
            case 'Café Altocusco' :
                return new CafeProduct($quality, $sellIn);
                break;
            case 'normal' :
                return new NormalProduct($quality, $sellIn);
                break;
            case 'Pisco Peruano' :
                return new PiscoPeruano($quality, $sellIn);
                break;
            case 'Ticket VIP al concierto de Pick Floid' :
                return new TicketVip($quality, $sellIn);
                break;
            case 'Tumi de Oro Moche' :
                return new Tumi($quality, $sellIn);
                break;
            default:
                throw new \RuntimeException("Not supported");
                break;
        }
    }
}