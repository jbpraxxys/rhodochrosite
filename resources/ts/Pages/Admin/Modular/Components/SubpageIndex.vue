<template>
    <div class="flex space-x-6 pt-10">
        <div class="w-3/12">
            <p class="text-sm mb-4 text-neutral-500">
                List of Sub Pages
            </p>
            <create-button 
                text="Add Sub Page"
                :routeLink="createRoute"
            />
        </div>
        <div class="w-9/12">
            <table-container>
                <template #body>
                    <data-table
                        :headers="headers"
                        :no-action="false"
                        :count="subPages.length"
                    >
                        <template v-slot:body>
                            <template v-for="item in subPages" :key="item">
                                <tr>
                                    <td>
                                        {{ item.id }}
                                    </td>
                                    <td class="w-10/12">
                                        {{ item.title }}
                                    </td>
                                    
                                    <td class="text-center">
                                        <edit-button
                                            :routeLink="route('admin.pages.subpage.edit', item.id)"
                                        />
                                    </td>
                                </tr>
                            </template>
                        </template>
                    </data-table>

                </template>

                <template #footer>
                    <pagination :items="items" />
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
    subPages: {
        type: Object
    },
})

const items = {
    data: [
        {
            id: 1,
            title: 'subepage 1',
        }
    ]
}

const headers: { text: string }[] = [
    { text: 'ID' },
    { text: 'Title' },
];

const createRoute = ref<string>(route('admin.pages.subpage.create', props.item.id));
</script>