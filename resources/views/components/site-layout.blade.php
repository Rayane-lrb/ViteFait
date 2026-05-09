<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<header>
    <nav class="w-cover bg-red-600">
        <a href="" class="mr-auto">Logo</a>
        <a href="">Article</a>
        <a href="">Faq</a>
        <a href="">Category</a>
        @auth
            <a>Profile</a>
        @endauth
        <div>
            <a href="">Login</a>
        </div>
    </nav>
</header>
<main>
    {{$slot}}
</main>
<footer class="flex row">
    <div>
        <p>2026 @copyright</p>
    </div>
    <div>
        <h1>Contact</h1>
        <p>vitefait@gmail.com</p>
        <p>+32 000 00 00</p>
        <p>Bruxelles, Belgique</p>
    </div>
</footer>
</body>
</html>
