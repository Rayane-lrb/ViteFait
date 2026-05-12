<x-site-layout>
    <div class="flex justify-between flex-row p-5 bg-[#1b2a3e]">
        <div>
            <h1 class="text-2xl font-bold text-orange-500">FAQ's</h1>
            <h4 class="text-orange-500">Gérer FAQ's</h4>
        </div>
        <a href="/admin/faqs/create" class="bg-orange-500 text-white font-bold p-3 rounded-lg text-center flex items-center hover:bg-[#B04010]">+ Nouvelle FAQ</a>
    </div>
    <div class="text-white bg-[#1b2a3e] flex justify-center flex-col items-center min-h-screen">
        <div class="pt-4 flex items-center justify-center flex-col">
            <h1 class="text-2xl font-bold bg-orange-500 w-20 text-center rounded-full">FAQ</h1>
            <h1 class="text-4xl font-semibold">Questions fréquentes</h1>
            <div class="mt-4 text-[#748cab]">{{$faqsCount}} Faq's au total</div>
        </div>
        <section class=" flex justify-center flex-col items-center p-4 w-full max-w-2xl">
            @foreach($faqs as $faq)
                <div class="flex justify-center items-center w-full">
                <x-faq-card :faq="$faq"/>
                <div class="flex flex-row ml-2 gap-2">
                    <a href="/admin/faqs/{{$faq->id}}/edit" class="hover:scale-105"><img src="{{asset('/images/edit_icon.svg')}}" alt="edit icon"></a>
                    <a href="" class="hover:scale-105"><img src="{{asset('/images/delete_icon.svg')}}" alt="delete icon"></a>
                </div>
                </div>
            @endforeach
        </section>
    </div>
</x-site-layout>
