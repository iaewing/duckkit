<script setup lang="ts">
import * as dayjs from "dayjs";
import * as relativeTime from "dayjs/plugin/relativeTime";
import { onBeforeMount, ref } from "vue";

const commentTime = ref(null);
const props = defineProps(['comment']);

onBeforeMount(() => {
    commentTime.value = calculateTime();
})

function calculateTime() {
    dayjs.extend(relativeTime);
    return dayjs(new Date(props.comment.created_at).getTime()).fromNow();
}

</script>

<template>
    <div class="px-4 py-2 w-3/4">
        <!-- <div>minus</div> -->
        <div class="text-xs space-x-2">
            <span v-if="comment.user?.name" class="text-sm text-violet-400">{{ comment.user.name }}</span>
            <span v-if="!comment.user" class="text-sm text-gray-400">[deleted]</span>
            <span>{{ comment.karma }} points</span>
            <span>{{ commentTime }}</span>
        </div>
        <div>
            {{ comment.body }}
        </div>
    </div>
</template>