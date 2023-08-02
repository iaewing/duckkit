<script setup lang="ts">
import DefaultLayout from "@/Layouts/DefaultLayout.vue";
import CommentCard from '@/Components/CommentCard.vue';
import { onBeforeMount, ref } from "vue";
import * as dayjs from "dayjs";
import * as relativeTime from "dayjs/plugin/relativeTime";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    post: Object,
    comments: Object,
    user: Object,
});

const postTime = ref(null);

onBeforeMount(() => {
    postTime.value = calculateTime();
})

function calculateTime() {
    dayjs.extend(relativeTime);
    return dayjs(new Date(props.post.created_at).getTime()).fromNow();
}
</script>

<template>
    <DefaultLayout>
            <div class="border-4 px-4 py-2">{{ post.title }}</div>
            <div>{{ post.body }}</div>
            <div>Submitted {{ postTime }} by <span class="text-violet-400">{{ user.username }}</span></div>
        <div class="border-b-8"></div>
        <TextInput />
        <div v-for="comment in comments" :key="comment.id">
            <CommentCard :comment="comment" />
        </div>
    </DefaultLayout>
</template>
