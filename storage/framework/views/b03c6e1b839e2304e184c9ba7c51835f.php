
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="/css/buy_ticket.css">
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
<div class="container">
    <div class="details">
    <h6> Name:<?php echo e(auth()->user()->name); ?></h6>
    <h6>Email:<?php echo e(auth()->user()->email); ?></h6>
    <?php 
    $movie=App\Models\Movies::where('id',$shows->movie_id)->first();
    ?>
    <h6>Movie Name:<?php echo e($movie->name); ?></h6>
    <h6>Date:<?php echo e($shows->date); ?></h6>
    <h6>Day:<?php echo e($shows->day); ?></h6>
    <h6>Show Time:<?php echo e($shows->time); ?></h6>
    <h6> Duration:<?php echo e($movie->duration); ?>   </h6>
    <h6>Theater No:<?php echo e($shows->hall_id); ?></h6>
    
   <?php 
   $seat_details = json_decode($seat_details);
   $total=0;
   $totalseats=0;
   ?>
<div class="ticket">
<table>
    <tr>
        <th>S.N</th>
        <th>Seats</th>
        <th>Price</th>
    </tr>
    <?php $__currentLoopData = $seat_details->seats_no; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $seat_no): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <?php  
            $totalseats+=1; 
            $total+= $seat_details->seat_prices[$i]   ;
        ?>
        <td><?php echo e($i+1); ?></td>
        <td><?php echo e($seat_no); ?></td>
 <td>£<?php echo e($seat_details->seat_prices[$i]); ?></td>
    </tr>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
            <b>
            TOTAL</b>
        </td>
        <td>
            <b><?php echo e($totalseats); ?></b>
        </td>
        <td>
            <b> £ <?php echo e($total); ?></b>
        </td>
    </tr>
</table>



</div>
</div>

<div class="card_detail">
<form method="POST" action="/user/buy_ticket/<?php echo e($shows->id); ?>">
        <?php echo csrf_field(); ?>
        <label for="cardholder_name">Cardholder Name</label><br>
        <input name="cardholder_name" type="text" required><br>
        <label for="card_type">Card Type</label><br>
        <select name="card_type" style="width: 200px" id="movie_id" required>
            <option value="" disabled selected hidden>--- Select ---</option>    
           
            <option value="Master_Card">Master Card</option>
            <option value="Credit_Card">Credit Card</option>
 
        </select><br>
        <label for="card_number">Card Number</label><br>
        <input name="card_number" type="text" required><br>
        <label for="expiry">Expiry Date</label><br>
        <input name="expiry" type="month" required><br>
        <label for="CVC">CVC-Code</label><br>
        <input name="CVC" type="text" required><br>

        <input type="hidden" name="seat_details" value="<?php echo e(json_encode($seat_details)); ?>">
    <input type="hidden" name="total" value="<?php echo e($total); ?>" >
        <button type="submit" class="buy">Buy</button>
    </form>

</div>
</div>

<?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/movies/ticket_sale.blade.php ENDPATH**/ ?>