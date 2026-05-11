<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>
<body class="flex flex-col min-h-screen">
<header>
    <nav class="flex flex-row w-cover gap-6 items-center px-10 py-1  bg-[#2E3440] text-xl text-gray-500 font-bold">
        <a href="/" class="mr-auto">
            <img src="/images/logo_vite_fait.svg" alt="logo" class="h-20 w-auto scale-150">
        </a>
        <a href="/articles" class="hover:text-[#E06020] transition">Articles</a>
        <a href="/faqs" class="hover:text-[#E06020] transition">Faq</a>
        <a href="/admin/categories" class="hover:text-[#E06020] transition">Category</a>
        @auth
            <a class="hover:text-[#E06020] transition">Profile</a>
            <a class="hover:text-[#E06020] transition">Logout</a>
        @endauth
        <div>
            <a href="" class="bg-[#E06020] text-white px-4 py-1.5 rounded hover:bg-[#B04010] transition">Se connecter</a>
        </div>
    </nav>
</header>
<main class="flex-1">
    {{$slot}}
</main>
<footer class="flex flex-row bg-[#5B6470] justify-between items-center bg-orange-400 text-white px-10 py-1.5">
    <div>
        <p class="text-sm text-gray-300">2026 @copyright</p>
    </div>
    <div>
        <h1 class="font-semibold">Contact</h1>
        <p class="text-sm text-gray-300">vitefait@gmail.com</p>
        <p class="text-sm text-gray-300">+32 000 00 00</p>
        <p class="text-sm text-gray-300">Bruxelles, Belgique</p>
    </div>
</footer>
</body>
</html>
