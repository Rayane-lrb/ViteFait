<x-site-layout>
<h1>Articles</h1>
    <section>
        @foreach($articles as $article)
            <div>
                <h2>{{$article => ;}}</h2>
            </div>
        @endforeach
    </section>
</x-site-layout>
