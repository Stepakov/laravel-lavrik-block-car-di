<?php

namespace App\Services\AddressParser;

use Dadata\DadataClient;

class DadataParser implements ParserInterface
{
    public function __construct( protected DadataClient $dadata )
    {

    }

    public function clean(string $address ) : array
    {
        return $this->dadata->clean( 'address', $address );
    }
}
