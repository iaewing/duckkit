<template>
    <div>
        <div>{{ postTitle }}</div>
        <div>{{ postBody }}</div>
    </div>
</template>

<script setup lang="ts">
    defineProps(["postTitle", "postBody"]);
</script>
