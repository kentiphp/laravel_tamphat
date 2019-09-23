@extends('layouts.layouts')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection
@section('content')

    <section class="content">
        <div class="box box-info">
            <form action="{{ route('salesreport.store') }}" method="POST" class="form-horizontal">
                @csrf
                <label for="daterangepicker"></label>
                <input type="text" class="daterangepicker_input" id="daterangepicker" name="daterange" value=""/>

                <label for="date_min"></label>
                <input type="text" id="date_min" name="date_min" value="" hidden/>

                <label for="date_max"></label>
                <input type="text" id="date_max" name="date_max" value="" hidden/>

                <button value="{{ __('salesreport.submit') }}" type="submit" class="btn btn-info pull-right">Báo cáo
                </button>
            </form>
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách nhâp hàng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p style="color: green">Tổng : {{ \App\Services\MyHelper::moneyFormating($getTotalImport) }}</p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Công Ty</th>
                        <th>Số Sản Phẩm</th>
                        <th>Thành Tiền</th>
                        <th>Ngày Nhập</th>
                        <th>Chỉnh sửa/Xóa</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->code }}</td>
                            <td>{{ $order->supplier->name }}</td>
                            <td>{{ $order->details_count }} sản phẩm</td>
                            <td>{{ \App\Services\MyHelper::moneyFormating($order->getTotal()) }}</td>
                            <td>{{ $order->created_at->diffForHumans() }}</td>

                            <td>
                                <a href="{{ route('import.show', $order->code) }}">
                                    <button class="btn btn-block btn-info btn-xs">Chi Tiết</button>
                                </a>
                                {{--<a href="{{ route('import.edit', $order) }}"><button class="btn btn-block btn-success btn-xs">Chỉnh Sửa</button></a>--}}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh Sách bán hàng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p style="color: green">Tổng Doanh Thu : {{ \App\Services\MyHelper::moneyFormating($getTotalExport) }}</p>
                <p style="color: green">Tổng Lợi nhuận : {{ \App\Services\MyHelper::moneyFormating($getTotalProfit)  }}</p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Khách Hàng</th>
                        <th>Số Sản Phẩm</th>
                        <th>Thành Tiền</th>
                        <th>Lợi nhuận</th>
                        <th>Ngày Nhập</th>
                        <th>Chỉnh sửa/Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order1s as $order1)
                        <tr>
                            <td>{{ $order1->code }}</td>
                            <td>{{ $order1->customer->name }}</td>
                            <td>{{ $order1->details_count }} sản phẩm</td>
                            <td>{{ \App\Services\MyHelper::moneyFormating($order1->getTotal()) }}</td>
                            <td>{{ \App\Services\MyHelper::moneyFormating($order1->details->sum('profit'))}}</td>
                            <td>{{ $order1->created_at->diffForHumans() }}</td>

                            <td>
                                <a href="{{ route('export.show', $order1->code) }}">
                                    <button class="btn btn-block btn-info btn-xs">Chi Tiết</button>
                                </a>
                                {{--<a href="{{ route('export.edit', $order) }}"><button class="btn btn-block btn-success btn-xs">Chỉnh Sửa</button></a>--}}
                                <form action="{{ route('export.destroy', $order1->code) }}" method="POST">
                                    @csrf
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" class="btn btn-block btn-danger btn-xs">Xóa</button>
                                </form>


                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                {{$order1s->links()}}
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh Sách Chi Tiêu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p style="color: green">Tổng : {{ \App\Services\MyHelper::moneyFormating($expenses->sum('total')) }}</p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nội dung chi</th>
                        <th>Số tiền</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Ngày chi</th>
                        <th>Ghi chú</th>
                        <th>Tùy chọn</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach ($expenses as $expense)
                        <tr>
                            <td>{{$expense->content }}</td>
                            <td>{{$expense->price }}  </td>
                            <td>{{$expense->quantity }}</td>
                            <td>{{$expense->total }}</td>
                            <td>{{$expense->created_at }}</td>
                            <td>{{$expense->note }}</td>

                            <td>

                                <form action="{{ route('expense.edit', $expense) }}">
                                    <button type="submit" class="btn btn-block btn-success btn-xs">Edit</button>
                                </form>

                                <form action="{{ route('expense.destroy', $expense) }}" method="POST">
                                    @csrf
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" value="delete" class="btn btn-block btn-danger btn-xs">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                {{$expenses->links()}}
            </div>
            <!-- /.box-body -->
        </div>


    </section>

@endsection
@section('script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function (start, end) {
                var a = start.format('YYYY-MM-DD');
                var b = end.format('YYYY-MM-DD');
                $("#date_min").attr('value', a);
                $("#date_max").attr('value', b);
            });
        });
    </script>
@endsection