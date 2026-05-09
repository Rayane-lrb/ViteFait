<x-site-layout>
    <section>
        <div style="background-image: url('{{ asset('images/welcome_image.png') }}')"
             class="bg-cover bg-center bg-no-repeat min-h-screen flex flex-col justify-center items-start text-white pl-10">

            <h1 class="text-4xl md:text-6xl font-bold text-center drop-shadow-lg">
                Déménagement
            </h1>
            <h1 class="text-4xl text-[#E06020]  font-bold text-center drop-shadow-lg">rapides et sécurisés</h1>
            <a href="{{ route('articles.index') }}"
               class="mt-8 bg-[#E06020] hover:bg-[#B04010] text-white px-6 py-3 rounded-full transition">
                Lire les articles
            </a>
        </div>
    </section>
    <section class="flex flex-row justify-center">
        <div style="background-image: url('{{asset('images/second_welcome_image.png')}}')">

        </div>
        <div>
        </div>
    </section>
    <section class="flex flex-row flex-wrap bg-orange-700 justify-center gap-40 p-10">
        <div class="">
            <img src="images/security_icon.svg" alt="security icon">
            <h3 class="text-xl text-white font-semibold">Sécurité</h3>
            <p class="text-white">Protection des biens et équipes</p>
        </div>
        <div>
            <img src="images/schedule_icon.svg" alt="schedule icon">
            <h3 class="text-xl text-white font-semibold">Ponctualité</h3>
            <p class="text-white">Respect des horaires et délais</p>
        </div>
        <div>
            <img src="images/headset_icon.svg" alt="headset icon">
            <h3 class="text-xl text-white font-semibold">Service client</h3>
            <p class="text-white">Écoute et accompagnement</p>
        </div>
        <div>
            <img src="images/package_icon.svg" alt="headset icon">
            <h3 class="text-xl text-white font-semibold">Soin & Précision</h3>
            <p class="text-white">Emballage et transport soignés</p>
        </div>
    </section>
</x-site-layout>
