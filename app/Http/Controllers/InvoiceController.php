<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Input;

class InvoiceController extends Controller
{

    public function index()
    {
        $query = Invoice::query()->withTotal();

        ;
        //Retrieve input "filter"
        $filter = Input::get('filter');

        if(\request()->has('numero')){
            $num = request()->input('numero');
            $query->where('numero', 'like' , "%$num%");
        }

        $itemPerPage = request()->input('itemPerPage');

        $query = $query->paginate($itemPerPage);

        return response()->json($query);
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
    }
}
