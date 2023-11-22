<?php

namespace App\Http\Requests\Brand;

class UpdateRequest extends StoreRequest
{
    protected function uniqueTitle()
    {
        return parent::uniqueTitle()->ignore( $this->brand->id );
    }
}
