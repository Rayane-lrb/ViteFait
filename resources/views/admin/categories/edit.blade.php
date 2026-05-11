<x-site-layout>
    <div class="p-5">
        <h1 class="text-2xl text-orange-500 font-bold">Modifier une catégorie</h1>
        <form action="/admin/categories/{{$category->id}}" method="post">
            @method('PUT')
            @csrf
            <div class="flex flex-col justify-start mt-10 w-1/4">
                <label for="name" class="font-semibold">Catégorie</label>
                <input class="w-full rounded" type="text" name="name" placeholder="nom de catégorie " value="{{old('name', $category->name)}}">
                @error('name')
                    <p class="text-red-600">{{$message}}</p>
                @enderror
                <div class="flex justify-end p-4 gap-2">
                    <a href="/admin/categories" class="bg-red-200 text-red-500 p-2 rounded-xl hover:bg-[#ef4444] hover:text-white transition">Annuler</a>
                    <button class="text-orange-400 bg-[#243447]/70 p-2 px-2 rounded-xl hover:text-orange-500 hover:bg-[#1b2a3e] transition" type="submit">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</x-site-layout>
