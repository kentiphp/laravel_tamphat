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

                        <form method="GET" action="<?php echo e(route('commodities.create')); ?>">
                            <button type="submit" class="btn bg-purple margin">Thêm mới</button>
                        </form>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên</th>
                                <th>Nhà Cung Cấp</th>
                                <th>Quy cách</th>
                                <th>Đơn vị tính</th>
                                <th>Giá nhập</th>
                                <th>Giá xuất</th>
                                <th>Sản phẩm / Thùng</th>
                                <th>Ghi chú</th>
                                <th>Chỉnh sửa/Xóa</th>
                            </tr>

                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $commodities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commodity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($commodity->code); ?></td>
                                    <td><?php echo e($commodity->name); ?>  </td>
                                    <td><?php echo e($commodity->supplier->name); ?>  </td>
                                    <td><?php echo e($commodity->specifications); ?></td>
                                    <td><?php echo e($commodity->unit); ?></td>
                                    <td><?php echo e($commodity->entry_price); ?></td>
                                    <td><?php echo e($commodity->price_out); ?></td>
                                    <td><?php echo e($commodity->product_carton); ?></td>
                                    <td><?php echo e($commodity->note); ?>  </td>

                                    <td>

                                        <form action="<?php echo e(route('commodities.edit', $commodity)); ?>">
                                            <button  type="submit" class="btn btn-block btn-success btn-xs">Edit</button>
                                        </form>

                                        <form action="<?php echo e(route('commodities.destroy', $commodity)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit" value="delete" class="btn btn-block btn-danger btn-xs">Delete</button>
                                        </form></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>
                        <?php echo e($commodities->links()); ?>

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
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files (x86)\Ampps\www\laravel_tamphat\resources\views/commodities/index.blade.php ENDPATH**/ ?>