@extends('layouts.app')
@section('title', 'Courses')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h2 class="fw-bold mb-1">Courses</h2>
        <p class="text-muted mb-0">Manage courses offered by the institution.</p>
    </div>
    <a href="{{route('courses.create')}}" class="btn school-primary">
        <i class="bi bi-plus-circle me-1"></i>
        Add Course
    </a>
</div>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div 
class="table-responsive">

         @if(session('success'))
         <p style="color:green">{{session('success')}}</p>
         @endif
            <table class="table table-hover align-middle">
   <thead>
       <tr>
           <th>#</th>
           <th>Course Code</th>
           <th>Course Name</th>
           <th>Duration</th>
           <th>Status</th>
           <th class="text-end">Actions</th>
       </tr>
   </thead>
   <tbody>
       @forelse($courses as $course)
           <tr>
               <td>{{ $course->id }}</td>
               <td>
   <strong>{{ $course->course_code }}</strong>
               </td>
               <td>{{ $course->course_name }}</td>
               <td>{{ $course->duration ?? 'N/A' }}</td>
               <td>
   @if($course->status === 'active')
       <span class="badge bg-success">
           Active
       </span>
   @else
       <span class="badge bg-secondary">
           Inactive
       </span>
   @endif
               </td>
               <td class="text-end">
   <a href="{{ route('courses.edit', $course) }}"
      class="btn btn-sm btn-outline-primary">
       <i class="bi bi-pencil"></i>
   </a>
   <form action="{{ route('courses.destroy', $course) }}"
         method="POST"
         class="d-inline">
       @csrf
       @method('DELETE')
       <button type="submit"
class="btn btn-sm btn-outline-danger"
onclick="return confirm('Are you sure you want to delete this course?')">
           <i class="bi bi-trash"></i>
       </button>
   </form>
               </td>
           </tr>
       @empty
           <tr>
               <td colspan="6" class="text-center py-4 text-muted">
   No courses found.
               </td>
           </tr>
       @endforelse
   </tbody>
            </table>
        </div>
        <div 
class="mt-3">
            {{ $courses->links() }}
        </div>
    </div>
</div>
@endsection