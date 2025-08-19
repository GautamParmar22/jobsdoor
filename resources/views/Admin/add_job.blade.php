@extends('Admin.layout.default')
@section('content')

<style type="text/css">
  form .error {
    color: #ff0000;
  }
</style>
<div class="app-wrapper">
  <div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
      @if (\Session::has('success'))
      <div class="alert alert-success" style="display: none;">
      <ul>
        <li id="success-msg">{!! \Session::get('success') !!}</li>
      </ul>
      </div>
    @endif
      @if (session('error'))
      <div class="alert alert-danger" style="display: none;">
      <li id="error-msg">{{ session('error') }}</li>
      </div>
    @endif
      <h1 class="app-page-title">Add Job Post</h1>
      <div id="cancel" align="right"><a href="{{url('add-job-post')}}" style="color:gray; display: inline-block;"><i
            class="fa fa-window-close fa-3x"></i></a><i class=""></i>
      </div>
      <hr class="my-4">
      <form class="settings-form" action="{{url('insert-job-post')}}" method="POST" enctype='multipart/form-data'
        id='job_post'>
        @csrf
        <div class="row g-4 settings-section">
          <div class="col-12 col-md-4">
            <h3 class="section-title">Job Details</h3>
          </div>
          <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">             
              <div class="mb-3">
                <label for="setting-input-1" class="form-label">Job name<span class="ms-2" data-container="body"
                    data-bs-toggle="popover" data-trigger="hover" data-placement="top"
                    data-content="This is a Bootstrap popover example. You can use popover to provide extra info."></span></label>
                <input type="text" class="form-control" id="setting-input-1" value="" name="job_name">
              </div>
              <div class="mb-3">
                <label for="setting-input-1" class="form-label">No of vacancy<span class="ms-2" data-container="body"
                    data-bs-toggle="popover" data-trigger="hover" data-placement="top"></span></label>
                <input type="text" class="form-control" id="setting-input-1" value="" name="no_of_vacancy">
              </div>
              <div class="mb-3">
                <label for="setting-input-2" class="form-label">Job description</label>
                <textarea class="form-control" id="setting-input-2" name="job_description" value="">
                    </textarea>
              </div>
              <div class="mb-3">
                <label for="setting-input-3" class="form-label">Key Skill</label>
                <input type="text" class="form-control" id="setting-input-3" name="key_skills" value="">
              </div>
              <div class="mb-3">
                <label for="setting-input-3" class="form-label">Qualification</label>
                <input type="text" class="form-control" id="setting-input-3" name="qualification" value="">
              </div>
              <div class="mb-3">
                <label for="setting-input-3" class="form-label">Salary to</label>
                <input type="text" class="form-control" id="setting-input-3" name="salary_to" value="">
              </div>
              <div class="mb-3">
                <label for="setting-input-3" class="form-label">Salary from</label>
                <input type="text" class="form-control" id="setting-input-3" name="salary_from" value="">
              </div>
              <div class="mb-3">
                <label for="setting-input-3" class="form-label">Location</label>
                <input type="text" class="form-control" id="setting-input-3" name="location" value="">
              </div>

              <div class="mb-3">
                <label for="setting-input-type_of_job" class="form-label">Job type</label>
                <select class="form-label form-control" name="type_of_job" id="setting-input-type_of_job">
                  <option value="fulltime">Full time</option>
                  <option value="parttime">Part time</option>
                  <option value="parttime">Freelance</option>
                  <option value="parttime">Internship</option>
                  <option value="parttime">Temparary</option>

                </select>
              </div>
              <div class="mb-3">
                <label for="setting-input-descript_documen" class="form-label">Upload Description Doc </label>
                <div class="resume-file form-control">
                  <input type="file" class="site-button" id="documentUpload" name="choosefile">
                </div>
              </div>

              <div class="mb-3">
                <label for="setting-input-status" class="form-label">Status</label>
                <select class="form-label form-control" name="status" id="setting-input-status">
                  <option value="1">Active</option>
                  <option value="0">InActive</option>
                </select>
              </div>
              <div align="right">
                <button type="submit" class="btn app-btn-primary" align="right">Save</button>
              </div>
            </div><!--//app-card-body-->
          </div><!--//app-card-body-->
        </div><!--//app-card-->
    </div>
  </div><!--//row-->
  </form>
</div><!--//container-fluid-->
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script text="text/javascript">
  $('#job_post').validate({
    rules: {
      "job_name": {
        required: true,
      },
      "no_of_vacancy": {
        required: true,
      },
      "job_description": {
        required: true,
      },
      "key_skills": {
        required: true,
      },
      "qualification": {
        required: true,
      },
      "salary_to": {
        required: true,
      },
      "location": {
        required: true,
      },

    },
    messages: {

      "job_name": {
        required: "Please Enter Job name.",
      },
      "no_of_vacancy": {
        required: "Please Enter Vacancy.",
      },
      "job_description": {
        required: "Please Enter Job description.",
      },
      "key_skills": {
        required: "Please Enter Kills.",
      },
      "qualification": {
        required: "Please Enter Qualification.",
      },
      "salary_to": {
        required: "Please Enter Salary.",
      },
      "location": {
        required: "Please Enter Location.",
      },
    }
  });            
</script>
@stop