<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nur Hasya Portfolio</title>
        @vite('resources/css/app.css')
        @vite(['resources/js/app.js'])
    </head>

    {{-- navbar --}}
    <nav id="navbar" class="bg-white sticky border border-white rounded-lg top-5 z-30 me-24 ms-24 mt-5 p-3">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
                        Icon when menu is closed.

                        Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                        Icon when menu is open.

                        Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        {{-- <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"> --}}
                        <a href="#" class="font-extrabold text-4xl text-black">Nur Hasya</a>
                    </div>
                </div>

                <div class="relative ml-3">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-7">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="#contact" class="text-black hover:black hover:text-black rounded-md px-3 py-2 text-xl font-medium">About</a>
                            <a href="#work" class="text-black hover:black hover:text-black rounded-md px-3 py-2 text-xl font-medium">Work Experiences</a>
                            <a href="#project" class="text-black hover:black hover:text-black rounded-md px-3 py-2 text-xl font-medium">Projects</a>
                            {{-- <a href="#skill" class="text-black hover:black hover:text-black rounded-md px-3 py-2 text-xl font-medium">Skills</a> --}}
                            <a href="#about" class="bg-gray-900 text-white rounded-md px-3 py-2 text-xl font-medium" aria-current="page">Contact Me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#about" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">About</a>
                <a href="#work" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Work Experiences</a>
                <a href="#project" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
                <a href="#skill" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Skills</a>
                <a href="#contact" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Contact Me</a>
            </div>
        </div>
    </nav>

    <body class="bg-black">
    {{-- <body class="bg-gradient-to-r from-black via-slate-500 to-transparent"> --}}
        {{-- home --}}
        <section id="about">
            <div
            x-data="{
                text: '',
                textArray : ['I am Nur Hasya'],
                textIndex: 0,
                charIndex: 0,
                typeSpeed: 110,
                cursorSpeed: 550,
                pauseEnd: 1500,
                pauseStart: 20,
                direction: 'forward',
            }"
            x-init="$nextTick(() => {
                let typingInterval = setInterval(startTyping, $data.typeSpeed);

                function startTyping(){
                    let current = $data.textArray[ $data.textIndex ];

                    // check to see if we hit the end of the string
                    if($data.charIndex > current.length){
                            $data.direction = 'backward';
                            clearInterval(typingInterval);

                            setTimeout(function(){
                                typingInterval = setInterval(startTyping, $data.typeSpeed);
                            }, $data.pauseEnd);
                    }

                    $data.text = current.substring(0, $data.charIndex);

                    if($data.direction == 'forward')
                    {
                        $data.charIndex += 1;
                    }
                    else
                    {
                        if($data.charIndex == 0)
                        {
                            $data.direction = 'forward';
                            clearInterval(typingInterval);
                            setTimeout(function(){
                                $data.textIndex += 1;
                                if($data.textIndex >= $data.textArray.length)
                                {
                                    $data.textIndex = 0;
                                }
                                typingInterval = setInterval(startTyping, $data.typeSpeed);
                            }, $data.pauseStart);
                        }
                        {{-- $data.charIndex -= 1; --}}
                    }
                }

                setInterval(function(){
                    if($refs.cursor.classList.contains('hidden'))
                    {
                        $refs.cursor.classList.remove('hidden');
                    }
                    else
                    {
                        $refs.cursor.classList.add('hidden');
                    }
                }, $data.cursorSpeed);

            })"
            >
                <div class="flex justify-center place-items-center h-screen gap-x-14">
                    <div class="flex-col text-white gap-8">
                        <div>
                            <span class="text-2xl">
                                Hello!
                            </span>
                        </div>
                        <div>
                            <p class="text-7xl font-bold leading-tight" x-text="text"></p>
                            <span class="absolute right-0 w-2 -mr-2 bg-black h-3/4" x-ref="cursor"></span>
                        </div>
                        <div>
                            <span class="text-4xl font-light italic">
                                I am a Full Stack Web Developer
                            </span>
                        </div>
                        <div class="flex gap-5">
                            <button class="mt-4 align-middle select-none font-sans font-bold text-center uppercase
                                transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none
                                text-xs py-3 px-6 rounded-lg bg-white text-black shadow-md shadow-gray-900/10
                                hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="button">
                                Contact Me
                            </button>
                            <button onclick="window.print()" class="mt-4 align-middle select-none font-sans font-bold text-center uppercase outline
                                transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none
                                text-xs py-3 px-6 rounded-lg bg-black text-white shadow-md shadow-gray-900/10
                                hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none" type="button">
                                Download Resume
                            </button>
                        </div>
                    </div>

                    <div>
                        <img class="h-96" src="{{ asset('images/avatar2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>

        {{-- work experiences --}}
        <section id="contact">
            <div class="container">
                <section class="one clearfix">
                    <div class="left">
                        {{-- experience 1 --}}
                        <div>
                            <div class="flex">
                                <div>
                                    <span class="text-gray-400">March 2023 - present</span>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="text-white">Web Developer at Byond Tech Global Berhad</span>
                                    <span class="text-gray-400">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                    </span>
                                    <div>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Alpine JS</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Livewire</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Bootstrap</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- experience 2 --}}
                        <div>
                            <div class="flex">
                                <div>
                                    <span class="text-gray-400">March 2023 - present</span>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="text-white">Web Developer at Byond Tech Global Berhad</span>
                                    <span class="text-gray-400">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                    </span>
                                    <div>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Alpine JS</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Livewire</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Bootstrap</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- experience 3 --}}
                        <div>
                            <div class="flex">
                                <div>
                                    <span class="text-gray-400">March 2023 - present</span>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="text-white">Web Developer at Byond Tech Global Berhad</span>
                                    <span class="text-gray-400">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                    </span>
                                    <div>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Alpine JS</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Livewire</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Bootstrap</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Tailwind CSS</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- experience 4 --}}
                        <div>
                            <div class="flex">
                                <div>
                                    <span class="text-gray-400">March 2023 - present</span>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <span class="text-white">Web Developer at Byond Tech Global Berhad</span>
                                    <span class="text-gray-400">
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry
                                    </span>
                                    <div>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Alpine JS</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Livewire</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Bootstrap</span>
                                        <span class="inline-flex items-center rounded-md bg-gray-400 px-2 py-1 text-xs font-medium text-gray-950 ring-1 ring-inset ring-gray-500/10">Tailwind CSS</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div></div>
                        <div></div>
                        <div></div> --}}
                    </div>
                    <div class="right">
                        <div class="right-child">
                            {{-- <img src="{{ asset('images/experience.png') }}" /> --}}
                            <h2 class="text-white text-right py-10 font-bold text-5xl">Experiences</h2>
                            <span class="text-white text-right">These are the projects I have worked on</span>
                        </div>
                    </div>
                </section>

                <div class="bottom"></div>
            </div>
        </section>

        {{-- about --}}
        {{-- <section>
            <div>
                <span>I'm Nur Hasya</span>
                <div class="flex">
                    <div>
                        <img class="h-96" src="{{ asset('images/avatar2.png') }}" alt="">
                    </div>

                    <div class="flex-col">
                        <div>
                            <span class="text-white font-extrabold text-4xl">
                                I am a Web Developer
                            </span>
                        </div>
                        <div class="text-wrap">
                            <h1 class="text-white font-normal text-2xl">
                                With over 1 year of experience in web development, I specialize in utilizing the Laravel framework to create
                                robust and dynamic web applications. My expertise lies in leveraging Laravel's powerful features to develop
                                efficient, scalable, and secure solutions tailored to meet clients' needs. From crafting elegant front-end
                                designs to implementing complex back-end functionalities, I am dedicated to delivering high-quality,
                                maintainable code that exceeds expectations. My passion for staying updated with the latest web development
                                trends and continuous learning ensures that I bring innovative solutions to every project I undertake.
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- projects --}}
        <section class="h-screen" id="project">
            <div class="mt-5">
                <div class="flex justify-center place-items-center mb-5">
                    <h1 class="text-white font-extrabold text-5xl">Projects</h1>
                </div>
                {{-- <div class="flex gap-10 justify-center"> --}}
                <div class="flex flex-wrap justify-center place-items-center gap-5">
                    <div class="rounded-lg overflow-hidden border border-neutral-200/60 bg-white text-neutral-700 shadow-sm w-[380px]">
                        <div class="relative p-5">
                            <img src="{{ asset('images/logo_jobportal.png') }}" class="w-full h-auto" />
                        </div>
                        <div class="p-7">
                            <h2 class="mb-2 text-lg font-bold leading-none tracking-tight">MySyarikat Jobs</h2>
                            <p class="mb-5 text-neutral-500">This card element can be used to display a product, post, or any other type of data.</p>
                            <button class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium text-white transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-neutral-950 hover:bg-neutral-950/90">
                                View Project
                            </button>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden border border-neutral-200/60 bg-white text-neutral-700 shadow-sm w-[380px]">
                        <div class="relative p-5">
                            <img src="{{ asset('images/logo_jobportal.png') }}" class="w-full h-auto" />
                        </div>
                        <div class="p-7">
                            <h2 class="mb-2 text-lg font-bold leading-none tracking-tight">MySyarikat Jobs</h2>
                            <p class="mb-5 text-neutral-500">This card element can be used to display a product, post, or any other type of data.</p>
                            <button class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium text-white transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-neutral-950 hover:bg-neutral-950/90">
                                View Project
                            </button>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden border border-neutral-200/60 bg-white text-neutral-700 shadow-sm w-[380px]">
                        <div class="relative p-5">
                            <img src="{{ asset('images/logo_jobportal.png') }}" class="w-full h-auto" />
                        </div>
                        <div class="p-7">
                            <h2 class="mb-2 text-lg font-bold leading-none tracking-tight">MySyarikat Jobs</h2>
                            <p class="mb-5 text-neutral-500">This card element can be used to display a product, post, or any other type of data.</p>
                            <button class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium text-white transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-neutral-950 hover:bg-neutral-950/90">
                                View Project
                            </button>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden border border-neutral-200/60 bg-white text-neutral-700 shadow-sm w-[380px]">
                        <div class="relative p-5">
                            <img src="{{ asset('images/logo_jobportal.png') }}" class="w-full h-auto" />
                        </div>
                        <div class="p-7">
                            <h2 class="mb-2 text-lg font-bold leading-none tracking-tight">MySyarikat Jobs</h2>
                            <p class="mb-5 text-neutral-500">This card element can be used to display a product, post, or any other type of data.</p>
                            <button class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium text-white transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-neutral-950 hover:bg-neutral-950/90">
                                View Project
                            </button>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden border border-neutral-200/60 bg-white text-neutral-700 shadow-sm w-[380px]">
                        <div class="relative p-5">
                            <img src="{{ asset('images/logo_jobportal.png') }}" class="w-full h-auto" />
                        </div>
                        <div class="p-7">
                            <h2 class="mb-2 text-lg font-bold leading-none tracking-tight">MySyarikat Jobs</h2>
                            <p class="mb-5 text-neutral-500">This card element can be used to display a product, post, or any other type of data.</p>
                            <button class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium text-white transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-neutral-950 hover:bg-neutral-950/90">
                                View Project
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- skills --}}
        {{-- <section class="h-screen" id="skill">
            <div>
                <div class="flex justify-center place-items-center">
                    <h1 class="text-white font-extrabold text-5xl mb-5">My Skills</h1>
                </div>
                <div class="flex flex-wrap gap-10 justify-center">
                    <!-- php -->
                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                        <div class="relative">
                            <img src="{{ asset('images/php.svg') }}" class="w-60 p-9" />
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div>
                                    <a href="https://www.php.net/" class="bg-white text-black py-2 px-4 rounded-md">php</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- laravel -->
                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                        <div class="relative">
                            <img src="{{ asset('images/laravel.png') }}" class="w-60" />
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div>
                                    <a href="https://laravel.com/" class="bg-white text-black py-2 px-4 rounded-md">Laravel</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- mysql -->
                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                        <div class="relative">
                            <img src="{{ asset('images/mysql.png') }}" class="w-60 p-9" />
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div>
                                    <a href="https://www.mysql.com/" class="bg-white text-black py-2 px-4 rounded-md">MySQL</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- alpine js -->
                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                        <div class="relative">
                            <img src="{{ asset('images/alpinejs.svg') }}" class="w-60 p-9" />
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div>
                                    <a href="https://alpinejs.dev/" class="bg-white text-black py-2 px-4 rounded-md">Alpine JS</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- laravel livewire -->
                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                        <div class="relative">
                            <img src="{{ asset('images/livewire.png') }}" class="w-60 p-9" />
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div>
                                    <a href="https://livewire.laravel.com/" class="bg-white text-black py-2 px-4 rounded-md">Livewire</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- laravel filament -->
                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                        <div class="relative">
                            <img src="{{ asset('images/filament.png') }}" class="w-60 p-9" />
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div>
                                    <a href="https://filamentphp.com/" class="bg-white text-black py-2 px-4 rounded-md">Filament</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- bootstrap -->
                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                        <div class="relative">
                            <img src="{{ asset('images/bootstrap.png') }}" class="w-60" />
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div>
                                    <a href="https://tailwindcss.com/" class="bg-white text-black py-2 px-4 rounded-md">Bootstrap</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- tailwind -->
                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                        <div class="relative">
                            <img src="{{ asset('images/tailwind.png') }}" class="w-60 p-9" />
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <div>
                                    <a href="https://www.php.net/" class="bg-white text-black py-2 px-4 rounded-md">Tailwind CSS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        {{-- contact me --}}
        <div class="flex justify-center">
            <div class="bg-white border rounded-lg shadow-lg p-7 border-neutral-200/60 w-3/4">
                <div class="flex justify-between py-7 px-5">
                    <h1 class="text-4xl font-bold">Contact me</h1>
                    <span>Interested in working together?</span>
                    <div x-data="{ modalOpen: false }"
                        @keydown.escape.window="modalOpen = false"
                        :class="{ 'z-40': modalOpen }" class="relative w-auto h-auto">
                        <button @click="modalOpen=true" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-black text-white border rounded-md hover:bg-neutral-100 active:bg-white focus:bg-white focus:text-black focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">Get in touch</button>
                        <template x-teleport="body">
                            <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>
                                <div x-show="modalOpen"
                                    x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="ease-in duration-300"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-gray-900 bg-opacity-50 backdrop-blur-sm">
                                </div>

                                {{-- modal content --}}
                                <div x-show="modalOpen"
                                    x-trap.inert.noscroll="modalOpen"
                                    x-transition:enter="ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-90"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="ease-in duration-200"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-90"
                                    class="relative w-full py-6 bg-white shadow-md px-7 bg-opacity-90 drop-shadow-md backdrop-blur-sm sm:max-w-lg sm:rounded-lg">
                                    <div class="flex items-center justify-between pb-3">
                                        <div>
                                            <h3 class="text-lg font-semibold">Get in touch with me</h3>
                                            <span class="text-sm text-gray-500">I'm ready to learn about your project. Leave your details below and I will get back to you ASAP</span>
                                        </div>
                                        <button @click="modalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                        </button>
                                    </div>
                                    <div class="relative w-auto pb-8">
                                        {{-- <p>This is placeholder text. Replace it with your own content.</p> --}}
                                        <form>
                                            <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                                <div class="sm:col-span-3">
                                                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>

                                                <div class="sm:col-span-3">
                                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                                                    <div class="mt-2">
                                                        <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                                <div class="sm:col-span-3">
                                                    <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Type of project</label>
                                                    <div class="mt-2">
                                                        <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>

                                                <div class="sm:col-span-3">
                                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Budget</label>
                                                    <div class="mt-2">
                                                        <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5 col-span-full">
                                                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Additional details</label>
                                                <div class="mt-2">
                                                    <textarea id="about" name="about" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="flex flex-col-reverse sm:flex-row sm:justify-between sm:space-x-2">
                                        <button @click="modalOpen=false" type="button" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-neutral-900 focus:ring-offset-2 bg-neutral-950 hover:bg-neutral-900">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <footer class="h-screen bg-white" id="contact">
            <div class="grid justify-center">
                <div class="flex justify-center">
                    <img class="h-96" src="{{ asset('images/logo.png') }}" alt="">
                </div>
                <div class="flex flex-col justify-center place-items-center gap-y-10">
                    {{-- slogan --}}
                    <div>
                        <h2 class="text-3xl font-bold">Code Your Dreams,</h2>
                        <h2 class="text-3xl font-bold">Design Your Future</h2>
                    </div>

                    {{-- icons.links --}}
                    <div class="flex gap-x-3">
                        <a href="https://www.linkedin.com/in/nur-hasya-binti-mohd-nordin-23436b236" target="_BLANK" type="button" class="inline-flex items-center justify-center p-3 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-full bg-white hover:bg-neutral-400 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                            <img class="h-5" src="{{ asset('images/icons/linkedin-logo.svg') }}" alt="">
                        </a>
                        <a href="https://github.com/nrhsya" target="_BLANK" type="button" class="inline-flex items-center justify-center p-3 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-full bg-white hover:bg-neutral-400 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                            <img class="h-5" src="{{ asset('images/icons/github-logo.svg') }}" alt="">
                        </a>
                    </div>

                    {{-- copyright --}}
                    <div>
                        <span class="text-sm text-gray-500">All rights reserved</span>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            window.addEventListener('scroll', function() {
            var navbar = document.getElementById('navbar');
            var scrollPosition = window.scrollY;

            if (scrollPosition > 200) {
                navbar.classList.add('hidden');
            } else {
                navbar.classList.remove('hidden');
            }
        });
        </script>

        <script>
            window.addEventListener('scroll', reOrder);
            window.addEventListener('resize', reOrder);

            function reOrder() {
                var mq = window.matchMedia("(min-width: 992px)");
                var rightChild = document.querySelector('.right-child');
                var rightChildHeader = rightChild.querySelector('h2');
                var one = document.querySelector('.one');
                var left = document.querySelector('.left');

                if (mq.matches) {
                    rightChild.classList.add('customm');
                    // rightChildHeader.textContent = 'Work Experiences';

                    var scroll = window.pageYOffset || document.documentElement.scrollTop;
                    var topContent = one.offsetTop - 25;
                    var sectionHeight = left.offsetHeight;
                    var rightHeight = rightChild.offsetHeight;
                    var bottomContent = topContent + sectionHeight - rightHeight - 45;

                    if (scroll > topContent && scroll < bottomContent) {
                        rightChild.classList.remove('posAbs');
                        rightChild.classList.add('posFix');
                    } else if (scroll > bottomContent) {
                        rightChild.classList.remove('posFix');
                        rightChild.classList.add('posAbs');
                    } else if (scroll < topContent) {
                        rightChild.classList.remove('posFix');
                    }
                } else {
                    rightChild.classList.remove('customm', 'posAbs', 'posFix');
                    rightChildHeader.textContent = 'fixed';
                }
            }
        </script>

    </body>
</html>
