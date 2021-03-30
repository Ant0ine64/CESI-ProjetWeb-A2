<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/update.css" rel="stylesheet">
    <title>UpdateOffer</title>
</head>

<body style="font-family: Nunito;">
    <header>
        @include ('header')
    </header>
    <form action="{{route('offer.update')}}" method="post" class="form">
        <label for="idOffer">Offer ID : </label><br>
        <input value = "{{$offer->id}}" type="text" name="idOffer" id="idOffer" readonly><br>
        <label for="idCompany">Company ID : </label><br>
        <input value = "{{$offer->id_company}}" type="text" name="idCompany" id="idCompany" readonly><br>
        <label for="title">Offer title : </label><br>
        <input value = "{{$offer->title}}" type="text" name="title" id="title"><br>
        <label for="competences">Competences : </label><br>
        <input value = "{{$offer->competences}}" type="text" name="competences" id="competences"><br>
        <label for="date ">Start date : </label><br>
        <input type="date" name="date" id="date" value="2021-03-22" min="2021-03-22"><br>
        <label for="endDate">End date : </label><br>
        <input type="date" name="endDate" id="endDate" value="2021-03-23" min="2021-03-22"><br>
        <label for="remuneration">Salary : </label><br>
        <input value = "{{$offer->remuneration}}" type="text" name="remuneration" id="remuneration"><br>
        <label for="slots">Slots : </label><br>
        <input value = "{{$offer->slots}}" type="text" name="slots" id="slots"><br><br/>
        <input type="submit" value="Update">
    </form>
    <footer>
        @include('footer')
    </footer>
</body>
</html>
