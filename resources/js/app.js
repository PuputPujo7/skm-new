import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import '../../vendor/alperenersoy/filament-export/resources/js/filament-export.js';

import Alpine from 'alpinejs'
Alpine.plugin(FormsAlpinePlugin)
window.Alpine = Alpine
Alpine.start()
