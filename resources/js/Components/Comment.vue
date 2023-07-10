<script setup lang="ts">
import { onBeforeMount, ref } from 'vue';


const props = defineProps(['comment']);

</script>

<template>
    <div class="border-4 px-4 py-2 w-3/4">
        {{ comment.karma }}
        {{ comment.body }}</div>
</template>