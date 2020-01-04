<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <title>REST API</title>
</head>
<body>
<section>
    <form id="create-user" method="POST" action="post.php">
        <label for="email">E-mail:
            <input name="email" type="email" required/>
        </label>
        <label for="password">Password:
            <input name="password" type="password" required/>
        </label>
        <button id="create-btn" type="button">Create</button>
    </form>
</section>

<section>
    <form id="get-user" method="GET" action="get.php" onsubmit="process()">
        <label for="id">ID:
            <input name="id" type="number" required/>
        </label>
        <button id="get-btn" type="submit">Get User</button>
    </form>
</section>

<section>
    <form id="delete-user" method="DELETE" action="delete.php" onsubmit="process()">
        <label for="id">ID:
            <input name="id" type="number" required/>
        </label>
        <button id="delete-btn" type="submit">Delete User</button>
    </form>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>