<template>
  <div >
  <div class="container">       
        <div class="row mt-4" >
          <div class="col-lg-3 col-md-3 col-xl-3 col-sm-3 col-12"> </div>
          <div class="col-lg-6 col-md-6 col-xl-6 col-sm-12 col-12"> 
                    <div class="card  mb-3" style="max-width:100%">
                <div class="card-body text-seconday text-left box">                  
                    <form @submit.prevent="addresume" enctype="multipart/form-data">
                    <div class="form-row">
                         <div class="form-group col-md-12">
                        <label for="inputEmail4">Name *</label>
                        <input type="text" class="form-control" required  v-model="resume.Name" id="inputEmail4" placeholder="Enter Full Name">
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputEmail4">Email *</label>
                        <input type="email" class="form-control" required  id="inputEmail4" v-model="resume.Email" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group col-md-12">
                        <label for="inputPassword4">Phone *</label>
                        <input type="number" class="form-control"  min="0" id="inputPassword4" v-model="resume.Mobile" required placeholder="+8801318XXXXXX">
                        </div> 
                        <div class="form-group col-md-12">
                        <label for="inputPassword4">Text *</label>
                        <textarea type="text" class="form-control"  id="inputPassword4" v-model="resume.Text"  placeholder="Enter Message" ></textarea>
                        </div> 
                         <div class="form-group col-md-12">
                        <label for="inputPassword4"> Attach Resume (Only .PDF)  *</label>
                        <input type="file"  class="form-control" ref="file"  required  @change="onChangeFileUpload" accept=".pdf">
                        </div>                                              
                    </div>  
                   <div class="col text-center col-md-12">
                    <br>             
                    <button type="submit" class="btn btn-success  btn-sm" style="background-color: #0055a3; height: 50px; width: 120px; font-size: large; border-radius: 32px ">Submit</button>
                    <br>  <br>  
                    </div>  
                    </form>            
                </div>        
               </div>
            
               </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xl-3 col-sm-3 col-12"> </div>
        </div>
  </div>
</template>
<script>
import axios from 'axios';
export default {
data () { 
    return {
        resume:{},
        file: null,
    }
    },
    methods: {

        onChangeFileUpload() {
             this.file = this.$refs.file.files[0];
         }, 
             
        addresume() {  
            let formData = new FormData();
             formData.append("Resume", this.file); 
             formData.append("Name", this.resume.Name); 
             formData.append("Mobile", this.resume.Mobile); 
             formData.append("Email", this.resume.Email); 
             formData.append("Text", this.resume.Text); 
             const headers = { 'Content-Type': 'multipart/form-data' };    
            axios.post(`http://127.0.0.1:8000/api/resume_upload`,formData, { headers })
                 .then(res => {  
                  console.log(res.data.Message);                   
                     this.resume = '',
                     this.file = ''       
                 }).catch(error => {
              console.log(error.data.Message);  
                })
              
           },
    },
}
</script>