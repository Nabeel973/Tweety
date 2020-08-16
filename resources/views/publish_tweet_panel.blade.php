<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">

    <form action="/tweets" method="POST" enctype="multipart/form-data">
        @csrf
        <textarea name="body"  class="w-full" placeholder="What's up doc?" required style="outline: none;"></textarea>
        <hr class="my-4">

        <footer class="flex justify-between items-center">

            <div class="flex items-center text-sm">
                <img src="{{auth()->user()->avatar()}}" alt=""
                     class="border rounded-full mr-2" height="40px" width="40px">

               {{--         <input id="image" type="file" class="@error('image') is-invalid @enderror" name="image">

                @error('image')
                    <div class="text-red-800">{{ $message }}</div>
                @enderror--}}

            </div>

            <button type="submit"
            class="bg-blue-400 hover:bg-blue-500 rounded-full text-white shadow px-10 text-sm h-10 " style="outline: none;">
            Publish</button>
        </footer>
    </form>
    @error('body')
        <span class="text-red-500 font-sm mt-2">{{$message}}</span>
    @enderror

</div>
