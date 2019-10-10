<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .links a:hover {
                color: blue;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .list-table {
                margin-bottom: 30px;
            }
            .list-table button:hover {
                background-color: #000;
                border-radius: 4px;
                color: #fff;
            }
            #users {
              border-collapse: collapse;
              width: 100%;
            }

            #users td, #users th {
              border: 1px solid #ddd;
              padding: 8px;
            }

            #users tr:nth-child(even){background-color: #f2f2f2;}

            #users tr:hover {background-color: #ddd;}

            #users th {
              padding-top: 12px;
              padding-bottom: 12px;
              background-color: #000;
              color: white;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- <div class="content">
                <div class="title m-b-md">
                    List of Users
                </div>

                <div class="list-table">
                    <table id="users">
                        <tr>
                            <th>Name</th>
                            <th>View User</th>
                        </tr>

                        <tr <?php $__currentLoopData = $usernames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $username): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>>
                            <td><?php echo e($username->name); ?></td>
                            <td><button type="submit"><a href="/user/<?php echo e($username->id); ?>">View</a></button></td>
                        </tr <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                    
                    </table>
                </div>

                <div class="links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="/user/create">Create</a>
                    <?php endif; ?> -->
                   <!--  <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a> -->
               <!--  </div>
            </div> -->

            <div id="app">
                <index-component></index-component>
            </div>
        </div>
    </body>
</html>
<?php /**PATH /Users/anthonylam/Documents/Laravel/benchmark/resources/views/welcome.blade.php ENDPATH**/ ?>