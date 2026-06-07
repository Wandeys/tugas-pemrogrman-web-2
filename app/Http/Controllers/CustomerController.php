<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('customer.index', [
            'title' => 'Customer',
            'customers'=> Customer::latest()->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create', ['title' => 'Create Customer']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => ['required','max:255'],
        'email' => ['required','email'],
        'phone' => ['required','numeric'],
        'address' => ['required','max:255'],
        'join_date' => ['required','date'],
        'gender'=>['required', 'in:Male,Female']
    ],[
        'name.required'=> 'Nama tidak boleh kosong',
        'name.max'=> 'Nama tidak boleh lebih dari :max karakter',
        'email.required'=> 'Email tidak boleh kosong',
        'email.email'=> 'Email tidak valid',
        'phone.required'=> 'Phone tidak boleh kosong',
        'phone.numeric'=> 'Phone harus berupa angka',
        'address.required'=> 'Address tidak boleh kosong',
        'join_date.required'=> 'Join Date tidak boleh kosong',
        'join_date.date'=> 'Join Date tidak valid',
        'gender.required'=>'Gender tidak boleh kosong',
        'gender.in:Male,Female'=>'Pilih salah satu Male atau Female',

    ]);
 
  Customer::create( $validated );
  return to_route('customer.index')->withSuccess('Customer berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', [
            'title' => 'Edit Customer',
            'customer'=> $customer,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
 
        $validated = $request->validate([
        'name' => ['required','max:255'],
        'email' => ['required','email'],
        'phone' => ['required','numeric'],
        'address' => ['required','max:255'],
        'join_date' => ['required','date'],
        'gender'=>['required','in:Male,Female'],
    ],[
        'name.required'=> 'Nama tidak boleh kosong',
        'name.max'=> 'Nama tidak boleh lebih dari :max karakter',
        'email.required'=> 'Email tidak boleh kosong',
        'email.email'=> 'Email tidak valid',
        'phone.required'=> 'Phone tidak boleh kosong',
        'phone.numeric'=> 'Phone harus berupa angka',
        'address.required'=> 'Address tidak boleh kosong',
        'join_date.required'=> 'Join Date tidak boleh kosong',
        'join_date.date'=> 'Join Date tidak valid',
        'gender.required'=>'Gender tidak boleh kosong',
        'gender.in:Male,Female'=>'Pilih salah satu Male atau Female',
    ]);
 
$customer->update( $validated );
  return to_route('customer.index')->withSuccess('Data customer berhasil diubah');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
$customer->delete( $customer );
  return to_route('customer.index')->withSuccess('Data customer berhasil dihapus');
    }

//soft deletes
public function trash()
    {
         return view('customer.trash', [
            'title' => 'Trash Customer ',
            'customers'=> Customer::onlyTrashed()->latest()->get(),
            ]);
    }


public function restore(Customer $customer)
    {
$customer->restore();
  return to_route('customer.trash')->withSuccess('Data customer berhasil dikembalikan');
    }

public function forceDelete(Customer $customer)
    {
$customer->forceDelete();
  return to_route('customer.trash')->withSuccess('Data customer berhasil dihapus secara permanent');
    }


}
