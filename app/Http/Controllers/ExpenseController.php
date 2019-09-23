<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::orderBy('id', 'asc')->paginate();
        $version = '1.2';
        $currentPage = 'Phiếu chi';
        $pages = [
            ['name' => 'Expense', 'link' => route('home')]
        ];
        return view('expenses.index', compact('expenses', 'version', 'currentPage', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $version = '1.2';
        $currentPage = 'Xuất phiếu chi';
        $pages = [
            ['name' => 'Expense', 'link' => route('home')]
        ];
        return view('expenses.create', compact('version', 'currentPage', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'note' => 'nullable',
        ]);
        $newexpense = new Expense($validatedData);
        $newexpense->save();
        return redirect(route('expense.index'))->with('status', 'Thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $version = '1.2';
        $currentPage = 'Chỉnh sửa phiếu chi';
        $pages = [
            ['name' => 'Expense', 'link' => route('home')]
        ];
        return view('expense.edit', compact('expense', 'version', 'currentPage', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'total' => 'required',
            'note' => 'nullable',
        ]);
        $expense->update($validatedData);
        $expense->save();
        return redirect(route('expense.index'))->with('status','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        if ($expense->trashed() == false) {
            $expense->delete();
        }

        return redirect(route('expense.index'))->with('status', "Xóa thành công");
    }
}
