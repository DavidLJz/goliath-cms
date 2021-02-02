@extends('layouts.main')

@section('content')
	<main role="main" class="container">
		<div class="starter-template">
			@include('tables.assignments')
		</div>
	</main>
@endsection

@push('scripts')
<script>
	const pushWorks = true;
</script>
@endpush