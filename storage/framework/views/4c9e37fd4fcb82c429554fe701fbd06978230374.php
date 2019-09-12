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

                        <form method="GET" action="<?php echo e(route('customers.create')); ?>">
                            <button type="submit" class="btn bg-purple margin">Thêm mới</button>
                        </form>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Mã</th>
                                <th>Tên quán</th>
                                <th>Tên khách hàng</th>
                                <th>Thể loại</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ quán</th>
                                <th>Ghi chú</th>
                                <th>Chỉnh sửa/Xóa</th>
                            </tr>

                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($customer->code); ?></td>
                                    <td><?php echo e($customer->name); ?>  </td>
                                    <td><?php echo e($customer->namecustomer); ?></td>
                                    <td><?php echo e($customer->kind); ?></td>
                                    <td><?php echo e($customer->phone_number); ?></td>
                                    <td><?php echo e($customer->address); ?></td>
                                    <td><?php echo e($customer->note); ?>  </td>

                                    <td>

                                        <form action="<?php echo e(route('customers.edit', $customer)); ?>">
                                            <button  type="submit" class="btn btn-block btn-success btn-xs">Edit</button>
                                        </form>

                                        <form action="<?php echo e(route('customers.destroy', $customer)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit" value="delete" class="btn btn-block btn-danger btn-xs">Delete</button>
                                        </form></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>
                        <?php echo e($customers->links()); ?>

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
<?php echo $__env->make('layouts.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Program Files (x86)\Ampps\www\tamcute\resources\views/customers/index.blade.php ENDPATH**/ ?>