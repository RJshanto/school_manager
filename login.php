<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Log In Page</title>
</head>

<body class="body">

    <div class="container">

        <div class="head_section">
            <div class="text">Log In </div>
            <div class="form_sec">
                <form action="login_data.php" method="post">
                    <div class="username">
                        <label for="username" class="username_txt">Username</label>
                        <input type="text" class="txt_fild" name="username" value="">
                    </div>
                    <div class="pass">
                        <label for="password" class="pass_txt">Password</label>
                        <input type="password" class="pass_fild" name="password">
                    </div>
                    <input type="submit" class="submit_btn" name="submit" value="Log in">
                </form>
            </div>
        </div>
    </div>


</body>

</html>