<template>
	<date-picker :value="range" is-range is-expanded mode="dateTime" is24hr :minute-increment="5" @input="(date) => $emit('update:range', date)"/>
</template>

<script>
	export default {
		props : { range : Object },
		data() {
		  	return {
		  	}
		},
		methods : {
			mylog : function (date) {
				console.log(date) 
			}
		}
	}
</script>