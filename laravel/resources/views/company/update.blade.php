<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UpdateCompany</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="/css/companyUpdate.css" rel="stylesheet"></head>
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
               <form action="{{route('company.update')}}" method="post" class="form">
               @csrf
               Company id :
               <input value="{{$companyInfos->id}}" type="text" name="companyId" id="companyId" readonly><br>
               Company name :
               <input value="{{$companyInfos->name}}" type="text" name="name" id="name"><br>
               Company address :
               <input value="{{$companyInfos->address}}" type="text" name="address" id="address"><br>
               Company activity sector :
               <input value="{{$companyInfos->activity_sector}}" type="text" name="activitySector" id="activitySector"><br>
               Company interns number :
               <input value="{{$companyInfos->interns_number}}" type="text" name="internsNumber" id="internsNumber"><br>
               <input type="submit" value="UpdateCompany">
               </form>
<footer>
    @include('footer')
</footer>
</body>
</html>

