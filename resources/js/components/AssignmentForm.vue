<template>
	<form method="POST" :action="url" class="row" @submit.prevent="send()">
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
			    		<option value="individual" selected>Individual</option>
			    		<option value="team">Por equipos</option>
			    		<option value="group">Grupal</option>
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
			<button type="submit" class="btn btn-info">Enviar</button>
		</div>
	</form>
</template>

<script>
	export default {
		props : {
			csrf : String,
			url : String
		},
		data() {
			return {
				name : '', 
				description : '', 
				evaluation : '', 
				range : {
					start: new Date(),
					end: new Date()
				},
				edit : true
			}
		},
		methods : {
			send : function () {
				this.edit = false;
				console.log([this.range, this.description, this.name]);
			}
		}
	}
</script>