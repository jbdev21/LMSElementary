<template>
    <div class="panel panel-default">
        <form ref="form" @submit.prevent="submit" :action="route" method="POST" id="question-form" enctype="multipart/form-data">
            <input type="hidden" name="_token" :value="token">
            <input type="hidden" name="module" :value="module">
            <input type="hidden" name="type" :value="type">
            <div class="panel-heading">Question</div>
            <div class="panel-body p-3">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mb-2">
                            <textarea name="body" style="min-height: 250px;" class="form-control" v-model="text" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- <span class='mr-3'>
                            <input type="radio" id="multiple" v-model="currentForm" value="multiple" name="question_type"> <label for="multiple"> Multiple Choice</label>
                        </span>
                        <span>
                            <input type="radio" id="subjective" v-model="currentForm" value="subjective"  name="question_type"> <label for="subjective"> Subjective</label>
                        </span> -->

                        <div class="">
                            <component v-bind:is="currentForm"  class="tab"></component>
                        </div>

                    </div>
                </div>

            </div>
            <div class="panel-footer text-right p-2">
                <button class="btn btn-warning btn-lg" :disabled="saving" type="submit" style="width:150px">
                    <span v-if="!saving">
                        <i class="fa fa-save"></i> Save
                    </span>
                    <span v-if="saving">
                        <i class="fa fa-spin fa-spinner"></i> Saving..
                    </span>
                </button>
            </div>
        </form>
    </div>
</template>
<script>


import Multiple from './options/Multiple.vue'
import Subjective from './options/Subjective.vue'
export default {
    props:['route', 'token', 'module', 'type'],
    components: {
        'multiple': Multiple,
        'subjective': Subjective,
        // FilePond
   },

    data(){
       return {
           currentForm: 'multiple',
           myFiles:[],
           text: 'put your question here..',
           inputData: {},
           saving: false,
           editorConfig : {
                    height:300,
                    menubar: 'insert',
                    plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table paste code help media'
                        ],
                    toolbar: 'undo redo | bold italic backcolor | \
                            alignleft aligncenter alignright alignjustify | \
                            bullist numlist outdent indent image media',
                    toolbar_mode: 'floating',
                    tinycomments_mode: 'embedded',
                    forced_root_block: '',
                    branding: false,
                    verify_css_classes : true,
                    images_upload_url: '/api/upload',
                    images_upload_base_path: '/jofie',
                    images_reuse_filename: true,
                    media_alt_source: false,
                    media_poster: false,
                    relative_urls : false,
                    remove_script_host : false,
                }
       }
    },
    methods:{
        submit(){
            this.saving = true;
            this.$refs.form.submit();
            // var formData = $('#question-form').serialize() + '&body=' + this.text;
            // // console.log(this.text)
            // axios.post(this.route, formData, {
            //     headers: {
            //         'Content-Type': 'multipart/form-data'
            //     }
            //     })
            //     .then( e => {
            //         console.log(e.data)
            //         this.saving = false
            //         // location.reload()
            //     })
            //     .catch( error => {
            //         console.log(error)
            //         this.saving = false
            //     })

        },

        // getInputData(data){
        //     // var formData = new FormData(data);
        //     // console.log(formData)
        //     // this.inputData = formData
        // }
    },


}
</script>

<style lang="scss" scoped>
    .tox-tinymce{
        border-top: none !important;
    }
</style>
