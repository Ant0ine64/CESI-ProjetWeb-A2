<!DOCTYPE html>
<html lang="fr"> 
<head>
        <link href="/css/gestion.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Gestion</title>
</head>
<body>
    <header id="header">
        @include ('header')
    </header>
    <main id="main">
        <div id="search_div">
            <input type="text" placeholder="Your search...">
        </div>
        <div id="table_div"><br>
        @if (can(stud.update))
            <table class="center">
                <th>Name</th>
                <th>Sirname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Center</th>
            </table> 
        @elseif (can(comp.update))
            <table class="center">
                <th>Name</th>
                <th>Activity sector</th>
                <th>Number of offers</th>
                <th>Grade</th> 
            </table>
        @elseif (can(offer.update)
            <table class="center">
                <th>Title</th>
                <th>Company</th>
                <th>Comptencies</th>
                <th>Number of slots</th>     
            </table>
        @endif  
        </div>  
    </main>
    <footer>
            @include('footer')
    </footer>
</body>
</html>