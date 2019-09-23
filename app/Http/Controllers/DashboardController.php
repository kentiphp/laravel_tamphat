<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\ExportOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sevendaysago  = mktime(0, 0, 0, date("m")  , date("d")-7, date("Y"));
        $oneday  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
        $date_min = date("Y-m-d",$sevendaysago);
        $date_max = date("Y-m-d",$oneday);

        $exports = ExportOrder::whereNotBetween('created_at',[$date_min,$date_max])->get();


        $version = '1.2';
        $currentPage = 'Theo dõi khách hàng';
        $pages = [
            ['name' => 'Dashboard', 'link' => route('home')]
        ];
        return view('dashboards.index', compact('exports', 'version', 'currentPage', 'pages'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
