(this["webpackJsonps3-project"]=this["webpackJsonps3-project"]||[]).push([[0],{3:function(e,t){e.exports={VIEW_LIST_S3_ITEM:"VIEW_LIST_S3_ITEM",SELECT_S3_ITEM:"SELECT_S3_ITEM",PROTO:"http",HOST:"journalai.io",PORT:80,IMAGES_PATH:"https://journal-ai-php-logs.s3.eu-west-2.amazonaws.com/"}},32:function(e,t,a){},33:function(e,t,a){},57:function(e,t,a){"use strict";a.r(t);var n=a(1),c=a(0),i=a.n(c),s=a(7),o=a.n(s),r=(a(32),a.p,a(33),a(8)),u=a(22),l=a(23),d=a(26),h=a(25),m=a(3),j=a(24),v=a.n(j),b=function(e){Object(d.a)(a,e);var t=Object(h.a)(a);function a(e){var n;return Object(u.a)(this,a),(n=t.call(this,e)).state={imageState:null,update:!1,url:""},n}return Object(l.a)(a,[{key:"fetchData",value:function(){var e=this;v.a.get(m.PROTO+"://"+m.HOST+":"+m.PORT+"/s3/index.php?q=list-s3").then((function(t){for(var n=0;n<t.data.length;n++)a.stateData[a.stateData.length]={image:m.IMAGES_PATH+t.data[n].image_url,checked:!1,viewed:!1};return e.setState({update:!0}),t})).catch((function(e){console.log(e)}))}},{key:"componentWillMount",value:function(){this.fetchData()}},{key:"componentDidMount",value:function(){this.setState({imageState:a.stateData})}},{key:"selectCheckbox",value:function(e){this.props.onSelect([e])}},{key:"downloadAsCsv",value:function(){for(var e="",t=0;t<a.stateData.length;t++)a.stateData[t].checked&&(e+=a.stateData[t].image+"\n");var n=new Blob(["image_url\n"+e],{type:"text/csv"}),c=window.URL.createObjectURL(n),i=document.createElement("a");i.setAttribute("hidden",""),i.setAttribute("href",c),i.setAttribute("download","download.csv"),i.click()}},{key:"render",value:function(){var e=this,t=this.props.imageState,c=null,i=[];for(var s in t)a.stateData[s]=t[s];return this.state.imageState&&(c=this.state.imageState.map((function(t,a){var c="checkbox["+a.toString()+"]";return i.push(a),Object(n.jsxs)("div",{className:"image-box",children:[Object(n.jsx)("div",{className:"image-tile",children:Object(n.jsx)("img",{src:t.image})}),Object(n.jsx)("div",{className:"image-checkbox",children:Object(n.jsx)("input",{type:"checkbox",name:c,onChange:function(){return e.selectCheckbox(a)}})})]},a)}))),Object(n.jsxs)("div",{className:"clearfix",children:[Object(n.jsx)("div",{className:"row",children:Object(n.jsx)("button",{onClick:function(){return e.downloadAsCsv()},children:"Download Image URL(s)"})}),Object(n.jsx)("div",{className:"row",children:c}),Object(n.jsx)("div",{className:"row",children:Object(n.jsx)("button",{onClick:function(){return e.downloadAsCsv()},children:"Download Image URL(s)"})}),Object(n.jsx)("div",{className:"row",children:Object(n.jsx)("p",{children:this.state.url})})]})}}]),a}(i.a.Component);b.stateData=[];var f=function(e){return{type:m.VIEW_LIST_S3_ITEM,item:{viewed:!0,name:e},evaluate:function(e){for(var t=0,a=null,n={},c=0;c<e.length;c++)t=e[c],a=b.stateData[t],n[t]={image:a.image,checked:a.checked,viewed:!0};return n}}},g=function(e){return{type:m.SELECT_S3_ITEM,item:{viewed:!0,name:e},evaluate:function(e){for(var t=0,a=null,n={},c=0;c<e.length;c++)t=e[c],a=b.stateData[t],n[t]={image:a.image,checked:!0,viewed:a.viewed};return n}}},p=Object(r.b)((function(e){return{imageState:e.imageState}}),(function(e){return{onLoad:function(t){e(f(t))},onSelect:function(t){e(g(t))}}}))(b);var O=function(){return Object(n.jsx)("div",{className:"App",children:Object(n.jsx)("header",{className:"row",children:Object(n.jsx)(p,{})})})},S=function(e){e&&e instanceof Function&&a.e(3).then(a.bind(null,58)).then((function(t){var a=t.getCLS,n=t.getFID,c=t.getFCP,i=t.getLCP,s=t.getTTFB;a(e),n(e),c(e),i(e),s(e)}))},x=a(6),w=Object(x.b)({imageState:function(){arguments.length>0&&void 0!==arguments[0]||b.stateData;var e=arguments.length>1?arguments[1]:void 0;switch(e.type){case m.VIEW_LIST_S3_ITEM:case m.SELECT_S3_ITEM:var t=e.evaluate(e.item.name);return t;default:return{}}}}),T=Object(x.c)(w);o.a.render(Object(n.jsx)(r.a,{store:T,children:Object(n.jsx)(O,{})}),document.getElementById("root")),S()}},[[57,1,2]]]);
//# sourceMappingURL=main.388e9d56.chunk.js.map