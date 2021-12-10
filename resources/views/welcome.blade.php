<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>StockerS</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            background-image: url("https://i.imgur.com/kNlIwVu.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login_container {
            border: 5px solid #343537;
            border-radius: 10px;
            background-color: rgba(0, 0, 0, .5);
            box-shadow: 2px 2px 10px #00b0fa;
            box-sizing: border-box;
            height: 30%;
            width: 30%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            justify-content: space-evenly;


        }
        .b_login {
            background: linear-gradient(45deg, #6623ed 30%, #01FF94 90%);
            font-size: 30px;
            color: white;
            cursor: pointer;
            border: 0;
            border-radius: 10px;
            font-weight: 900;
            box-shadow: 0 3px 5px 2px rgb(255 105 135 / 30%);
            -webkit-text-stroke: 1.5px #870CC0;
        }

        .b_login:hover {
            color: #bcecf8;
        }
    </style>
</head>

<body>
    <div class="login_container">

        <button class="b_login" role="link" onclick="window.location='login'"> INICIA SESIÓN </button>
        <button class="b_login" role="link" onclick="window.location='register'"> REGISTRATE </button>
    </div>
</body>

</html>