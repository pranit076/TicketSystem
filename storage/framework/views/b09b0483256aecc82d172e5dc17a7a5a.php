<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/adminsidebar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
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
   <nav class="sidebar">
        <header>
            <div class="text header-text">
                <span class="name">Online Ticket</span>
              
            </div>  
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="/admin/dashboard">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                   
                    <li class="nav-link">
                        <a href="/admin/manage_movie">
                            <i class='bx bxs-movie icon'></i>
                            <span class="text nav-text">Manage Movie</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/admin/manage_show">
                            <i class='bx bxs-camera-movie icon' ></i>
                            <span class="text nav-text">Manage Show</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/admin/ticket">
                            <i class='bx bx-receipt icon'></i>
                            <span class="text nav-text">Ticket</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/admin/manage_user">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Manage User</span>
                        </a>
                    </li>

                   
                </ul>
            </div>
            <div class="bottom-content">
                <li class="" >
                    <form action="/logout/user" method="post">
                        <?php echo csrf_field(); ?>
                    <button type="submit" style="cursor: pointer;">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </button>
                </li>
            </form>
            </div>
        </div>
    </nav> 
    <main class="home">
       <?php echo e($slot); ?>

    </main>
    <script src="/js/adminsidebar.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/components/dashboardsidebar.blade.php ENDPATH**/ ?>