<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <p>Dear Admin,</p>
    <p>Here are the details:</p>
    <ul>
         <li>Name: {{ $booking['name'] }}</li>
         <li>Email: {{ $booking['email'] }}</li>
         <li>Service Name: {{ $booking['service_name'] }}</li>
         <li>Date: {{ $booking['date'] }}</li>
         <li> Time: {{ $booking['time'] }}</li>
        <li>Service Price: {{ $booking['service_price'] }} {{ $booking['service_currency'] }}</li>
        {{-- <a href="{{route('showBooking',$booking['id'])}}">if you want canceld or edit</a> --}}
    </ul>
</body>
</html>
