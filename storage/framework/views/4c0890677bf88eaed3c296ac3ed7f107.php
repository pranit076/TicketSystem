<link rel="stylesheet" href="/css/create_movie.css">

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
        <header>Create Movie</header>
        <form method="POST" action="/admin/create" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form first">
                <div class="details personal">
                        <span class="title">
                            Movie Details
                        </span>


                        <div class="fields">
                            
                            <div class="input-field">
                                <label for="">Movie Name</label>
                                <input name="name" type="text" placeholder="Movie Name" required/>
                            </div>
                             
                             <div class="input-field">                               
                                <label for="">Poster</label>
                                
                                <input type="file" id="poster" class="form-control <?php $__errorArgs = ['poster'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="poster" value="<?php echo e(old('poster')); ?>"  autocomplete="poster" />
                            </div>
                            
                            <div class="input-field">                                
                                <label for="">Release Date</label>
                                <input name="release_date" type="date"/>
                            </div>

                              
                              <div class="input-field">
                                <label for="">End Date</label>
                                <input name="end_date" type="date"/>
                            </div>
                             
                            
                             
                             <div class="input-field">                               
                                <label for="">Description</label>
                                <input name="description" type="text"/>
                            </div>
                            
                            <div class="input-field">     
                                <label for="">Duration</label>
                                <div class="duration">
                                <div class="hrs">                        
                                
                              

                                <select name="hour">
                                    <option value="" disabled selected hidden>Hour</option>    

                                <?php for($i = 0; $i < 25; $i++): ?>
                                <option  value="<?php echo e($i); ?>" ><?php echo e($i); ?> </option>       
                                <?php endfor; ?>
                                </select>
                                </div>
                                <div class="min">
                               
                                <select name="min">
                                    <option value="" disabled selected hidden>Minute</option>   
                                    <?php for($i = 0; $i < 61; $i++): ?>
                                    <option  value="<?php echo e($i); ?>" ><?php echo e($i); ?> </option>       
                                    <?php endfor; ?>
                                </select>
                            </div>   
                            </div>
                        </div>
                        <div class="input-field">
                     
                        <label for="">Genre</label>
                        <div class="genre-container">
                            <?php $genre = ['Action','Animation','Adventure', 'Anime','Biography', 'Comedy','Crime','Drama', 'Experimental' ,'Fantasy','Fiction','Historical', 'Horror', 'Mystery',  'Narrative',  'Romance' ,'Sci-Fi','Thriller',  'Western'  ]; ?>
                            <?php $groupSize = 5; ?>
                            <?php $groups = array_chunk($genre, $groupSize); ?>
                            <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col s3">
                                            <div class="genre">
                                                <input class="form-check-input" name="genre[]"  value="<?php echo e($genre); ?>" type="checkbox" id="<?php echo e($genre); ?>" >
                                                <label class="form-check-label" id="label" for="<?php echo e($genre); ?>"><?php echo e($genre); ?></label>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
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
<?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/admin/create_movie.blade.php ENDPATH**/ ?>