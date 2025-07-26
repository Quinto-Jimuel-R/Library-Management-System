<nav class="flex flex-1 flex-col justify-between overflow-hidden">
    <div class="p-3 font-bold text-lg border-b-2 border-[#ebf2fa] flex mt-1">
        <div class="flex justify-center items-center px-2">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto">
        </div>
        <div class="flex justify-center items-center text-sm text-center text-white md:hidden lg:block">
            Library Management System
        </div>
    </div>

    <ul class="space-y-1 overflow-y-auto flex-1 m-2">
        <li>
            <a href="{{ route('users.book') }}" class="flex flex-row md:flex-col lg:flex-row items-center p-3 md:py-2 lg:p-3 rounded text-sm transition-all duration-100 text-white 
                {{ request()->routeIs('users.book') || request()->routeIs('users.book.search') ? 'bg-[#0b132b] text-[#3a506b] font-bold' : 'hover:font-bold hover:bg-white hover:text-[#3a506b]'}}">
                <i class="fa-solid fa-book mr-5 md:mr-0 lg:mr-5 mb-0 md:mb-1 lg:mb-0 w-8 text-center"></i>
                <span class="text-sm md:text-[10px] lg:text-sm">Books</span>
            </a>
        </li>
        <li>
            <a href="{{ route('users.history') }}" class="flex flex-row md:flex-col lg:flex-row items-center p-3 md:py-2 lg:p-3 rounded text-sm transition-all duration-100 text-white 
                {{ request()->routeIs('users.history') ? 'bg-[#0b132b] text-[#3a506b] font-bold' : 'hover:font-bold hover:bg-white hover:text-[#3a506b]'}}">
                <i class="fa-solid fa-timeline mr-5 md:mr-0 lg:mr-5 mb-0 md:mb-1 lg:mb-0 w-8 text-center"></i>
                <span class="text-sm md:text-[10px] lg:text-sm">History</span>
            </a>
        </li>
    </ul>

    <ul class="relative">
        <li class="cursor-pointer" id="userDropdownToggle">
            <div class="w-full md:w-auto md:mx-auto lg:w-full">
                <div class="bg-[#3a506b] p-2 md:px-4 lg:px-2 flex items-center md:justify-center gap-2">
                    <div class="shrink-0 flex">
                        <img src="{{ asset('images/User.png') }}" alt="Default" class="rounded-full h-10 w-10 block md:mx-auto">
                    </div>
                    <div class="flex-1 flex flex-col text-white text-sm overflow-hidden block md:hidden lg:flex">
                        <div class="font-bold truncate">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="truncate">
                            {{ Auth::user()->email }}
                        </div>
                    </div>
                    <div class="mr-2 shrink-0 text-white flex flex-col items-center text-[10px] block md:hidden lg:flex">
                        <i class="fa-solid fa-angle-up"></i>
                        <i class="fa-solid fa-angle-down"></i>
                    </div>
                </div>
            </div>
        </li>

        <!-- Dropdown (initially hidden) -->
        <div id="userDropdownMenu" class="absolute top-[-100%] mb-5 w-full text-black rounded z-50 border border-white bg-[#1c2541] transform scale-95 opacity-0 pointer-events-none transition-all duration-500 ease-out">
            <div class="bg-[#1c2541] rounded p-2 flex flex-col space-y-1">
                <div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full p-2 md:py-1 lg:py-2 rounded hover:cursor-pointer text-sm bg-[#0b132b] text-white flex flex-row md:flex-col lg:flex-row justify-start items-center hover:font-bold hover:bg-white hover:text-[#3a506b]">
                            <i class="fa-solid fa-right-from-bracket w-10 mb-0 md:mb-1 lg:mb-0"></i>
                            <span class=" text-sm md:text-[10px] lg:text-sm">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </ul>

</nav>