<template>
    <div>
        
        <slot />
        
    </div>
</template>

<script>
import { onMounted } from "vue";



export default {
    components: {
    },
    props: {
    },
    setup(props){

        onMounted(() => {
        })

        return {
        }
    }, 
}
</script>