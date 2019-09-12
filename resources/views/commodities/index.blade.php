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

                        <form method="GET" action="{{ route('commodities.create')}}">
                            <button type="submit" class="btn bg-purple margin">Thêm mới</button>
                        </form>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Nhà Cung Cấp</th>
                                <th>Quy cách</th>
                                <th>Đơn vị tính</th>
                                <th>Giá nhập</th>
                                <th>Giá xuất</th>
                                <th>Sản phẩm / Thùng</th>
                                <th>Số lượng tồn</th>
                                <th>Ghi chú</th>
                                <th>Chỉnh sửa/Xóa</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach ($commodities as $commodity)
                                <tr>
                                    <td>{{$commodity->code }}</td>
                                    <td>{{$commodity->name }}  </td>
                                    <td>{{$commodity->supplier->name }}  </td>
                                    <td>{{$commodity->specifications }}</td>
                                    <td>{{$commodity->unit }}</td>
                                    <td>{{$commodity->entry_price }}</td>
                                    <td>{{$commodity->price_out }}</td>
                                    <td>{{$commodity->product_carton }}</td>
                                    <td>{{$commodity->warehouse }}</td>
                                    <td>{{$commodity->note }}  </td>

                                    <td>

                                        <form action="{{ route('commodities.edit', $commodity) }}">
                                            <button  type="submit" class="btn btn-block btn-success btn-xs">Edit</button>
                                        </form>

                                        <form action="{{ route('commodities.destroy', $commodity) }}" method="POST">
                                            @csrf
                                            {!! method_field('DELETE') !!}
                                            <button type="submit" value="delete" class="btn btn-block btn-danger btn-xs">Delete</button>
                                        </form></td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$commodities->links()}}
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