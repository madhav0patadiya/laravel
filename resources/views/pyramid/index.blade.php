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

@for($i = 1; $i <= $rows; $i++)
    <div class="row">
        @for($j = 1; $j <= $i; $j++)
            {{ $j }}&nbsp;
        @endfor
    </div>
@endfor

</body>
</html>
