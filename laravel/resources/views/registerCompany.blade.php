<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>RegisterCompany</title>
</head>
<body>
    <form action="{{route('company.create')}}" method="post">
        @csrf
        <input type="text" name="name" id="name"><br>
        <input type="text" name="address" id="address"><br>
        <input type="text" name="activitySector" id="activitySector"><br>
        <input type="text" name="internsNumber" id="internsNumber"><br>
        <input type="submit" value="RegisterCompany">
    </form>
</body>
</html>
