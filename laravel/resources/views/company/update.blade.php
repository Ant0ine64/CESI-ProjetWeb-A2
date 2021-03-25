<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UpdateCompany</title>
</head>



<!-- This code is really dirty .. but works -->
       <?php
       use App\Http\Controllers\CompanyController;if(!isset($_GET['id'])){
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
               <form action="{{route('company.create')}}" method="post"/>
               @csrf


       <?php
               echo "Company id :";
               echo "<input value=\"{$companyInfos->id}\" type=\"text\" name=\"companyId\" id=\"companyId\" readonly><br>";
               echo "Company name :";
               echo "<input value=\"{$companyInfos->name}\" type=\"text\" name=\"name\" id=\"name\"><br>";
               echo "Company address :";
               echo "<input value=\"{$companyInfos->address}\" type=\"text\" name=\"address\" id=\"address\"><br>";
               echo "Company activity sector :";
               echo "<input value=\"{$companyInfos->activity_sector}\" type=\"text\" name=\"activitySector\" id=\"activitySector\"><br>";
               echo "Company interns number :";
               echo "<input value=\"{$companyInfos->interns_number}\" type=\"text\" name=\"internsNumber\" id=\"internsNumber\"><br>";
               echo "<input type=\"submit\" value=\"UpdateCompany\">";
               echo "</form>";
       ?>

</body>
</html>

