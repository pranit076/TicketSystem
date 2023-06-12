<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket System</title>
</head>
<body>
   <h1><?php echo e($title); ?></h1>
   <p><?php echo e($body); ?>

    <?php $__currentLoopData = $seats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo e(htmlspecialchars($seat)); ?>,
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br>Total Amount: £<?php echo e($total); ?></p>
    <?php echo e($qr); ?>

   <p>Thank You</p> 
</body>
</html><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/emails/ticket.blade.php ENDPATH**/ ?>