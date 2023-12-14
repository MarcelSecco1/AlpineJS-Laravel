import './bootstrap';
//import alpine
import Alpine from 'alpinejs'

//import user
import user from './alpine/user';


//define o alpine
window.Alpine = Alpine

//define o objeto user
window._user = user;

Alpine.start()

