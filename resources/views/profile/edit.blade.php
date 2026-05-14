<x-site-layout>
    <section class="flex justify-center p-5 flex-wrap">
            <form action="/profile/{{$profile->id}}" method="post" class="w-full max-w-xl px-4">
                @csrf
                @method('PUT')
                <div class="flex flex-col items-start justify-center rounded-lg border border-gray-300 w-full max-w-md mx-auto p-4">
                    <div class="flex justify-center border border-gray-300 rounded-full p-3 max-w-30 mb-4">
                        <img src="{{$ownProfile->picture_path ?? asset('/images/person_icon.svg')}}" alt="">
                    </div>
                    <div class="self-start gap-1 w-full">
                        <div class="flex flex-col gap-2">
                            <label for="username" class="text-[#9ca3af]">username</label>
                            <input name="username" type="text" value="{{old('username', $profile->username)}}" class="h-8 rounded w-1/3">
                        </div>
                    </div>
                    <div class="flex flex-row gap-2 items-end w-full">
                        <div class="flex flex-col flex-1">
                            <label for="bio" class="text-[#9ca3af]">bio</label>
                            <input name="bio" type="text" value="{{old('bio', $profile->bio)}}" class="h-8 rounded w-full">
                        </div>
                        <button type="submit" class="h-8 text-orange-400 bg-[#243447]/70 px-3 rounded-lg hover:text-orange-500 hover:bg-[#1b2a3e] transition mt-auto">Modifier</button>
                    </div>
                </div>
            </form>
    </section>
</x-site-layout>
