<template>
    
    <!-- <div class="grid grid-cols-2 gap-4">
        <div>
            <TypeView></TypeView>
        </div>
        <div>
            <TypeSnippet></TypeSnippet>
        </div>
    </div> -->

    <div class="w-full">
        <TypeView></TypeView>
    </div>

</template>
<script>
import TypeView from '../Components/typography/TypographyView.vue';
// import TypeSnippet from '../Components/typography/TypographySnippet.vue';

export default {
    components: {
        TypeView,
        // TypeSnippet
    }
}
</script>