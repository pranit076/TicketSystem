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
        Manage Movies
    </h1>
    <span class="add"><a href="/admin/create_movie"><i class='bx bx-movie movie' ></i><i class='bx bx-plus-medical plus'></i></a></span>
    
</header>
<h3 class="total_count">Total movies:  &nbsp;<?php echo e($total_movies); ?></h3>
<?php if($movies->hasPages()): ?>
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
<?php if($movies->onFirstPage()): ?>
<li class="page-item disabled">
    <a class="page-link" href="#" 
       tabindex="-1">Previous</a>
</li>
<?php else: ?>
<li class="page-item"><a class="page-link" 
    href="<?php echo e($movies->previousPageUrl()); ?>">
          Previous</a>
  </li>
<?php endif; ?>

<?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(is_string($movie)): ?>
<li class="page-item disabled"><?php echo e($movie); ?></li>
<?php endif; ?>

<?php if(is_array($movie)): ?>
<?php $__currentLoopData = $movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($page == $movies->currentPage()): ?>
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

<?php if($movies->hasMorePages()): ?>
<li class="page-item">
    <a class="page-link" 
       href="<?php echo e($movies->nextPageUrl()); ?>" 
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
            <td class='title'>Id</td>
            <td class='title'>Name</td>
            <td class='title'>Poster</td>         
            <td class='title'>Duration</td>
            <td class='title'>Release Date</td>
            <td class='title'>End Date</td>            
            <td class='title'>Created On</td>
            <td class='title'>Updated At</td>
            <td class='title'>Action</td>
            


        </tr>
        <?php if (! ($movies->isEmpty())): ?>
        <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr class="table_row">
            <td>
                    <?php echo e($Movie->id); ?>

            </td>
            <td>
                    <?php echo e($Movie->name); ?>

            </td>
            <td>
                   <img src="<?php echo e(asset( $Movie->poster)); ?>" alt="" style="height: 100px;width:150px">
            </td>
            <td>
                <?php echo e($Movie->duration); ?>

            </td>
            <td >
                
                 <?php echo e(Carbon\Carbon::parse($Movie->release_date)->format('d F , Y')); ?>

        </td>
        <td >
                
                <?php echo e(Carbon\Carbon::parse($Movie->end_date)->format('d F , Y')); ?>


        </td>
            <td >
                    <?php echo e($Movie->created_at->format('d F , Y')); ?>

            </td>
            <td >
                    <?php echo e($Movie->updated_at->format('d F , Y')); ?>

            </td>
            <td  >
                <a  class="detail" href="/admin/edit_movie/<?php echo e($Movie->id); ?>" ><button class="edit"><i class='bx bx-edit'></i>Edit</button></a> 
                <form method="POST" action="/admin/delete/<?php echo e($Movie->id); ?>">
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
                <p class="text-center">No Movie found</p>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/admin/manage_movie.blade.php ENDPATH**/ ?>