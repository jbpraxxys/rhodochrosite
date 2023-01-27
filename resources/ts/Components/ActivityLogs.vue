<template>
    <div>
        <div class="py-3 px-6">
            <Filter
                :search="searchText"
                @update:searchText="(value) => (searchText = value)"
                @update:filters="getData"
            >
                <template #fields>
                    <div class="mb-6">
                        <selector
                            label="Event"
                            placeholder="Filter by Event"
                            :options="events"
                            :modelValue="filterEvent"
                            @update:modelValue="
                                (newValue) => (filterEvent = newValue)
                            "
                        />
                    </div>

                    <div class="mb-6" v-if="dateFilter">
                        <date-picker
                            id="filterDate"
                            label="Date Created"
                            placeholder="Filter Date Created"
                            v-model="filterDate"
                            :enableTimePicker="false"
                            @update:modelValue="(value) => (filterDate = value)"
                        />
                    </div>

                    <div class="mb-6" v-if="subjectFilter">
                        <selector
                            label="Subject"
                            placeholder="Filter Subject"
                            :options="subjects"
                            :modelValue="filterSubject"
                            @update:modelValue="
                                (newValue) => (filterSubject = newValue)
                            "
                        />
                    </div>
                </template>
            </Filter>
        </div>
        <div class="flex items-center justify-between px-4 mt-4">
            <div class="flex">
                <selector
                    placeholder="Filter by Status"
                    :options="events"
                    :modelValue="filterEvent"
                    @update:modelValue="(newValue) => (filterEvent = newValue)"
                    id="selector-id"
                    name="selector-name"
                    class="w-[180px] mr-2"
                ></selector>
            </div>
            <TextInput
                :lead-icon="'/images/icons/ic-search.svg'"
                type="text"
                name="input"
                id="input"
                placeholder="Search"
                v-model="searchText"
            />
        </div>

        <div class="mt-4">
            <DataTable
                :headers="headers"
                :no-action="true"
                :is-empty="logs.data.length === 0"
            >
                <template v-slot:body>
                    <template v-for="log in logs.data" :key="log.id">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ log.id }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ log.log_name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ log.event }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    {{ log.description }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ log.causer_name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">
                                    {{ log.created_at }}
                                </div>
                            </td>
                        </tr>
                    </template>
                </template>
            </DataTable>
        </div>

        <pagination class="mb-4" :items="logs" />
    </div>
</template>
<script>
// Components
import Filter from "@/Components/Filter.vue";
import Selector from "@/Components/Selector.vue";
import DatePicker from "@/Components/DatePicker.vue";
import DataTable from "@/Components/DataTable.vue";
import Pagination from "@/Components/Pagination.vue";
import EditButton from "@/Components/ActionButtons/EditButton.vue";
import TextInput from "@/Components/TextInput.vue";

import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
import { router } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";

export default {
    components: {
        Filter,
        Selector,
        DatePicker,
        DataTable,
        Pagination,
        EditButton,
        TextInput,
    },
    props: {
        logs: {
            type: Object,
            default: {},
        },
        resultRoute: {
            type: String,
            default: "",
        },
        tab: {
            type: String,
            default: "",
        },
        query: {
            type: String,
            default: "",
        },
        event: {
            type: String,
            default: "",
        },
    },
    setup(props) {
        const logs = computed(() => props.logs);

        const headers = [
            { text: "#", value: "id" },
            { text: "Log Name", value: "logName" },
            { text: "Event", value: "event" },
            { text: "Description", value: "description" },
            { text: "Caused By", value: "causedBy" },
            { text: "Date Received", value: "dateReceived" },
        ];

        /*--------------*
         * Table Search
         *--------------*/
        const filterEvent = ref(props.event);
        watch(
            filterEvent,
            throttle((val) => {
                Inertia.get(
                    props.resultRoute,
                    pickBy({
                        log_event: val,
                        log_query: props.query,
                        tab: props.tab,
                    }), // removes falsey values
                    {
                        preserveState: true,
                    }
                );
            })
        );

        const searchText = ref(props.query);
        watch(
            searchText,
            throttle((val) => {
                Inertia.get(
                    props.resultRoute,
                    pickBy({
                        log_event: props.event,
                        log_query: val,
                        tab: props.tab,
                    }), // removes falsey values
                    {
                        preserveState: true,
                    }
                );
            }, 1000)
        );

        const events = [
            { id: "created", value: "Created" },
            { id: "updated", value: "Updated" },
            { id: "deleted", value: "Deleted" },
            { id: "restored", value: "Restored" },
            { id: "mail", value: "Mail" },
            { id: "notification", value: "Notification" },
        ];

        return {
            logs,
            headers,
            searchText,
            filterEvent,
            events,
        };
    },
};
</script>
