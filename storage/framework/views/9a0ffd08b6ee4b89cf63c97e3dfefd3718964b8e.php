<!-- jQuery 3 -->
<script src="<?php echo e(asset('bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('bower_components/jquery-ui/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>















<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo e(asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo e(asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('bower_components/fastclick/lib/fastclick.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('js/adminlte.min.js')); ?>"></script>
<!-- DataTables -->

<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('js/demo.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>



<script>
    <?php if(session('status')): ?>
    Swal.fire({
        title: 'Thành Công!',
        text: "<?php echo e(session('status')); ?>",
        type: 'success',
        confirmButtonText: 'OKE!'
    })
    <?php endif; ?>
    <?php if(session('error')): ?>
    Swal.fire({
        title: 'Thất bại!',
        text: "<?php echo e(session('error')); ?>",
        type: 'error',
        confirmButtonText: 'OK!'
    })
    <?php endif; ?>


    })

</script>
<?php /**PATH C:\Program Files (x86)\Ampps\www\laravel_tamphat\resources\views/components/script.blade.php ENDPATH**/ ?>