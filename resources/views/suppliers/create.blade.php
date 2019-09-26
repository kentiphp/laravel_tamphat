@extends('layouts.layouts')

@section('style')
@endsection

@section('content')
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

                    <form action="{{ route('suppliers.store') }}" method="POST" class="form-horizontal">

                        @csrf
                        <div class="box-body">
                            <div class="form-group">

                                <label for="inputEmail3" class="col-sm-2 control-label">Mã</label>
                                <div class="col-sm-10">
                                    <input type="text" name="code" class="form-control" >
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Tên</label>

                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" >
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
                                    <input type="number" name="phone_number" class="form-control"  >
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Note</label>
                                <div class="col-sm-10">
                                    <input type="text" name="note" class="form-control"  placeholder="Ghi chú">
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <i style="color: green"> Vui lòng điền đầy đủ các mục trên ngoại trừ mục note </i>
                            <button value="{{ __('supplier.submit') }}" type="submit" class="btn btn-info pull-right">Thêm mới</button>
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