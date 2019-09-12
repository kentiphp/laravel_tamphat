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

                        <form method="GET" action="{{ route('customers.create')}}">
                            <button type="submit" class="btn bg-purple margin">Thêm mới</button>
                        </form>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên quán</th>
                                <th>Tên khách hàng</th>
                                <th>Thể loại</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ quán</th>
                                <th>Ghi chú</th>
                                <th>Chỉnh sửa/Xóa</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{$customer->code }}</td>
                                    <td>{{$customer->name }}  </td>
                                    <td>{{$customer->namecustomer }}</td>
                                    <td>{{$customer->kind }}</td>
                                    <td>{{$customer->phone_number }}</td>
                                    <td>{{$customer->address }}</td>
                                    <td>{{$customer->note }}  </td>

                                    <td>

                                        <form action="{{ route('customers.edit', $customer) }}">
                                            <button  type="submit" class="btn btn-block btn-success btn-xs">Edit</button>
                                        </form>

                                        <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                                            @csrf
                                            {!! method_field('DELETE') !!}
                                            <button type="submit" value="delete" class="btn btn-block btn-danger btn-xs">Delete</button>
                                        </form></td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$customers->links()}}
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