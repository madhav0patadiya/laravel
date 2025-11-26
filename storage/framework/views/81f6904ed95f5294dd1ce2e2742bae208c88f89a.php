<!DOCTYPE html>
<html>
<head>
    <title>Number Pyramid</title>
    <style>
        .row {
            text-align: center;
            font-size: 22px;
            font-family: Arial, sans-serif;
            margin: 4px 0;
        }
    </style>
</head>
<body>

<h2 style="text-align:center; margin-bottom:25px;">Number Pyramid</h2>

<?php for($i = 1; $i <= $rows; $i++): ?>
    <div class="row">
        <?php for($j = 1; $j <= $i; $j++): ?>
            <?php echo e($j); ?>&nbsp;
        <?php endfor; ?>
    </div>
<?php endfor; ?>

</body>
</html>
<?php /**PATH D:\Xampp\htdocs\glscholars\resources\views/pyramid/index.blade.php ENDPATH**/ ?>