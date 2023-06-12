<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Ticket</title>
    <link rel="stylesheet" href="/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        
</head>
<body>

    <nav>
        <input type="checkbox" id="check" >
        <label for="check" class="checkbtn">
            <i class="fa fa-bars" ></i>
        </label>
        <label class="logo">Online Ticket</label>
        <ul>
            <?php if(auth()->guard()->check()): ?>
            <li><a href="/dashboard">Home</a></li>
            <?php else: ?>
            <li><a href="/">Home</a></li>
            <?php endif; ?>
            <li><a href="/nowshowing">Now Showing</a></li>
            <li><a href="/comingsoon">Coming Soon</a></li> 
           
            <?php if(auth()->guard()->check()): ?>
            <li><a href="/user/home"><?php echo e(auth()->user()->name); ?></a></li>
            <li><form class="inline" method="POST" action="/logout/user">
                <?php echo csrf_field(); ?>
                <button type="submit" class="logout">
                   Logout
                </button>
                </form>
          </li>
                
            <?php else: ?>
            <li><a href="<?php echo e(route('login')); ?>">Login/Register</a></li>

                
            <?php endif; ?>
            

        </ul>
    </nav>
</body>
</html><?php /**PATH C:\xampp\htdocs\TicketSystem\resources\views/components/navbar.blade.php ENDPATH**/ ?>