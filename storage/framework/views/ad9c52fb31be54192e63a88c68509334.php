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
        Manage Users
    </h1>
    
</header>
<h3 class="total_count">Total Users:  &nbsp;<?php echo e($total_users); ?></h3>
<?php if($users->hasPages()): ?>
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
<?php if($users->onFirstPage()): ?>
<li class="page-item disabled">
    <a class="page-link" href="#" 
       tabindex="-1">Previous</a>
</li>
<?php else: ?>
<li class="page-item"><a class="page-link" 
    href="<?php echo e($users->previousPageUrl()); ?>">
          Previous</a>
  </li>
<?php endif; ?>

<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(is_string($user)): ?>
<li class="page-item disabled"><?php echo e($user); ?></li>
<?php endif; ?>

<?php if(is_array($user)): ?>
<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($page == $users->currentPage()): ?>
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

<?php if($users->hasMorePages()): ?>
<li class="page-item">
    <a class="page-link" 
       href="<?php echo e($users->nextPageUrl()); ?>" 
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
            <td class='title'>Email</td>
            <td class='title'>Joined On</td>
            <td class='title'>Updated At</td>
            <td class='title'>Action</td>
            


        </tr>
        <?php if (! ($users->isEmpty())): ?>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr class="table_row">
            <td>
                    <?php echo e($user->id); ?>

            </td>
            <td>
                    <?php echo e($user->name); ?>

            </td>
            <td>
                    <?php echo e($user->email); ?>

            </td>
            <td >
                    <?php echo e($user->created_at->format('d F , Y')); ?>

            </td>
            <td >
                    <?php echo e($user->updated_at->format('d F , Y')); ?>

            </td>
            <td  >
                <?php if($user->status==1): ?>
                <a  class="detail" href="/admin/block/<?php echo e($user->id); ?>/<?php echo e(2); ?>" ><button class="block"><i class='bx bx-block'></i>Block</button></a> 
               <?php else: ?>
                <a  class="detail" href="/admin/block/<?php echo e($user->id); ?>/<?php echo e(1); ?>" ><button class="unblock"><i class='bx bx-check'></i>UnBlock</button></a> 
                <?php endif; ?>      
                <form method="POST" action="/admin/delete/<?php echo e($user->id); ?>">
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
                <p class="text-center">No User found</p>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/admin/manage_user.blade.php ENDPATH**/ ?>