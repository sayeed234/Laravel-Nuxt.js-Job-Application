
<template>
  <div>
    <div class="container-fluid">
    <div class="card-body">
      <div class="table-responsive">  
       <table class="table table-bordered table-hover table-sm text-center " id="myTable" >
          <thead class="text-uppercase">
            <tr>
              <th>#</th>            
              <th>Name</th>                     
              <th>Mobile</th>                                         
              <th>Email</th>             
              <th>Text Message</th>             
              <th>Created</th>                 
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(application,index) in applications" :key="application.id" >
             <td>{{ index + 1 }}</td>
              <td>{{application.Name}}</td>
              <td>{{application.Mobile}}</td>
              <td>{{application.Email}}</td>
              <td>{{application.Text}}</td>
              <td> {{ getDate(application.created_at) }} </td>
              <td>
              <NuxtLink to="#" class="btn btn-sm btn-dark">View</NuxtLink>     
              </td>
            </tr>
       
          </tbody> 
        </table>
      </div>
    </div>    
     </div>     
 </div>
</template>

<script>
import axios from 'axios';
import moment from 'moment';
export default {
 data() {
      return {
        applications: [],
      }
  },
    methods: {
     getDate(date) {
      return moment(date).format('lll');
     }
  },
    mounted() {
      axios.get(`http://127.0.0.1:8000/api/application`)
      .then(response => {
        this.applications = response.data
      })
      .catch(e => {
        this.errors.push(e)
      })

    }
    }

</script>

<style>
.samplec{
  background-color:#e6f5ed;
}
.smc{
  color:green;
}



</style>