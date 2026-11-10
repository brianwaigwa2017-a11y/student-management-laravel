@extends('layouts.app')
@section('title', 'Edit Course')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Edit Course</h2>
        <p class="text-muted mb-0">Update course information.</p>
    </div>
    <a href="{{ route('courses.index') }}"
       class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i>
        Back 
to Courses
    </a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form method="POST"
 action="{{ route('courses.update', $course) }}">
            @csrf
            @method('PUT')
            <div class="row">
   <div class="col-md-6 mb-3">
       <label for="course_code" class="form-label">
           Course Code
       </label>
       <input type="text"
              name="course_code"
              id="course_code"
              class="form-control @error('course_code') is-invalid @enderror"
              value="{{ old('course_code', $course->course_code) }}">
       @error('course_code')
           <div 
class="invalid-feedback">
               {{ $message }}
           </div>
       @enderror
   </div>
   <div class="col-md-6 mb-3">
       <label for="course_name" class="form-label">
           Course Name
       </label>
       <input type="text"
              name="course_name"
              id="course_name"
              class="form-control @error('course_name') is-invalid @enderror"
              value="{{ old('course_name', $course->course_name) }}">
       @error('course_name')
           <div 
class="invalid-feedback">
               {{ $message }}
           </div>
       @enderror
   </div>
   <div class="col-md-6 mb-3">
       <label for="duration" class="form-label">
           Duration
       </label>
       <input type="text"
              name="duration"
              id="duration"
              class="form-control"
              value="{{ old('duration', $course->duration) }}"
              placeholder="e.g. 2 Years">
   </div>
   <div class="col-md-6 mb-3">
       <label for="status" class="form-label">
           Status
       </label>
       <select name="status" id="status" class="form-select">
           <option value="active"
               {{ old('status', $course->status) === 'active' ? 'selected' : '' }}>
               Active
           </option>
           <option value="inactive"
               {{ old('status', $course->status) === 'inactive' ? 'selected' : '' }}>
               Inactive
           </option>
       </select>
   </div>
   <div class="col-12 mb-3">
       <label for="description" class="form-label">
           Description
       </label>
       <textarea name="description"
 id="description"
 rows="4"
 class="form-control">{{ old('description', $course->description) }}</textarea>
   </div>
            </div>
            <div class="d-flex justify-content-end gap-2">
   <a href="{{ route('courses.index') }}"
      class="btn btn-secondary">
       Cancel
   </a>
   <button type="submit"
           class="btn school-primary">
       <i class="bi bi-check-circle me-1"></i>
       Update Course
   </button>
            </div>
        </form>
    </div>
</div>
@endsection