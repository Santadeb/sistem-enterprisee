<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    public function edit($customer_id)
    {
        $customer = Customer::where('customer_id', $customer_id)->firstOrFail();
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, $customer_id)
    {
        $customer = Customer::where('customer_id', $customer_id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:customers,email,' . $customer->customer_id . ',customer_id',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string',
        ]);

        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy($customer_id)
    {
        $customer = Customer::where('customer_id', $customer_id)->firstOrFail();
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer berhasil dihapus.');
    }
}
