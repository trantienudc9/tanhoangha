@vite(['resources/js/pages/product_form.js'])
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <button class="test">test</button>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="h-8">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">
                        {{ __('Trang chủ') }}
                    </x-nav-link>
                    <x-nav-link :href="route('product.create')" :active="request()->routeIs('product.create')">
                        {{ __('Thêm sản phẩm') }}
                    </x-nav-link>
                    <x-nav-link :href="route('image.background')" :active="request()->routeIs('image.background')">
                        {{ __('Ảnh') }}
                    </x-nav-link>
                    <x-nav-link :href="route('product.introduce')" :active="request()->routeIs('product.introduce')">
                        {{ __('Giới thiệu') }}
                    </x-nav-link>
                    <x-nav-link :href="route('product.introduce')" :active="request()->routeIs('product.introduce')" class="display_product">
                        {{ __('Sản phẩm') }}
                        <div
                            class="bg-white w-full md:w-7/12 py-4 px-4 mx-auto opacity-90 absolute z-40 left-28 top-16 hidden show_product">
                            <div class="grid css_effect grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="col-span-1 width_effect">
                                    <a href="#"
                                        class="block text-black font-bold text-lg mb-2 transition-transform transform hover:scale-105">SẢN
                                        PHẨM VỀ ĐÁ</a>
                                    <hr class="my-2">
                                    <ul class="leading-10">
                                        @foreach (config('supplies.stone') as $id => $itemStone)
                                            <li>
                                                <a href="{{ route('product.items', ['kind_product_type' => $id, 'product_type' => 1]) }}"
                                                    class="text-black">{{ $itemStone }}</a>
                                                <hr class="effect hidden">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-span-1">
                                    <a href="#"
                                        class="block font-bold text-black text-lg mb-2 transition-transform transform hover:scale-105">Sản
                                        phẩm về M&E</a>
                                    <hr class="my-2">
                                    <ul class="leading-10">
                                        @foreach (config('supplies.me') as $id => $itemMe)
                                            <li>
                                                <a href="{{ route('product.items', ['kind_product_type' => $id, 'product_type' => 2]) }}"
                                                    class="text-black">{{ $itemMe }}</a>
                                                <hr class="effect hidden">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-span-1">
                                    <a href="#"
                                        class="block font-bold text-lg text-black mb-2 transition-transform transform hover:scale-105">VẬT
                                        TƯ KIM KHÍ & TIÊU HAO NHÀ MÁY</a>
                                    <hr class="my-2">
                                    <ul class="leading-10">
                                        @foreach (config('supplies.metal') as $id => $itemMetal)
                                            <li>
                                                <a href="{{ route('product.items', ['kind_product_type' => $id, 'product_type' => 3]) }}"
                                                    class="text-black">{{ $itemMetal }}</a>
                                                <hr class="effect hidden">
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </x-nav-link>
                    <x-nav-link :href="route('product.recruitment')" :active="request()->routeIs('product.recruitment')">
                        {{ __('Tuyển dụng') }}
                    </x-nav-link>
                    <x-nav-link :href="route('product.contact')" :active="request()->routeIs('product.contact')">
                        {{ __('Liên hệ') }}
                    </x-nav-link>
                    <x-nav-link :href="route('product.introduce')" :active="request()->routeIs('product.introduce')">
                        {{ __('Tài khoản') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
