<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiEnterprise;
use Illuminate\Http\Request;

class ApiEnterpriseController extends Controller
{
    public function index(ApiEnterprise $apiEnterprise, Request $request)
    {

        $enterprises = $apiEnterprise->getEnterprises($request->cnpj);

        if (response()->json($enterprises, 200)) {
            return $enterprises;
        }

        return ['status' => 'Error'];
    }
}
