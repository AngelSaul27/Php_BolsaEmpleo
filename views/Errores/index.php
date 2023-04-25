<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>

<body>
    <style>
        body {
            margin: 0;
            font-size: 20px;
        }

        * {
            box-sizing: border-box;
        }

        .container {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: white;
            color: black;
            font-family: arial, sans-serif;
            overflow: hidden;
        }

        .content {
            position: relative;
            width: 600px;
            max-width: 100%;
            margin: 20px;
            background: white;
            padding: 60px 40px;
            text-align: center;
            box-shadow: -10px 10px 67px -12px rgba(0, 0, 0, 0.2);
            opacity: 1;
        }

        .content p {
            font-size: 1.3rem;
            margin-top: 0;
            margin-bottom: 0.6rem;
            letter-spacing: 0.1rem;
            color: #595959;
        }

        .content p:last-child {
            margin-bottom: 0;
        }

        .content button {
            display: inline-block;
            margin-top: 2rem;
            padding: 0.5rem 1rem;
            border: 3px solid #595959;
            background: transparent;
            font-size: 1rem;
            color: #595959;
            text-decoration: none;
            cursor: pointer;
            font-weight: bold;
        }

       
    </style>

    <main class='container'>
        <article class='content'>
            <p>Oops! Página no encontrada..</p>
            <p>Te perdiste en la galaxia <strong>404</strong></p>
            <p>
                <a href="<?php echo constant('URL')?>">
                    <button>Regresar</button>
                </a>
            </p>
        </article>
    </main>


</body>

</html>