

   function initFacebookSDK() {
    return new Promise((resolve) => {
      window.fbAsyncInit = function () {
        FB.init({
          appId: '555977850002156', // Reemplaza 'your-app-id' con el ID de tu aplicación de Facebook
          cookie: true,
          xfbml: true,
          version: 'v16.0',
          confiId: '580074810596693',
        });
   
        FB.AppEvents.logPageView();
        resolve();
      };
  
      (function (d, s, id) {
        var js,
          fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
          return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js';
        fjs.parentNode.insertBefore(js, fjs);
      })(document, 'script', 'facebook-jssdk');
    });
  }