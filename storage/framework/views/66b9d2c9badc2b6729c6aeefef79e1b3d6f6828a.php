<?php $__env->startSection('style'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>s
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <!-- /.box-header -->
                <!-- form start -->

                <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('export.store')); ?>" method="POST" class="form-horizontal" id="createMainForm">
                    <?php echo csrf_field(); ?>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mã Hóa Đơn</label>
                            <div class="col-sm-10">
                                <input type="text" id="code" name="code" class="form-control" required/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tên Quán</label>
                            <div class="col-sm-10">
                                <select onchange="getCustomer(this.value)" class="select2" id="customer_code"
                                        name="customer_code" style="width: 100%;">
                                    <option>~~~~ Chọn Nhà Phân Phối ~~~~</option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->code); ?>"><?php echo e($customer->name); ?>

                                            - <?php echo e($customer->orders_count); ?> đơn hàng
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tên Nhà Phân Phối</label>
                            <div class="col-sm-10">
                                <input type="text" id="customer_name" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">DS Sản Phẩm</label>
                            <div class="col-sm-10">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Mã Sản Phẩm</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Số Lượng</th>
                                        <th>Đơn Giá</th>
                                        <th>Thành Tiền</th>
                                        <th>Lợi nhuận</th>
                                    </tr>
                                    </thead>
                                    <tbody id="whereToAppend">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tổng Cộng</label>
                            <div class="col-sm-10">
                                <input type="text" id="total" value="0 VNĐ" class="form-control" readonly
                                       style="text-align:right;">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="button" onclick="getCommodities($('#customer_code').val())"
                                        class="btn bg-purple" data-toggle="modal" data-target="#addCommodity">+
                                </button>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button value="<?php echo e(__('import.submit')); ?>" type="submit" class="btn btn-info pull-right">Thêm
                            mới
                        </button>
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

<!-- Modal -->
<div id="addCommodity" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm Sản Phẩm Vào Hóa Đơn</h4>
            </div>
            <div class="modal-body">
                <form id="addProductForm">
                    <div class="box-body">
                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Sản Phẩm</label>
                            <div class="col-sm-9">
                                <select onchange="getCommodity(this.value)" class="form-control select2"
                                        id="commodity_code" required></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Tên Sản Phẩm</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="name" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Quy cách đóng gói</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="specifications" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Đơn Vị Tính</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="commodity_unit" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Giá nhập</label>
                            <div class="col-sm-9">
                                <input class="form-control" oninput="myfuntion()" id="entry_price" readonly hidden>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Giá đề xuất bán <span class="text-danger">(VNĐ)</span></label>
                            <div class="col-sm-9">
                                <input class="form-control" id="price_out" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Sản Phẩm/Thùng</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="product_carton" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Tồn kho</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="warehouse" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Ghi Chú</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="note" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Số Lượng</label>
                            <div class="col-sm-9">
                                <input class="form-control" oninput="myfuntion()" id="quantity" type="number" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label">Giá Bán/Đơn Vị</label>
                            <div class="col-sm-9">
                                <input class="form-control" oninput="myfuntion()" id="price" type="number" required/>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-3 control-label">lợi nhuận</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="profit" hidden readonly>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button value="<?php echo e(__('import.submit')); ?>" type="submit" class="btn btn-info pull-right">Thêm
                            mới
                        </button>
                    </div>
                    <!-- /.box-footer -->
                </form>


            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>

        function myfuntion() {
            var entry_price = document.getElementById('entry_price').value;
            var quantity = document.getElementById('quantity').value;
            var price = document.getElementById('price').value;

            document.getElementById('profit').value = (price * quantity) - (entry_price * quantity);

        }

        let total = 0;
        $("#addProductForm").submit(function (event) {
            // console.log(buildHTML());
            $("#whereToAppend").append(buildHTML());
            $("#total").val(formatMoney(total) + " VNĐ");
            $("#addCommodity").modal('toggle');
            $("#addProductForm")[0].reset();
            event.preventDefault();
        });

        let count = 0;

        function buildHTML() {
            let commodityCode = $("#commodity_code").val();
            let profit = $("#profit").val();
            let name = $("#name").val();
            let quantity = $("#quantity").val();
            let price = $("#price").val();
            total += quantity * price;

            let html = '<tr>' +
                '<td><input class="form-control" readonly type="text" name="commodity_code[' + count + ']" value="' + commodityCode + '" /></td>' +
                '<td><input class="form-control" readonly type="text" name="name[' + count + ']" value="' + name + '" /></td>' +
                '<td><input class="form-control" readonly type="text" name="quantity[' + count + ']" value="' + quantity + '" /></td>' +
                '<td><input class="form-control" readonly type="text" name="price[' + count + ']" value="' + price + '" /></td>' +
                '<td><input class="form-control" readonly type="text" value="' + formatMoney(quantity * price) + " VNĐ" + '" /></td>' +
                '<td><input class="form-control" readonly type="text" name="profit[' + count + ']" value="' + profit + '" /></td>' +
                '</tr>';
            count++;
            return html;
        }

        function getCustomer(code) {
            $("#whereToAppend").html("");
            total = 0;
            const url = "<?php echo e(url('api/v1/customer')); ?>/" + code;
            $.ajax({
                url: url,
                cache: false,
                success: function (response) {
                    $("#customer_name").attr('value', response.name);
                },
                error: function (error, xhr, throwError) {
                    console.log(throwError);
                }
            });
        }

        function getCommodities() {
            const url = "<?php echo e(url('api/v1/commodities')); ?>";
            // console.log(url);
            $.ajax({
                url: url,
                cache: false,
                success: function (response) {
                    //
                    let html = '<option>~~~~ Chọn Mặt Hàng ~~~~</option>';
                    for (let i = 0; i < response.length; i++) {
                        html += "<option value='" + response[i].code + "'>" + response[i].name + "</option>";
                    }
                    $("#commodity_code").html(html);
                },
                error: function (error, xhr, throwError) {
                    console.log(throwError);
                }
            });
        }

        function getCommodity(code) {
            let url = "<?php echo e(url('api/v1/commodity')); ?>/" + code;
            $.ajax({
                url: url,
                cache: false,
                success: function (response) {
                    $("#name").attr('value', response.name);
                    $("#specifications").attr('value', response.specifications);
                    $("#commodity_unit").attr('value', response.unit);
                    $("#entry_price").attr('value', response.entry_price);
                    $("#price_out").attr('value', formatMoney(response.price_out));
                    $("#product_carton").attr('value', formatMoney(response.product_carton));
                    $("#warehouse").attr('value', formatMoney(response.warehouse));
                    $("#note").attr('value', response.note);
                },
                error: function (error, xhr, throwError) {
                    console.log(throwError);
                }
            });
        }

        function formatMoney(amount, decimalCount = 0, decimal = ".", thousands = ",") {
            try {
                decimalCount = Math.abs(decimalCount);
                decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

                const negativeSign = amount < 0 ? "-" : "";

                let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
                let j = (i.length > 3) ? i.length % 3 : 0;

                return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
            } catch (e) {
                console.log(e)
            }
        };

        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files (x86)\Ampps\www\laravel_tamphat\resources\views/export/create.blade.php ENDPATH**/ ?>