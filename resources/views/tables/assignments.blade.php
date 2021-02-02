<table id="assignments-table" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th data-data="name">Nombre</th>
			<th data-data="description">Descripción</th>
			<th data-data="start_time">Inicia en</th>
			<th data-data="due_time">Termina en</th>
		</tr>
	</thead>

	<tbody></tbody>
</table>

@push('scripts')
<script>
	const ajax_url = '{{ route("api.assignments.get") }}';
	const table_id = '#assignments-table';
</script>

<script src="{{ \App\Helpers\AssetHelper::asset('js/datatables-functions.js') }}" defer></script>
<script src="{{ \App\Helpers\AssetHelper::asset('js/datatables-globals.js') }}" defer></script>
<script src="{{ \App\Helpers\AssetHelper::asset('js/assignments-table.js') }}" defer></script>
@endpush