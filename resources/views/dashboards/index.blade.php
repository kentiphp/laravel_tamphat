@extends('layouts.layouts')
@section('style')

@endsection
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Những quán đã lâu chưa nhập hàng</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Mã khách hàng</th>
                                <th>Tên quán</th>
                                <th>Tên khách hàng</th>
                                <th>Thể loại</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Ghi chú</th>
                                <th>lần nhận cuối</th>
                            </tr>

                            @foreach($exports as $export)
                                @php
                                    $a = 0;
                                    $customer = \App\Customer::where('code',$export->customer_code)->first();
                                @endphp
                                <tr>
                                    <td>{{ $customer->code }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->namecustomer }}</td>
                                    <td>{{ $customer->kind }}</td>
                                    <td>{{ $customer->phone_number }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->note }}</td>
                                    <td>{{ $export->created_at }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
    </script>
@endsection