@extends('layouts.main')

@section('content')
	<main role="main" class="container">
		<div class="starter-template">
			<assignment-form csrf="{{ csrf_token() }}" url="{{ route('api.assignments.post') }}" />
		</div>
	</main>
@endsection

@push('scripts')
<script>
	const pushWorks = true;
</script>
@endpush