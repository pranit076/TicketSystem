
<form action="/user/bookticket/<?php echo e($shows->id); ?>" method="POST">
    <?php echo csrf_field(); ?>
<div class="seat_container">
    <h3>Selected seats: <span id="Seats"></span></h3>
    <h3>Total amount: <span id="totalAmount">£ 0.00</span></h3>
<div class="seat_design">
    
        <?php
    $rows = 13;
    $columns = 21;
    $alpha=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    $prices = [10,10,10,15,15,15,20,20,20,25,25,30,35,40,40,40,40,40,40,40,40,40,40,40,40,40];
    $researved_seats=[];
    $tickets=App\Models\Tickets::where('show_id',$shows->id)->get();
    ?>
<?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
$researved_seats[]=$ticket->seats;    ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php 
   
        $researve_seats= implode(',', $researved_seats);
    

    $seats_array = explode(',', $researve_seats);
 
    ?>

    <div class="screen">Screen</div>
    <?php for($row = 1; $row <= $rows; $row++): ?>
    <?php $price = $prices[$row-1] ; ?>
    <div class="row">
        <?php echo e($alpha[$row-1]); ?>

        <?php if($row==1): ?>
        <span style="margin-left:110px">
            <?php for($column = 1; $column <= $columns-4; $column++): ?>
            <?php if($seats_array): ?>
            <?php $found = false; ?>
            <?php for($i = 0; $i < count($seats_array); $i++): ?>
                <?php if($alpha[$row-1].''.$column==$seats_array[$i]): ?>
                    <?php $found = true; ?>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if($found): ?>
                <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>" disabled>
                <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="background-color: red;border:red;color:white;"><?php echo e($alpha[$row-1].''.$column); ?></label>
            <?php else: ?>
                <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
                <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>"><?php echo e($alpha[$row-1].''.$column); ?></label>
            <?php endif; ?>
            <?php else: ?>
            <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
            <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>"><?php echo e($alpha[$row-1].''.$column); ?></label> 
            <?php endif; ?>
            
                <?php endfor; ?>  
        </span> 
        <?php elseif($row==$rows): ?>
        <span style="margin-left:330px">
        <?php for($column = 1; $column <= $columns-12; $column++): ?>
        
            <?php if($column%3==0  ): ?>
                <?php if($seats_array): ?>
                    <?php $found = false; ?>
                    <?php for($i = 0; $i < count($seats_array); $i++): ?>
                        <?php if($alpha[$row-1].''.$column==$seats_array[$i]): ?>
                            <?php $found = true; ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                        <?php if($found): ?>
                            <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>" disabled>
                            <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="background-color: red;border:red;color:white; margin-right:55px;"><?php echo e($alpha[$row-1].''.$column); ?></label>
                        <?php else: ?>
                            <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
                            <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="margin-right:55px;"><?php echo e($alpha[$row-1].''.$column); ?></label>
                        <?php endif; ?>
                <?php else: ?>
                    <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
                    <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="margin-right:55px;"><?php echo e($alpha[$row-1].''.$column); ?></label> 
                <?php endif; ?>
            
            
           
            <?php else: ?>
            <?php if($seats_array): ?>
            <?php $found = false; ?>
            <?php for($i = 0; $i < count($seats_array); $i++): ?>
                <?php if($alpha[$row-1].''.$column==$seats_array[$i]): ?>
                    <?php $found = true; ?>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if($found): ?>
                <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>" disabled>
                <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="background-color: red;border:red;color:white;"><?php echo e($alpha[$row-1].''.$column); ?></label>
            <?php else: ?>
                <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
                <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>"><?php echo e($alpha[$row-1].''.$column); ?></label>
            <?php endif; ?>
            <?php else: ?>
            <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
            <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>"><?php echo e($alpha[$row-1].''.$column); ?></label> 
            <?php endif; ?>
            <?php endif; ?>
        
    
        
        <?php endfor; ?>  
    </span> 
    <?php elseif($row==$rows-1): ?>
    <span style="margin-left:330px">
    <?php for($column = 1; $column <= $columns-13; $column++): ?>
    
        <?php if($column%2==0  ): ?>
        <?php if($seats_array): ?>
                    <?php $found = false; ?>
                    <?php for($i = 0; $i < count($seats_array); $i++): ?>
                        <?php if($alpha[$row-1].''.$column==$seats_array[$i]): ?>
                            <?php $found = true; ?>
                        <?php endif; ?>
                    <?php endfor; ?>
                        <?php if($found): ?>
                            <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>" disabled>
                            <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="background-color: red;border:red;color:white; margin-right:55px;"><?php echo e($alpha[$row-1].''.$column); ?></label>
                        <?php else: ?>
                            <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
                            <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="margin-right:55px;"><?php echo e($alpha[$row-1].''.$column); ?></label>
                        <?php endif; ?>
                <?php else: ?>
                    <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
                    <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="margin-right:55px;"><?php echo e($alpha[$row-1].''.$column); ?></label> 
                <?php endif; ?>
        
       
        <?php else: ?>
        <?php if($seats_array): ?>
        <?php $found = false; ?>
        <?php for($i = 0; $i < count($seats_array); $i++): ?>
            <?php if($alpha[$row-1].''.$column==$seats_array[$i]): ?>
                <?php $found = true; ?>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if($found): ?>
            <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>" disabled>
            <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="background-color: red;border:red;color:white;"><?php echo e($alpha[$row-1].''.$column); ?></label>
        <?php else: ?>
            <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
            <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>"><?php echo e($alpha[$row-1].''.$column); ?></label>
        <?php endif; ?>
        <?php else: ?>
        <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
        <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>"><?php echo e($alpha[$row-1].''.$column); ?></label> 
        <?php endif; ?>
        <?php endif; ?>
    

    
    <?php endfor; ?>  
</span> 
        <?php else: ?>
            <?php for($column = 1; $column <= $columns; $column++): ?>
            <?php if($seats_array): ?>
            <?php $found = false; ?>
            <?php for($i = 0; $i < count($seats_array); $i++): ?>
                <?php if($alpha[$row-1].''.$column==$seats_array[$i]): ?>
                    <?php $found = true; ?>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if($found): ?>
                <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>" disabled>
                <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>" style="background-color: red;border:red;color:white;"><?php echo e($alpha[$row-1].''.$column); ?></label>
            <?php else: ?>
                <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
                <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>"><?php echo e($alpha[$row-1].''.$column); ?></label>
            <?php endif; ?>
            <?php else: ?>
            <input class="form-check-input" name="seat[]" type="checkbox" id="<?php echo e($alpha[$row-1].''.$column); ?>" value="<?php echo e($alpha[$row-1].''.$column); ?>" data-price="<?php echo e($price); ?>">
            <label class="form-check-label" id="label" for="<?php echo e($alpha[$row-1].''.$column); ?>"><?php echo e($alpha[$row-1].''.$column); ?></label> 
            <?php endif; ?>
            <?php endfor; ?>    
        <?php endif; ?>
        
    </div>
    <?php endfor; ?>
   
    </div>
    <div class="buttons">
        <a href="/user/bookticket/<?php echo e($shows->id); ?>"><button type="submit" style="margin-left: 600px">Buy</button></a>
       
    </div>
</div>

</form><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/components/theater1.blade.php ENDPATH**/ ?>