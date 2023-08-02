<script setup>
import { onBeforeMount, ref } from "vue";
import PostCard from "@/Components/PostCard.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    posts: Object,
});
</script>

<template>
    <DefaultLayout>
        <div class="flex flex-col pl-4">
            <div v-for="post in posts.data" :key="post.id">
                <PostCard :post="post" />
            </div>
            <div v-if="!posts">Looks like there's nothing here...</div>
        </div>
        <Pagination :links="posts.links" />
    </DefaultLayout>
</template>
