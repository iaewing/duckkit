<script setup lang="ts">
import { onBeforeMount, ref } from "vue";
import PostCard from "@/Components/PostCard.vue";
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

const posts = ref(null);

onBeforeMount(() => {
    getPosts();
});

async function getPosts(): Promise<void> {
    try {
        await fetch('/api/posts')
            .then((response) => response.json())
            .then((data) => (posts.value = data));
    } catch (error) {
        console.log(error);
    }
};

</script>

<template>
    <DefaultLayout>
        <div class="flex flex-col pl-4">
            <div v-for="post in posts" :key="post.id">
                <PostCard :post="post" />
            </div>
            <div v-if="!posts">Looks like there's nothing here...</div>
        </div>
    </DefaultLayout>
</template>
