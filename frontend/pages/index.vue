<template>
<div class="mx-auto max-w-screen-xl  my-10">
<div class="card-header ">
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Application From</h5></div>  
        <div class="col-md-6">      
             <NuxtLink  to="/application"  > <button class="btn btn-outline-secondary btn-sm fa-pull-right">Application List</button> </NuxtLink>
         </div>
    </div> 
    </div> 
  <form @submit.prevent="addresume" enctype="multipart/form-data">
   <div>
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base font-bold text-3xl leading-7 text-gray-900">Personal Information</h2>
        <p class="mt-1 text-xl leading-6 text-gray-600">Submit your Latest Resume</p>

        <div class="mt-10 grid grid-cols-12 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="col-span-full">
            <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
            <div class="mt-2">
              <input type="text"  id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter your  name" v-model="resume.Name" required />
            </div>
          </div>

          <div class="col-span-full">
            <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Mobile No.</label>
            <div class="mt-2">
              <input type="number"  id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter your Mobile Number" min="0" v-model="resume.Mobile" required />
            </div>
          </div>

          <div class="col-span-full">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
            <div class="mt-2">
              <input id="email"  type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter your Email Address" v-model="resume.Email" required />
            </div>
          </div>
          <div class="col-span-full">
            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Text</label>
            <div class="mt-2">
              <textarea id="email"  type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Enter Text Message" v-model="resume.Text" required></textarea>
            </div>
          </div>
          <div class="col-span-full">
            <label for="cover-photo" class="block text-sm font-medium leading-6 text-gray-900">Resume</label>
            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
              <div class="text-center">
                <PhotoIcon class="mx-auto h-12 w-12 text-gray-300" aria-hidden="true" />
                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                  <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span>Upload your Resume</span>
                    <input id="file-upload"  type="file" class="sr-only" ref="file"  required  @change="onChangeFileUpload" accept=".pdf" />
                  </label>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs leading-5 text-gray-600">PDF up to 1MB</p>
              </div>
            </div>
          </div>
          </div>
          </div>
          </div>
          
    <div class="mt-6 flex items-center justify-center gap-x-6">
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </div>
  </form>
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
             console.log(this.file);
         }, 
             
        addresume() {  
            let formData = new FormData();
             formData.append("Resume", this.file); 
             formData.append("Name", this.resume.Name); 
             formData.append("Mobile", this.resume.Mobile); 
             formData.append("Email", this.resume.Email); 
             formData.append("Text", this.resume.Text); 
             console.log(formData);
             const headers = { 'Content-Type': 'multipart/form-data' };    
            axios.post(`http://127.0.0.1:8000/api/resume_upload`,formData, { headers })
                 .then(res => {                  
                    this.flashMessage.success({
                            title: 'Thanks For Applying',
                            message:res.data.Message ,
                            time: 7000,
                            flashMessageStyle: {
                                backgroundColor: 'linear-gradient(#e66465, #9198e5)'
                            }
                    });   
                     this.resume = '',
                     this.file = ''       
                 }).catch(error => {
                     this.flashMessage.failed({
                            title: 'Failed Applying',
                            message:error.data.Message,
                             time: 70000,
                            variant: 'danger',
                            flashMessageStyle: {
                                backgroundColor: 'linear-gradient(#b30505, #f20505)'
                            }
                    });
                })
              
           },
    },
}
</script>