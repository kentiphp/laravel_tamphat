<section class="content-header">
    <h1>
        <?php echo e($currentPage ?? 'Dashboard'); ?>

        <small> Version <?php echo e($version ?? '0.1'); ?></small>
    </h1>
    <ol class="breadcrumb">
        <?php if(isset($pages)): ?>
            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e($page['link']); ?>"><i class="fa fa-dashboard"></i> <?php echo e($page['name']); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <li class="active"> <?php echo e($currentPage ?? 'Dashboard'); ?></li>
    </ol>
</section><?php /**PATH C:\Program Files (x86)\Ampps\www\tamcute\resources\views/components/breadcrumb.blade.php ENDPATH**/ ?>