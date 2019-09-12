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

                        <form method="GET" action="{{ route('suppliers.create')}}">
                            <button type="submit" class="btn bg-purple margin">Thêm mới</button>
                        </form>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>So Luong Hang Hoa</th>
                                <th>So Luong Đơn Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Ghi chú</th>
                                <th>Chỉnh sửa/Xóa</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{$supplier->code }}</td>
                                    <td>{{$supplier->name }}  </td>
                                    <td>{{$supplier->commodities_count }}  </td>
                                    <td>{{$supplier->import_orders_count }}  </td>
                                    <td>{{$supplier->phone_number }}  </td>
                                    <td>{{$supplier->note }}  </td>
                                    <td>

                                        <form action="{{ route('suppliers.edit', $supplier) }}">
                                        <button  type="submit" class="btn btn-block btn-success btn-xs">Edit</button>
                                        </form>

                                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST">
                                            @csrf
                                            {!! method_field('DELETE') !!}
                                            <button type="submit" value="delete" class="btn btn-block btn-danger btn-xs">Delete</button>
                                        </form></td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$suppliers->links()}}
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