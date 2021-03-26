<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Profile.css" media="all"/>
</head>
<body style="font-family: Nunito">
<div class="information" style="text-align: center">
    <h1>Your informations :</h1>
    <p>Last-name : </p>
    <p>First-name : </p>
    <p>Account permission : </p>
    <p>internship offer : </p>
</div>
<div class="boutton" style="text-align: center; margin-top: 25%">
    <input type="submit" style="background-color: #d43f3a" value="Delete">
    <input type="submit" style="background-color: #f0ad4e" value="Edit">
</div>
<!--
</head>
<body>

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

    @csrf
    First Name : <?php echo $userInfos->firstname; ?> <br>
    Last Name : <?php echo $userInfos->lastname; ?><br>
    Login : <?php echo $userInfos->login; ?><br>
    Type name :<?php echo $typeInfos->type; ?><br>
    City name :<?php echo $centerInfos->city; ?><br>
-->
</body>
</html>
