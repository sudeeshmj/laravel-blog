@extends('layouts.app')
@section('content')
@include('components.usernavbar')
<style>
    label.error {
        color: red;
        font-size: 13px;
       
    }
    .error-message {
        color: red;
    }
    .error-container {
    min-height: 20px; 
}
.error {
    min-height: 20px; 
}
</style>
<div class="container my-4">

    <h6>Edit Blog</h6>
    <form  id="logform"  token="{{csrf_token()}}">
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
        <input type="hidden" name="blog_id" id="blog_id"value="{{$blog->id}}">
        <input type="hidden" name="postdate" id="postdate" value="{{ date('Y-m-d') }}">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="{{$blog->title}}">
             </div>
        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
         <textarea name="content" id="content" cols="30" rows="10">{{ $blog->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">File Upload</label>
            <input type="file" class="form-control" id="image" name="image">
          </div>
      
        <button type="button" name ="savebtn" id="savebtn" class="btn btn-primary">Submit</button>
      </form>
</div>
 <script>
 $(document).ready(function() {



    tinymce.init({selector: 'textarea',menubar:false});
       
 
    //submit btn
     $('#savebtn').click(function(){
        $('#logform').validate({ 
            rules: {
                title: {
                    required: true,  
                },
                content: {
                    required: true,
                },
                image: {
                    required: true,
                },
            },
           
        }).form();
        if ($('#logform').valid()) {

            var blgcontent= tinymce.get('content').getContent();

            const formData = new FormData();
            formData.append('id', $('#blog_id').val());
            formData.append('user_id', $('#user_id').val());
            formData.append('title', $('#title').val());
            formData.append('content', blgcontent);
            formData.append('image', $('#image')[0].files[0]); 
           
      
        $.ajax({
            type:'POST',
            url :"{{route('modify.user.blog')}}",
            headers: {
                 'X-CSRF-TOKEN': $('#logform').attr('token')
                    },
            data:formData,
            processData: false, 
             contentType: false,
            success:function(response){
                if (response.success) {
                    window.location.href = "{{ route('user.dashboard') }}";
                    
                } else {
                    alert(response.message);
                }
            },
            error:function(xhr, status, error){
              alert("Post updation failed");
            }
        });
    }
     });


    });

</script>
@endsection