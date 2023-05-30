



const btn_twitter =document.querySelector('#conect_twitter');
const btn_facebook =document.querySelector('#conect_facebook');
btn_twitter.addEventListener('click', () => authenticate())
btn_facebook.addEventListener('click', () => loginWithFacebook())



const authenticate = async () => {
    try {

    btn_twitter.textContent='Conectando...'
      const response = await fetch(URL_BASE+'/twitter/token');
      const data = await response.json();
      console.log(data);
  
      const authenticateUrl = `https://api.twitter.com/oauth/authenticate?oauth_token=${data.oauth_token}`;
  
      openPopup(authenticateUrl)
      window.closePopup = () => {
        closePopup()
      };
    } catch (error) {
        btn_twitter.textContent='Conectar'
      Swal.fire({
        icon: 'error',
        title: 'Ocurrió un error al autenticar con Twitter, inténtalo de nuevo',
        showConfirmButton: false,
        timer: 3000,
      });
      console.error('Error al obtener el token de solicitud:', error);
    }
  };



  function openPopup(url) {
    const width = 600;
    const height = 600;
    const left = (window.innerWidth - width) / 2;
    const top = (window.innerHeight - height) / 2;
  
    const popupWindow = window.open(
      url,
      'twitter_auth_popup',
      `width=${width},height=${height},left=${left},top=${top},status=no,scrollbars=yes,resizable=yes`
    );
  
    return popupWindow;
  }
  
  function closePopup(popupWindow) {
    if (popupWindow) {
      popupWindow.close();
    }
  }
  var    connectToInstagram=false;
  const loginWithFacebook = (connectInstagram = false) => {

    connectToInstagram = connectInstagram;
    console.log('loginWithFacebook');
    FB.getLoginStatus((response) => {
        console.log('response', response);
        if (response.status === 'connected') {
            getUserData(response);
        } else {
            FB.login((response) => {

                if (response.authResponse) {
                    getUserData(response);
                    console.log('El  usuario inició sesión correctamente.');


                } else {
                    // es español
                    console.log('El usuario canceló el inicio de sesión o no está completamente autorizado.');

                }
            }, {
                scope: 'email,pages_show_list',
       
            });

        }
    });
};

  function getUserData(response) {
    const accessToken = response.authResponse.accessToken;
    token_user_facebooh.value = accessToken;
    user_id_facebooh.value = response.authResponse.userID;
  
    FB.api('/me', { fields: 'id, name, email, picture' }, async (userData) => {
      userData.accessToken = accessToken;
    });
  
    getUserPages(connectToInstagram.value);
  }
  
  function getUserPages(connectInstagram) {
    FB.api('/me/accounts?fields=name,id,access_token,picture.type(large)', async (response) => {
      if (response && !response.error) {
        const arryDataInstagram = [];
  
        if (connectInstagram) {
          try {
            const instagramAccountPromises = response.data.map(async (page) => {
              const instagramAccount = await getInstagramAccount(page.id, page.access_token);
  
              if (instagramAccount.length > 0) {
                const instagramPicture = await getInstagramPiturePerfil(page.id, page.access_token);
  
                arryDataInstagram.push({
                  id: instagramAccount[0].id,
                  name: instagramAccount[0].username,
                  access_token: page.access_token,
                  picture: { data: { url: page.picture.data.url } },
                  instagram_id: instagramAccount[0].id,
                  instagram_username: instagramAccount[0].username,
                  instagram_picture: instagramPicture.url,
                });
              }
            });
  
            await Promise.all(instagramAccountPromises);
  
            pages.value = arryDataInstagram;
            ImagenRedSocial.value = '/instagram_logo_icon.png';
            RedSocialConented.value = 'Instagram';
            showModal.value = true;
          } catch (error) {
            console.error('Error al obtener la cuenta de Instagram', error);
          }
        } else {
          ImagenRedSocial.value = '/facebook_icon.png';
          RedSocialConented.value = 'Facebook';
          pages.value = response.data;
          showModal.value = true;
        }
      } else {
        console.error('Error al obtener páginas', response.error);
      }
    });
  }
  
  function getInstagramAccount(id_user, access_token) {
    return new Promise((resolve, reject) => {
      FB.api(`/${id_user}/instagram_accounts?fields=id,username`, {
        access_token: access_token,
      }, (response) => {
        if (response && !response.error) {
          resolve(response.data);
        } else {
          reject(response.error);
        }
      });
    });
  }
  
  function getInstagramPiturePerfil(id_user, access_token) {
    return new Promise((resolve, reject) => {
      FB.api(`/${id_user}/picture`, {
        access_token: access_token,
        redirect: false,
        height: 200,
        width: 200,
        type: 'normal',
      }, (response) => {
        if (response && !response.error) {
          resolve(response.data);
        } else {
          reject(response.error);
        }
      });
    });
  }
  
  function selectPage(page) {
    if (connectToInstagram.value) {
      connectedSocialMedia.addConnectedPlatform({
        id: page.instagram_id,
        socialMediaName: 'Instagram',
        user_name: page.username,
        img_perfil: page.instagram_picture,
        tipo_cuenta: 'Cuenta de empresa',
        url_img_logo: '/instagram_logo_icon.png',
        alt_logo: 'Instagram Logo',
        accessToken: page.access_token,
        userId: page.instagram_id,
        accessTokenSecret: '',
      });
    } else {
      connectedSocialMedia.addConnectedPlatform({
        id: page.id,
        socialMediaName: 'Facebook',
        user_name: page.name,
        img_perfil: page.picture.data.url,
        tipo_cuenta: 'Pagina o grupo',
        url_img_logo: '/facebook_icon.png',
        alt_logo: 'Facebook Logo',
        accessToken: page.access_token,
        userId: page.id,
        accessTokenSecret: '',
      });
    }
  
  
  }
