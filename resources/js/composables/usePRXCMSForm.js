import { useForm } from "@inertiajs/inertia-vue3";
import { watch } from "vue";
export default function usePRXForm(page, schema, submitUrl) {
  const formData = buildFormData(page, schema);
  const form = useForm(formData);

  watch(
    () => Object.keys(formData).map((key) => form[key]),
    (val, oldVal) => {
      for (let i = 0; i < val.length; i++) {
        if (val[i] !== oldVal[i]) {
          form.errors[Object.keys(formData)[i]] = null;
        }
      }
    },
    { deep: true }
  );

  function submit() {
    form.post(submitUrl);
  }

  return {
    form,
    submit,
  };
}

function buildFormData(page, schema) {
  let data = {
    title: page.title || null,
    description: page.description || null,
    keywords: page.keywords || null,
    robots_follow: page.robots_follow || true,
    robots_index: page.robots_index || true,
  };
  schema.sections.forEach((section) => {
    section.items.forEach((item) => {
      // get value from page
      const content = page.content;
      console.log(content);
      data[`${section.id}_${item.id}`] = content
        ? content[`${section.id}_${item.id}`] || null
        : null;
      if (item.type === "image") {
        data[`${section.id}_${item.id}_file`] = null;
      } // or file or whatever
    });
  });
  return data;
}
