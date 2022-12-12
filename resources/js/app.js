import './bootstrap';
import QuestionComponent from './components/Student/Question/MainComponent.vue'
import { createApp } from 'vue'

const vueApp = createApp({
  components: { 
    QuestionComponent,
   }
}).mount('#app')
