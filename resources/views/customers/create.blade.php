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

                    <form action="{{ route('customers.store') }}" method="POST" class="form-horizontal">

                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Mã {{$currentPage}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="code" class="form-control">
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Tên quán</label>

                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control"  >
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Tên {{$currentPage}}</label>
                                <div class="col-sm-10">
                                    <input type="text" name="namecustomer" class="form-control"  >
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Thể loại</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kind" class="form-control"  >
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Số điện thoại</label>
                                <div class="col-sm-10">
                                    <input id="entry_price" type="text" name="phone_number" class="form-control">
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" class="form-control" value="">
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
                            <button value="{{ __('customers.submit') }}" type="submit" class="btn btn-info pull-right">Thêm mới</button>
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
    </script>
@endsection