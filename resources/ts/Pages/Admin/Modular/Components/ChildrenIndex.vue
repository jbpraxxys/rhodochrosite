<template>
    <div class="flex space-x-6 pt-10">
        <div class="w-3/12">
            <p class="text-sm mb-4 text-neutral-500">
                List of Children Pages
            </p>
            <create-button 
                text="Add Child Page"
                :routeLink="createRoute"
            />
        </div>
        <div class="w-9/12">
            <table-container>
                <template #body>
                    <data-table
                        :headers="headers"
                        :no-action="false"
                        :count="childrenPages.length"
                    >
                        <template v-slot:body>
                            <template v-for="item in childrenPages" :key="item">
                                <tr>
                                    <td>
                                        {{ item.id }}
                                    </td>
                                    <td class="w-10/12">
                                        {{ item.title }}
                                    </td>
                                    
                                    <td class="text-center">
                                        <edit-button
                                            :routeLink="route('admin.pages.child.edit', item.id)"
                                        />
                                    </td>
                                </tr>
                            </template>
                        </template>
                    </data-table>

                </template>

                <template #footer>
                    <pagination :items="childrenPages" />
                </template>
            </table-container>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref } from 'vue';
const props = defineProps({
    item: {
        type: Object
    },
    childrenPages: {
        type: Object
    },
})

const headers: { text: string }[] = [
    { text: 'ID' },
    { text: 'Title' },
];

const createRoute = ref<string>(route('admin.pages.child.create', props.item.id));
</script>