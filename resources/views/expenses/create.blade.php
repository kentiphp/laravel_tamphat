@extends('layouts.layouts')

@section('style')
@endsection

@section('content')s
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <!-- /.box-header -->
                    <!-- form start -->

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('expense.store') }}" method="POST" class="form-horizontal">

                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Nội dung chi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="content" class="form-control">
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Số tiền</label>

                                <div class="col-sm-10">
                                    <input type="text" oninput="myfuntion()"  id="price" name="price" class="form-control" >
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Số lượng</label>
                                <div class="col-sm-10">
                                    <input oninput="myfuntion()" id="quantity" type="text" name="quantity" class="form-control"  >
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Tổng</label>
                                <div class="col-sm-10">
                                    <input type="text" id="total" name="total" class="form-control" readonly  >
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Ghi chú</label>
                                <div class="col-sm-10">
                                    <input type="text" name="note" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <i style="color: green"> Vui lòng điền đầy đủ các mục trên ngoại trừ mục Ghi chú </i>
                            <button value="{{ __('expense.submit') }}" type="submit" class="btn btn-info pull-right">Xuất phiếu chi</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>


                </div>
                <!-- /.box -->
                <!-- general form elements disabled -->
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script')
    <script>
            function myfuntion() {
                var price = document.getElementById("price").value;
                var quantity = document.getElementById("quantity").value;
                document.getElementById("total").value = price * quantity;
            }
    </script>
@endsection