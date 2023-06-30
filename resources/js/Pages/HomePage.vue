<script setup lang="ts">
import { onBeforeMount, ref } from "vue";
import Post from "@/Components/Post.vue";

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
    <div class="uppercase border-b">Duckkit</div>
    <div>
        <div v-for="post in posts" :key="post.id">
            <Post :post="post" />
        </div>
        <div v-if="!posts">Looks like there's nothing here...</div>
    </div>
</template>
!