<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function all_customers()
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
        return response()->json([
            'customers' => $customers
        ]);
    }
}
