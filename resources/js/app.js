import './bootstrap';
import 'admin-lte/plugins/jquery/jquery.min.js'
import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js'
import 'admin-lte/dist/js/adminlte.min.js'
import '../js/toast.js'
import '../js/dialog.js'

import Alpine from 'alpinejs'
 
window.Alpine = Alpine
 
Alpine.start()

console.log(Alpine.start())
