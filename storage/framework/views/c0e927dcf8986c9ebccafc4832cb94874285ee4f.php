<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="content">
        <div class="box box-info">
            <form action="<?php echo e(route('salesreport.store')); ?>" method="POST" class="form-horizontal">
                <?php echo csrf_field(); ?>
                <label for="daterangepicker"></label>
                <input type="text" class="daterangepicker_input" id="daterangepicker" name="daterange" value=""/>

                <label for="date_min"></label>
                <input type="text" id="date_min" name="date_min" value="" hidden/>

                <label for="date_max"></label>
                <input type="text" id="date_max" name="date_max" value="" hidden/>

                <button value="<?php echo e(__('salesreport.submit')); ?>" type="submit" class="btn btn-info pull-right">Báo cáo
                </button>
            </form>
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách nhâp hàng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p style="color: green">Tổng : <?php echo e(\App\Services\MyHelper::moneyFormating($getTotalImport)); ?></p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Công Ty</th>
                        <th>Số Sản Phẩm</th>
                        <th>Thành Tiền</th>
                        <th>Ngày Nhập</th>
                        <th>Chỉnh sửa/Xóa</th>
                    </tr>

                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->code); ?></td>
                            <td><?php echo e($order->supplier->name); ?></td>
                            <td><?php echo e($order->details_count); ?> sản phẩm</td>
                            <td><?php echo e(\App\Services\MyHelper::moneyFormating($order->getTotal())); ?></td>
                            <td><?php echo e($order->created_at->diffForHumans()); ?></td>

                            <td>
                                <a href="<?php echo e(route('import.show', $order->code)); ?>">
                                    <button class="btn btn-block btn-info btn-xs">Chi Tiết</button>
                                </a>
                                

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
            </div>
            <!-- /.box-body -->
        </div>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh Sách Xuất hàng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p style="color: green">Tổng : <?php echo e(\App\Services\MyHelper::moneyFormating($getTotalExport)); ?></p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Mã Đơn</th>
                        <th>Khách Hàng</th>
                        <th>Số Sản Phẩm</th>
                        <th>Thành Tiền</th>
                        <th>Ngày Nhập</th>
                        <th>Chỉnh sửa/Xóa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $order1s; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order1->code); ?></td>
                            <td><?php echo e($order1->customer->name); ?></td>
                            <td><?php echo e($order1->details_count); ?> sản phẩm</td>
                            <td><?php echo e(\App\Services\MyHelper::moneyFormating($order1->getTotal())); ?></td>
                            <td><?php echo e($order1->created_at->diffForHumans()); ?></td>

                            <td>
                                <a href="<?php echo e(route('export.show', $order1->code)); ?>"><button class="btn btn-block btn-info btn-xs">Chi Tiết</button></a>
                                
                                <form action="<?php echo e(route('export.destroy', $order1->code)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit" class="btn btn-block btn-danger btn-xs">Xóa</button>
                                </form>


                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>

                </table>
                <?php echo e($order1s->links()); ?>

            </div>
            <!-- /.box-body -->
        </div>


    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function (start, end) {
                var a = start.format('YYYY-MM-DD');
                var b = end.format('YYYY-MM-DD');
                $("#date_min").attr('value', a);
                $("#date_max").attr('value', b);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files (x86)\Ampps\www\laravel_tamphat\resources\views/salesreport/index.blade.php ENDPATH**/ ?>