@extends('layouts.layouts')
@section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection
@section('content')

    <section class="content">
        <form action=""></form>
        <input type="text" onchange="getCommoditydate(this.value)" id="daterangepicker" name="dates" value="" />

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách nhâp hàng</h3>
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


                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>

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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('input[name="dates"]').daterangepicker();
        });

        function getCommoditydate(dates) {
            let url = "{{ url('api/v1/commodity') }}/" + code;
            $.ajax({
                url: url,
                cache: false,
                success: function (response) {
                    $("#name").attr('td', response.name);
                    $("#specifications").getElementById('value', response.specifications);
                    $("#commodity_unit").getElementById('value', response.unit);
                },
                error: function (error, xhr, throwError) {
                    console.log(throwError);
                }
            });
        }
    </script>
@endsection