
<?php if(Session::has('message')): ?>
<script>

  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.success("<?php echo e(session('message')); ?>");
    </script>
  <?php endif; ?>

  <?php if(Session::has('error')): ?>
<script>

  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.error("<?php echo e(session('error')); ?>");
    </script>
  <?php endif; ?>

  <?php if(Session::has('info')): ?>
<script>

  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.info("<?php echo e(session('info')); ?>");
    </script>
  <?php endif; ?>

  <?php if(Session::has('warning')): ?>
<script>

  toastr.options =
  {
  	"closeButton" : true,
  	"progressBar" : true
  }
  		toastr.warning("<?php echo e(session('warning')); ?>");
    </script>
  <?php endif; ?><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/components/flash-message.blade.php ENDPATH**/ ?>