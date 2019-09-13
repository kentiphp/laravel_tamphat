<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="content">

        <input type="text" id="daterangepicker" name="dates" value="" />

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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript">
        $(function() {

            $('input[name="dates"]').daterangepicker();


        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files (x86)\Ampps\www\laravel_tamphat\resources\views/salesreport/index.blade.php ENDPATH**/ ?>