(function( $ ) {
	'use strict';
	let mainUrl
	const adminInput = document.querySelector('#validationCustomUsername')
	const adminBtn = document.querySelector('#vof-set-admin-btn')
	adminBtn ? adminBtn.setAttribute('disabled', true) : null
	
	const handleSubmit = (e) => {
		adminBtn.value = ''
	}
	const handleChange = (e) => {
		mainUrl = e.target.value
		if(mainUrl.length >= 2 && !/[ÄÖÜäöüß]/g.test(mainUrl)) adminBtn.removeAttribute('disabled')
		else adminBtn.setAttribute('disabled', true)
	}
	adminBtn ? adminBtn.addEventListener('click', handleSubmit) : null
	adminInput ? adminInput.addEventListener('input', handleChange) : null
})( jQuery );
