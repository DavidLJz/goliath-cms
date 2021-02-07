@extends('layouts.main')

@section('content')
	<assignment-form 
		csrf="{{ csrf_token() }}" 
		post_url="{{ route('assignments.store') }}" 
		subjects_url="{{ route('subjects.index') }}" 
		groups_url="{{ route('student_groups.index') }}"
	>
	</assignment-form>
@endsection

@push('scripts')
<script>
	const pushWorks = true;
</script>
@endpush