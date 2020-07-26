<div class="bg-gray-200  rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4 items-center">Following</h3>
    <ul>
        @if(auth()->user())
           @forelse(auth()->user()->follows as $user)
                <li class="mb-4">
                    <div >
                        <a href="{{route('profile',$user->username)}}" class="flex items-center text-sm">
                            <img height="40px" width="40px" src="{{$user->avatar()}}" alt="" class="rounded-full mr-2">
                            {{$user->username}}
                        </a>
                    </div>
                </li>
            @empty
               <p>No Friends Yet</p>
           @endforelse
         @endif
    </ul>
</div>
