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
        Manage shows
    </h1>
    <span class="add"><a href="/admin/create_show"><i class='bx bx-camera-movie movie' ></i><i class='bx bx-plus-medical plus'></i></a></span>
    
</header>
<h3 class="total_count">Total shows:  &nbsp;<?php echo e($total_shows); ?></h3>
<?php if($shows->hasPages()): ?>
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
<?php if($shows->onFirstPage()): ?>
<li class="page-item disabled">
    <a class="page-link" href="#" 
       tabindex="-1">Previous</a>
</li>
<?php else: ?>
<li class="page-item"><a class="page-link" 
    href="<?php echo e($shows->previousPageUrl()); ?>">
          Previous</a>
  </li>
<?php endif; ?>

<?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(is_string($show)): ?>
<li class="page-item disabled"><?php echo e($show); ?></li>
<?php endif; ?>

<?php if(is_array($movie)): ?>
<?php $__currentLoopData = $movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($page == $shows->currentPage()): ?>
<li class="page-item active">
    <a class="page-link"><?php echo e($page); ?></a>
</li>
<?php else: ?>
<li class="page-item">
    <a class="page-link" 
       href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
</li>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if($shows->hasMorePages()): ?>
<li class="page-item">
    <a class="page-link" 
       href="<?php echo e($shows->nextPageUrl()); ?>" 
       rel="next">Next</a>
</li>
<?php else: ?>
<li class="page-item disabled">
    <a class="page-link" href="#">Next</a>
</li>
<?php endif; ?>
</ul>
</nav>
<?php endif; ?>
<table >
   
    <tbody>
        <tr class="table_row">
            <td class='title'>Movie Name</td>
            <td class='title'>Theater Id</td>         
            <td class='title'>Show Time</td>
            <td class='title'>Date</td>
            <td class='title'>Day</td>            
            <td class='title'>Created On</td>
            <td class='title'>Updated At</td>
            <td class='title'>Action</td>
           


        </tr>
        <?php if (! ($shows->isEmpty())): ?>
        <?php $__currentLoopData = $shows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr class="table_row">
            <td>
                <?php
                    $movie=App\Models\Movies::where('id',$show->movie_id)->first();    
                ?>
                    <?php echo e($movie->name); ?>

            </td>
            <td>
                    <?php echo e($show->hall_id); ?>

            </td>
           
            <td>
                <?php echo e($show->time); ?>

            </td>
            <td >
                
                 <?php echo e(Carbon\Carbon::parse($show->date)->format('d F , Y')); ?>

        </td>
        <td >
                
                <?php echo e($show->day); ?>


        </td>
            <td >
                    <?php echo e($show->created_at->format('d F , Y')); ?>

            </td>
            <td >
                    <?php echo e($show->updated_at->format('d F , Y')); ?>

            </td>
            <td  >
                <a  class="detail" href="/admin/edit_show/<?php echo e($show->id); ?>" ><button class="edit"><i class='bx bx-edit'></i>Edit</button></a> 
                <form method="POST" action="/admin/deleteshow/<?php echo e($show->id); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                   <br> <button type="submit" class="delete"><i class='bx bx-trash'></i>DELETE</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
               <tr class="table_row">
            <td colspan="9" style="text-align: center">
                <p class="text-center">No show found</p>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/admin/manage_show.blade.php ENDPATH**/ ?>