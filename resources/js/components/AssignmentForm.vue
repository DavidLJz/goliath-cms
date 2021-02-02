<template>
	<form method="POST" :action="post_url" class="row" @submit.prevent="send($event)">
		<input type="hidden" name="_token" :value="csrf">

		<div class="col-md-6">
		    <div class="form-group">
		    	<label for="name">Nombre</label>
		    	<input :disabled="edit == false" required type="text" name="name" id="name" v-model="name" class="form-control">
		    </div>

		    <div class="form-group">
		    	<label for="group" id="group">Grupo</label>
	    		<select :disabled="edit == false" class="form-control" required name="group">
	    			<option value="test">Prueba</option>
	    		</select>
		    </div>

		    <div class="form-group row">
		    	<div class="col-lg-6 mb-sm-3">
			    	<label for="evaluation">Tipo de evaluación</label>
			    	<select :disabled="edit == false" required class="form-control" v-model="evaluation" name="evaluation" id="evaluation">
			    		<option value="individual" selected>Individual</option>
			    		<option value="team">Por equipos</option>
			    		<option value="group">Grupal</option>
			    	</select>
			    </div>

		    	<div class="col-lg-6">
			    	<label for="subject">Asignatura</label>
			    	<select :disabled="edit == false" required class="form-control" v-model="subject" name="subject" id="subject">
			    		<option v-for="subject in subject_list" :value="subject.id" :key="subject.id">
			    			{{ subject.name }}
			    		</option>
			    	</select>
		    	</div>
		    </div>
		   
		    <div class="form-group">
		    	<label for="description">Descripción</label>
		    	<textarea :disabled="edit == false" class="form-control" v-model="description" name="description" id="description"></textarea>
		    </div>
		</div>

		<div class="col-md-6 mb-3">
			<label class="font-weight-bold">Fecha de inicio y entrega</label>
			<range-calendar :range.sync="range"></range-calendar>
		</div>

		<div class="col">
			<button :disabled="edit == false" type="submit" class="btn btn-info">Enviar</button>
		</div>
	</form>
</template>

<script>
	export default {
		props : {
			csrf : String,
			post_url : String,
			subjects_url : String
		},
		data() {
			return {
				name : '', 
				description : '', 
				evaluation : '', 
				subject : '',
				range : {
					start: new Date(),
					end: new Date()
				},
				subject_list : [],
				edit : false
			}
		},
		created () {
			this.fetchSubjects();
		},
		methods : {
			fetchSubjects : async function () {
				
				try {
					let response = await fetch(this.subjects_url)

					if (!response.ok) {
						let err = await response.text()
						throw new Error(err)
					}

					let obj = await response.json()

					if (obj.errors) {
						throw new Error(data.errors)
					}

					for (let i in obj.data) {
						let name = obj.data[i].name
						let id = obj.data[i].id

						this.subject_list.push({ name : name, id : id })
					}
				}

				catch (e) {
					console.error(e)
					alert('error!')
				}

				finally {
					this.edit = true
				}
			},
			send : async function (e) {
				this.edit = false;

				try {
					let url = e.currentTarget.action
					let form = new FormData(e.currentTarget)

					let plainForm = Object.fromEntries(form.entries())
					let jsonForm = JSON.stringify(plainForm)

					let params = { 
						method : 'POST', 
						headers : {
							'Content-Type' : 'application/json',
							'Accept' : 'application/json' 
						},
						body : jsonForm
					}

					let response = await fetch(url, params)

					if (!response.ok) {
						let err = await response.text()
						throw new Error(err)
					}

					response = await response.json()

					if (response.errors) {
						throw new Error(response.errors)
					}

				}

				catch (e) {
					if (typeof e == 'Array') {
						for (let i = e.length - 1; i >= 0; i--) {
						}
					}

					console.error(e)
					alert('error!')
				}

				finally {
					this.edit = true
				}
			}
		}
	}
</script>