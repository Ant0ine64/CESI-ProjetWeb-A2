<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RegisterCompany</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body style="font-family: 'Nunito'">
<header id="header">
    @include('header')
</header>
<div class="information" style="text-align: center">
    <form action="{{route('company.create')}}" method="post">
        <p>Company Name : </p><input type="text" name="name" id="name"><br>
        <p>Company Address : </p><input type="text" name="address" id="address"><br>
        <p>Company Activity Sector : </p><input type="text" name="activitySector" id="activitySector"><br>
        <p>Company Interns Number : </p><input type="text" name="internsNumber" id="internsNumber"><br>
        <br><input type="submit" value="RegisterCompany">
    </form>

</div>

    <footer id="footer">
        @include('footer')
    </footer>
</body>
</html>
