<?php

namespace App\Http\Controllers;
use App\Models\Sale;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function print($id)
{
    $sale = Sale::findOrFail($id);

    // Return the view for the invoice PDF or HTML
    return view('invoice.print', compact('sale'));
}
}
