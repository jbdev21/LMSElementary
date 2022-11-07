<template>
  <div class="input-group mb-3">
    <input type="seach" v-model="searchText" class="form-control" placeholder="Search Student" aria-label="Search Student" aria-describedby="button-addon2">
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</template>
<script>
export default {
  data() {
    return {
      students: [],
      searchText: ""
    }
  },
  
}
</script>

