<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use PDF;

class ProductsController extends Controller
{
    //
    public function dataproduk_admin(Request $request)
    {
        if ($request->has('search')) {
            $data = Products::where('name', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Products::paginate(5);
        }
        return view('Products.dataproduk', compact('data'));
    }

    public function tambahdataproduk_admin()
    {
        return view('Products.tambahdataproduk');
    }

    public function insertdataproduk_admin(Request $request)
    {
        Products::create($request->all());
        return redirect('/dataproduk_admin')->with('success', 'Product added successfully .');
    }

    public function editdataproduk_admin($id)
    {
        $data = Products::find($id);
        return view('Products.tampildataproduk', compact('data'));
    }

    public function updatedataproduk_admin(Request $request, $id)
    {
        $data = Products::find($id);
        $data->update($request->all());
        return redirect('/dataproduk_admin')->with('success', 'Products edited successfully .');
    }

    public function deletedataproduk_admin($id)
    {
        $data = Products::find($id);
        $data->delete();
        return redirect('/dataproduk_admin')->with('success', 'Products deleted successfully .');
    }

    public function exportpdf()
    {
        $data = Products::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('Products.dataproduk-pdf_admin');
        return $pdf->download('data_products.pdf');
    }
}
