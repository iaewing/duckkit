<script setup lang="ts">
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import { onBeforeMount } from "vue";
import * as dayjs from "dayjs";
import * as relativeTime from "dayjs/plugin/relativeTime";
import axios from "axios";

const props = defineProps(["post"]);
const isVisible = ref(false);
const postTime = ref(null);

function calculateTime() {
    dayjs.extend(relativeTime);
    return dayjs(new Date(props.post.created_at).getTime()).fromNow();
}

function upvote() {
    axios.post("/api/posts/" + props.post.id + "/vote", {
        data: {
            upvote: true
        }
    });
}

function downvote() {

}

onBeforeMount(() => {
    postTime.value = calculateTime();
})
</script>

<template>
        <div class="w-3/4 my-2 px-4 py-2 flex flex-row items-center">
            <div class="flex flex-col items-center">
                <div @click="upvote">+</div>
                <div class="px-2">{{ post.karma }}</div>
                <div @click="downvote">-</div>
            </div>
            <div class="px-2">ICON</div>
            <div class="flex flex-col">
                <Link class="text-xl text-violet-700" :href="'/posts/' + post.id" as="div">{{ post.title }}</Link>
                <div class="flex flex-row">
                    <button @click="isVisible = !isVisible" class="pr-2 border">+</button>
                    <div>Submitted {{ postTime }} by <span class="text-violet-400">{{ post.user.name }}</span> to <span
                            class="text-violet-400">{{ post.subduckkit.name }}</span></div>
                </div>
                <div v-if="isVisible" class="text-md text-gray-700 border border-violet-300 my-2 px-4 py-2 rounded">{{
                    post.body
                }}
                </div>
            </div>
        </div>
</template>
