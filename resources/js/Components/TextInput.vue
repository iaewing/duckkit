<script setup>
import { onMounted, ref } from 'vue';

defineProps({
    modelValue: String,
    isAuthenticated: {
        type: Boolean,
        default: true
    } 
})

defineEmits(['update:modelValue']);

const input = ref(null);

onMounted(() => {
    if (input.value?.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div v-if="!isAuthenticated" class="w-1/3 h-44 flex ml-4">
        <input class="flex-1 border border-gray-300 focus:border-violet-500 focus:ring-indigo-500 rounded-md shadow-sm pl-4"
            placeholder="YO GO SIGN IN! You can't comment unless you're signed in" disabled />
    </div>
    <div v-else>
        <input
            class="border border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input" />
    </div>
</template>
