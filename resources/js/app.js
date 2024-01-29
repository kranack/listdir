import './bootstrap';
import iziToast from 'izitoast';


addEventListener("DOMContentLoaded", () => {
  const copyToClipboardEls = document.querySelectorAll('a#copyToClipboard')

  if (!copyToClipboardEls.length) return;

  copyToClipboardEls.forEach(copyToClipboardEl => {
    copyToClipboardEl.addEventListener('click', (e) => {
      e.preventDefault()
      const url = e.currentTarget.parentElement.parentElement.firstElementChild.href || ''
      navigator.clipboard.writeText(url)

      iziToast.success({
        title: 'URL copiée',
        message: 'L\'URL a été copiée dans le presse-papier',
        position: 'topRight'
      })
    })
  })
});
