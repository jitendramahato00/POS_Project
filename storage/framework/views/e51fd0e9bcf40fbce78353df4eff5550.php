<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="/css/master.css">
    <link rel="icon" href="<?php echo e(asset('images/' . ($app_settings->favicon ?? 'favicon.ico'))); ?>">
    <title><?php echo e($app_settings->app_name ?? 'Stocky | Ultimate Inventory With POS'); ?></title>

  </head>

  <body class="text-left">
    <noscript>
      <strong>
        We're sorry but Stocky doesn't work properly without JavaScript
        enabled. Please enable it to continue.</strong
      >
    </noscript>

    <!-- built files will be auto injected -->
    <div class="loading_wrap" id="loading_wrap">
      <div class="loader_logo">
      <img src="<?php echo e(asset('images/' . ($app_settings->logo ?? 'logo.png'))); ?>" class="" alt="logo" />

      </div>

      <div class="loading"></div>
    </div>
    <div id="app">
      <script src="/assets_setup/js/qrcode.js"></script>

    </div>


    <script src="/js/main.min.js?v=5.4&v=<?php echo e(time()); ?>"></script>

  </body>
</html>
<<<<<<<< HEAD:storage/framework/views/93f3c40a8bf795a0362a871e67bc6de6.php
<?php /**PATH C:\laragon\www\d\resources\views/layouts/master.blade.php ENDPATH**/ ?>
========
<?php /**PATH C:\laragon\www\POS_Project\resources\views/layouts/master.blade.php ENDPATH**/ ?>
>>>>>>>> 40b91ff2188bb909c6599453a45d35dd622ca57a:storage/framework/views/e51fd0e9bcf40fbce78353df4eff5550.php
