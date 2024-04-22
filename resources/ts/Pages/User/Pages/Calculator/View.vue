<template>
    <user-layout>
        <general-banner 
            :item="{
                image: $page.props.storage_url + cms?.section1_image,
                title: cms?.section1_title
            }"
        />  
        <offset-banner 
            id="calculator"
            :item="{
                title: cms?.section1_header,
                description: cms?.section1_content
            }"
        />
        <section class="bg-primary-50 relative">
            <div class="max-w-[1440px] m-auto p-20 pt-0">
                <div class="flex space-x-12">
                    <div class="w-[350px] p-8 rounded-[2rem] bg-primary-800/[0.02]">
                        <div class="mb-8">
                            <p class="text-3xl font-bold mb-4">Hire top talent!</p>
                            <p>For much less than you expect.</p>
                        </div>
                        <div class="space-y-8 filter-wrapper">
                            <div>
                                <v-selector
                                    :options="rolesObject"
                                    label="Role"
                                    placeholder="Select role here"
                                    id="role"
                                    name="role"
                                    v-model="form.role"
                                />
                            </div>
                            <div>
                                <v-selector
                                    :options="experienceObject"
                                    label="Experience Level"
                                    placeholder="Select experience level here"
                                    id="experience"
                                    name="experience"
                                    v-model="form.experience"
                                />
                            </div>
                            <div>
                                <v-selector
                                    :options="countryObject"
                                    label="Country"
                                    placeholder="Select country here"
                                    id="country"
                                    name="country"
                                    v-model="form.country"
                                />
                            </div>
                            <div class="flex items-center justify-between space-x-6">
                                <div @click="addFilterList()" class="relative text-primary-500 font-medium cursor-pointer w-1/2">
                                    <img class="h-11 w-full" src="/icons/export.svg" alt="button">
                                    <p class="absolute top-1/2 w-full text-center -translate-y-1/2 text-sm">Add Role</p>
                                </div>
                                <v-button @click="filterList()" custom-class="px-6 !text-base w-1/2" size="md" design-color="">
                                    Proceed
                                </v-button>
                            </div>
                        </div>
                    </div>
                    <div class="w-[calc(100%-398px)]">
                        <div class="p-8 bg-primary-900 rounded-[2rem] h-fit mb-8">
                            <table class="w-full text-left border-b mb-3">
                                <tr class="w-full text-white font-bold text-sm">
                                    <th class="pr-2">Role</th>
                                    <th class="px-2">Country</th>
                                    <th class="px-2">Experience Level</th>
                                    <th class="px-2">Onshore Cost</th>
                                    <th class="px-2">Reliasourcing Cost</th>
                                    <th class="px-2 text-right">Your Savings</th>
                                    <th class="pl-2"></th>
                                </tr>
                                <tr v-for="item in filteredData" class="text-white text-left text-sm">
                                    <td class="pl-0 pr-2 py-5 max-w-[150px] whitespace-pre-wrap">{{item.role}}</td>
                                    <td class="px-2 py-5">{{ item.country }}</td>
                                    <td class="px-2 py-5">{{ item.experience }}</td>
                                    <td class="px-2 py-5 font-bold">$ <render-price :value="item.onshore" /></td>
                                    <td class="px-2 py-5 font-bold">$ <render-price :value="item.offshore" /></td>
                                    <td class="px-2 py-5 font-bold text-right">$ <render-price :value="item.onshore - item.offshore" /></td>
                                    <td @click="removeItem(item.id)" class="px-4 py-5"><XMarkIcon class="w-4 h-4 text-red-600 cursor-pointer" /></td>
                                </tr>
                                <tr v-if="filteredData.length == 0" class="text-white text-left h-16"></tr>
                            </table>
                            <div>
                                <p class="text-28 font-bold text-white mb-8">Estimated Monthly Cost</p>
                                <div class="grid grid-cols-3 gap-8">
                                    <div>
                                        <p class="text-3xl font-bold text-primary-500 mb-4">$ <render-price :value="totalOnshore" /></p>
                                        <p class="text-white">Monthly cost of hiring yourself</p>
                                    </div>
                                    <div>
                                        <p class="text-3xl font-bold text-primary-500 mb-4">$ <render-price :value="totalOffshore" /></p>
                                        <p class="text-white">Monthly savings with Reliasourcing</p>
                                    </div>
                                    <div>
                                        <p class="text-3xl font-bold text-primary-500 mb-4">{{ totalSavings }}%</p>
                                        <p class="text-white">of Savings</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- TODO: Send Email Computation -->
                        <div class="w-fit m-auto">
                            <v-button custom-class="px-6 !text-base animateUp" size="md" design-color="">
                                Email Computation
                            </v-button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </user-layout>
</template>
<script setup lang="ts">
import { ref, computed, onMounted } from "vue";
import { XMarkIcon } from "@heroicons/vue/24/solid";
import RenderPrice from "@/Components/Inputs/RenderPrice.vue";
const props = defineProps({
    cms: {
        type: Object,
        default: () => ({})
    },
    role: {
        type: String,
    },
    experience: {
        type: String,
    },
    country: {
        type: String,
    },
    items: {
        type: Object,
        default: () => ({})
    },
})


const rolesObject = [...new Set(props.items.map(obj => obj.role))].map(role => ({ id: role, value: role }));
const experienceObject = [...new Set(props.items.map(obj => obj.experience))].map(experience => ({ id: experience, value: experience }));
const countryObject = [...new Set(props.items.map(obj => obj.country))].map(country => ({ id: country, value: country }));

const filteredData = ref([]);

const addFilterList = () => {
    // Perform filtering here
    const filtered = props.items.filter(
    item => item.role.includes(form.value.role) &&
            item.country.includes(form.value.country) &&
            item.experience.includes(form.value.experience)
    );
    // Add the new filtered list to the existing filteredData array
    filteredData.value = filteredData.value.concat(filtered);
};

const filterList = () => {
    // Perform filtering here
    const filtered = props.items.filter(
    item => item.role.includes(form.value.role) &&
            item.country.includes(form.value.country) &&
            item.experience.includes(form.value.experience)
    );
    // Replace the existing filteredData array with the new filtered list
    filteredData.value = filtered;
};

const removeItem = (id) => {
  // Create a new filteredData array with the item with the given id removed
  filteredData.value = filteredData.value.filter(item => item.id !== id);
};

const totalOnshore = computed(() => {
  // Add up the onshore values in the filteredData array
  return filteredData.value.reduce((total, item) => total + Number(item.onshore), 0);
});
const totalOffshore = computed(() => {
  // Add up the offshore values in the filteredData array
  return filteredData.value.reduce((total, item) => total +  Number(item.onshore - item.offshore), 0);
});

const totalSavings = computed(() => {
  // Compute the total savings
  return (( totalOffshore.value / totalOnshore.value) * 100).toFixed(2);
});

const form = ref({
    role: props.role,
    country: props.country,
    experience: props.experience,
});

onMounted(() => {
    filterList();
    setTimeout(() => {
        var element = document.getElementById('calculator');
        if (element) {
            window.scroll({
            top: element.offsetTop,
            left: 0,
            behavior: 'smooth'
            });
        }
        console.log('working');
    }, 500)
});



</script>