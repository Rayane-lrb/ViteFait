<x-site-layout>
    <form action="" method="post"></form>
    @csrf
    @method('PUT')
    <div class="p-5">
        <h1 class="text-2xl text-orange-500 font-bold">Modifier une FAQ</h1>
        <form action="/admin/faqs" method="post">
            @csrf
            <div class="flex flex-col gap-2 m-4 w-1/3">
                <label for="question" class="font-semibold">Question</label>
                <input type="text" name="question" class="rounded" value="{{old('question', $faq->question)}}"/>
                @error('question')
                <p class="text-red-600">{{$message}}</p>
                @enderror

                <label for="answer" class="font-semibold">Réponse</label>
                <textarea rows="4" cols="50" class="rounded" name="answer">{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')
                <p class="text-red-600">{{$message}}</p>
                @enderror

                <label for="category_id" class="font-semibold">Catégorie</label>
                <select name="category_id" id="" class="rounded w-2/3">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @selected(old('category_id', $faq->category_id) == $category->id)>{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="flex justify-end p-4 gap-2">
                    <a href="/admin/faqs" class="bg-red-200 text-red-500 p-2 rounded-xl hover:bg-[#ef4444] hover:text-white transition">Annuler</a>
                    <button class="text-orange-400 bg-[#243447]/70 p-2 px-2 rounded-xl hover:text-orange-500 hover:bg-[#1b2a3e] transition" type="submit">Modifier</button>
                </div>
            </div>
        </form>
    </div>
</x-site-layout>
