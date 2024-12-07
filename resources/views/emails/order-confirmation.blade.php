<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation #{{$order->id}}</title>
</head>
<body>
    <p>
        Hey {{$order->user->name}}
    </p>
    <p>
        Thanks you for your order!You can find more details below...
    </p>
</body>
</html>