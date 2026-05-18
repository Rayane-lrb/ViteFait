<x-site-layout>
    <div class="p-5">
        <h1 class="text-2xl text-orange-500 font-bold">Créer un utilisateur</h1>
        <form action="/admin/users" method="post">
            @csrf
            <div class="flex flex-col justify-start mt-10 w-1/4 gap-2">
                <div>
                    <label for="name">Nom</label>
                    <input class="w-full rounded" type="text" name="name" placeholder="nom & prenom " value="{{old('name')}}">
                    @error('name')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="email">email</label>
                    <input type="text" name="email" class="rounded" placeholder="example@gmail.com" value="{{old('email')}}">
                    @error('email')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="birthday">Date de naissance</label>
                    <input name="birthday" type="date" class="rounded" value="{{old('birthday')}}">
                    @error('birthday')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password">Mot de passe</label>
                    <input name="password" type="password" class="rounded">
                    @error('password')
                        <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label for="password_confirmation">Confirmer</label>
                    <input type="password" name="password_confirmation" class="rounded">
                    @error('password_confirmation')
                    <p class="text-red-600">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex justify-end p-4 gap-2">
                    <a href="/admin/users" class="bg-red-200 text-red-500 p-2 rounded-xl hover:bg-[#ef4444] hover:text-white transition">Annuler</a>
                    <button class="text-orange-400 bg-[#243447]/70 p-2 px-2 rounded-xl hover:text-orange-500 hover:bg-[#1b2a3e] transition" type="submit">Créer</button>
                </div>
            </div>
        </form>
    </div>
</x-site-layout>
