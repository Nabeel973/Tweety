<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">

    <form action="/tweets" method="POST">
        @csrf
        <textarea name="body" class="w-full" placeholder="What's up doc?"></textarea>
        <hr class="my-4">

        <footer class="flex justify-between">

            <div class="flex items-center text-sm">
               @if(auth()->user()->avatar)
                    <img src="{{auth()->user()->avatar()}}" alt=""
                        class="border rounded-full mr-2" height="40px" width="40px">
                @else
                        <img src="/images/default-user.png" alt="" class="border rounded-full mr-2" height="40px" width="40px">
                 @endif
            </div>

            <button type="submit"
            class="bg-blue-400 rounded-lg shadow py-2 px-2">
            Publish</button>

        </footer>
    </form>
    @error('body')
        <span class="text-red-500 font-sm mt-2">{{$message}}</span>
    @enderror

</div>
