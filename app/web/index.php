<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>REST API</title>
</head>
<body class="container">

<section>
    <h1>API test</h1>
</section>

<section>
    <ul class="list-group">
        <li class="list-group-item">
            <section>
                <h2>Create User:</h2>
                <form id="create-user" method="POST" action="post.php">
                    <div class="form-group">
                        <label for="email">E-mail:
                            <input class="form-control" name="email" type="email" required/>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:
                            <input class="form-control" name="password" type="password" required/>
                        </label>
                    </div>
                    <button id="create-btn" class="btn btn-primary" type="button">Create</button>
                </form>
            </section>
        </li>
        <li class="list-group-item">
            <section>
                <h2>Get User By ID:</h2>
                <form id="get-user" method="GET" action="get.php" onsubmit="process()">
                    <div class="form-group">
                        <label for="id">ID:
                            <input class="form-control" name="id" type="number" required/>
                        </label>
                    </div>
                    <button id="get-btn" class="btn btn-info" type="submit">Get User</button>
                </form>
            </section>
        </li>
        <li class="list-group-item">
            <section>
                <h2>Delete User By ID:</h2>
                <form id="delete-user" method="DELETE" action="delete.php" onsubmit="process()">
                    <div class="form-group">
                    <label for="id">ID:
                        <input class="form-control" name="id" type="number" required/>
                    </label>
                    </div>
                    <button id="delete-btn" class="btn btn-danger" type="submit">Delete User</button>
                </form>
            </section>
        </li>
    </ul>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>