<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/offerUpdate.css" rel="stylesheet">
    <title>UpdateOffer</title>
</head>

<body style="font-family: Nunito;">
    <header>
        @include ('header')
    </header>
    <form action="{{route('offer.update')}}" method="post" class="form">
        @csrf
        <label for="idOffer">Offer ID : </label><br>
        <input value = "23" type="text" name="idOffer" id="idOffer"><br>
        <label for="idCompany">Company ID : </label><br>
        <input value = "23" type="text" name="idCompany" id="idCompany"><br>
        <label for="title">Offer title : </label><br>
        <input value = "defaultValue" type="text" name="title" id="title"><br>
        <label for="competences">Competences : </label><br>
        <input value = "defaultValue" type="text" name="competences" id="competences"><br>
        <label for="date ">Date 1 [A redéfiniir] : </label><br>
        <input type="date" name="date" id="date" value="2021-03-22" min="2021-03-22"><br> <!--todo: faire en sorte de display a partir de la date actuelle -->
        <label for="endDate">End date : </label><br>
        <input type="date" name="endDate" id="endDate" value="2021-03-23" min="2021-03-22"><br> <!--todo: min doit etre la date de selectionnée dans date (juste au dessus) -->
        <label for="remuneration">Salary : </label><br>
        <input value = "535.6" type="text" name="remuneration" id="remuneration"><br>
        <label for="slots">Slots : </label><br>
        <input value = "12" type="text" name="slots" id="slots"><br><br/>
<!--
<body>

        <?php
        use App\Http\Controllers\OfferController;
        if(!isset($_GET['id'])){
            echo "Wrong usage !";
            return;
        }

        $offerId = $_GET['id'];
        $offerInfos = OfferController::tryGettingOffer($offerId)->First();

        if($offerInfos == null){
            echo "This offer doesn't exists !";
            return;
        }
        ?>

    <form action="{{route('offer.update')}}" method="post">
        @csrf
        Offer id :
        <input value = "{{$offerInfos->id}}" type="text" name="idOffer" id="idOffer" readonly><br>
        Company id :
        <input value = "{{$offerInfos->company}}" type="text" name="idCompany" id="idCompany" readonly><br>
        Title :
        <input value = "{{$offerInfos->title}}" type="text" name="title" id="title"><br>
        Skills :
        <input value = "{{$offerInfos->competences}}" type="text" name="competences" id="competences"><br>
        Start date :
        <input type="date" name="date" id="date" value="2021-03-22" min="2021-03-22"><br>
        End date :
        <input type="date" name="endDate" id="endDate" value="2021-03-23" min="2021-03-22"><br>
        Remuneration :
        <input value = "{{$offerInfos->remuneration}}" type="text" name="remuneration" id="remuneration"><br>
        Available slots :
        <input value = "{{$offerInfos->slots}}" type="text" name="slots" id="slots"><br>
-->
        <input type="submit" value="updateOffer">
    </form>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
