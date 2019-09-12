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
                        <a href="{{ route('export.create') }}"><button class="btn bg-purple margin">Thêm Mới</button></a>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Mã Đơn</th>
                                <th>Khách Hàng</th>
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
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->details_count }} sản phẩm</td>
                                    <td>{{ \App\Services\MyHelper::moneyFormating($order->getTotal()) }}</td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>

                                    <td>
                                        <a href="{{ route('export.show', $order->code) }}"><button class="btn btn-block btn-info btn-xs">Chi Tiết</button></a>
                                        {{--<a href="{{ route('export.edit', $order) }}"><button class="btn btn-block btn-success btn-xs">Chỉnh Sửa</button></a>--}}
                                        <form action="{{ route('export.destroy', $order->code) }}" method="POST">
                                            @csrf
                                            {!! method_field('DELETE') !!}
                                            <button type="submit" class="btn btn-block btn-danger btn-xs">Xóa</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$orders->links()}}
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