<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    

    <p>Hello, <strong>{{ $client->name }}</strong></p>
    <p>Greetings!</p>
    <p>Thank you for checking our App SwaHeal and creating an account.</p>
    <p>Your Account Credentials are:</p>
    <p>User ID: <strong>{{ $client->email }}</strong></p>
    <p>Password: <strong>{{ $password }}</strong></p>
    <p>We would also like to inform you that you can use the same credentials to access your Brain and Mind Gym Dashboard. Please click on the below given link to access it:</p>
    <p><a href="{{ url('login') .'?type='. \Hash::make(0) }}">{{ url('login') .'?type='. \Hash::make(0) }}</a></p>
    <p><i>Brain & Mind Gym is your Mantra of your Successful Mindset</i></p>

    <p>
        <strong>Regards,</strong>
    </p>

    <p>
        <strong>Team SwaDotTantraa</strong>
    </p>

</body>
</html>