<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/profile.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Profile.css" media="all"/>
</head>
<body style="font-family: 'Nunito'">
    <header id="header">
        @include('header')
    </header>
    <?php
    use Illuminate\Support\Facades\Auth;

    if(!\App\Http\Controllers\PermissionController::isLogged()){
        echo "You're not allowed to perform this request.";
        return;
    }

    if(!isset($_GET['id'])){
        echo "Wrong usage !";
        return;
    }

    $userId = $_GET['id'];

    $userInfos = \App\Http\Controllers\UserController::tryGettingUserById($userId)->First();//\App\Http\Controllers\UserController::tryGettingUserById(Auth::user()->id)->First();
    $centerInfos = \App\Models\Center::Where('id' , $userInfos->id_center)->get()->First();
    $typeInfos = \App\Models\Type::Where('id' , $userInfos->id_type)->get()->First();
    ?>

    <div class="information" style="text-align: center">
        <h1>Your informations :</h1>
        <p>First Name : {{$userInfos->firstname}} </p><br>
        <p>Last Name : {{$userInfos->lastname}}</p><br>
        <p>Login : {{$userInfos->login}}</p><br>
        <p>Type name : {{$typeInfos->type}}</p><br>
        <p>City name : {{$centerInfos->city}}</p><br>
    </div>
    <footer id="footer">
        @include('footer')
    </footer>
</body>
</html>
