<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f4f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 40px;
            background: #ffffff;
            box-shadow: 0px 10px 35px rgba(0,0,0,0.08);
            border-radius: 18px;
            max-width: 500px;
            animation: fadeIn .7s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .error-code {
            font-size: 110px;
            font-weight: 700;
            margin: 0;
            color: #ff4757;
            line-height: 1;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
            color: #2f3542;
            margin: 10px 0 15px;
        }

        .description {
            font-size: 16px;
            color: #57606f;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        a.home-btn {
            display: inline-block;
            padding: 12px 25px;
            background: #1e90ff;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: .3s;
            font-weight: 600;
        }

        a.home-btn:hover {
            background: #0c72d1;
            transform: translateY(-3px);
        }

        .shadow {
            margin-top: 15px;
            font-size: 14px;
            color: #a4b0be;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="error-code">404</h1>
        <h2 class="title">Page Not Found</h2>

        <p class="description">
            The page you are looking for might have been removed, had its name changed,
            or is temporarily unavailable.
        </p>

        <a href="{{ url('/') }}" class="home-btn">Go Back Home</a>

        <p class="shadow">© {{ date('Y') }} All rights reserved by Mohiuddin Asad.</p>
    </div>
</body>
</html>
