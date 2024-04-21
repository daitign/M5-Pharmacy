<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Modules\Product\DataTables\ProductDataTable;
use Modules\Product\Entities\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function expired()
    {
        // Retrieve the expired products from the database
        $expiredProducts = Product::where('expiry_date', '<', now())->get();
    
        return view('expired')->with('expiredProducts', $expiredProducts);
    }

    public function productreport()
    {
        // Retrieve the expired products from the database
        $productreport = Product::where('expiry_date', '<', now())->get();
    
        return view('productreport')->with('productreport', $productreport);
    }

    

public function index(ProductDataTable $dataTable)
{
    abort_if(Gate::denies('access_products'), 403);

    $products = Product::all();

    return $dataTable->render('product::products.index', compact('products'));
}


    public function expiresIn7DaysCount()
    {
        $today = Carbon::today();
        $expiresIn7Days = $today->addDays(7);
    
        // Retrieve the products that expire in 7 days
        $expiresIn7DaysCount = Product::whereBetween('expiry_date', [$today, $expiresIn7Days])->count();
    
        return response()->json(['expiresIn7DaysCount' => $expiresIn7DaysCount]);
    }
    public function prorep()
    {
        $products = Product::all();

        return view('product::products.productRep', compact('products'));
    }

   
     
    

}
