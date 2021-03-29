<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="/css/offerRegister.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title>RegisterOffer</title>
</head>
<body style="font-family: Nunito;">
    <header>
        @include ('header')
    </header>
    <form action="{{route('offer.create')}}" method="post" class="form" style="text-align: center;">
        <label for="idCompany">Company Name : </label><br>
        <input type="text" name="idCompany" id="idCompany"><br>
        <label for="title">Title : </label><br>
        <input type="text" name="title" id="title"><br>
        <label for="competences">Skills :</label><br>
        <input type="text" name="competences" id="competences"><br>
        <label for="date">Start Date : </label><br>
        <input type="date" name="date" id="date" min="2021-03-22"><br> <!--todo: faire en sorte de display a partir de la date actuelle -->
        <label for="endDate">End date : </label><br>
        <input type="date" name="endDate" id="endDate"  min="2021-03-22"><br> <!--todo: min doit etre la date de selectionnée dans date (juste au dessus) -->
        <label for="remuneration">Salary : </label><br>
        <input type="text" name="remuneration" id="remuneration"><br>
        <label for="slots">Slots : </label><br>
        <input type="text" name="slots" id="slots"><br><br>
        <input type="submit" value="Add this offer" style="
        padding: 8px 20px; font-weight: bold; border-radius: 5px; cursor: pointer;
        background-color: green;
        color: #FFFFFF;
        ">
    </form>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
