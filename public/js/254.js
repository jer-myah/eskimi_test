"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[254],{254:(t,a,e)=>{e.r(a),e.d(a,{default:()=>o});const r={data:function(){return{max_num_image:!1,form:{name:"",from_date:"",to_date:"",total_budget:"",daily_budget:"",banner_1:"",banner_2:"",banner_3:"",banner_4:"",banner_5:""},banners:[]}},computed:{},methods:{createCampaign:function(){var t=this;this.form.banner_1=this.banners[0],this.form.banner_2=this.banners[1],this.form.banner_3=this.banners[2],this.form.banner_4=this.banners[3],this.form.banner_5=this.banners[4],this.$store.dispatch("campaign/storeCampaign",this.form).then((function(){t.$router.push("campaigns")}))},handleFileChange:function(t){if(t.target.files.length>5)this.max_num_image=!0;else for(var a=0,e=t.target.files.length;a<e;)this.banners.push(t.target.files[a]),a++}}};const o=(0,e(900).Z)(r,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"container"},[e("div",[e("router-link",{attrs:{to:"/campaigns"}},[t._v("Campaigns")])],1),t._v(" "),e("div",{staticClass:"row justify-content-center"},[e("div",{staticClass:"col-md-8"},[e("div",{staticClass:"card"},[e("div",{staticClass:"card-header"},[t._v("Create")]),t._v(" "),e("div",{staticClass:"card-body"},[e("form",{on:{submit:function(a){return a.preventDefault(),t.createCampaign()}}},[e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-md-4 col-form-label text-md-right",attrs:{for:"name"}},[t._v("Name")]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.form.name,expression:"form.name"}],staticClass:"form-control",attrs:{id:"name",type:"text",required:"",autocomplete:"name",autofocus:""},domProps:{value:t.form.name},on:{input:function(a){a.target.composing||t.$set(t.form,"name",a.target.value)}}})])]),t._v(" "),e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-md-4 col-form-label text-md-right",attrs:{for:"from_date"}},[t._v("From")]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.form.from_date,expression:"form.from_date"}],staticClass:"form-control",attrs:{id:"from_date",type:"date",required:""},domProps:{value:t.form.from_date},on:{input:function(a){a.target.composing||t.$set(t.form,"from_date",a.target.value)}}})])]),t._v(" "),e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-md-4 col-form-label text-md-right",attrs:{for:"to_date"}},[t._v("To")]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.form.to_date,expression:"form.to_date"}],staticClass:"form-control",attrs:{id:"to_date",type:"date",required:""},domProps:{value:t.form.to_date},on:{input:function(a){a.target.composing||t.$set(t.form,"to_date",a.target.value)}}})])]),t._v(" "),e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-md-4 col-form-label text-md-right",attrs:{for:"total_budget"}},[t._v("Total Budget")]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.form.total_budget,expression:"form.total_budget"}],staticClass:"form-control",attrs:{id:"total_budget",type:"number",required:""},domProps:{value:t.form.total_budget},on:{input:function(a){a.target.composing||t.$set(t.form,"total_budget",a.target.value)}}})])]),t._v(" "),e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-md-4 col-form-label text-md-right",attrs:{for:"daily_budget"}},[t._v("Daily Budget")]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.form.daily_budget,expression:"form.daily_budget"}],staticClass:"form-control",attrs:{id:"daily_budget",type:"number",required:""},domProps:{value:t.form.daily_budget},on:{input:function(a){a.target.composing||t.$set(t.form,"daily_budget",a.target.value)}}})])]),t._v(" "),e("div",{staticClass:"form-group row"},[e("label",{staticClass:"col-md-4 col-form-label text-md-right",attrs:{for:"banner_1"}},[t._v("Banner")]),t._v(" "),e("div",{staticClass:"col-md-6"},[e("input",{staticClass:"form-control",attrs:{id:"banners",type:"file",multiple:"",required:""},on:{change:function(a){return t.handleFileChange(a)}}})])]),t._v(" "),t.max_num_image?e("label",{staticClass:"col-md-4 col-form-label text-sm-right",attrs:{for:""}},[t._v("Number of Images should not exceed 5")]):t._e(),t._v(" "),t._m(0)])])])])])])}),[function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"form-group row mb-0"},[e("div",{staticClass:"col-md-8 offset-md-4"},[e("button",{staticClass:"btn btn-primary",attrs:{type:"submit"}},[t._v("\n                                    Send\n                                ")])])])}],!1,null,null,null).exports}}]);