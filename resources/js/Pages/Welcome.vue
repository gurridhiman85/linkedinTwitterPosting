<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />


    <header class="py-10">
    <div class="container mx-auto  px-4 sm:px-6 lg:px-8">
        <nav class="relative z-50 flex justify-between">
            <div class="flex items-center md:gap-x-12">
                <a aria-label="Home" href="#">
                    <img src="/images/SYNTHIA-BLACK.png">
                </a>
                <div class="hidden md:flex md:gap-x-6">
                    <a class="inline-block rounded-lg px-2 py-1 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#features">Features</a>
                    <a class="inline-block rounded-lg px-2 py-1 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#testimonials">Testimonials</a>
                    <a class="inline-block rounded-lg px-2 py-1 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#pricing">Pricing</a>
                </div>
            </div>
            <div class="flex items-center gap-x-5 md:gap-x-8">
                <div v-if="canLogin">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Dashboard</Link>

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="inline-block rounded-lg px-2 py-1 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900"
                            >Log in</Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="group inline-flex items-center justify-center rounded-full ml-5 py-2 px-4 text-sm font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-blue-600 text-white hover:text-slate-100 hover:bg-blue-500 active:bg-blue-800 active:text-blue-100 focus-visible:outline-blue-600"
                            >Get Started Now</Link>
                    </template>
                </div>
            </div>
        </nav>
    </div>
</header>



<div class="container mx-auto px-4 pt-4 sm:px-6 lg:flex lg:px-8">
    <div class="relative z-20 mx-auto max-w-[40rem] pb-16 pt-16 lg:mx-0 lg:w-[40rem] lg:max-w-none lg:flex-none lg:pb-24 lg:pr-4 lg:pt-20">
        <h1 class="text-base font-semibold leading-7 text-indigo-600">By the makers of Synthia</h1>
        <p class="mt-4 text-3xl font-extrabold tracking-[-0.04em] text-black sm:text-5xl sm:leading-[3.5rem]">Grow your audience on social and beyond</p>

        <p class="mt-4 text-base leading-7 text-slate-600">Synthia helps you build an audience organically. We're a values-driven company that provides affordable, intuitive marketing tools for ambitious people and teams.</p>
        <div class="mt-8 flex gap-4">
            <a class="inline-flex justify-center rounded-lg text-sm font-semibold py-3 px-4 bg-blue-600 text-white hover:bg-slate-700" href="/preview">
                <span>Live preview <span aria-hidden="true" class="text-slate-400 sm:inline">→</span></span>
            </a>
            <a class="inline-flex justify-center rounded-lg text-sm font-semibold py-3 px-4 bg-white/0 text-slate-900 ring-1 ring-slate-900/10 hover:bg-white/25 hover:ring-slate-900/15" href="/documentation">
                <span>Documentation <span aria-hidden="true" class="text-black/25 sm:inline">→</span></span>
            </a>
        </div>
    </div>
    <div class="relative z-10  hidden select-none lg:flex">
        <img src="/images/hero-2.png">
    </div>
</div>


