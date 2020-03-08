@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <h2> Hello {{Auth::user()->name}} </h2> 
                @if (Auth::user()->avatar)
                  <img width="56" src="{{Auth::user()->avatar}}" alt='profile picture'/>
                @endif
                <form method='POST' enctype="multipart/form-data" action="/upload_avatar">
                    @csrf
                    <label>
                        <input type='file' name='file'/> Upload
                    </label>
                    <button type="submit"> Submit </button>
                </form>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
      $("input[type='file']").change(function(file) {
          ext = file.currentTarget.files[0].type.split('/')[1];
          console.log(ext);
          if(['jpeg', 'png'].includes(ext)) {
            $("button[type='submit']").prop('disabled', false);
          }
          else {
            alert("Wrong file format");
            $("button[type='submit']").prop('disabled', true);
          }
      });
    });
</script>
@endsection