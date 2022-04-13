<template>
    
    <div class="grid grid-cols-2 gap-4">
        <div>
            <Colors></Colors>
        </div>
        <div>
            <ColorSnippet></ColorSnippet>
        </div>
    </div>

</template>
<script>
import Colors from '../Components/colors/ColorView.vue';
import ColorSnippet from '../Components/colors/CodeSnippet.vue';

export default {
    components: {
        Colors,
        ColorSnippet
    }
}
</script>