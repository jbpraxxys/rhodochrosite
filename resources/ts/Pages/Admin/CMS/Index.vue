<template>
    <admin-layout
    title="CMS"
    >
        <div>
            <DataTable 
            :headers="headers" 
            :count="items.length">
                <template v-slot:body>
                    <template v-for="page in items" :key="page.slug">
                        <tr>
                            <td
                                class="px-6 py-4 whitespace-nowrap"
                            >
                                {{ page.label }}
                            </td>
                            <td
                                class="px-6 py-4 whitespace-nowrap"
                            >
                                {{ page.updated_at }}
                            </td>
                            <td
                                v-if="!noAction"
                                class="
                                    px-6
                                    py-4
                                    whitespace-nowrap
                                    text-sm text-gray-500 text-center
                                "
                            >
                                <edit-button
                                    :route="route('admin.cms.edit', page.id)"
                                />
                            </td>
                        </tr>
                    </template>
                </template>
            </DataTable>
        </div>
    </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import DataTable from "@/Components/DataTable.vue";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
import { computed } from "vue";
export default {
    components: {
        AdminLayout,
        DataTable,
        EditButton
    },
    props: ["items"],
    setup(props) {
        /*--------------------*
         * Table Data/Init Vars
         *--------------------*/
        const items = computed(() => props.items);

        const headers = [
            { text: "Label", value: "Label" },
            { text: "Last Updated", value: "Last Updated" },
        ];

        return {
            // Table
            items,
            headers
        };
    },
};
</script>
