<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function supplierView()
    {
        $suppliers = Supplier::all();
        return view('admin.supplier.view', compact('suppliers'));
    }
    public function supplierAdd()
    {
        return view('admin.supplier.add');
    }
}
