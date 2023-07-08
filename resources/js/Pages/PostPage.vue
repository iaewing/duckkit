<script setup lang="ts">
import { onBeforeMount, ref } from 'vue';
import DefaultLayout from "@/Layouts/DefaultLayout.vue";

const props = defineProps(['id']);

const comments = ref(null);
const post = ref(null);

onBeforeMount(() => {
    getPost();
    getComments();
})

function getPost() {
    fetch(`/api/posts/${props.id}`)
        .then((response) => response.json())
        .then((data) => (post.value = data[0]));
}

function getComments() {
    fetch(`/api/posts/${props.id}/comments`)
        .then((response) => response.json())
        .then((data) => (comments.value = data));
    console.log(comments.value);
}
</script>

<template>
    <DefaultLayout>
        <div class="border-4 px-4 py-2">{{ post.title }}</div>
        <div>{{ post.body }}</div>
        <div class="border-b-8"></div>
        <div v-for="comment in comments" :key="comment.id">{{ comment.body }}</div>
    </DefaultLayout>
</template>