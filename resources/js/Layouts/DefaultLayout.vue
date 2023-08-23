<script setup>
import DuckkitLogo from '@/Components/DuckkitLogo.vue';
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="bg-sky-50">
        <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>
        <Link :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
        Register</Link>
        <div class="uppercase border-b">
            <DuckkitLogo />
        </div>
        <slot />
    </div>
</template>