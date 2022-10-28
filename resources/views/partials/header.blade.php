<div class="relative bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
        <div class="flex items-center justify-between py-6 md:justify-start md:space-x-10">
            <div class="flex justify-start lg:w-0 lg:flex-1">
                <a @auth href="{{ route('view.dashboard') }}" @endauth>
                    <span class="sr-only">Your Company</span>
                    <svg class="h-8 w-auto text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 283.46 101.2">
                        <polygon fill="currentColor" points="158.87 98.48 133.08 98.48 94.09 3.05 122.41 3.05 146.07 67.06 168.77 3.05 195.92 3.05 158.87 98.48" />
                        <path fill="currentColor" d="M226.44,43.59l23.47-3.49c5.43-.78,7.18-3.49,7.18-6.79,0-6.79-5.24-12.41-16.1-12.41-11.25,0-17.46,7.17-18.23,15.51l-22.89-4.85C201.42,16.63,215.19.14,240.79.14c30.26,0,41.51,17.07,41.51,36.27V83.35a107.16,107.16,0,0,0,1.16,15.13H259.8a64.79,64.79,0,0,1-1-11.44c-4.85,7.56-14,14.16-28.12,14.16-20.37,0-32.78-13.77-32.78-28.71,0-17.07,12.61-26.57,28.51-28.9m30.65,16.29V55.62l-21.53,3.29c-6.6,1-11.84,4.66-11.84,12,0,5.62,4.08,11.06,12.42,11.06,10.86,0,20.95-5.24,20.95-22.12" />
                        <path fill="currentColor" d="M72.16,64.73c-2.53,7-8.09,12.31-18.22,13.86-12.65,1.93-24.57-5.47-27-17.84L94.38,50.43c-.06-.39-.26-4.28-.82-7.92C88.93,12.21,68.63-3.72,39.49.74,15.33,4.43-3.92,27.39.68,57.49c4.87,31.83,30.53,46.94,56.42,43,20.68-3.16,33.14-16.14,37.24-31ZM43,21.39c14.57-2.23,22.12,6,23.94,15.37L24.79,43.21c-.74-8.72,5-19.8,18.25-21.82" />
                    </svg>
                </a>
            </div>

            @guest
            <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
                <a href="{{ route('login') }}" class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Sign in</a>
                <a href="{{ route('register') }}" class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Sign up</a>
            </div>
            @endguest
            @auth
            <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
                <a href="{{ route('view.profile') }}" class="inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">My profile</a>
                <a href="{{ route('logout') }}" class="ml-8 whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Logout</a>
            </div>
            @endauth
        </div>
    </div>

    <div class="absolute inset-x-0 top-0 origin-top-right transform p-2 transition md:hidden">
        <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
            <div class="px-5 pt-5 pb-6">
                <div class="flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
                    </div>
                    <div class="-mr-2">
                        <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Close menu</span>
                            <!-- Heroicon name: outline/x-mark -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
