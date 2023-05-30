


initFacebookSDK();



popupWindow = null;
function openPopup(url) {
    const width = 600;
    const height = 600;
    const left = (window.innerWidth - width) / 2;
    const top = (window.innerHeight - height) / 2;
  
    popupWindow = window.open(
      url,
      'twitter_auth_popup',
      `width=${width},height=${height},left=${left},top=${top},status=no,scrollbars=yes,resizable=yes`
    );
  }
  
  function closePopup() {
    if (popupWindow) {
      popupWindow.close();
      popupWindow = null;
    }
  }
// Capturar el evento en el documento principal o en otra ventana
window.addEventListener('message', (event) => {
    if (event.data && event.data.mensaje) {
      const mensaje = event.data.mensaje;
      window.location.href=URL_BASE+'/canales'
    }
  });
  

 