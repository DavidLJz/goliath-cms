@extends('layouts.main')

@section('content')
	<main role="main" class="container">
		<div class="starter-template">
			<assignment-form csrf="{{ csrf_token() }}" post_url="{{ route('api.assignments.post') }}" subjects_url="{{ route('api.subjects.get') }}" groups_url="{{ route('api.student_groups.get') }}">
			</assignment-form>
		</div>
	</main>
@endsection

@push('scripts')
<script>
	const pushWorks = true;
</script>
@endpush