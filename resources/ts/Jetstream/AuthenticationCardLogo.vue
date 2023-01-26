<template>
    <Link :href="'/'">
        <img style="max-width: 480px; min-width: 360px; margin: auto;" src="/icons/logo.png" alt="logo">
    </Link>
</template>

<script>
    import { Link } from "@inertiajs/vue3";

    export default {
        components: {
            Link,
        },
    }
</script>
