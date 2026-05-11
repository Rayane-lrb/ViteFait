@props(['faq'])

    <div class="bg-[#243447] mb-10 w-full border border-gray-400 rounded mr-auto h-15 p-4 cursor-pointer transition h-auto">
        <p class="bg-orange-500/15 text-orange-400 rounded-full w-auto text-center min-w-auto max-w-25 mb-1">{{$faq->category->name}}</p>
        <a onclick="ToggleFaq(this)" class="flex flex-row font-bold text-lg pointer">{{$faq->question}} <img src="images/toggle_icon.svg" alt="toggle icon" class="ml-auto transition"></a>
        <div class="answer hidden text-orange-300 transition">
            <h5>{{$faq->answer}}</h5>
        </div>
    </div>
    <div class="hidden border-orange-500 rotate-44"></div>
