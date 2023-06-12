
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

    <div style="margin-top: 50px;margin-left:50px">
        <h1>Dashboard</h1><br>

    <ul>
        <li class="inside_dashboard">
          <a href="/admin/dashboard" class="iconcontainer">
            <div class="icon-container">
              <i class='bx bxs-tachometer icons'></i>
              <span class="text"> Dashboard</span>
            </div>
          </a>
        </li>
        <li class="inside_dashboard">
            <a href="/admin/manage_movie" class="iconcontainer">
              <div class="icon-container">
                <i class='bx bxs-movie icons'></i>
                <span class="text"> Manage Movie</span>
              </div>
            </a>
          </li>
          <li class="inside_dashboard">
            <a href="/admin/manage_show" class="iconcontainer">
              <div class="icon-container">
                <i class='bx bxs-camera-movie icons' ></i>
                <span class="text"> Manage Show</span>
              </div>
            </a>
          </li>
          <li class="inside_dashboard">
            <a href="/admin/ticket" class="iconcontainer">
              <div class="icon-container">
                <i class='bx bx-receipt icons'></i>
                <span class="text"> Tickets</span>
              </div>
            </a>
          </li>
      
        
        <li class="inside_dashboard">
          <a href="/admin/manage_user" class="iconcontainer">
            <div class="icon-container">
              <i class='bx bx-user icons'></i>
              <span class="text"> Manage User</span>
            </div>
          </a>
        </li>
        
      </ul>
    </div>
    
    <style>
      .inside_dashboard {
        display: inline-block;
        border: 2px solid #3A8891;
        width: 300px;
        height: 150px;
        margin-bottom: 20px;
        margin-right: 20px;
        border-radius: 20px;
      }
    
      .inside_dashboard .iconcontainer {
        display: flex;
        height: 100%;
        justify-content: center;
        align-items: center;
        text-align: center;
        text-decoration: none;
        color: #3A8891;
        border-radius:20px 
        
      }
    
      .icon-container {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
    
      .icons {
        font-size: 2em;
        margin-bottom: 10px;
      }
    
      .icons .text {
        font-size: 25px;
      }
      .inside_dashboard:hover {
    background-color: #3A8891;
  }
  
  .inside_dashboard:hover .iconcontainer {
    color: #fff;
  }
  
  .inside_dashboard:hover .iconcontainer .icons {
    color: #fff;
  }
  
  .inside_dashboard:hover .iconcontainer span {
    color: #fff;
  }
      
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>