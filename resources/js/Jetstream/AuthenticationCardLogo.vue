<template>
    <Link :href="'/'">
        <img style="max-width: 480px; min-width: 360px; margin: auto;" src="/images/logo.png" alt="Super 8">
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
