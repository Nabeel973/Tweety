
<div class="flex p-4 border-b border-b-gray-400 content-around">
    <div class="mr-2 flex-shrink-0 w-1/8">
        <a href="{{route('profile',$tweet->user->username)}}">
            <img src="{{ $tweet->user->avatar()}}"  alt="" class="rounded-full mr-2" height="40px" width="40px">
        </a>
    </div>

    <div class="lg:w-11/12">
        <a href="{{route('profile',$tweet->user->username)}}">
             <h5 class="font-bold  mb-4">{{ $tweet->user['name'] }}</h5>
        </a>
        <p class="text-sm ">{{$tweet->body}}.</p>

        {{--likes--}}
        <div class="flex items-center">
            <form method="POST" action="/tweets/{{$tweet->id}}/like">
                @csrf
                <div class="flex">
                    <svg viewBox="0 0 20 20" class=" {{$tweet->isLikedBy(current_user()) ? 'text-blue-500':'text-gray-500' }} mr-1 w-3">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g class="fill-current">
                                <path d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z" id="Fill-97"></path>
                            </g>
                        </g>
                    </svg>
                    <button  class="{{$tweet->isLikedBy(current_user()) ? 'text-blue-500':'text-gray-500'}} text-sm" style="outline: none;">{{$tweet->likes ?:0}}</button>
                </div>
            </form>

            {{--Dislike--}}
            <form action="/tweets/{{$tweet->id}}/like" method="POST">
                @csrf
                @method('DELETE')
                <div class="ml-4 flex">
                    <svg viewBox="0 0 20 20" class="text-gray-500 mr-1 w-3 {{$tweet->isDislikedBy(current_user()) ? 'text-gray-500':'text-blue-500' }}">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g class="fill-current">
                                <path d="M11.0010436,20 C9.89589787,20 9.00000024,19.1132936 9.0000002,18.0018986 L9,12 L1.9973917,12 C0.894262725,12 0,11.1122704 0,10 L0,8 L2.29663334,1.87564456 C2.68509206,0.839754676 3.90195042,8.52651283e-14 5.00853025,8.52651283e-14 L12.9914698,8.52651283e-14 C14.1007504,8.52651283e-14 15,0.88743329 15,1.99961498 L15,10 L12,17 L12,20 L11.0010436,20 L11.0010436,20 Z M17,10 L20,10 L20,0 L17,0 L17,10 L17,10 Z" id="Fill-97"></path>
                            </g>
                        </g>
                    </svg>
                    <button type="submit" class="text-xs text-gray-500 {{$tweet->isDislikedBy(current_user()) ? 'text-gray-500':'text-blue-500'}}" style="outline: none;">{{$tweet->dislikes ?:0}}</button>
                </div>
            </form>
        </div>
    </div>

    @can('edit-delete',$tweet)
        <div class="w-1/12 flex justify-between ">
       <div class="mt-1">

           <svg viewBox="0 0 20 20" version="1.1" class="text-gray-500 hover:text-blue-500 w-3">
               <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                   <g class="fill-current">
                       <path d="M12.2928932,3.70710678 L0,16 L0,20 L4,20 L16.2928932,7.70710678 L12.2928932,3.70710678 Z M13.7071068,2.29289322 L16,0 L20,4 L17.7071068,6.29289322 L13.7071068,2.29289322 Z" id="Combined-Shape"></path>
                   </g>
               </g>
           </svg>
       </div>
        <div>

                <form action="{{ route('tweets.destroy',$tweet->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="outline: none;">
                        <svg viewBox="0 0 20 20" class="text-gray-500 hover:text-red-500 w-3">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g class="fill-current">
                                    <polygon id="Combined-Shape" points="10 8.58578644 2.92893219 1.51471863 1.51471863 2.92893219 8.58578644 10 1.51471863 17.0710678 2.92893219 18.4852814 10 11.4142136 17.0710678 18.4852814 18.4852814 17.0710678 11.4142136 10 18.4852814 2.92893219 17.0710678 1.51471863 10 8.58578644"></polygon>
                                </g>
                            </g>
                        </svg>
                    </button>
                </form>

        </div>

    </div>
    @endcan
</div>

