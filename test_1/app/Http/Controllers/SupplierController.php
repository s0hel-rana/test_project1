<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function addSuppliser(){

        return view('admin.supplier.supplier');
    }

    public function saveSuppliser(Request $request){
        $supplier = new Supplier();
        $supplier->name =$request->name;
        $supplier->phone_number =$request->phone_number;
        $supplier->code =$request->code;
        $supplier->address =$request->address;
        $supplier->save();
        return redirect()->route('supplier.list');
        // return back()->with('msg','Supplier Added Sucssfully');
    }

    public function manageSuppliser(){
        $suppliers = Supplier::all();
        return view('admin.supplier.supplier_list', compact('suppliers'));
    }

    public function status($id){
        $supplier = Supplier::find($id);
        if ($supplier->status == 1) {
            $supplier->status = 0;
        } else {
            $supplier->status = 1;
        }
        $supplier->save();
        return back();

    }

    public function delete(Request $request){
        $supplier= Supplier::find($request->supplier_id);
        $supplier->delete();
        return back();
    }

    public function edit($id){
        $supplier = Supplier::find($id);
        return view('admin.supplier.supplier_edit',compact('supplier'));
    }

    public function updateSupplier(Request $request){
        $supplier = Supplier::find($request->supplier_id);
        $supplier->name =$request->name;
        $supplier->phone_number =$request->phone_number;
        $supplier->code =$request->code;
        $supplier->address =$request->address;
        $supplier->save();
        return redirect()->route('supplier.list');

    }
}
