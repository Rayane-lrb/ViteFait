<x-site-layout>
    <section>
        <div class="border border-orange-300 m-4 rounded p-2">
            <h2 class="font-bold text-2xl">{{$article->title}}</h2>
            <h5 class="text-lg">{{$article->text}}</h5>
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
    </section>
</x-site-layout>
