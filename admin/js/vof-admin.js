(function( $ ) {
	'use strict';

	const adminInput = document.querySelector('#validationCustomUsername')
	const adminBtn = document.querySelector('#vof-set-admin-btn')
	let mainUrl
	adminBtn.setAttribute('disabled', true)
	
	const handleSubmit = (e) => {
		e.preventDefault()
		
	}
	const handleChange = (e) => {
		mainUrl = e.target.value
		if(mainUrl.length >= 3) adminBtn.removeAttribute('disabled')
		else adminBtn.setAttribute('disabled', true)
	}
	adminBtn.addEventListener('click', handleSubmit)
	adminInput.addEventListener('input', handleChange)
})( jQuery );
