async function jsonFormSubmit(e) {
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