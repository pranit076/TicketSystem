<link rel="stylesheet" href="/css/home.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flash-message','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flash-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

   <div class="holder">
        <h1>Now Showing</h1><span><?php echo e($nowshowingc); ?> Movies</span>
        <div class="nowcontainer">
        <?php $__currentLoopData = $nowshowing; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $now): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       
           
           
                
               
                <a href="/user/movie/<?php echo e($now->id); ?>" > <img src="<?php echo e(asset($now->poster)); ?>"  alt="..."></a>
               
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


        <h1>Coming Soon</h1><span><?php echo e($comingsoonc); ?> Movies</span>
        <div class="comingsoon">
        <?php $__currentLoopData = $comingsoon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       
           
            
                
                <a href="/user/movie/<?php echo e($soon->id); ?>" > <img src="<?php echo e(asset($soon->poster)); ?>" alt="..." ></a>
             
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>



<?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/dashboard.blade.php ENDPATH**/ ?>