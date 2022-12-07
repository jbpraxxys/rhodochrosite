<template>
	<admin-layout
		:breadcrumb-pages="breadcrumbs"
		title="Create Role"
		:show-back="true"
		:back-url="route('admin.role-permission-management.index')"
	>
		<div class="mb-6">
			<tabs
				:tabs="tabs"
				:active-tab="activeTab"
				:preserve-state="true"
				@update:activeTab="(newValue) => (activeTab = newValue)"
				:page-route="route('admin.role-permission-management.create')"
			/>
		</div>

		<div class="space-y-6" v-show="!activeTab">
			<div class="bg-white px-7 py-5 sm:rounded-lg sm:p-6">
				<div class="md:grid md:grid-cols-3 md:gap-6">
					<div class="md:col-span-1">
						<h3 class="text-lg font-medium leading-6 text-gray-900">
							Basic Information
						</h3>
						<p class="mt-1 text-sm text-gray-500">
							Upon saving, the new role will have the selected
							permissions.
						</p>
					</div>
					<div class="mt-5 md:mt-0 md:col-span-2">
						<div class="grid grid-cols-6 gap-6">
							<div class="col-span-6 sm:col-span-3">
								<TextInput
									v-model="form.name"
									label="Name"
									id="name"
									:error="form.errors.name"
								/>
							</div>
							<div class="col-span-6 sm:col-span-4">
								<TextInput
									v-model="form.description"
									label="Description"
									id="description"
									:error="form.errors.description"
								/>
							</div>

							<div class="col-span-6">
								<button
									@click="submit"
									class="
										inline-flex
										items-center
										px-3
										py-1.5
										border border-transparent
										text-xs
										font-medium
										rounded-full
										shadow
										text-gray-800
										bg-primary-300
										hover:bg-primary-200
										focus:outline-none
										focus:ring-2
										focus:ring-offset-2
										focus:ring-primary-300
									"
								>
									<PlusIcon
										class="-ml-0.5 mr-2 h-4 w-4"
										aria-hidden="true"
									/>
									Create
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="space-y-6" v-show="activeTab == 'permissions'">
			<div class="bg-white px-7 py-5 sm:rounded-lg sm:p-6">
				<div class="md:grid md:grid-cols-3 md:gap-6">
					<div class="md:col-span-1">
						<h3 class="text-lg font-medium leading-6 text-gray-900">
							Role Permissions
						</h3>
						<p class="mt-1 text-sm text-gray-500">
							Abilities for different pages.
						</p>
					</div>
					<div class="mt-5 md:mt-0 md:col-span-2">
						<div class="grid grid-cols-6 gap-6">
							<div class="col-span-6">
								<ToggleSwitch
									v-for="permission in permissions"
									:key="permission.id"
									:value="form.permissions[permission.id]"
									@change="
										(value) =>
											(form.permissions[permission.id] =
												value)
									"
									:label="permission.label"
									:description="permission.description"
								/>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { PlusIcon } from "@heroicons/vue/24/solid";
import Tabs from "@/Components/Tabs.vue";
import usePRXForm from "@/composables/usePRXForm";
import { ref } from "vue";
import Selector from "@/Components/Selector.vue";
import TextInput from "@/Components/TextInput.vue";
import ToggleSwitch from "@/Components/ToggleSwitch.vue";

export default {
	components: {
		AdminLayout,
		PlusIcon,
		Tabs,
		usePRXForm,
		Selector,
		TextInput,
		ToggleSwitch,
	},
	props: ["selectedTab", "permissions"],
	setup(props) {
		const permissions = ref(props.permissions);
		const activeTab = ref(props.selectedTab);

		const tabs = [
			{
				name: "Information",
				href: "#",
				value: null,
			},
			{
				name: "Permissions",
				href: "#",
				value: "permissions",
			},
		];

		/*---------------*
		 * Breadcrumbs
		 *---------------*/
		const breadcrumbs = [
			{
				name: "Role",
				href: route("admin.role-permission-management.index"),
				current: true,
			},
		];

		const formData = {
			name: null,
			description: null,
			permissions: [],
		};

		const submitUrl = route("admin.role-permission-management.store");

		const { form, submit } = usePRXForm(formData, submitUrl);

		return {
			breadcrumbs,
			// Tabs
			tabs,
			activeTab,
			// Form
			form,
			submit,
			// Permissions
			permissions,
		};
	},
};
</script>
