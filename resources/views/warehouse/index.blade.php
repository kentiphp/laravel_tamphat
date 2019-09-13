@extends('layouts.layouts')

@section('style')
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh Sách {{$currentPage}}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>Tổng tiền kho còn : {{\App\Services\MyHelper::moneyFormating($sumPriceWarehouse)}}</p>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Nhà Cung Cấp</th>
                                <th>Đơn vị tính</th>
                                <th>Giá nhập</th>
                                <th>Sản phẩm / Thùng</th>
                                <th>Số lượng tồn</th>
                                <th>Tổng tiền tồn</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach ($warehouses as $warehouse)
                                <tr>
                                    <td>{{$warehouse->name }}  </td>
                                    <td>{{$warehouse->supplier->name }}  </td>
                                    <td>{{$warehouse->unit }}</td>
                                    <td>{{\App\Services\MyHelper::moneyFormating($warehouse->entry_price) }}</td>
                                    <td>{{$warehouse->product_carton . ' Sản phẩm/thùng' }}</td>
                                    <td>{{$warehouse->warehouse }}</td>
                                    <td>{{\App\Services\MyHelper::moneyFormating($warehouse->warehouse * $warehouse->entry_price) }}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$warehouses->links()}}
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

@endsection
@section('script')
    <script>
    </script>
@endsection