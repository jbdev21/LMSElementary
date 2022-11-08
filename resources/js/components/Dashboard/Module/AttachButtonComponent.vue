<template>
    <div class="d-grid">
        <button type="button" @click="attach" v-if="!loading && !added" class="btn btn-primary text-white">
            <i class="fa fa-plus"></i>
            Attach 
        </button>
        <button type="button" v-if="loading" class="disabled btn btn-primary text-white">
            <i class="fa fa-spin fa-spinner"></i>
        </button>
        <button type="button" v-if="added" class="disabled btn btn-primary text-white">
            <i class="fa fa-check"></i> Added
        </button>
    </div>
</template>

<script>
export default {
    props: ['module', 'student'],
    data(){
        return {
            loading: false,
            added: false
        }
    },
    methods:{
        attach(){
            this.loading = !this.loading
            axios.post('/api/student/add-to-module',{
                    student: this.student,
                    module: this.module,
                })
                .then( response => {
                    this.added = true
                    this.loading = false
                })
                .catch (error => {
                    console.log(error)
                })
        }
    }
}
</script>

<style>

</style>