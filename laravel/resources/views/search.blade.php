<!DOCTYPE html>
<html lang="fr"> 
<head>
        <link href="/css/search.css" rel="stylesheet">
        <link href="/css/header.css" rel="stylesheet">
        <link href="/css/footer.css" rel="stylesheet">
        <meta charset="UTF-8">
        <title>Search</title>
</head>
<body>
    <header id="header">
        @include ('header')
    </header>
    <main id="main">
        <div id="form_div">
                <form action="" method="POST">
                @csrf
                    <input type="text" placeholder="Your search..." id="searchbar"><br><br>
                    <input type="radio" id="users" name="filter" value="users">
                    <label for="users">Users</label>
                    <input type="radio" id="company" name="filter" value="companies">
                    <label for="company">Companies </label>
                    <input type="radio" id="offers" name="filter" value="offers">
                    <label for="offers">Offers</label>
                    <input type="submit" value="result" name="result">
                </form>
        </div>
        <div id="table_div"><br>
            <table class="center">
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
            @include('footer')
    </footer>
</body>
</html>