<x-site-layout>
    <div class="flex flex-row w-full min-h-screen">
        <section class="bg-[#1c1f27] flex flex-col flex-wrap justify-around w-2/5 p-10 border-r border-[#2a2d35]">
            <div>
                <h3 class="text-white font-semibold text-2xl">Vite Fait</h3>
            </div>
            <div>
                <h1 class="text-white text-4xl font-semibold">Déménagement</h1>
                <h1 class="text-[#e87722] text-4xl font-semibold">rapide et sécurisé.</h1>
            </div>
            <div class="mb-20">

            </div>
        </section>
        <section class="bg-[#15171e] w-3/5 p-10 flex flex-col justify-center">
            <h1 class="text-white text-2xl font-semibold mb-1">Créer mon compte</h1>
            <form action="" method="post" class="flex flex-col gap-4">
                @csrf
                <div class="flex flex-col gap-4 justify-center items-center">
                    <div class="flex flex-col gap-1.5 min-w-50 w-1/3">
                            <label for="" class="text-[#9ca3af] text-xs font-medium">Nom</label>
                            <input type="text" class="bg-[#1c1f27] border border-[#2a2d35] rounded text-white"></div>
                    <div class="flex flex-col gap-1.5 min-w-50 w-1/3">
                        <label for="" class="text-[#9ca3af] text-xs font-medium">Adresse e-mail</label>
                        <input type="email" class="bg-[#1c1f27] border border-[#2a2d35] rounded text-white">
                    </div>
                    <div class="flex flex-col gap-1.5 min-w-50 w-1/3">
                        <label for="" class="text-[#9ca3af] text-xs font-medium rounded">Mot de passe</label>
                        <input type="password" class="bg-[#1c1f27] border border-[#2a2d35] rounded text-white">
                    </div>
                    <button class="text-white border border-[#2a2d35] p-3 w-1/3 rounded-md font-semibold hover:bg-[#22252f] hover:border-[#3a3d45]">Créer mon compte</button>
                    <div class="flex flex-row mb-20 gap-1">
                        <p class="text-[#9ca3af]">Deja un compte?</p>
                        <a href="" class="text-[#e87722] underline">Se connecter</a>
                    </div>
                </div>
            </form>
        </section>
    </div>
</x-site-layout>
