function unixToDate(timestamp) {
	if (!timestamp || typeof timestamp != 'number') {
		console.error(timestamp + ' is not a valid unix timestamp');
		return timestamp;
	}

	return new Date(timestamp*1000).toDateString();
}

function allTimestampsToDates(object) {
	if (typeof object != 'object') {
		return;
	}

	let times = ['start_time','due_time'];

	for (let i in object) {
		for (let k in times) {
			let time = object[i][times[k]];
			object[i][times[k]] = unixToDate(time);
		}
	}
}