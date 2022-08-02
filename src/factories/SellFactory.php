<?php

namespace App\factories;

use App\products\CafeAltoCusco;
use App\products\NormalProduct;
use App\products\PiscoPeruano;
use App\products\TicketVIPPickFloid;
use App\products\TumiDeOroMoche;
use Exception;

class SellFactory
{
    /**
     *Clase para crear los productos 
     *Retorna todos los productos Tumo, NormalProduct,CafeProduct,TicketsVip y PiscoPeruano
     * Lanza una Exception
     */
    public function initialize($name, $quality, $sellIn)
    {
        $name = str_replace(' ','',ucwords(strtolower($name)));
        switch ($name) {
            case 'PiscoPeruano' :
                return new PiscoPeruano($quality, $sellIn);
                break;
            case 'TicketVipAlConciertoDePickFloid' :
                return new TicketVIPPickFloid($quality, $sellIn);
                break;
            case 'TumiDeOroMoche' :
                return new TumiDeOroMoche($quality, $sellIn);
                break;
            case 'Normal' :
                return new NormalProduct($quality, $sellIn);
                break;
            case 'CaféAltocusco' :
                return new CafeAltoCusco($quality, $sellIn);
                break;
            default:
                throw new \RuntimeException("Not supported");
                break;
        }
    }
}