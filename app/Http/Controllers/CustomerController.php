<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('code', 'asc')->paginate();
        $version = '1.2';
        $currentPage = 'Khách hàng';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('customers.index', compact('customers', 'version', 'currentPage', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $version = '1.2';
        $currentPage = 'Khách hàng';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('customers.create', compact('customers', 'version', 'currentPage', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:customers',
            'name' => 'required',
            'namecustomer' => 'required',
            'kind' => 'required',
            'phone_number' =>'required' ,
            'address' =>'required',
            'note' => 'nullable',
        ]);
        $newCustomer = new Customer($validatedData);
        $newCustomer->save();
        return redirect(route('customers.index'))->with('status','Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $version = '1.2';
        $currentPage = 'Khách hàng';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('customers.edit', compact('customer', 'version', 'currentPage', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:customers',
            'name' => 'required',
            'namecustomer' => 'required',
            'kind' => 'required',
            'phone_number' =>'required' ,
            'address' =>'required',
            'note' => 'nullable',
        ]);
        $customer->update($validatedData);
        $customer->save();
        return redirect(route('customers.index'))->with('status','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if ($custommer->trashed() == false) {
            $customer->delete();
        }

        return redirect(route('customers.index'))->with('status', "Xóa thành công");
    }
}
