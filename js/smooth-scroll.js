$('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(e){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=$(this.hash);t=t.length?t:$("[name="+this.hash.slice(1)+"]"),t.length&&(e.preventDefault(),$("html, body").animate({scrollTop:t.offset().top},1e3,function(){var e=$(t);if(e.focus(),e.is(":focus"))return!1;e.attr("tabindex","-1"),e.focus()}))}}),$(document).ready(function(){AOS.init({disable:"mobile"}),function(){function e(){o.length=0;for(var e=0;e<n.length;e++){var r=n[e].parentNode.getBoundingClientRect();r.bottom>0&&r.top<window.innerHeight&&o.push({rect:r,node:n[e]})}cancelAnimationFrame(i),o.length&&(i=requestAnimationFrame(t))}function t(){for(var e=0;e<o.length;e++){var t=o[e].rect,n=o[e].node,i=Math.max(t.bottom,0)/(window.innerHeight+t.height);n.style.transform="translate3d(0, "+-50*i+"%, 0)"}}if("requestAnimationFrame"in window&&!/Mobile|Android/.test(navigator.userAgent)){var n=[];if($("[data-bs-parallax-bg]").each(function(){var e=$(this),t=$("<div>");t.css({backgroundImage:e.css("background-image"),backgroundSize:"cover",backgroundPosition:"center",position:"absolute",height:"200%",width:"100%",top:0,left:0,zIndex:-100}),t.appendTo(e),n.push(t[0]),e.css({position:"relative",background:"transparent",overflow:"hidden"})}),n.length){var i,o=[];$(window).on("scroll resize",e),e()}}}()});