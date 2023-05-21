<x-layout>
    <x-setting :heading="'Edit Post: '.$post->title">
        <form action="/admin/posts/{{$post->id}}" method="POST" class="mt-10" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)"/>
            <x-form.textarea name="excerpt">{{old('title', $post->excerpt)}}</x-form.textarea>
            <div class="flex ,t-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file"/>
                </div>
                <img src="{{asset('storage/'.$post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl"
                     width="100">
            </div>
            <x-form.textarea name="body">{{old('title', $post->body)}}</x-form.textarea>


            <div class="mb-6">

                <x-form.label name="category_id"/>

                <select name="category_id" id="category_id">
                    @php
                        $categories = App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id"/>

            </div>


            <div class="mb-6">
                <x-submit-button>Update</x-submit-button>
            </div>
        </form>
    </x-setting>
</x-layout>
