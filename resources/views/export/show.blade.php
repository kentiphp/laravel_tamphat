@extends('layouts.layouts')
@section('style')

@endsection
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{$currentPage}} - {{ $export->customer->name }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <th>Đơn Vị Tính</th>
                                <th>Số Lượng</th>
                                <th>Đơn Giá</th>
                                <th>Thành Tiền</th>
                                <th>Chỉnh sửa/Xóa</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach ($export->details as $detail)
                                <tr>
                                    <td>{{ $detail->commodity->name }}</td>
                                    <td>{{ $detail->commodity->unitToString() }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ \App\Services\MyHelper::moneyFormating($detail->price) }}</td>
                                    <td>{{ \App\Services\MyHelper::moneyFormating($detail->getAmount()) }}</td>

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
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