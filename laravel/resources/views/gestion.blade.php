<!DOCTYPE html>
<html lang="fr"> 
<head>
        <link href="/css/login.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Search</title>
</head>
<body>
    <header>
            <?php include '/Users/benoitmacbook/Documents/CESI/A2/Interface_Web/Projet/CESI-ProjetWeb-A2/laravel/public/html/header.blade.php'?>
    </header>
    <main>
        <div>
            <input type="text" value="Your search...">
            <div>
                <form action="" method="POST">
                @csrf
                    <input type="radio" id="users" name="filter" value="users">
                    <label for="users">Users</label>
                    <input type="radio" id="company" name="filter" value="companies">
                    <label for="company">Companies </label>
                    <input type="radio" id="offers" name="filter" value="offers">
                    <label for="offers">Offers</label>
                    <input type="submit" value="result" name="result">
                </form>
            </div>  
        </div>
        <div>
            <table>
                @if(request()->input('filter')=='users')
                <th>Name</th>
                <th>Sirname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Center</th>
                @elseif (request()->input('filter')=='companies')
                <th>Name</th>
                <th>Activity sector</th>
                <th>Number of offers</th>
                <th>Grade</th> 
                @elseif (request()->input('filter')=='offers')
                <th>Title</th>
                <th>Company</th>
                <th>Comptencies</th>
                <th>Number of slots</th>     
                @endif
            </table>  
        </div>  
    </main>
    <footer>
           
    </footer>
</body>
</html>