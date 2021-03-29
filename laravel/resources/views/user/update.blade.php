<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UserUpdate</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/update.css" rel="stylesheet">
</head>
<body style="font-family: 'Nunito'">
<header>
    @include ('header')
</header>
    <?php
    use Illuminate\Support\Facades\Auth;

        if(!\App\Http\Controllers\PermissionController::hasAdminRights()){
             echo "You're not allowed to perform this request.";
             return;
         }

        $userId = $_GET['id'];
        if($userId == null){
            echo "This company doesn't exists !";
            return;
        }

        $userInfos = \App\Http\Controllers\UserController::tryGettingUserById($userId)->First();
        $centerInfos = \App\Models\Center::Where('id' , $userInfos->id_center)->get()->First();
        $typeInfos = \App\Models\Type::Where('id' , $userInfos->id_type)->get()->First();
    ?>
    <form action="{{route('user.update')}}" method="post" class="form">
        First Name :
        <input value= "{{$userInfos->firstname}}" type="text" name="firstname" id="firstname"><br>
        Last Name :
        <input value= "{{$userInfos->lastname}}" type="text" name="lastname" id="lastname"><br>
        Login :
        <input value= "{{$userInfos->login}}" type="text" name="login" id="login" readonly><br>
        Type name :
        <input value= "{{$typeInfos->type}}" type="text" name="type" id="type"><br>
        City name :
        <input value= "{{$centerInfos->city}}" type="text" name="city" id="city"><br>
        <input type="submit" value="Update">
    </form>
<footer>
    @include('footer')
</footer>
</body>
</html>
