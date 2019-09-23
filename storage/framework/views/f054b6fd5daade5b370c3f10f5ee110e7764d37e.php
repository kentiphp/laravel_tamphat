<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><?php echo e($currentPage); ?> - <?php echo e($export->customer->name); ?></h3>
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
                                <th>Lợi nhuận</th>
                            </tr>

                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $export->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($detail->commodity->name); ?></td>
                                    <td><?php echo e($detail->commodity->unitToString()); ?></td>
                                    <td><?php echo e($detail->quantity); ?></td>
                                    <td><?php echo e(\App\Services\MyHelper::moneyFormating($detail->price)); ?></td>
                                    <td><?php echo e(\App\Services\MyHelper::moneyFormating($detail->getAmount())); ?></td>
                                    <td><?php echo e(\App\Services\MyHelper::moneyFormating($detail->profit)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <script>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files (x86)\Ampps\www\laravel_tamphat\resources\views/export/show.blade.php ENDPATH**/ ?>