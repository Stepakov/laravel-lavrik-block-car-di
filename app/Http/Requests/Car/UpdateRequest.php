<?php

namespace App\Http\Requests\Car;

class UpdateRequest extends StoreRequest
{
    protected function uniqueVin()
    {
        return parent::uniqueVin()->ignore( $this->car->id );
    }
}
