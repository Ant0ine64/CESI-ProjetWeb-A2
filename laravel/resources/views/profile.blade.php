<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
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
</body>
</html>
