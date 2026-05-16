<x-site-layout>
    <div class="flex justify-between flex-row p-5">
        <h1 class="text-2xl font-bold p-5 text-orange-600">Articles</h1>
        <a href="admin/articles/create" class="bg-orange-500 text-white font-bold p-3 rounded-lg text-center flex items-center hover:bg-[#B04010]">+ Nouvel Article</a>
    </div>
    <section class="grid grid-cols-4 gap-4 px-6 mb-2">
        @foreach($articles as $article)
            <a href="{{route('article.show', $article->id)}}" class="bg-white border border-orange-300 rounded-xl p-4 hover:scale-105 hover:shadow-lg transition flex flex-col h-44">
                <h2 class="font-semibold text-gray-800 line-clamp-3">{{ $article->title }}</h2>
                <div class="mt-auto flex justify-between items-center">
                    <span class="text-xs text-gray-400">Article</span>
                    <span class="bg-[#E06020] text-white text-xs px-2 py-0.5 rounded-full">
                        {{ $article->published_at->format('d M Y') }}
                    </span>
                </div>
            </a>
        @endforeach
    </section>
</x-site-layout>
