import{_ as f,o as i,c as l,a as s,b as _,t as c,w as p,F as w,r as m,d as b,e as d,v as g,f as v,g as y,p as q,h as S,i as k}from"./_plugin-vue_export-helper.dd813d7b.js";const A={props:["geturl","sendanswerurl"],data(){return{question:{},questions_count:0,answered:0,answer:"",loading:!1,click:new Audio("/sounds/quiz/click.mp3"),startSound:new Audio("/sounds/quiz/start.wav")}},created(){(this.answered=0)&&this.playStarSound(),this.getData()},methods:{playClick(){this.click.pause(),this.click.currentTime=0},playStarSound(){this.startSound.pause(),this.startSound.currentTime=0,this.startSound.play()},setAnswerAndSubmit(t){this.answer=t,this.submitAnswer()},submitAnswer(){this.answer==""?this.$swal({icon:"error",title:"Oops...",text:"You did not choos your answer."}):axios.post(this.sendanswerurl,{question_id:this.question.id,answer:this.answer}).then(t=>{this.getData(),this.answer=""}).catch(t=>{console.log(t)})},getData(){this.playClick(),this.loading=!0,axios.get(this.geturl).then(t=>{t.data.status=="done"?location.reload():(this.question=t.data.question,this.questions_count=t.data.questions_count,this.answered=t.data.answered,this.loading=!1,this.answer="")}).catch(t=>{console.log(t)})}}},a=t=>(q("data-v-b214bef2"),t=t(),S(),t),x={class:"bg-white",id:"main-body"},C=a(()=>s("br",null,null,-1)),D={class:"container-fluid"},M={class:"row"},T={class:"col-md-8 col-md-offset-2"},V={class:"row"},I={class:"col-sm-6"},L=a(()=>s("br",null,null,-1)),z={class:"col-sm-6 text-right mb-3"},B={class:"question-box"},N={class:"question-text"},F=["src"],H=["innerHTML"],P={class:"p-3",style:{padding:"15px"}},Q=["id","value"],U=["onClick","for"],j={key:1},E=a(()=>s("br",null,null,-1)),O=a(()=>s("br",null,null,-1)),R={type:"submit",class:"btn-submit"},Y=a(()=>s("i",{class:"fa fa-spin fa-spinner"},null,-1));function G(t,o,K,W,e,r){return i(),l("div",x,[C,s("div",D,[s("div",M,[s("div",T,[s("div",null,[s("div",V,[s("div",I,[L,_(" Progress: "+c(e.answered)+"/"+c(e.questions_count),1)]),s("div",z,[s("a",{href:"#",onClick:o[0]||(o[0]=p(n=>r.getData(),["prevent"])),class:"btn-skip"}," Skip Question")])]),s("div",B,[s("div",N,[(i(!0),l(w,null,m(e.question.images,n=>(i(),l("img",{style:{width:"30%"},src:"/"+n.source,key:n.id,alt:""},null,8,F))),128)),s("div",{innerHTML:e.question.body},null,8,H)]),s("div",P,[e.question.type=="multiple"?(i(!0),l(w,{key:0},m(e.question.options,(n,u)=>(i(),l("div",{class:"quiz-choices",key:u},[d(s("input",{type:"radio",id:`choice-${u}`,"onUpdate:modelValue":o[1]||(o[1]=h=>e.answer=h),value:n},null,8,Q),[[y,e.answer]]),s("label",{onClick:h=>r.setAnswerAndSubmit(u),for:`choice-${u}`},c(n),9,U)]))),128)):b("",!0),e.question.type=="subjective"?(i(),l("div",j,[s("form",{onSubmit:o[3]||(o[3]=p((...n)=>r.submitAnswer&&r.submitAnswer(...n),["prevent"]))},[d(s("input",{type:"text",required:"","onUpdate:modelValue":o[2]||(o[2]=n=>e.answer=n),placeholder:"Put your answer here"},null,512),[[g,e.answer]]),E,O,s("button",R,[d(s("span",null,[Y,_(" Loading.. ")],512),[[v,e.loading]]),d(s("span",null," Submit ",512),[[v,!e.loading]])])],32)])):b("",!0)])])])])])])])}const J=f(A,[["render",G],["__scopeId","data-v-b214bef2"]]);k({components:{QuestionComponent:J}}).mount("#app");
