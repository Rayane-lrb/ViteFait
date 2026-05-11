<x-site-layout>
    <h1>Creer une catégorie</h1>
    <form action="/admin/categories" method="post">
        @csrf

        <label for="name"></label>
        <input type="text" name="name" placeholder="nom de catégorie">
        @error('name')
            <p class="text-red-600">this field is required</p>
        @enderror
        <button type="submit">Créé</button>

    </form>
</x-site-layout>
