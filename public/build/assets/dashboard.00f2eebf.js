import{_ as y,c as u,b as w,d as g,a as t,o as c,j,e as N,v as R,F as x,r as $,t as C,k as q,l as V,m as Y,n as Z,q as ee,s as te,u as ne,x as oe,y as ie,z as O,A as P,B as z,w as B,p as M,h as L,C as ae,D as se,i as re}from"./_plugin-vue_export-helper.dd813d7b.js";const le={props:["module","student"],data(){return{loading:!1,added:!1}},methods:{attach(){this.loading=!this.loading,axios.post("/api/student/add-to-module",{student:this.student,module:this.module}).then(e=>{this.added=!0,this.loading=!1}).catch(e=>{console.log(e)})}}},de={class:"d-grid"},ce=t("i",{class:"fa fa-plus"},null,-1),ue={key:1,type:"button",class:"disabled btn btn-primary text-white"},me=t("i",{class:"fa fa-spin fa-spinner"},null,-1),_e=[me],ve={key:2,type:"button",class:"disabled btn btn-primary text-white"},fe=t("i",{class:"fa fa-check"},null,-1);function he(e,n,o,l,i,s){return c(),u("div",de,[!i.loading&&!i.added?(c(),u("button",{key:0,type:"button",onClick:n[0]||(n[0]=(...a)=>s.attach&&s.attach(...a)),class:"btn btn-primary text-white"},[ce,w(" Attach ")])):g("",!0),i.loading?(c(),u("button",ue,_e)):g("",!0),i.added?(c(),u("button",ve,[fe,w(" Added ")])):g("",!0)])}const pe=y(le,[["render",he]]),be={props:["module"],components:{AttachButtonComponentVue:pe},data(){return{students:[],searchText:""}},methods:{checkSearchStr:_.debounce(function(e){axios.get("/api/student/search",{params:{q:e}}).then(n=>{this.students=n.data}).catch(n=>{console.log(n)})},250)},watch:{searchText(e){this.checkSearchStr(e)}}},ge={class:"input-group mb-3"},ye=t("button",{class:"btn btn-secondary",type:"button",id:"button-addon2"},[t("i",{class:"fa fa-search"})],-1),Se={class:"table"},Ce=t("thead",null,[t("tr",null,[t("th",null,"Last Name"),t("th",null,"First Name"),t("th",null,"Middle Name"),t("th",null,"Section"),t("th")])],-1),xe={class:"text-end"};function ke(e,n,o,l,i,s){const a=j("AttachButtonComponentVue");return c(),u(x,null,[t("div",ge,[N(t("input",{type:"search","onUpdate:modelValue":n[0]||(n[0]=r=>i.searchText=r),class:"form-control",placeholder:"Search Student","aria-label":"Search Student","aria-describedby":"button-addon2"},null,512),[[R,i.searchText]]),ye]),t("table",Se,[Ce,t("tbody",null,[(c(!0),u(x,null,$(i.students,r=>(c(),u("tr",{key:r.id},[t("td",null,C(r.last_name),1),t("td",null,C(r.first_name),1),t("td",null,C(r.middle_name),1),t("td",null,C(r.section),1),t("td",xe,[q(a,{student:r.id,module:o.module},null,8,["student","module"])])]))),128))])])],64)}const we=y(be,[["render",ke]]);var $e=["onActivate","onAddUndo","onBeforeAddUndo","onBeforeExecCommand","onBeforeGetContent","onBeforeRenderUI","onBeforeSetContent","onBeforePaste","onBlur","onChange","onClearUndos","onClick","onContextMenu","onCopy","onCut","onDblclick","onDeactivate","onDirty","onDrag","onDragDrop","onDragEnd","onDragGesture","onDragOver","onDrop","onExecCommand","onFocus","onFocusIn","onFocusOut","onGetContent","onHide","onInit","onKeyDown","onKeyPress","onKeyUp","onLoadContent","onMouseDown","onMouseEnter","onMouseLeave","onMouseMove","onMouseOut","onMouseOver","onMouseUp","onNodeChange","onObjectResizeStart","onObjectResized","onObjectSelected","onPaste","onPostProcess","onPostRender","onPreProcess","onProgressState","onRedo","onRemove","onReset","onSaveContent","onSelectionChange","onSetAttrib","onSetContent","onShow","onSubmit","onUndo","onVisualAid"],Ae=function(e){return $e.map(function(n){return n.toLowerCase()}).indexOf(e.toLowerCase())!==-1},Ie=function(e,n,o){Object.keys(n).filter(Ae).forEach(function(l){var i=n[l];typeof i=="function"&&(l==="onInit"?i(e,o):o.on(l.substring(2),function(s){return i(s,o)}))})},De=function(e,n,o,l){var i=e.modelEvents?e.modelEvents:null,s=Array.isArray(i)?i.join(" "):i;V(l,function(a,r){o&&typeof a=="string"&&a!==r&&a!==o.getContent({format:e.outputFormat})&&o.setContent(a)}),o.on(s||"change input undo redo",function(){n.emit("update:modelValue",o.getContent({format:e.outputFormat}))})},Ee=function(e,n,o,l,i,s){l.setContent(s()),o.attrs["onUpdate:modelValue"]&&De(n,o,l,i),Ie(e,o.attrs,l)},T=0,K=function(e){var n=Date.now(),o=Math.floor(Math.random()*1e9);return T++,e+"_"+o+T+String(n)},Ve=function(e){return e!==null&&e.tagName.toLowerCase()==="textarea"},U=function(e){return typeof e>"u"||e===""?[]:Array.isArray(e)?e:e.split(" ")},je=function(e,n){return U(e).concat(U(n))},Be=function(e){return e==null},F=function(){return{listeners:[],scriptId:K("tiny-script"),scriptLoaded:!1}},Me=function(){var e=F(),n=function(i,s,a,r){var d=s.createElement("script");d.referrerPolicy="origin",d.type="application/javascript",d.id=i,d.src=a;var f=function(){d.removeEventListener("load",f),r()};d.addEventListener("load",f),s.head&&s.head.appendChild(d)},o=function(i,s,a){e.scriptLoaded?a():(e.listeners.push(a),i.getElementById(e.scriptId)||n(e.scriptId,i,s,function(){e.listeners.forEach(function(r){return r()}),e.scriptLoaded=!0}))},l=function(){e=F()};return{load:o,reinitialize:l}},Le=Me(),Oe=function(){return typeof window<"u"?window:global},h=function(){var e=Oe();return e&&e.tinymce?e.tinymce:null},Pe={apiKey:String,cloudChannel:String,id:String,init:Object,initialValue:String,inline:Boolean,modelEvents:[String,Array],plugins:[String,Array],tagName:String,toolbar:[String,Array],modelValue:String,disabled:Boolean,tinymceScriptSrc:String,outputFormat:{type:String,validator:function(e){return e==="html"||e==="text"}}},p=globalThis&&globalThis.__assign||function(){return p=Object.assign||function(e){for(var n,o=1,l=arguments.length;o<l;o++){n=arguments[o];for(var i in n)Object.prototype.hasOwnProperty.call(n,i)&&(e[i]=n[i])}return e},p.apply(this,arguments)},Te=function(e,n,o,l){return e(l||"div",{id:n,ref:o})},Ue=function(e,n,o){return e("textarea",{id:n,visibility:"hidden",ref:o})},Fe=Y({props:Pe,setup:function(e,n){var o=e.init?p({},e.init):{},l=Z(e),i=l.disabled,s=l.modelValue,a=l.tagName,r=ee(null),d=null,f=e.id||K("tiny-vue"),I=e.init&&e.init.inline||e.inline,D=!!n.attrs["onUpdate:modelValue"],E=!0,Q=e.initialValue?e.initialValue:"",k="",W=function(m){return D?function(){return s!=null&&s.value?s.value:""}:function(){return m?Q:k}},S=function(){var m=W(E),v=p(p({},o),{readonly:e.disabled,selector:"#"+f,plugins:je(o.plugins,e.plugins),toolbar:e.toolbar||o.toolbar,inline:I,setup:function(b){d=b,b.on("init",function(X){return Ee(X,e,n,b,s,m)}),typeof o.setup=="function"&&o.setup(b)}});Ve(r.value)&&(r.value.style.visibility=""),h().init(v),E=!1};V(i,function(m){var v;d!==null&&(typeof((v=d.mode)===null||v===void 0?void 0:v.set)=="function"?d.mode.set(m?"readonly":"design"):d.setMode(m?"readonly":"design"))}),V(a,function(m){var v;D||(k=d.getContent()),(v=h())===null||v===void 0||v.remove(d),P(function(){return S()})}),te(function(){if(h()!==null)S();else if(r.value&&r.value.ownerDocument){var m=e.cloudChannel?e.cloudChannel:"5",v=e.apiKey?e.apiKey:"no-api-key",b=Be(e.tinymceScriptSrc)?"https://cdn.tiny.cloud/1/"+v+"/tinymce/"+m+"/tinymce.min.js":e.tinymceScriptSrc;Le.load(r.value.ownerDocument,b,S)}}),ne(function(){h()!==null&&h().remove(d)}),I||(oe(function(){E||S()}),ie(function(){var m;D||(k=d.getContent()),(m=h())===null||m===void 0||m.remove(d)}));var J=function(m){var v;k=d.getContent(),(v=h())===null||v===void 0||v.remove(d),o=p(p({},o),m),P(function(){return S()})};return n.expose({rerender:J}),function(){return I?Te(O,f,r,e.tagName):Ue(O,f,r)}}});const Ne={props:["option","isdisabled","ischecked"],components:{editor:Fe},data(){return{init:{menubar:!1,statusbar:!1,plugins:"image",toolbar:"image",height:"150",images_upload_url:"/file/upload-tiny-mce",file_picker_types:"image",file_picker_callback:function(e,n,o){var l=document.createElement("input");l.setAttribute("type","file"),l.setAttribute("accept","image/*"),l.onchange=function(){var i=this.files[0],s=new FileReader;s.readAsDataURL(i),s.onload=function(){var a="blobid"+new Date().getTime(),r=tinymce.activeEditor.editorUpload.blobCache,d=s.result.split(",")[1],f=r.create(a,i,d);r.add(f),e(f.blobUri(),{title:i.name})}},l.click()}}}}},Re={class:"mb-5 mt-3"},qe={class:"row mb-1"},ze={class:"col-6"},Ke={class:"form-check"},Ge=["value","checked","id"],He=["for"],Qe={class:"col-6 text-end"},We=["disabled"],Je=t("i",{class:"fa fa-remove"},null,-1),Xe=[Je];function Ye(e,n,o,l,i,s){const a=j("editor");return c(),u("div",Re,[t("div",qe,[t("div",ze,[t("div",Ke,[t("input",{class:"form-check-input",type:"radio",value:o.option,name:"answer",checked:o.ischecked,id:`radio-${o.option}`},null,8,Ge),t("label",{class:"form-check-label",for:`radio-${o.option}`}," Correct Answer ",8,He)])]),t("div",Qe,[t("button",{class:"btn btn-light text-danger",onClick:n[0]||(n[0]=r=>e.$emit("remove",o.option)),disabled:o.isdisabled,type:"button"},Xe,8,We)])]),q(a,{"api-key":"3etjjswjc4u1mtvnr70q7p3ahavix9rhnp8puim5vad1kjt7",init:i.init,name:`options[${o.option}]`},null,8,["init","name"])])}const Ze=y(Ne,[["render",Ye]]);const et={components:{Item:Ze},data(){return{options:[1,2,3,4]}},methods:{add(){var e=this.options.slice(-1)[0]+1;this.options.push(e)},remove(e){this.options.splice(this.options.indexOf(e),1)}}},G=e=>(M("data-v-c907a5f3"),e=e(),L(),e),tt=G(()=>t("small",null,[t("i",null,"Put you options and correct answers below.")],-1)),nt=G(()=>t("small",null,"+ Add Field",-1)),ot=[nt];function it(e,n,o,l,i,s){const a=j("Item");return c(),u("div",null,[tt,(c(!0),u(x,null,$(i.options,r=>(c(),z(a,{key:r,option:r,ischecked:i.options[0]==r,isdisabled:i.options.length<2,onRemove:s.remove},null,8,["option","ischecked","isdisabled","onRemove"]))),128)),t("a",{href:"#",onClick:n[0]||(n[0]=B(r=>s.add(),["prevent"]))},ot)])}const at=y(et,[["render",it],["__scopeId","data-v-c907a5f3"]]);const st={data(){return{options:[1]}},methods:{add(){var e=this.options.slice(-1)[0]+1;this.options.push(e)},remove(e){this.options.splice(this.options.indexOf(e),1)}}},H=e=>(M("data-v-517d8edc"),e=e(),L(),e),rt=ae('<div class="row" data-v-517d8edc><div class="col-sm-12 col-md-6" data-v-517d8edc><small data-v-517d8edc><i data-v-517d8edc>Put your posible answers in the fields.</i></small></div><div class="col-sm-12 col-md-6 text-right" data-v-517d8edc><span data-v-517d8edc><input type="checkbox" id="case_sensitive" name="case_sensitive" data-v-517d8edc> <label for="case_sensitive" data-v-517d8edc>Case Sensitive</label></span></div></div>',1),lt=["name","value"],dt=["tabindex","name"],ct={key:0,class:"input-group-prepend"},ut={class:"input-group-btn"},mt=["onClick","disabled"],_t=H(()=>t("i",{class:"fa fa-remove"},null,-1)),vt=[_t],ft=H(()=>t("small",null,"+ Add Field",-1)),ht=[ft];function pt(e,n,o,l,i,s){return c(),u("div",null,[rt,(c(!0),u(x,null,$(i.options,a=>(c(),u("div",{class:"input-group mb-2",key:a},[t("input",{type:"hidden",class:"form-control",name:`options[${a}]`,value:a,"aria-label":"Text input with radio button"},null,8,lt),t("input",{type:"text",required:"",tabindex:a,class:"form-control",name:`options[${a}]`,"aria-label":"Text input with radio button"},null,8,dt),a>4?(c(),u("div",ct)):g("",!0),t("span",ut,[t("button",{class:"btn btn-default text-danger",onClick:r=>s.remove(a),disabled:i.options.length<2,type:"button"},vt,8,mt)])]))),128)),t("a",{href:"#",onClick:n[0]||(n[0]=B(a=>s.add(),["prevent"]))},ht)])}const bt=y(st,[["render",pt],["__scopeId","data-v-517d8edc"]]);const gt={props:["route","token","module","type"],components:{multiple:at,subjective:bt},data(){return{currentForm:"multiple",myFiles:[],lessons:[],text:"put your question here..",inputData:{},saving:!1,editorConfig:{height:300,menubar:"insert",plugins:["advlist autolink lists link image charmap print preview anchor","searchreplace visualblocks code fullscreen","insertdatetime media table paste code help media"],toolbar:"undo redo | bold italic backcolor |                             alignleft aligncenter alignright alignjustify |                             bullist numlist outdent indent image media",toolbar_mode:"floating",tinycomments_mode:"embedded",forced_root_block:"",branding:!1,verify_css_classes:!0,images_upload_url:"/api/upload",images_upload_base_path:"/jofie",images_reuse_filename:!0,media_alt_source:!1,media_poster:!1,relative_urls:!1,remove_script_host:!1}}},created(){this.getLessons()},methods:{getLessons(){axios.get("/api/lesson/list",{params:{module:this.module}}).then(e=>this.lessons=e.data).catch(e=>console.log(e))},submit(){this.saving=!0,this.$refs.form.submit()}}},A=e=>(M("data-v-a4c6dec5"),e=e(),L(),e),yt={class:"panel panel-default"},St=["action"],Ct=["value"],xt=["value"],kt=["value"],wt=A(()=>t("div",{class:"panel-heading"},"Question",-1)),$t={class:"panel-body p-3"},At={class:"row"},It={class:"col-sm-6"},Dt={class:"mb-2"},Et={class:"col-sm-6"},Vt={class:"form-group mb-3"},jt=A(()=>t("label",{for:""},"Lesson",-1)),Bt={name:"lesson",required:"",class:"form-control"},Mt=["value"],Lt={class:""},Ot={class:"panel-footer text-right p-2"},Pt=["disabled"],Tt={key:0},Ut=A(()=>t("i",{class:"fa fa-save"},null,-1)),Ft={key:1},Nt=A(()=>t("i",{class:"fa fa-spin fa-spinner"},null,-1));function Rt(e,n,o,l,i,s){return c(),u("div",yt,[t("form",{ref:"form",onSubmit:n[1]||(n[1]=B((...a)=>s.submit&&s.submit(...a),["prevent"])),action:o.route,method:"POST",id:"question-form",enctype:"multipart/form-data"},[t("input",{type:"hidden",name:"_token",value:o.token},null,8,Ct),t("input",{type:"hidden",name:"module",value:o.module},null,8,xt),t("input",{type:"hidden",name:"type",value:o.type},null,8,kt),wt,t("div",$t,[t("div",At,[t("div",It,[t("div",Dt,[N(t("textarea",{name:"body",id:"maineditor",style:{"min-height":"250px"},class:"form-control","onUpdate:modelValue":n[0]||(n[0]=a=>i.text=a),cols:"30",rows:"10"},null,512),[[R,i.text]])])]),t("div",Et,[t("div",Vt,[jt,t("select",Bt,[(c(!0),u(x,null,$(i.lessons,a=>(c(),u("option",{key:a.id,value:a.id},C(a.name),9,Mt))),128))])]),t("div",Lt,[(c(),z(se(i.currentForm),{class:"tab"}))])])])]),t("div",Ot,[t("button",{class:"btn btn-success btn-lg text-white",disabled:i.saving,type:"submit",style:{width:"150px"}},[i.saving?g("",!0):(c(),u("span",Tt,[Ut,w(" Save ")])),i.saving?(c(),u("span",Ft,[Nt,w(" Saving.. ")])):g("",!0)],8,Pt)])],40,St)])}const qt=y(gt,[["render",Rt],["__scopeId","data-v-a4c6dec5"]]);re({components:{ModuleStudentSelectorComponent:we,QuestionBox:qt}}).mount("#app");
