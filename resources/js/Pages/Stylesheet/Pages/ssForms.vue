<template>
    
    <div class="grid grid-cols-2 gap-4">
        <div>
            <FormView></FormView>
        </div>
        <div></div>
    </div>

</template>
<script>
import FormView from '../Components/forms/FormView.vue';

export default {
    components: {
        FormView
    }
}
</script>