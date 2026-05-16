<x-site-layout>
    <div class="p-5">
        <h1 class="text-2xl text-orange-500 font-bold">Modifier un article</h1>
        <form action="/admin/articles/{{$article->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-4">
                <div class="flex flex-col">
                    <label for="title" class="font-semibold">Titre</label>
                    <input name="title" type="text" class="rounded" value="{{old('title', $article->title)}}">
                    @error('title')
                    <p class="text-red-400">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="text" class="font-semibold">Contenu</label>
                    <textarea name="text"  cols="60" rows="30" class="rounded">{{old('content', $article->text)}}</textarea>
                    @error('text')
                    <p class="text-red-400">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="content_image" class="font-semibold">Image</label>
                    <input name="content_image" type="file" class="rounded w-1/3 bg-orange-400 border border-[#2a2d35]">
                    @error('content_image')
                    <p class="text-red-400">{{$message}}</p>
                    @enderror
                </div>
                <div class="ml-auto">
                    <a href="{{ route('articles.index') }}" class="bg-red-200 text-red-500 p-2 rounded-xl hover:bg-[#ef4444] hover:text-white transition">Annuler</a>
                    <button type="submit" class="text-orange-400 bg-[#243447]/70 p-2 px-2 rounded-xl hover:text-orange-500 hover:bg-[#1b2a3e] transition">Modifier</button>
                </div>
            </div>

        </form>
    </div>
</x-site-layout>
