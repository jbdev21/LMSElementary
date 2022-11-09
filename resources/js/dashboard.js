import './bootstrap';
import ModuleStudentSelectorComponent from './components/Dashboard/Module/ModuleStudentSelectorComponent.vue'
import QuestionBox from './components/Dashboard/QuestionBox/MainComponent.vue'

import { createApp } from 'vue'

const vueApp = createApp({
  components: { 
    ModuleStudentSelectorComponent,
    QuestionBox
   }
}).mount('#app')



