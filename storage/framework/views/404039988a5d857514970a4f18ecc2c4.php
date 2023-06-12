<link rel="stylesheet" href="/css/create_movie.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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

    <div class="create_movie_container">
    <div class="container">
        <header>Create Show</header>
        <form method="POST" action="/admin/createshow" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form first">
                <div class="details personal">
                        <span class="title">
                            Movie Show
                        </span>


                        <div class="fields">
                            
                            <div class="input-field">
                                <label for="">Movie Name</label>
                                <select name="movie_id" style="width: 250px" id="movie_id">
                                    <option value="" disabled selected hidden>Movie Name</option>    
                                    <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($movie->id); ?>"  ><?php echo e($movie->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                </select>
                            </div>
                             
                             <div class="input-field">                               
                                <label for="">Hall Name</label>
                                <select name="hall_id" style="width: 250px">
                                    <option value="" disabled selected hidden>Hall Name</option>    

                                
                                <option  value="1" >Theater 1</option>      
                                <option  value="2" >Theater 2</option>       
                                <option  value="3" >Theater 3</option>       

                               
                                </select>
                            </div>
                            
                            <div class="input-field">     
                                <label for="">Show Time</label>
                                <div class="duration">
                                <div class="hrs">                        
                                
                              

                                <select name="hour">
                                    <option value="" disabled selected hidden>Hour</option>    

                                <?php for($i = 00; $i < 25; $i++): ?>
                                <?php
                                    $ii = str_pad($i, 2, '0', STR_PAD_LEFT);
                                ?>
                                <option  value="<?php echo e($ii); ?>" ><?php echo e($ii); ?> </option>       
                                <?php endfor; ?>
                                </select>
                                </div>
                                <div class="min">
                               
                                <select name="min">
                                    <option value="" disabled selected hidden>Minute</option>   
                                    <?php for($i = 00; $i < 61; $i++): ?>
                                    <?php
                                    $ii = str_pad($i, 2, '0', STR_PAD_LEFT);
                                ?>
                                    <option  value="<?php echo e($ii); ?>" ><?php echo e($ii); ?> </option>       
                                    <?php endfor; ?>
                                </select>
                            </div>   
                            </div>
                            </div>
                           
                            <div class="input-field">                                
                                <label for="">Show Date</label>
                                <input name="date" id="date" type="date" min="" max=""/>
                            </div>
                        </div>
                        <button class="submit" type="submit">Create</button>
                </div>                
            </div>
        </form>
    </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
<script type="text/javascript">
$(document).ready(function () {
    $('#movie_id').on('change', function () {
        var movie_id = this.value;
        
        $.ajax({
            url: '<?php echo e(route('moviedetail')); ?>',
            type: 'GET',
            data: { id: movie_id }, 
            success: function (res) {
               
                if (res) { // Check if any movie details were returned
                    $('#date').attr('min', res.release_date);
                    $('#date').attr('max', res.end_date);
                }
            },
            error: function () {
               console.log('error');
            }
        });
    });
});


</script>
<?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/admin/create_show.blade.php ENDPATH**/ ?>