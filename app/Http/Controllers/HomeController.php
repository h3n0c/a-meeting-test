<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        //Return data to the view
        return view('invoices', [
            'title' => 'Liste de Factures',
        ]);
    }

}
