@props(['comment'])
<x-panel class="bg-gray-100">
    <article class="flex bg-gray-100 space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/?id={{$comment->id}}" alt="Avatar image" width="60" height="60"
                 class="rounded">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{$comment->author->username}}</h3>
                <p class="text-xs">Posted
                    <time>{{$comment->created_at->format('l jS \of F Y h:i:s A')}}</time>
                </p>
            </header>
            <p>
                {{$comment->body}}
            </p>
        </div>
    </article>

</x-panel>
