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
                                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Alpine JS</span>
                                        <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Livewire</span>
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Bootstrap</span>
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
                                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Alpine JS</span>
                                        <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Livewire</span>
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Bootstrap</span>
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
                                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Alpine JS</span>
                                        <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Livewire</span>
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Bootstrap</span>
                                        <span class="inline-flex items-center rounded-md bg-blue-200 px-2 py-1 text-xs font-medium text-blue-900 ring-1 ring-inset ring-green-600/20">Tailwind CSS</span>
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
                                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                        <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Alpine JS</span>
                                        <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Livewire</span>
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Bootstrap</span>
                                        <span class="inline-flex items-center rounded-md bg-blue-200 px-2 py-1 text-xs font-medium text-blue-900 ring-1 ring-inset ring-green-600/20">Tailwind CSS</span>
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
                            <h2 class="text-black py-10 font-bold">Work Experiences</h2>
                        </div>
                    </div>
                </section>

                <div class="bottom"></div>
            </div>
            {{-- <div class="p-5">
                <div class="flex">
                    <div class="rounded-lg overflow-hidden border border-neutral-200/60 bg-white text-neutral-700 shadow-sm w-[380px]">
                        <img src="{{ asset('images/experience.png') }}" />
                    </div>

                    <div>
                        <span>text</span>
                    </div>
                </div>
            </div> --}}
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

        {{-- work experiences --}}
        {{-- <section class="h-screen" id="work">
            <div>
                <div class="flex justify-center place-items-center mb-5">
                    <h1 class="text-white font-extrabold text-5xl">Work Experiences</h1>
                </div>

                <div x-data="{
                    activeAccordion: '',
                    setActiveAccordion(id) {
                    this.activeAccordion = (this.activeAccordion == id) ? '' : id
                    }
                    }" class="relative mx-auto overflow-hidden text-sm font-normal bg-white border border-gray-200 divide-y divide-gray-200 rounded-md w-6/12">
                    <div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
                        <button @click="setActiveAccordion(id)" class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline">
                            <span class="font-bold">Web Developer at Byond Tech Global Berhad</span>
                            <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': activeAccordion==id }" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div x-show="activeAccordion==id" x-collapse x-cloak>
                            <div class="p-4 pt-0 opacity-70">
                                <div class="flex gap-x-5">
                                    <div class="flex place-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                        <span>Kuala Lumpur, Malaysia</span>
                                    </div>
                                    <div class="flex place-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                        </svg>
                                        <span>byond.tech</span>
                                    </div>
                                </div>
                                <ul class="list-disc mb-4 px-4">
                                    <li>
                                        Implemented Bootstrap to ensure a responsive and visually appealing layout that adapts seamlessly across devices, providing an intuitive experience for both candidates and employers.
                                    </li>
                                    <li>
                                        Leveraged Alpine.js to enhance frontend interactivity, enabling dynamic user interactions without the need for complex JavaScript frameworks.
                                    </li>
                                    <li>
                                        Utilized Laravel's robust backend capabilities to handle user authentication, job postings, candidate profiles, and employer accounts, ensuring efficient data management and security.
                                    </li>
                                    <li>
                                        Integrated Livewire to facilitate real-time updates without page reloads, enhancing the overall responsiveness and user engagement of the platform.
                                    </li>
                                    <li>
                                        Implemented features to facilitate seamless communication between candidates and employers, including messaging systems, job application tracking, and profile management tools.
                                    </li>
                                </ul>
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Alpine JS</span>
                                <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Livewire</span>
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Bootstrap</span>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
                        <button @click="setActiveAccordion(id)" class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline">
                            <span class="font-bold">Web Developer Intern at Byond Tech Global Berhad</span>
                            <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': activeAccordion==id }" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div x-show="activeAccordion==id" x-collapse x-cloak>
                            <div class="p-4 pt-0 opacity-70">
                                <div class="flex gap-x-5">
                                    <div class="flex place-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                        <span>Kuala Lumpur, Malaysia</span>
                                    </div>
                                    <div class="flex place-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                        </svg>
                                        <span>byond.tech</span>
                                    </div>
                                </div>
                                <ul class="list-disc mb-4 px-4">
                                    <li>
                                        Implemented Bootstrap to ensure a responsive and visually appealing layout that adapts seamlessly across devices, providing an intuitive experience for both candidates and employers.
                                    </li>
                                    <li>
                                        Leveraged Alpine.js to enhance frontend interactivity, enabling dynamic user interactions without the need for complex JavaScript frameworks.
                                    </li>
                                    <li>
                                        Utilized Laravel's robust backend capabilities to handle user authentication, job postings, candidate profiles, and employer accounts, ensuring efficient data management and security.
                                    </li>
                                    <li>
                                        Integrated Livewire to facilitate real-time updates without page reloads, enhancing the overall responsiveness and user engagement of the platform.
                                    </li>
                                    <li>
                                        Implemented features to facilitate seamless communication between candidates and employers, including messaging systems, job application tracking, and profile management tools.
                                    </li>
                                </ul>
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Alpine JS</span>
                                <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Livewire</span>
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Bootstrap</span>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ id: $id('accordion') }" class="cursor-pointer group">
                        <button @click="setActiveAccordion(id)" class="flex items-center justify-between w-full p-4 text-left select-none group-hover:underline">
                            <span class="font-bold">Part Time Web Developer at Mahiran Digital Sdn Bhd</span>
                            <svg class="w-4 h-4 duration-200 ease-out" :class="{ 'rotate-180': activeAccordion==id }" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                        <div x-show="activeAccordion==id" x-collapse x-cloak>
                            <div class="p-4 pt-0 opacity-70">
                                <div class="flex gap-x-5">
                                    <div class="flex place-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                        </svg>
                                        <span>Kuala Lumpur, Malaysia</span>
                                    </div>
                                    <div class="flex place-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                        </svg>
                                        <span>byond.tech</span>
                                    </div>
                                </div>
                                <ul class="list-disc mb-4 px-4">
                                    <li>
                                        Implemented Bootstrap to ensure a responsive and visually appealing layout that adapts seamlessly across devices, providing an intuitive experience for both candidates and employers.
                                    </li>
                                    <li>
                                        Leveraged Alpine.js to enhance frontend interactivity, enabling dynamic user interactions without the need for complex JavaScript frameworks.
                                    </li>
                                    <li>
                                        Utilized Laravel's robust backend capabilities to handle user authentication, job postings, candidate profiles, and employer accounts, ensuring efficient data management and security.
                                    </li>
                                    <li>
                                        Integrated Livewire to facilitate real-time updates without page reloads, enhancing the overall responsiveness and user engagement of the platform.
                                    </li>
                                    <li>
                                        Implemented features to facilitate seamless communication between candidates and employers, including messaging systems, job application tracking, and profile management tools.
                                    </li>
                                </ul>
                                <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">Laravel</span>
                                <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Alpine JS</span>
                                <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">Livewire</span>
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Bootstrap</span>
                            </div>
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
                <div class="flex justify-center">
                    <div
                        x-data="{
                            tabSelected: 1,
                            tabId: $id('tabs'),
                            tabButtonClicked(tabButton){
                                this.tabSelected = tabButton.id.replace(this.tabId + '-', '');
                                this.tabRepositionMarker(tabButton);
                            },
                            tabRepositionMarker(tabButton){
                                this.$refs.tabMarker.style.width=tabButton.offsetWidth + 'px';
                                this.$refs.tabMarker.style.height=tabButton.offsetHeight + 'px';
                                this.$refs.tabMarker.style.left=tabButton.offsetLeft + 'px';
                            },
                            tabContentActive(tabContent){
                                return this.tabSelected == tabContent.id.replace(this.tabId + '-content-', '');
                            }
                        }"

                        x-init="tabRepositionMarker($refs.tabButtons.firstElementChild);" class="w-full">

                        {{-- tab labels --}}
                        <div x-ref="tabButtons" class="relative inline-grid items-center justify-center w-full h-10 grid-cols-3 p-1 text-black bg-gray-400 rounded-lg select-none">
                            <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Laravel</button>
                            <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Tailwind CSS</button>
                            <button :id="$id(tabId)" @click="tabButtonClicked($el);" type="button" class="relative z-20 inline-flex items-center justify-center w-full h-8 px-3 text-sm font-medium transition-all rounded-md cursor-pointer whitespace-nowrap">Bootstrap</button>
                            <div x-ref="tabMarker" class="absolute left-0 z-10 w-1/2 h-full duration-300 ease-out" x-cloak>
                                <div class="w-full h-full bg-white rounded-md shadow-sm"></div>
                            </div>
                        </div>

                        {{-- tab contents --}}
                        <div class="relative w-full mt-5">
                            <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative">
                                <div class="flex gap-5">
                                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                                        <div class="relative">
                                            <img src="{{ asset('images/logo_jobportal.png') }}" class="w-full h-auto p-9" />
                                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 gap-4">
                                                <div>
                                                    <a href="https://jobs.mysyarikat.com/jobs" class="bg-white text-black py-2 px-4 rounded-md font-bold">View</a>
                                                </div>
                                                <div>
                                                    <a href="https://jobs.mysyarikat.com/jobs" class="bg-white text-black py-2 px-4 rounded-md font-bold">Project Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                                        <div class="relative">
                                            <img src="{{ asset('images/logo_jobportal.png') }}" class="w-full h-auto p-9" />
                                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 gap-4">
                                                <div>
                                                    <a href="https://jobs.mysyarikat.com/jobs" class="bg-white text-black py-2 px-4 rounded-md font-bold">View</a>
                                                </div>
                                                <div>
                                                    <a href="https://jobs.mysyarikat.com/jobs" class="bg-white text-black py-2 px-4 rounded-md font-bold">Project Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div :id="$id(tabId + '-content')" x-show="tabContentActive($el)" class="relative" x-cloak>
                                <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                                    <div class="relative">
                                        <img src="{{ asset('images/logo_jobportal.png') }}" class="w-full h-auto p-9" />
                                        <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 gap-4">
                                            <div>
                                                <a href="https://jobs.mysyarikat.com/jobs" class="bg-white text-black py-2 px-4 rounded-md font-bold">View</a>
                                            </div>
                                            <div>
                                                <a href="https://jobs.mysyarikat.com/jobs" class="bg-white text-black py-2 px-4 rounded-md font-bold">Project Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- <div class="rounded-lg overflow-hidden bg-white text-neutral-700 shadow-sm w-[380px] relative group">
                        <div class="relative">
                            <img src="{{ asset('images/logo_jobportal.png') }}" class="w-full h-auto p-9" />
                            <div class="absolute inset-0 bg-black bg-opacity-60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 gap-4">
                                <div>
                                    <a href="https://jobs.mysyarikat.com/jobs" class="bg-white text-black py-2 px-4 rounded-md font-bold">View</a>
                                </div>
                                <div>
                                    <a href="https://jobs.mysyarikat.com/jobs" class="bg-white text-black py-2 px-4 rounded-md font-bold">Project Details</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                    {{-- <div class="rounded-lg overflow-hidden border border-neutral-200/60 bg-white text-neutral-700 shadow-sm w-[380px]">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2370&q=80" class="w-full h-auto" />
                        </div>
                        <div class="p-7">
                            <h2 class="mb-2 text-lg font-bold leading-none tracking-tight">Product Name</h2>
                            <p class="mb-5 text-neutral-500">This card element can be used to display a product, post, or any other type of data.</p>
                            <button class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium text-white transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-neutral-950 hover:bg-neutral-950/90">View Product</button>
                        </div>
                    </div> --}}
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
        {{-- <section class="h-screen bg-white" id="contact">
            <div>
                <div class="flex justify-center place-items-center">
                    <h1 class="text-black font-extrabold text-5xl mb-5">Contact Me</h1>
                </div>
                <div class="flex justify-center">
                    <!-- contact details -->
                    <div></div>

                    <!-- contact form -->
                    <div></div>
                </div>
            </div>
        </section> --}}

        <script>
            window.addEventListener('scroll', function() {
            var navbar = document.getElementById('navbar');
            var scrollPosition = window.scrollY;

            if (scrollPosition > 200) { // Change this value to your desired scroll height
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
