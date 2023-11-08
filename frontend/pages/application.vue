
<template>
  <div>
    <div class="container-fluid">
    <div class="card-body">
      <div class="table-responsive">  
       <table class="table table-bordered table-hover table-sm text-center" id="myTable" >
          <thead>
            <tr>
              <th>#</th>            
              <th>Name</th>                     
              <th>Mobile</th>                                         
              <th>Email</th>             
              <th>Text</th>             
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
              <td> {{ application.created_at }} </td>
              <td>     
                <div class="dropdown">
                      <i class="fas fa-ellipsis-h"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>           
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     
                          <router-link to="#" class="dropdown-item">View</router-link>
                          <router-link :to="{name:'UserEdit',params:{id:application.id} }" class="dropdown-item">Edit</router-link>                                          
                          <a class="dropdown-item" href="" >Delete</a>
                 
                        </div>
                    </div>
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
export default {
 data() {
      return {
        applications: [],
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