<x-site-layout>
    <div class="flex justify-between flex-row p-5">
        <div>
            <h1 class="text-2xl font-bold text-[#243447]">Utilisateurs</h1>
            <h4 class="text-[#243447]">Gérer les utilisateur</h4>
        </div>
        <a href="/admin/users/create" class="bg-orange-500 text-white font-bold p-3 rounded-lg text-center flex items-center hover:bg-[#B04010]">+ Nouvel utilisateur</a>
    </div>
    <section class="flex items-center justify-center">
        <div class=" flex flex-col  items-center mb-10 bg-[#1b2a3e] text-white  rounded-xl p-4 overflow-x-auto">
            <div class="self-start mb-4">
                <h1 class="text-2xl font-bold">Dashboard</h1>
            </div>
            <div class="flex flex-row flex-wrap gap-8 justify-center w-3/4 p-4">
                <div class="text-center rounded bg-[#243447] p-4 border border-orange-500 flex-1 min-w-[150px]">
                    <p class="text-xs text-gray-400">Total utilisateurs</p>
                    <h2 class="text-xl font-bold text-orange-400">{{$count}}</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="flex justify-center my-4">
        <div>
            <table class="w-full text-left">
                <thead>
                <tr>
                    <th class="text-[#748cab] font-semibold p-3">NOM</th>
                    <th class="text-[#748cab] font-semibold p-3">CRÉÉ LE</th>
                    <th class="text-[#748cab] font-semibold p-3">ROLE</th>
                    <th class="text-[#748cab] font-semibold p-3">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="font-semibold text-[#243447] p-3">{{ $user->name }}</td>
                        <td class="text-[#2a6f97] p-3">{{ $user->created_at->format('d-M-Y') }}</td>
                        <td class="p-3 w-20">
                            <form action="/admin/users/{{$user->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <select name="is_admin" id="is_admin" onchange="this.form.submit()">
                                    <option value="0" @selected(!$user->is_admin)>User</option>
                                    <option value="1" @selected($user->is_admin)>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td class="p-3 flex gap-2">
                            <a href="/profile/{{ $user->id }}/edit" class="border border-orange-400 p-2 text-orange-400 rounded hover:bg-orange-400 hover:text-white transition">Éditer</a>
                            <form action="/admin/users/{{ $user->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-200 text-red-500 rounded p-2 hover:bg-[#ef4444] hover:text-white transition">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-4 mr-auto text-[#748cab]">{{$count}} catégories au total</div>
        </div>
    </section>
</x-site-layout>

