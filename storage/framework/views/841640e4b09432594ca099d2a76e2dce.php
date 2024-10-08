<div class="bookmark-wrapper d-flex align-items-center">

    <ul class="nav navbar-nav d-xl-none">
        <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a>
        </li>
    </ul>


    


</div>
<ul class="nav navbar-nav align-items-center ms-auto">
    
    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                data-feather="moon"></i></a></li>
    
    



    <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
            id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="user-nav d-sm-flex d-none">
                <span class="user-name fw-bolder">
                    <span class="user-name fw-bolder">
                        <?php echo e(auth()->user()->name); ?>

                    </span>
                </span>
                <span class="user-status">
                    <?php echo e(auth()->user()->email); ?>


                </span>
            </div>

            <span class="avatar">
                 <img class="round" src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="avatar" height="40"
                    width="40"> 
                <span class="avatar-status-online">
                </span>
            </span>
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

            <a>
                <form method="POST" action="<?php echo e(route('logout')); ?>" class="me-50">
                    <?php echo csrf_field(); ?>

                    <button type="submit" class="dropdown-item">
                        <i class="me-50" data-feather="power">
                        </i>
                        Cerrar Sesion
                    </button>

                </form>
            </a>



            


            


            

            
            

        </div>
    </li>
</ul>
<?php /**PATH C:\xampp\htdocs\lurichamba-web\resources\views/layouts/header/nav.blade.php ENDPATH**/ ?>