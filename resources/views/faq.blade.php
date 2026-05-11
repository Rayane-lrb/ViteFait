<x-site-layout>
    <div class="text-white bg-[#1b2a3e] flex justify-center flex-col items-center min-h-screen">
        <div class="pt-4 flex items-center justify-center flex-col">
            <h1 class="text-2xl font-bold bg-orange-500 w-20 text-center rounded-full">FAQ</h1>
            <h1 class="text-4xl font-semibold">Questions fréquentes</h1>
        </div>
        <section class=" flex justify-center flex-col items-center p-4 w-full max-w-2xl">
        @foreach($faqs as $faq)
            <x-faq-card :faq="$faq"/>
        @endforeach
        </section>
    </div>
</x-site-layout>
