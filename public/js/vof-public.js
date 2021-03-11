(function( $ ) {
  ('use strict')
  const { __, sprintf } = wp.i18n
  // sprintf(__('', 'vof'), )
  const input = document.querySelector('#vof-input')
  const btn = document.querySelector('#vof-btn')
  const btnText = document.querySelector('#vof-btn-text')
  const spanDomain = document.querySelector('.vof__form-domain')
  const domain = scriptParams.mainAdminUrl ? scriptParams.mainAdminUrl : ''
  let url, res

  input ? input.focus() : null

  const handleInputChange = (e) => {
    if (e.keyCode == 13) {
      e.preventDefault()
      return false
    }
    url = e.target.value
    if (url.length >= 3) {
      btn.classList.remove('notactive')
      btn.classList.add('active')
      btnText.classList.remove('notactive')
      btnText.classList.add('active')
      localStorage.setItem('url', url)
    } else {
      btn.classList.add('notactive')
      btn.classList.remove('active')
      btnText.classList.add('notactive')
      btnText.classList.remove('active')
      localStorage.removeItem('url')
    }
  }

  const handleSubmit = async () => {
    spinerOn()
    try {
      res = await axios.get(
        `https://${url.trim()}${domain}.voffice.pro/api/namespaceExists`
      )
    } catch (err) {
      res = err.response
      spanDomain.innerHTML =
        '<span class="error-span">' + __('An error occurred', 'vof') + '</span>'
      spinerOff()
    } finally {
      if (res.data.success && !res.data.exists) {
        spanDomain.innerHTML =
          sprintf(
            __('Your %sOffice domain of choice: ', 'vof'),
            '<span style="color:#01879d">v</span>'
          ) +
          `<a href="https://${url}${domain}.voffice.pro/" target="_self">https://${url}${domain}.voffice.pro</a>` +
          __(' is free and can be set up right away', 'vof')
      } else {
        spanDomain.innerHTML = sprintf(
          __(
            '%s unfortunately cannot be registered. Please try again with another domain.',
            'vof'
          ),
          `https://${url}${domain}.voffice.pro`
        )
      }
    }
    spinerOff()
  }

  input?.addEventListener('input', handleInputChange)
  btn?.addEventListener('click', handleSubmit)
  btnText?.addEventListener('click', handleSubmit)

  const spinerOn = () => {
    input.setAttribute('disabled', true)
  }
  const spinerOff = () => {
    input.value = ''
    if (btn.classList.contains('active')) {
      btn.classList.remove('active')
      btn.classList.add('notactive')
      btnText.classList.remove('active')
      btnText.classList.add('notactive')
    }
    input.removeAttribute('disabled')
  }
})( jQuery )
