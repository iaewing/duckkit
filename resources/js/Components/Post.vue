<script setup lang="ts">
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps(["post"]);
const isVisible = ref(false);
</script>

<template>
    <div class="w-1/2">
            <Link class="text-xl text-blue-600" :href="'/post/' + post.id"  as="div">{{ post.title }}</Link>
        <button @click="isVisible = !isVisible">Click</button>
        <div v-if="isVisible" class="text-md text-gray-600">{{ post.body }}</div>
    </div>
</template>
