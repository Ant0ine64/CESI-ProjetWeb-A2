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
            </div><br>
            <div id="checkbox_div">
                <input type="checkbox" id="student" name="Student">
                <label for="student">Students</label><br>
                <input type="checkbox" id="delegate" name="Delegate">
                <label for="delegate">Delegates</label><br>
                <input type="checkbox" id="admin" name="Admin">
                <label for="student">Admin</label>
            </div><br>
            <div>
                <table>
                    <th>Name</th>
                    <th>Activity sector</th>
                    <th>Number of offers</th>
                    <th>Grade</th>
                </table>  
            </div>
            
        </main>
        <footer>
            <?php include '/Users/benoitmacbook/Documents/CESI/A2/Interface_Web/Projet/CESI-ProjetWeb-A2/laravel/public/html/footer.blade.php'?>
        </footer>
    </body>
</html>