<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomersController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Customers',
            'customers' => Customer::all(),
            'method' => 'POST',
            'route' => route('customers.store'),
        ];
        return view('customers.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add Customers',
            'method' => 'POST',
            'route' => route('customers.store')
        ];
        return view('inputan', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_ID' => 'required|min:4|numeric',
            'name' => 'required|min:3',
            'address' => 'required',
            'phone' => 'required|min:11|numeric'
        ]);

        Customer::create([
            'CustomerID' => $request->customer_ID,
            'name_customer' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        notify()->success('Successfully added data');
        return redirect()->route('customers.index')->with(['success']);
    }

    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();

        return response()->json(
            [
                'status' => 200,
                'customer' => $customer
            ]
        );
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'CustomerID' => 'required|min:4|numeric',
            'name' => 'required|min:3',
            'address' => 'required',
            'phone' => 'required|min:11|numeric'
        ]);

        // Cari customer berdasarkan ID
        $customer = Customer::find($request->get('id'));

        // Jika customer tidak ditemukan
        if (!$customer) {
            notify()->error('Customer not found');
            return redirect()->route('customers.index')->with(['error' => 'Customer not found']);
        }

        // Update data customer
        $customer->id = $request->get('id');
        $customer->CustomerID = $request->CustomerID;
        $customer->name_customer = $request->name;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->updated_at = now();
        $customer->save();

        notify()->success('Successfully updated data');
        return redirect()->route('customers.index')->with('success', 'Data has been updated');
    }


    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        notify()->success('Successfully deleted data');
        return redirect()->route('customers.index')->with(['success']);
    }
}
