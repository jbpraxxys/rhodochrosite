<template>
	<div
		class="flex justify-between items-center py-4 px-5 rounded-lg mb-4"
		:class="[value ? 'bg-primary-50' : 'bg-white']"
	>
		<div
			class="cursor-pointer select-none"
			@click="$emit('change', !value)"
		>
			<h5 class="font-bold leading-6">{{ label }}</h5>
			<p class="mt-1 text-sm text-gray-500">
				{{ description }}
			</p>
		</div>
		<div class="flex items-center">
			<Switch
				v-model="value"
				@update:modelValue="$emit('change', value)"
				:class="value ? 'bg-primary-300' : 'bg-gray-300'"
				class="relative inline-flex h-6 w-11 items-center rounded-full"
			>
				<span class="sr-only">{{ label }}</span>
				<span
					:class="value ? 'translate-x-6' : 'translate-x-1'"
					class="inline-block h-4 w-4 transform rounded-full bg-white"
				/>
			</Switch>
		</div>
	</div>
</template>

<script>
import { Switch } from "@headlessui/vue";

export default {
	components: {
		Switch,
	},
	emits: ["change"],
	props: {
		value: {
			default: null,
			required: true,
		},
		label: {
			default: null,
			required: true,
		},
		description: {
			default: null,
			required: false,
		},
	},
};
</script>
