	<form id="timeForm" class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="time-select">Convert from:</label>
				<select class="form-control" id="time-select" name="time-select">
					<option value="calendar" selected>Calendar</option>
					<option value="timestamp">Unix timestamp</option>
				</select>
			</div>
		</div>

		<div class="col-md-8" id="time-inputs">
			<div class="row" id="calendar-input-group">
				<label for="calendar" class="col-sm-3">Calendar</label>
				<div class="col-sm-9">
					<input id="calendar" type="datetime-local" name="calendar" class="form-control">
				</div>
			</div>
			<div class="row" id="timestamp-input-group" style="display:none">
				<label for="timestamp" class="col-sm-3">Unix Timestamp</label>
				<div class="col-sm-9">
					<input id="timestamp" type="number" name="timestamp" class="form-control">
				</div>
			</div>
		</div>

		<button class="btn btn-primary">Submit</button>
	</form>	

	<table id="timeTable" class="table table-striped table-sm" style="display:none">
		<tbody>
			<tr>
				<td scope="col">Seconds</td>
				<td data-time-measure="seconds"></td>
			</tr>
			<tr>
				<td scope="col">Minutes</td>
				<td data-time-measure="minutes"></td>
			</tr>
			<tr>
				<td scope="col">Hours</td>
				<td data-time-measure="hours"></td>
			</tr>
			<tr>
				<td scope="col">Days</td>
				<td data-time-measure="days"></td>
			</tr>
			<tr>
				<td scope="col">Weeks</td>
				<td data-time-measure="weeks"></td>
			</tr>
			<tr>
				<td scope="col">Months</td>
				<td data-time-measure="months"></td>
			</tr>
			<tr>
				<td scope="col">Years</td>
				<td data-time-measure="years"></td>
			</tr>
		</tbody>
	</table>