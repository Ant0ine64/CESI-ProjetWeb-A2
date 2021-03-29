<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UpdateCompany</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/update.css" rel="stylesheet"></head>
<body>
<header style="font-family: Nunito">
    @include ('header')
</header>
    <?php
           use App\Http\Controllers\CompanyController;
           if(!isset($_GET['id'])){
                   echo "Wrong usage !";
                   return;
           }

           $companyId = $_GET['id'];
           $companyInfos = CompanyController::tryGettingCompany($companyId)->First();

           if($companyInfos == null){
               echo "This company doesn't exists !";
               return;
           }
    ?>
    <body style="font-family: Nunito;">
    <form action="{{route('company.update')}}" method="post" class="form">
               @csrf
               Company id : <br>
               <input value="{{$companyInfos->id}}" type="text" name="companyId" id="companyId" readonly><br>
               Company name : <br>
               <input value="{{$companyInfos->name}}" type="text" name="name" id="name"><br>
               Company address : <br>
               <input value="{{$companyInfos->address}}" type="text" name="address" id="address"><br>
               Company activity sector : <br>
               <input value="{{$companyInfos->activity_sector}}" type="text" name="activitySector" id="activitySector"><br>
               Company interns number : <br>
               <input value="{{$companyInfos->interns_number}}" type="text" name="internsNumber" id="internsNumber"><br><br>
               <input type="submit" value="UpdateCompany">
               </form>
    </body>       
<footer>
    @include('footer')
</footer>
</body>
</html>

