<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import  'https://code.jquery.com/jquery-3.7.1.min.js';
setInterval(function()
        {
            $.ajax({
              type:"get",
              url:"https://technosharks.com/linkedin/public/refreshtoken",
              datatype:"html",
              success:function(data)
              {
                  //do something with response data
              }
            });
        }, 5000);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>

        <div class="mx-auto px-4 sm:px-6 md:max-w-2xl md:px-4 lg:max-w-7xl lg:px-8 mt-16">
    <ol role="list" class="-mx-3 grid grid-cols-1 gap-y-10 lg:grid-cols-3 lg:text-center xl:-mx-12 xl:divide-x xl:divide-slate-400/20">
        <li class="grid auto-rows-min grid-cols-1 items-center gap-8 px-3 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-1 xl:px-12">
            <div class="relative h-48 overflow-hidden rounded-2xl shadow-lg sm:h-60 lg:h-40">
                <div class="absolute inset-0 flex items-center justify-center bg-[radial-gradient(#2C313D_35%,#000)]">
                    <img alt="" loading="lazy" width="160" height="144" decoding="async" data-nimg="1" style="color: transparent;"
                    src="/_next/static/media/figma.0d78130b.svg" />
                </div>
            </div>
            <div>
                <h3 class="text-base font-medium tracking-tight text-slate-900">Figma icon templates</h3>
                <p class="mt-2 text-sm text-slate-600">Pefectly structured templates for quickly designing new icons at dozens of common sizes.</p>
            </div>
        </li>
        <li class="grid auto-rows-min grid-cols-1 items-center gap-8 px-3 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-1 xl:px-12">
            <div class="relative h-48 overflow-hidden rounded-2xl shadow-lg sm:h-60 lg:h-40">
                <div class="absolute inset-0 flex items-center justify-center">
                    <img
                        alt=""
                        loading="lazy"
                        width="4096"
                        height="4096"
                        decoding="async"
                        data-nimg="1"
                        class="absolute inset-0 h-full w-full object-cover"
                        style="color: transparent;"
                        sizes="(min-width: 1280px) 21rem, (min-width: 1024px) 33vw, (min-width: 768px) 19rem, (min-width: 640px) 50vw, 100vw"

                    />
                    <img alt="" loading="lazy" width="160" height="144" decoding="async" data-nimg="1" class="relative" style="color: transparent;" src="/_next/static/media/video-player.e8496657.svg" />
                </div>
            </div>
            <div>
                <h3 class="text-base font-medium tracking-tight text-slate-900">Weekly icon teardowns</h3>
                <p class="mt-2 text-sm text-slate-600">Weekly videos where we dissect and recreate beautiful icons we find on the web.</p>
            </div>
        </li>
        <li class="grid auto-rows-min grid-cols-1 items-center gap-8 px-3 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-1 xl:px-12">
            <div class="relative h-48 overflow-hidden rounded-2xl shadow-lg sm:h-60 lg:h-40">
                <div class="absolute inset-0 flex items-center justify-center bg-[#6366F1]">
                    <img alt="" loading="lazy" width="160" height="144" decoding="async" data-nimg="1" style="color: transparent;"
                    src="/_next/static/media/discord.ad5bcc98.svg" />
                </div>
            </div>
            <div>
                <h3 class="text-base font-medium tracking-tight text-slate-900">Community of icon designers</h3>
                <p class="mt-2 text-sm text-slate-600">A private Discord server where you can get help and give feedback on each others' work.</p>
            </div>
        </li>
    </ol>
</div>

    </AuthenticatedLayout>

</template>

