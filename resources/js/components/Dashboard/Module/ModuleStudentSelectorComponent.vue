<template>
  <div class="input-group mb-3">
    <input type="search" v-model="searchText" class="form-control" placeholder="Search Student" aria-label="Search Student" aria-describedby="button-addon2">
    <button class="btn btn-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Section</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="student in students" :key="student.id">
        <td>{{ student.last_name }}</td>
        <td>{{ student.first_name }}</td>
        <td>{{ student.middle_name }}</td>
        <td>{{ student.section }}</td>
        <td class="text-end">
          <AttachButtonComponentVue :student="student.id" :module="module"/>
        </td>
      </tr>
    </tbody>
  </table>
</template>
<script>
import AttachButtonComponentVue from './AttachButtonComponent.vue'
export default {
  props: ['module'],
  components: {
    AttachButtonComponentVue
  },
  data() {
    return {
      students: [],
      searchText: ""
    }
  },
  methods:{
    checkSearchStr: _.debounce(function(string) {
      axios.get("/api/student/search",{
        params: {
          q: string
        }
      })
      .then( response => {
        this.students = response.data
      })
      .catch( error => {
        console.log(error)
      })
    }, 250)
  },  

  watch:{
    searchText(newValue){
      this.checkSearchStr(newValue)
    }
  }
  
}
</script>

