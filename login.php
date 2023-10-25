<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    </style>
</head>
<body>
    <br>
    <h1 style="text-align:center; font-family:'Times New Roman';">LOGIN AND REGISTRATION PAGE</h1>
    <hr>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Login</h2>
                <hr>
                <form id="loginForm" method="POST" action="login-function.php">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Registration</h2>
                <hr>
                <form id="registrationForm" method="POST" action="register-function.php">
                    <div class="form-group">
                        <label for="username">New Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="text" class="form-control" id="gender" name="gender" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <input type="text" class="form-control" id="role" name="role" required>
                    </div>
                    <div class="form-group">
                        <label for="num">Phone Number:</label>
                        <input type="text" class="form-control" id="num" name="num" required>
                    </div>
                    <div class="form-group">
                        <label for="password">New Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-success">Register</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
