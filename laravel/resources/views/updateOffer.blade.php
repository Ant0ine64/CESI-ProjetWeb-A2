<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UpdateOffer</title>
</head>
<body>
    <form action="{{route('submit')}}" method="post">
        @csrf
        <input value = "23" type="text" name="idOffer" id="idOffer"><br>
        <input value = "23" type="text" name="idCompany" id="idCompany"><br>
        <input value = "defaultValue" type="text" name="title" id="title"><br>
        <input value = "defaultValue" type="text" name="competences" id="competences"><br>
        <input type="date" name="date" id="date" value="2021-03-22" min="2021-03-22"><br> <!--todo: faire en sorte de display a partir de la date actuelle -->
        <input type="date" name="endDate" id="endDate" value="2021-03-23" min="2021-03-22"><br> <!--todo: min doit etre la date de selectionnée dans date (juste au dessus) -->
        <input value = "535.6" type="text" name="remuneration" id="remuneration"><br>
        <input value = "12" type="text" name="slots" id="slots"><br>
        <input type="submit" value="updateOffer">
    </form>
</body>
</html>
