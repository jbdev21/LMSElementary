<template>
  <div class="mb-5 mt-3">
    <div class="row mb-1">
        <div class="col-6">
            <div class="form-check">
                <input
                class="form-check-input"
                    type="radio"
                    :value="option"
                    name="answer"
                    :checked="ischecked"
                    :id="`radio-${option}`"
                />
                <label class="form-check-label" :for="`radio-${option}`">
                    Correct Answer
                </label>
            </div>
        </div>
        <div class="col-6 text-end">
            <button
                class="btn btn-light text-danger"
                @click="$emit('remove', option)"
                :disabled="isdisabled"
                type="button"
                >
                <i class="fa fa-remove"></i>
            </button>
        </div>
    </div>
    <editor
      api-key="3etjjswjc4u1mtvnr70q7p3ahavix9rhnp8puim5vad1kjt7"
      :init="init"
      :name="`options[${option}]`"
    />

</div>
</template>

<script>
import Editor from "@tinymce/tinymce-vue";
export default {
  props: ["option", "isdisabled", "ischecked"],
  components: {
    editor: Editor,
  },
  data() {
    return {
      init: {
        menubar: false,
        statusbar: false,
        plugins: "image",
        toolbar: "image",
        height: "150",
        images_upload_url: "/file/upload-tiny-mce",
        file_picker_types: "image",
        file_picker_callback: function (cb, value, meta) {
          var input = document.createElement("input");
          input.setAttribute("type", "file");
          input.setAttribute("accept", "image/*");
          input.onchange = function () {
            var file = this.files[0];

            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function () {
              var id = "blobid" + new Date().getTime();
              var blobCache = tinymce.activeEditor.editorUpload.blobCache;
              var base64 = reader.result.split(",")[1];
              var blobInfo = blobCache.create(id, file, base64);
              blobCache.add(blobInfo);
              cb(blobInfo.blobUri(), { title: file.name });
            };
          };
          input.click();
        },
      },
    };
  },
};
</script>
