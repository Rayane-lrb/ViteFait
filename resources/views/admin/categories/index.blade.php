<x-site-layout>
    <ul>
    @foreach($categories as $category)
        <li>{{$category->name}}</li>
    @endforeach
    </ul>
</x-site-layout>
