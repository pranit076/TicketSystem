
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="/css/seat.css">
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
<?php if($shows->hall_id==1): ?>
<?php echo $__env->make('components.theater1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($shows->hall_id==2): ?>
<?php echo $__env->make('components.theater2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($shows->hall_id==3): ?>
<?php echo $__env->make('components.theater3', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

 

  <script>
      // Get all the checkbox elements
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  
      // Add a change event listener to each checkbox
      checkboxes.forEach(function(checkbox) {
          checkbox.addEventListener('change', function() {
              var selectedSeats = [];
              var totalAmount = 0;
  
              // Loop through all the checkboxes to find the selected ones
              checkboxes.forEach(function(checkbox) {
                  if (checkbox.checked) {
                      selectedSeats.push(checkbox.value); // Add the selected seat value to the array
                      totalAmount += parseFloat(checkbox.dataset.price); // Accumulate the total amount based on the selected seats' prices
                  }
              });
  
              // Display the selected seats and total amount in the respective elements
              var selectedSeatsDiv = document.getElementById('Seats');
              selectedSeatsDiv.innerText = selectedSeats.join(', ');
              var totalAmountDiv = document.getElementById('totalAmount');
              totalAmountDiv.innerText = '£' + totalAmount.toFixed(2); // Format the total amount to two decimal places
          });
      });
  </script>
  <?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/movies/theater.blade.php ENDPATH**/ ?>