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

                    <form action="{{ route('suppliers.update', $supplier) }}" method="POST" class="form-horizontal">
                        @csrf
                        {!! method_field('patch') !!}

                        <div class="box-body">
                            <div class="form-group">

                                <label for="inputEmail3" class="col-sm-2 control-label">Mã nhà cung cấp</label>
                                <div class="col-sm-10">
                                    <input type="text" name="code" class="form-control"  value="{{ $supplier->code ?? '' }}">
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Tên nhà cung cấp</label>

                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control"  value="{{ $supplier->name ?? '' }}">
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
                                    <input type="number" name="phone_number" class="form-control"  value="{{ $supplier->phone_number ?? '' }}">
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
                                    <input type="text" name="note" class="form-control"  value="{{ $supplier->note ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <i style="color: green"> Vui lòng điền đầy đủ các mục trên ngoại trừ mục note </i>
                            <button  type="submit" class="btn btn-info pull-right">Update</button>
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