<section id="features" aria-label="Features for building a portfolio" class="py-20 sm:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl sm:text-center">
            <h2 class="text-3xl font-medium tracking-tight text-gray-900">Grow your following without draining your time</h2>
            <p class="mt-2 text-lg text-gray-600">Social media can be the fastest and cheapest way to build your following and grow your business. But it can also take up all your time. Here are some ways Synthia can help.</p>
        </div>
        <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 text-sm sm:mt-20 sm:grid-cols-2 md:gap-y-10 lg:max-w-none lg:grid-cols-3">
            <li class="rounded-2xl border border-blue-100 p-8 hover:border-blue-200">
                <svg viewBox="0 0 32 32" aria-hidden="true" class="h-8 w-8">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9 0a4 4 0 00-4 4v24a4 4 0 004 4h14a4 4 0 004-4V4a4 4 0 00-4-4H9zm0 2a2 2 0 00-2 2v24a2 2 0 002 2h14a2 2 0 002-2V4a2 2 0 00-2-2h-1.382a1 1 0 00-.894.553l-.448.894a1 1 0 01-.894.553h-6.764a1 1 0 01-.894-.553l-.448-.894A1 1 0 0010.382 2H9z"
                        fill="#2563eb"
                    ></path>
                    <path d="M12 25l8-8m0 0h-6m6 0v6" stroke="#171717" stroke-width="2" stroke-linecap="round"></path>
                    <circle cx="16" cy="16" r="16" fill="#A3A3A3" fill-opacity="0.2"></circle>
                </svg>
                <h3 class="mt-6 font-semibold text-gray-900">Lorem Ipsum Doler Sit</h3>
                <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat sollicitudin malesuada.</p>
            </li>
            <li class="rounded-2xl border border-blue-100 p-8 hover:border-blue-200">
                <svg viewBox="0 0 32 32" aria-hidden="true" class="h-8 w-8">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9 0a4 4 0 00-4 4v24a4 4 0 004 4h14a4 4 0 004-4V4a4 4 0 00-4-4H9zm0 2a2 2 0 00-2 2v24a2 2 0 002 2h14a2 2 0 002-2V4a2 2 0 00-2-2h-1.382a1 1 0 00-.894.553l-.448.894a1 1 0 01-.894.553h-6.764a1 1 0 01-.894-.553l-.448-.894A1 1 0 0010.382 2H9z"
                        fill="#2563eb"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9 13a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H10a1 1 0 01-1-1v-2zm0 6a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H10a1 1 0 01-1-1v-2zm1 5a1 1 0 00-1 1v2a1 1 0 001 1h12a1 1 0 001-1v-2a1 1 0 00-1-1H10z"
                        fill="url(#:S3:-gradient)"
                    ></path>
                    <rect x="9" y="6" width="14" height="4" rx="1" fill="#171717"></rect>
                    <circle cx="16" cy="16" r="16" fill="#A3A3A3" fill-opacity="0.2"></circle>
                    <defs>
                        <linearGradient id=":S3:-gradient" x1="16" y1="12" x2="16" y2="28" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#737373"></stop>
                            <stop offset="1" stop-color="#737373" stop-opacity="0"></stop>
                        </linearGradient>
                    </defs>
                </svg>
                <h3 class="mt-6 font-semibold text-gray-900">Lorem ipsum dolor sit amet</h3>
                <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat sollicitudin malesuada.</p>
            </li>
            <li class="rounded-2xl border border-blue-100 p-8 hover:border-blue-200">
                <svg viewBox="0 0 32 32" aria-hidden="true" class="h-8 w-8">
                    <circle cx="16" cy="16" r="16" fill="#A3A3A3" fill-opacity="0.2"></circle>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M5 4a4 4 0 014-4h14a4 4 0 014 4v10h-2V4a2 2 0 00-2-2h-1.382a1 1 0 00-.894.553l-.448.894a1 1 0 01-.894.553h-6.764a1 1 0 01-.894-.553l-.448-.894A1 1 0 0010.382 2H9a2 2 0 00-2 2v24a2 2 0 002 2h5v2H9a4 4 0 01-4-4V4z"
                        fill="#2563eb"
                    ></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 32a8 8 0 100-16 8 8 0 000 16zm1-8.414V19h-2v5.414l4 4L28.414 27 25 23.586z" fill="#171717"></path>
                </svg>
                <h3 class="mt-6 font-semibold text-gray-900">Lorem ipsum dolor sit amet</h3>
                <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat sollicitudin malesuada.</p>
            </li>
            <li class="rounded-2xl border border-blue-100 p-8 hover:border-blue-200">
                <svg viewBox="0 0 32 32" fill="none" aria-hidden="true" class="h-8 w-8">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9 0a4 4 0 00-4 4v24a4 4 0 004 4h14a4 4 0 004-4V4a4 4 0 00-4-4H9zm0 2a2 2 0 00-2 2v24a2 2 0 002 2h14a2 2 0 002-2V4a2 2 0 00-2-2h-1.382a1 1 0 00-.894.553l-.448.894a1 1 0 01-.894.553h-6.764a1 1 0 01-.894-.553l-.448-.894A1 1 0 0010.382 2H9z"
                        fill="#2563eb"
                    ></path>
                    <circle cx="11" cy="14" r="2" fill="#171717"></circle>
                    <circle cx="11" cy="20" r="2" fill="#171717"></circle>
                    <circle cx="11" cy="26" r="2" fill="#171717"></circle>
                    <path d="M16 14h6M16 20h6M16 26h6" stroke="#2563eb" stroke-width="2" stroke-linecap="square"></path>
                    <circle cx="16" cy="16" r="16" fill="#A3A3A3" fill-opacity="0.2"></circle>
                </svg>
                <h3 class="mt-6 font-semibold text-gray-900">Lorem ipsum dolor sit amet</h3>
                <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat sollicitudin malesuada.</p>
            </li>
            <li class="rounded-2xl border border-blue-100 p-8 hover:border-blue-200">
                <svg viewBox="0 0 32 32" aria-hidden="true" class="h-8 w-8">
                    <circle cx="16" cy="16" r="16" fill="#A3A3A3" fill-opacity="0.2"></circle>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M5 4a4 4 0 014-4h14a4 4 0 014 4v10h-2V4a2 2 0 00-2-2h-1.382a1 1 0 00-.894.553l-.448.894a1 1 0 01-.894.553h-6.764a1 1 0 01-.894-.553l-.448-.894A1 1 0 0010.382 2H9a2 2 0 00-2 2v24a2 2 0 002 2h5v2H9a4 4 0 01-4-4V4z"
                        fill="#2563eb"
                    ></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 19.5a3.5 3.5 0 117 0V22a2 2 0 012 2v6a2 2 0 01-2 2h-7a2 2 0 01-2-2v-6a2 2 0 012-2v-2.5zm2 2.5h3v-2.5a1.5 1.5 0 00-3 0V22z" fill="#171717"></path>
                </svg>
                <h3 class="mt-6 font-semibold text-gray-900">Lorem ipsum dolor sit amet</h3>
                <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat sollicitudin malesuada.</p>
            </li>
            <li class="rounded-2xl border border-blue-100 p-8 hover:border-blue-200">
                <svg viewBox="0 0 32 32" fill="none" aria-hidden="true" class="h-8 w-8">
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M9 0a4 4 0 00-4 4v24a4 4 0 004 4h14a4 4 0 004-4V4a4 4 0 00-4-4H9zm0 2a2 2 0 00-2 2v24a2 2 0 002 2h14a2 2 0 002-2V4a2 2 0 00-2-2h-1.382a1 1 0 00-.894.553l-.448.894a1 1 0 01-.894.553h-6.764a1 1 0 01-.894-.553l-.448-.894A1 1 0 0010.382 2H9z"
                        fill="#2563eb"
                    ></path>
                    <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M23 13.838V26a2 2 0 01-2 2H11a2 2 0 01-2-2V15.65l2.57 3.212a1 1 0 001.38.175L15.4 17.2a1 1 0 011.494.353l1.841 3.681c.399.797 1.562.714 1.843-.13L23 13.837z"
                        fill="#171717"
                    ></path>
                    <path d="M10 12h12" stroke="#2563eb" stroke-width="2" stroke-linecap="square"></path>
                    <circle cx="16" cy="16" r="16" fill="#A3A3A3" fill-opacity="0.2"></circle>
                </svg>
                <h3 class="mt-6 font-semibold text-gray-900">Lorem ipsum dolor sit amet</h3>
                <p class="mt-2 text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer placerat sollicitudin malesuada.</p>
            </li>
        </ul>
    </div>
