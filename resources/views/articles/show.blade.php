<x-site-layout>
    <section class="flex justify-center">
        <div class="border border-orange-300 m-4 rounded p-3 w-3/4">
            <div>
                <div class="flex flex-row justify-between">
                    <h2 class="font-bold text-2xl mb-4">{{$article->title}}</h2>
                    <div class="flex flex-row gap-2 items-stretch mb-2">
                        <a href="/admin/articles/{{$article->id}}/edit" class="border border-orange-400 px-2 text-orange-400 rounded hover:bg-orange-400 hover:text-white transition flex items-center">Éditer</a>
                        <form action="/admin/articles/{{$article->id}}" method="post" class="flex">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-200 text-red-500 rounded p-2 hover:bg-[#ef4444] hover:text-white transition">Supprimer</button>
                        </form>
                    </div>
                </div>
                @if($article->content_image && $article->content_image !== 'null')
                    <img src="{{asset('storage/' . $article->content_image)}}" alt="article image" class="w-full h-[390px] object-cover max-h-auto rounded">
                @endif
                <div class="p-4">
                    <h5 class="text-lg my-4">{{$article->text}}</h5>
                    <div class="mt-auto flex justify-between items-center mt-4">
                        <div class="flex flex-row gap-1 text-md text-gray-400">
                            <p>Writen by:</p>
                            <a href="/profile/{{$authorProfile->id}}">
                                    <p class="underline hover:text-[#E06020]">{{$authorProfile->username}}</p>
                            </a>
                        </div>
                        <span class="bg-[#E06020] text-white text-xs px-2 py-0.5 rounded-full">
                                {{ $article->published_at->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-site-layout>
