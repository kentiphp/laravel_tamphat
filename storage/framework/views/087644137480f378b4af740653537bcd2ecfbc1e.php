<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh Sách <?php echo e($currentPage); ?></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <a href="<?php echo e(route('export.create')); ?>"><button class="btn bg-purple margin">Thêm Mới</button></a>

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
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($order->code); ?></td>
                                    <td><?php echo e($order->customer->name); ?></td>
                                    <td><?php echo e($order->details_count); ?> sản phẩm</td>
                                    <td><?php echo e(\App\Services\MyHelper::moneyFormating($order->getTotal())); ?></td>
                                    <td><?php echo e($order->created_at->diffForHumans()); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('export.show', $order->code)); ?>"><button class="btn btn-block btn-info btn-xs">Chi Tiết</button></a>
                                        
                                        <form action="<?php echo e(route('export.destroy', $order->code)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit" class="btn btn-block btn-danger btn-xs">Xóa</button>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>
                        <?php echo e($orders->links()); ?>

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
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files (x86)\Ampps\www\tamcute\resources\views/export/index.blade.php ENDPATH**/ ?>