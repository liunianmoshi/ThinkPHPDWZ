
//链接提示
var pltsPop = null;
var pltsoffsetX = 12;   // 弹出窗口位于鼠标左侧或者右侧的距离；3-12 合适
var pltsoffsetY = 6;  // 弹出窗口位于鼠标下方的距离；3-12 合适
var pltsTitle = "";
var Browser = new Object();
Browser.isIE = window.ActiveXObject ? true : false;
if (document.body == null || typeof document.body == "undefined") {
    document.write('<div id="pltsTipLayer" style="display: none;height: auto;max-width:270px;padding: 2px 5px;border: 1px solid #9BD5FD;position: absolute;color: #111;text-align:left; z-index:10002;background:#F4F9FF;vertical-align:middle;font-size:13px;line-height:18px;filter: progid:DXImageTransform.Microsoft.Alpha(opacity=98); "></div>');
}
else {
        var d = document.createElement("div");
        d.setAttribute("id", "pltsTipLayer");
        d.setAttribute("style", "display:none;height: auto;max-width:270px;padding: 2px 5px;border: 1px solid #9BD5FD;position: absolute;color: #111;text-align:left; z-index:10002;background:#F4F9FF;vertical-align:middle;font-size:13px;line-height:18px;filter: progid:DXImageTransform.Microsoft.Alpha(opacity=98);");
        document.body.appendChild(d);
}
function pltsinits() {
    document.onmouseover = plts;
    document.onmousemove = moveToMouseLoc;
}

function plts(e) {
    if (e == null) { e = window.event || e; };
    var o = e.srcElement || e.target;

    var pltsTipLayer = getElement("pltsTipLayer");
	if(pltsTipLayer == null || pltsTipLayer == undefined){
		return false;
	}
    if (o == null || o.disabled) {
        return false;
    }
    if (o.alt != null && o.alt != "") { o.dypop = o.alt; o.alt = "" };
    if (o.title != null && o.title != "") { o.dypop = o.title; o.title = "" };
    pltsPop = o.dypop;
    if (pltsPop != null && pltsPop != "" && typeof (pltsPop) != "undefined") {
        if (Browser.isIE) {
            var ua = navigator.userAgent.toLowerCase();
            var version = ua.match(/msie ([\d.]+)/)[1];
            if (version == "6.0") {
                if (pltsPop.length > 30) {
                    pltsTipLayer.style.width = 270;
                }
                else {
                    pltsTipLayer.style.width = pltsPop.length * 13;
                }
            }
        }
        pltsTipLayer.style.left = -1000;
        pltsTipLayer.style.display = '';
        var Msg = pltsPop.replace(/\n/g, "<br>");
        Msg = Msg.replace(/\0x13/g, "<br>");
        var re = /\{(.[^\{]*)\}/ig;
        re = /\{(.[^\{]*)\}(.*)/ig;
        pltsTitle = Msg.replace(re, "$1") + "&nbsp;";
        re = /\{(.[^\{]*)\}/ig;
        //Msg = Msg.replace(re, "");
        //Msg = Msg.replace("<br>", "");
        var attr = (document.location.toString().toLowerCase().indexOf("list.asp") > 0 ? "nowrap" : "");
        var content = Msg;
        pltsTipLayer.innerHTML = content;
        moveToMouseLoc();
        return true;
    }
    else {
        pltsTipLayer.innerHTML = '';
        pltsTipLayer.style.display = 'none';
        return true;
    }
}

function moveToMouseLoc(evl) {
    if (evl == undefined || evl == null) { evl = window.event || evl; }
    var pltsTipLayer = getElement("pltsTipLayer");
	if(pltsTipLayer == null || pltsTipLayer == undefined){
		return false;
	}
	if (pltsTipLayer.innerHTML == '') { return true; }
	if (evl == undefined || evl == null) { return true; }
    var MouseX = evl.clientX + pltsoffsetX;
    var MouseY = evl.clientY + document.documentElement.scrollTop + pltsoffsetY;

    var popHeight = pltsTipLayer.clientHeight;
    var popWidth = pltsTipLayer.clientWidth;
    if (MouseY + pltsoffsetY + popHeight > document.body.clientHeight) {
        popTopAdjust = -popHeight - pltsoffsetY * 1.5;
    }
    else {
        popTopAdjust = 0;
    }
    if (MouseX + pltsoffsetX + popWidth > document.body.clientWidth) {
        popLeftAdjust = -popWidth - pltsoffsetX * 2;
    }
    else {
        popLeftAdjust = 0;
    }
//    if (Browser.isIE) {
//        pltsTipLayer.style.left = MouseX + popLeftAdjust; //+system.getScrollLeft()-10;
//        pltsTipLayer.style.top = MouseY + popTopAdjust; //+system.getScrollTop()+20;
//    }
//    else {
//        pltsTipLayer.style.left = MouseX + popLeftAdjust + "px"; //+system.getScrollLeft()-10;
//        pltsTipLayer.style.top = MouseY + popTopAdjust + "px"; //+system.getScrollTop()+20;
    //    }
    $(pltsTipLayer).css("left", (MouseX + popLeftAdjust) < 0 ? 0 : (MouseX + popLeftAdjust));
    $(pltsTipLayer).css("top", MouseY + popTopAdjust);
    return true;
}
function getElement(objid)
{
	return document.getElementById(objid);
}
pltsinits();
