<script setup lang="ts">
import { onBeforeMount, ref } from 'vue';
import Comment from '@/Components/Comment.vue';

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
<<<<<<< Updated upstream
    .then((response) => response.json())
    .then((data) => (comments.value = data));
=======
        .then((response) => response.json())
        .then((data) => (comments.value = data));
>>>>>>> Stashed changes
    console.log(comments.value);
}

</script>

<template>
    <div class="border-4 px-4 py-2">{{ post.title }}</div>
    <div>{{ post.body }}</div>
    <div class="border-b-8"></div>
<<<<<<< Updated upstream
    <div v-for="comment in comments" :key="comment.id">{{ comment.body }}</div>
=======
    <div v-for="comment in comments" :key="comment.id">
        <Comment :comment="comment" />
    </div>
>>>>>>> Stashed changes
</template>