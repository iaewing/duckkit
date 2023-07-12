<script setup lang="ts">
import { onBeforeMount, ref } from 'vue';
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import CommentCard from '@/Components/CommentCard.vue';

const props = defineProps(['id']);

const comments = ref(null);
const post = ref(null);

onBeforeMount(() => {
    console.log('onBeforeMount');
    getPostWithComments();

})


async function getPostWithComments() {
    await fetch(`/api/posts/${props.id}/comments`)
        .then((response) => response.json())
        .then(function (data) {
            post.value = data[0];
            comments.value = data[0].comments;
        });
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
