<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/profile.css" rel="stylesheet">
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
    </div><br><br><br>

    <div class="table_div">
    <table class="center">
                <tr>
                    <th>Company name</th>
                    <th>Offer Title</th>
                    <th>Start date</th>
                    <th>Duration</th>
                    <th>Contact email</th>
                    <th>State</th>
                    <th>Actions</th>
                </tr>
                @foreach ($wishes as $wish)
                <tr>
                    <td>{{$wish->name}}</td>
                    <td>{{$wish->title}}</td>
                    <td>{{$wish->date}}</td>
                    <td>{{$wish->duration}}</td>
                    <td>{{$wish->contact_email}}</td>
                    <td>{{$wish->state}}</td>
                    <td>
                    @if (\App\Http\Controllers\PermissionController::can('offer.update'))
                    <a href="/wishlist/update/{{$wish->id}}" class="clickme danger">Edit</a>
                    @endif
                    @if (\App\Http\Controllers\PermissionController::can('wishlist.remove'))
                    &emsp;<a href="/wishlist/remove/{{$wish->id_offer}}" class="clickme critical">Remove</a>
                    @endif
                    </td>
                </tr>
                @endforeach
                </table><br>
    </div>

    <footer id="footer">
        @include('footer')
    </footer>
</body>
</html>
