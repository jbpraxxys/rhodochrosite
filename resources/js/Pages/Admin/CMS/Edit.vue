<template>
  <admin-layout
    :title="`Edit ${page.label}`"
    :breadcrumb-pages="breadcrumbs"
    :show-back="true"
  >
    <div class="space-y-6">
      <div class="bg-white px-7 py-5 sm:rounded-lg sm:p-6">
        <form @submit.prevent="submit">
          <div
            v-for="section in schema.sections"
            :key="section.id"
            class="md:grid md:grid-cols-3 md:gap-6"
          >
            <div class="md:col-span-1">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                {{ section.label }}
              </h3>
              <p class="mt-1 text-sm text-gray-500">
                {{ section.description }}
              </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <div class="grid grid-cols-6 gap-4">
                <template
                  v-for="item in section.items"
                  :key="`${section.id}_${item.id}`"
                >
                  <!-------------------
                   | Text
                   -------------------->
                  <div
                    v-if="item.type === 'text' || item.type === 'url'"
                    class="col-span-5"
                  >
                    <text-input
                      v-model="form[section.id + '_' + item.id]"
                      :label="item.label"
                      :id="`${section.id}_${item.id}`"
                      :error="form.errors[section.id + '_' + item.id]"
                    />
                    <p class="text-gray-400 text-sm mt-1">
                      {{ item.description }}
                    </p>
                  </div>

                  <!-------------------
                   | Textarea
                   -------------------->
                  <div v-if="item.type === 'textarea'" class="col-span-5">
                    <text-input
                      :textarea="true"
                      v-model="form[section.id + '_' + item.id]"
                      :label="item.label"
                      :id="`${section.id}_${item.id}`"
                      :error="form.errors[section.id + '_' + item.id]"
                    />
                    <p class="text-gray-400 text-sm mt-1">
                      {{ item.description }}
                    </p>
                  </div>

                  <!-------------------
                   | HTML Editor
                   -------------------->
                  <div v-if="item.type === 'htmleditor'" class="col-span-5">
                    <ckeditor
                      v-model="form[section.id + '_' + item.id]"
                      :label="item.label"
                      :id="`${section.id}_${item.id}`"
                      :error="form.errors[section.id + '_' + item.id]"
                    ></ckeditor>
                  </div>

                  <!-------------------
                   | Images
                   -------------------->
                  <div class="col-span-5" v-if="item.type === 'image'">
                    <label
                      :for="item.id"
                      class="block text-sm font-medium text-gray-700 mb-1"
                      >{{ item.label }}</label
                    >
                    <dropzone
                      v-model:path="form[section.id + '_' + item.id]"
                      v-model:file="form[section.id + '_' + item.id + '_file']"
                      :label="item.label"
                      :id="`${section.id}_${item.id}`"
                      :description="item.description"
                      :error="form.errors[section.id + '_' + item.id + '_file']"
                    ></dropzone>
                  </div>

                  <!-------------------
                   | List Table
                   -------------------->
                  <div class="col-span-5" v-if="item.type === 'list_table'">
                    <list-table
                      :list="item"
                      :items="item.items"
                      :id="section.id + '_' + item.id"
                      :form="form"
                      @update-list="updateList"
                    ></list-table>
                  </div>
                </template>
              </div>
            </div>
            <!-- Divider -->
            <div class="border-b border-gray-200 md:col-span-6 mt-6 mb-10"></div>
          </div>
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <h3 class="text-lg font-medium leading-6 text-gray-900">
                SEO Metadata
              </h3>
              <p class="mt-1 text-sm text-gray-500">
                Enter your SEO data such as title, description, and keywords
                data.
              </p>
            </div>
            <!-- Meta Data -->
            <div class="mt-5 md:mt-0 md:col-span-2">
              <div class="grid grid-cols-6 gap-4">
                <div class="col-span-5">
                  <text-input
                    v-model="form.title"
                    label="Title"
                    id="seo_title"
                    :error="form.errors.title"
                  />
                  <p class="text-gray-400 text-sm mt-1">50-60 characters max</p>
                </div>

                <div class="col-span-5">
                  <text-input
                    v-model="form.description"
                    label="Description"
                    id="seo_description"
                    :error="form.errors.description"
                  />
                  <p class="text-gray-400 text-sm mt-1">160 characters max</p>
                </div>

                <div class="col-span-5">
                  <text-input
                    v-model="form.keywords"
                    label="Keywords"
                    id="seo_keywords"
                    :error="form.errors.keywords"
                  />
                  <p class="text-gray-400 text-sm mt-1">
                    Comma-separated values
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-span-6 sm:col-span-4">
            <jet-button @click="submit" type="button">
              Save Changes
            </jet-button>
          </div>
        </form>
      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import TextInput from "@/Components/TextInput.vue";
import Dropzone from "@/Components/Dropzone.vue";
import ListTable from "@/Components/ListTable.vue";
import useListTable from "@/composables/useListTable";
import { PencilSquareIcon } from "@heroicons/vue/24/solid";
import usePRXCMSForm from "@/composables/usePRXCMSForm";
import Selector from "@/Components/Selector.vue";
import ckeditor from  "@/Components/CKEditor.vue";
import JetButton from "@/Jetstream/Button.vue";

export default {
  components: {
    AdminLayout,
    PencilSquareIcon,
    TextInput,
    Selector,
    Dropzone,
    ListTable,
    ckeditor,
    JetButton
  },
  props: ["page", "schema"],
  setup(props) {
    // Breadcrumbs
    const breadcrumbs = [
      {
        name: "CMS",
        href: route("admin.cms.index"),
      },
      { name: "Edit", href: "#" },
    ];

    const submitUrl = route("admin.cms.edit", props.page.id);

    const { form, submit } = usePRXCMSForm(props.page, props.schema, submitUrl);

    const { updateList } = useListTable(form);

    return {
      breadcrumbs,
      form,
      submit,
      updateList,
    };
  },
};
</script>
