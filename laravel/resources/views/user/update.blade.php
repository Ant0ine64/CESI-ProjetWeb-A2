<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UserUpdate</title>
</head>
<body>

    <?php
    use Illuminate\Support\Facades\Auth;

        if(!\App\Http\Controllers\PermissionController::hasAdminRights()){
             echo "You're not allowed to perform this request.";
             return;
         }
        $userInfos = \App\Http\Controllers\UserController::tryGettingUserById(Auth::user()->id)->First();
        $centerInfos = \App\Models\Center::Where('id' , $userInfos->id_center)->get()->First();
        $typeInfos = \App\Models\Type::Where('id' , $userInfos->id_type)->get()->First();
    ?>
    <form action="{{route('user.update')}}" method="post">
        @csrf
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
</body>
</html>
