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

                <form action="{{ route('commodities.update', $commodity) }}" method="POST" class="form-horizontal">
                    @csrf
                    {!! method_field('patch') !!}

                    <div class="box-body">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Mã Hàng</label>
                            <div class="col-sm-10">
                                <input type="text" name="code" class="form-control" value="{{$commodity->code ?? ''}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Tên Hàng</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{$commodity->name}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Quy cách</label>
                            <div class="col-sm-10">
                                <input type="text" name="specifications" class="form-control" value="{{$commodity->specifications}}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Đơn vị tính</label>
                            <div class="col-sm-10">
                                <input type="text" name="unit" class="form-control" value="{{$commodity->unit}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Giá nhập</label>
                            <div class="col-sm-10">
                                <input onchange="price(this.value)" id="entry_price" type="text" name="entry_price" class="form-control" value="{{$commodity->entry_price}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Giá đề xuất bán</label>
                            <div class="col-sm-10">
                                <input id="price_out" type="text" name="price_out" class="form-control" value="">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Sản phẩm / thùng</label>
                            <div class="col-sm-10">
                                <input type="text" name="product_carton" class="form-control" value="{{$commodity->product_carton}}">
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
                                <input type="text" name="note" class="form-control" value="{{$commodity->note}}">
                            </div>
                        </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <i style="color: green"> Vui lòng điền đầy đủ các mục trên ngoại trừ mục note </i>
                        <button value="{{ __('commodities.submit') }}" type="submit" class="btn btn-info pull-right">Update</button>
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
        function price(entryPrice) {
            $("#price_out").attr('value', entryPrice * 1.2);
        }
    </script>
@endsection