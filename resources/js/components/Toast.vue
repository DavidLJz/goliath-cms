<template>
	<div class="container fixed-bottom">
		<div class="row">
			<div v-show="show" class="alert w-50 mb-4 p-3 mx-auto" :class="determineClass()" role="alert">
				{{ body }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props : {
			body : String,
			type : { default : 'info' },
			timeout : { default : 8000 },
			parent_show : { default : false }
		},
		data () {
			return {
				show : false
			}
		},
		methods : {
			showNow : function () {
				this.show = true

				if (this.timeout) {
					setTimeout(() => this.show = false, this.timeout)
				}
			},
			determineClass : function () {
				return 'alert-' + this.type
			}
		},
		watch : {
			'parent_show' : 'showNow'
		}
	}
</script>