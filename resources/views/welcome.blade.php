<x-site-layout>
    <section>
        <div style="background-image: url('{{ asset('images/welcome_image.png') }}')"
             class="bg-cover bg-center bg-no-repeat min-h-screen flex flex-col justify-center items-center text-white">

            <h1 class="text-4xl md:text-6xl font-bold text-center drop-shadow-lg">
                Vite Fait
            </h1>
            <a href="{{ route('articles.index') }}"
               class="mt-8 bg-[#E06020] hover:bg-[#B04010] text-white px-6 py-3 rounded-full transition">
                Lire les articles
            </a>

        </div>
    </section>
</x-site-layout>
