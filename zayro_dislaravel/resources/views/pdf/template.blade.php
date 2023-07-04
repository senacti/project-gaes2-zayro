<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #ffffff;
            color: #b200ff;
        }

        h1 {
            text-align: center;
        }

        p {
            position: relative;
            display: inline-block;
            width: 100%;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            padding: 10px;
            margin: 0;
        }

        span {
            float: right;
        }

        img {
            width: 100px;
            height: 100px;
            float: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ffffff;
        }

        th {
            background-color: #3b026b;
            font-weight: bold;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <p style="display:inline-block;">
        <img src="https://ik.imagekit.io/Bc/logo2.png" alt="Logo">
        <span>Zayro Disfraces</span>
    </p>
    <h1>{{ $title }}</h1>

    @yield('content')
    
</body>

</html>
