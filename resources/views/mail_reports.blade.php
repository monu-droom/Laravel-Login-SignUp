<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <p>Hi, {{ $array['name'] }} </p>
    <br>
    <p><strong>Your Water assessment report for your source water.</strong></p>
    <br>
    <br>
    <img src="{{asset($array['image'])}}">
    <br>
    <p>Thanks & Regards</p>
    <p><strong>Owo Technology Pvt Ltd</strong></p>
</body>
</html>