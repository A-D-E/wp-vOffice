(function( $ ) {
	'use strict';

	const input = document.querySelector('#vof-input')
	const btn = document.querySelector('#vof-btn')
	const spiner = document.querySelector('#spiner')
	const spanDomain = document.querySelector('.vof__form-domain')
	let url, res, domain

	const handleInputChange = (e) => {
		url = e.target.value
		console.log(url)

		if(url.length >= 3) {
			btn.classList.remove('notactive')
			btn.classList.add('active')
			localStorage.setItem('url', url)
		}else {
			btn.classList.add('notactive')
			btn.classList.remove('active')
			localStorage.removeItem('url')
		}
	}

	const handleSubmit = async() => {
		spinerOn()
		try{	
			res = await axios.get(`https://${url.trim()}.voffice.pro/api/namespaceExists/${url.trim()}`)
		} catch(err) {
			res = err.response
		} finally {
			console.log(res.data)
			if(res.data.success && !res.data.exists){
				spanDomain.innerHTML = `Ihre <span style="color:#01879d">v</span>Office Wunschdomain: <a href="https://${url}.ch.voffice.pro" target="_self">https://${url}.ch.voffice.pro</a> ist frei und kann sofort eingerichtet werden`
			}
		}
		spinerOff()
	}
	
	input.addEventListener('input', handleInputChange)
	btn.addEventListener('click', handleSubmit)
	
	const spinerOn = () => {
		btn.style.display = 'none'
		spiner.style.display = 'inline-flex'
		input.setAttribute('disabled', true)
	}
	const spinerOff = () => {
		btn.style.display = 'inline-flex'
		input.value = ''
		if (btn.classList.contains('active')) {
      btn.classList.remove('active')
      btn.classList.add('notactive')
    }
		input.removeAttribute('disabled')
		spiner.style.display = 'none'
  	}

})( jQuery );
