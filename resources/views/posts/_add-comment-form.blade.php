@auth()
    <x-panel>
        <form action="/posts/{{$post->slug}}/comments" method="POST">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/?id={{  auth()->user()->id }}" alt="Avatar image"
                     width="40"
                     height="40"
                     class="rounded-full">
                <h2 class="ml-3"> Want to participate?</h2>
            </header>
            <div class="mt-6">
                            <textarea name="body"
                                      id="body"
                                      class="w-full text-xs focus:outline-none focus:ring"
                                      cols="30"
                                      rows="10"
                                      required
                                      placeholder="Comment body"></textarea>
                @error('body')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6 ">
                <x-submit-button/>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">log
            in </a>to
        leave a comment!
    </p>
@endauth
