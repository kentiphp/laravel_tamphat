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

                <form action="{{ route('bills.update',$bill) }}" method="POST" class="form-horizontal">
                    @csrf
                    {!! method_field('patch') !!}
                    <div class="box-body">

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Mã khách hàng</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="code_customer" type="text" value="{{$bill->code_customer}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tên khách hàng</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name_customer" type="text" value="{{$bill->name_customer}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mã hàng</label>
                            <div class="col-sm-10">
                                <input type="text" name="code_commodity" class="form-control" value="{{$bill->code_commodity}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tên hàng</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name_commodity" type="text" value="{{$bill->name_commodity}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Đơn vị tính</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="unit_commodity" type="text" value="{{$bill->unit_commodity}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Giá bán</label>
                            <div class="col-sm-10">
                                <input oninput="intoMoney()" id="price_out" type="number" name="price_out" class="form-control" value="{{$bill->price_out}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Số lượng</label>
                            <div class="col-sm-10">
                                <input oninput="intoMoney()" id="amount" type="number" name="amount" class="form-control"  value="{{$bill->amount}}">
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                        <strong style="color: red">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Thành tiền</label>
                            <div class="col-sm-10">
                                {{--<input type="number" name="into_money" class="form-control" value="" >--}}
                                <select name="into_money"  class="form-control">
                                    <option id="into_money" value="1">{{$bill->into_money}}</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer">
                        <i style="color: green"> Vui lòng điền đầy đủ các mục trên ngoại trừ mục note </i>
                        <button value="{{ __('bills.submit') }}" type="submit" class="btn btn-info pull-right">UPDATE</button>
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
        function intoMoney() {
            var a = document.getElementById("price_out").value;
            var b = document.getElementById("amount").value;
            document.getElementById("into_money").innerHTML = b * a;
        }
    </script>
@endsection