</section>



<section id="testimonials" aria-label="What our customers are saying" class="bg-slate-50 py-20 sm:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl md:text-center">
            <h2 class="font-display text-3xl tracking-tight text-slate-900 sm:text-4xl">Loved by businesses worldwide.</h2>
            <p class="mt-4 text-lg tracking-tight text-slate-700">Our software is so simple that people can’t help but fall in love with it. Simplicity is easy when you just skip tons of mission-critical features.</p>
        </div>
        <ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-6 sm:gap-8 lg:mt-20 lg:max-w-none lg:grid-cols-3">
            <li>
                <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                    <li>
                        <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10">
                            <svg aria-hidden="true" width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                <path
                                    d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"
                                ></path>
                            </svg>
                            <blockquote class="relative"><p class="text-lg tracking-tight text-slate-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in semper augue.</p></blockquote>
                            <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                <div>
                                    <div class="font-display text-base text-slate-900">Sheryl Berge</div>
                                    <div class="mt-1 text-sm text-slate-500">CEO at Lynch LLC</div>
                                </div>
                                <div class="overflow-hidden rounded-full bg-slate-50">
                                    <img
                                        alt=""
                                        loading="lazy"
                                        width="56"
                                        height="56"
                                        decoding="async"
                                        data-nimg="1"
                                        class="h-14 w-14 object-cover"
                                        style="color: transparent;"
                                        src="images/avatar-1.png"
                                    />
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10">
                            <svg aria-hidden="true" width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                <path
                                    d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"
                                ></path>
                            </svg>
                            <blockquote class="relative">
                                <p class="text-lg tracking-tight text-slate-900">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in semper augue. Cras quis mauris eget neque venenatis faucibus id a purus.
                                </p>
                                </blockquote>
                            <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                <div>
                                    <div class="font-display text-base text-slate-900">Amy Hahn</div>
                                    <div class="mt-1 text-sm text-slate-500">Director at Velocity Industries</div>
                                </div>
                                <div class="overflow-hidden rounded-full bg-slate-50">
                                    <img
                                        alt=""
                                        loading="lazy"
                                        width="56"
                                        height="56"
                                        decoding="async"
                                        data-nimg="1"
                                        class="h-14 w-14 object-cover"
                                        style="color: transparent;"
                                        src="images/avatar-4.png"
                                    />
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </li>
            <li>
                <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                    <li>
                        <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10">
                            <svg aria-hidden="true" width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                <path
                                    d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"
                                ></path>
                            </svg>
                            <blockquote class="relative">
                                <p class="text-lg tracking-tight text-slate-900">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in semper augue. Cras quis mauris eget neque venenatis faucibus id a purus.
                                </p>
                            </blockquote>
                            <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                <div>
                                    <div class="font-display text-base text-slate-900">Leland Kiehn</div>
                                    <div class="mt-1 text-sm text-slate-500">Founder of Kiehn and Sons</div>
                                </div>
                                <div class="overflow-hidden rounded-full bg-slate-50">
                                    <img
                                        alt=""
                                        loading="lazy"
                                        width="56"
                                        height="56"
                                        decoding="async"
                                        data-nimg="1"
                                        class="h-14 w-14 object-cover"
                                        style="color: transparent;"
                                        src="images/avatar-5.png"
                                    />
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10">
                            <svg aria-hidden="true" width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                <path
                                    d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"
                                ></path>
                            </svg>
                            <blockquote class="relative">
                                <p class="text-lg tracking-tight text-slate-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in semper augue.</p>
                            </blockquote>
                            <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                <div>
                                    <div class="font-display text-base text-slate-900">Erin Powlowski</div>
                                    <div class="mt-1 text-sm text-slate-500">COO at Armstrong Inc</div>
                                </div>
                                <div class="overflow-hidden rounded-full bg-slate-50">
                                    <img
                                        alt=""
                                        loading="lazy"
                                        width="56"
                                        height="56"
                                        decoding="async"
                                        data-nimg="1"
                                        class="h-14 w-14 object-cover"
                                        style="color: transparent;"
                                        src="images/avatar-2.png"
                                    />
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </li>
            <li>
                <ul role="list" class="flex flex-col gap-y-6 sm:gap-y-8">
                    <li>
                        <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10">
                            <svg aria-hidden="true" width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                <path
                                    d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"
                                ></path>
                            </svg>
                            <blockquote class="relative">
                                <p class="text-lg tracking-tight text-slate-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in semper augue. Cras quis mauris eget neque venenatis.</p>
                            </blockquote>
                            <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                <div>
                                    <div class="font-display text-base text-slate-900">Peter Renolds</div>
                                    <div class="mt-1 text-sm text-slate-500">Founder of West Inc</div>
                                </div>
                                <div class="overflow-hidden rounded-full bg-slate-50">
                                    <img
                                        alt=""
                                        loading="lazy"
                                        width="56"
                                        height="56"
                                        decoding="async"
                                        data-nimg="1"
                                        class="h-14 w-14 object-cover"
                                        style="color: transparent;"
                                        src="images/avatar-3.png"
                                    />
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                    <li>
                        <figure class="relative rounded-2xl bg-white p-6 shadow-xl shadow-slate-900/10">
                            <svg aria-hidden="true" width="105" height="78" class="absolute left-6 top-6 fill-slate-100">
                                <path
                                    d="M25.086 77.292c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622C1.054 58.534 0 53.411 0 47.686c0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C28.325 3.917 33.599 1.507 39.324 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Zm54.24 0c-4.821 0-9.115-1.205-12.882-3.616-3.767-2.561-6.78-6.102-9.04-10.622-2.11-4.52-3.164-9.643-3.164-15.368 0-5.273.904-10.396 2.712-15.368 1.959-4.972 4.746-9.567 8.362-13.786a59.042 59.042 0 0 1 12.43-11.3C82.565 3.917 87.839 1.507 93.564 0l11.074 13.786c-6.479 2.561-11.677 5.951-15.594 10.17-3.767 4.219-5.65 7.835-5.65 10.848 0 1.356.377 2.863 1.13 4.52.904 1.507 2.637 3.089 5.198 4.746 3.767 2.41 6.328 4.972 7.684 7.684 1.507 2.561 2.26 5.5 2.26 8.814 0 5.123-1.959 9.19-5.876 12.204-3.767 3.013-8.588 4.52-14.464 4.52Z"
                                ></path>
                            </svg>
                            <blockquote class="relative">
                                <p class="text-lg tracking-tight text-slate-900">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in semper augue. Cras quis mauris eget neque venenatis faucibus id a purus.
                                </p>
                            </blockquote>
                            <figcaption class="relative mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                                <div>
                                    <div class="font-display text-base text-slate-900">Amy Hahn</div>
                                    <div class="mt-1 text-sm text-slate-500">Director at Velocity Industries</div>
                                </div>
                                <div class="overflow-hidden rounded-full bg-slate-50">
                                    <img
                                        alt=""
                                        loading="lazy"
                                        width="56"
                                        height="56"
                                        decoding="async"
                                        data-nimg="1"
                                        class="h-14 w-14 object-cover"
                                        style="color: transparent;"
                                        src="images/avatar-4.png"
                                    />
                                </div>
                            </figcaption>
                        </figure>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>





    <footer class="border-t border-gray-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-start justify-between gap-y-12 pb-6 pt-16 lg:flex-row lg:items-center lg:py-16">
                <div>
                    <div class="flex items-center text-gray-900">
                       <img src="/images/SYNTHIA-BLACK.png"/>
                    </div>
                    <nav class="mt-11 flex gap-8">
                        <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-0" href="/#features">
                            <span class="relative z-10">Features</span>
                        </a>
                        <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-0" href="/#reviews">
                            <span class="relative z-10">Reviews</span>
                        </a>
                        <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-0" href="/#pricing">
                            <span class="relative z-10">Pricing</span>
                        </a>
                        <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm text-gray-700 transition-colors delay-150 hover:text-gray-900 hover:delay-0" href="/#faqs">
                            <span class="relative z-10">FAQs</span>
                        </a>
                    </nav>
                </div>
                <div class="group relative -mx-4 flex items-center self-stretch p-4 transition-colors hover:bg-gray-100 sm:self-auto sm:rounded-2xl lg:mx-0 lg:self-auto lg:p-6">

                </div>
            </div>
            <div class="flex flex-col items-center border-t border-gray-200 pb-12 pt-8 md:flex-row-reverse md:justify-between md:pt-6">
                <div class="flex gap-4">
        <a class="group" href="#">
            <span class="sr-only">Follow us on Twitter</span>
            <svg viewBox="0 0 20 20" aria-hidden="true" class="h-5 w-5 fill-zinc-700 transition group-hover:fill-zinc-900 dark:group-hover:fill-zinc-500">
                <path
                    d="M16.712 6.652c.01.146.01.29.01.436 0 4.449-3.267 9.579-9.242 9.579v-.003a8.963 8.963 0 0 1-4.98-1.509 6.379 6.379 0 0 0 4.807-1.396c-1.39-.027-2.608-.966-3.035-2.337.487.097.99.077 1.467-.059-1.514-.316-2.606-1.696-2.606-3.3v-.041c.45.26.956.404 1.475.42C3.18 7.454 2.74 5.486 3.602 3.947c1.65 2.104 4.083 3.382 6.695 3.517a3.446 3.446 0 0 1 .94-3.217 3.172 3.172 0 0 1 4.596.148 6.38 6.38 0 0 0 2.063-.817 3.357 3.357 0 0 1-1.428 1.861 6.283 6.283 0 0 0 1.865-.53 6.735 6.735 0 0 1-1.62 1.744Z"
                ></path>
            </svg>
        </a>
        <a class="group" href="#">
            <span class="sr-only">Follow us on GitHub</span>
            <svg viewBox="0 0 20 20" aria-hidden="true" class="h-5 w-5 fill-zinc-700 transition group-hover:fill-zinc-900 dark:group-hover:fill-zinc-500">
                <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M10 1.667c-4.605 0-8.334 3.823-8.334 8.544 0 3.78 2.385 6.974 5.698 8.106.417.075.573-.182.573-.406 0-.203-.011-.875-.011-1.592-2.093.397-2.635-.522-2.802-1.002-.094-.246-.5-1.005-.854-1.207-.291-.16-.708-.556-.01-.567.656-.01 1.124.62 1.281.876.75 1.292 1.948.93 2.427.705.073-.555.291-.93.531-1.143-1.854-.213-3.791-.95-3.791-4.218 0-.929.322-1.698.854-2.296-.083-.214-.375-1.09.083-2.265 0 0 .698-.224 2.292.876a7.576 7.576 0 0 1 2.083-.288c.709 0 1.417.096 2.084.288 1.593-1.11 2.291-.875 2.291-.875.459 1.174.167 2.05.084 2.263.53.599.854 1.357.854 2.297 0 3.278-1.948 4.005-3.802 4.219.302.266.563.78.563 1.58 0 1.143-.011 2.061-.011 2.35 0 .224.156.491.573.405a8.365 8.365 0 0 0 4.11-3.116 8.707 8.707 0 0 0 1.567-4.99c0-4.721-3.73-8.545-8.334-8.545Z"
                ></path>
            </svg>
        </a>
        <a class="group" href="#">
            <span class="sr-only">Join our Discord server</span>
            <svg viewBox="0 0 20 20" aria-hidden="true" class="h-5 w-5 fill-zinc-700 transition group-hover:fill-zinc-900 dark:group-hover:fill-zinc-500">
                <path
                    d="M16.238 4.515a14.842 14.842 0 0 0-3.664-1.136.055.055 0 0 0-.059.027 10.35 10.35 0 0 0-.456.938 13.702 13.702 0 0 0-4.115 0 9.479 9.479 0 0 0-.464-.938.058.058 0 0 0-.058-.027c-1.266.218-2.497.6-3.664 1.136a.052.052 0 0 0-.024.02C1.4 8.023.76 11.424 1.074 14.782a.062.062 0 0 0 .024.042 14.923 14.923 0 0 0 4.494 2.272.058.058 0 0 0 .064-.02c.346-.473.654-.972.92-1.496a.057.057 0 0 0-.032-.08 9.83 9.83 0 0 1-1.404-.669.058.058 0 0 1-.029-.046.058.058 0 0 1 .023-.05c.094-.07.189-.144.279-.218a.056.056 0 0 1 .058-.008c2.946 1.345 6.135 1.345 9.046 0a.056.056 0 0 1 .059.007c.09.074.184.149.28.22a.058.058 0 0 1 .023.049.059.059 0 0 1-.028.046 9.224 9.224 0 0 1-1.405.669.058.058 0 0 0-.033.033.056.056 0 0 0 .002.047c.27.523.58 1.022.92 1.495a.056.056 0 0 0 .062.021 14.878 14.878 0 0 0 4.502-2.272.055.055 0 0 0 .016-.018.056.056 0 0 0 .008-.023c.375-3.883-.63-7.256-2.662-10.246a.046.046 0 0 0-.023-.021Zm-9.223 8.221c-.887 0-1.618-.814-1.618-1.814s.717-1.814 1.618-1.814c.908 0 1.632.821 1.618 1.814 0 1-.717 1.814-1.618 1.814Zm5.981 0c-.887 0-1.618-.814-1.618-1.814s.717-1.814 1.618-1.814c.908 0 1.632.821 1.618 1.814 0 1-.71 1.814-1.618 1.814Z"
                ></path>
            </svg>
        </a>
    </div>
                <p class="mt-6 text-sm text-gray-500 md:mt-0">© Copyright <!-- -->2023<!-- -->. All rights reserved.</p>
            </div>
        </div>
    </footer>
</template>

