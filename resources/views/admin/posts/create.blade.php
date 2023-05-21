<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="POST" class="mt-10" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"/>
            <x-form.textarea name="excerpt"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="body"/>


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
                <x-submit-button>Publish</x-submit-button>
            </div>
        </form>
    </x-setting>
</x-layout>
