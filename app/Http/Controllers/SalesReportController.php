<?php

namespace App\Http\Controllers;

use App\ExportOrder;
use App\ImportOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = ImportOrder::orderBy('created_at', 'desc')->withCount('details')->paginate();
        $order1s = ExportOrder::orderBy('created_at', 'desc')->withCount('details')->paginate();
        $getTotalImport = 0;
        $getTotalExport = 0;
        foreach ($orders as $order){
            $getTotalImport = $getTotalImport + $order->getTotal();
        }
        foreach ($order1s as $order1){
            $getTotalExport = $getTotalExport + $order1->getTotal();
        }

        $version = '1.2';
        $currentPage = 'Báo cáo doanh thu';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
            ];
        return view('salesreport.index',compact('order1s','getTotalExport','getTotalImport','orders','version','currentPage','pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'daterange' => 'nullable',
            'date_min' => 'nullable',
            'date_max' => 'nullable',
        ]);
        $orders = ImportOrder::whereBetween('created_at',[$validatedData['date_min'],$validatedData['date_max']])->withCount('details')->paginate();
        $order1s = ExportOrder::whereBetween('created_at',[$validatedData['date_min'],$validatedData['date_max']])->withCount('details')->paginate();
        $getTotalImport = 0;
        $getTotalExport = 0;
        foreach ($orders as $order){
            $getTotalImport = $getTotalImport + $order->getTotal();
        }
        foreach ($order1s as $order1){
            $getTotalExport = $getTotalExport + $order1->getTotal();
        }


        $version = '1.2';
        $currentPage = 'Báo cáo doanh thu';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('salesreport.index',compact('getTotalImport','getTotalExport','orders','order1s','exports','version','currentPage','pages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
