require('../../common/vendor.js');(global["webpackJsonp"]=global["webpackJsonp"]||[]).push([["packageB/pages/courseinfo/courseinfo"],{"05f3":function(e,t,i){"use strict";var a;i.d(t,"b",(function(){return n})),i.d(t,"c",(function(){return o})),i.d(t,"a",(function(){return a}));var n=function(){var e=this,t=e.$createElement,i=(e._self._c,Math.floor(parseInt(e.com_data.star))),a=0==e.kongkong?e.__map(e.com_data.list,(function(t,i){var a=e.__get_orig(t),n=Math.floor(parseInt(t.star));return{$orig:a,g1:n}})):null;e.$mp.data=Object.assign({},{$root:{g0:i,l0:a}})},o=[]},"12e8":function(e,t,i){"use strict";(function(e){var a;function n(e,t,i){return t in e?Object.defineProperty(e,t,{value:i,enumerable:!0,configurable:!0,writable:!0}):e[t]=i,e}Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var o=function(){i.e("components/uni-ui/uni-nav-bar/uni-nav-bar").then(function(){return resolve(i("d075"))}.bind(null,i)).catch(i.oe)},s=getApp(),u=(a={components:{uniNavBar:o},data:function(){return{tabIndex:0,tabBars:[{name:"介绍"},{name:"目录"},{name:"评价"}],live_course_bg:"",liveInfo:{},hidefudao:"",teacherInfo:{id:"",avatar:"",user_nickname:""},fudaoTeacher:{id:"",avatar:"",user_nickname:""},paytype:"",userpasswordkHidden:!0,feedbackpassword:"",passwordcontent:"",getcourseid:"",nums:"",courseid:"",pingjia_content:"",stararr:[1,2,3,4,5],com_data:{},kongkong:!0,mululist:{},index:0,current:0,lastindex:0,ispack:!1,INFO:[],passwordok:!0,showpass:1,scrollH:0,ifbuy:0,hashidden:1,animationData:[],isGouwuChe:!1,Package_course:[],car_yes:"../../static/car_yes.png",car_no:"../../static/car_no.png",dangqianselected:!0,selecteditem:{}}},onShow:function(){var e=this;setTimeout((function(){e.getPingjia(e.getcourseid),e.getCourseInfo(e.getcourseid),e.getnums()}),300),this.hashidden=1},onReady:function(){var t=this;this.getnums();var i=this;e.getSystemInfo({success:function(e){console.log(e),console.log(e.screenHeight),console.log(e.windowHeight),i.scrollH=750*e.windowHeight/e.windowWidth-600,i.scrollH=750*e.windowHeight/e.windowWidth-750}}),this.getmulu(this.getcourseid);var a=-7;setInterval((function(){var i=e.createAnimation({duration:400,delay:0});-7==a?a=0:0==a&&(a=-7),i.translateX(a).step(),t.animationData=i.export()}),400)}},n(a,"onShow",(function(){this.showpass=0})),n(a,"onLoad",(function(e){this.getCourseInfo(e.courseid),this.getcourseid=e.courseid,this.courseid=e.courseid,this.getPingjia(e.courseid),this.getPackage_Course()})),n(a,"methods",{setLogin:function(){return""!=s.globalData.userinfo||(e.showModal({title:"请先登录你的账号",content:"",showCancel:!0,cancelText:"取消",confirmText:"立即登录",confirmColor:"#38DAA6",success:function(t){t.confirm&&e.navigateTo({url:"../../../pages/login/login"})},fail:function(){},complete:function(){}}),!1)},packages_sub_sure:function(){if(this.ispack=!1,1==this.isGouwuChe)1==this.dangqianselected?this.CartAdd(this.getcourseid):this.CartAdd(this.selecteditem.id);else if(1==this.dangqianselected)e.navigateTo({url:"../../../pages/pay/pay?info="+encodeURIComponent(JSON.stringify(this.INFO))});else{var t=[];t.push(this.selecteditem),e.navigateTo({url:"../../../pages/pay/pay?info="+encodeURIComponent(JSON.stringify(t))})}},dangqian:function(){this.dangqianselected=!0;for(var e=0;e<this.Package_course.length;e++){var t=this.Package_course[e];t.selected=!1}},xuanze:function(e,t){this.selecteditem=e;for(var i=0;i<this.Package_course.length;i++){var a=this.Package_course[i];a.selected=!1}1==e.selected?e.selected=!1:e.selected=!0,this.dangqianselected=!1,this.Package_course[t]=e,this.$set(this.Package_course,t,e)},doAddCar:function(){var e=this.setLogin();e&&(this.isGouwuChe=!0,1==this.liveInfo.ispack?this.ispack=!0:this.CartAdd(this.getcourseid))},buy:function(){var t=this.setLogin();t&&(this.isGouwuChe=!1,1==this.liveInfo.ispack?this.ispack=!0:e.navigateTo({url:"../../../pages/pay/pay?info="+encodeURIComponent(JSON.stringify(this.INFO))}))},CartAdd:function(t){var i=this,a=this.setLogin();if(a){var n=0;n=t==this.getcourseid?0:1;var o=s.globalData;e.request({url:o.site_url+"Cart.Add",method:"POST",data:{type:n,typeid:t,uid:o.userinfo.id,token:o.userinfo.token},success:function(t){i.getCourseInfo(i.getcourseid),i.getnums(),e.showToast({title:t.data.data.msg,icon:"none"})}})}},getPackage_Course:function(){var t=this,i=s.globalData;e.request({url:i.site_url+"Package.GetListByCourse",method:"GET",data:{uid:i.userinfo.id,token:i.userinfo.token,courseid:this.getcourseid},success:function(e){if("0"==e.data.data.code){t.Package_course=e.data.data.info;for(var i=0;i<t.Package_course.length;i++){var a=t.Package_course[i];a["selected"]=!1,t.Package_course[i]=a}}}})},getnums:function(){var t=this,i=s.globalData;e.request({url:i.site_url+"Cart.GetNums",method:"POST",data:{uid:i.userinfo.id,token:i.userinfo.token},success:function(e){0==e.data.data.code&&(t.nums=e.data.data.info[0].nums)}})},getmulu:function(t){var i=this,a=s.globalData;e.request({url:a.site_url+"Course.GetLessonList",method:"GET",data:{uid:a.userinfo.id,token:a.userinfo.token,courseid:t,p:1},success:function(e){if("0"==e.data.data.code){i.mululist=e.data.data.info,console.log(JSON.parse(JSON.stringify(i.mululist)));for(var t=0;t<i.mululist.length;t++){var a=i.mululist[t];a["show"]=0==t,i.mululist[t]=a}}}})},getPingjia:function(t){var i=this,a=s.globalData;e.request({url:a.site_url+"Comment.GetList",method:"GET",data:{uid:a.userinfo.id,token:a.userinfo.token,courseid:t,p:1},success:function(e){if("0"==e.data.data.code){var t=e.data.data.info[0];void 0!=t.list&&t.list.length>0&&(i.kongkong=!1),i.com_data=t}},fail:function(){e.showToast({icon:"none",title:"网络错误"})}})},changeTab:function(e){this.tabIndex=e},onChangeTab:function(e){this.tabIndex=e.detail.current},backCourseList:function(){e.navigateBack({delta:1})},openpinglun:function(){var t=this.setLogin();t&&e.navigateTo({url:"../../../pages/pinglun/pinglun?courseid="+this.courseid+"&title="+this.liveInfo.name+"&avatar="+this.teacherInfo.avatar+"&nickname="+this.teacherInfo.user_nickname})},enterpasslive:function(){this.userpasswordkHidden=!1},submitCancle:function(){this.userpasswordkHidden=!0},submitPassword:function(){var t=this;e.showLoading({title:"......",icon:"none"});var i=this.passwordcontent;this.userpasswordkHidden=!0;var a=s.globalData;e.request({url:a.site_url+"Course.CheckPass",method:"POST",data:{pass:i,courseid:this.getcourseid,uid:a.userinfo.id,token:a.userinfo.token},success:function(i){e.hideLoading(),e.showToast({title:i.data.data.msg,icon:"none"}),0==i.data.data.code&&(t.passwordok=!0,t.showpass=0)},fail:function(){e.hideLoading()},complete:function(){}})},getCourseInfo:function(t){var i=this,a=s.globalData;e.request({url:a.site_url+"Course.GetDetail",method:"GET",data:{uid:a.userinfo.id,token:a.userinfo.token,courseid:t},success:function(t){if(700!=t.data.data.code){i.INFO=t.data.data.info,i.INFO[0].content;var a=t.data.data.info[0];i.ifbuy=t.data.data.info[0].ifbuy,i.live_course_bg=a.thumb,i.liveInfo=a,i.teacherInfo=a.userinfo,i.paytype=t.data.data.info[0].paytype,2==i.paytype&&(i.passwordok=!1,i.showpass=1,1==i.ifbuy&&(i.showpass=0)),a.tutor.length<1?i.hidefudao="1":(i.fudaoTeacher.id=a.tutor[0].id,i.fudaoTeacher.avatar=a.tutor[0].avatar,i.fudaoTeacher.user_nickname=a.tutor[0].user_nickname)}else e.navigateTo({url:"../../../pages/login/login"})}})},viewTeacherInfo:function(t){var i=this.setLogin();i&&e.navigateTo({url:"../../../pages/teacherinfo/teacherinfo?touid="+t})},showError:function(t){e.showToast({icon:"none",title:t,duration:3e3})},enterpaylive:function(){1==this.liveInfo.ifbuy&&this.enterlive()},enterlive:function(){},entermululive:function(t){var i=this,a=JSON.parse(JSON.stringify(t));if(0==this.showpass){var n=[];a["thumb"]=this.live_course_bg,n.push(a);var o=parseInt(a.type);if(o<3||3==o){var u=s.globalData;e.request({url:u.site_url+"App.Course.SetLesson",method:"POST",data:{uid:u.userinfo.id,token:u.userinfo.token,courseid:a.courseid,lessonid:a.id},success:function(t){0==t.data.data.code?e.navigateTo({url:"../content-detail/content-detail?info="+encodeURIComponent(JSON.stringify(a))+"&type="+a.type+"&thumb="+i.live_course_bg+"&addtime="+i.liveInfo.add_time}):e.showToast({title:t.data.data.msg,icon:"none"})}})}else{var r=s.globalData;e.request({url:r.site_url+"Live.CheckLive",method:"POST",data:{uid:r.userinfo.id,token:r.userinfo.token,courseid:a.courseid,lessonid:a.id,liveuid:this.liveInfo.uid},success:function(t){0==t.data.data.code?4==o||5==o||6==o||8==o?e.navigateTo({url:"../live-info/live-infoplay?liveuid="+i.liveInfo.uid+"&courseid="+a.courseid+"&lessonid="+a.id+"&thumb="+i.live_course_bg}):7==o&&(1==t.data.data.info[0].islive||2==t.data.data.info[0].islive?e.showToast({title:"白板直播暂未接入",icon:"none"}):e.showToast({title:"直播未开始",icon:"none"})):e.showToast({title:t.data.data.msg,icon:"none"})}})}}},shopcar:function(){var t=this.setLogin();t&&e.navigateTo({url:"../../../pages/shop-car/shop-car"})},showdetail:function(e,t){var i=this.setLogin();i&&(this.lastindex=this.current,this.current=t,0==e.show?e.show=!0:e.show=!1,this.mululist[t]=e,this.$set(this.mululist,t,e))}}),a);t.default=u}).call(this,i("543d")["default"])},"28d2":function(e,t,i){"use strict";i.r(t);var a=i("12e8"),n=i.n(a);for(var o in a)"default"!==o&&function(e){i.d(t,e,(function(){return a[e]}))}(o);t["default"]=n.a},5315:function(e,t,i){},"5b4a":function(e,t,i){"use strict";(function(e){i("1754");a(i("66fd"));var t=a(i("c280"));function a(e){return e&&e.__esModule?e:{default:e}}wx.__webpack_require_UNI_MP_PLUGIN__=i,e(t.default)}).call(this,i("543d")["createPage"])},c280:function(e,t,i){"use strict";i.r(t);var a=i("05f3"),n=i("28d2");for(var o in n)"default"!==o&&function(e){i.d(t,e,(function(){return n[e]}))}(o);i("e155");var s,u=i("f0c5"),r=Object(u["a"])(n["default"],a["b"],a["c"],!1,null,null,null,!1,a["a"],s);t["default"]=r.exports},e155:function(e,t,i){"use strict";var a=i("5315"),n=i.n(a);n.a}},[["5b4a","common/runtime","common/vendor"]]]);