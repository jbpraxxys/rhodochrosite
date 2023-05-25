<template>
    <div class="flex flex-col justify-center items-start px-[160px]">
        <div class="w-full">
            <slot name="title" />
        </div>

        <div class="w-full mt-6">
            <slot />
        </div>
    </div>
</template>
