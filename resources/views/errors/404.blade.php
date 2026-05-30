<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            background: #0f0f0f;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: #ffffff;
            overflow: hidden;
            position: relative;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .background::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background:
                radial-gradient(circle at 20% 50%, rgba(255, 107, 107, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 50%, rgba(78, 205, 196, 0.1) 0%, transparent 50%);
            animation: moveBackground 20s ease-in-out infinite;
        }

        @keyframes moveBackground {
            0%, 100% {
                transform: translate(0, 0);
            }
            50% {
                transform: translate(-50px, -50px);
            }
        }

        .container {
            position: relative;
            z-index: 1;
            max-width: 800px;
            width: 100%;
            text-align: center;
        }

        .glitch-wrapper {
            position: relative;
            display: inline-block;
        }

        .error-code {
            font-size: 180px;
            font-weight: 900;
            font-family: 'Arial Black', sans-serif;
            color: #ffffff;
            line-height: 1;
            margin-bottom: 40px;
            position: relative;
            letter-spacing: -10px;
            text-shadow:
                0 0 20px rgba(255, 255, 255, 0.5),
                0 0 40px rgba(255, 107, 107, 0.3),
                0 0 60px rgba(78, 205, 196, 0.3);
            animation: flicker 3s infinite;
        }

        @keyframes flicker {
            0%, 100% {
                opacity: 1;
                text-shadow:
                    0 0 20px rgba(255, 255, 255, 0.5),
                    0 0 40px rgba(255, 107, 107, 0.3),
                    0 0 60px rgba(78, 205, 196, 0.3);
            }
            50% {
                opacity: 0.95;
                text-shadow:
                    0 0 30px rgba(255, 255, 255, 0.7),
                    0 0 50px rgba(255, 107, 107, 0.5),
                    0 0 70px rgba(78, 205, 196, 0.5);
            }
        }

        h1 {
            font-size: 48px;
            color: #ffffff;
            margin-bottom: 20px;
            font-weight: 300;
            letter-spacing: 8px;
            text-transform: uppercase;
            font-family: 'Arial', sans-serif;
        }

        .divider {
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #ffffff, transparent);
            margin: 30px auto;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 0.5;
                transform: scaleX(1);
            }
            50% {
                opacity: 1;
                transform: scaleX(1.2);
            }
        }

        p {
            font-size: 20px;
            color: #b0b0b0;
            line-height: 1.8;
            margin-bottom: 50px;
            font-family: 'Georgia', serif;
            font-style: italic;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 18px 45px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.4s ease;
            cursor: pointer;
            border: none;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-family: 'Arial', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: left 0.4s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: transparent;
            color: #ffffff;
            border: 2px solid #ffffff;
        }

        .btn-primary:hover {
            background: #ffffff;
            color: #0f0f0f;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.3);
        }

        .btn-secondary {
            background: transparent;
            color: #b0b0b0;
            border: 2px solid #404040;
        }

        .btn-secondary:hover {
            border-color: #ffffff;
            color: #ffffff;
        }

        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: float-particle 10s infinite;
        }

        @keyframes float-particle {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }

        .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 25%; animation-delay: 2s; }
        .particle:nth-child(3) { left: 40%; animation-delay: 4s; }
        .particle:nth-child(4) { left: 55%; animation-delay: 6s; }
        .particle:nth-child(5) { left: 70%; animation-delay: 8s; }
        .particle:nth-child(6) { left: 85%; animation-delay: 1s; }

        @media (max-width: 768px) {
            .error-code {
                font-size: 120px;
                letter-spacing: -5px;
            }

            h1 {
                font-size: 32px;
                letter-spacing: 4px;
            }

            p {
                font-size: 18px;
                padding: 0 20px;
            }

            .buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
</head>
<body>
    <div class="background"></div>

    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container">
        <div class="glitch-wrapper">
            <div class="error-code">404</div>
        </div>

        <h1>Lost in Space</h1>

        <div class="divider"></div>

        <p>The page you seek has drifted into the void. Perhaps it never existed, or maybe it's waiting to be discovered elsewhere.</p>

        <div class="buttons">
            <a href="{{ route('home') }}" class="btn btn-primary">Return Home</a>
            <button onclick="history.back()" class="btn btn-secondary">Go Back</button>
        </div>
    </div>
</body>
</html>
