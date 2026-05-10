<x-site-layout>
    <div class="text-white bg-[#1b2a3e] flex justify-center flex-col items-center min-h-screen">
        <div class="pt-4 flex items-center justify-center flex-col">
            <h1 class="text-2xl font-bold bg-orange-500 w-20 text-center rounded-full">FAQ</h1>
            <h1 class="text-4xl font-semibold">Questions fréquentes</h1>
        </div>
        <section class=" flex justify-center flex-col items-center p-4 w-full max-w-2xl">
        @foreach($faqs as $faq)
            <div class="bg-[#243447] mb-10 w-full border border-gray-400 rounded mr-auto h-15 p-4 cursor-pointer transition h-auto">
                <a onclick="ToggleFaq(this)" class="flex flex-row font-bold text-lg pointer">{{$faq->question}} <img src="images/toggle_icon.svg"
                                                                                                                 alt="toggle icon" class="ml-auto transition"></a>
                <div class="answer hidden text-orange-300 transition">
                    <h5>{{$faq->answer}}</h5>
                </div>
            </div>
                <div class="hidden border-orange-500 rotate-44"></div>
        @endforeach
        </section>
    </div>
</x-site-layout>
