<x-site-layout>
    <section>
        <div class="border border-orange-300 m-4 rounded p-2">
            <h2 class="font-bold text-xl">{{$article->title}}</h2>
            <p>{{$article->text}}</p>
            <div class="mt-auto flex justify-between items-center">
                <span class="text-xs text-gray-400">Article</span>
                <span class="bg-[#E06020] text-white text-xs px-2 py-0.5 rounded-full">
                        {{ $article->published_at->format('d M Y') }}
                    </span>
            </div>
        </div>
    </section>
</x-site-layout>
