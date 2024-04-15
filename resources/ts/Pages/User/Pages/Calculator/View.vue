<template>
    <user-layout>
        <general-banner 
            :item="{
                image: '/temp/advantage1.png',
                title: 'Team Builder'
            }"
        />  
        <offset-banner 
            :item="{
                title: 'Be part of our team!',
                description: 'Join our growing pool of talented experts and take your career to the next level.'
            }"
        />
       <section class="bg-primary-50">
        <div class="max-w-[1440px] m-auto p-20 pt-0">
            <div class="flex space-x-12">
                <div class="w-[350px] p-8 rounded-[2rem] bg-primary-800/[0.02]">
                    <div class="mb-8">
                        <p class="text-3xl font-bold mb-4">Hire top talent!</p>
                        <p>For much less than you expect.</p>
                    </div>
                    <div class="space-y-8">
                        <div>
                            <v-selector
                                :options="sampleOption"
                                label="Role"
                                placeholder="Select role here"
                                id="role"
                                name="role"
                            />
                        </div>
                        <div>
                            <v-selector
                                :options="sampleOption"
                                label="Experience Level"
                                placeholder="Select experience level here"
                                id="experience_level"
                                name="experience_level"
                            />
                        </div>
                        <div>
                            <v-selector
                                :options="sampleOption"
                                label="Country"
                                placeholder="Select country here"
                                id="country"
                                name="country"
                            />
                        </div>
                        <div class="flex items-center justify-between space-x-6">
                            <div class="relative text-primary-500 font-medium cursor-pointer w-1/2">
                                <img class="h-11 w-full" src="/icons/export.svg" alt="button">
                                <p class="absolute top-1/2 w-full text-center -translate-y-1/2 text-sm">Add Role</p>
                            </div>
                            <v-button custom-class="px-6 !text-base animateUp w-1/2" size="md" design-color="">
                                Proceed
                            </v-button>
                        </div>
                    </div>
                </div>
                <div class="w-[calc(100%-398px)]">
                    <div class="p-8 bg-primary-900 rounded-[2rem] h-fit mb-8">
                        <table class="w-full text-left border-b mb-3">
                            <tr class="w-full text-white font-bold">
                                <th>Role</th>
                                <th>Country</th>
                                <th>Experience Level</th>
                                <th>Onshore Cost</th>
                                <th>Reliasourcing Cost</th>
                                <th>Your Savings</th>
                                <th></th>
                            </tr>
                            <tr class="text-white text-left">
                                <td class="pl-0 pr-2 py-10">Web Designer</td>
                                <td class="px-2 py-10">US</td>
                                <td class="px-2 py-10">Intermediate</td>
                                <td class="px-2 py-10 font-bold">$ 5,467</td>
                                <td class="px-2 py-10 font-bold">$ 1,348</td>
                                <td class="px-2 py-10 font-bold text-right">$ 4,119 </td>
                                <td class="px-4 py-10"><XMarkIcon class="w-4 h-4 text-red-600 cursor-pointer" /></td>
                            </tr>
                        </table>
                        <div>
                            <p class="text-28 font-bold text-white mb-8">Estimated Monthly Cost</p>
                            <div class="grid grid-cols-3 gap-8">
                                <div>
                                    <p class="text-3xl font-bold text-primary-500 mb-4">$ 5,467</p>
                                    <p class="text-white">Monthly cost of hiring yourself</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-bold text-primary-500 mb-4">$ 1,348</p>
                                    <p class="text-white">Monthly savings with Reliasourcing</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-bold text-primary-500 mb-4">75.34%</p>
                                    <p class="text-white">of Savings</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
import { XMarkIcon } from "@heroicons/vue/24/solid";

const sampleOption = [
    { id: 'Creative Services', value: 'Creative Services'},
    { id: 'Web Design', value: 'Web Design'},
    { id: 'Web Development', value: 'Web Development'},
    { id: 'Software Development', value: 'Software Development'},
    { id: 'Sales Development Services', value: 'Sales Development Services'},
    { id: 'Email and Phone Support', value: 'Email and Phone Support'},
    { id: 'Live Chat Support', value: 'Live Chat Support'},
    { id: 'Social Media Services', value: 'Social Media Services'},
    { id: 'Revenue Optimization Services', value: 'Revenue Optimization Services'},
]
</script>