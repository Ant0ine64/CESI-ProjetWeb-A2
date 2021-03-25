<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UpdateCompany</title>
</head>
<body>
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
               <form action="{{route('company.update')}}" method="post">
               @csrf
               Company id :
               <input value="<?php echo $companyInfos->id; ?>" type="text" name="companyId" id="companyId" readonly><br>
               Company name :
               <input value="<?php echo $companyInfos->name; ?>" type="text" name="name" id="name"><br>
               Company address :
               <input value="<?php echo $companyInfos->address; ?>" type="text" name="address" id="address"><br>
               Company activity sector :
               <input value="<?php echo $companyInfos->activity_sector; ?>" type="text" name="activitySector" id="activitySector"><br>
               Company interns number :
               <input value="<?php echo $companyInfos->interns_number; ?>" type="text" name="internsNumber" id="internsNumber"><br>
               <input type="submit" value="UpdateCompany">
               </form>
</body>
</html>

