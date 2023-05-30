// https://vitejs.dev/config/#build-polyfillmodulepreload
import 'vite/modulepreload-polyfill'

// Styles
import './styles'


import Swal from 'sweetalert2';


// Importa todos los componentes y vistas
const modules = import.meta.glob('./components/*.vue', { eager: true })




// Registra todos los componentes y vistas en un objeto
const components = {}
// Registra todos los componentes y vistas en un objeto

for (const path in modules) {
  if (modules[path].default && typeof modules[path].default === 'object') {
    components[modules[path].default.__name] = modules[path].default
  }
}


// Crea la aplicación Vue para cada elemento con la clase 'vue-app'
const el = document.getElementsByClassName('vue-app');
 const app= createApp({

    components
  })

   const pinia = createPiniaWithStores();   

  app.use(pinia);
 app.use(Swal)
  app.mount('.vue-app');