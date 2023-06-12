
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
<link rel="stylesheet" href="/css/single.css">
<div class="container">
    <div class="movie_detail">
        <img src="<?php echo e(asset($movie->poster)); ?>" alt="">
        <h5><?php echo e($movie->status); ?></h5>
        <h1><?php echo e($movie->name); ?></h1>
        <h4><?php echo e($movie->duration); ?></h4>
        Description:
        <p><?php echo e($movie->description); ?></p>
        Genre:<?php echo e($movie->genre); ?><br>
        Released On: <?php echo e(Carbon\Carbon::parse($movie->end_date)->format('d F,Y')); ?>

    </div>
    <div class="showtime">
        <?php 
            $shows=App\Models\Shows::where('movie_id',$movie->id)->get();   
            use Carbon\Carbon;
            $today = Carbon::now();
            $tommorow=Carbon::tomorrow();
            $dayaftertom=Carbon::tomorrow()->addDay();
        ?>
        
        <h2>Showtime</h2>
        <div class="date">
            
            <table>
                <tr>
                    <td>
                       <?php echo e(($today)->format('d F')); ?>

                    </td>
                    <?php 
                    $t=0
                    ?>
                    <?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($today->isSameDay(Carbon::parse($show->date))): ?>
                    <?php 
                    $t+=1;
                    ?>
                    <td>
                       <a href="/user/showhall/<?php echo e($show->id); ?>"><?php echo e($show->time); ?> </a> 
                    </td>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if($t==0): ?>
                    <td>
                        No Shows Found for this date
                    </td>  
                    <?php endif; ?>
               
                </tr>
                <tr>
                    <td>
                       <?php echo e(($tommorow)->format('d F')); ?>

                    </td>
                    <?php 
                    $to=0
                    ?>
                    <?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($tommorow->isSameDay(Carbon::parse($show->date))): ?>
                    <?php 
                    $to+=1;
                    ?>
                    <td>
                        <a href="/user/showhall/<?php echo e($show->id); ?>"><?php echo e($show->time); ?> </a> 
                    </td>

                    <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php if($to==0): ?>
               <td>
                   No Shows Found for this date
               </td>  
               <?php endif; ?>
                </tr>
                <tr>
                    <td>
                       <?php echo e(($dayaftertom)->format('d F')); ?>

                    </td>
                    <?php 
                    $d=0
                    ?>
                    <?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($dayaftertom->isSameDay(Carbon::parse($show->date))): ?>
                    <?php 
                    $d+=1;
                    ?>
                    <td>
                        <a href="/user/showhall/<?php echo e($show->id); ?>"><?php echo e($show->time); ?> </a>  
                    </td>
                    <?php endif; ?>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               <?php if($d==0): ?>
               <td>
                   No Shows Found for this date
               </td>  
               <?php endif; ?>
                </tr>
            </table>
            



           
           
        </div>
       
        
    </div>
    
</div>


<?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/movies/show.blade.php ENDPATH**/ ?>