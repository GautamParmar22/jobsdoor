@extends('Admin.layout.default')
@section('content')

<style type="text/css">
  form .error {
    color: #ff0000;
  }

  .viewpdf {
    float: right;
  }

  #documentUpload {
    float: left;
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
      <h1 class="app-page-title">Update Job Post</h1>
      <hr class="my-4">
      <form class="settings-form" action="{{url('update-job/' . base64_encode($editjob->id))}}" method="POST"
        enctype='multipart/form-data' id='job_post'>
        @csrf
        <div class="row g-4 settings-section">
          <div class="col-12 col-md-4">
            <h3 class="section-title">Job Details</h3>
          </div>
          <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
              <div class="app-card-body">
                <div class="mb-3">
                  <label for="setting-input-1" class="form-label">Post By<span class="ms-2" data-container="body"
                      data-bs-toggle="popover" data-trigger="hover" data-placement="top"></span></label>
                  <input type="text" class="form-control" id="setting-input-1" value="{{$editjob->company_name}}"
                    readonly>
                </div>
                <div class="mb-3">
                  <label for="setting-input-1" class="form-label">Job name<span class="ms-2" data-container="body"
                      data-bs-toggle="popover" data-trigger="hover" data-placement="top"></span></label>
                  <input type="text" class="form-control" id="setting-input-1" value="{{$editjob->job_name}}"
                    name="job_name">
                </div>
                <div class="mb-3">
                  <label for="setting-input-1" class="form-label">No of vacancy<span class="ms-2" data-container="body"
                      data-bs-toggle="popover" data-trigger="hover" data-placement="top"></span></label>
                  <input type="text" class="form-control" id="setting-input-1" value="{{$editjob->no_of_vacancy}}"
                    name="no_of_vacancy">
                </div>
                <div class="mb-3">
                  <label for="setting-input-2" class="form-label">Job description</label>
                  <textarea class="form-control valid" id="setting-input-2" name="job_description"
                    style="height: 194px;" aria-invalid="false">{{$editjob->job_description}}</textarea>
                </div>
                <div class="mb-3">
                  <label for="setting-input-3" class="form-label">Key Skill</label>
                  <input type="text" class="form-control" id="setting-input-3" name="key_skills"
                    value="{{$editjob->key_skills}}">
                </div>
                <div class="mb-3">
                  <label for="setting-input-3" class="form-label">Qualification</label>
                  <input type="text" class="form-control" id="setting-input-3" name="qualification"
                    value="{{$editjob->qualification}}">
                </div>
                <div class="mb-3">
                  <label for="setting-input-3" class="form-label">Salary to</label>
                  <input type="text" class="form-control" id="setting-input-3" name="salary_to"
                    value="{{$editjob->salary_to}}">
                </div>
                <div class="mb-3">
                  <label for="setting-input-3" class="form-label">Salary from</label>
                  <input type="text" class="form-control" id="setting-input-3" name="salary_from"
                    value="{{$editjob->salary_from}}">
                </div>
                <div class="mb-3">
                  <label for="setting-input-3" class="form-label">Location</label>
                  <input type="text" class="form-control" id="setting-input-3" name="location"
                    value="{{$editjob->location}}">
                </div>

                <div class="mb-3">
                  <label for="setting-input-type_of_job" class="form-label">Job type</label>
                  <select class="form-label form-control" name="type_of_job" id="setting-input-type_of_job">
                    <option value="fulltime" <?php if ($editjob->type_of_job == 'fulltime') {?> selected<?php } ?>>Full
                      time
                    </option>
                    <option value="parttime" <?php if ($editjob->type_of_job == 'parttime') {?> selected<?php } ?>>Part
                      time
                    </option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="setting-input-descript_documen" class="form-label">Upload Resume </label>
                  <div class="resume-file form-control">
                    <input type="file" class="site-button" id="documentUpload" name="choosefile" src="" value="">

                    <a href="" download="" target="_blank" class="btn btn-info btn-sm" class="viewpdf">View Introduction
                      PDF</a>

                  </div>
                </div>
                <div class="mb-3">
                  <label for="setting-input-status" class="form-label">Status</label>
                  <select class="form-label form-control" name="status" id="setting-input-status">
                    <option value="1" <?php if ($editjob->status == 1) {?> selected<?php } ?>>Active</option>
                    <option value="0" <?php if ($editjob->status == 0) {?> selected<?php } ?>>InActive</option>
                  </select>
                </div>
              </div>
              <div align="center">
                <button type="submit" class="btn app-btn-primary" align="right">Add Job Post</button>
              </div>
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