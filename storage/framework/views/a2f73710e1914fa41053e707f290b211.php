<link rel="stylesheet" type="text/css" href="/css/table.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

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
<?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboardsidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboardsidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <div style=" padding:10px; overflow: auto;
    flex: 1 1 auto;
    scrollbar-width: none; /* Firefox */
   -ms-overflow-style: none; /* Internet Explorer and Edge */">
    <style>
      .container::-webkit-scrollbar {
       display: none;
      }
      </style>
<header>
    <h1
        class="text-3xl text-laravel text-center font-bold my-6 uppercase"
    >
        Manage tickets
    </h1>
    
</header>


<table >
   
    <tbody>
        <tr class="table_row">
            <td class='title'>Seats</td>
            <td class='title'>Movie Name</td>
            <td class='title'>Hall ID</td>         
            <td class='title'>Show Time</td>
            <td class='title'>Show Date</td>            
            <td class='title'>Buyer Name</td>
            <td class='title'>Qr Code</td>
            
            


        </tr>
        <?php if (! ($tickets->isEmpty())): ?>
        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr class="table_row">
            <td>
                    <?php echo e($ticket->seats); ?>

            </td>
            <td>
                <?php 
                    $movie=App\Models\Movies::where('id',$ticket->movie_id)->first();  
                ?>
                    <?php echo e($movie->name); ?>

            </td>
            <td>
               <?php echo e($ticket->hall_id); ?>

            </td>
            <td>
                <?php 
                $show=App\Models\Shows::where('id',$ticket->show_id)->first();    
            ?>
                <?php echo e($show->time); ?>

            </td>
            <td >
                <?php echo e(Carbon\Carbon::parse($show->time)->format('d F , Y')); ?>

             
        </td>
        <td >
            <?php 
            $user=App\Models\User::where('id',$ticket->user_id)->first();     
        ?>
                
                <?php echo e($user->name); ?>


        </td>
            <td >
                <?php echo e(QrCode::generate($ticket->qr_code)); ?>

            </td>
           
          
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
               <tr class="table_row">
            <td colspan="9" style="text-align: center">
                <p class="text-center">No Ticket found</p>
            </td>
            </tr> 
           
        <?php endif; ?>
    </tbody>
</table>

</div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/admin/ticket_show.blade.php ENDPATH**/ ?>