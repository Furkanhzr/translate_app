<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
</head>

<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
    }

    header {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    main {
        flex: 1;
        background-color: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    footer {
        background-color: #343a40;
        color: white;
        text-align: center;
        padding: 1rem 0;
        position: relative;
        width: 100%;
        bottom: 0;
    }

    textarea {
        resize: none;
    }

    #translationResult {
        background-color: #f0f0f0;
        cursor: not-allowed;
    }

    footer p {
        margin: 0;
    }

</style>
<body>

<!-- Header -->
<header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="m-0">TranslateApp</h1>
        <nav>
{{--            <ul class="nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link text-white">Ana Sayfa</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link text-white">Hakkımızda</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link text-white">İletişim</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </nav>
    </div>
</header>

<!-- Main Content -->
@yield('content')

<!-- Footer -->
<footer class="bg-dark text-white py-3">
    <div class="container text-center">
        <p>&copy; 2024 TranslateApp. Tüm hakları Furkan Hazar adına saklıdır.</p>
    </div>
</footer>

</body>
</html>
