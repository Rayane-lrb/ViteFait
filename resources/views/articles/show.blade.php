<x-site-layout>
    <section class="flex justify-center">
        <div class="border border-orange-300 m-4 rounded p-3 w-3/4">
            <div>
                <h2 class="font-bold text-2xl mb-4">{{$article->title}}</h2>
                @if($article->content_image && $article->content_image !== 'null')
                    <img src="{{$article->content_image}}" alt="article image" class="w-full h-[390px] object-cover max-h-auto rounded">
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
