(function( $ ) {
	'use strict';
	let mainUrl
	const adminInput = document.querySelector('#validationCustomUsername')
	const adminBtn = document.querySelector('#vof-set-admin-btn')
	adminBtn.setAttribute('disabled', true)
	
	const handleSubmit = (e) => {
		// e.preventDefault()
		adminBtn.value = ''
	}
	const handleChange = (e) => {
		mainUrl = e.target.value
		if(mainUrl.length >= 2 && !/[ÄÖÜäöüß]/g.test(mainUrl)) adminBtn.removeAttribute('disabled')
		else adminBtn.setAttribute('disabled', true)
	}
	adminBtn.addEventListener('click', handleSubmit)
	adminInput.addEventListener('input', handleChange)
})( jQuery );
