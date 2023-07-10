<script setup lang="ts">
import { onBeforeMount, ref } from 'vue';
import CommentCard from '@/Components/CommentCard.vue';

const props = defineProps(['id']);

const comments = ref(null);
const post = ref(null);

onBeforeMount(() => {
    console.log('onBeforeMount');
    getPost();
    getComments();
})

async function getPost() {
    await fetch(`/api/posts/${props.id}`)
        .then((response) => response.json())
        .then((data) => (post.value = data[0]));
}

async function getComments() {
    await fetch(`/api/posts/${props.id}/comments`)
        .then((response) => response.json())
        .then((data) => (comments.value = data[0].comments));
}

</script>

<template>
    <div v-if="post">
        <div class="border-4 px-4 py-2">{{ post.title }}</div>
        <div>{{ post.body }}</div>
    </div>
    <div class="border-b-8"></div>
    <div v-for="comment in comments" :key="comment.id">
        <CommentCard :comment="comment" />
    </div>
</template>

