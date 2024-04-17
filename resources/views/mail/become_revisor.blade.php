<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h1>{{__('ui.subject')}}</h1>
        <h2>{{__('ui.yourDetails')}}</h2>
        <p>{{__('ui.nameRevisor')}} {{$user->name}}</p>
        <p>{{__('ui.emailRevisor')}} {{$user->email}}</p>
        <p>{{__('ui.acceptancetext')}}</p>
        <a href="{{route('make.revisor', compact('user'))}}">{{__('ui.buttonMakeRevisor')}}</a>
    </div>
    
</body>
</html>