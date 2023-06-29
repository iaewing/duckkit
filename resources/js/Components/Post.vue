<script setup lang="ts">
    defineProps(["postTitle", "postBody"]);
</script>

<template>
    <div>
        <div>{{ postTitle }}</div>
        <div>{{ postBody }}</div>
    </div>
</template>
