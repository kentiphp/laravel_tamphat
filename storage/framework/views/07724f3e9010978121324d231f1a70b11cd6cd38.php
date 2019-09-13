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
                        <p>Tổng tiền kho còn : <?php echo e(\App\Services\MyHelper::moneyFormating($sumPriceWarehouse)); ?></p>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Tên</th>
                                <th>Nhà Cung Cấp</th>
                                <th>Đơn vị tính</th>
                                <th>Giá nhập</th>
                                <th>Sản phẩm / Thùng</th>
                                <th>Số lượng tồn</th>
                                <th>Tổng tiền tồn</th>
                            </tr>

                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($warehouse->name); ?>  </td>
                                    <td><?php echo e($warehouse->supplier->name); ?>  </td>
                                    <td><?php echo e($warehouse->unit); ?></td>
                                    <td><?php echo e(\App\Services\MyHelper::moneyFormating($warehouse->entry_price)); ?></td>
                                    <td><?php echo e($warehouse->product_carton . ' Sản phẩm/thùng'); ?></td>
                                    <td><?php echo e($warehouse->warehouse); ?></td>
                                    <td><?php echo e(\App\Services\MyHelper::moneyFormating($warehouse->warehouse * $warehouse->entry_price)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>
                        <?php echo e($warehouses->links()); ?>

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
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files (x86)\Ampps\www\laravel_tamphat\resources\views/warehouse/index.blade.php ENDPATH**/ ?>