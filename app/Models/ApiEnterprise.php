<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Enterprise;

class ApiEnterprise extends Model
{
    public function getEnterprises($cnpj = null){

        if(!$cnpj)
        return Enterprise::all();

      return Enterprise::where('cnpj', 'LIKE', "%$cnpj%")->get();
    }
}
