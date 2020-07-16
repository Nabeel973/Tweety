<h3 class="font-bold text-xl mb-4 items-center">Following</h3>
<ul>
    @foreach (auth()->user()->follows as $user)

        <li class="mb-4">
            <div>
                <a href="{{route('profile',$user->name)}}" class="flex items-center text-sm">
                    <img src="{{ $user->avatar() }}" alt=""
                         class="rounded-full mr-2" height="40px" width="40px">
                    {{ $user->name }}
                </a>
            </div>
        </li>
    @endforeach
</ul>

