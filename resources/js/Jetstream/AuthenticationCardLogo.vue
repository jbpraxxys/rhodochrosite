<template>
    <Link :href="'/'">
        <img style="max-width: 300px;" src="/images/logo.png" alt="PRAXXYS">
    </Link>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Link,
        },
    }
</script>
