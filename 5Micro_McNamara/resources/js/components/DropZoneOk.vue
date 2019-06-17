<template>
  <div class="container">
    <div class="row justify-content-center">


      <form id="dropZone" action="/file-upload" class="dropzone" method="post">
        <div class="fallback">
          <input name="file" type="file" multiple />
        </div>
      </form>


    </div>
  </div>
</template>






<script>

import DropZone from 'dropzone'

const urlMain = window.axios.defaults.baseURL;

DropZone.options.dropZone = {
  url:urlMain+'/api/files/upload/',
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  addRemoveLinks: true,
  dictRemoveFileConfirmation:'Are you sure you want to delete this file?',
  init: function() {
    this.on("removedfile", function(file) {
      axios.post(urlMain+'/api/files/destroy/'+file.name).then((response) => {
        console.log(response);
      });
    });
  }

}




export default {

  data(){
    return  {

    }
  },



}


</script>
