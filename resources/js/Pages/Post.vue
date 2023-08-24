<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import CommentCard from '@/Components/CommentCard.vue';
import { onBeforeMount, reactive, ref } from "vue";
import * as dayjs from "dayjs";
import * as relativeTime from "dayjs/plugin/relativeTime";
import TextInput from "@/Components/TextInput.vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    post: Object,
    comments: Object,
    user: Object,
    isAuthenticated: Boolean,
});

const postTime = ref(null);
const form = reactive({
    comment: null,
    parentCommentId: null,
    userId: props.post.user_id,
    postId: props.post.id,
})

onBeforeMount(() => {
    postTime.value = calculateTime();
})

function calculateTime() {
    dayjs.extend(relativeTime);
    return dayjs(new Date(props.post.created_at).getTime()).fromNow();
}

function submit() {
    console.log('user', props.post.user_id);
    console.log('post', props.post.id);
    router.post(route('comments.store'), form);
}
</script>

<template>
    <DefaultLayout>
        <div class="border-4 px-4 py-2">{{ post.title }}</div>
        <div>{{ post.body }}</div>
        <div>Submitted {{ postTime }} by <span class="text-violet-400">{{ user.username }}</span></div>
        <div class="border-b-8"></div>
        <TextInput :isAuthenticated="isAuthenticated" v-model="form.comment"/>
        <button @click="submit">Submit</button>
        <div v-for="comment in comments" :key="comment.id">
            <CommentCard :comment="comment" />
        </div>
    </DefaultLayout>
</template>
