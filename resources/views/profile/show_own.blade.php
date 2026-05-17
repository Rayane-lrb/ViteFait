<x-site-layout>
    <section class="flex justify-center p-5">
        <div class="flex flex-col items-center justify-center rounded-lg border border-gray-300 w-1/3 p-5">
            <div class="flex justify-center border border-gray-300 rounded-full p-3 max-w-30 mb-4">
                <img src="{{$profile->picture_path ? Storage::url($profile->picture_path) : asset('/images/person_icon.svg')}}" alt="profile picture" class="w-16 h-16 rounded-full object-cover">
            </div>
            <div class="self-start gap-1">
                <div class="flex flex-row gap-2">
                    <label class="text-[#9ca3af]">username:</label>
                    <h3>{{$profile->username}}</h3>
                </div>
                <div class="flex flex-row gap-2">
                    <label class="text-[#9ca3af]">name:</label>
                    <p>{{$profile->user->name}}</p>
                </div>
                <p class="flex flex-row gap-1"><img src="{{asset('/images/calendar_icon.svg')}}" alt="">{{$profile->birthday->format('d-m-Y')}}</p>
            </div>
            <h5>{{$profile->bio ?? 'no bio yet'}}</h5>
            <a href="{{route('profile.edit', $profile->id)}}" class="ml-auto hover:scale-105"><img src="{{asset('images/edit_icon.svg')}}" alt=""></a>
        </div>
    </section>
</x-site-layout>

