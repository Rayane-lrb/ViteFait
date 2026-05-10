<x-site-layout>
    <div class="flex justify-between flex-row p-5">
        <div>
            <h1 class="text-2xl font-bold text-[#243447]">Catégories</h1>
            <h4 class="text-[#243447]">Gérer les catégories</h4>
        </div>
        <a href="/admin/categories/create" class="bg-orange-400 text-white font-bold p-3 rounded-lg text-center flex items-center">+ Nouvelle Catégorie</a>
    </div>
    <section class="flex justify-center">
        <div class="flex flex-col w-2/4 justify-center p-4">
        <div class="flex flex-row gap-18 justify-center">
            <ul>
                <h1 class="text-[#748cab] font-semibold">NOM</h1>
            @foreach($categories as $category)
                <li class="font-semibold text-[#243447] mt-4">{{$category->name}}</li>
            @endforeach
            </ul>
            <ul>
                <h1 class="text-[#748cab] font-semibold">CRÉÉ LE</h1>
                @foreach($categories as $category)
                    <li class="text-[#2a6f97] mt-4">{{$category->created_at->format('d-M-Y')}}</li>
                @endforeach
            </ul>
            <ul>
                <h1 class="text-[#748cab] font-semibold">ACTIONS</h1>
                @foreach($categories as $category)
                    <li class="mt-4">
                        <a href="" class="border border-orange-400 p-2 text-orange-400 rounded hover:bg-orange-400 hover:text-white transition">Éditer</a>
                        <a href="" class="bg-red-200 text-red-500 rounded p-2 hover:bg-[#ef4444] hover:text-white transition">Supprimer</a>
                    </li>
                @endforeach
            </ul>
        </div>
            <div class="mt-4 mr-auto text-[#748cab]">{{$count}} catégories au total</div>
        </div>
    </section>
</x-site-layout>
