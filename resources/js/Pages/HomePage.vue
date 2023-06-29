<script setup lang="ts">
import { ref } from "vue";
import Post from "@/Components/Post.vue";

const posts = ref(null);
async function getPosts() {
    try {
        await fetch('/api/posts')
            .then((response) => response.json())
            .then((data) => (posts.value = data));
    } catch (error) {
        console.log(error);
    }
}
</script>

<template>
    <div class="uppercase border-b">Duckkit</div>
    <div>
        <button @click="getPosts">Get Posts</button>
        <div v-for="post in posts" :key="post.id">
            <Post :postTitle="post.title" :postBody="post.body" />
        </div>
        <div v-if="!posts">Looks like there's nothing here...</div>
    </div>
</template>
