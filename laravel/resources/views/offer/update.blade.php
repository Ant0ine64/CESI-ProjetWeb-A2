<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UpdateOffer</title>
</head>
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
        <input value = "<?php echo $offerInfos->id; ?>" type="text" name="idOffer" id="idOffer" readonly><br>
        Company id :
        <input value = "<?php echo $offerInfos->id_company; ?>" type="text" name="idCompany" id="idCompany" readonly><br>
        Title :
        <input value = "<?php echo $offerInfos->title; ?>" type="text" name="title" id="title"><br>
        Skills :
        <input value = "<?php echo $offerInfos->competences; ?>" type="text" name="competences" id="competences"><br>
        Start date :
        <input type="date" name="date" id="date" value="2021-03-22" min="2021-03-22"><br>
        End date :
        <input type="date" name="endDate" id="endDate" value="2021-03-23" min="2021-03-22"><br>
        Remuneration :
        <input value = "<?php echo $offerInfos->remuneration; ?>" type="text" name="remuneration" id="remuneration"><br>
        Available slots :
        <input value = "<?php echo $offerInfos->slots; ?>" type="text" name="slots" id="slots"><br>
        <input type="submit" value="updateOffer">
    </form>
</body>
</html>
