<ul>
    <li>
        <a href="{{route('tweets.index')}}" class="font-bold text-lg mb-4 block">
            Home
        </a>
    </li>
    <li>
        <a href="/explore" class="font-bold text-lg mb-4 block">
            Explore
        </a>
    </li>

    <li>
        <a href="{{route('profile',auth()->user()->username )}}" class="font-bold text-lg mb-4 block">
            Profile
        </a>
    </li>
    <li>
        <a href="{{route('logout')}}" class="font-bold text-lg mb-4 block">
            Logout
        </a>
    </li>
</ul>
