<table>
<?php $radioVal = $_POST['filter'];
    if($radioVal = "users") :?>
        <th>Name</th>
        <th>Sirname</th>
        <th>Email</th>
        <th>Role</th>
        <th>Center</th>
    <?php elseif($radioVal = "companies") :?>
        <th>Name</th>
        <th>Activity sector</th>
        <th>Number of offers</th>
        <th>Grade</th> 
    <?php elseif($radioVal = "offers") :?>
        <th>Title</th>
        <th>Company</th>
        <th>Comptencies</th>
        <th>Number of slots</th>     
    <?php endif?>
</table>