window.TILE_VERSION = {
    "ditu": {
        "normal": {
            "version": "088",
            "updateDate": "20221231"
        },
        "satellite": {
            "version": "009",
            "updateDate": "20221231"
        },
        "normalTraffic": {
            "version": "081",
            "updateDate": "20221231"
        },
        "satelliteTraffic": {
            "version": "083",
            "updateDate": "20221231"
        },
        "mapJS": {
            "version": "104",
            "updateDate": "20221231"
        },
        "satelliteStreet": {
            "version": "083",
            "updateDate": "20221231"
        },
        "earthVector": {
            "version": "001",
            "updateDate": "20221231"
        }
    },
    "webapp": {
        "high_normal": {
            "version": "001",
            "updateDate": "20221231"
        },
        "lower_normal": {
            "version": "002",
            "updateDate": "20221231"
        }
    },
    "api_for_mobile": {
        "vector": {
            "version": "002",
            "updateDate": "20221231"
        },
        "vectorIcon": {
            "version": "002",
            "updateDate": "20221231"
        }
    }
};
window.BMAP_AUTHENTIC_KEY = "";
(function() {
    function aa(a) {
        throw a;
    }
    var l = void 0
      , q = !0
      , s = null
      , t = !1;
    function ca() {
        return function() {}
    }
    function da(a) {
        return function(b) {
            this[a] = b
        }
    }
    function u(a) {
        return function() {
            return this[a]
        }
    }
    function fa(a) {
        return function() {
            return a
        }
    }
    var ga, ha = [];
    function ia(a) {
        return function() {
            return ha[a].apply(this, arguments)
        }
    }
    function ja(a, b) {
        return ha[a] = b
    }
    var ka, x = ka = x || {
        version: "1.3.4"
    };
    x.da = "$BAIDU$";
    window[x.da] = window[x.da] || {};
    x.object = x.object || {};
    x.extend = x.object.extend = function(a, b) {
        for (var c in b)
            b.hasOwnProperty(c) && (a[c] = b[c]);
        return a
    }
    ;
    x.U = x.U || {};
    x.U.fa = function(a) {
        return "string" == typeof a || a instanceof String ? document.getElementById(a) : a && a.nodeName && (1 == a.nodeType || 9 == a.nodeType) ? a : s
    }
    ;
    x.fa = x.Ic = x.U.fa;
    x.U.aa = function(a) {
        a = x.U.fa(a);
        if (a === s)
            return a;
        a.style.display = "none";
        return a
    }
    ;
    x.aa = x.U.aa;
    x.lang = x.lang || {};
    x.lang.Ig = function(a) {
        return "[object String]" == Object.prototype.toString.call(a)
    }
    ;
    x.Ig = x.lang.Ig;
    x.lang.qE = function(a) {
        if ("[object Object]" === Object.prototype.toString.call(a)) {
            for (var b in a)
                return t;
            return q
        }
        return t
    }
    ;
    x.qE = x.lang.qE;
    x.U.fk = function(a) {
        return x.lang.Ig(a) ? document.getElementById(a) : a
    }
    ;
    x.fk = x.U.fk;
    x.U.getElementsByClassName = function(a, b) {
        var c;
        if (a.getElementsByClassName)
            c = a.getElementsByClassName(b);
        else {
            var e = a;
            e == s && (e = document);
            c = [];
            var e = e.getElementsByTagName("*"), f = e.length, g = RegExp("(^|\\s)" + b + "(\\s|$)"), i, k;
            for (k = i = 0; i < f; i++)
                g.test(e[i].className) && (c[k] = e[i],
                k++)
        }
        return c
    }
    ;
    x.getElementsByClassName = x.U.getElementsByClassName;
    x.U.contains = function(a, b) {
        var c = x.U.fk
          , a = c(a)
          , b = c(b);
        return a.contains ? a != b && a.contains(b) : !!(a.compareDocumentPosition(b) & 16)
    }
    ;
    x.ga = x.ga || {};
    /msie (\d+\.\d)/i.test(navigator.userAgent) && (x.ga.oa = x.oa = document.documentMode || +RegExp.$1);
    var la = {
        cellpadding: "cellPadding",
        cellspacing: "cellSpacing",
        colspan: "colSpan",
        rowspan: "rowSpan",
        valign: "vAlign",
        usemap: "useMap",
        frameborder: "frameBorder"
    };
    8 > x.ga.oa ? (la["for"] = "htmlFor",
    la["class"] = "className") : (la.htmlFor = "for",
    la.className = "class");
    x.U.PG = la;
    x.U.oF = function(a, b, c) {
        a = x.U.fa(a);
        if (a === s)
            return a;
        if ("style" == b)
            a.style.cssText = c;
        else {
            b = x.U.PG[b] || b;
            a.setAttribute(b, c)
        }
        return a
    }
    ;
    x.oF = x.U.oF;
    x.U.pF = function(a, b) {
        a = x.U.fa(a);
        if (a === s)
            return a;
        for (var c in b)
            x.U.oF(a, c, b[c]);
        return a
    }
    ;
    x.pF = x.U.pF;
    x.jl = x.jl || {};
    (function() {
        var a = RegExp("(^[\\s\\t\\xa0\\u3000]+)|([\\u3000\\xa0\\s\\t]+$)", "g");
        x.jl.trim = function(b) {
            return ("" + b).replace(a, "")
        }
    }
    )();
    x.trim = x.jl.trim;
    x.jl.np = function(a, b) {
        var a = "" + a
          , c = Array.prototype.slice.call(arguments, 1)
          , e = Object.prototype.toString;
        if (c.length) {
            c = c.length == 1 ? b !== s && /\[object Array\]|\[object Object\]/.test(e.call(b)) ? b : c : c;
            return a.replace(/#\{(.+?)\}/g, function(a, b) {
                var i = c[b];
                "[object Function]" == e.call(i) && (i = i(b));
                return "undefined" == typeof i ? "" : i
            })
        }
        return a
    }
    ;
    x.np = x.jl.np;
    x.U.rc = function(a, b) {
        a = x.U.fa(a);
        if (a === s)
            return a;
        for (var c = a.className.split(/\s+/), e = b.split(/\s+/), f, g = e.length, i, k = 0; k < g; ++k) {
            i = 0;
            for (f = c.length; i < f; ++i)
                if (c[i] == e[k]) {
                    c.splice(i, 1);
                    break
                }
        }
        a.className = c.join(" ");
        return a
    }
    ;
    x.rc = x.U.rc;
    x.U.Ux = function(a, b, c) {
        a = x.U.fa(a);
        if (a === s)
            return a;
        var e;
        if (a.insertAdjacentHTML)
            a.insertAdjacentHTML(b, c);
        else {
            e = a.ownerDocument.createRange();
            b = b.toUpperCase();
            if (b == "AFTERBEGIN" || b == "BEFOREEND") {
                e.selectNodeContents(a);
                e.collapse(b == "AFTERBEGIN")
            } else {
                b = b == "BEFOREBEGIN";
                e[b ? "setStartBefore" : "setEndAfter"](a);
                e.collapse(b)
            }
            e.insertNode(e.createContextualFragment(c))
        }
        return a
    }
    ;
    x.Ux = x.U.Ux;
    x.U.show = function(a) {
        a = x.U.fa(a);
        if (a === s)
            return a;
        a.style.display = "";
        return a
    }
    ;
    x.show = x.U.show;
    x.U.LD = function(a) {
        a = x.U.fa(a);
        return a === s ? a : a.nodeType == 9 ? a : a.ownerDocument || a.document
    }
    ;
    x.U.ib = function(a, b) {
        a = x.U.fa(a);
        if (a === s)
            return a;
        for (var c = b.split(/\s+/), e = a.className, f = " " + e + " ", g = 0, i = c.length; g < i; g++)
            f.indexOf(" " + c[g] + " ") < 0 && (e = e + (" " + c[g]));
        a.className = e;
        return a
    }
    ;
    x.ib = x.U.ib;
    x.U.HB = x.U.HB || {};
    x.U.em = x.U.em || [];
    x.U.em.filter = function(a, b, c) {
        for (var e = 0, f = x.U.em, g; g = f[e]; e++)
            if (g = g[c])
                b = g(a, b);
        return b
    }
    ;
    x.jl.JO = function(a) {
        return a.indexOf("-") < 0 && a.indexOf("_") < 0 ? a : a.replace(/[-_][^-_]/g, function(a) {
            return a.charAt(1).toUpperCase()
        })
    }
    ;
    x.U.J0 = function(a) {
        x.U.nt(a, "expand") ? x.U.rc(a, "expand") : x.U.ib(a, "expand")
    }
    ;
    x.U.nt = function(a) {
        if (arguments.length <= 0 || typeof a === "function")
            return this;
        if (this.size() <= 0)
            return t;
        var a = a.replace(/^\s+/g, "").replace(/\s+$/g, "").replace(/\s+/g, " "), b = a.split(" "), c;
        x.forEach(this, function(a) {
            for (var a = a.className, f = 0; f < b.length; f++)
                if (!~(" " + a + " ").indexOf(" " + b[f] + " ")) {
                    c = t;
                    return
                }
            c !== t && (c = q)
        });
        return c
    }
    ;
    x.U.Hg = function(a, b) {
        var c = x.U
          , a = c.fa(a);
        if (a === s)
            return a;
        var b = x.jl.JO(b)
          , e = a.style[b];
        if (!e)
            var f = c.HB[b]
              , e = a.currentStyle || (x.ga.oa ? a.style : getComputedStyle(a, s))
              , e = f && f.get ? f.get(a, e) : e[f || b];
        if (f = c.em)
            e = f.filter(b, e, "get");
        return e
    }
    ;
    x.Hg = x.U.Hg;
    /opera\/(\d+\.\d)/i.test(navigator.userAgent) && (x.ga.opera = +RegExp.$1);
    x.ga.zM = /webkit/i.test(navigator.userAgent);
    x.ga.cZ = /gecko/i.test(navigator.userAgent) && !/like gecko/i.test(navigator.userAgent);
    x.ga.xE = "CSS1Compat" == document.compatMode;
    x.U.ma = function(a) {
        a = x.U.fa(a);
        if (a === s)
            return a;
        var b = x.U.LD(a)
          , c = x.ga
          , e = x.U.Hg;
        c.cZ > 0 && b.getBoxObjectFor && e(a, "position");
        var f = {
            left: 0,
            top: 0
        }, g;
        if (a == (c.oa && !c.xE ? b.body : b.documentElement))
            return f;
        if (a.getBoundingClientRect) {
            a = a.getBoundingClientRect();
            f.left = Math.floor(a.left) + Math.max(b.documentElement.scrollLeft, b.body.scrollLeft);
            f.top = Math.floor(a.top) + Math.max(b.documentElement.scrollTop, b.body.scrollTop);
            f.left = f.left - b.documentElement.clientLeft;
            f.top = f.top - b.documentElement.clientTop;
            a = b.body;
            b = parseInt(e(a, "borderLeftWidth"));
            e = parseInt(e(a, "borderTopWidth"));
            if (c.oa && !c.xE) {
                f.left = f.left - (isNaN(b) ? 2 : b);
                f.top = f.top - (isNaN(e) ? 2 : e)
            }
        } else {
            g = a;
            do {
                f.left = f.left + g.offsetLeft;
                f.top = f.top + g.offsetTop;
                if (c.zM > 0 && e(g, "position") == "fixed") {
                    f.left = f.left + b.body.scrollLeft;
                    f.top = f.top + b.body.scrollTop;
                    break
                }
                g = g.offsetParent
            } while (g && g != a);
            if (c.opera > 0 || c.zM > 0 && e(a, "position") == "absolute")
                f.top = f.top - b.body.offsetTop;
            for (g = a.offsetParent; g && g != b.body; ) {
                f.left = f.left - g.scrollLeft;
                if (!c.opera || g.tagName != "TR")
                    f.top = f.top - g.scrollTop;
                g = g.offsetParent
            }
        }
        return f
    }
    ;
    /firefox\/(\d+\.\d)/i.test(navigator.userAgent) && (x.ga.We = +RegExp.$1);
    /BIDUBrowser/i.test(navigator.userAgent) && (x.ga.V2 = q);
    var ma = navigator.userAgent;
    /(\d+\.\d)?(?:\.\d)?\s+safari\/?(\d+\.\d+)?/i.test(ma) && !/chrome/i.test(ma) && (x.ga.Fy = +(RegExp.$1 || RegExp.$2));
    /chrome\/(\d+\.\d)/i.test(navigator.userAgent) && (x.ga.Sw = +RegExp.$1);
    x.oc = x.oc || {};
    x.oc.Rb = function(a, b) {
        var c, e, f = a.length;
        if ("function" == typeof b)
            for (e = 0; e < f; e++) {
                c = a[e];
                c = b.call(a, c, e);
                if (c === t)
                    break
            }
        return a
    }
    ;
    x.Rb = x.oc.Rb;
    x.lang.da = function() {
        return "TANGRAM__" + (window[x.da]._counter++).toString(36)
    }
    ;
    window[x.da]._counter = window[x.da]._counter || 1;
    window[x.da]._instances = window[x.da]._instances || {};
    x.lang.Bt = function(a) {
        return "[object Function]" == Object.prototype.toString.call(a)
    }
    ;
    x.lang.Ja = function(a) {
        this.da = a || x.lang.da();
        window[x.da]._instances[this.da] = this
    }
    ;
    window[x.da]._instances = window[x.da]._instances || {};
    x.lang.Ja.prototype.pi = ia(0);
    x.lang.Ja.prototype.toString = function() {
        return "[object " + (this.LQ || "Object") + "]"
    }
    ;
    x.lang.Pu = function(a, b) {
        this.type = a;
        this.returnValue = q;
        this.target = b || s;
        this.currentTarget = s
    }
    ;
    x.lang.Ja.prototype.addEventListener = function(a, b, c) {
        if (x.lang.Bt(b)) {
            !b.ul && (b.ul = {});
            !this.Ui && (this.Ui = {});
            var e = this.Ui, f;
            if (typeof c == "string" && c) {
                /[^\w\-]/.test(c) && aa("nonstandard key:" + c);
                f = b.Kx = c
            }
            a.indexOf("on") != 0 && (a = "on" + a);
            typeof e[a] != "object" && (e[a] = {});
            typeof b.ul[a] != "object" && (b.ul[a] = {});
            f = f || x.lang.da();
            b.ul[a].Kx = f;
            e[a][f] = b
        }
    }
    ;
    x.lang.Ja.prototype.removeEventListener = function(a, b) {
        a.indexOf("on") != 0 && (a = "on" + a);
        if (x.lang.Bt(b)) {
            if (!b.ul || !b.ul[a])
                return;
            b = b.ul[a].Kx
        } else if (!x.lang.Ig(b))
            return;
        !this.Ui && (this.Ui = {});
        var c = this.Ui;
        c[a] && c[a][b] && delete c[a][b]
    }
    ;
    x.lang.Ja.prototype.dispatchEvent = function(a, b) {
        x.lang.Ig(a) && (a = new x.lang.Pu(a));
        !this.Ui && (this.Ui = {});
        var b = b || {}, c;
        for (c in b)
            a[c] = b[c];
        var e = this.Ui
          , f = a.type;
        a.target = a.target || this;
        a.currentTarget = this;
        f.indexOf("on") != 0 && (f = "on" + f);
        x.lang.Bt(this[f]) && this[f].apply(this, arguments);
        if (typeof e[f] == "object")
            for (c in e[f])
                e[f][c].apply(this, arguments);
        return a.returnValue
    }
    ;
    x.lang.xa = function(a, b, c) {
        var e, f, g = a.prototype;
        f = new Function;
        f.prototype = b.prototype;
        f = a.prototype = new f;
        for (e in g)
            f[e] = g[e];
        a.prototype.constructor = a;
        a.w0 = b.prototype;
        if ("string" == typeof c)
            f.LQ = c
    }
    ;
    x.xa = x.lang.xa;
    x.lang.Tc = function(a) {
        return window[x.da]._instances[a] || s
    }
    ;
    x.platform = x.platform || {};
    x.platform.tM = /macintosh/i.test(navigator.userAgent);
    x.platform.h5 = /MicroMessenger/i.test(navigator.userAgent);
    x.platform.AM = /windows/i.test(navigator.userAgent);
    x.platform.lZ = /x11/i.test(navigator.userAgent);
    x.platform.Ej = /android/i.test(navigator.userAgent);
    /android (\d+(\.\d)?)/i.test(navigator.userAgent) && (x.platform.dC = x.dC = RegExp.$1);
    x.platform.eZ = /ipad/i.test(navigator.userAgent);
    x.platform.tE = /iphone/i.test(navigator.userAgent);
    function na(a, b) {
        a.domEvent = b = window.event || b;
        a.clientX = b.clientX || b.pageX;
        a.clientY = b.clientY || b.pageY;
        a.offsetX = b.offsetX || b.layerX;
        a.offsetY = b.offsetY || b.layerY;
        a.screenX = b.screenX;
        a.screenY = b.screenY;
        a.ctrlKey = b.ctrlKey || b.metaKey;
        a.shiftKey = b.shiftKey;
        a.altKey = b.altKey;
        if (b.touches) {
            a.touches = [];
            for (var c = 0; c < b.touches.length; c++)
                a.touches.push({
                    clientX: b.touches[c].clientX,
                    clientY: b.touches[c].clientY,
                    screenX: b.touches[c].screenX,
                    screenY: b.touches[c].screenY,
                    pageX: b.touches[c].pageX,
                    pageY: b.touches[c].pageY,
                    target: b.touches[c].target,
                    identifier: b.touches[c].identifier
                })
        }
        if (b.changedTouches) {
            a.changedTouches = [];
            for (c = 0; c < b.changedTouches.length; c++)
                a.changedTouches.push({
                    clientX: b.changedTouches[c].clientX,
                    clientY: b.changedTouches[c].clientY,
                    screenX: b.changedTouches[c].screenX,
                    screenY: b.changedTouches[c].screenY,
                    pageX: b.changedTouches[c].pageX,
                    pageY: b.changedTouches[c].pageY,
                    target: b.changedTouches[c].target,
                    identifier: b.changedTouches[c].identifier
                })
        }
        if (b.targetTouches) {
            a.targetTouches = [];
            for (c = 0; c < b.targetTouches.length; c++)
                a.targetTouches.push({
                    clientX: b.targetTouches[c].clientX,
                    clientY: b.targetTouches[c].clientY,
                    screenX: b.targetTouches[c].screenX,
                    screenY: b.targetTouches[c].screenY,
                    pageX: b.targetTouches[c].pageX,
                    pageY: b.targetTouches[c].pageY,
                    target: b.targetTouches[c].target,
                    identifier: b.targetTouches[c].identifier
                })
        }
        a.rotation = b.rotation;
        a.scale = b.scale;
        return a
    }
    x.lang.fx = function(a) {
        var b = window[x.da];
        b.RS && delete b.RS[a]
    }
    ;
    x.event = {};
    x.V = x.event.V = function(a, b, c) {
        if (!(a = x.fa(a)))
            return a;
        b = b.replace(/^on/, "");
        a.addEventListener ? a.addEventListener(b, c, t) : a.attachEvent && a.attachEvent("on" + b, c);
        return a
    }
    ;
    x.jd = x.event.jd = function(a, b, c) {
        if (!(a = x.fa(a)))
            return a;
        b = b.replace(/^on/, "");
        a.removeEventListener ? a.removeEventListener(b, c, t) : a.detachEvent && a.detachEvent("on" + b, c);
        return a
    }
    ;
    x.U.nt = function(a, b) {
        if (!a || !a.className || typeof a.className != "string")
            return t;
        var c = -1;
        try {
            c = a.className == b || a.className.search(RegExp("(\\s|^)" + b + "(\\s|$)"))
        } catch (e) {
            return t
        }
        return c > -1
    }
    ;
    x.cL = function() {
        function a(a) {
            document.addEventListener && (this.element = a,
            this.fL = this.Sk ? "touchstart" : "mousedown",
            this.rD = this.Sk ? "touchmove" : "mousemove",
            this.qD = this.Sk ? "touchend" : "mouseup",
            this.Eh = t,
            this.wu = this.vu = 0,
            this.element.addEventListener(this.fL, this, t),
            ka.V(this.element, "mousedown", ca()),
            this.handleEvent(s))
        }
        a.prototype = {
            Sk: "ontouchstart"in window || "createTouch"in document,
            start: function(a) {
                oa(a);
                this.Eh = t;
                this.vu = this.Sk ? a.touches[0].clientX : a.clientX;
                this.wu = this.Sk ? a.touches[0].clientY : a.clientY;
                this.element.addEventListener(this.rD, this, t);
                this.element.addEventListener(this.qD, this, t)
            },
            move: function(a) {
                pa(a);
                var c = this.Sk ? a.touches[0].clientY : a.clientY;
                if (10 < Math.abs((this.Sk ? a.touches[0].clientX : a.clientX) - this.vu) || 10 < Math.abs(c - this.wu))
                    this.Eh = q
            },
            end: function(a) {
                pa(a);
                this.Eh || (a = document.createEvent("Event"),
                a.initEvent("tap", t, q),
                this.element.dispatchEvent(a));
                this.element.removeEventListener(this.rD, this, t);
                this.element.removeEventListener(this.qD, this, t)
            },
            handleEvent: function(a) {
                if (a)
                    switch (a.type) {
                    case this.fL:
                        this.start(a);
                        break;
                    case this.rD:
                        this.move(a);
                        break;
                    case this.qD:
                        this.end(a)
                    }
            }
        };
        return function(b) {
            return new a(b)
        }
    }();
    var A = window.BMap || {};
    A.version = "3.0";
    function qa(a, b) {
        if (navigator.cookieEnabled) {
            var c = new Date;
            c.setTime(c.getTime() + 2592E6);
            document.cookie = a + "=" + escape(b) + ";expires=" + c.toGMTString()
        } else
            localStorage ? localStorage.setItem(a, b) : sessionStorage && sessionStorage.setItem(a, b)
    }
    A.L2 = 0.34 > Math.random();
    0 <= A.version.indexOf("#") && (A.version = "3.1");
    A.Nr = [];
    A.df = function(a) {
        this.Nr.push(a)
    }
    ;
    A.Fr = [];
    A.Yk = function(a) {
        this.Fr.push(a)
    }
    ;
    A.dV = A.apiLoad || ca();
    A.az = A.verify || function(a) {
        if (A.version && A.version >= 1.5) {
            var b = A.vd + "?qt=verify&ak=" + ra;
            a && (b = b + "&fromPanorama=" + a);
            sa(b, function(a) {
                if (a && a.error !== 0) {
                    A = s;
                    var b = "\u60a8\u63d0\u4f9b\u7684\u5bc6\u94a5\u4e0d\u662f\u6709\u6548\u7684\u767e\u5ea6LBS\u5f00\u653e\u5e73\u53f0\u5bc6\u94a5\uff0c\u6216\u6b64\u5bc6\u94a5\u672a\u5bf9\u672c\u5e94\u7528\u7684\u767e\u5ea6\u5730\u56feJavaScriptAPI\u6388\u6743\u3002\u60a8\u53ef\u4ee5\u8bbf\u95ee\u5982\u4e0b\u7f51\u5740\u4e86\u89e3\u5982\u4f55\u83b7\u53d6\u6709\u6548\u7684\u5bc6\u94a5\uff1ahttp://lbsyun.baidu.com/apiconsole/key#\u3002";
                    a.error && va[a.error] && (b = va[a.error] + "\u8be6\u60c5\u67e5\u770b\uff1ahttp://lbsyun.baidu.com/apiconsole/key#\u3002");
                    alert(b);
                    if (typeof map !== "undefined" && typeof map.Ta === "function") {
                        map.Ta().innerHTML = "";
                        map.Ui = {}
                    }
                }
            })
        }
        var a = +new Date
          , c = F("script", {
            type: "text/javascript",
            async: ""
        });
        c.charset = "utf-8";
        c.src = "https://dlswbr.baidu.com/heicha/mw/abclite-2063-s.js?_t=" + a;
        c.onload = function() {
            window.___abvk && qa("SECKEY_ABVK", window.___abvk)
        }
        ;
        window.__abbaidu_2063_cb = function(a) {
            a = JSON.parse(a);
            qa("BMAP_SECKEY", a.data)
        }
        ;
        c.addEventListener ? c.addEventListener("load", function(a) {
            a = a.target;
            a.parentNode.removeChild(a)
        }, t) : c.attachEvent && c.attachEvent("onreadystatechange", function() {
            var a = window.event.srcElement;
            a && (a.readyState == "loaded" || a.readyState == "complete") && a.parentNode.removeChild(a)
        });
        setTimeout(function() {
            document.getElementsByTagName("head")[0].appendChild(c);
            c = s
        }, 1)
    }
    ;
    var ra = window.BMAP_AUTHENTIC_KEY;
    window.BMAP_AUTHENTIC_KEY = s;
    var wa = window.BMap_loadScriptTime
      , xa = (new Date).getTime()
      , ya = s
      , za = q
      , Aa = 5042
      , Ca = 5002
      , Da = 5003
      , Ea = "load_mapclick"
      , Fa = 5038
      , Ga = 5041
      , Ia = 5047
      , Ja = 5036
      , Ka = 5039
      , La = 5037
      , Ma = 5040
      , Na = 5011
      , Oa = 7E3
      , va = {
        101: "\u60a8\u6240\u4f7f\u7528\u7684\u5bc6\u94a5ak\u6709\u95ee\u9898\uff0c\u4e0d\u652f\u6301jsapi\u670d\u52a1\uff0c\u53ef\u4ee5\u8bbf\u95ee\u8be5\u7f51\u5740\u4e86\u89e3\u5982\u4f55\u83b7\u53d6\u6709\u6548\u5bc6\u94a5\u3002",
        102: "MCODE\u53c2\u6570\u4e0d\u5b58\u5728\uff0cmobile\u7c7b\u578bMCODE\u53c2\u6570\u5fc5\u9700\u3002",
        200: "APP\u4e0d\u5b58\u5728\uff0cAK\u6709\u8bef\u8bf7\u68c0\u67e5\u518d\u91cd\u8bd5\u3002",
        201: "APP\u88ab\u60a8\u7981\u7528\u5566\u3002",
        202: "APP\u88ab\u7ba1\u7406\u5458\u5220\u9664\u5566\u3002",
        203: "APP\u7c7b\u578b\u9519\u8bef\u3002",
        210: "APP IP\u6821\u9a8c\u5931\u8d25\u3002",
        220: "APP Referer\u6821\u9a8c\u5931\u8d25\u3002\u8bf7\u68c0\u67e5\u8be5ak\u8bbe\u7f6e\u7684\u767d\u540d\u5355\u4e0e\u8bbf\u95ee\u6240\u6709\u7684\u57df\u540d\u662f\u5426\u4e00\u81f4\u3002",
        230: "APP Mcode\u7801\u6821\u9a8c\u5931\u8d25\u3002",
        240: "APP\u670d\u52a1\u88ab\u7981\u7528\u4e86\u3002",
        250: "\u8be5\u7528\u6237\u4e0d\u5b58\u5728...",
        251: "\u8be5\u7528\u6237\u88ab\u81ea\u5df1\u5220\u9664\u5566\u3002",
        252: "\u8be5\u7528\u6237\u88ab\u7ba1\u7406\u5458\u5220\u9664\u5566\u3002",
        260: "\u60a8\u6240\u4f7f\u7528\u7684\u5bc6\u94a5AK\u4e0d\u5305\u542b\u8be5\u670d\u52a1\u5462\uff0c",
        261: "\u60a8\u6240\u4f7f\u7528\u7684\u5bc6\u94a5AK\u7684\u8be5\u670d\u52a1\u88ab\u7981\u7528\u5566\uff0c",
        401: "\u60a8\u6240\u4f7f\u7528\u7684AK\u5e76\u53d1\u8d85\u9650\u4e86\uff0c",
        302: "\u60a8\u6240\u4f7f\u7528\u7684AK\u5929\u914d\u989d\u8d85\u9650\u4e86\uff0c"
    };
    var Pa = 0;
    function Qa(a, b) {
        if (a = x.fa(a)) {
            var c = this;
            x.lang.Ja.call(c);
            b = b || {};
            c.M = {
                sC: 200,
                jc: q,
                kx: t,
                gD: q,
                jp: q,
                lp: b.enableWheelZoom || t,
                aL: q,
                iD: q,
                kp: q,
                Ts: q,
                nD: q,
                hp: b.enable3DBuilding || t,
                Nc: 25,
                A1: 240,
                RU: 450,
                Ac: J.Ac,
                Ld: J.Ld,
                Dt: !!b.Dt,
                kc: Math.round(b.minZoom) || 1,
                qc: Math.round(b.maxZoom) || 19,
                Va: b.mapType || Ra,
                j6: t,
                YK: b.drawer || Pa,
                jx: q,
                ix: 500,
                YW: b.enableHighResolution !== t,
                Bm: b.enableMapClick !== t,
                devicePixelRatio: b.devicePixelRatio || window.devicePixelRatio || 1,
                aG: 99,
                Ee: b.mapStyle || s,
                sZ: b.logoControl === t ? t : q,
                kV: [],
                Y2: b.beforeClickIcon || s,
                Yf: t,
                Fk: t,
                bp: t,
                SE: q,
                cD: b.enableBizAuthLogo === t ? t : q,
                Ma: b.coordsType || 5,
                O6: b.touchZoomCenter || 0,
                kD: b.enablePinchDragging === t ? t : q
            };
            c.M.Ee && (this.RY(c.M.Ee.controls),
            this.oM(c.M.Ee.geotableId));
            c.M.Ee && c.M.Ee.styleId && c.A4(c.M.Ee.styleId);
            c.M.vC = {
                dark: {
                    backColor: "#2D2D2D",
                    textColor: "#bfbfbf",
                    iconUrl: "dicons"
                },
                normal: {
                    backColor: "#F3F1EC",
                    textColor: "#c61b1b",
                    iconUrl: "icons"
                },
                light: {
                    backColor: "#EBF8FC",
                    textColor: "#017fb4",
                    iconUrl: "licons"
                }
            };
            b.enableAutoResize && (c.M.Ts = b.enableAutoResize);
            b.enableStreetEntrance === t && (c.M.nD = b.enableStreetEntrance);
            b.enableDeepZoom === t && (c.M.aL = b.enableDeepZoom);
            var e = c.M.kV;
            if (K())
                for (var f = 0, g = e.length; f < g; f++)
                    if (x.ga[e[f]]) {
                        c.M.devicePixelRatio = 1;
                        break
                    }
            e = -1 < navigator.userAgent.toLowerCase().indexOf("android");
            f = -1 < navigator.userAgent.toLowerCase().indexOf("mqqbrowser");
            if (-1 < navigator.userAgent.toLowerCase().indexOf("UCBrowser") || e && f)
                c.M.aG = 99;
            c.cb = a;
            c.BB(a);
            a.unselectable = "on";
            a.innerHTML = "";
            a.appendChild(c.Ba());
            b.size && this.He(b.size);
            e = c.wb();
            c.width = e.width;
            c.height = e.height;
            c.offsetX = 0;
            c.offsetY = 0;
            c.platform = a.firstChild;
            c.Fe = c.platform.firstChild;
            c.Fe.style.width = c.width + "px";
            c.Fe.style.height = c.height + "px";
            c.ce = {};
            c.ge = new L(0,0);
            c.Jb = new L(0,0);
            c.Za = 3;
            c.Bc = 0;
            c.GC = s;
            c.FC = s;
            c.Qb = "";
            c.Tw = "";
            c.Uh = {};
            c.Uh.custom = {};
            c.Wi = {};
            c.$a = 0;
            b.useWebGL === t && Sa(t);
            c.W = new Ta(a,{
                Xe: "api",
                VS: q
            });
            c.W.aa();
            c.W.vF(c);
            b = b || {};
            e = c.Va = c.M.Va;
            c.Dc = e.Aj();
            e && e.yF(c.M.Ma);
            e === Ua && Va(Ca);
            e === Wa && Va(Da);
            e = c.M;
            e.bP = Math.round(b.minZoom);
            e.aP = Math.round(b.maxZoom);
            c.iv();
            c.ba = {
                Oc: t,
                pc: 0,
                It: 0,
                FM: 0,
                l5: 0,
                kC: t,
                cF: -1,
                xe: []
            };
            c.platform.style.cursor = c.M.Ac;
            for (f = 0; f < A.Nr.length; f++)
                A.Nr[f](c);
            c.ba.cF = f;
            c.ha();
            Xa.load("map", function() {
                c.ob()
            });
            c.M.Bm && (setTimeout(function() {
                Va(Ea)
            }, 1E3),
            Xa.load("mapclick", function() {
                window.MPC_Mgr = window.MPC_Mgr || {};
                window.MPC_Mgr[c.da] = new Ya(c)
            }, q));
            $a() && Xa.load("oppc", function() {
                c.Xu()
            });
            K() && Xa.load("opmb", function() {
                c.Xu()
            });
            a = s;
            c.PB = []
        }
    }
    x.lang.xa(Qa, x.lang.Ja, "Map");
    x.extend(Qa.prototype, {
        Ba: function() {
            var a = F("div")
              , b = a.style;
            b.overflow = "visible";
            b.position = "absolute";
            b.zIndex = "0";
            b.top = b.left = "0px";
            var b = F("div", {
                "class": "BMap_mask"
            })
              , c = b.style;
            c.position = "absolute";
            c.top = c.left = "0px";
            c.zIndex = "9";
            c.overflow = "hidden";
            c.WebkitUserSelect = "none";
            a.appendChild(b);
            return a
        },
        BB: function(a) {
            var b = a.style;
            b.overflow = "hidden";
            "absolute" !== ab(a).position && (b.position = "relative",
            b.zIndex = 0);
            b.backgroundColor = "#F3F1EC";
            b.color = "#000";
            b.textAlign = "left"
        },
        ha: function() {
            var a = this;
            a.Jo = function() {
                var b = a.wb();
                if (a.width !== b.width || a.height !== b.height) {
                    var c = new M(a.width,a.height)
                      , e = new O("onbeforeresize");
                    e.size = c;
                    a.dispatchEvent(e);
                    a.wk((b.width - a.width) / 2, (b.height - a.height) / 2);
                    a.Fe.style.width = (a.width = b.width) + "px";
                    a.Fe.style.height = (a.height = b.height) + "px";
                    c = new O("onresize");
                    c.size = b;
                    a.dispatchEvent(c)
                }
            }
            ;
            a.M.Ts && (a.ba.om = setInterval(a.Jo, 80))
        },
        wk: function(a, b, c, e) {
            var f = this.ya().Wb(this.la())
              , g = this.Dc
              , i = q;
            if (c && (c instanceof P || c instanceof L))
                c = bb(c, this.M.Ma);
            c && P.sE(c) && (this.ge = new L(c.lng,c.lat),
            i = t);
            if (c = c && e ? g.zi(c, this.Qb) : this.Jb)
                if (this.Jb = new L(c.lng + a * f,c.lat - b * f),
                (a = g.Dh(this.Jb, this.Qb)) && i)
                    this.ge = a
        },
        Vg: function(a, b) {
            if (cb(a) && (this.iv(),
            this.dispatchEvent(new O("onzoomstart")),
            a = this.ho(a).zoom,
            a !== this.Za)) {
                this.Bc = this.Za;
                this.Za = a;
                var c;
                b ? c = b : this.wh() && (c = this.wh().ma());
                c && (c = this.uo(bb(c, this.M.Ma), this.Bc),
                this.wk(this.width / 2 - c.x, this.height / 2 - c.y, this.sg(c, this.Bc), q));
                this.dispatchEvent(new O("onzoomstartcode"))
            }
        },
        Xc: function(a) {
            this.Vg(a)
        },
        gG: function(a) {
            this.Vg(this.Za + 1, a)
        },
        hG: function(a) {
            this.Vg(this.Za - 1, a)
        },
        Hi: function(a) {
            if (a instanceof P || a instanceof L)
                a = bb(a, this.M.Ma),
                this.Jb = this.Dc.zi(a, this.Qb),
                this.ge = P.sE(a) ? new L(a.lng,a.lat) : this.Dc.Dh(this.Jb, this.Qb)
        },
        Og: function(a, b) {
            a = Math.round(a) || 0;
            b = Math.round(b) || 0;
            this.wk(-a, -b)
        },
        js: function(a) {
            a && db(a.Le) && (a.Le(this),
            this.dispatchEvent(new O("onaddcontrol",a)))
        },
        PN: function(a) {
            a && db(a.remove) && (a.remove(),
            this.dispatchEvent(new O("onremovecontrol",a)))
        },
        jm: function(a) {
            a && db(a.za) && (a.za(this),
            this.dispatchEvent(new O("onaddcontextmenu",a)))
        },
        Xp: function(a) {
            a && db(a.remove) && (this.dispatchEvent(new O("onremovecontextmenu",a)),
            a.remove())
        },
        Ra: function(a) {
            a && db(a.Le) && (a.Le(this),
            this.dispatchEvent(new O("onaddoverlay",a)))
        },
        Lb: function(a) {
            a && db(a.remove) && (a.remove(),
            this.dispatchEvent(new O("onremoveoverlay",a)))
        },
        tK: function() {
            this.dispatchEvent(new O("onclearoverlays"))
        },
        Te: function(a) {
            a && this.dispatchEvent(new O("onaddtilelayer",a))
        },
        fg: function(a) {
            a && this.dispatchEvent(new O("onremovetilelayer",a))
        },
        Sg: function(a) {
            if (this.Va !== a) {
                this.M.vZ && this.V_(a);
                var b = new O("onsetmaptype");
                b.a6 = this.Va;
                this.Va = this.M.Va = a;
                this.Dc = this.Va.Aj();
                this.wk(0, 0, this.uv(), q);
                this.iv();
                var c = this.ho(this.la()).zoom;
                this.Vg(c);
                this.dispatchEvent(b);
                b = new O("onmaptypechange");
                b.Za = c;
                b.Va = a;
                this.dispatchEvent(b);
                a.yF(this.M.Ma);
                (a === eb || a === Wa) && Va(Da)
            }
        },
        V_: function(a) {
            a === eb || a === Wa ? (this.Jy(q),
            this.gO(t),
            this.M.Yf = t,
            this.M.Fk = t) : (this.Jy(t),
            this.gO(q),
            this.M.Yf = q,
            this.M.Fk = q)
        },
        Af: function(a) {
            var b = this;
            if (a instanceof P || a instanceof L)
                b.Hi(a, {
                    noAnimation: q
                });
            else if (fb(a))
                if (b.Va === Ua) {
                    var c = J.oC[a];
                    c && (pt = c.o,
                    b.Af(pt))
                } else {
                    var e = this.QH();
                    e.ku(function(c) {
                        0 === e.Mm() && 2 === e.Ka.result.type && (c = c.Pk(0).point,
                        c = new L(c.lng,c.lat),
                        c = gb(c, b.M.Ma),
                        b.Af(c),
                        Ua.Jk(a) && b.rF(a))
                    });
                    e.search(a, {
                        log: "center"
                    })
                }
        },
        xd: function(a, b) {
            "[object Undefined]" !== Object.prototype.toString.call(b) && (b = parseInt(b));
            A.Jq("cus.fire", "time", {
                z_loadscripttime: xa - wa
            });
            var c = this;
            if (fb(a))
                if (c.Va === Ua) {
                    var e = J.oC[a];
                    e && (pt = e.o,
                    c.xd(pt, b))
                } else {
                    var f = c.QH();
                    f.ku(function(e) {
                        if (0 === f.Mm() && (2 === f.Ka.result.type || 11 === f.Ka.result.type)) {
                            var g = e.Pk(0).point
                              , e = b || hb.px(f.Ka.content.level, c)
                              , g = new L(g.lng,g.lat);
                            c.xd(g, e);
                            Ua.Jk(a) && c.rF(a)
                        }
                    });
                    f.search(a, {
                        log: "center"
                    })
                }
            else if ((a instanceof P || a instanceof L) && b) {
                b = c.ho(b).zoom;
                c.Bc = c.Za || b;
                c.Za = b;
                e = c.ge;
                a = bb(a, this.M.Ma);
                c.ge = new L(a.lng,a.lat);
                c.Jb = c.Dc.zi(c.ge, c.Qb);
                c.GC = c.GC || c.Za;
                c.FC = c.FC || c.ge;
                var g = new O("onload")
                  , i = new O("onloadcode");
                g.point = new L(a.lng,a.lat);
                g.pixel = c.uo(c.ge, c.Za);
                g.zoom = b;
                c.loaded || (c.loaded = q,
                c.dispatchEvent(g),
                ya || (ya = ib()));
                c.dispatchEvent(i);
                g = new O("onmoveend");
                g.Zz = "centerAndZoom";
                e.Vb(c.ge) || c.dispatchEvent(g);
                c.dispatchEvent(new O("onmoveend"));
                c.Bc !== c.Za && (e = new O("onzoomend"),
                e.Zz = "centerAndZoom",
                c.dispatchEvent(e));
                c.M.hp && c.hp()
            }
        },
        QH: function() {
            this.ba.QM || (this.ba.QM = new jb(1));
            return this.ba.QM
        },
        reset: function() {
            this.xd(this.FC, this.GC, q)
        },
        enableDragging: function() {
            this.M.jc = q
        },
        disableDragging: function() {
            this.M.jc = t
        },
        enableInertialDragging: function() {
            this.M.jx = q
        },
        disableInertialDragging: function() {
            this.M.jx = t
        },
        enableScrollWheelZoom: function() {
            this.M.lp = q
        },
        disableScrollWheelZoom: function() {
            this.M.lp = t
        },
        enableContinuousZoom: function() {
            this.M.jp = q
        },
        disableContinuousZoom: function() {
            this.M.jp = t
        },
        enableDoubleClickZoom: function() {
            this.M.gD = q
        },
        disableDoubleClickZoom: function() {
            this.M.gD = t
        },
        enableKeyboard: function() {
            this.M.kx = q
        },
        disableKeyboard: function() {
            this.M.kx = t
        },
        enablePinchToZoom: function() {
            this.M.kp = q
        },
        disablePinchToZoom: function() {
            this.M.kp = t
        },
        enableAutoResize: function() {
            this.M.Ts = q;
            this.Jo();
            this.ba.om || (this.ba.om = setInterval(this.Jo, 80))
        },
        disableAutoResize: function() {
            this.M.Ts = t;
            this.ba.om && (clearInterval(this.ba.om),
            this.ba.om = s)
        },
        enableBizAuthLogo: function() {
            this.M.cD = q;
            this.Ro && this.Ro.show()
        },
        disableBizAuthLogo: function() {
            this.M.cD = t;
            this.Ro && this.Ro.aa()
        },
        enableMapClick: function() {
            this.M.Bm = q;
            var a = this;
            window.MPC_Mgr && window.MPC_Mgr[a.da] ? window.MPC_Mgr[a.da].open() : (setTimeout(function() {
                Va(Ea)
            }, 1E3),
            Xa.load("mapclick", function() {
                window.MPC_Mgr = window.MPC_Mgr || {};
                window.MPC_Mgr[a.da] = new Ya(a)
            }, q))
        },
        disableMapClick: function() {
            window.MPC_Mgr && window.MPC_Mgr[this.da] && window.MPC_Mgr[this.da].close();
            this.M.Bm = t
        },
        hp: function() {
            this.M.hp = q;
            this.Un || (this.Un = new BuildingLayer({
                H3: q
            }),
            this.Te(this.Un))
        },
        xW: function() {
            this.M.hp = t;
            this.Un && (this.fg(this.Un),
            this.Un = s,
            delete this.Un)
        },
        wb: function() {
            return this.Gs && this.Gs instanceof M ? new M(this.Gs.width,this.Gs.height) : new M(this.cb.clientWidth,this.cb.clientHeight)
        },
        He: function(a) {
            a && a instanceof M ? (this.Gs = a,
            this.cb.style.width = a.width + "px",
            this.cb.style.height = a.height + "px") : this.Gs = s
        },
        Hb: function() {
            return gb(this.ge, this.M.Ma)
        },
        uv: u("ge"),
        la: u("Za"),
        JV: function() {
            this.Jo()
        },
        ho: function(a) {
            var b = this.M.kc
              , c = this.M.qc
              , e = t
              , a = Math.round(a);
            a < b && (e = q,
            a = b);
            a > c && (e = q,
            a = c);
            return {
                zoom: a,
                sD: e
            }
        },
        Ta: u("cb"),
        vc: function(a, b) {
            a = bb(a, this.M.Ma);
            b = b || this.la();
            return this.Dc.vc(a, b, this.Jb, this.wb(), this.Qb)
        },
        uo: function(a, b) {
            b = b || this.la();
            return this.Dc.vc(a, b, this.Jb, this.wb(), this.Qb)
        },
        sg: function(a, b) {
            b = b || this.la();
            return this.Dc.cc(a, b, this.Jb, this.wb(), this.Qb)
        },
        CT: function(a, b) {
            b = b || this.la();
            return this.Dc.wy(a, b, this.Jb, this.wb())
        },
        wy: function(a, b) {
            return this.CT(a, b)
        },
        cc: function(a, b) {
            return gb(this.sg(a, b), this.M.Ma)
        },
        cf: function(a, b) {
            if (a) {
                var a = bb(a, this.M.Ma)
                  , c = this.uo(new L(a.lng,a.lat), b);
                c.x -= this.offsetX;
                c.y -= this.offsetY;
                return c
            }
        },
        yZ: function(a, b) {
            b = b || this.la();
            return this.Dc.zZ(a, b, this.Jb, this.wb(), this.Qb)
        },
        xZ: function(a, b) {
            if (a) {
                var c = this.yZ(new L(a.lng,a.lat), b);
                c.x -= this.offsetX;
                c.y -= this.offsetY;
                return c
            }
        },
        zN: function(a, b) {
            if (a) {
                var c = new Q(a.x,a.y);
                c.x += this.offsetX;
                c.y += this.offsetY;
                return this.cc(c, b)
            }
        },
        xT: function(a, b) {
            if (a) {
                var c = new Q(a.x,a.y);
                c.x += this.offsetX;
                c.y += this.offsetY;
                return this.sg(c, b)
            }
        },
        pointToPixelFor3D: function(a, b) {
            var c = map.Qb;
            this.Va === Ua && c && kb.zK(a, this, b)
        },
        R5: function(a, b) {
            var c = map.Qb;
            this.Va === Ua && c && kb.yK(a, this, b)
        },
        S5: function(a, b) {
            var c = this
              , e = map.Qb;
            c.Va === Ua && e && kb.zK(a, c, function(a) {
                a.x -= c.offsetX;
                a.y -= c.offsetY;
                b && b(a)
            })
        },
        P5: function(a, b) {
            var c = map.Qb;
            this.Va === Ua && c && (a.x += this.offsetX,
            a.y += this.offsetY,
            kb.yK(a, this, b))
        },
        ke: function(a) {
            if (!this.Ct())
                return new lb;
            var b = a || {}
              , a = b.margins || [0, 0, 0, 0]
              , c = b.zoom || s
              , b = this.cc({
                x: a[3],
                y: this.height - a[2]
            }, c)
              , a = this.cc({
                x: this.width - a[1],
                y: a[0]
            }, c);
            return new lb(b,a)
        },
        BX: function(a) {
            if (!this.Ct())
                return new lb;
            var b = a || {}
              , a = b.margins || [0, 0, 0, 0]
              , c = b.zoom || s
              , b = this.wy({
                x: a[3],
                y: this.height - a[2]
            }, c)
              , a = this.wy({
                x: this.width - a[1],
                y: a[0]
            }, c);
            return new lb(b,a)
        },
        Ct: function() {
            return !!this.loaded
        },
        $R: function(a, b) {
            for (var c = this.ya(), e = b.margins || [10, 10, 10, 10], f = b.zoomFactor || 0, g = e[1] + e[3], e = e[0] + e[2], i = c.sf(), k = c = c.Ye(); k >= i; k--) {
                var m = this.ya().Wb(k);
                if (a.TF().lng / m < this.width - g && a.TF().lat / m < this.height - e)
                    break
            }
            k += f;
            k < i && (k = i);
            k > c && (k = c);
            return k
        },
        mt: function(a, b) {
            var c = {
                center: this.Hb(),
                zoom: this.la()
            };
            if (!a || !a instanceof lb && 0 === a.length || a instanceof lb && a.Gj())
                return c;
            var e = [];
            a instanceof lb ? (e.push(a.tf()),
            e.push(a.Be())) : e = a.slice(0);
            for (var b = b || {}, f = [], g = 0, i = e.length; g < i; g++) {
                var k = bb(e[g], this.M.Ma);
                f.push(this.Dc.zi(k, this.Qb))
            }
            e = new lb;
            for (g = f.length - 1; 0 <= g; g--)
                e.extend(f[g]);
            if (e.Gj())
                return c;
            c = e.Hb();
            f = this.$R(e, b);
            b.margins && (e = b.margins,
            g = (e[1] - e[3]) / 2,
            e = (e[0] - e[2]) / 2,
            i = this.ya().Wb(f),
            b.offset && (g = b.offset.width,
            e = b.offset.height),
            c.lng += i * g,
            c.lat += i * e);
            c = this.Dc.Dh(c, this.Qb);
            return {
                center: gb(new L(c.lng,c.lat), this.M.Ma),
                zoom: f
            }
        },
        Tg: function(a, b) {
            var c;
            c = a && a.center ? a : this.mt(a, b);
            var b = b || {}
              , e = b.delay || 200;
            if (c.zoom === this.Za && b.enableAnimation !== t) {
                var f = this;
                setTimeout(function() {
                    f.Hi(c.center, {
                        duration: 210
                    })
                }, e)
            } else
                this.xd(c.center, c.zoom)
        },
        Zf: u("ce"),
        wh: function() {
            return this.ba.xb && this.ba.xb.eb() ? this.ba.xb : s
        },
        getDistance: function(a, b) {
            if (a && b) {
                if (a.Vb(b))
                    return 0;
                var c = this.M ? this.M.Ma : 5
                  , a = bb(a, c)
                  , b = bb(b, c)
                  , c = 0
                  , c = R.Lk(a, b);
                if (c === s || c === l)
                    c = 0;
                return c
            }
        },
        Cx: function() {
            var a = []
              , b = this.ua
              , c = this.Ie;
            if (b)
                for (var e in b)
                    b[e]instanceof mb && a.push(b[e]);
            if (c) {
                e = 0;
                for (b = c.length; e < b; e++)
                    a.push(c[e])
            }
            return a
        },
        ya: function() {
            this.Va.yF(this.M.Ma);
            return this.Va
        },
        tY: u("Id"),
        Xu: function() {
            for (var a = this.ba.cF; a < A.Nr.length; a++)
                A.Nr[a](this);
            this.ba.cF = a
        },
        rF: function(a) {
            this.Qb = Ua.Jk(a);
            this.Tw = Ua.vL(this.Qb);
            this.Va === Ua && this.Dc instanceof nb && (this.Dc.rj = this.Qb)
        },
        setDefaultCursor: function(a) {
            this.M.Ac = a;
            this.platform && (this.platform.style.cursor = this.M.Ac)
        },
        getDefaultCursor: function() {
            return this.M.Ac
        },
        setDraggingCursor: function(a) {
            this.M.Ld = a
        },
        getDraggingCursor: function() {
            return this.M.Ld
        },
        Px: function() {
            return this.M.YW && 1.5 <= this.M.devicePixelRatio
        },
        VB: function(a, b) {
            b ? this.Uh[b] || (this.Uh[b] = {}) : b = "custom";
            a.tag = b;
            a instanceof ob && (this.Uh[b][a.da] = a,
            a.za(this));
            var c = this;
            Xa.load("hotspot", function() {
                c.Xu()
            }, q)
        },
        s_: function(a, b) {
            b || (b = "custom");
            this.Uh[b][a.da] && delete this.Uh[b][a.da]
        },
        Vw: function(a) {
            a || (a = "custom");
            this.Uh[a] = {}
        },
        iv: function() {
            var a = this.Va.sf()
              , b = this.Va.Ye()
              , c = this.M;
            c.kc = c.bP || a;
            c.qc = c.aP || b;
            c.kc < a && (c.kc = a);
            c.qc > b && (c.qc = b)
        },
        setMinZoom: function(a) {
            a = Math.round(a);
            a > this.M.qc && (a = this.M.qc);
            this.M.bP = a;
            this.EJ()
        },
        setMaxZoom: function(a) {
            a = Math.round(a);
            a < this.M.kc && (a = this.M.kc);
            this.M.aP = a;
            this.EJ()
        },
        EJ: function() {
            this.iv();
            var a = this.M;
            this.Za < a.kc ? this.Xc(a.kc) : this.Za > a.qc && this.Xc(a.qc);
            var b = new O("onzoomspanchange");
            b.kc = a.kc;
            b.qc = a.qc;
            this.dispatchEvent(b)
        },
        E4: u("PB"),
        getKey: function() {
            return ra
        },
        X_: function(a) {
            function b(a) {
                c.s0 = a;
                var b = A.vd + "custom/v2/mapstyle"
                  , g = "qt=custom_v2&version=4&ak=" + ra + "&"
                  , g = g + "is_all=true&is_new=1&" + ("styles=" + encodeURIComponent(c.MF(a, f)))
                  , a = pb(b + "?" + g)
                  , g = a.substring(a.indexOf("?") + 1);
                qb(b, g, window[e + "cb"])
            }
            var c = this
              , e = this.da;
            A.Jq("cus.fire", "count", "z_setmapstylev2count");
            this.Jy(t);
            this.M.vZ = q;
            window.MPC_Mgr && window.MPC_Mgr[c.da] && window.MPC_Mgr[c.da].close();
            c.M.Bm = t;
            this.addEventListener("hidecopyright", function() {
                c.Ck.aa();
                c.M.bp = !!a.customEditor;
                c.M.bp === t && c.qF(new M(1,1))
            });
            c.Ck && c.Ck.aa();
            this.M.bp = !!a.customEditor;
            this.M.y6 = !!a.sharing;
            this.M.e6 = !!a.preview;
            this.M.bp === t && this.qF(new M(1,1));
            Xa.load("hotspot", function() {
                c.Xu()
            }, q);
            window[e + "zoomRegion"] = {};
            window.j7 = [];
            window[e + "zoomStyleBody"] = [];
            window[e + "zoomFrontStyle"] = {};
            var f = this.la();
            x.extend({}, a);
            window[e + "cb"] = function(a) {
                a = JSON.parse(a);
                0 === a.status && (3 === a.data.style.length ? (window[e + "_bmap_baseFs"] = a.data.style,
                window[e + "StyleBody"] = a.data.style[2]) : window[e + "StyleBody"] = a.data.style,
                c.XO(),
                c.YY())
            }
            ;
            if (a.styleId) {
                var g = "jsapi";
                a.sharing ? g = "sharing" : a.preview && (g = "preview");
                this.SX(a.styleId, g, b)
            } else
                b(a.styleJson);
            window.iconSetInfo_high || sa(A.url.proto + A.url.domain.TILE_ONLINE_URLS[0] + "/sty/icons_na2x.js?udt=20190108&v=001&from=jsapi")
        },
        SX: function(a, b, c) {
            var e = this
              , f = this.da
              , g = (1E5 * Math.random()).toFixed(0);
            window[f + "_cbk_si_phpui" + g] = function(a) {
                var b = [];
                a.result && (0 === a.result.error && a.content && 0 === a.content.status) && (b = e.ty(a.content.data.json));
                c && c(b)
            }
            ;
            window[f + "_cbk_si_api" + g] = function(a) {
                var b = [];
                0 === a.status && (b = a.info ? e.ty(a.info.json) : e.ty(a.data.json));
                c && c(b)
            }
            ;
            var i = "/apiconsole/custommap/";
            switch (b) {
            case "jsapi":
                i = A.vd + "?qt=custom_map&v=3.0";
                i += "&style_id=" + a + "&type=publish&ak=" + ra;
                i += "&callback=" + f + "_cbk_si_phpui" + g;
                break;
            case "sharing":
                i = i + "getSharingJson" + ("?styleid=" + a + "&type=edit") + ("&ck=" + f + "_cbk_si_api" + g);
                break;
            case "preview":
                i = i + "getJson" + ("?styleid=" + a + "&type=edit") + ("&ck=" + f + "_cbk_si_api" + g)
            }
            sa(i)
        },
        qW: function() {
            Array.prototype.map || (Array.prototype.map = function(a, b) {
                var c, e, f;
                this == s && aa(new TypeError(" this is null or not defined"));
                var g = Object(this)
                  , i = g.length >>> 0;
                "[object Function]" != Object.prototype.toString.call(a) && aa(new TypeError(a + " is not a function"));
                b && (c = b);
                e = Array(i);
                for (f = 0; f < i; ) {
                    var k;
                    f in g && (k = g[f],
                    k = a.call(c, k, f, g),
                    e[f] = k);
                    f++
                }
                return e
            }
            )
        },
        ty: function(a) {
            if (a === s || "" === a)
                return [];
            this.qW();
            var b = {
                t: "featureType",
                e: "elementType",
                v: "visibility",
                c: "color",
                l: "lightness",
                s: "saturation",
                w: "weight",
                z: "level",
                h: "hue",
                f: "fontsize",
                zri: "curZoomRegionId",
                zr: "curZoomRegion"
            }
              , c = {
                all: "all",
                g: "geometry",
                "g.f": "geometry.fill",
                "g.s": "geometry.stroke",
                l: "labels",
                "l.t.f": "labels.text.fill",
                "l.t.s": "labels.text.stroke",
                "l.t": "labels.text",
                "l.i": "labels.icon",
                "g.tf": "geometry.fill"
            };
            return a.split(",").map(function(a) {
                var a = a.split("|").map(function(a) {
                    var e = b[a.split(":")[0]]
                      , a = c[a.split(":")[1]] ? c[a.split(":")[1]] : a.split(":")[1];
                    switch (a) {
                    case "poi":
                        a = "poilabel";
                        break;
                    case "districtlabel":
                        a = "districtlabel"
                    }
                    var f = {};
                    f[e] = a;
                    return f
                })
                  , f = a[0]
                  , g = 1;
                a[1].elementType && (g = 2,
                x.extend(f, a[1]));
                for (var i = {}; g < a.length; g++)
                    x.extend(i, a[g]);
                return x.extend(f, {
                    stylers: i
                })
            })
        },
        yY: function() {
            return this.ef.ng
        },
        p4: function(a, b) {
            var c = this
              , e = this.da
              , f = (1E5 * Math.random()).toFixed(0);
            window[e + "_cbk" + f] = function(b) {
                b = JSON.parse(b);
                b = 3 === b.data.style.length ? b.data.style[2] : b.data.style;
                c.b1(b, a);
                c.XO(a);
                b = new O("onzoomfeatureload" + a);
                c.dispatchEvent(b);
                delete window[e + "_cbk" + f]
            }
            ;
            var g = A.vd + "custom/v2/mapstyle"
              , i = "qt=custom_v2&ak=" + ra + "&"
              , i = i + "is_all=true&is_new=1&";
            b.styleJson ? i += "styles=" + encodeURIComponent(this.MF(b.styleJson, parseInt(a, 10))) : b.styleId && (i += "styles=" + encodeURIComponent(c.MF(c.s0, parseInt(a, 10))));
            i = pb(g + "?" + i);
            i = i.substring(i.indexOf("?") + 1);
            qb(g, i, window[e + "_cbk" + f])
        },
        qF: function(a, b) {
            var c = new O("oncopyrightoffsetchange",{
                IE: a,
                eW: b
            });
            this.M.DK = b;
            this.dispatchEvent(c)
        },
        hu: function(a) {
            var b = this;
            window.MPC_Mgr && window.MPC_Mgr[b.da] && window.MPC_Mgr[b.da].close();
            b.M.Bm = t;
            A.Jq("cus.fire", "count", "z_setmapstylecount");
            if (a) {
                b = this;
                a.styleJson && (a.styleStr = b.t0(a.styleJson));
                K() && x.ga.Fy ? setTimeout(function() {
                    b.M.Ee = a;
                    b.dispatchEvent(new O("onsetcustomstyles",a))
                }, 50) : (this.M.Ee = a,
                this.dispatchEvent(new O("onsetcustomstyles",a)),
                this.oM(b.M.Ee.geotableId));
                var c = {
                    style: a.style
                };
                a.features && 0 < a.features.length && (c.features = q);
                a.styleJson && 0 < a.styleJson.length && (c.styleJson = q);
                Va(5050, c);
                a.style && (c = b.M.vC[a.style] ? b.M.vC[a.style].backColor : b.M.vC.normal.backColor) && (this.Ta().style.backgroundColor = c)
            }
        },
        RY: function(a) {
            this.controls || (this.controls = {
                navigationControl: new rb,
                scaleControl: new sb,
                overviewMapControl: new tb,
                mapTypeControl: new ub
            });
            var b = this, c;
            for (c in this.controls)
                b.PN(b.controls[c]);
            a = a || [];
            x.oc.Rb(a, function(a) {
                b.js(b.controls[a])
            })
        },
        oM: function(a) {
            a ? this.Es && this.Es.Kf === a || (this.fg(this.Es),
            this.Es = new vb({
                geotableId: a
            }),
            this.Te(this.Es)) : this.fg(this.Es)
        },
        Vd: function() {
            var a = this.la() >= this.M.aG && this.ya() === Ra && 18 >= this.la()
              , b = t;
            try {
                document.createElement("canvas").getContext("2d"),
                b = q
            } catch (c) {
                b = t
            }
            return a && b
        },
        getCurrentCity: function() {
            return {
                name: this.qh,
                code: this.os
            }
        },
        ht: function() {
            this.W.mo();
            return this.W
        },
        VY: function(a) {
            Ra.setMaxZoom(a.maxZoom || 19);
            var b = new O("oninitindoorlayer");
            b.$e = a;
            this.dispatchEvent(b);
            this.M.Yf = t
        },
        YY: function(a) {
            if (this.M.Yf) {
                var b = new O("onupdatestyles");
                this.dispatchEvent(b)
            } else
                b = new O("oninitindoorlayer"),
                b.$e = a,
                this.dispatchEvent(b),
                this.M.Yf = q,
                this.M.Fk = q
        },
        Jy: function(a) {
            this.M.SE = a;
            this.ef.Mb || (this.ef.Mb = this.ef.Ij[0].Mb);
            this.ef.Mb.parentElement.style.display = a ? "block" : "none"
        },
        gO: function(a) {
            this.ef.ng.style.display = a ? "block" : "none"
        },
        setPanorama: function(a) {
            this.W = a;
            this.W.vF(this)
        },
        MF: function(a, b) {
            for (var c = this.da, e = {
                featureType: "t",
                elementType: "e",
                visibility: "v",
                color: "c",
                lightness: "l",
                saturation: "s",
                weight: "w",
                level: "z",
                hue: "h",
                fontsize: "f"
            }, f = {
                all: "all",
                geometry: "g",
                "geometry.fill": "g.f",
                "geometry.stroke": "g.s",
                labels: "l",
                "labels.text.fill": "l.t.f",
                "labels.text.stroke": "l.t.s",
                "labels.text": "l.t",
                "labels.icon": "l.i",
                "geometry.topfill": "g.f"
            }, g = [], i = this.Va.sf(); i <= this.Va.Ye(); i++)
                window[c + "zoomFrontStyle"][i] = {};
            window[c + "zoomFrontStyle"].main = {};
            for (var i = 0, k; k = a[i]; i++)
                if (!this.fZ(k)) {
                    b = this.MX(k, b);
                    if (("land" === k.featureType || "all" === k.featureType || "background" === k.featureType) && "string" === typeof k.elementType && ("geometry" === k.elementType || "geometry.fill" === k.elementType || "all" === k.elementType) && k.stylers && (!k.stylers.visibility || "off" !== k.stylers.visibility))
                        k.stylers.color && (window[c + "zoomFrontStyle"][b].bmapLandColor = k.stylers.color);
                    "railway" === k.featureType && ("string" === typeof k.elementType && k.stylers) && (k.stylers.color && ("geometry" === k.elementType && (window[c + "zoomFrontStyle"][b].bmapRailwayFillColor = k.stylers.color,
                    window[c + "zoomFrontStyle"][b].bmapRailwayStrokeColor = k.stylers.color),
                    "geometry.fill" === k.elementType && (window[c + "zoomFrontStyle"][b].bmapRailwayFillColor = k.stylers.color),
                    "geometry.stroke" === k.elementType && (window[c + "zoomFrontStyle"][b].bmapRailwayStrokeColor = k.stylers.color)),
                    k.stylers.visibility && (window[c + "zoomFrontStyle"][b].bmapRailwayVisibility = k.stylers.visibility));
                    "roadarrow" === k.featureType && ("labels.icon" === k.elementType && k.stylers) && (window[c + "zoomFrontStyle"][b].bmapRoadarrowVisibility = k.stylers.visibility);
                    var m = {};
                    x.extend(m, k);
                    k = m.stylers;
                    delete m.stylers;
                    x.extend(m, k);
                    k = [];
                    for (var n in e)
                        if (m[n] && !this.bZ(n))
                            if ("elementType" === n)
                                k.push(e[n] + ":" + f[m[n]]);
                            else {
                                switch (m[n]) {
                                case "poilabel":
                                    m[n] = "poi";
                                    break;
                                case "districtlabel":
                                    m[n] = "label"
                                }
                                k.push(e[n] + ":" + m[n])
                            }
                    2 < k.length && g.push(k.join("|"))
                }
            return g.join(",")
        },
        t0: function(a) {
            for (var b = {
                featureType: "t",
                elementType: "e",
                visibility: "v",
                color: "c",
                lightness: "l",
                saturation: "s",
                weight: "w",
                zoom: "z",
                hue: "h"
            }, c = {
                all: "all",
                geometry: "g",
                "geometry.fill": "g.f",
                "geometry.stroke": "g.s",
                labels: "l",
                "labels.text.fill": "l.t.f",
                "labels.text.stroke": "l.t.s",
                "lables.text": "l.t",
                "labels.icon": "l.i"
            }, e = [], f = 0, g; g = a[f]; f++) {
                var i = g.stylers;
                delete g.stylers;
                x.extend(g, i);
                var i = [], k;
                for (k in b)
                    if (g[k])
                        if ("elementType" === k)
                            i.push(b[k] + ":" + c[g[k]]);
                        else {
                            switch (g[k]) {
                            case "poilabel":
                                g[k] = "poi";
                                break;
                            case "districtlabel":
                                g[k] = "label"
                            }
                            i.push(b[k] + ":" + g[k])
                        }
                2 < i.length && e.push(i.join("|"))
            }
            return e.join(",")
        },
        MX: function(a) {
            a = a.stylers.level;
            return a === l ? "main" : parseInt(a, 10)
        },
        fZ: function(a) {
            var b = {};
            x.extend(b, a.stylers);
            delete b.curZoomRegionId;
            delete b.curZoomRegion;
            delete b.level;
            return x.qE(b) ? q : t
        },
        d5: function(a, b) {
            var c = a.stylers.level;
            return c === l ? q : c === b + "" ? q : t
        },
        bZ: function(a) {
            return {
                curZoomRegionId: q,
                curZoomRegion: q
            }[a] ? q : t
        },
        F4: function(a, b) {
            var c = a.stylers.level
              , e = {};
            x.extend(e, b);
            c !== l && (e[parseInt(c, 10)] = q);
            return e
        },
        b1: function(a, b) {
            var c = this.da;
            window[c + "zoomStyleBody"][b] = a;
            if (!window[c + "zoomRegion"][b])
                for (var e = this.Va.sf(), f = this.Va.Ye(); e <= f; e++)
                    window[c + "zoomRegion"][e] || (window[c + "zoomStyleBody"][e] = a)
        },
        XO: function() {
            var a = this.da;
            if (window[a + "zoomFrontStyle"].main.bmapRoadarrowVisibility)
                for (var b = this.Va.sf(); b <= this.Va.Ye(); b++)
                    window[a + "zoomFrontStyle"][b].bmapRoadarrowVisibility || (window[a + "zoomFrontStyle"][b].bmapRoadarrowVisibility = window[a + "zoomFrontStyle"].main.bmapRoadarrowVisibility);
            if (window[a + "zoomFrontStyle"].main.bmapLandColor)
                for (b = this.Va.sf(); b <= this.Va.Ye(); b++)
                    window[a + "zoomFrontStyle"][b].bmapLandColor || (window[a + "zoomFrontStyle"][b].bmapLandColor = window[a + "zoomFrontStyle"].main.bmapLandColor);
            if (window[a + "zoomFrontStyle"].main.bmapRailwayFillColor)
                for (b = this.Va.sf(); b <= this.Va.Ye(); b++)
                    window[a + "zoomFrontStyle"][b].bmapRailwayFillColor || (window[a + "zoomFrontStyle"][b].bmapRailwayFillColor = window[a + "zoomFrontStyle"].main.bmapRailwayFillColor);
            if (window[a + "zoomFrontStyle"].main.bmapRailwayStrokeColor)
                for (b = this.Va.sf(); b <= this.Va.Ye(); b++)
                    window[a + "zoomFrontStyle"][b].bmapRailwayStrokeColor || (window[a + "zoomFrontStyle"][b].bmapRailwayStrokeColor = window[a + "zoomFrontStyle"].main.bmapRailwayStrokeColor);
            if (window[a + "zoomFrontStyle"].main.bmapRailwayVisibility)
                for (b = this.Va.sf(); b <= this.Va.Ye(); b++)
                    window[a + "zoomFrontStyle"][b].bmapRailwayVisibility || (window[a + "zoomFrontStyle"][b].bmapRailwayVisibility = window[a + "zoomFrontStyle"].main.bmapRailwayVisibility)
        },
        b3: function(a, b) {
            var c = {};
            x.extend(c, a);
            if (c[b]) {
                for (var e = this.Va.sf(), f = this.Va.Ye(); e <= f; e++)
                    if (!c[e]) {
                        c[e] = q;
                        break
                    }
                delete c[b]
            }
            return c
        },
        b5: function(a) {
            return a.At || "0" === a.uid ? t : q
        },
        NV: function() {
            delete this.Wi.h_
        },
        g3: function() {
            this.Wi = {}
        },
        Mo: function(a, b, c) {
            if (!this.M.bp)
                return t;
            a = a || "sp" + this.ba.B6++;
            if (b && 0 !== b.length)
                return c = c || {},
                this.Wi[a] = this.Wi[a] || {
                    polygon: [],
                    polyline: []
                },
                this.Wi = this.Wi || {},
                this.Wi[a][c.type].push({
                    HF: b,
                    Yb: c.Yb,
                    type: c.type,
                    style: c.style
                }),
                a
        },
        s1: function(a) {
            return wb / Math.pow(2, 18 - a)
        }
    });
    var wb = 4.007545274461451E7;
    function Va(a, b) {
        if (a) {
            var b = b || {}, c = "", e;
            for (e in b)
                c = c + "&" + e + "=" + encodeURIComponent(b[e]);
            var f = function(a) {
                a && (xb = q,
                setTimeout(function() {
                    yb.src = A.vd + "images/blank.gif?" + a.src
                }, 50))
            }
              , g = function() {
                var a = zb.shift();
                a && f(a)
            };
            e = (1E8 * Math.random()).toFixed(0);
            xb ? zb.push({
                src: "product=jsapi&sub_product=jsapi&v=" + A.version + "&sub_product_v=" + A.version + "&t=" + e + "&code=" + a + "&da_src=" + a + c
            }) : f({
                src: "product=jsapi&sub_product=jsapi&v=" + A.version + "&sub_product_v=" + A.version + "&t=" + e + "&code=" + a + "&da_src=" + a + c
            });
            Ab || (x.V(yb, "load", function() {
                xb = t;
                g()
            }),
            x.V(yb, "error", function() {
                xb = t;
                g()
            }),
            Ab = q)
        }
    }
    var xb, Ab, zb = [], yb = new Image;
    Va(5E3, {
        device_pixel_ratio: window.devicePixelRatio,
        platform: navigator.platform
    });
    A.iM = {
        TILE_BASE_URLS: ["maponline0.bdimg.com/starpic/?qt=satepc&", "maponline1.bdimg.com/starpic/?qt=satepc&", "maponline2.bdimg.com/starpic/?qt=satepc&", "maponline3.bdimg.com/starpic/?qt=satepc&"],
        TILE_ONLINE_URLS: ["maponline0.bdimg.com", "maponline1.bdimg.com", "maponline2.bdimg.com", "maponline3.bdimg.com"],
        TIlE_PERSPECT_URLS: ["gss0.bdstatic.com/-OR1cTe9KgQFm2e88IuM_a", "gss0.bdstatic.com/-ON1cTe9KgQFm2e88IuM_a", "gss0.bdstatic.com/-OZ1cTe9KgQFm2e88IuM_a", "gss0.bdstatic.com/-OV1cTe9KgQFm2e88IuM_a"],
        geolocControl: "gsp0.baidu.com/8LkJsjOpB1gCo2Kml5_Y_D3",
        TILES_YUN_HOST: ["gsp0.baidu.com/-eR1bSahKgkFkRGko9WTAnF6hhy", "gsp0.baidu.com/-eN1bSahKgkFkRGko9WTAnF6hhy", "gsp0.baidu.com/-eZ1bSahKgkFkRGko9WTAnF6hhy", "gsp0.baidu.com/-eV1bSahKgkFkRGko9WTAnF6hhy"],
        traffic: "itsmap2.baidu.com",
        message: "j.map.baidu.com",
        baidumap: "map.baidu.com",
        wuxian: "gsp0.baidu.com/6a1OdTeaKgQFm2e88IuM_a",
        pano: ["apisv0.bdimg.com", "apisv1.bdimg.com"],
        panoVerify: "api.map.baidu.com",
        main_domain_nocdn: {
            baidu: "api.map.baidu.com",
            other: "api.map.baidu.com"
        },
        main_domain_cdn: {
            baidu: ["mapapip0.bdimg.com", "mapapip1.bdimg.com", "mapapip2.bdimg.com"],
            other: ["api.map.baidu.com"],
            webmap: ["webmap0.bdimg.com"]
        },
        map_click: "gsp0.baidu.com/80MWbzKh2wt3n2qy8IqW0jdnxx1xbK",
        vector_traffic: "maponline0.bdimg.com"
    };
    A.IY = {
        TILE_BASE_URLS: ["maponline0.bdimg.com/starpic/?qt=satepc&", "maponline1.bdimg.com/starpic/?qt=satepc&", "maponline2.bdimg.com/starpic/?qt=satepc&", "maponline3.bdimg.com/starpic/?qt=satepc&"],
        TILE_ONLINE_URLS: ["maponline0.bdimg.com", "maponline1.bdimg.com", "maponline2.bdimg.com", "maponline3.bdimg.com"],
        TIlE_PERSPECT_URLS: ["d0.map.baidu.com", "d1.map.baidu.com", "d2.map.baidu.com", "d3.map.baidu.com"],
        geolocControl: "loc.map.baidu.com",
        TILES_YUN_HOST: ["g0.api.map.baidu.com", "g1.api.map.baidu.com", "g2.api.map.baidu.com", "g3.api.map.baidu.com"],
        traffic: "itsmap2.baidu.com",
        message: "j.map.baidu.com",
        baidumap: "map.baidu.com",
        wuxian: "wuxian.baidu.com",
        pano: ["apisv0.bdimg.com", "apisv1.bdimg.com"],
        panoVerify: "api.map.baidu.com",
        main_domain_nocdn: {
            baidu: "api.map.baidu.com"
        },
        main_domain_cdn: {
            baidu: ["mapapip0.bdimg.com", "mapapip1.bdimg.com", "mapapip2.bdimg.com"],
            webmap: ["webmap0.bdimg.com"]
        },
        map_click: "mapclick.map.baidu.com",
        vector_traffic: "maponline0.bdimg.com"
    };
    A.c1 = {
        "0": {
            proto: "http://",
            domain: A.IY
        },
        1: {
            proto: "https://",
            domain: A.iM
        },
        2: {
            proto: "https://",
            domain: A.iM
        }
    };
    window.BMAP_PROTOCOL && "https" === window.BMAP_PROTOCOL && (window.HOST_TYPE = 2);
    A.Hu = window.HOST_TYPE || "0";
    A.url = A.c1[A.Hu];
    A.Op = A.url.proto + A.url.domain.baidumap + "/";
    A.vd = A.url.proto + ("2" == A.Hu ? A.url.domain.main_domain_nocdn.other : A.url.domain.main_domain_nocdn.baidu) + "/";
    A.pa = A.url.proto + ("2" == A.Hu ? A.url.domain.main_domain_cdn.other[0] : A.url.domain.main_domain_nocdn.baidu) + "/";
    A.pj = A.url.proto + A.url.domain.main_domain_cdn.webmap[0] + "/";
    A.AN = A.url.proto + A.url.domain.panoVerify + "/";
    A.xh = function(a, b) {
        var c, e, b = b || "";
        switch (a) {
        case "main_domain_nocdn":
            c = A.vd + b;
            break;
        case "main_domain_cdn":
            c = A.pa + b;
            break;
        default:
            e = A.url.domain[a],
            "[object Array]" == Object.prototype.toString.call(e) ? (c = [],
            x.oc.Rb(e, function(a, e) {
                c[e] = A.url.proto + a + "/" + b
            })) : c = A.url.proto + A.url.domain[a] + "/" + b
        }
        return c
    }
    ;
    function Bb(a) {
        var b = {
            duration: 1E3,
            Nc: 30,
            ep: 0,
            fc: Cb.NM,
            Tt: ca()
        };
        this.hg = [];
        if (a)
            for (var c in a)
                b[c] = a[c];
        this.m = b;
        if (cb(b.ep)) {
            var e = this;
            setTimeout(function() {
                e.start()
            }, b.ep)
        } else
            b.ep != Db && this.start()
    }
    var Db = "INFINITE";
    Bb.prototype.start = function() {
        this.Zu = ib();
        this.Yz = this.Zu + this.m.duration;
        Eb(this)
    }
    ;
    Bb.prototype.add = function(a) {
        this.hg.push(a)
    }
    ;
    function Eb(a) {
        var b = ib();
        b >= a.Yz ? (db(a.m.Ba) && a.m.Ba(a.m.fc(1)),
        db(a.m.finish) && a.m.finish(),
        0 < a.hg.length && (b = a.hg[0],
        b.hg = [].concat(a.hg.slice(1)),
        b.start())) : (a.Gy = a.m.fc((b - a.Zu) / a.m.duration),
        db(a.m.Ba) && a.m.Ba(a.Gy),
        a.NF || (a.ds = setTimeout(function() {
            Eb(a)
        }, 1E3 / a.m.Nc)))
    }
    Bb.prototype.stop = function(a) {
        this.NF = q;
        for (var b = 0; b < this.hg.length; b++)
            this.hg[b].stop(),
            this.hg[b] = s;
        this.hg.length = 0;
        this.ds && (clearTimeout(this.ds),
        this.ds = s);
        this.m.Tt(this.Gy);
        a && (this.Yz = this.Zu,
        Eb(this))
    }
    ;
    Bb.prototype.cancel = ia(1);
    var Cb = {
        NM: function(a) {
            return a
        },
        reverse: function(a) {
            return 1 - a
        },
        aD: function(a) {
            return a * a
        },
        ZC: function(a) {
            return Math.pow(a, 3)
        },
        Rs: function(a) {
            return -(a * (a - 2))
        },
        ZK: function(a) {
            return Math.pow(a - 1, 3) + 1
        },
        $C: function(a) {
            return 0.5 > a ? 2 * a * a : -2 * (a - 2) * a - 1
        },
        x3: function(a) {
            return 0.5 > a ? 4 * Math.pow(a, 3) : 4 * Math.pow(a - 1, 3) + 1
        },
        y3: function(a) {
            return (1 - Math.cos(Math.PI * a)) / 2
        }
    };
    Cb["ease-in"] = Cb.aD;
    Cb["ease-out"] = Cb.Rs;
    var J = {
        kG: 34,
        lG: 21,
        mG: new M(21,32),
        rP: new M(10,32),
        qP: new M(24,36),
        pP: new M(12,36),
        iG: new M(13,1),
        ta: A.pa + "images/",
        V4: "http://mapapip0.bdimg.com/images/",
        jG: A.pa + "images/markers_new.png",
        nP: 24,
        oP: 73,
        oC: {
            "\u5317\u4eac": {
                vy: "bj",
                o: new L(116.403874,39.914889)
            },
            "\u4e0a\u6d77": {
                vy: "sh",
                o: new L(121.487899,31.249162)
            },
            "\u6df1\u5733": {
                vy: "sz",
                o: new L(114.025974,22.546054)
            },
            "\u5e7f\u5dde": {
                vy: "gz",
                o: new L(113.30765,23.120049)
            }
        },
        fontFamily: "arial,sans-serif"
    };
    x.ga.We ? (x.extend(J, {
        KK: "url(" + J.ta + "ruler.cur),crosshair",
        Ac: "-moz-grab",
        Ld: "-moz-grabbing"
    }),
    x.platform.AM && (J.fontFamily = "arial,simsun,sans-serif")) : x.ga.Sw || x.ga.Fy ? x.extend(J, {
        KK: "url(" + J.ta + "ruler.cur) 2 6,crosshair",
        Ac: "url(" + J.ta + "openhand.cur) 8 8,default",
        Ld: "url(" + J.ta + "closedhand.cur) 8 8,move"
    }) : x.extend(J, {
        KK: "url(" + J.ta + "ruler.cur),crosshair",
        Ac: "url(" + J.ta + "openhand.cur),default",
        Ld: "url(" + J.ta + "closedhand.cur),move"
    });
    function Fb(a, b) {
        var c = a.style;
        c.left = b[0] + "px";
        c.top = b[1] + "px"
    }
    function Gb(a) {
        0 < x.ga.oa ? a.unselectable = "on" : a.style.MozUserSelect = "none"
    }
    function Hb(a) {
        return a && a.parentNode && 11 !== a.parentNode.nodeType
    }
    function Ib(a, b) {
        x.U.Ux(a, "beforeEnd", b);
        return a.lastChild
    }
    function Jb(a) {
        for (var b = {
            left: 0,
            top: 0
        }; a && a.offsetParent; )
            b.left += a.offsetLeft,
            b.top += a.offsetTop,
            a = a.offsetParent;
        return b
    }
    function oa(a) {
        a = window.event || a;
        a.stopPropagation ? a.stopPropagation() : a.cancelBubble = q
    }
    function Kb(a) {
        a = window.event || a;
        a.preventDefault ? a.preventDefault() : a.returnValue = t;
        return t
    }
    function pa(a) {
        oa(a);
        return Kb(a)
    }
    function Lb() {
        var a = document.documentElement
          , b = document.body;
        return a && (a.scrollTop || a.scrollLeft) ? [a.scrollTop, a.scrollLeft] : b ? [b.scrollTop, b.scrollLeft] : [0, 0]
    }
    function Mb(a, b) {
        if (a && b)
            return Math.round(Math.sqrt(Math.pow(a.x - b.x, 2) + Math.pow(a.y - b.y, 2)))
    }
    function Nb(a, b) {
        var c = [], b = b || function(a) {
            return a
        }
        , e;
        for (e in a)
            c.push(e + "=" + b(a[e]));
        return c.join("&")
    }
    function F(a, b, c) {
        var e = document.createElement(a);
        c && (e = document.createElementNS(c, a));
        return x.U.pF(e, b || {})
    }
    function ab(a) {
        if (a.currentStyle)
            return a.currentStyle;
        if (a.ownerDocument && a.ownerDocument.defaultView)
            return a.ownerDocument.defaultView.getComputedStyle(a, s)
    }
    function db(a) {
        return "function" === typeof a
    }
    function cb(a) {
        return "number" === typeof a
    }
    function fb(a) {
        return "string" == typeof a
    }
    function Ob(a) {
        return "undefined" != typeof a
    }
    function Pb(a) {
        return "object" == typeof a
    }
    var Qb = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    function Rb(a) {
        for (var b = "", c = 0; c < a.length; c++) {
            var e = a.charCodeAt(c) << 1
              , f = e = e.toString(2);
            8 > e.length && (f = "00000000" + e,
            f = f.substr(e.length, 8));
            b += f
        }
        a = 5 - b.length % 5;
        e = [];
        for (c = 0; c < a; c++)
            e[c] = "0";
        b = e.join("") + b;
        f = [];
        for (c = 0; c < b.length / 5; c++)
            e = b.substr(5 * c, 5),
            f.push(String.fromCharCode(parseInt(e, 2) + 50));
        return f.join("") + a.toString()
    }
    function Sb(a) {
        var b = "", c, e, f = "", g, i = "", k = 0;
        g = /[^A-Za-z0-9\+\/\=]/g;
        if (!a || g.exec(a))
            return a;
        a = a.replace(/[^A-Za-z0-9\+\/\=]/g, "");
        do
            c = Qb.indexOf(a.charAt(k++)),
            e = Qb.indexOf(a.charAt(k++)),
            g = Qb.indexOf(a.charAt(k++)),
            i = Qb.indexOf(a.charAt(k++)),
            c = c << 2 | e >> 4,
            e = (e & 15) << 4 | g >> 2,
            f = (g & 3) << 6 | i,
            b += String.fromCharCode(c),
            64 != g && (b += String.fromCharCode(e)),
            64 != i && (b += String.fromCharCode(f));
        while (k < a.length);
        return b
    }
    var O = x.lang.Pu;
    function K() {
        return !(!x.platform.tE && !x.platform.eZ && !x.platform.Ej)
    }
    function $a() {
        return !(!x.platform.AM && !x.platform.tM && !x.platform.lZ)
    }
    function ib() {
        return (new Date).getTime()
    }
    function Tb(a) {
        a = a.split("//");
        if (2 <= a.length) {
            var b = a[1].split("?");
            if (1 <= b.length) {
                var c = b[0].split("/")
                  , e = 1;
                window.urlSplitBeginIndex && (e = window.urlSplitBeginIndex);
                var f = e
                  , e = b.length - 1
                  , g = "/"
                  , i = c.length;
                f || (f = 0);
                e || (e = i - 1);
                g || (g = "");
                if (f > i - 1 || e > i - 1)
                    e = "";
                else {
                    for (i = ""; f <= e; f++)
                        i = f === e ? i + c[f] : i + (c[f] + g);
                    e = i
                }
                return {
                    host: b[0],
                    origin: a[0] + "//" + c[0],
                    path: "/" + e
                }
            }
        }
        return s
    }
    function Ub() {
        var a = document.body.appendChild(F("div"));
        a.innerHTML = '<v:shape id="vml_tester1" adj="1" />';
        var b = a.firstChild;
        if (!b.style)
            return t;
        b.style.behavior = "url(#default#VML)";
        b = b ? "object" === typeof b.adj : q;
        a.parentNode.removeChild(a);
        return b
    }
    function Vb() {
        return !!document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Shape", "1.1")
    }
    function Wb() {
        return !!F("canvas").getContext
    }
    function S(a) {
        return a * Math.PI / 180
    }
    A.rZ = function() {
        var a = q
          , b = q
          , c = q
          , e = q
          , f = 0
          , g = 0
          , i = 0
          , k = 0;
        return {
            WQ: function() {
                f += 1;
                a && (a = t,
                setTimeout(function() {
                    Va(5054, {
                        pic: f
                    });
                    a = q;
                    f = 0
                }, 1E4))
            },
            X1: function() {
                g += 1;
                b && (b = t,
                setTimeout(function() {
                    Va(5055, {
                        move: g
                    });
                    b = q;
                    g = 0
                }, 1E4))
            },
            Z1: function() {
                i += 1;
                c && (c = t,
                setTimeout(function() {
                    Va(5056, {
                        zoom: i
                    });
                    c = q;
                    i = 0
                }, 1E4))
            },
            Y1: function(a) {
                k += a;
                e && (e = t,
                setTimeout(function() {
                    Va(5057, {
                        tile: k
                    });
                    e = q;
                    k = 0
                }, 5E3))
            }
        }
    }();
    A.Bq = {
        AG: "#83a1ff",
        Dq: "#808080"
    };
    function Xb(a, b, c) {
        b.LE || (b.LE = [],
        b.handle = {});
        b.LE.push({
            filter: c,
            Xs: a
        });
        b.addEventListener || (b.addEventListener = function(a, c) {
            b.attachEvent("on" + a, c)
        }
        );
        b.handle.click || (b.addEventListener("click", function(a) {
            for (var c = a.target || a.srcElement; c != b; ) {
                Yb(b.LE, function(b, i) {
                    RegExp(i.filter).test(c.getAttribute("filter")) && i.Xs.call(c, a, c.getAttribute("filter"))
                });
                c = c.parentNode
            }
        }, t),
        b.handle.click = q)
    }
    function Yb(a, b) {
        for (var c = 0, e = a.length; c < e; c++)
            b(c, a[c])
    }
    void function(a, b, c) {
        void function(a, b, c) {
            function i(a) {
                if (!a.dp) {
                    for (var c = q, e = [], g = a.v_, k = 0; g && k < g.length; k++) {
                        var m = g[k]
                          , n = ea[m] = ea[m] || {};
                        if (n.dp || n == a)
                            e.push(n.Tc);
                        else {
                            c = t;
                            if (!n.rW && (m = (Ba.get("alias") || {})[m] || m + ".js",
                            !H[m])) {
                                H[m] = q;
                                var o = b.createElement("script")
                                  , p = b.getElementsByTagName("script")[0];
                                o.async = q;
                                o.src = m;
                                p.parentNode.insertBefore(o, p)
                            }
                            n.bz = n.bz || {};
                            n.bz[a.name] = a
                        }
                    }
                    if (c) {
                        a.dp = q;
                        a.FK && (a.Tc = a.FK.apply(a, e));
                        for (var v in a.bz)
                            i(a.bz[v])
                    }
                }
            }
            function k(a) {
                return (a || new Date) - G
            }
            function m(a, b, c) {
                if (a) {
                    "string" == typeof a && (c = b,
                    b = a,
                    a = I);
                    try {
                        a == I ? (N[b] = N[b] || [],
                        N[b].unshift(c)) : a.addEventListener ? a.addEventListener(b, c, t) : a.attachEvent && a.attachEvent("on" + b, c)
                    } catch (e) {}
                }
            }
            function n(a, b, c) {
                if (a) {
                    "string" == typeof a && (c = b,
                    b = a,
                    a = I);
                    try {
                        if (a == I) {
                            var e = N[b];
                            if (e)
                                for (var f = e.length; f--; )
                                    e[f] === c && e.splice(f, 1)
                        } else
                            a.removeEventListener ? a.removeEventListener(b, c, t) : a.detachEvent && a.detachEvent("on" + b, c)
                    } catch (g) {}
                }
            }
            function o(a) {
                var b = N[a]
                  , c = 0;
                if (b) {
                    for (var e = [], f = arguments, g = 1; g < f.length; g++)
                        e.push(f[g]);
                    for (g = b.length; g--; )
                        b[g].apply(this, e) && c++;
                    return c
                }
            }
            function p(a, b) {
                if (a && b) {
                    var c = new Image(1,1), e = [], f = "img_" + +new Date, g;
                    for (g in b)
                        b[g] && e.push(g + "=" + encodeURIComponent(b[g]));
                    I[f] = c;
                    c.onload = c.onerror = function() {
                        I[f] = c = c.onload = c.onerror = s;
                        delete I[f]
                    }
                    ;
                    c.src = a + "?" + e.join("&")
                }
            }
            function v() {
                var a = arguments
                  , b = a[0];
                if (this.EK || /^(on|un|set|get|create)$/.test(b)) {
                    for (var b = y.prototype[b], c = [], e = 1, f = a.length; e < f; e++)
                        c.push(a[e]);
                    "function" == typeof b && b.apply(this, c)
                } else
                    this.cK.push(a)
            }
            function w(a, b) {
                var c = {}, e;
                for (e in a)
                    a.hasOwnProperty(e) && (c[e] = a[e]);
                for (e in b)
                    b.hasOwnProperty(e) && (c[e] = b[e]);
                return c
            }
            function y(a) {
                this.name = a;
                this.Vs = {
                    protocolParameter: {
                        postUrl: s,
                        protocolParameter: s
                    }
                };
                this.cK = [];
                this.alog = I
            }
            function z(a) {
                a = a || "default";
                if ("*" == a) {
                    var a = [], b;
                    for (b in T)
                        a.push(T[b]);
                    return a
                }
                (b = T[a]) || (b = T[a] = new y(a));
                return b
            }
            var B = c.alog;
            if (!B || !B.dp) {
                var D = b.all && a.attachEvent
                  , G = B && B.BE || +new Date
                  , E = a.o5 || (+new Date).toString(36) + Math.random().toString(36).substr(2, 3)
                  , C = 0
                  , H = {}
                  , I = function(a) {
                    var b = arguments, c, e, f, g;
                    if ("define" == a || "require" == a) {
                        for (e = 1; e < b.length; e++)
                            switch (typeof b[e]) {
                            case "string":
                                c = b[e];
                                break;
                            case "object":
                                f = b[e];
                                break;
                            case "function":
                                g = b[e]
                            }
                        "require" == a && (c && !f && (f = [c]),
                        c = s);
                        c = !c ? "#" + C++ : c;
                        e = ea[c] = ea[c] || {};
                        e.dp || (e.name = c,
                        e.v_ = f,
                        e.FK = g,
                        "define" == a && (e.rW = q),
                        i(e))
                    } else
                        "function" == typeof a ? a(I) : ("" + a).replace(/^(?:([\w$_]+)\.)?(\w+)$/, function(a, c, e) {
                            b[0] = e;
                            v.apply(I.XF(c), b)
                        })
                }
                  , N = {}
                  , T = {}
                  , ea = {
                    O2: {
                        name: "alog",
                        dp: q,
                        Tc: I
                    }
                };
                y.prototype.start = y.prototype.create = function(a) {
                    if (!this.EK) {
                        "object" == typeof a && this.set(a);
                        this.EK = new Date;
                        for (this.Ws("create", this); a = this.cK.shift(); )
                            v.apply(this, a)
                    }
                }
                ;
                y.prototype.send = function(a, b) {
                    var c = w({
                        ts: k().toString(36),
                        t: a,
                        sid: E
                    }, this.Vs);
                    if ("object" == typeof b)
                        c = w(c, b);
                    else {
                        var e = arguments;
                        switch (a) {
                        case "pageview":
                            e[1] && (c.page = e[1]);
                            e[2] && (c.title = e[2]);
                            break;
                        case "event":
                            e[1] && (c.eventCategory = e[1]);
                            e[2] && (c.eventAction = e[2]);
                            e[3] && (c.eventLabel = e[3]);
                            e[4] && (c.eventValue = e[4]);
                            break;
                        case "timing":
                            e[1] && (c.timingCategory = e[1]);
                            e[2] && (c.timingVar = e[2]);
                            e[3] && (c.timingValue = e[3]);
                            e[4] && (c.timingLabel = e[4]);
                            break;
                        case "exception":
                            e[1] && (c.exDescription = e[1]);
                            e[2] && (c.exFatal = e[2]);
                            break;
                        default:
                            return
                        }
                    }
                    this.Ws("send", c);
                    var f;
                    if (e = this.Vs.protocolParameter) {
                        var g = {};
                        for (f in c)
                            e[f] !== s && (g[e[f] || f] = c[f]);
                        f = g
                    } else
                        f = c;
                    p(this.Vs.postUrl, f)
                }
                ;
                y.prototype.set = function(a, b) {
                    if ("string" == typeof a)
                        "protocolParameter" == a && (b = w({
                            postUrl: s,
                            protocolParameter: s
                        }, b)),
                        this.Vs[a] = b;
                    else if ("object" == typeof a)
                        for (var c in a)
                            this.set(c, a[c])
                }
                ;
                y.prototype.get = function(a, b) {
                    var c = this.Vs[a];
                    "function" == typeof b && b(c);
                    return c
                }
                ;
                y.prototype.Ws = function(a, b) {
                    return I.Ws(this.name + "." + a, b)
                }
                ;
                y.prototype.V = function(a, b) {
                    I.V(this.name + "." + a, b)
                }
                ;
                y.prototype.jd = function(a, b) {
                    I.jd(this.name + "." + a, b)
                }
                ;
                I.name = "alog";
                I.Yb = E;
                I.dp = q;
                I.timestamp = k;
                I.jd = n;
                I.V = m;
                I.Ws = o;
                I.XF = z;
                I("init");
                var ba = y.prototype;
                U(ba, {
                    start: ba.start,
                    create: ba.create,
                    send: ba.send,
                    set: ba.set,
                    get: ba.get,
                    on: ba.V,
                    un: ba.jd,
                    fire: ba.Ws
                });
                var Ba = z();
                Ba.set("protocolParameter", {
                    N2: s
                });
                if (B) {
                    ba = [].concat(B.zb || [], B.$t || []);
                    B.zb = B.$t = s;
                    for (var ua in I)
                        I.hasOwnProperty(ua) && (B[ua] = I[ua]);
                    I.zb = I.$t = {
                        push: function(a) {
                            I.apply(I, a)
                        }
                    };
                    for (B = 0; B < ba.length; B++)
                        I.apply(I, ba[B])
                }
                c.alog = I;
                D && m(b, "mouseup", function(a) {
                    a = a.target || a.srcElement;
                    1 == a.nodeType && /^ajavascript:/i.test(a.tagName + a.href)
                });
                var Ha = t;
                a.onerror = function(a, b, e, f) {
                    var i = q;
                    !b && /^script error/i.test(a) && (Ha ? i = t : Ha = q);
                    i && c.alog("exception.send", "exception", {
                        Pt: a,
                        AE: b,
                        Lt: e,
                        Ag: f
                    });
                    return t
                }
                ;
                c.alog("exception.on", "catch", function(a) {
                    c.alog("exception.send", "exception", {
                        Pt: a.Pt,
                        AE: a.path,
                        Lt: a.Lt,
                        method: a.method,
                        jL: "catch"
                    })
                })
            }
        }(a, b, c);
        void function(a, b, c) {
            var i = "18_3";
            K() && (i = "18_4");
            var k = "http://static.tieba.baidu.com";
            "https:" === a.location.protocol && (k = "https://gsp0.baidu.com/5aAHeD3nKhI2p27j8IqW0jdnxx1xbK");
            var m = Math.random
              , k = k + "/tb/pms/img/st.gif"
              , n = {
                Ih: "0.1"
            }
              , o = {
                Ih: "0.1"
            }
              , p = {
                Ih: "0.1"
            }
              , v = {
                Ih: "0"
            };
            if (n && n.Ih && m() < n.Ih) {
                var w = c.alog.XF("monkey"), y, n = a.screen, z = b.referrer;
                w.set("ver", 5);
                w.set("pid", 241);
                n && w.set("px", n.width + "*" + n.height);
                w.set("ref", z);
                c.alog("monkey.on", "create", function() {
                    y = c.alog.timestamp;
                    w.set("protocolParameter", {
                        reports: s
                    })
                });
                c.alog("monkey.on", "send", function(a) {
                    "pageview" == a.t && (a.cmd = "open");
                    a.now && (a.ts = y(a.now).toString(36),
                    a.now = "")
                });
                c.alog("monkey.create", {
                    page: i,
                    pid: "241",
                    p: "18",
                    dv: 6,
                    postUrl: k,
                    reports: {
                        refer: 1
                    }
                });
                c.alog("monkey.send", "pageview", {
                    now: +new Date
                })
            }
            if (o && o.Ih && m() < o.Ih) {
                var B = t;
                a.onerror = function(a, b, e, f) {
                    var i = q;
                    !b && /^script error/i.test(a) && (B ? i = t : B = q);
                    i && c.alog("exception.send", "exception", {
                        Pt: a,
                        AE: b,
                        Lt: e,
                        Ag: f
                    });
                    return t
                }
                ;
                c.alog("exception.on", "catch", function(a) {
                    c.alog("exception.send", "exception", {
                        Pt: a.Pt,
                        AE: a.path,
                        Lt: a.Lt,
                        method: a.method,
                        jL: "catch"
                    })
                });
                c.alog("exception.create", {
                    postUrl: k,
                    dv: 7,
                    page: i,
                    pid: "170",
                    p: "18"
                })
            }
            p && (p.Ih && m() < p.Ih) && (c.alog("cus.on", "time", function(a) {
                var b = {}, e = t, f;
                if ("[object Object]" === a.toString()) {
                    for (var i in a)
                        "page" == i ? b.page = a[i] : (f = parseInt(a[i]),
                        0 < f && /^z_/.test(i) && (e = q,
                        b[i] = f));
                    e && c.alog("cus.send", "time", b)
                }
            }),
            c.alog("cus.on", "count", function(a) {
                var b = {}
                  , e = t;
                "string" === typeof a && (a = [a]);
                if (a instanceof Array)
                    for (var f = 0; f < a.length; f++)
                        /^z_/.test(a[f]) ? (e = q,
                        b[a[f]] = 1) : /^page:/.test(a[f]) && (b.page = a[f].substring(5));
                e && c.alog("cus.send", "count", b)
            }),
            c.alog("cus.create", {
                dv: 3,
                postUrl: k,
                page: i,
                p: "18"
            }));
            if (v && v.Ih && m() < v.Ih) {
                var D = ["Moz", "O", "ms", "Webkit"]
                  , G = ["-webkit-", "-moz-", "-o-", "-ms-"]
                  , E = function() {
                    return typeof b.createElement !== "function" ? b.createElement(arguments[0]) : b.createElement.apply(b, arguments)
                }
                  , C = E("dpFeatureTest").style
                  , H = function(a) {
                    return I(a, l, l)
                }
                  , I = function(a, b, c) {
                    var e = a.charAt(0).toUpperCase() + a.slice(1)
                      , f = (a + " " + D.join(e + " ") + e).split(" ");
                    if (typeof b === "string" || typeof b === "undefined")
                        return N(f, b);
                    f = (a + " " + D.join(e + " ") + e).split(" ");
                    a: {
                        var a = f, g;
                        for (g in a)
                            if (a[g]in b) {
                                if (c === t) {
                                    b = a[g];
                                    break a
                                }
                                g = b[a[g]];
                                b = typeof g === "function" ? fnBind(g, c || b) : g;
                                break a
                            }
                        b = t
                    }
                    return b
                }
                  , N = function(a, b) {
                    var c, e, f;
                    e = a.length;
                    for (c = 0; c < e; c++) {
                        f = a[c];
                        ~("" + f).indexOf("-") && (f = T(f));
                        if (C[f] !== l)
                            return b == "pfx" ? f : q
                    }
                    return t
                }
                  , T = function(a) {
                    return a.replace(/([a-z])-([a-z])/g, function(a, b, c) {
                        return b + c.toUpperCase()
                    }).replace(/^-/, "")
                }
                  , ea = function(a, b, c) {
                    if (a.indexOf("@") === 0)
                        return atRule(a);
                    a.indexOf("-") != -1 && (a = T(a));
                    return !b ? I(a, "pfx") : I(a, b, c)
                }
                  , ba = function() {
                    var a = E("canvas");
                    return !(!a.getContext || !a.getContext("2d"))
                }
                  , Ba = function() {
                    var a = E("div");
                    return "draggable"in a || "ondragstart"in a && "ondrop"in a
                }
                  , ua = function() {
                    try {
                        localStorage.setItem("localStorage", "localStorage");
                        localStorage.removeItem("localStorage");
                        return q
                    } catch (a) {
                        return t
                    }
                }
                  , Ha = function() {
                    return "content"in b.createElement("template")
                }
                  , ta = function() {
                    return "createShadowRoot"in b.createElement("a")
                }
                  , Za = function() {
                    return "registerElement"in b
                }
                  , Me = function() {
                    return "import"in b.createElement("link")
                }
                  , bd = function() {
                    return "getItems"in b
                }
                  , Cj = function() {
                    return "EventSource"in window
                }
                  , Ne = function(a, b) {
                    var c = new Image;
                    c.onload = function() {
                        b(a, c.width > 0 && c.height > 0)
                    }
                    ;
                    c.onerror = function() {
                        b(a, t)
                    }
                    ;
                    c.src = "data:image/webp;base64," + {
                        r5: "UklGRiIAAABXRUJQVlA4IBYAAAAwAQCdASoBAAEADsD+JaQAA3AAAAAA",
                        q5: "UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==",
                        alpha: "UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAARBxAR/Q9ERP8DAABWUDggGAAAABQBAJ0BKgEAAQAAAP4AAA3AAP7mtQAAAA==",
                        Ak: "UklGRlIAAABXRUJQVlA4WAoAAAASAAAAAAAAAAAAQU5JTQYAAAD/////AABBTk1GJgAAAAAAAAAAAAAAAAAAAGQAAABWUDhMDQAAAC8AAAAQBxAREYiI/gcA"
                    }[a]
                }
                  , Oe = function(a, b) {
                    return dc.ri["WebP-" + a] = b
                }
                  , Dj = function() {
                    return "openDatabase"in a
                }
                  , Ej = function() {
                    return "performance"in a && "timing"in a.performance
                }
                  , Fj = function() {
                    return "performance"in a && "mark"in a.performance
                }
                  , Gj = function() {
                    return !(!Array.prototype || !Array.prototype.every || !Array.prototype.filter || !Array.prototype.forEach || !Array.prototype.indexOf || !Array.prototype.lastIndexOf || !Array.prototype.map || !Array.prototype.some || !Array.prototype.reduce || !Array.prototype.reduceRight || !Array.isArray)
                }
                  , Hj = function() {
                    return "Promise"in a && "cast"in a.Eq && "resolve"in a.Eq && "reject"in a.Eq && "all"in a.Eq && "race"in a.Eq && function() {
                        var b;
                        new a.Eq(function(a) {
                            b = a
                        }
                        );
                        return typeof b === "function"
                    }()
                }
                  , Ij = function() {
                    var b = !!a.I1
                      , c = a.XMLHttpRequest && "withCredentials"in new XMLHttpRequest;
                    return !!a.M1 && b && c
                }
                  , Jj = function() {
                    return "geolocation"in navigator
                }
                  , Kj = function() {
                    var b = E("canvas")
                      , c = "probablySupportsContext"in b ? "probablySupportsContext" : "supportsContext";
                    return c in b ? b[c]("webgl") || b[c]("experimental-webgl") : "WebGLRenderingContext"in a
                }
                  , Lj = function() {
                    return !!b.createElementNS && !!b.createElementNS("http://www.w3.org/2000/svg", "svg").m3
                }
                  , Mj = function() {
                    return !!a.U1
                }
                  , Nj = function() {
                    return "WebSocket"in a && a.R1.E1 === 2
                }
                  , Oj = function() {
                    return !!b.createElement("video").canPlayType
                }
                  , Pj = function() {
                    return !!b.createElement("audio").canPlayType
                }
                  , Qj = function() {
                    return !!(a.history && "pushState"in a.history)
                }
                  , Rj = function() {
                    return !(!a.G1 || !a.H1)
                }
                  , Sj = function() {
                    return "postMessage"in window
                }
                  , Tj = function() {
                    return !!a.webkitNotifications || "Notification"in a && "permission"in a.KP && "requestPermission"in a.KP
                }
                  , Uj = function() {
                    for (var b = ["webkit", "moz", "o", "ms"], c = a.requestAnimationFrame, f = 0; f < b.length && !c; ++f)
                        c = a[b[f] + "RequestAnimationFrame"];
                    return !!c
                }
                  , Vj = function() {
                    return "JSON"in a && "parse"in JSON && "stringify"in JSON
                }
                  , Wj = function() {
                    return !(!ea("exitFullscreen", b, t) && !ea("cancelFullScreen", b, t))
                }
                  , Xj = function() {
                    return !!ea("Intl", a)
                }
                  , Yj = function() {
                    return H("flexBasis")
                }
                  , Zj = function() {
                    return !!H("perspective")
                }
                  , $j = function() {
                    return H("shapeOutside")
                }
                  , ak = function() {
                    var a = E("div");
                    a.style.cssText = G.join("filter:blur(2px); ");
                    return !!a.style.length && (b.documentMode === l || b.documentMode > 9)
                }
                  , bk = function() {
                    return "XMLHttpRequest"in a && "withCredentials"in new XMLHttpRequest
                }
                  , ck = function() {
                    return E("progress").max !== l
                }
                  , dk = function() {
                    return E("meter").max !== l
                }
                  , ek = function() {
                    return "sendBeacon"in navigator
                }
                  , fk = function() {
                    return H("borderRadius")
                }
                  , gk = function() {
                    return H("boxShadow")
                }
                  , hk = function() {
                    var a = E("div").style;
                    a.cssText = G.join("opacity:.55;");
                    return /^0.55$/.test(a.opacity)
                }
                  , ik = function() {
                    return N(["textShadow"], l)
                }
                  , jk = function() {
                    return H("animationName")
                }
                  , kk = function() {
                    return H("transition")
                }
                  , lk = function() {
                    return navigator.userAgent.indexOf("Android 2.") === -1 && H("transform")
                }
                  , dc = {
                    ri: {},
                    sa: function(a, b, c) {
                        this.ri[a] = b.apply(this, [].slice.call(arguments, 2))
                    },
                    Jd: function(a, b) {
                        a.apply(this, [].slice.call(arguments, 1))
                    },
                    A_: function() {
                        this.sa("bdrs", fk);
                        this.sa("bxsd", gk);
                        this.sa("opat", hk);
                        this.sa("txsd", ik);
                        this.sa("anim", jk);
                        this.sa("trsi", kk);
                        this.sa("trfm", lk);
                        this.sa("flex", Yj);
                        this.sa("3dtr", Zj);
                        this.sa("shpe", $j);
                        this.sa("fltr", ak);
                        this.sa("cavs", ba);
                        this.sa("dgdp", Ba);
                        this.sa("locs", ua);
                        this.sa("wctem", Ha);
                        this.sa("wcsdd", ta);
                        this.sa("wccse", Za);
                        this.sa("wchti", Me);
                        this.Jd(Ne, "lossy", Oe);
                        this.Jd(Ne, "lossless", Oe);
                        this.Jd(Ne, "alpha", Oe);
                        this.Jd(Ne, "animation", Oe);
                        this.sa("wsql", Dj);
                        this.sa("natm", Ej);
                        this.sa("ustm", Fj);
                        this.sa("arra", Gj);
                        this.sa("prms", Hj);
                        this.sa("xhr2", Ij);
                        this.sa("wbgl", Kj);
                        this.sa("geol", Jj);
                        this.sa("svg", Lj);
                        this.sa("work", Mj);
                        this.sa("wbsk", Nj);
                        this.sa("vido", Oj);
                        this.sa("audo", Pj);
                        this.sa("hsty", Qj);
                        this.sa("file", Rj);
                        this.sa("psmg", Sj);
                        this.sa("wknf", Tj);
                        this.sa("rqaf", Uj);
                        this.sa("json", Vj);
                        this.sa("flsc", Wj);
                        this.sa("i18n", Xj);
                        this.sa("cors", bk);
                        this.sa("prog", ck);
                        this.sa("metr", dk);
                        this.sa("becn", ek);
                        this.sa("mcrd", bd);
                        this.sa("esrc", Cj)
                    }
                }
                  , w = c.alog.XF("feature");
                w.V("commit", function() {
                    dc.A_();
                    var a = setInterval(function() {
                        if ("WebP-lossy"in dc.ri && "WebP-lossless"in dc.ri && "WebP-alpha"in dc.ri && "WebP-animation"in dc.ri) {
                            for (var b in dc.ri)
                                dc.ri[b] = dc.ri[b] ? "y" : "n";
                            w.send("feature", dc.ri);
                            clearInterval(a)
                        }
                    }, 500)
                });
                c.alog("feature.create", {
                    v3: 4,
                    W5: k,
                    page: i,
                    zb: "18"
                });
                c.alog("feature.fire", "commit")
            }
        }(a, b, c)
    }(window, document, A);
    A.Jq = A.alog || ca();
    A.alog("cus.fire", "count", "z_loadscriptcount");
    "https:" === location.protocol && A.alog("cus.fire", "count", "z_httpscount");
    function Zb(a) {
        var b = window.TILE_VERSION
          , c = "20190410";
        b && b.ditu && (b = b.ditu,
        b[a] && b[a].updateDate && (c = b[a].updateDate));
        return c
    }
    var $b = [72.6892532, 0.1939743381, 136.1168614, 54.392257]
      , ac = [72.69566833, 0.1999420909, 136.1232863, 54.39791217]
      , bc = 158
      , cc = [98.795985, 122.960792, 107.867379, 118.093451, 119.139658, 128.035888, 79.948212, 99.029524, 119.923388, 122.094977, 127.918527, 130.94789, 106.50606, 108.076783, 119.8329, 126.382207, 111.803567, 119.324928, 100.749858, 102.227985, 99.860885, 100.788921, 97.529435, 98.841564, 99.100017, 99.90035, 122.917416, 123.774367, 123.728314, 125.507211, 123.736065, 124.767299, 125.488463, 126.410675, 125.484326, 126.07764, 130.830784, 133.620042, 127.912178, 128.668957, 128.658937, 129.638599, 132.894179, 134.119086, 117.379378, 119.244569, 116.086736, 117.431212, 114.420233, 116.137458, 116.492775, 119.605527, 110.579401, 111.86488, 74.468228, 80.001908, 82.867432, 91.353788, 85.721075, 98.976964, 127.664757, 129.546833, 129.476893, 130.22449, 133.730358, 134.745235, 134.381034, 135.1178, 130.868117, 131.34409, 115.513245, 117.544751, 115.779271, 116.748045, 108.536254, 110.614326, 121.365534, 124.626434, 126.165992, 127.347013, 91.281869, 95.611754, 79.879648, 82.945041, 76.413314, 78.345207, 78.275229, 80.002329, 83.956612, 85.734098, 85.510186, 89.356499, 97.997001, 98.948845, 106.653208, 108.610811, 111.400183, 111.824179, 111.592224, 111.817136, 116.00682, 117.024631, 116.258574, 116.689291, 119.436876, 119.922961, 120.659806, 121.395479, 120.349116, 120.676014, 124.59389, 125.787788, 126.221756, 126.788962, 95.572955, 102.046581, 95.583772, 96.165551, 95.564318, 97.806095, 91.30446, 93.356438, 93.330319, 94.698145, 89.349129, 90.548677, 82.268802, 82.892025, 78.335615, 80.032266, 76.625755, 78.361413, 73.498248, 74.490992, 74.846872, 76.488771, 91.563521, 94.878444, 88.768214, 89.244787, 83.247076, 83.974127, 82.29595, 83.256003, 81.885315, 83.26249, 80.760619, 81.472404, 86.470983, 88.276988, 102.207537, 104.234614, 112.164795, 116.833667, 108.965663, 113.032246, 111.166575, 117.983363]
      , ec = [22.551183, 42.284787, 17.227969, 22.738314, 41.300981, 50.749638, 30.368087, 42.332701, 21.705055, 22.696452, 42.426047, 48.944674, 21.432184, 22.651387, 50.657409, 52.92296, 42.212192, 45.206905, 21.137031, 22.57186, 21.444502, 22.586566, 23.741571, 25.301472, 22.006806, 22.56637, 38.985114, 41.346531, 40.295617, 41.338581, 39.740021, 40.351012, 40.974644, 41.331562, 40.726852, 41.067192, 44.877158, 48.018285, 41.344597, 42.451798, 42.016305, 42.443235, 45.880906, 48.214001, 45.140027, 46.792775, 45.141083, 46.400433, 45.156418, 45.748281, 47.485889, 50.071879, 42.223667, 43.469487, 37.019867, 40.668675, 42.226823, 47.321605, 27.72944, 30.469853, 48.919002, 49.650614, 48.840188, 49.443166, 46.949801, 48.382798, 47.660603, 48.472692, 42.859946, 44.913298, 47.605896, 48.445914, 48.41698, 48.909667, 42.23507, 42.914193, 52.8281, 53.585952, 50.709311, 51.662219, 42.29968, 44.399225, 42.302746, 45.391958, 34.680866, 37.03377, 30.743515, 37.07228, 28.245649, 30.408935, 47.277693, 48.504255, 25.241528, 27.780726, 42.223363, 42.548418, 43.435888, 44.696952, 44.693193, 45.00187, 48.886267, 49.326755, 49.288642, 49.632304, 50.717486, 51.314369, 52.914204, 53.33964, 52.910094, 53.115926, 52.908382, 53.258095, 51.64533, 52.408305, 42.236825, 42.699126, 43.068466, 43.898632, 42.670403, 43.082219, 44.379045, 45.187742, 44.382336, 44.981379, 47.310362, 48.06019, 45.359099, 46.814439, 40.569751, 42.047741, 40.587956, 41.41263, 38.519192, 40.185033, 35.790476, 37.029005, 26.825605, 27.763896, 27.199658, 27.751649, 29.150192, 30.381073, 29.573886, 30.065162, 30.047775, 30.384089, 30.001277, 30.388525, 48.494118, 49.173841, 22.398528, 22.601198, 7.441114, 11.505968, 3.767491, 9.005209, 12.642067, 17.410886]
      , fc = 95
      , gc = [110.3961374, 105.0743788, 96.8991824, 95.61810411, 93.82412598, 91.3892353, 91.38931858, 89.08325955, 87.22469808, 86.26278402, 85.17353, 85.23741211, 82.86627441, 81.90481038, 79.59687147, 80.39829237, 79.93319363, 77.80279948, 75.2557704, 73.49357829, 73.1892532, 73.87758816, 74.4064738, 74.10215224, 75.46409695, 76.77739692, 78.28299615, 78.15499485, 78.37920654, 78.89145345, 79.69282199, 81.19938178, 81.80830295, 83.89093424, 85.94149523, 87.86447266, 89.03414958, 90.05918132, 91.10026937, 92.15733832, 93.74361735, 95.82597331, 97.95655545, 97.12363037, 98.2129739, 99.2068571, 101.6587874, 102.5239084, 102.2356106, 105.0249238, 106.0992342, 107.8617093, 111.6439372, 109.591869, 112.284586, 117.7961157, 118.9495128, 114.2076584, 118.693565, 123.1475225, 122.730705, 120.9361393, 123.4207441, 122.3787782, 122.1385425, 121.5904281, 121.1773763, 120.6805404, 120.2483355, 122.795807, 122.8759077, 121.3060262, 122.1392177, 123.7418799, 126.4177599, 128.5647409, 129.7194884, 131.2259136, 131.9950494, 133.6289931, 135.6168614, 131.3875545, 130.8743365, 128.6303223, 126.0997773, 124.4015375, 122.22161, 119.6586483, 119.7866827, 118.5685878, 116.5177976, 114.819101, 119.0812964, 116.453265, 111.7431171]
      , hc = [43.2190351, 42.38053385, 43.17417589, 44.42226915, 45.09863634, 45.56708116, 47.33599718, 48.68832709, 49.62448486, 48.9482175, 48.4800472, 47.33564399, 47.43948676, 46.03452067, 45.20221788, 43.34563043, 42.32965739, 41.39690972, 40.82972331, 39.95567654, 39.25892877, 38.36098768, 38.05441569, 37.16878445, 36.38899414, 35.36126817, 34.30953451, 32.58503879, 31.56975694, 30.77800266, 30.43559814, 29.7744892, 30.0931977, 28.71103299, 27.70739665, 27.5775472, 27.01096137, 27.77857883, 27.50707954, 26.50328315, 26.70387804, 27.95548557, 27.29428901, 23.64685493, 23.62310601, 21.67493381, 20.77751465, 21.32070991, 22.1824113, 22.31232964, 22.51316054, 16.80037679, 13.19749864, 0.6939743381, 1.541660428, 10.50208252, 15.58926975, 17.89090007, 19.94928467, 22.18490153, 25.37285292, 25.61456434, 30.62532552, 31.08099284, 31.89238173, 32.50092692, 32.80325765, 34.25546956, 35.15486138, 36.90170139, 37.8348272, 37.941604, 38.6480797, 38.96797201, 40.98146918, 41.25573296, 42.07218153, 42.49132813, 44.65259766, 44.69330702, 48.62286865, 48.09383952, 49.19628499, 50.03402317, 53.27678901, 53.62976345, 53.89420546, 52.98933322, 52.01872884, 50.23210259, 50.18807048, 47.49769857, 47.34362712, 46.50502143, 45.24770128]
      , ic = [98.7895, 122.954182, 107.860913, 118.087007, 119.133165, 128.029533, 79.941749, 99.023087, 119.916883, 122.08841, 127.912143, 130.941471, 106.499502, 108.070244, 119.826245, 126.375818, 111.797006, 119.318387, 100.743285, 102.221517, 99.854448, 100.782445, 97.522928, 98.835028, 99.093518, 99.893783, 122.910927, 123.767769, 123.721954, 125.50077, 123.729657, 124.760724, 125.481902, 126.404079, 125.477737, 126.071019, 130.824331, 133.613395, 127.905767, 128.662524, 128.652527, 129.6321, 132.887552, 134.11249, 117.37297, 119.237999, 116.080154, 117.424589, 114.413586, 116.130948, 116.486264, 119.598927, 110.5728, 111.858437, 74.465162, 79.995337, 82.860821, 91.347291, 85.716024, 98.970481, 127.658331, 129.540202, 129.470528, 130.21808, 133.723748, 134.738785, 134.374555, 135.111443, 130.861475, 131.337438, 115.506627, 117.538123, 115.772783, 116.741632, 108.529656, 110.60782, 121.358945, 124.619773, 126.159424, 127.340582, 91.275275, 95.605228, 79.874427, 82.938601, 76.413314, 78.338763, 78.275229, 79.995765, 83.956612, 85.727511, 85.503554, 89.349858, 97.990418, 98.942257, 106.646704, 108.604437, 111.393667, 111.817723, 111.585811, 111.810645, 116.000232, 117.018216, 116.252108, 116.682705, 119.430384, 119.916417, 120.653168, 121.38883, 120.342727, 120.669383, 124.587426, 125.781376, 126.215282, 126.782323, 95.566367, 102.040026, 95.577158, 96.159009, 95.557772, 97.799728, 91.298032, 93.350057, 93.323794, 94.691771, 89.342471, 90.542019, 82.264229, 82.885485, 78.335615, 80.025844, 76.623947, 78.355027, 73.495149, 74.484473, 74.846872, 76.482208, 91.560117, 94.871859, 88.761692, 89.23822, 83.240549, 83.967602, 82.292367, 83.2495, 81.878825, 83.256003, 80.75421, 81.465955, 86.465421, 88.270356, 102.201019, 104.228033, 112.158282, 116.827153, 108.965663, 113.025767, 111.166575, 117.97687]
      , jc = [22.545421, 42.279053, 17.226272, 22.731982, 41.294917, 50.743316, 30.361986, 42.326603, 21.699185, 22.690751, 42.419757, 48.938435, 21.426505, 22.64567, 50.651745, 52.916705, 42.20641, 45.201064, 21.131326, 22.565685, 21.438288, 22.580379, 23.735785, 25.295582, 22.001087, 22.560315, 38.979333, 41.340757, 40.28938, 41.332289, 39.734164, 40.344718, 40.968803, 41.325813, 40.721073, 41.061503, 44.871533, 48.012179, 41.338366, 42.445601, 42.010343, 42.436934, 45.875217, 48.208327, 45.134237, 46.786509, 45.135376, 46.394665, 45.150734, 45.742257, 47.480099, 50.065931, 42.217982, 43.46329, 37.014057, 40.662848, 42.221079, 47.315558, 27.723432, 30.46385, 48.913298, 49.644555, 48.83396, 49.436824, 46.944059, 48.376613, 47.654503, 48.466331, 42.854333, 44.907682, 47.600253, 48.440245, 48.410926, 48.903468, 42.229292, 42.908294, 52.822466, 53.58012, 50.703491, 51.656037, 42.29378, 44.393379, 42.296912, 45.385809, 34.679282, 37.027699, 30.740622, 37.066377, 28.241967, 30.403134, 47.271949, 48.49848, 25.235818, 27.774976, 42.217425, 42.542102, 43.429763, 44.691016, 44.687044, 44.995758, 48.880431, 49.320551, 49.282865, 49.626267, 50.711607, 51.308382, 52.908547, 53.333963, 52.904419, 53.109706, 52.902338, 53.251938, 51.639701, 52.402205, 42.231045, 42.693581, 43.062756, 43.892771, 42.664519, 43.075927, 44.372942, 45.1815, 44.376327, 44.975476, 47.304623, 48.054453, 45.353174, 46.808493, 40.563653, 42.041556, 40.582164, 41.4064, 38.51618, 40.179105, 35.789745, 37.023144, 26.825402, 27.757641, 27.193806, 27.745766, 29.144229, 30.375186, 29.567889, 30.059102, 30.041938, 30.378006, 29.995047, 30.382338, 48.48834, 49.169021, 22.392816, 22.595333, 7.439914, 11.500161, 3.766676, 9.000793, 12.640512, 17.406563]
      , kc = 3E3
      , lc = 2.0E-5
      , mc = 3.0E-6
      , nc = 0.0174532925194
      , oc = 0.0065
      , pc = 0.0060
      , qc = 4E4
      , rc = 0
      , sc = 3
      , tc = 1.0E-10
      , uc = 6370996.81
      , vc = 1E8;
    function wc(a, b, c) {
        for (var e = bc, f = 0; f < e; f += 2)
            if (a.lng >= b[f] && a.lng <= b[f + 1] && a.lat >= c[f] && a.lat <= c[f + 1])
                return q;
        return t
    }
    function xc(a) {
        var b = a.lng
          , c = a.lat
          , a = Math.sqrt(b * b + c * c) + Math.sin(c * kc * nc) * lc
          , b = Math.atan2(c, b) + Math.cos(b * kc * nc) * mc;
        return {
            lng: a * Math.cos(b) + oc,
            lat: a * Math.sin(b) + pc
        }
    }
    function yc(a) {
        var b = zc
          , c = {}
          , e = a.lng
          , f = a.lat
          , g = 1
          , i = a.lng
          , k = a.lat
          , m = e - g
          , n = 0
          , o = f + g
          , p = 0
          , v = e - g
          , w = 0
          , y = f - g
          , z = 0
          , B = e + g
          , D = 0
          , G = f - g
          , E = 0
          , C = e + g
          , H = 0
          , I = f + g
          , N = 0
          , o = m = 0
          , o = Ac(b, e, f)
          , m = o.lng
          , o = o.lat;
        if (1.0E-6 >= Bc(m, o, i, k))
            return c.lng = e,
            c.lat = f,
            c;
        for (; ; ) {
            m = e - g;
            o = f + g;
            v = e - g;
            y = f - g;
            B = e + g;
            G = f - g;
            C = e + g;
            I = f + g;
            e = Ac(b, m, o);
            n = e.lng;
            p = e.lat;
            e = Ac(b, v, y);
            w = e.lng;
            z = e.lat;
            e = Ac(b, B, G);
            D = e.lng;
            E = e.lat;
            e = Ac(b, C, I);
            H = e.lng;
            N = e.lat;
            e = Bc(n, p, i, k);
            n = Bc(w, z, i, k);
            w = Bc(D, E, i, k);
            H = Bc(H, N, i, k);
            if (1.0E-6 > e)
                return c.lng = m,
                c.lat = o,
                c;
            if (1.0E-6 > n)
                return c.lng = v,
                c.lat = y,
                c;
            if (1.0E-6 > w)
                return c.lng = B,
                c.lat = G,
                c;
            if (1.0E-6 > H)
                return c.lng = C,
                c.lat = I,
                c;
            D = 1 / e;
            n = 1 / n;
            w = 1 / w;
            H = 1 / H;
            e = (m * D + v * n + B * w + C * H) / (D + n + w + H);
            f = (o * D + y * n + G * w + I * H) / (D + n + w + H);
            o = Ac(b, e, f);
            m = o.lng;
            o = o.lat;
            if (1.0E-6 >= Bc(m, o, i, k))
                return c.lng = e,
                c.lat = f,
                c;
            g *= 0.6;
            if (1.0E-6 > g) {
                a: {
                    c = (a.lng + 0.03 - (a.lng - 0.03)) / 1.0E-4 + 0.5;
                    g = (a.lat + 0.03 - (a.lat - 0.03)) / 1.0E-4 + 0.5;
                    i = a.lng * vc;
                    k = a.lat * vc;
                    y = 1.0E-4 * vc;
                    m = i - y;
                    o = i + y;
                    v = k - y;
                    B = k + y;
                    D = n = w = H = l;
                    C = n = y = G = w = H = 0;
                    b(a);
                    D = l;
                    for (I = 0; I <= c; I++) {
                        for (e = 0; e <= g; e++)
                            if (D = b(l),
                            H = l.lng * vc,
                            w = l.lat * vc,
                            n = D.lng * vc,
                            D = D.lat * vc,
                            !(n < m || D < v || n > o || D > B)) {
                                H -= n;
                                w -= D;
                                n = Math.sqrt((i - n) * (i - n) + (k - D) * (k - D));
                                if (1 > n) {
                                    c = {};
                                    c.lng = l.lng;
                                    c.lat = l.lat;
                                    break a
                                }
                                G += 1 * H / n;
                                y += 1 * w / n;
                                C += 1 / n
                            }
                        G /= C * vc;
                        y /= C * vc
                    }
                    b = G * vc / vc;
                    g = y * vc / vc;
                    c = {};
                    c.lng = a.lng + b;
                    c.lat = a.lat + g
                }
                return c
            }
        }
    }
    function Ac(a, b, c) {
        a = a({
            lng: b,
            lat: c
        });
        b = {};
        b.lng = a.lng;
        b.lat = a.lat;
        return b
    }
    function Cc(a, b, c, e) {
        var f = arguments.length;
        this.Kg = {};
        this.Rg = {};
        0 !== f && 4 === f && this.normalize(a, b, c, e)
    }
    Cc.prototype.contains = function(a) {
        return a.lng > this.Kg.lng && a.lng < this.Rg.lng && a.lat > this.Kg.lat && a.lat < this.Rg.lat ? sc : Math.abs(a.lng - this.Kg.lng) < tc || Math.abs(a.lng - this.Rg.lng) < tc || Math.abs(a.lat - this.Kg.lat) < tc || Math.abs(a.y - this.Rg.lat) > tc ? 2 : rc
    }
    ;
    Cc.prototype.normalize = function(a, b, c, e) {
        a > c ? (this.Kg.lng = c,
        this.Rg.lng = a) : (this.Kg.lng = a,
        this.Rg.lng = c);
        b > e ? (this.Kg.lat = e,
        this.Rg.lat = b) : (this.Kg.lat = b,
        this.Rg.lat = e)
    }
    ;
    function Dc(a, b, c, e) {
        this.su = {
            lng: a,
            lat: b
        };
        this.lx = {
            lng: c,
            lat: e
        };
        this.hy = new Cc(a,b,c,e)
    }
    function Ec(a, b) {
        var c = a.lat * nc
          , e = b.lat * nc
          , f = c - e
          , g = a.lng * nc - b.lng * nc;
        return 2 * Math.asin(Math.sqrt(Math.sin(f / 2) * Math.sin(f / 2) + Math.cos(c) * Math.cos(e) * Math.sin(g / 2) * Math.sin(g / 2))) * uc
    }
    function Bc(a, b, c, e) {
        return Math.sqrt((a - c) * (a - c) + (b - e) * (b - e))
    }
    function Fc(a, b, c) {
        return (b.lng - a.lng) * (c.lat - a.lat) - (c.lng - a.lng) * (b.lat - a.lat)
    }
    function zc(a) {
        var b = {};
        if (a.lng < $b[0] - 0.4 || a.lat < $b[1] - 0.4 || a.lng > $b[2] + 0.4 || a.lat > $b[3] + 0.4)
            return b.lng = a.lng,
            b.lat = a.lat,
            b;
        if (wc(a, ic, jc))
            return b = xc(a);
        for (var b = 0, c = qc, e = 0, f = new Cc, g = 0, e = 0; e < fc; ++e)
            hc[e] <= a.lat ? hc[(e + 1) % fc] > a.lat && 0 < Fc({
                lng: gc[e],
                lat: hc[e]
            }, {
                lng: gc[(e + 1) % fc],
                lat: hc[(e + 1) % fc]
            }, a) && ++g : hc[(e + 1) % fc] <= a.lat && 0 > Fc({
                lng: gc[e],
                lat: hc[e]
            }, {
                lng: gc[(e + 1) % fc],
                lat: hc[(e + 1) % fc]
            }, a) && --g;
        if ((0 === g ? rc : sc) === rc) {
            for (g = 0; g < fc; ++g)
                if (e = new Dc(gc[g],hc[g],gc[(g + 1) % fc],hc[(g + 1) % fc]),
                f.Kg.lng = e.hy.Kg.lng - 0.5,
                f.Kg.lat = e.hy.Kg.lat - 0.5,
                f.Rg.lng = e.hy.Rg.lng + 0.5,
                f.Rg.lat = e.hy.Rg.lat + 0.5,
                f.contains(a) !== rc) {
                    var i;
                    var k = e.su.lng
                      , m = e.su.lat
                      , n = e.lx.lng
                      , o = e.lx.lat;
                    i = o - m;
                    var p = k - n;
                    !(Math.abs(i - 0) > tc) && !(Math.abs(p - 0) > tc) ? i = e.su : (k = n * m - k * o,
                    m = p * a.lng - i * a.lat,
                    n = i * i - p * p,
                    i = {
                        lng: (p * m - i * k) / n,
                        lat: -(i * m + p * k) / n
                    });
                    p = 180;
                    k = 90;
                    m = -180;
                    n = -90;
                    n = e.su;
                    o = e.lx;
                    p = n.lng < o.lng ? n.lng : o.lng;
                    k = n.lat < o.lat ? n.lat : o.lat;
                    m = n.lng < o.lng ? n.lng : o.lng;
                    n = n.lat < o.lat ? n.lat : o.lat;
                    i.lng <= m && i.lng >= p && i.lng <= n && i.lat >= k ? (e = a.lat * nc,
                    p = a.lng * nc,
                    k = i.lat * nc,
                    i = i.lng * nc,
                    m = Math.cos(e) * Math.cos(k),
                    e = m * Math.cos(p) * Math.cos(i) + m * Math.sin(p) * Math.sin(i) + Math.sin(e) * Math.sin(k),
                    -1 > e ? e = -1 : 1 < e && (e = 1),
                    e = Math.acos(e) * uc) : (i = Ec(a, e.su),
                    e = Ec(a, e.lx),
                    e = i < e ? i : e);
                    e < c && (c = e)
                }
            c < qc && (b = (qc - c) / qc)
        } else
            b = 1;
        c = xc(a);
        return b = {
            lng: a.lng + (c.lng - a.lng) * b,
            lat: a.lat + (c.lat - a.lat) * b
        }
    }
    function Gc(a) {
        var b = {};
        if (a.lng < ac[0] - 0.4 || a.lat < ac[1] - 0.4 || a.lng > ac[2] + 0.4 || a.lat > ac[3] + 0.4)
            return b.lng = a.lng,
            b.lat = a.lat,
            b;
        if (wc(a, cc, ec)) {
            var b = a.lng - oc
              , c = a.lat - pc
              , a = Math.sqrt(b * b + c * c) - Math.sin(c * kc * nc) * lc
              , b = Math.atan2(c, b) - Math.cos(b * kc * nc) * mc;
            return b = {
                lng: a * Math.cos(b),
                lat: a * Math.sin(b)
            }
        }
        c = zc(a);
        return a.lng === c.lng && a.lat === c.lng ? (b.lng = a.lng,
        b.lat = a.lat,
        b) : yc(a)
    }
    function bb(a, b) {
        if (3 === b && a instanceof P) {
            var c = zc(a);
            return new L(c.lng,c.lat)
        }
        return a
    }
    function gb(a, b) {
        if (3 === b && a instanceof L) {
            var c = Gc(a);
            return new P(c.lng,c.lat)
        }
        return 5 === b && a instanceof L ? new P(a.lng,a.lat) : a
    }
    ;function sa(a, b) {
		if (/^http/.test(a))  return;//修改  屏蔽ak验证，若调用外部资源直接返回
        if (b) {
            var c = (1E5 * Math.random()).toFixed(0);
            A._rd["_cbk" + c] = function(a) {
                b && b(a);
                delete A._rd["_cbk" + c]
            }
            ;
            a += "&callback=BMap._rd._cbk" + c
        }
        var a = pb(a)
          , e = F("script", {
            type: "text/javascript"
        });
        e.charset = "utf-8";
        e.src = a;
        e.addEventListener ? e.addEventListener("load", function(a) {
            a = a.target;
            a.parentNode.removeChild(a)
        }, t) : e.attachEvent && e.attachEvent("onreadystatechange", function() {
            var a = window.event.srcElement;
            a && ("loaded" == a.readyState || "complete" == a.readyState) && a.parentNode.removeChild(a)
        });
        setTimeout(function() {
            document.getElementsByTagName("head")[0].appendChild(e);
            e = s
        }, 1)
    }
    function Hc(a) {
        if (navigator.cookieEnabled)
            return (a = document.cookie.match(RegExp("(^| )" + a + "=([^;]*)(;|$)"))) ? unescape(a[2]) : -1;
        if (localStorage)
            return localStorage.getItem(a) ? localStorage.getItem(a) : -1;
        if (sessionStorage)
            return sessionStorage.getItem(a) ? localStorage.getItem(a) : -1
    }
    function pb(a) {
        var b = decodeURIComponent(a.substring(a.indexOf("?") + 1))
          , c = (new Date).getTime()
          , e = window.___abvk ? window.___abvk : Hc("SECKEY_ABVK")
          , f = Hc("BMAP_SECKEY")
          , a = a + "&v=3.0&seckey=" + encodeURIComponent(e + "," + f) + "&timeStamp=" + c;
        return a += Ic()(b + ("&v=3.0&seckey=" + e + "," + f + "&timeStamp=" + c))
    }
    ;var Jc = {
        map: "p4qf0c",
        common: "nis0cw",
        style: "a0jeqs",
        tile: "xfsd4l",
        groundoverlay: "zrklf2",
        pointcollection: "3s035n",
        marker: "3n511y",
        symbol: "uogwtd",
        canvablepath: "wvek1j",
        vmlcontext: "du0gez",
        markeranimation: "ammptu",
        poly: "jnctde",
        draw: "w05wlo",
        drawbysvg: "1a4gly",
        drawbyvml: "nm4biy",
        drawbycanvas: "fg2htj",
        infowindow: "lhq30d",
        oppc: "p53xdg",
        opmb: "yt4czb",
        menu: "eplqih",
        control: "4cchov",
        navictrl: "aegumj",
        geoctrl: "ufcd5m",
        copyrightctrl: "vifp1g",
        citylistcontrol: "dlszbr",
        scommon: "cplvqj",
        local: "3mm1w1",
        route: "enupft",
        othersearch: "0oo23t",
        mapclick: "uurp40",
        buslinesearch: "v3tx14",
        hotspot: "1qewju",
        autocomplete: "qfiisa",
        coordtrans: "gakur1",
        coordtransutils: "koz44d",
        convertor: "1fp54h",
        clayer: "xqrxdp",
        pservice: "3jrhow",
        pcommon: "i5scas",
        panorama: "ewdlfl",
        panoramaflash: "a2ckom"
    };
    x.Uy = function() {
        function a(a) {
            return e && !!c[b + a + "_" + Jc[a]]
        }
        var b = "BMap_"
          , c = window.localStorage
          , e = "localStorage"in window && c !== s && c !== l;
        return {
            gZ: e,
            set: function(a, g) {
                if (e) {
                    for (var i = b + a + "_", k = c.length, m; k--; )
                        m = c.key(k),
                        -1 < m.indexOf(i) && c.removeItem(m);
                    try {
                        c.setItem(b + a + "_" + Jc[a], g)
                    } catch (n) {
                        c.clear()
                    }
                }
            },
            get: function(f) {
                return e && a(f) ? c.getItem(b + f + "_" + Jc[f]) : t
            },
            qK: a
        }
    }();
    function Xa() {}
    x.object.extend(Xa, {
        Sj: {
            BG: -1,
            ZP: 0,
            xq: 1
        },
        yL: function() {
            var a = "canvablepath";
            if (!K() || !Wb())
                Vb() || (Ub() ? a = "vmlcontext" : Wb());
            return {
                tile: ["style"],
                control: [],
                marker: ["symbol"],
                symbol: ["canvablepath", "common"],
                canvablepath: "canvablepath" === a ? [] : [a],
                vmlcontext: [],
                style: [],
                poly: ["marker", "drawbycanvas", "drawbysvg", "drawbyvml"],
                drawbysvg: ["draw"],
                drawbyvml: ["draw"],
                drawbycanvas: ["draw"],
                infowindow: ["common", "marker"],
                menu: [],
                oppc: [],
                opmb: [],
                scommon: [],
                local: ["scommon"],
                route: ["scommon"],
                othersearch: ["scommon"],
                autocomplete: ["scommon"],
                citylistcontrol: ["autocomplete"],
                mapclick: ["scommon"],
                buslinesearch: ["route"],
                hotspot: [],
                coordtransutils: ["coordtrans"],
                convertor: [],
                clayer: ["tile"],
                pservice: [],
                pcommon: ["style", "pservice"],
                panorama: ["pcommon"],
                panoramaflash: ["pcommon"]
            }
        },
        Z5: {},
        sG: {
            kQ: A.pa + "getmodules?v=3.0",
            IU: 5E3
        },
        IC: t,
        Xd: {
            Nl: {},
            On: [],
            lw: []
        },
        load: function(a, b, c) {
            var e = this.qb(a);
            if (e.Re == this.Sj.xq)
                c && b();
            else {
                if (e.Re == this.Sj.BG) {
                    this.vK(a);
                    this.LN(a);
                    var f = this;
                    f.IC == t && (f.IC = q,
                    setTimeout(function() {
                        for (var a = [], b = 0, c = f.Xd.On.length; b < c; b++) {
                            var e = f.Xd.On[b]
                              , n = "";
                            ka.Uy.qK(e) ? n = ka.Uy.get(e) : (n = "",
                            a.push(e + "_" + Jc[e]));
                            f.Xd.lw.push({
                                bN: e,
                                PE: n
                            })
                        }
                        f.IC = t;
                        f.Xd.On.length = 0;
                        0 == a.length ? f.eL() : sa(f.sG.kQ + "&mod=" + a.join(","))
                    }, 1));
                    e.Re = this.Sj.ZP
                }
                e.ev.push(b)
            }
        },
        vK: function(a) {
            if (a && this.yL()[a])
                for (var a = this.yL()[a], b = 0; b < a.length; b++)
                    this.vK(a[b]),
                    this.Xd.Nl[a[b]] || this.LN(a[b])
        },
        LN: function(a) {
            for (var b = 0; b < this.Xd.On.length; b++)
                if (this.Xd.On[b] == a)
                    return;
            this.Xd.On.push(a)
        },
        z_: function(a, b) {
            var c = this.qb(a);
            try {
                eval(b)
            } catch (e) {
                return
            }
            c.Re = this.Sj.xq;
            for (var f = 0, g = c.ev.length; f < g; f++)
                c.ev[f]();
            c.ev.length = 0
        },
        qK: function(a, b) {
            var c = this;
            c.timeout = setTimeout(function() {
                c.Xd.Nl[a].Re != c.Sj.xq ? (c.remove(a),
                c.load(a, b)) : clearTimeout(c.timeout)
            }, c.sG.IU)
        },
        qb: function(a) {
            this.Xd.Nl[a] || (this.Xd.Nl[a] = {},
            this.Xd.Nl[a].Re = this.Sj.BG,
            this.Xd.Nl[a].ev = []);
            return this.Xd.Nl[a]
        },
        remove: function(a) {
            delete this.qb(a)
        },
        GV: function(a, b) {
            for (var c = this.Xd.lw, e = q, f = 0, g = c.length; f < g; f++)
                "" == c[f].PE && (c[f].bN == a ? c[f].PE = b : e = t);
            e && this.eL()
        },
        eL: function() {
            for (var a = this.Xd.lw, b = 0, c = a.length; b < c; b++)
                this.z_(a[b].bN, a[b].PE);
            this.Xd.lw.length = 0
        }
    });
    function Q(a, b) {
        this.x = a || 0;
        this.y = b || 0;
        this.x = this.x;
        this.y = this.y
    }
    Q.prototype.Vb = function(a) {
        return a && a.x == this.x && a.y == this.y
    }
    ;
    function M(a, b) {
        this.width = a || 0;
        this.height = b || 0
    }
    M.prototype.Vb = function(a) {
        return a && this.width == a.width && this.height == a.height
    }
    ;
    function qb(a, b, c) {
        var e = new XMLHttpRequest;
        e.open("POST", a, q);
        e.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        e.timeout = 1E4;
        e.ontimeout = ca();
        e.onreadystatechange = function() {
            4 === this.readyState && 200 === this.status && c && c(e.responseText)
        }
        ;
        e.send(b)
    }
    ;(function(a) {
        function b(a, b) {
            var c = (a & 65535) + (b & 65535);
            return (a >> 16) + (b >> 16) + (c >> 16) << 16 | c & 65535
        }
        function c(a, c, e, f, g, i) {
            return b(b(b(c, a), b(f, i)) << g | b(b(c, a), b(f, i)) >>> 32 - g, e)
        }
        function e(a, b, e, f, g, i, k) {
            return c(b & e | ~b & f, a, b, g, i, k)
        }
        function f(a, b, e, f, g, i, k) {
            return c(b & f | e & ~f, a, b, g, i, k)
        }
        function g(a, b, e, f, g, i, k) {
            return c(e ^ (b | ~f), a, b, g, i, k)
        }
        function i(a, i) {
            a[i >> 5] |= 128 << i % 32;
            a[(i + 64 >>> 9 << 4) + 14] = i;
            var k, m, n, o, p, E = 1732584193, C = -271733879, H = -1732584194, I = 271733878;
            for (k = 0; k < a.length; k += 16)
                m = E,
                n = C,
                o = H,
                p = I,
                E = e(E, C, H, I, a[k], 7, -680876936),
                I = e(I, E, C, H, a[k + 1], 12, -389564586),
                H = e(H, I, E, C, a[k + 2], 17, 606105819),
                C = e(C, H, I, E, a[k + 3], 22, -1044525330),
                E = e(E, C, H, I, a[k + 4], 7, -176418897),
                I = e(I, E, C, H, a[k + 5], 12, 1200080426),
                H = e(H, I, E, C, a[k + 6], 17, -1473231341),
                C = e(C, H, I, E, a[k + 7], 22, -45705983),
                E = e(E, C, H, I, a[k + 8], 7, 1770035416),
                I = e(I, E, C, H, a[k + 9], 12, -1958414417),
                H = e(H, I, E, C, a[k + 10], 17, -42063),
                C = e(C, H, I, E, a[k + 11], 22, -1990404162),
                E = e(E, C, H, I, a[k + 12], 7, 1804603682),
                I = e(I, E, C, H, a[k + 13], 12, -40341101),
                H = e(H, I, E, C, a[k + 14], 17, -1502002290),
                C = e(C, H, I, E, a[k + 15], 22, 1236535329),
                E = f(E, C, H, I, a[k + 1], 5, -165796510),
                I = f(I, E, C, H, a[k + 6], 9, -1069501632),
                H = f(H, I, E, C, a[k + 11], 14, 643717713),
                C = f(C, H, I, E, a[k], 20, -373897302),
                E = f(E, C, H, I, a[k + 5], 5, -701558691),
                I = f(I, E, C, H, a[k + 10], 9, 38016083),
                H = f(H, I, E, C, a[k + 15], 14, -660478335),
                C = f(C, H, I, E, a[k + 4], 20, -405537848),
                E = f(E, C, H, I, a[k + 9], 5, 568446438),
                I = f(I, E, C, H, a[k + 14], 9, -1019803690),
                H = f(H, I, E, C, a[k + 3], 14, -187363961),
                C = f(C, H, I, E, a[k + 8], 20, 1163531501),
                E = f(E, C, H, I, a[k + 13], 5, -1444681467),
                I = f(I, E, C, H, a[k + 2], 9, -51403784),
                H = f(H, I, E, C, a[k + 7], 14, 1735328473),
                C = f(C, H, I, E, a[k + 12], 20, -1926607734),
                E = c(C ^ H ^ I, E, C, a[k + 5], 4, -378558),
                I = c(E ^ C ^ H, I, E, a[k + 8], 11, -2022574463),
                H = c(I ^ E ^ C, H, I, a[k + 11], 16, 1839030562),
                C = c(H ^ I ^ E, C, H, a[k + 14], 23, -35309556),
                E = c(C ^ H ^ I, E, C, a[k + 1], 4, -1530992060),
                I = c(E ^ C ^ H, I, E, a[k + 4], 11, 1272893353),
                H = c(I ^ E ^ C, H, I, a[k + 7], 16, -155497632),
                C = c(H ^ I ^ E, C, H, a[k + 10], 23, -1094730640),
                E = c(C ^ H ^ I, E, C, a[k + 13], 4, 681279174),
                I = c(E ^ C ^ H, I, E, a[k], 11, -358537222),
                H = c(I ^ E ^ C, H, I, a[k + 3], 16, -722521979),
                C = c(H ^ I ^ E, C, H, a[k + 6], 23, 76029189),
                E = c(C ^ H ^ I, E, C, a[k + 9], 4, -640364487),
                I = c(E ^ C ^ H, I, E, a[k + 12], 11, -421815835),
                H = c(I ^ E ^ C, H, I, a[k + 15], 16, 530742520),
                C = c(H ^ I ^ E, C, H, a[k + 2], 23, -995338651),
                E = g(E, C, H, I, a[k], 6, -198630844),
                I = g(I, E, C, H, a[k + 7], 10, 1126891415),
                H = g(H, I, E, C, a[k + 14], 15, -1416354905),
                C = g(C, H, I, E, a[k + 5], 21, -57434055),
                E = g(E, C, H, I, a[k + 12], 6, 1700485571),
                I = g(I, E, C, H, a[k + 3], 10, -1894986606),
                H = g(H, I, E, C, a[k + 10], 15, -1051523),
                C = g(C, H, I, E, a[k + 1], 21, -2054922799),
                E = g(E, C, H, I, a[k + 8], 6, 1873313359),
                I = g(I, E, C, H, a[k + 15], 10, -30611744),
                H = g(H, I, E, C, a[k + 6], 15, -1560198380),
                C = g(C, H, I, E, a[k + 13], 21, 1309151649),
                E = g(E, C, H, I, a[k + 4], 6, -145523070),
                I = g(I, E, C, H, a[k + 11], 10, -1120210379),
                H = g(H, I, E, C, a[k + 2], 15, 718787259),
                C = g(C, H, I, E, a[k + 9], 21, -343485551),
                E = b(E, m),
                C = b(C, n),
                H = b(H, o),
                I = b(I, p);
            return [E, C, H, I]
        }
        function k(a) {
            var b, c = "", e = 32 * a.length;
            for (b = 0; b < e; b += 8)
                c += String.fromCharCode(a[b >> 5] >>> b % 32 & 255);
            return c
        }
        function m(a) {
            var b, c = [];
            c[(a.length >> 2) - 1] = l;
            for (b = 0; b < c.length; b += 1)
                c[b] = 0;
            var e = 8 * a.length;
            for (b = 0; b < e; b += 8)
                c[b >> 5] |= (a.charCodeAt(b / 8) & 255) << b % 32;
            return c
        }
        function n(a) {
            var b = "", c, e;
            for (e = 0; e < a.length; e += 1)
                c = a.charCodeAt(e),
                b += "0123456789abcdef".charAt(c >>> 4 & 15) + "0123456789abcdef".charAt(c & 15);
            return b
        }
        function o(a, b) {
            var c = unescape(encodeURIComponent(a))
              , e = unescape(encodeURIComponent(b))
              , f = m(c)
              , g = []
              , n = [];
            g[15] = n[15] = l;
            16 < f.length && (f = i(f, 8 * c.length));
            for (c = 0; 16 > c; c += 1)
                g[c] = f[c] ^ 909522486,
                n[c] = f[c] ^ 1549556828;
            e = i(g.concat(m(e)), 512 + 8 * e.length);
            return k(i(n.concat(e), 640))
        }
        function p(a, b, c) {
            return !b ? !c ? n(k(i(m(unescape(encodeURIComponent(a))), 8 * unescape(encodeURIComponent(a)).length))) : k(i(m(unescape(encodeURIComponent(a))), 8 * unescape(encodeURIComponent(a)).length)) : !c ? n(o(b, a)) : o(b, a)
        }
        "function" === typeof define && define.P2 ? define(function() {
            return p
        }) : "object" === typeof module && module.eX ? module.eX = p : a.md5 = p
    }
    )(this);
    for (var Kc = function(a, b) {
        function c(a) {
            return f(a, function(a) {
                return e(a)
            })
        }
        function e(a) {
            return g.ihxee(a, "")[g.ealca][g.ihxee(g.ihxee(m, "Char"), k)](a)
        }
        function f(a, b) {
            for (var c = "dhi"; g.xdexd(c, "aehx"); )
                switch (c) {
                case g.xecme:
                    var e = []
                      , c = "ahi";
                    break;
                case "alh":
                    return e;
                case g.adcch:
                    var f = a.length
                      , c = g.xecme;
                    break;
                case "ahi":
                    for (c = 0; c < f; c++) {
                        var i = b(a[c]);
                        e.push(i)
                    }
                    c = g.alxic
                }
        }
        var g = {
            xdexd: function(a, b) {
                return a !== b
            },
            xecme: "lel",
            adcch: "dhi",
            alxic: "alh",
            ihxee: function(a, b) {
                return a + b
            },
            ealca: "constructor",
            axdie: function(a, b) {
                return a(b)
            },
            mxemm: "1.1.2",
            ahhil: function(a, b) {
                return a + b
            },
            xlall: function(a, b) {
                return a < b
            },
            cmcmh: function(a, b, c) {
                return a(b, c)
            },
            icail: function(a, b, c) {
                return a(b, c)
            }
        }, i, k, m, n = decodeURIComponent;
        i = "de";
        m = g.ahhil("fr", "o") + "m";
        k = g.ahhil("Co", i);
        var o = c.call(e, [39, 34, 37, 96, 60, 120, 97, 65, 98, 66, 99, 67, 100, 68, 101, 69, 102, 70, 103, 110, 109, 111, 112, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57]);
        i = f([28782, 27702, 26416, 25167, 24183], function(a) {
            return n(a)
        });
        var p = c.call(i, [22354, 22749, 24415, 23346, 22257, 22688, 24306, 25174, 23595, 25547, 22984, 25690, 22212, 27547, 21594, 27210, 23090, 29193, 22394, 29368, 29532, 29459, 29530, 24146, 24500, 26352, 27441, 28788, 29370, 27673, 26925, 25249, 24430])
          , v = {};
        i = c(i);
        var w = RegExp(i.join("|"));
        for (i = 0; g.xlall(i, o.length); i++)
            v[p[i]] = o[i];
        b = g.cmcmh(f, b.split(""), function(a) {
            return v[a] || a
        }).join("");
        return g.icail(f, b.split(w), function(a) {
            return g.axdie(n, a)
        })
    }(this, "\u545a\u5ef2\u5ef2\u5e77\u545a\u5ef2\u545a\u5ef2\u6c36\u545al\u735c\u5e77\u5ef2\u56c4\u545a\u5e77\u545a\u735c\u58a0h\u706eh\u545al\u624f\u735c\u545ah\u6c36\u5ef2\u735ci\u56c4i\u6730hl\u56c4\u735cl\u5e77il\u56c4\u545al\u624f\u545a\u58a0\u5ef2\u706eh\u59c8\u545a\u5ef2\u58a0\u6c36\u5ef2l\u58a0\u624fli\u59c8h\u545a\u6730\u5ef2\u735ci\u56c4\u5ef2\u624f\u58a0\u545a\u545a\u735cl\u6730il\u5ef2\u545a\u545a\u6c36\u545a\u56c4\u5ef2\u735c\u545a\u706e\u5ef2\u5ef2\u5ef2\u59c8\u545a\u706e\u5f5f\u66f0\u6c19\u59c8\u7313\u72b8su\u735c\u545a\u5f5f\u6b31\u6b9b\u624f\u5ef2\u56c4\u5ef2\u56c4l\u706e\u5ef2\u5ef2\u59c8\u545a\u5ef2\u5e77ii\u58a0hi\u5e77\u59c8l\u735c\u5ef2\u735c\u6c36P\u6256NOR\u6256M\u6256\u6730\u545all\u735c\u56c4\u5e77l\u545a\u545al\u58a0\u706e\u58a0\u545a\u5ef2\u706eSJv\u6a4aY\u72bah\u6b31\u692dZ\u6b9bh\u72ba\u735aHS\u624fil\u56c4\u6730h\u735c\u5ef2\u6c36\u56c4\u5ef2\u56c4\u6730l\u5ef2\u56c4\u5e77\u5ef2i\u545a\u624fih\u5ef2\u5e77\u56c4\u58a0\u59c8\u5e77ll\u545a\u5e77\u56c4\u735c\u5ef2\u59c8\u545a\u624f\u58a0\u59c8l\u735cl\u624fh\u5ef2\u56c4\u6730i\u58a0\u59c8\u59c8\u5ef2\u6730hl\u59c8\u545a\u545a\u624f\u59c8\u59c8\u56c4\u56c4\u59c8\u624f\u545al\u58a0\u5e77\u56c4hh\u5e77\u58a0\u59c8\u5ef2hh\u5e77\u735c\u5ef2\u5ef2\u5ef2\u5ef2\u6730\u735a\u5ef2rs\u545a\u624f\u58a0\u545al\u545a\u545a\u706e\u545a\u59c8\u59c8\u58a0\u56c4\u5e77\u5ef2\u56c4\u58a0\u56c4\u56c4\u706e\u59c8\u545a\u58a0\u735c\u58a0\u6c36\u5ef2\u56c4\u735c\u6c36h\u56c4\u59c8\u6730\u545a\u59c8\u735c\u59c8\u735c\u624f\u5f5f\u6b31\u7209qt\u5f5f\u6b31\u6b9b\u735a\u5ef2\u72b8\u7313_\u545a\u72b8try\u5f5f\u66f0\u6c19v\u5f5f\u6b31\u6b9b\u5e77\u5a32u\u72b8\u59c8ti\u7313\u72b8\u6730\u5f5f\u66f0\u6c19\u59c8\u5ef2ll\u5c2b\u5ef2\u59c8k\u5f5f\u6b31\u6b9b\u6c36\u735cili\u5ef2\u706e\u5ef2\u5ef2h\u735c\u56c4\u624f\u545a\u5ef2h\u5ef2\u5ef2\u5e77\u5f5f\u66f0\u6c19\u5ef2k\u5f5f\u6b31\u6b9b\u6c36h\u58a0\u56c4\u59c8\u5ef2\u5e77\u56c4hi\u735cl\u706e\u5f5f\u6a4a\u6c19\u5f5f\u62a1\u66f0\u5f5f\u6256\u62a1\u5f5f\u6a4a\u5f6e\u5f5f\u5f6e\u645a\u5f5f\u62a1\u5e52\u5f5f\u6a4a\u62a1\u5f5f\u6256\u6c19\u5f5f\u62a1\u5fb4\u5f5f\u6a4a\u692d\u5f5f\u5f6e\u7074\u5f5f\u63cb\u6b31\u5f5f\u6a4a\u62a1\u5f5f\u6256\u7209\u5f5f\u63cb\u692d\u5f5f\u6a4a\u72ba\u5f5f\u62a1\u72ba\u5f5f\u6256\u62a1\u5f5f\u6a4a\u6c19\u5f5f\u5f6e\u5f6e\u5f5f\u6256\u7209\u5f5f\u6a4a\u72ba\u5f5f\u5f6e\u645a\u5f5f\u63cb\u5e52\u5f5f\u6a4a\u72ba\u5f5f\u5f6e\u63cb\u5f5f\u63cb\u6a4a\u5f5f\u6a4a\u6c19\u5f5f\u5f6e\u645a\u5f5f\u62a1\u6b9b\u5f5f\u6a4a\u72ba\u5f5f\u62a1\u6256\u5f5f\u6256\u5fb4\u5f5f\u6a4a\u7074\u5f5f\u63cb\u6b9b\u5f5f\u63cb\u7209\u5f5f\u6a4a\u692d\u5f5f\u5f6e\u7074\u5f5f\u6256\u62a1\u5f5f\u6a4a\u6c19\u5f5f\u5f6e\u6b9b\u5f5f\u62a1\u6b31\u5f5f\u6a4a\u5f6e\u5f5f\u5f6e\u5f6e\u5f5f\u5f6e\u5e52\u624f\u735c\u735c\u5ef2\u5ef2\u56c4\u6c36\u545arr\u7313r\u6730\u5f5f\u6b31\u7209qt\u5f5f\u6b31\u6b9b\u735a\u5ef2\u72b8\u7313_\u59c8\u7313u\u72b8t\u5f5f\u66f0\u6c19v\u5f5f\u6b31\u6b9b"), Lc = 406, Mc = ++Lc; --Mc; )
        Kc.push(Kc.shift());
    function V(a) {
        return Kc[a - 0]
    }
    var Pc = function(a) {
        for (var b = {
            amida: V("0x0"),
            xeeml: function(a, b) {
                return a === b
            },
            ilaee: "PANORAMA",
            aeaha: function(a, b) {
                return a + b
            },
            edame: function(a, b) {
                return a + b
            },
            aaace: V("0x1"),
            lchmm: V("0x2"),
            hldml: function(a, b) {
                return a !== b
            },
            liche: function(a, b, c) {
                return a(b, c)
            },
            ellmd: V("0x3"),
            leelx: V("0x4"),
            amidi: V("0x5"),
            aehhe: V("0x6"),
            ildel: V("0x7"),
            hceax: V("0x8")
        }, c = b[V("0x9")]; b[V("0xa")](c, b.aehhe); )
            switch (c) {
            case b[V("0xb")]:
                var e = a ? a : 5E3
                  , c = V("0xc");
                break;
            case b[V("0xd")]:
                var f = 0
                  , c = V("0x7");
                break;
            case V("0x5"):
                var g = s
                  , c = b[V("0xd")];
                break;
            case "exa":
                return function(a) {
                    for (var c = b.lchmm; b[V("0xa")](c, V("0x3")); )
                        switch (c) {
                        case V("0xe"):
                            g = b[V("0xf")](setTimeout, function() {
                                var a = {
                                    adadl: b[V("0x10")],
                                    dxadx: function(a, c) {
                                        return b[V("0x11")](a, c)
                                    },
                                    aacea: b[V("0x12")]
                                }
                                  , c = b.aeaha(b[V("0x13")](A.AN + b[V("0x14")] + A.version, "&ak="), ra) + V("0x15") + f;
                                sa(c, function(b) {
                                    var c = {
                                        iixhi: a[V("0x16")],
                                        clmam: function(a, b) {
                                            return a !== b
                                        }
                                    };
                                    (!b || a.dxadx(b[V("0x0")], l) || 0 !== b[V("0x0")]) && Nc(a[V("0x17")], function(a) {
                                        (!a || a[c[V("0x18")]] === l || c[V("0x19")](a[c[V("0x18")]], 0)) && Oc(V("0x1a"))
                                    })
                                });
                                f = 0;
                                g = s
                            }, e);
                            c = b[V("0x1b")];
                            break;
                        case V("0x2"):
                            f += a;
                            c = V("0x4");
                            break;
                        case b[V("0x1c")]:
                            if (!g) {
                                c = "alx";
                                break
                            }
                            c = V("0x3")
                        }
                }
            }
    }();
    function Qc(a, b) {
        for (var c = {
            ceiad: function(a, b) {
                return a !== b
            },
            dmace: "daam",
            xclml: "eih",
            ixcca: function(a, b) {
                return a + b
            },
            hlcee: function(a, b) {
                return a + b
            },
            ccddc: function(a, b) {
                return a + b
            },
            axadl: V("0x1d"),
            xxdxl: V("0x1e"),
            xcahh: V("0x1f"),
            maaaa: V("0x20"),
            xelee: V("0x21"),
            adxdd: V("0x22"),
            eccxd: V("0x23"),
            cexmx: V("0x24"),
            caeii: function(a, b) {
                return a(b)
            },
            ahala: "elx",
            ecmmh: V("0x25"),
            ecmcm: V("0x26")
        }, e = "adm"; c.ceiad(e, c[V("0x27")]); )
            switch (e) {
            case c[V("0x28")]:
                o = b.ZV ? b.ZV : 1;
                e = V("0x29");
                break;
            case V("0x26"):
                var f = c[V("0x2a")](c[V("0x2a")](c[V("0x2b")](c[V("0x2c")](c[V("0x2c")](a, "-") + c.ccddc(v, m), "-"), i) + "-" + ra, "-"), g)
                  , e = V("0x24");
                break;
            case c.axadl:
                p && Pc(o);
                e = V("0x2d");
                break;
            case "lad":
                var g = c.xxdxl
                  , e = V("0x2e");
                break;
            case "hdc":
                e = !b ? c[V("0x2f")] : c[V("0x28")];
                break;
            case c[V("0x30")]:
                var i = Date[V("0x31")](new Date)
                  , e = V("0x25");
                break;
            case V("0x1f"):
                o = 1;
                e = c[V("0x32")];
                break;
            case c[V("0x32")]:
                p = q;
                e = c.adxdd;
                break;
            case c[V("0x33")]:
                var k = c[V("0x2c")](c[V("0x2c")](c[V("0x2c")](c[V("0x2c")](c[V("0x2c")]("auth_key=", c[V("0x2c")](v, m)), "-"), i) + "-", ra), "-") + n
                  , e = "xea";
                break;
            case V("0x29"):
                p = b.Hp === t ? t : q;
                e = c[V("0x34")];
                break;
            case V("0x2e"):
                var m = 1800
                  , e = c[V("0x30")];
                break;
            case c[V("0x35")]:
                var n = c.caeii(md5, f)
                  , e = c[V("0x33")];
                break;
            case c.ahala:
                return k;
            case V("0x36"):
                var o, p, e = V("0x37");
                break;
            case c.ecmmh:
                var v = i / 1E3
                  , e = c[V("0x38")]
            }
    }
    function Nc(a, b) {
        var c = {
            milia: function(a, b) {
                return a + b
            },
            aahmd: function(a, b) {
                return a + b
            },
            eahaa: V("0x39"),
            cxhah: function(a, b) {
                return a === b
            },
            hxdca: V("0x3a"),
            dhiml: V("0x3b")
        };
        switch (a) {
        case V("0x1a"):
            var e = c[V("0x3c")](c[V("0x3d")](c.aahmd(A.AN, c[V("0x3e")]), A.version) + V("0x3f"), ra);
            c.cxhah(typeof b, c[V("0x40")]) ? sa(e, b) : sa(c[V("0x3d")](c[V("0x3d")](e, c[V("0x41")]), b))
        }
    }
    function Oc(a) {
        var b = {
            cxihl: function(a, b) {
                return a(b)
            },
            mmaad: V("0x42")
        };
        switch (a) {
        case V("0x1a"):
            b.cxihl(alert, b[V("0x43")])
        }
    }
    ;function Ic() {
        function a(a) {
            return b[a - 0]
        }
        var b = function(a, b) {
            function f(a) {
                var b = {
                    eexem: function(a, b) {
                        return k.aaxeh(a, b)
                    }
                };
                return i(a, function(a) {
                    return b.eexem(g, a)
                })
            }
            function g(a) {
                return (a + "").constructor[k.aamcc(k.aamcc(o, "Char"), n)](a)
            }
            function i(a, b) {
                for (var c = k.aedal; k.ledia(c, k.hmmhe); )
                    switch (c) {
                    case "aed":
                        var e = []
                          , c = k.dmaai;
                        break;
                    case "ahd":
                        for (c = 0; c < g; c++) {
                            var f = b(a[c]);
                            e.push(f)
                        }
                        c = "dxa";
                        break;
                    case "mee":
                        var g = a.length
                          , c = k.icihe;
                        break;
                    case k.ecaae:
                        return e
                    }
            }
            var k = {
                aedal: "mee",
                ledia: function(a, b) {
                    return a !== b
                },
                hmmhe: "iicx",
                dmaai: "ahd",
                icihe: "aed",
                ecaae: "dxa",
                aamcc: function(a, b) {
                    return a + b
                },
                aaxeh: function(a, b) {
                    return a(b)
                },
                hidxa: function(a, b) {
                    return a(b)
                },
                ahacc: function(a, b) {
                    return a < b
                },
                ddddm: function(a, b, c) {
                    return a(b, c)
                },
                aaaxe: function(a, b, c) {
                    return a(b, c)
                }
            }, m, n, o, p = decodeURIComponent;
            m = "de";
            o = k.aamcc("fro", "m");
            n = k.aamcc("Co", m);
            var v = f.call(g, [39, 34, 37, 96, 60, 120, 97, 65, 98, 66, 99, 67, 100, 68, 101, 69, 102, 70, 103, 110, 109, 111, 112, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57]);
            m = i([28782, 27702, 26416, 25167, 24183], function(a) {
                return k.aaxeh(p, a)
            });
            var w = f.call(m, [22354, 22749, 24415, 23346, 22257, 22688, 24306, 25174, 23595, 25547, 22984, 25690, 22212, 27547, 21594, 27210, 23090, 29193, 22394, 29368, 29532, 29459, 29530, 24146, 24500, 26352, 27441, 28788, 29370, 27673, 26925, 25249, 24430])
              , y = {};
            m = k.hidxa(f, m);
            var z = RegExp(m.join("|"));
            for (m = 0; k.ahacc(m, v.length); m++)
                y[w[m]] = v[m];
            b = k.ddddm(i, b.split(""), function(a) {
                return y[a] || a
            }).join("");
            return k.aaaxe(i, b.split(z), function(a) {
                return p(a)
            })
        }(this, "\u5f5f\u66f0\u6c19si\u577a\u72b8\u5f5f\u6b31\u6b9b\u6730\u58a0lh\u6730\u5ef2i\u5ef2\u5e77H\u5e52\u6256\u5f6eP\u62a1P\u692dY\u6c19\u6256\u63cbQO\u5e52\u6730\u545a\u59c8\u545ai\u545a\u6730\u59c8\u5ef2h\u735ch\u5e77\u7209\u72baL\u66f0O\u6c19R\u6c19\u6256\u6b9b\u62a1\u5f6e\u5f6e\u5e52O\u5e77\u545a\u56c4iih\u624f\u58a0\u59c8\u58a0\u5ef2\u5ef2\u6c36l\u545a\u72b8\u577ath\u6c36l\u59c8i\u59c8\u545a\u624f\u545a\u58a0\u5ef2l\u59c8\u6730h\u58a0\u56c4\u735c\u56c4\u706e\u5ef2\u5ef2\u59c8\u56c4\u545a\u5e77l\u545a\u545a\u58a0\u706el\u545al\u5e77\u56c4\u735c\u59c8");
        (function(a, b) {
            for (var f = ++b; --f; )
                a.push(a.shift())
        }
        )(b, 456);
        return function(b) {
            for (var e = {
                eceie: function(a, b) {
                    return a !== b
                },
                ilahl: a("0x0"),
                cahmh: a("0x1"),
                ediih: a("0x2"),
                xcxaa: function(a, b) {
                    return a + b
                },
                dmmam: a("0x3"),
                lcice: a("0x4"),
                exalc: function(a, b) {
                    return a(b)
                },
                hxdmd: a("0x5"),
                aacde: a("0x6")
            }, f = "lel"; e[a("0x7")](f, e.ilahl); )
                switch (f) {
                case e[a("0x8")]:
                    var g = a("0x9")
                      , f = a("0x5");
                    break;
                case e[a("0xa")]:
                    return e[a("0xb")](e.dmmam, i.substring(i[a("0xc")] - 12));
                case e[a("0xd")]:
                    var i = e[a("0xe")](md5, md5(b + g) + k)
                      , f = "dmc";
                    break;
                case e[a("0xf")]:
                    var k = e[a("0x10")]
                      , f = a("0x4")
                }
        }
    }
    ;function ob(a, b) {
        a && (this.Ob = a,
        this.da = "spot" + ob.da++,
        b = b || {},
        this.nh = b.text || "",
        this.Qv = b.offsets ? b.offsets.slice(0) : [5, 5, 5, 5],
        this.NB = b.userData || s,
        this.Wh = b.minZoom || s,
        this.Pf = b.maxZoom || s)
    }
    ob.da = 0;
    x.extend(ob.prototype, {
        za: function(a) {
            this.Wh == s && (this.Wh = a.M.kc);
            this.Pf == s && (this.Pf = a.M.qc)
        },
        va: function(a) {
            if (a instanceof P || a instanceof L)
                this.Ob = a
        },
        ma: u("Ob"),
        lu: da("nh"),
        ZD: u("nh"),
        setUserData: da("NB"),
        getUserData: u("NB")
    });
    function Rc() {
        this.P = s;
        this.Pb = "control";
        this.Xa = this.hK = q
    }
    x.lang.xa(Rc, x.lang.Ja, "Control");
    x.extend(Rc.prototype, {
        initialize: function(a) {
            this.P = a;
            if (this.R)
                return a.cb.appendChild(this.R),
                this.R
        },
        Le: function(a) {
            !this.R && (this.initialize && db(this.initialize)) && (this.R = this.initialize(a));
            this.m = this.m || {
                Qg: t
            };
            this.BB();
            this.Ur();
            this.R && (this.R.wr = this)
        },
        BB: function() {
            var a = this.R;
            if (a) {
                var b = a.style;
                b.position = "absolute";
                b.zIndex = this.av || "10";
                b.MozUserSelect = "none";
                b.WebkitTextSizeAdjust = "none";
                this.m.Qg || x.U.ib(a, "BMap_noprint");
                K() || x.V(a, "contextmenu", pa)
            }
        },
        remove: function() {
            this.P = s;
            this.R && (this.R.parentNode && this.R.parentNode.removeChild(this.R),
            this.R = this.R.wr = s)
        },
        Ha: function() {
            this.R = Ib(this.P.cb, "<div unselectable='on'></div>");
            this.Xa == t && x.U.aa(this.R);
            return this.R
        },
        Ur: function() {
            this.wc(this.m.anchor)
        },
        wc: function(a) {
            if (this.Q2 || !cb(a) || isNaN(a) || a < Sc || 3 < a)
                a = this.defaultAnchor;
            this.m = this.m || {
                Qg: t
            };
            this.m.Ga = this.m.Ga || this.defaultOffset;
            var b = this.m.anchor;
            this.m.anchor = a;
            if (this.R) {
                var c = this.R
                  , e = this.m.Ga.width
                  , f = this.m.Ga.height;
                c.style.left = c.style.top = c.style.right = c.style.bottom = "auto";
                switch (a) {
                case Sc:
                    c.style.top = f + "px";
                    c.style.left = e + "px";
                    break;
                case Tc:
                    c.style.top = f + "px";
                    c.style.right = e + "px";
                    break;
                case Uc:
                    c.style.bottom = f + "px";
                    c.style.left = e + "px";
                    break;
                case 3:
                    c.style.bottom = f + "px",
                    c.style.right = e + "px"
                }
                c = ["TL", "TR", "BL", "BR"];
                x.U.rc(this.R, "anchor" + c[b]);
                x.U.ib(this.R, "anchor" + c[a])
            }
        },
        CD: function() {
            return this.m.anchor
        },
        getContainer: u("R"),
        Rd: function(a) {
            a instanceof M && (this.m = this.m || {
                Qg: t
            },
            this.m.Ga = new M(a.width,a.height),
            this.R && this.wc(this.m.anchor))
        },
        yj: function() {
            return this.m.Ga
        },
        ed: u("R"),
        show: function() {
            this.Xa != q && (this.Xa = q,
            this.R && x.U.show(this.R))
        },
        aa: function() {
            this.Xa != t && (this.Xa = t,
            this.R && x.U.aa(this.R))
        },
        isPrintable: function() {
            return !!this.m.Qg
        },
        Uc: function() {
            return !this.R && !this.P ? t : !!this.Xa
        }
    });
    var Sc = 0
      , Tc = 1
      , Uc = 2;
    function rb(a) {
        Rc.call(this);
        a = a || {};
        this.m = {
            Qg: t,
            FF: a.showZoomInfo || q,
            anchor: a.anchor,
            Ga: a.offset,
            type: a.type,
            XW: a.enableGeolocation || t
        };
        this.defaultAnchor = K() ? 3 : Sc;
        this.defaultOffset = new M(10,10);
        this.wc(a.anchor);
        this.xn(a.type);
        this.Gf()
    }
    x.lang.xa(rb, Rc, "NavigationControl");
    x.extend(rb.prototype, {
        initialize: function(a) {
            this.P = a;
            return this.R
        },
        xn: function(a) {
            this.m.type = cb(a) && 0 <= a && 3 >= a ? a : 0
        },
        Bp: function() {
            return this.m.type
        },
        Gf: function() {
            var a = this;
            Xa.load("navictrl", function() {
                a.Ff()
            })
        }
    });
    function Vc(a) {
        Rc.call(this);
        a = a || {};
        this.m = {
            anchor: a.anchor || Uc,
            Ga: a.offset || new M(10,30),
            i0: a.showAddressBar !== t,
            A3: a.enableAutoLocation || t,
            UM: a.locationIcon || s
        };
        var b = this;
        this.av = 1200;
        b.f1 = [];
        this.ue = [];
        Xa.load("geoctrl", function() {
            (function e() {
                if (0 !== b.ue.length) {
                    var a = b.ue.shift();
                    b[a.method].apply(b, a.arguments);
                    e()
                }
            }
            )();
            b.jQ()
        });
        Va(Oa)
    }
    x.lang.xa(Vc, Rc, "GeolocationControl");
    x.extend(Vc.prototype, {
        location: function() {
            this.ue.push({
                method: "location",
                arguments: arguments
            })
        },
        getAddressComponent: fa(s)
    });
    function Wc(a) {
        Rc.call(this);
        a = a || {};
        this.m = {
            Qg: t,
            anchor: a.anchor,
            Ga: a.offset
        };
        this.hc = [];
        this.defaultAnchor = Uc;
        this.defaultOffset = new M(5,2);
        this.wc(a.anchor);
        this.hK = t;
        this.Gf()
    }
    x.lang.xa(Wc, Rc, "CopyrightControl");
    x.object.extend(Wc.prototype, {
        initialize: function(a) {
            this.P = a;
            return this.R
        },
        Iw: function(a) {
            if (a && cb(a.id) && !isNaN(a.id)) {
                var b = {
                    bounds: s,
                    content: ""
                }, c;
                for (c in a)
                    b[c] = a[c];
                if (a = this.Fm(a.id))
                    for (var e in b)
                        a[e] = b[e];
                else
                    this.hc.push(b)
            }
        },
        Fm: function(a) {
            for (var b = 0, c = this.hc.length; b < c; b++)
                if (this.hc[b].id == a)
                    return this.hc[b]
        },
        KD: u("hc"),
        dF: function(a) {
            for (var b = 0, c = this.hc.length; b < c; b++)
                this.hc[b].id == a && (r = this.hc.splice(b, 1),
                b--,
                c = this.hc.length)
        },
        Gf: function() {
            var a = this;
            Xa.load("copyrightctrl", function() {
                a.Ff()
            })
        }
    });
    function tb(a) {
        Rc.call(this);
        a = a || {};
        this.m = {
            Qg: t,
            size: a.size || new M(150,150),
            padding: 5,
            eb: a.isOpen === q ? q : t,
            y1: 4,
            Ga: a.offset,
            anchor: a.anchor
        };
        this.defaultAnchor = 3;
        this.defaultOffset = new M(0,0);
        this.Oq = this.Pq = 13;
        this.wc(a.anchor);
        this.He(this.m.size);
        this.Gf()
    }
    x.lang.xa(tb, Rc, "OverviewMapControl");
    x.extend(tb.prototype, {
        initialize: function(a) {
            this.P = a;
            return this.R
        },
        wc: function(a) {
            Rc.prototype.wc.call(this, a)
        },
        ve: function() {
            this.ve.xo = q;
            this.m.eb = !this.m.eb;
            this.R || (this.ve.xo = t)
        },
        He: function(a) {
            a instanceof M || (a = new M(150,150));
            a.width = 0 < a.width ? a.width : 150;
            a.height = 0 < a.height ? a.height : 150;
            this.m.size = a
        },
        wb: function() {
            return this.m.size
        },
        eb: function() {
            return this.m.eb
        },
        Gf: function() {
            var a = this;
            Xa.load("control", function() {
                a.Ff()
            })
        }
    });
    function Xc(a) {
        Rc.call(this);
        a = a || {};
        this.defaultAnchor = Sc;
        this.EV = a.canCheckSize === t ? t : q;
        this.rj = "";
        this.defaultOffset = new M(10,10);
        this.onChangeBefore = [];
        this.onChangeAfter = [];
        this.onChangeSuccess = [];
        this.m = {
            Qg: t,
            Ga: a.offset || this.defaultOffset,
            anchor: a.anchor || this.defaultAnchor,
            expand: !!a.expand
        };
        a.onChangeBefore && db(a.onChangeBefore) && this.onChangeBefore.push(a.onChangeBefore);
        a.onChangeAfter && db(a.onChangeAfter) && this.onChangeAfter.push(a.onChangeAfter);
        a.onChangeSuccess && db(a.onChangeSuccess) && this.onChangeSuccess.push(a.onChangeSuccess);
        this.wc(a.anchor);
        this.Gf()
    }
    x.lang.xa(Xc, Rc, "CityListControl");
    x.object.extend(Xc.prototype, {
        initialize: function(a) {
            this.P = a;
            return this.R
        },
        Gf: function() {
            var a = this;
            Xa.load("citylistcontrol", function() {
                a.Ff()
            }, q)
        }
    });
    function sb(a) {
        Rc.call(this);
        a = a || {};
        this.m = {
            Qg: t,
            color: "black",
            kd: "metric",
            Ga: a.offset
        };
        this.defaultAnchor = Uc;
        this.defaultOffset = new M(81,18);
        this.wc(a.anchor);
        this.gi = {
            metric: {
                name: "metric",
                xK: 1,
                nM: 1E3,
                VO: "\u7c73",
                WO: "\u516c\u91cc"
            },
            us: {
                name: "us",
                xK: 3.2808,
                nM: 5280,
                VO: "\u82f1\u5c3a",
                WO: "\u82f1\u91cc"
            }
        };
        this.gi[this.m.kd] || (this.m.kd = "metric");
        this.$I = s;
        this.vI = {};
        this.Gf()
    }
    x.lang.xa(sb, Rc, "ScaleControl");
    x.object.extend(sb.prototype, {
        initialize: function(a) {
            this.P = a;
            return this.R
        },
        cl: function(a) {
            this.m.color = a + ""
        },
        X3: function() {
            return this.m.color
        },
        BF: function(a) {
            this.m.kd = this.gi[a] && this.gi[a].name || this.m.kd
        },
        xY: function() {
            return this.m.kd
        },
        Gf: function() {
            var a = this;
            Xa.load("control", function() {
                a.Ff()
            })
        }
    });
    var Yc = 0;
    function ub(a) {
        Rc.call(this);
        a = a || {};
        this.defaultAnchor = Tc;
        this.defaultOffset = new M(10,10);
        this.m = {
            Qg: t,
            Bh: [Ra, eb, Wa, Ua],
            pW: ["B_DIMENSIONAL_MAP", "B_SATELLITE_MAP", "B_NORMAL_MAP"],
            type: a.type || Yc,
            Ga: a.offset || this.defaultOffset,
            aX: q
        };
        this.wc(a.anchor);
        "[object Array]" == Object.prototype.toString.call(a.mapTypes) && (this.m.Bh = a.mapTypes.slice(0));
        this.Gf()
    }
    x.lang.xa(ub, Rc, "MapTypeControl");
    x.object.extend(ub.prototype, {
        initialize: function(a) {
            this.P = a;
            return this.R
        },
        Vy: function(a) {
            this.P.ko = a
        },
        Gf: function() {
            var a = this;
            Xa.load("control", function() {
                a.Ff()
            }, q)
        }
    });
    function Zc(a) {
        Rc.call(this);
        a = a || {};
        this.m = {
            Qg: t,
            Ga: a.offset,
            anchor: a.anchor
        };
        this.fj = t;
        this.qw = s;
        this.FI = new $c({
            Xe: "api"
        });
        this.GI = new ad(s,{
            Xe: "api"
        });
        this.defaultAnchor = Tc;
        this.defaultOffset = new M(10,10);
        this.wc(a.anchor);
        this.Gf();
        Va(Aa)
    }
    x.lang.xa(Zc, Rc, "PanoramaControl");
    x.extend(Zc.prototype, {
        initialize: function(a) {
            this.P = a;
            return this.R
        },
        Gf: function() {
            var a = this;
            Xa.load("control", function() {
                a.Ff()
            })
        }
    });
    function cd(a) {
        x.lang.Ja.call(this);
        this.m = {
            cb: s,
            cursor: "default"
        };
        this.m = x.extend(this.m, a);
        this.Pb = "contextmenu";
        this.P = s;
        this.Da = [];
        this.Rf = [];
        this.Je = [];
        this.bx = this.As = s;
        this.Vh = t;
        var b = this;
        Xa.load("menu", function() {
            b.ob()
        })
    }
    x.lang.xa(cd, x.lang.Ja, "ContextMenu");
    x.object.extend(cd.prototype, {
        za: function(a, b) {
            this.P = a;
            this.Rl = b || s
        },
        remove: function() {
            this.P = this.Rl = s
        },
        ks: function(a) {
            if (a && !("menuitem" != a.Pb || "" == a.nh || 0 >= a.mj)) {
                for (var b = 0, c = this.Da.length; b < c; b++)
                    if (this.Da[b] === a)
                        return;
                this.Da.push(a);
                this.Rf.push(a)
            }
        },
        removeItem: function(a) {
            if (a && "menuitem" == a.Pb) {
                for (var b = 0, c = this.Da.length; b < c; b++)
                    this.Da[b] === a && (this.Da[b].remove(),
                    this.Da.splice(b, 1),
                    c--);
                b = 0;
                for (c = this.Rf.length; b < c; b++)
                    this.Rf[b] === a && (this.Rf[b].remove(),
                    this.Rf.splice(b, 1),
                    c--)
            }
        },
        YB: function() {
            this.Da.push({
                Pb: "divider",
                $j: this.Je.length
            });
            this.Je.push({
                U: s
            })
        },
        gF: function(a) {
            if (this.Je[a]) {
                for (var b = 0, c = this.Da.length; b < c; b++)
                    this.Da[b] && ("divider" == this.Da[b].Pb && this.Da[b].$j == a) && (this.Da.splice(b, 1),
                    c--),
                    this.Da[b] && ("divider" == this.Da[b].Pb && this.Da[b].$j > a) && this.Da[b].$j--;
                this.Je.splice(a, 1)
            }
        },
        ed: u("R"),
        show: function() {
            this.Vh != q && (this.Vh = q)
        },
        aa: function() {
            this.Vh != t && (this.Vh = t)
        },
        O_: function(a) {
            a && (this.m.cursor = a)
        },
        getItem: function(a) {
            return this.Rf[a]
        }
    });
    var dd = J.ta + "menu_zoom_in.png"
      , ed = J.ta + "menu_zoom_out.png";
    function fd(a, b, c) {
        if (a && db(b)) {
            x.lang.Ja.call(this);
            this.m = {
                width: 100,
                id: "",
                Sm: ""
            };
            c = c || {};
            this.m.width = 1 * c.width ? c.width : 100;
            this.m.id = c.id ? c.id : "";
            this.m.Sm = c.iconUrl ? c.iconUrl : "";
            this.nh = a + "";
            this.Ez = b;
            this.P = s;
            this.Pb = "menuitem";
            this.as = this.Gv = this.R = this.Qh = s;
            this.Th = q;
            var e = this;
            Xa.load("menu", function() {
                e.ob()
            })
        }
    }
    x.lang.xa(fd, x.lang.Ja, "MenuItem");
    x.object.extend(fd.prototype, {
        za: function(a, b) {
            this.P = a;
            this.Qh = b
        },
        remove: function() {
            this.P = this.Qh = s
        },
        lu: function(a) {
            a && (this.nh = a + "")
        },
        Xb: function(a) {
            a && (this.m.Sm = a)
        },
        ed: u("R"),
        enable: function() {
            this.Th = q
        },
        disable: function() {
            this.Th = t
        }
    });
    function lb(a, b) {
        a && !b && (b = a);
        this.Me = this.be = this.Se = this.de = this.nf = this.kf = s;
        a && (this.nf = new P(a.lng,a.lat),
        this.kf = new P(b.lng,b.lat),
        this.Se = a.lng,
        this.de = a.lat,
        this.Me = b.lng,
        this.be = b.lat)
    }
    x.object.extend(lb.prototype, {
        Gj: function() {
            return !this.nf || !this.kf
        },
        Vb: function(a) {
            return !(a instanceof lb) || this.Gj() ? t : this.Be().Vb(a.Be()) && this.tf().Vb(a.tf())
        },
        Be: u("nf"),
        tf: u("kf"),
        VV: function(a) {
            return !(a instanceof lb) || this.Gj() || a.Gj() ? t : a.Se > this.Se && a.Me < this.Me && a.de > this.de && a.be < this.be
        },
        Hb: function() {
            return this.Gj() ? s : new P((this.Se + this.Me) / 2,(this.de + this.be) / 2)
        },
        yt: function(a) {
            if (!(a instanceof lb) || Math.max(a.Se, a.Me) < Math.min(this.Se, this.Me) || Math.min(a.Se, a.Me) > Math.max(this.Se, this.Me) || Math.max(a.de, a.be) < Math.min(this.de, this.be) || Math.min(a.de, a.be) > Math.max(this.de, this.be))
                return s;
            var b = Math.max(this.Se, a.Se)
              , c = Math.min(this.Me, a.Me)
              , e = Math.max(this.de, a.de)
              , a = Math.min(this.be, a.be);
            return new lb(new P(b,e),new P(c,a))
        },
        ws: function(a) {
            return !(a instanceof P || a instanceof L) || this.Gj() ? t : a.lng >= this.Se && a.lng <= this.Me && a.lat >= this.de && a.lat <= this.be
        },
        extend: function(a) {
            if (a instanceof P || a instanceof L) {
                var b = a.lng
                  , a = a.lat;
                this.nf || (this.nf = new P(0,0));
                this.kf || (this.kf = new P(0,0));
                if (!this.Se || this.Se > b)
                    this.nf.lng = this.Se = b;
                if (!this.Me || this.Me < b)
                    this.kf.lng = this.Me = b;
                if (!this.de || this.de > a)
                    this.nf.lat = this.de = a;
                if (!this.be || this.be < a)
                    this.kf.lat = this.be = a
            }
        },
        TF: function() {
            return this.Gj() ? new P(0,0) : new P(Math.abs(this.Me - this.Se),Math.abs(this.be - this.de))
        }
    });
    function P(a, b) {
        isNaN(a) && (a = Sb(a),
        a = isNaN(a) ? 0 : a);
        fb(a) && (a = parseFloat(a));
        isNaN(b) && (b = Sb(b),
        b = isNaN(b) ? 0 : b);
        fb(b) && (b = parseFloat(b));
        this.lng = a;
        this.lat = b
    }
    P.sE = function(a) {
        return a && 180 >= a.lng && -180 <= a.lng && 74 >= a.lat && -74 <= a.lat
    }
    ;
    P.prototype.Vb = function(a) {
        return a && this.lat == a.lat && this.lng == a.lng
    }
    ;
    function L(a, b) {
        isNaN(a) && (a = Sb(a),
        a = isNaN(a) ? 0 : a);
        fb(a) && (a = parseFloat(a));
        isNaN(b) && (b = Sb(b),
        b = isNaN(b) ? 0 : b);
        fb(b) && (b = parseFloat(b));
        this.lng = a;
        this.lat = b;
        this.Xe = "inner"
    }
    L.sE = function(a) {
        return a && 180 >= a.lng && -180 <= a.lng && 74 >= a.lat && -74 <= a.lat
    }
    ;
    L.prototype.Vb = function(a) {
        return a && this.lat == a.lat && this.lng == a.lng
    }
    ;
    function gd() {}
    gd.prototype.Lg = function() {
        aa("lngLatToPoint\u65b9\u6cd5\u672a\u5b9e\u73b0")
    }
    ;
    gd.prototype.Kj = function() {
        aa("pointToLngLat\u65b9\u6cd5\u672a\u5b9e\u73b0")
    }
    ;
    function hd() {}
    ;var kb = {
        zK: function(a, b, c) {
            Xa.load("coordtransutils", function() {
                kb.gV(a, b, c)
            }, q)
        },
        yK: function(a, b, c) {
            Xa.load("coordtransutils", function() {
                kb.fV(a, b, c)
            }, q)
        }
    };
    function id() {
        this.Qa = [];
        var a = this;
        Xa.load("convertor", function() {
            a.hQ()
        })
    }
    x.xa(id, x.lang.Ja, "Convertor");
    x.extend(id.prototype, {
        translate: function(a, b, c, e) {
            this.Qa.push({
                method: "translate",
                arguments: [a, b, c, e]
            })
        }
    });
    U(id.prototype, {
        translate: id.prototype.translate
    });
    function R() {}
    R.prototype = new gd;
    x.extend(R, {
        BP: 6370996.81,
        FG: [1.289059486E7, 8362377.87, 5591021, 3481989.83, 1678043.12, 0],
        Su: [86, 60, 45, 30, 15, 0],
        HP: [[1.410526172116255E-8, 8.98305509648872E-6, -1.9939833816331, 200.9824383106796, -187.2403703815547, 91.6087516669843, -23.38765649603339, 2.57121317296198, -0.03801003308653, 1.73379812E7], [-7.435856389565537E-9, 8.983055097726239E-6, -0.78625201886289, 96.32687599759846, -1.85204757529826, -59.36935905485877, 47.40033549296737, -16.50741931063887, 2.28786674699375, 1.026014486E7], [-3.030883460898826E-8, 8.98305509983578E-6, 0.30071316287616, 59.74293618442277, 7.357984074871, -25.38371002664745, 13.45380521110908, -3.29883767235584, 0.32710905363475, 6856817.37], [-1.981981304930552E-8, 8.983055099779535E-6, 0.03278182852591, 40.31678527705744, 0.65659298677277, -4.44255534477492, 0.85341911805263, 0.12923347998204, -0.04625736007561, 4482777.06], [3.09191371068437E-9, 8.983055096812155E-6, 6.995724062E-5, 23.10934304144901, -2.3663490511E-4, -0.6321817810242, -0.00663494467273, 0.03430082397953, -0.00466043876332, 2555164.4], [2.890871144776878E-9, 8.983055095805407E-6, -3.068298E-8, 7.47137025468032, -3.53937994E-6, -0.02145144861037, -1.234426596E-5, 1.0322952773E-4, -3.23890364E-6, 826088.5]],
        CG: [[-0.0015702102444, 111320.7020616939, 1704480524535203, -10338987376042340, 26112667856603880, -35149669176653700, 26595700718403920, -10725012454188240, 1800819912950474, 82.5], [8.277824516172526E-4, 111320.7020463578, 6.477955746671607E8, -4.082003173641316E9, 1.077490566351142E10, -1.517187553151559E10, 1.205306533862167E10, -5.124939663577472E9, 9.133119359512032E8, 67.5], [0.00337398766765, 111320.7020202162, 4481351.045890365, -2.339375119931662E7, 7.968221547186455E7, -1.159649932797253E8, 9.723671115602145E7, -4.366194633752821E7, 8477230.501135234, 52.5], [0.00220636496208, 111320.7020209128, 51751.86112841131, 3796837.749470245, 992013.7397791013, -1221952.21711287, 1340652.697009075, -620943.6990984312, 144416.9293806241, 37.5], [-3.441963504368392E-4, 111320.7020576856, 278.2353980772752, 2485758.690035394, 6070.750963243378, 54821.18345352118, 9540.606633304236, -2710.55326746645, 1405.483844121726, 22.5], [-3.218135878613132E-4, 111320.7020701615, 0.00369383431289, 823725.6402795718, 0.46104986909093, 2351.343141331292, 1.58060784298199, 8.77738589078284, 0.37238884252424, 7.45]],
        d4: function(a, b) {
            if (!a || !b)
                return 0;
            var c, e, a = this.Zb(a);
            if (!a)
                return 0;
            c = this.ll(a.lng);
            e = this.ll(a.lat);
            b = this.Zb(b);
            return !b ? 0 : this.Nd(c, this.ll(b.lng), e, this.ll(b.lat))
        },
        Lk: function(a, b) {
            if (!a || !b)
                return 0;
            a.lng = this.QD(a.lng, -180, 180);
            a.lat = this.VD(a.lat, -80, 84);
            b.lng = this.QD(b.lng, -180, 180);
            b.lat = this.VD(b.lat, -80, 84);
            return this.Nd(this.ll(a.lng), this.ll(b.lng), this.ll(a.lat), this.ll(b.lat))
        },
        Zb: function(a) {
            if (a === s || a === l)
                return new L(0,0);
            var b, c;
            b = new L(Math.abs(a.lng),Math.abs(a.lat));
            for (var e = 0; e < this.FG.length; e++)
                if (b.lat >= this.FG[e]) {
                    c = this.HP[e];
                    break
                }
            a = this.AK(a, c);
            return a = new L(a.lng,a.lat)
        },
        Sa: function(a) {
            if (a === s || a === l || 180 < a.lng || -180 > a.lng || 90 < a.lat || -90 > a.lat)
                return new L(0,0);
            var b, c;
            a.lng = this.QD(a.lng, -180, 180);
            a.lat = this.VD(a.lat, -85, 85);
            b = new L(a.lng,a.lat);
            for (var e = 0; e < this.Su.length; e++)
                if (b.lat >= this.Su[e]) {
                    c = this.CG[e];
                    break
                }
            if (!c)
                for (e = 0; e < this.Su.length; e++)
                    if (b.lat <= -this.Su[e]) {
                        c = this.CG[e];
                        break
                    }
            a = this.AK(a, c);
            return a = new L(a.lng,a.lat)
        },
        AK: function(a, b) {
            if (a && b) {
                var c = b[0] + b[1] * Math.abs(a.lng)
                  , e = Math.abs(a.lat) / b[9]
                  , e = b[2] + b[3] * e + b[4] * e * e + b[5] * e * e * e + b[6] * e * e * e * e + b[7] * e * e * e * e * e + b[8] * e * e * e * e * e * e
                  , c = c * (0 > a.lng ? -1 : 1)
                  , e = e * (0 > a.lat ? -1 : 1);
                return new L(c,e)
            }
        },
        Nd: function(a, b, c, e) {
            return this.BP * Math.acos(Math.sin(c) * Math.sin(e) + Math.cos(c) * Math.cos(e) * Math.cos(b - a))
        },
        ll: function(a) {
            return Math.PI * a / 180
        },
        I6: function(a) {
            return 180 * a / Math.PI
        },
        VD: function(a, b, c) {
            b != s && (a = Math.max(a, b));
            c != s && (a = Math.min(a, c));
            return a
        },
        QD: function(a, b, c) {
            for (; a > c; )
                a -= c - b;
            for (; a < b; )
                a += c - b;
            return a
        }
    });
    x.extend(R.prototype, {
        zi: function(a) {
            return R.Sa(a)
        },
        Lg: function(a) {
            a = R.Sa(a);
            return new Q(a.lng,a.lat)
        },
        Dh: function(a) {
            return R.Zb(a)
        },
        Kj: function(a) {
            a = new L(a.x,a.y);
            a = R.Zb(a);
            return new P(a.lng,a.lat)
        },
        vc: function(a, b, c, e, f) {
            if (a)
                return a = this.zi(a, f),
                b = this.Wb(b),
                new Q(Math.round((a.lng - c.lng) / b + e.width / 2),Math.round((c.lat - a.lat) / b + e.height / 2))
        },
        zZ: function(a, b, c, e) {
            if (a)
                return b = this.Wb(b),
                new Q(Math.round((a.lng - c.lng) / b + e.width / 2),Math.round((c.lat - a.lat) / b + e.height / 2))
        },
        cc: function(a, b, c, e, f) {
            if (a)
                return b = this.Wb(b),
                this.Dh(new L(c.lng + b * (a.x - e.width / 2),c.lat - b * (a.y - e.height / 2)), f)
        },
        wy: function(a, b, c, e) {
            if (a)
                return b = this.Wb(b),
                new L(c.lng + b * (a.x - e.width / 2),c.lat - b * (a.y - e.height / 2))
        },
        Wb: function(a) {
            return Math.pow(2, 18 - a)
        },
        eO: da("Ma")
    });
    function nb() {
        this.rj = "bj"
    }
    nb.prototype = new R;
    x.extend(nb.prototype, {
        zi: function(a, b) {
            return this.TQ(b, R.Sa(a))
        },
        Dh: function(a, b) {
            return R.Zb(this.UQ(b, a))
        },
        lngLatToPointFor3D: function(a, b) {
            var c = this
              , e = R.Sa(a);
            Xa.load("coordtrans", function() {
                var a = hd.TD(c.rj || "bj", e)
                  , a = new Q(a.x,a.y);
                b && b(a)
            }, q)
        },
        pointToLngLatFor3D: function(a, b) {
            var c = this
              , e = new P(a.x,a.y);
            Xa.load("coordtrans", function() {
                var a = hd.RD(c.rj || "bj", e)
                  , a = new P(a.lng,a.lat)
                  , a = R.Zb(a);
                b && b(a)
            }, q)
        },
        TQ: function(a, b) {
            if (Xa.qb("coordtrans").Re == Xa.Sj.xq) {
                var c = hd.TD(a || "bj", b);
                return new P(c.x,c.y)
            }
            Xa.load("coordtrans", ca());
            return new P(0,0)
        },
        UQ: function(a, b) {
            if (Xa.qb("coordtrans").Re == Xa.Sj.xq) {
                var c = hd.RD(a || "bj", b);
                return new P(c.lng,c.lat)
            }
            Xa.load("coordtrans", ca());
            return new P(0,0)
        },
        Wb: function(a) {
            return Math.pow(2, 20 - a)
        },
        eO: da("Ma")
    });
    function jd() {
        this.Pb = "overlay"
    }
    x.lang.xa(jd, x.lang.Ja, "Overlay");
    jd.Rk = function(a) {
        a *= 1;
        return !a ? 0 : 1E5 * (90 - a) << 1
    }
    ;
    x.extend(jd.prototype, {
        Le: function(a) {
            if (!this.ca && db(this.initialize) && (this.ca = this.initialize(a)))
                this.ca.style.WebkitUserSelect = "none";
            this.draw()
        },
        initialize: function() {
            aa("initialize\u65b9\u6cd5\u672a\u5b9e\u73b0")
        },
        draw: function() {
            aa("draw\u65b9\u6cd5\u672a\u5b9e\u73b0")
        },
        remove: function() {
            this.ca && this.ca.parentNode && this.ca.parentNode.removeChild(this.ca);
            this.ca = s;
            this.dispatchEvent(new O("onremove"))
        },
        aa: function() {
            this.ca && x.U.aa(this.ca)
        },
        show: function() {
            this.ca && x.U.show(this.ca)
        },
        Uc: function() {
            return !this.ca || "none" == this.ca.style.display || "hidden" == this.ca.style.visibility ? t : q
        }
    });
    A.df(function(a) {
        function b(a, b) {
            var c = F("div")
              , i = c.style;
            i.position = "absolute";
            i.top = i.left = i.width = i.height = "0";
            i.zIndex = b;
            a.appendChild(c);
            return c
        }
        var c = a.ba;
        c.Wc = a.Wc = b(a.platform, 200);
        a.ce.vD = b(c.Wc, 800);
        a.ce.KE = b(c.Wc, 700);
        a.ce.kL = b(c.Wc, 600);
        a.ce.CE = b(c.Wc, 500);
        a.ce.YM = b(c.Wc, 400);
        a.ce.ZM = b(c.Wc, 300);
        a.ce.gP = b(c.Wc, 201);
        a.ce.Mt = b(c.Wc, 200)
    });
    function mb() {
        x.lang.Ja.call(this);
        jd.call(this);
        this.map = s;
        this.Xa = q;
        this.Fb = s;
        this.rH = 0
    }
    x.lang.xa(mb, jd, "OverlayInternal");
    x.extend(mb.prototype, {
        initialize: function(a) {
            this.map = a;
            x.lang.Ja.call(this, this.da);
            return s
        },
        zx: u("map"),
        draw: ca(),
        Uj: ca(),
        remove: function() {
            this.map = s;
            x.lang.fx(this.da);
            jd.prototype.remove.call(this)
        },
        aa: function() {
            this.Xa !== t && (this.Xa = t)
        },
        show: function() {
            this.Xa !== q && (this.Xa = q)
        },
        Uc: function() {
            return !this.ca ? t : !!this.Xa
        },
        Ta: u("ca"),
        dO: function(a) {
            var a = a || {}, b;
            for (b in a)
                this.K[b] = a[b]
        },
        kq: da("zIndex"),
        wj: function() {
            this.K.wj = q
        },
        zW: function() {
            this.K.wj = t
        },
        jm: da("rg"),
        Xp: function() {
            this.rg = s
        }
    });
    function kd() {
        this.map = s;
        this.ua = {};
        this.Ie = []
    }
    A.df(function(a) {
        var b = new kd;
        b.map = a;
        a.ua = b.ua;
        a.Ie = b.Ie;
        a.addEventListener("load", function(a) {
            b.draw(a)
        });
        a.addEventListener("moveend", function(a) {
            b.draw(a)
        });
        x.ga.oa && 8 > x.ga.oa || "BackCompat" === document.compatMode ? a.addEventListener("zoomend", function(a) {
            setTimeout(function() {
                b.draw(a)
            }, 20)
        }) : a.addEventListener("zoomend", function(a) {
            b.draw(a)
        });
        a.addEventListener("maptypechange", function(a) {
            b.draw(a)
        });
        a.addEventListener("addoverlay", function(a) {
            a = a.target;
            if (a instanceof mb)
                b.ua[a.da] || (b.ua[a.da] = a);
            else {
                for (var e = t, f = 0, g = b.Ie.length; f < g; f++)
                    if (b.Ie[f] === a) {
                        e = q;
                        break
                    }
                e || b.Ie.push(a)
            }
        });
        a.addEventListener("removeoverlay", function(a) {
            a = a.target;
            if (a instanceof mb)
                delete b.ua[a.da];
            else
                for (var e = 0, f = b.Ie.length; e < f; e++)
                    if (b.Ie[e] === a) {
                        b.Ie.splice(e, 1);
                        break
                    }
        });
        a.addEventListener("clearoverlays", function() {
            this.Mc();
            for (var a in b.ua)
                b.ua[a].K.wj && (b.ua[a].remove(),
                delete b.ua[a]);
            a = 0;
            for (var e = b.Ie.length; a < e; a++)
                b.Ie[a].enableMassClear !== t && (b.Ie[a].remove(),
                b.Ie[a] = s,
                b.Ie.splice(a, 1),
                a--,
                e--)
        });
        a.addEventListener("infowindowopen", function() {
            var a = this.Fb;
            a && (x.U.aa(a.Cc),
            x.U.aa(a.dc))
        });
        a.addEventListener("movestart", function() {
            this.wh() && this.wh().gJ()
        });
        a.addEventListener("moveend", function() {
            this.wh() && this.wh().VI()
        })
    });
    kd.prototype.draw = function(a) {
        if (A.Aq) {
            var b = A.Aq.bt(this.map);
            "canvas" === b.Pb && b.canvas && b.OQ(b.canvas.getContext("2d"))
        }
        for (var c in this.ua)
            this.ua[c].draw(a);
        x.oc.Rb(this.Ie, function(a) {
            a.draw()
        });
        this.map.ba.xb && this.map.ba.xb.va();
        A.Aq && b.xF()
    }
    ;
    function ld(a) {
        mb.call(this);
        a = a || {};
        this.K = {
            strokeColor: a.strokeColor || "#3a6bdb",
            tc: a.strokeWeight || 5,
            Ad: a.strokeOpacity || 0.65,
            strokeStyle: a.strokeStyle || "solid",
            wj: a.enableMassClear === t ? t : q,
            Ok: s,
            Km: s,
            ze: a.enableEditing === q ? q : t,
            cN: 5,
            d1: t,
            of: a.enableClicking === t ? t : q,
            wi: a.icons && 0 < a.icons.length ? a.icons : s,
            vX: a.geodesic === q ? q : t,
            GE: a.linkRight === q ? q : t
        };
        0 >= this.K.tc && (this.K.tc = 5);
        if (0 > this.K.Ad || 1 < this.K.Ad)
            this.K.Ad = 0.65;
        if (0 > this.K.Dg || 1 < this.K.Dg)
            this.K.Dg = 0.65;
        "solid" != this.K.strokeStyle && "dashed" != this.K.strokeStyle && (this.K.strokeStyle = "solid");
        this.ca = s;
        this.$u = new lb(0,0);
        this.lf = [];
        this.uc = [];
        this.Ya = {}
    }
    x.lang.xa(ld, mb, "Graph");
    ld.vx = function(a) {
        var b = [];
        if (!a)
            return b;
        fb(a) && x.oc.Rb(a.split(";"), function(a) {
            a = a.split(",");
            b.push(new P(a[0],a[1]))
        });
        "[object Array]" == Object.prototype.toString.apply(a) && 0 < a.length && (b = a);
        return b
    }
    ;
    ld.VE = [0.09, 0.0050, 1.0E-4, 1.0E-5];
    x.extend(ld.prototype, {
        initialize: function(a) {
            this.map = a;
            return s
        },
        draw: ca(),
        Tr: function(a) {
            this.lf.length = 0;
            this.ja = ld.vx(a).slice(0);
            this.Nh()
        },
        Sd: function(a) {
            this.Tr(a)
        },
        Nh: function() {
            if (this.ja) {
                var a = this;
                a.$u = new lb;
                x.oc.Rb(this.ja, function(b) {
                    a.$u.extend(b)
                })
            }
        },
        Ze: u("ja"),
        wn: function(a, b) {
            b && this.ja[a] && (this.lf.length = 0,
            this.ja[a] = new P(b.lng,b.lat),
            this.Nh())
        },
        setStrokeColor: function(a) {
            this.K.strokeColor = a
        },
        oY: function() {
            return this.K.strokeColor
        },
        jq: function(a) {
            0 < a && (this.K.tc = a)
        },
        PL: function() {
            return this.K.tc
        },
        hq: function(a) {
            a == l || (1 < a || 0 > a) || (this.K.Ad = a)
        },
        pY: function() {
            return this.K.Ad
        },
        fu: function(a) {
            1 < a || 0 > a || (this.K.Dg = a)
        },
        KX: function() {
            return this.K.Dg
        },
        iq: function(a) {
            "solid" != a && "dashed" != a || (this.K.strokeStyle = a)
        },
        OL: function() {
            return this.K.strokeStyle
        },
        setFillColor: function(a) {
            this.K.fillColor = a || ""
        },
        JX: function() {
            return this.K.fillColor
        },
        ke: u("$u"),
        remove: function() {
            this.map && this.map.removeEventListener("onmousemove", this.Dv);
            mb.prototype.remove.call(this);
            this.lf.length = 0
        },
        ze: function() {
            if (!(2 > this.ja.length)) {
                this.K.ze = q;
                var a = this;
                Xa.load("poly", function() {
                    a.zk()
                }, q)
            }
        },
        yW: function() {
            this.K.ze = t;
            var a = this;
            Xa.load("poly", function() {
                a.li()
            }, q)
        },
        GX: function() {
            return this.K.ze
        },
        NX: function() {
            for (var a = [], b = 0; b < this.ja.length - 1; b++)
                var c = this.AV(this.ja[b], this.ja[b + 1])
                  , a = a.concat(c);
            return a = a.concat(this.ja[this.ja.length - 1])
        },
        AV: function(a, b) {
            if (a.Vb(b))
                return [a];
            var c = R.Nd(S(a.lng), S(a.lat), S(b.lng), S(b.lat))
              , c = R.Lk(a, b);
            if (25E4 > c)
                return [a];
            var e = []
              , c = Math.round(c / 15E4)
              , f = this.kK(a, b);
            e.push(a);
            for (var g = 0; g < c; g++) {
                var i = this.lK(a, b, g / c, f);
                e.push(i)
            }
            e.push(b);
            return e
        },
        lK: function(a, b, c, e) {
            var f = S(a.lat)
              , g = S(b.lat)
              , a = S(a.lng)
              , i = S(b.lng)
              , b = Math.sin((1 - c) * e) / Math.sin(e)
              , c = Math.sin(c * e) / Math.sin(e)
              , e = b * Math.cos(f) * Math.cos(a) + c * Math.cos(g) * Math.cos(i)
              , a = b * Math.cos(f) * Math.sin(a) + c * Math.cos(g) * Math.sin(i);
            return new P(180 * (Math.atan2(a, e) / Math.PI),180 * (Math.atan2(b * Math.sin(f) + c * Math.sin(g), Math.sqrt(Math.pow(e, 2) + Math.pow(a, 2))) / Math.PI))
        },
        kK: function(a, b) {
            var c = S(a.lat)
              , e = S(b.lat);
            return Math.acos(Math.sin(c) * Math.sin(e) + Math.cos(c) * Math.cos(e) * Math.cos(Math.abs(S(b.lng) - S(a.lng))))
        }
    });
    function md(a) {
        mb.call(this);
        this.ca = this.map = s;
        this.K = {
            width: 0,
            height: 0,
            Ga: new M(0,0),
            opacity: 1,
            background: "transparent",
            by: 1,
            LM: "#000",
            qZ: "solid",
            point: s
        };
        this.dO(a);
        this.point = this.K.point
    }
    x.lang.xa(md, mb, "Division");
    x.extend(md.prototype, {
        Uj: function() {
            var a = this.K
              , b = this.content
              , c = ['<div class="BMap_Division" style="position:absolute;'];
            c.push("width:" + a.width + "px;display:block;");
            c.push("overflow:hidden;");
            "none" != a.borderColor && c.push("border:" + a.by + "px " + a.qZ + " " + a.LM + ";");
            c.push("opacity:" + a.opacity + "; filter:(opacity=" + 100 * a.opacity + ")");
            c.push("background:" + a.background + ";");
            c.push('z-index:60;">');
            c.push(b);
            c.push("</div>");
            this.ca = Ib(this.map.Zf().KE, c.join(""))
        },
        initialize: function(a) {
            this.map = a;
            this.Uj();
            this.ca && x.V(this.ca, K() ? "touchstart" : "mousedown", function(a) {
                oa(a)
            });
            return this.ca
        },
        draw: function() {
            var a = this.map.cf(this.K.point);
            this.K.Ga = new M(-Math.round(this.K.width / 2) - Math.round(this.K.by),-Math.round(this.K.height / 2) - Math.round(this.K.by));
            this.ca.style.left = a.x + this.K.Ga.width + "px";
            this.ca.style.top = a.y + this.K.Ga.height + "px"
        },
        ma: function() {
            return this.K.point
        },
        p2: function() {
            return this.map.uo(this.ma())
        },
        va: function(a) {
            this.K.point = a;
            this.draw()
        },
        P_: function(a, b) {
            this.K.width = Math.round(a);
            this.K.height = Math.round(b);
            this.ca && (this.ca.style.width = this.K.width + "px",
            this.ca.style.height = this.K.height + "px",
            this.draw())
        }
    });
    function nd(a, b, c) {
        a && b && (this.imageUrl = a,
        this.size = b,
        a = new M(Math.floor(b.width / 2),Math.floor(b.height / 2)),
        c = c || {},
        a = c.anchor || a,
        b = c.imageOffset || new M(0,0),
        this.imageSize = c.imageSize,
        this.anchor = a,
        this.imageOffset = b,
        this.infoWindowAnchor = c.infoWindowAnchor || this.anchor,
        this.printImageUrl = c.printImageUrl || "")
    }
    x.extend(nd.prototype, {
        fO: function(a) {
            a && (this.imageUrl = a)
        },
        f0: function(a) {
            a && (this.printImageUrl = a)
        },
        He: function(a) {
            a && (this.size = new M(a.width,a.height))
        },
        wc: function(a) {
            a && (this.anchor = new M(a.width,a.height))
        },
        gu: function(a) {
            a && (this.imageOffset = new M(a.width,a.height))
        },
        U_: function(a) {
            a && (this.infoWindowAnchor = new M(a.width,a.height))
        },
        R_: function(a) {
            a && (this.imageSize = new M(a.width,a.height))
        },
        toString: fa("Icon")
    });
    function od(a, b) {
        if (a) {
            b = b || {};
            this.style = {
                anchor: b.anchor || new M(0,0),
                fillColor: b.fillColor || "#000",
                Dg: b.fillOpacity || 0,
                scale: b.scale || 1,
                rotation: b.rotation || 0,
                strokeColor: b.strokeColor || "#000",
                Ad: b.strokeOpacity || 1,
                tc: b.strokeWeight
            };
            this.Pb = "number" === typeof a ? a : "UserDefined";
            this.Vi = this.style.anchor;
            this.Cr = new M(0,0);
            this.anchor = s;
            this.nB = a;
            var c = this;
            Xa.load("symbol", function() {
                c.Tn()
            }, q)
        }
    }
    x.extend(od.prototype, {
        setPath: da("nB"),
        setAnchor: function(a) {
            this.Vi = this.style.anchor = a
        },
        setRotation: function(a) {
            this.style.rotation = a
        },
        setScale: function(a) {
            this.style.scale = a
        },
        setStrokeWeight: function(a) {
            this.style.tc = a
        },
        setStrokeColor: function(a) {
            a = x.ss.yC(a, this.style.Ad);
            this.style.strokeColor = a
        },
        setStrokeOpacity: function(a) {
            this.style.Ad = a
        },
        setFillOpacity: function(a) {
            this.style.Dg = a
        },
        setFillColor: function(a) {
            this.style.fillColor = a
        }
    });
    function pd(a, b, c, e) {
        a && (this.Vv = {},
        this.iL = e ? !!e : t,
        this.ad = [],
        this.x0 = a instanceof od ? a : s,
        this.LI = b === l ? q : !!(b.indexOf("%") + 1),
        this.pk = isNaN(parseFloat(b)) ? 1 : this.LI ? parseFloat(b) / 100 : parseFloat(b),
        this.MI = !!(c.indexOf("%") + 1),
        this.repeat = c != l ? this.MI ? parseFloat(c) / 100 : parseFloat(c) : 0)
    }
    ;function qd(a, b) {
        x.lang.Ja.call(this);
        this.content = a;
        this.map = s;
        b = b || {};
        this.K = {
            width: b.width || 0,
            height: b.height || 0,
            maxWidth: b.maxWidth || 730,
            Ga: b.offset || new M(0,0),
            title: b.title || "",
            ME: b.maxContent || "",
            uh: b.enableMaximize || t,
            Ss: b.enableAutoPan === t ? t : q,
            eD: b.enableCloseOnClick === t ? t : q,
            margin: b.margin || [10, 10, 40, 10],
            uC: b.collisions || [[10, 10], [10, 10], [10, 10], [10, 10]],
            LY: t,
            PZ: b.onClosing || fa(q),
            bL: t,
            jD: b.enableParano === q ? q : t,
            message: b.message,
            mD: b.enableSearchTool === q ? q : t,
            Lx: b.headerContent || "",
            fD: b.enableContentScroll || t
        };
        if (0 != this.K.width && (220 > this.K.width && (this.K.width = 220),
        730 < this.K.width))
            this.K.width = 730;
        if (0 != this.K.height && (60 > this.K.height && (this.K.height = 60),
        650 < this.K.height))
            this.K.height = 650;
        if (0 != this.K.maxWidth && (220 > this.K.maxWidth && (this.K.maxWidth = 220),
        730 < this.K.maxWidth))
            this.K.maxWidth = 730;
        this.me = t;
        this.Qi = J.ta;
        this.yb = s;
        var c = this;
        Xa.load("infowindow", function() {
            c.ob()
        })
    }
    x.lang.xa(qd, x.lang.Ja, "InfoWindow");
    x.extend(qd.prototype, {
        setWidth: function(a) {
            !a && 0 != a || (isNaN(a) || 0 > a) || (0 != a && (220 > a && (a = 220),
            730 < a && (a = 730)),
            this.K.width = a)
        },
        setHeight: function(a) {
            !a && 0 != a || (isNaN(a) || 0 > a) || (0 != a && (60 > a && (a = 60),
            650 < a && (a = 650)),
            this.K.height = a)
        },
        jO: function(a) {
            !a && 0 != a || (isNaN(a) || 0 > a) || (0 != a && (220 > a && (a = 220),
            730 < a && (a = 730)),
            this.K.maxWidth = a)
        },
        Hc: function(a) {
            this.K.title = a
        },
        getTitle: function() {
            return this.K.title
        },
        Pc: da("content"),
        Kk: u("content"),
        iu: function(a) {
            this.K.ME = a + ""
        },
        re: ca(),
        Ss: function() {
            this.K.Ss = q
        },
        disableAutoPan: function() {
            this.K.Ss = t
        },
        enableCloseOnClick: function() {
            this.K.eD = q
        },
        disableCloseOnClick: function() {
            this.K.eD = t
        },
        uh: function() {
            this.K.uh = q
        },
        hx: function() {
            this.K.uh = t
        },
        show: function() {
            this.Xa = q
        },
        aa: function() {
            this.Xa = t
        },
        close: function() {
            this.aa()
        },
        gy: function() {
            this.me = q
        },
        restore: function() {
            this.me = t
        },
        Uc: function() {
            return this.eb()
        },
        eb: fa(t),
        ma: function() {
            if (this.yb && this.yb.ma)
                return this.yb.ma()
        },
        yj: function() {
            return this.K.Ga
        }
    });
    Qa.prototype.Vc = function(a, b) {
        if (a instanceof qd && (b instanceof P || b instanceof L)) {
            var c = this.ba;
            c.Wm ? c.Wm.va(b) : (c.Wm = new W(b,{
                icon: new nd(J.ta + "blank.gif",{
                    width: 1,
                    height: 1
                }),
                offset: new M(0,0),
                clickable: t
            }),
            c.Wm.OR = 1);
            this.Ra(c.Wm);
            c.Wm.Vc(a)
        }
    }
    ;
    Qa.prototype.Mc = function() {
        var a = this.ba.xb || this.ba.Gl;
        a && a.yb && a.yb.Mc()
    }
    ;
    mb.prototype.Vc = function(a) {
        this.map && (this.map.Mc(),
        a.Xa = q,
        this.map.ba.Gl = a,
        a.yb = this,
        x.lang.Ja.call(a, a.da))
    }
    ;
    mb.prototype.Mc = function() {
        this.map && this.map.ba.Gl && (this.map.ba.Gl.Xa = t,
        x.lang.fx(this.map.ba.Gl.da),
        this.map.ba.Gl = s)
    }
    ;
    function rd(a, b) {
        mb.call(this);
        this.content = a;
        this.ca = this.map = s;
        b = b || {};
        this.K = {
            width: 0,
            Ga: b.offset || new M(0,0),
            oq: {
                backgroundColor: "#fff",
                border: "1px solid #f00",
                padding: "1px",
                whiteSpace: "nowrap",
                font: "12px " + J.fontFamily,
                zIndex: "80",
                MozUserSelect: "none"
            },
            position: b.position || s,
            wj: b.enableMassClear === t ? t : q,
            of: q
        };
        0 > this.K.width && (this.K.width = 0);
        Ob(b.enableClicking) && (this.K.of = b.enableClicking);
        this.point = this.K.position;
        var c = this;
        Xa.load("marker", function() {
            c.ob()
        })
    }
    x.lang.xa(rd, mb, "Label");
    x.extend(rd.prototype, {
        ma: function() {
            return this.oo ? this.oo.ma() : this.map ? gb(this.point, this.map.M.Ma) : this.point
        },
        hk: function() {
            return this.oo ? this.oo.hk() : this.point
        },
        va: function(a) {
            if ((a instanceof P || a instanceof L) && !this.Ax())
                this.point = this.K.position = new P(a.lng,a.lat)
        },
        Pc: da("content"),
        wF: function(a) {
            0 <= a && 1 >= a && (this.K.opacity = a)
        },
        Rd: function(a) {
            a instanceof M && (this.K.Ga = new M(a.width,a.height))
        },
        yj: function() {
            return this.K.Ga
        },
        Td: function(a) {
            a = a || {};
            this.K.oq = x.extend(this.K.oq, a)
        },
        Ki: function(a) {
            return this.Td(a)
        },
        Hc: function(a) {
            this.K.title = a || ""
        },
        getTitle: function() {
            return this.K.title
        },
        iO: function(a) {
            this.point = (this.oo = a) ? this.K.position = a.hk() : this.K.position = s
        },
        Ax: function() {
            return this.oo || s
        },
        Kk: u("content")
    });
    function sd(a, b) {
        if (0 !== arguments.length) {
            mb.apply(this, arguments);
            b = b || {};
            this.K = {
                jb: a,
                opacity: b.opacity || 1,
                Fp: b.imageURL || "",
                Js: b.displayOnMinLevel || 1,
                wj: b.enableMassClear === t ? t : q,
                Is: b.displayOnMaxLevel || 19,
                r0: b.stretch || t
            };
            0 === b.opacity && (this.K.opacity = 0);
            var c = this;
            Xa.load("groundoverlay", function() {
                c.ob()
            })
        }
    }
    x.lang.xa(sd, mb, "GroundOverlay");
    x.extend(sd.prototype, {
        setBounds: function(a) {
            this.K.jb = a
        },
        getBounds: function() {
            return this.K.jb
        },
        setOpacity: function(a) {
            this.K.opacity = a
        },
        getOpacity: function() {
            return this.K.opacity
        },
        setImageURL: function(a) {
            this.K.Fp = a
        },
        getImageURL: function() {
            return this.K.Fp
        },
        setDisplayOnMinLevel: function(a) {
            this.K.Js = a
        },
        getDisplayOnMinLevel: function() {
            return this.K.Js
        },
        setDisplayOnMaxLevel: function(a) {
            this.K.Is = a
        },
        getDisplayOnMaxLevel: function() {
            return this.K.Is
        }
    });
    var td = 3
      , ud = 4;
    function vd() {
        var a = document.createElement("canvas");
        return !(!a.getContext || !a.getContext("2d"))
    }
    function wd(a, b) {
        var c = this;
        vd() && (a === l && aa(Error("\u6ca1\u6709\u4f20\u5165points\u6570\u636e")),
        "[object Array]" !== Object.prototype.toString.call(a) && aa(Error("points\u6570\u636e\u4e0d\u662f\u6570\u7ec4")),
        b = b || {},
        mb.apply(c, arguments),
        c.ia = {
            ja: a
        },
        c.K = {
            shape: b.shape || td,
            size: b.size || ud,
            color: b.color || "#fa937e",
            wj: q
        },
        this.kB = [],
        this.ue = [],
        Xa.load("pointcollection", function() {
            for (var a = 0, b; b = c.kB[a]; a++)
                c[b.method].apply(c, b.arguments);
            for (a = 0; b = c.ue[a]; a++)
                c[b.method].apply(c, b.arguments)
        }))
    }
    x.lang.xa(wd, mb, "PointCollection");
    x.extend(wd.prototype, {
        initialize: function(a) {
            this.kB && this.kB.push({
                method: "initialize",
                arguments: arguments
            })
        },
        setPoints: function(a) {
            this.ue && this.ue.push({
                method: "setPoints",
                arguments: arguments
            })
        },
        setStyles: function(a) {
            this.ue && this.ue.push({
                method: "setStyles",
                arguments: arguments
            })
        },
        clear: function() {
            this.ue && this.ue.push({
                method: "clear",
                arguments: arguments
            })
        },
        remove: function() {
            this.ue && this.ue.push({
                method: "remove",
                arguments: arguments
            })
        }
    });
    var xd = new nd(J.ta + "marker_red_sprite.png",new M(19,25),{
        anchor: new M(10,25),
        infoWindowAnchor: new M(10,0)
    })
      , yd = new nd(J.ta + "marker_red_sprite.png",new M(20,11),{
        anchor: new M(6,11),
        imageOffset: new M(-19,-13)
    });
    function W(a, b) {
        mb.call(this);
        b = b || {};
        this.point = a;
        this.Ma = (this.Lq = this.map = s) ? this.map.M.Ma : 5;
        this.K = {
            Ga: b.offset || new M(0,0),
            Ce: b.icon || xd,
            el: yd,
            title: b.title || "",
            label: s,
            fK: b.baseZIndex || 0,
            of: q,
            i7: t,
            yE: t,
            wj: b.enableMassClear === t ? t : q,
            jc: t,
            NN: b.raiseOnDrag === q ? q : t,
            UN: t,
            Ld: b.draggingCursor || J.Ld,
            rotation: b.rotation || 0
        };
        b.icon && !b.shadow && (this.K.el = s);
        b.enableDragging && (this.K.jc = b.enableDragging);
        Ob(b.enableClicking) && (this.K.of = b.enableClicking);
        var c = this;
        Xa.load("marker", function() {
            c.ob()
        })
    }
    W.Vu = jd.Rk(-90) + 1E6;
    W.wG = W.Vu + 1E6;
    x.lang.xa(W, mb, "Marker");
    x.extend(W.prototype, {
        Xb: function(a) {
            if (a instanceof nd || a instanceof od)
                this.K.Ce = a
        },
        sp: function() {
            return this.K.Ce
        },
        Ny: function(a) {
            a instanceof nd && (this.K.el = a)
        },
        getShadow: function() {
            return this.K.el
        },
        Lj: function(a) {
            this.K.label = a || s
        },
        ct: function() {
            return this.K.label
        },
        jc: function() {
            this.K.jc = q
        },
        Hs: function() {
            this.K.jc = t
        },
        hk: u("point"),
        ma: function() {
            return this.point instanceof P || this.point instanceof L ? this.map ? gb(this.point, this.map.M.Ma) : new P(this.point.lng,this.point.lat) : this.point
        },
        va: function(a) {
            if (a instanceof P || a instanceof L)
                this.point = this.map ? bb(a, this.map.M.Ma) : new L(a.lng,a.lat)
        },
        Li: function(a, b) {
            this.K.yE = !!a;
            a && (this.UG = b || 0)
        },
        Hc: function(a) {
            this.K.title = a + ""
        },
        getTitle: function() {
            return this.K.title
        },
        Rd: function(a) {
            a instanceof M && (this.K.Ga = a)
        },
        yj: function() {
            return this.K.Ga
        },
        nn: da("Lq"),
        Ly: function(a) {
            this.K.rotation = a
        },
        LL: function() {
            return this.K.rotation
        }
    });
    function zd(a) {
        this.options = a || {};
        this.TZ = this.options.paneName || "labelPane";
        this.zIndex = this.options.zIndex || 0;
        this.WV = this.options.contextType || "2d"
    }
    zd.prototype = new jd;
    zd.prototype.initialize = function(a) {
        this.P = a;
        var b = this.canvas = document.createElement("canvas")
          , c = this.canvas.getContext(this.WV);
        b.style.cssText = "position:absolute;left:0;top:0;z-index:" + this.zIndex + ";";
        Ad(this);
        Bd(c);
        a.getPanes()[this.TZ].appendChild(b);
        var e = this;
        a.addEventListener("resize", function() {
            Ad(e);
            Bd(c);
            e.ob()
        });
        return this.canvas
    }
    ;
    function Ad(a) {
        var b = a.P.wb()
          , a = a.canvas;
        a.width = b.width;
        a.height = b.height;
        a.style.width = a.width + "px";
        a.style.height = a.height + "px"
    }
    function Bd(a) {
        var b = (window.devicePixelRatio || 1) / (a.jV || a.d7 || a.A5 || a.B5 || a.F5 || a.jV || 1)
          , c = a.canvas.width
          , e = a.canvas.height;
        a.canvas.width = c * b;
        a.canvas.height = e * b;
        a.canvas.style.width = c + "px";
        a.canvas.style.height = e + "px";
        a.scale(b, b)
    }
    zd.prototype.draw = function() {
        var a = this
          , b = arguments;
        clearTimeout(a.G0);
        a.G0 = setTimeout(function() {
            a.ob.apply(a, b)
        }, 15)
    }
    ;
    ga = zd.prototype;
    ga.ob = function() {
        var a = this.P;
        this.canvas.style.left = -a.offsetX + "px";
        this.canvas.style.top = -a.offsetY + "px";
        this.dispatchEvent("draw");
        this.options.update && this.options.update.apply(this, arguments)
    }
    ;
    ga.Ta = u("canvas");
    ga.show = function() {
        this.canvas || this.P.Ra(this);
        this.canvas.style.display = "block"
    }
    ;
    ga.aa = function() {
        this.canvas.style.display = "none"
    }
    ;
    ga.kq = function(a) {
        this.canvas.style.zIndex = a
    }
    ;
    ga.Rk = u("zIndex");
    function Cd(a, b) {
        ld.call(this, b);
        b = b || {};
        this.K.Dg = b.fillOpacity ? b.fillOpacity : 0.65;
        this.K.fillColor = "" == b.fillColor ? "" : b.fillColor ? b.fillColor : "#fff";
        this.Sd(a);
        var c = this;
        Xa.load("poly", function() {
            c.ob()
        })
    }
    x.lang.xa(Cd, ld, "Polygon");
    x.extend(Cd.prototype, {
        Sd: function(a, b) {
            this.Ho = ld.vx(a).slice(0);
            var c = ld.vx(a).slice(0);
            1 < c.length && c.push(new P(c[0].lng,c[0].lat));
            ld.prototype.Sd.call(this, c, b)
        },
        wn: function(a, b) {
            this.Ho[a] && (this.Ho[a] = new P(b.lng,b.lat),
            this.ja[a] = new P(b.lng,b.lat),
            0 == a && !this.ja[0].Vb(this.ja[this.ja.length - 1]) && (this.ja[this.ja.length - 1] = new P(b.lng,b.lat)),
            this.Nh())
        },
        Ze: function() {
            var a = this.Ho;
            0 == a.length && (a = this.ja);
            return a
        }
    });
    function Dd(a, b) {
        ld.call(this, b);
        this.Tr(a);
        var c = this;
        Xa.load("poly", function() {
            c.ob()
        })
    }
    x.lang.xa(Dd, ld, "Polyline");
    function Ed(a, b, c) {
        this.point = a;
        this.Fa = Math.abs(b);
        Cd.call(this, [], c)
    }
    Ed.VE = [0.01, 1.0E-4, 1.0E-5, 4.0E-6];
    x.lang.xa(Ed, Cd, "Circle");
    x.extend(Ed.prototype, {
        initialize: function(a) {
            this.map = a;
            this.ja = this.xv(this.point, this.Fa);
            this.Nh();
            return s
        },
        Hb: function() {
            return this.map ? gb(this.point, this.map.M.Ma) : this.point
        },
        uv: u("point"),
        Af: function(a) {
            a && (this.point = a)
        },
        JL: u("Fa"),
        Bf: function(a) {
            this.Fa = Math.abs(a)
        },
        xv: function(a, b) {
            if (!a || !b || !this.map)
                return [];
            for (var c = [], e = b / 6378800, f = Math.PI / 180 * a.lat, g = Math.PI / 180 * a.lng, i = 0; 360 > i; i += 9) {
                var k = Math.PI / 180 * i
                  , m = Math.asin(Math.sin(f) * Math.cos(e) + Math.cos(f) * Math.sin(e) * Math.cos(k))
                  , k = new P(((g - Math.atan2(Math.sin(k) * Math.sin(e) * Math.cos(f), Math.cos(e) - Math.sin(f) * Math.sin(m)) + Math.PI) % (2 * Math.PI) - Math.PI) * (180 / Math.PI),m * (180 / Math.PI));
                c.push(k)
            }
            e = c[0];
            c.push(new P(e.lng,e.lat));
            return c
        }
    });
    var Fd = {};
    function Gd(a) {
        this.map = a;
        this.Ij = [];
        this.Df = [];
        this.Ug = [];
        this.yV = 300;
        this.aF = 0;
        this.Mg = {};
        this.qj = {};
        this.Vk = 0;
        this.rE = q;
        this.mW = {};
        this.no = this.Vq(1);
        this.xg = this.Vq(2);
        this.ng = this.Vq(3);
        this.Ql = this.Vq(4);
        a.platform.appendChild(this.no);
        a.platform.appendChild(this.xg);
        a.platform.appendChild(this.Ql);
        a.platform.appendChild(this.ng);
        var b = 256 * Math.pow(2, 15)
          , c = 3 * b
          , a = R.Sa(new L(180,0)).lng
          , c = c - a
          , b = -3 * b
          , e = R.Sa(new L(-180,0)).lng;
        this.qg = a;
        this.hh = e;
        this.Ll = c + (e - b);
        this.ih = a - e
    }
    A.df(function(a) {
        var b = new Gd(a);
        b.za();
        a.ef = b
    });
    x.extend(Gd.prototype, {
        za: function() {
            var a = this
              , b = a.map;
            b.addEventListener("loadcode", function() {
                a.Np()
            });
            b.addEventListener("addtilelayer", function(b) {
                a.Te(b)
            });
            b.addEventListener("removetilelayer", function(b) {
                a.fg(b)
            });
            b.addEventListener("setmaptype", function(b) {
                a.Sg(b)
            });
            b.addEventListener("zoomstartcode", function(b) {
                a.Rc(b)
            });
            b.addEventListener("setcustomstyles", function(b) {
                a.hu(b.target);
                a.dg(q)
            });
            b.addEventListener("initindoorlayer", function(b) {
                a.nE(b)
            })
        },
        Np: function() {
            var a = this;
            if (x.ga.oa)
                try {
                    document.execCommand("BackgroundImageCache", t, q)
                } catch (b) {}
            this.loaded || a.Sx();
            a.dg();
            this.loaded || (this.loaded = q,
            Xa.load("tile", function() {
                a.iQ()
            }))
        },
        nE: function(a) {
            this.Iu = new Hd(this);
            this.Iu.Te(new Id(this.map,this.Iu,a.$e))
        },
        Sx: function() {
            for (var a = this.map.ya().jf, b = 0; b < a.length; b++) {
                var c = new Jd;
                x.extend(c, a[b]);
                this.Ij.push(c);
                c.za(this.map, this.no)
            }
            this.hu()
        },
        Vq: function(a) {
            var b = F("div");
            b.style.position = "absolute";
            b.style.overflow = "visible";
            b.style.left = b.style.top = "0";
            b.style.zIndex = a;
            return b
        },
        Hf: function() {
            this.Vk--;
            var a = this;
            this.rE && (this.map.dispatchEvent(new O("onfirsttileloaded")),
            this.rE = t);
            0 == this.Vk && (this.$i && (clearTimeout(this.$i),
            this.$i = s),
            this.$i = setTimeout(function() {
                if (a.Vk == 0) {
                    a.map.dispatchEvent(new O("ontilesloaded"));
                    a.rE = q
                }
                a.$i = s
            }, 80))
        },
        $D: function(a, b) {
            return "TILE-" + b.da + "-" + a[0] + "-" + a[1] + "-" + a[2]
        },
        Ox: function(a) {
            var b = a.Ib;
            b && Hb(b) && b.parentNode.removeChild(b);
            delete this.Mg[a.name];
            a.loaded || (Kd(a),
            a.Ib = s,
            a.Xm = s)
        },
        UL: function(a, b, c) {
            var e = this.map
              , f = e.ya()
              , g = e.Za
              , i = e.Jb
              , k = f.Wb(g)
              , m = this.DX()
              , n = m[0]
              , o = m[1]
              , p = m[2]
              , v = m[3]
              , w = m[4]
              , c = "undefined" != typeof c ? c : 0
              , f = f.le()
              , m = e.da.replace(/^TANGRAM_/, "");
            for (this.Ni ? this.Ni.length = 0 : this.Ni = []; n < p; n++)
                for (var y = o; y < v; y++) {
                    var z = n
                      , B = y;
                    this.Ni.push([z, B]);
                    z = m + "_" + b + "_" + z + "_" + B + "_" + g;
                    this.mW[z] = z
                }
            this.Ni.sort(function(a) {
                return function(b, c) {
                    return 0.4 * Math.abs(b[0] - a[0]) + 0.6 * Math.abs(b[1] - a[1]) - (0.4 * Math.abs(c[0] - a[0]) + 0.6 * Math.abs(c[1] - a[1]))
                }
            }([w[0] - 1, w[1] - 1]));
            i = [Math.round(-i.lng / k), Math.round(i.lat / k)];
            n = -e.offsetY + e.height / 2;
            a.style.left = -e.offsetX + e.width / 2 + "px";
            a.style.top = n + "px";
            this.Ue ? this.Ue.length = 0 : this.Ue = [];
            n = 0;
            for (e = a.childNodes.length; n < e; n++)
                y = a.childNodes[n],
                y.tr = t,
                this.Ue.push(y);
            if (n = this.an)
                for (var D in n)
                    delete n[D];
            else
                this.an = {};
            this.Ve ? this.Ve.length = 0 : this.Ve = [];
            n = 0;
            for (e = this.Ni.length; n < e; n++) {
                D = this.Ni[n][0];
                k = this.Ni[n][1];
                y = 0;
                for (o = this.Ue.length; y < o; y++)
                    if (p = this.Ue[y],
                    p.id == m + "_" + b + "_" + D + "_" + k + "_" + g) {
                        p.tr = q;
                        this.an[p.id] = p;
                        break
                    }
            }
            n = 0;
            for (e = this.Ue.length; n < e; n++)
                p = this.Ue[n],
                p.tr || this.Ve.push(p);
            this.QF = [];
            y = (f + c) * this.map.M.devicePixelRatio;
            n = 0;
            for (e = this.Ni.length; n < e; n++)
                D = this.Ni[n][0],
                k = this.Ni[n][1],
                v = D * f + i[0] - c / 2,
                w = (-1 - k) * f + i[1] - c / 2,
                z = m + "_" + b + "_" + D + "_" + k + "_" + g,
                o = this.an[z],
                p = s,
                o ? (p = o.style,
                p.left = v + "px",
                p.top = w + "px",
                o.$n || this.QF.push([D, k, o])) : (0 < this.Ve.length ? (o = this.Ve.shift(),
                o.getContext("2d").clearRect(-c / 2, -c / 2, y, y),
                p = o.style) : (o = document.createElement("canvas"),
                p = o.style,
                p.position = "absolute",
                p.width = f + c + "px",
                p.height = f + c + "px",
                this.jZ() && (p.WebkitTransform = "scale(1.001)"),
                o.setAttribute("width", y),
                o.setAttribute("height", y),
                a.appendChild(o)),
                o.id = z,
                p.left = v + "px",
                p.top = w + "px",
                -1 < z.indexOf("bg") && (v = "#F3F1EC",
                this.map.M.hV && (v = this.map.M.hV),
                p.background = v ? v : ""),
                this.QF.push([D, k, o])),
                o.style.visibility = "";
            n = 0;
            for (e = this.Ve.length; n < e; n++)
                this.Ve[n].style.visibility = "hidden";
            return this.QF
        },
        jZ: function() {
            return /M040/i.test(navigator.userAgent)
        },
        DX: function() {
            var a = this.map
              , b = a.ya()
              , c = b.ZL(a.Za)
              , e = a.Jb
              , f = Math.ceil(e.lng / c)
              , g = Math.ceil(e.lat / c)
              , b = b.le()
              , c = [f, g, (e.lng - f * c) / c * b, (e.lat - g * c) / c * b];
            return [c[0] - Math.ceil((a.width / 2 - c[2]) / b), c[1] - Math.ceil((a.height / 2 - c[3]) / b), c[0] + Math.ceil((a.width / 2 + c[2]) / b), c[1] + Math.ceil((a.height / 2 + c[3]) / b), c]
        },
        l0: function(a, b, c, e) {
            var f = this;
            f.e3 = b;
            var g = this.map.ya()
              , i = f.$D(a, c)
              , k = g.le()
              , b = [a[0] * k + b[0], (-1 - a[1]) * k + b[1]]
              , m = this.Mg[i];
            if (this.map.ya() !== eb && this.map.ya() !== Wa) {
                var n = this.sm(a[0], a[2]).offsetX;
                b[0] += n;
                b.w2 = n
            }
            m && m.Ib ? (Fb(m.Ib, b),
            e && (e = new Q(a[0],a[1]),
            g = this.map.M.Ee ? this.map.M.Ee.style : "normal",
            e = c.getTilesUrl(e, a[2], g),
            m.loaded = t,
            Ld(m, e)),
            m.loaded ? this.Hf() : Md(m, function() {
                f.Hf()
            })) : (m = this.qj[i]) && m.Ib ? (c.Mb.insertBefore(m.Ib, c.Mb.lastChild),
            this.Mg[i] = m,
            Fb(m.Ib, b),
            e && (e = new Q(a[0],a[1]),
            g = this.map.M.Ee ? this.map.M.Ee.style : "normal",
            e = c.getTilesUrl(e, a[2], g),
            m.loaded = t,
            Ld(m, e)),
            m.loaded ? this.Hf() : Md(m, function() {
                f.Hf()
            })) : (m = k * Math.pow(2, g.Ye() - a[2]),
            new L(a[0] * m,a[1] * m),
            e = new Q(a[0],a[1]),
            g = this.map.M.Ee ? this.map.M.Ee.style : "normal",
            e = c.getTilesUrl(e, a[2], g),
            m = new Nd(this,e,b,a,c),
            Md(m, function() {
                f.Hf()
            }),
            m.mo(),
            this.Mg[i] = m)
        },
        Hf: function() {
            this.Vk--;
            var a = this;
            0 == this.Vk && (this.$i && (clearTimeout(this.$i),
            this.$i = s),
            this.$i = setTimeout(function() {
                if (a.Vk == 0) {
                    a.map.dispatchEvent(new O("ontilesloaded"));
                    if (za) {
                        if (wa && xa && ya) {
                            var b = ib()
                              , c = a.map.wb();
                            setTimeout(function() {
                                Va(5030, {
                                    load_script_time: xa - wa,
                                    load_tiles_time: b - ya,
                                    map_width: c.width,
                                    map_height: c.height,
                                    map_size: c.width * c.height
                                })
                            }, 1E4);
                            A.Jq("cus.fire", "time", {
                                z_imgfirstloaded: b - ya
                            })
                        }
                        za = t
                    }
                }
                a.$i = s
            }, 80))
        },
        $D: function(a, b) {
            return this.map.ya() === Ua ? "TILE-" + b.da + "-" + this.map.Tw + "-" + a[0] + "-" + a[1] + "-" + a[2] : "TILE-" + b.da + "-" + a[0] + "-" + a[1] + "-" + a[2]
        },
        Ox: function(a) {
            var b = a.Ib;
            b && (Od(b),
            Hb(b) && b.parentNode.removeChild(b));
            delete this.Mg[a.name];
            a.loaded || (Od(b),
            Kd(a),
            a.Ib = s,
            a.Xm = s)
        },
        sm: function(a, b) {
            for (var c = 0, e = 6 * Math.pow(2, b - 3), f = e / 2 - 1, g = -e / 2; a > f; )
                a -= e,
                c -= this.Ll;
            for (; a < g; )
                a += e,
                c += this.Ll;
            c = Math.round(c / Math.pow(2, 18 - b));
            return {
                offsetX: c,
                Ag: a
            }
        },
        iC: function(a) {
            for (var b = a.lng; b > this.qg; )
                b -= this.ih;
            for (; b < this.hh; )
                b += this.ih;
            a.lng = b;
            return a
        },
        jC: function(a, b) {
            for (var c = 256 * Math.pow(2, 18 - b), e = Math.floor(this.qg / c), f = Math.floor(this.hh / c), c = Math.floor(this.Ll / c), g = [], i = 0; i < a.length; i++) {
                var k = a[i]
                  , m = k[0]
                  , k = k[1];
                if (m >= e) {
                    var m = m + c
                      , n = "id_" + m + "_" + k + "_" + b;
                    a[n] || (a[n] = q,
                    g.push([m, k]))
                } else
                    m <= f && (m -= c,
                    n = "id_" + m + "_" + k + "_" + b,
                    a[n] || (a[n] = q,
                    g.push([m, k])))
            }
            for (i = 0; i < g.length; i++)
                a.push(g[i]);
            return a
        },
        dg: function(a) {
            var b = this;
            if (b.map.ya() == Ua)
                Xa.load("coordtrans", function() {
                    b.map.Qb || (b.map.Qb = Ua.Jk(b.map.qh),
                    b.map.Tw = Ua.vL(b.map.Qb));
                    b.rI()
                }, q);
            else {
                if (a && a)
                    for (var c in this.qj)
                        delete this.qj[c];
                b.rI(a)
            }
        },
        rI: function(a) {
            var b = this.map.M.Yf ? this.Df : this.Ij.concat(this.Df)
              , c = b.length
              , e = this.map
              , f = e.ya()
              , g = e.Jb
              , i = e.width
              , i = e.ya().Wb(e.Za) * i
              , k = g.lng + i / 2
              , i = this.qM(g.lng - i / 2, k);
            this.map.ya() !== eb && this.map.ya() !== Wa && (g = this.iC(g));
            for (var m = 0; m < c; m++) {
                var n = b[m];
                if (n.kc && e.Za < n.kc)
                    break;
                if (n.Ow) {
                    k = this.Mb = n.Mb;
                    if (a) {
                        var o = k;
                        if (o && o.childNodes)
                            for (var p = o.childNodes.length, v = p - 1; 0 <= v; v--)
                                p = o.childNodes[v],
                                o.removeChild(p),
                                p = s
                    }
                    if (this.map.Vd()) {
                        this.xg.style.display = "block";
                        k.style.display = "none";
                        this.map.dispatchEvent(new O("vectorchanged"), {
                            isvector: q
                        });
                        continue
                    } else
                        k.style.display = "block",
                        this.xg.style.display = "none",
                        this.map.dispatchEvent(new O("vectorchanged"), {
                            isvector: t
                        })
                }
                if (!n.v2 && !(n.Yx && !this.map.Vd() || n.yM && this.map.Vd())) {
                    e = this.map;
                    f = e.ya();
                    p = f.Aj();
                    k = e.Za;
                    g = e.Jb;
                    f == Ua && g.Vb(new L(0,0)) && (g = e.Jb = p.zi(e.ge, e.Qb));
                    var w = f.Wb(k)
                      , p = f.ZL(k)
                      , o = Math.ceil(g.lng / p)
                      , y = Math.ceil(g.lat / p)
                      , z = f.le()
                      , p = [o, y, (g.lng - o * p) / p * z, (g.lat - y * p) / p * z]
                      , y = i ? 1.5 * (e.width / 2) : e.width / 2
                      , v = p[0] - Math.ceil((y - p[2]) / z)
                      , o = p[1] - Math.ceil((e.height / 2 - p[3]) / z)
                      , y = p[0] + Math.ceil((y + p[2]) / z)
                      , B = 0;
                    f === Ua && 15 == e.la() && (B = 1);
                    f = p[1] + Math.ceil((e.height / 2 + p[3]) / z) + B;
                    this.aK = new L(g.lng,g.lat);
                    var D = this.Mg, z = -this.aK.lng / w, B = this.aK.lat / w, g = [Math.ceil(z), Math.ceil(B)], w = e.la(), G;
                    for (G in D) {
                        var E = D[G]
                          , C = E.info;
                        (C[2] != w || C[2] == w && (v > C[0] || y <= C[0] || o > C[1] || f <= C[1])) && this.Ox(E)
                    }
                    D = -e.offsetX + e.width / 2;
                    E = -e.offsetY + e.height / 2;
                    n.Mb && (n.Mb.style.left = Math.ceil(z + D) - g[0] + "px",
                    n.Mb.style.top = Math.ceil(B + E) - g[1] + "px",
                    n.Mb.style.WebkitTransform = "translate3d(0,0,0)");
                    z = [];
                    for (e.PB = []; v < y; v++)
                        for (B = o; B < f; B++)
                            z.push([v, B]),
                            e.PB.push({
                                x: v,
                                y: B
                            });
                    this.map.ya() !== eb && this.map.ya() !== Wa && (z = this.jC(z, k));
                    z.sort(function(a) {
                        return function(b, c) {
                            return 0.4 * Math.abs(b[0] - a[0]) + 0.6 * Math.abs(b[1] - a[1]) - (0.4 * Math.abs(c[0] - a[0]) + 0.6 * Math.abs(c[1] - a[1]))
                        }
                    }([p[0] - 1, p[1] - 1]));
                    k = Math.ceil(this.qg / (256 * Math.pow(2, 18 - w)));
                    p = z.length;
                    this.Vk += p;
                    for (v = 0; v < p; v++) {
                        if (n.sO === q && (o = this.sm(z[v][0], w),
                        o.Ag > k - 1 || o.Ag < -k))
                            continue;
                        this.l0([z[v][0], z[v][1], w], g, n, a)
                    }
                }
            }
        },
        qM: function(a, b) {
            return a < this.hh || b > this.qg
        },
        Te: function(a) {
            var b = this
              , c = a.target;
            b.map.Vd();
            c.Dn && this.map.Te(c.Dn);
            if (c.Yx) {
                for (a = 0; a < b.Ug.length; a++)
                    if (b.Ug[a] == c)
                        return;
                Xa.load("vector", function() {
                    c.za(b.map, b.xg);
                    b.Ug.push(c)
                }, q)
            } else {
                for (a = 0; a < b.Df.length; a++)
                    if (b.Df[a] == c)
                        return;
                c.za(this.map, this.Ql);
                b.Df.push(c)
            }
        },
        fg: function(a) {
            a = a.target;
            this.map.Vd();
            a.Dn && this.map.fg(a.Dn);
            if (a.Yx)
                for (var b = 0, c = this.Ug.length; b < c; b++)
                    a == this.Ug[b] && this.Ug.splice(b, 1);
            else {
                b = 0;
                for (c = this.Df.length; b < c; b++)
                    a == this.Df[b] && this.Df.splice(b, 1)
            }
            a.remove()
        },
        Sg: function() {
            for (var a = this.Ij, b = 0, c = a.length; b < c; b++)
                a[b].remove();
            delete this.Mb;
            this.Ij = [];
            this.qj = this.Mg = {};
            this.Sx();
            this.dg()
        },
        Rc: function() {
            var a = this;
            a.Cd && x.U.aa(a.Cd);
            setTimeout(function() {
                a.dg();
                a.map.dispatchEvent(new O("onzoomend"))
            }, 10)
        },
        W6: ca(),
        hu: function(a) {
            var b = this.map.ya();
            if (!this.map.Vd() && (a ? this.map.M.u0 = a : a = this.map.M.u0,
            a))
                for (var c = s, c = "2" == A.Hu ? [A.url.proto + A.url.domain.main_domain_cdn.other[0] + "/"] : [A.url.proto + A.url.domain.main_domain_cdn.baidu[0] + "/", A.url.proto + A.url.domain.main_domain_cdn.baidu[1] + "/", A.url.proto + A.url.domain.main_domain_cdn.baidu[2] + "/"], e = 0, f; f = this.Ij[e]; e++)
                    if (f.sO == q) {
                        b.m.qc = 18;
                        f.getTilesUrl = function(b, e) {
                            var f = b.x
                              , f = this.map.ef.sm(f, e).Ag
                              , m = b.y
                              , n = Zb("normal")
                              , o = 1;
                            this.map.Px() && (o = 2);
                            n = "customimage/tile?qt=customimage&x=" + f + "&y=" + m + "&z=" + e + "&udt=" + n + "&scale=" + o + "&ak=" + ra;
                            n = a.styleStr ? n + ("&styles=" + encodeURIComponent(a.styleStr)) : n + ("&customid=" + a.style);
                            n = c[Math.abs(f + m) % c.length] + n;
                            return n = pb(n)
                        }
                        ;
                        break
                    }
        }
    });
    function Nd(a, b, c, e, f) {
        this.Xm = a;
        this.position = c;
        this.gv = [];
        this.name = a.$D(e, f);
        this.info = e;
        this.DJ = f.Gt();
        e = F("img");
        Gb(e);
        e.oL = t;
        var g = e.style
          , a = a.map.ya();
        g.position = "absolute";
        g.border = "none";
        g.width = a.le() + "px";
        g.height = a.le() + "px";
        g.left = c[0] + "px";
        g.top = c[1] + "px";
        g.maxWidth = "none";
        this.Ib = e;
        this.src = b;
        Pd && (this.Ib.style.opacity = 0);
        var i = this;
        this.Ib.onload = function() {
            A.rZ.WQ();
            i.loaded = q;
            if (i.Xm) {
                var a = i.Xm
                  , b = a.qj;
                if (!b[i.name]) {
                    a.aF++;
                    b[i.name] = i
                }
                if (i.Ib && !Hb(i.Ib) && f.Mb) {
                    f.Mb.appendChild(i.Ib);
                    if (x.ga.oa <= 6 && x.ga.oa > 0 && i.DJ)
                        i.Ib.style.cssText = i.Ib.style.cssText + (';filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src="' + i.src + '",sizingMethod=scale);')
                }
                var c = a.aF - a.yV, e;
                for (e in b) {
                    if (c <= 0)
                        break;
                    if (!a.Mg[e]) {
                        b[e].Xm = s;
                        var g = b[e].Ib;
                        if (g && g.parentNode) {
                            g.parentNode.removeChild(g);
                            Od(g)
                        }
                        g = s;
                        b[e].Ib = s;
                        delete b[e];
                        a.aF--;
                        c--
                    }
                }
                Pd && new Bb({
                    Nc: 20,
                    duration: 200,
                    Ba: function(a) {
                        if (i.Ib && i.Ib.style)
                            i.Ib.style.opacity = a * 1
                    },
                    finish: function() {
                        i.Ib && i.Ib.style && delete i.Ib.style.opacity
                    }
                });
                Kd(i)
            }
        }
        ;
        this.Ib.onerror = function() {
            Kd(i);
            if (i.Xm) {
                var a = i.Xm.map.ya();
                if (a.m.pD) {
                    i.error = q;
                    i.Ib.src = a.m.pD;
                    i.Ib && !Hb(i.Ib) && f.Mb.appendChild(i.Ib)
                }
            }
        }
        ;
        e = s
    }
    function Md(a, b) {
        a.gv.push(b)
    }
    Nd.prototype.mo = function() {
        this.Ib.src = 0 < x.ga.oa && 6 >= x.ga.oa && this.DJ ? J.ta + "blank.gif" : "" !== this.src && this.Ib.src == this.src ? this.src + "&t = " + Date.now() : this.src
    }
    ;
    function Kd(a) {
        for (var b = 0; b < a.gv.length; b++)
            a.gv[b]();
        a.gv.length = 0
    }
    function Od(a) {
        if (a) {
            a.onload = a.onerror = s;
            var b = a.attributes, c, e, f;
            if (b) {
                e = b.length;
                for (c = 0; c < e; c += 1)
                    f = b[c].name,
                    db(a[f]) && (a[f] = s)
            }
            if (b = a.children) {
                e = b.length;
                for (c = 0; c < e; c += 1)
                    Od(a.children[c])
            }
        }
    }
    function Ld(a, b) {
        a.src = b;
        a.mo()
    }
    var Pd = !x.ga.oa || 8 < x.ga.oa;
    function Jd(a) {
        this.$e = a || {};
        this.YV = this.$e.copyright || s;
        this.Y0 = this.$e.transparentPng || t;
        this.Ow = this.$e.baseLayer || t;
        this.zIndex = this.$e.zIndex || 0;
        this.da = Jd.FS++
    }
    Jd.FS = 0;
    x.lang.xa(Jd, x.lang.Ja, "TileLayer");
    x.extend(Jd.prototype, {
        za: function(a, b) {
            this.Ow && (this.zIndex = -100);
            this.map = a;
            if (!this.Mb) {
                var c = F("div")
                  , e = c.style;
                e.position = "absolute";
                e.overflow = "visible";
                e.zIndex = this.zIndex;
                e.left = Math.ceil(-a.offsetX + a.width / 2) + "px";
                e.top = Math.ceil(-a.offsetY + a.height / 2) + "px";
                b.appendChild(c);
                this.Mb = c
            }
        },
        remove: function() {
            this.Mb && this.Mb.parentNode && (this.Mb.innerHTML = "",
            this.Mb.parentNode.removeChild(this.Mb));
            delete this.Mb
        },
        Gt: u("Y0"),
        getTilesUrl: function(a, b) {
            if (this.map.ya() !== eb && this.map.ya() !== Wa)
                var c = this.map.ef.sm(a.x, b).Ag;
            var e = "";
            this.$e.tileUrlTemplate && (e = this.$e.tileUrlTemplate.replace(/\{X\}/, c),
            e = e.replace(/\{Y\}/, a.y),
            e = e.replace(/\{Z\}/, b));
            return e
        },
        Fm: u("YV"),
        ya: function() {
            return this.Va || Ra
        }
    });
    function Qd(a) {
        Jd.call(this, a);
        this.m = a || {};
        this.yM = q;
        if (this.m.predictDate) {
            if (1 > this.m.predictDate.weekday || 7 < this.m.predictDate.weekday)
                this.m.predictDate = 1;
            if (0 > this.m.predictDate.hour || 23 < this.m.predictDate.hour)
                this.m.predictDate.hour = 0
        }
        this.HU = A.url.proto + A.url.domain.traffic + "/traffic/"
    }
    Qd.prototype = new Jd;
    Qd.prototype.za = function(a, b) {
        Jd.prototype.za.call(this, a, b);
        this.P = a
    }
    ;
    Qd.prototype.Gt = fa(q);
    Qd.prototype.getTilesUrl = function(a, b) {
        var c = "";
        this.m.predictDate ? c = "HistoryService?day=" + (this.m.predictDate.weekday - 1) + "&hour=" + this.m.predictDate.hour + "&t=" + (new Date).getTime() + "&" : (c = "TrafficTileService?time=" + (new Date).getTime() + "&",
        c = this.P.M.Yf ? c + "v=016&" : c + "label=web2D&v=016&");
        var c = this.HU + c + "level=" + b + "&x=" + a.x + "&y=" + a.y
          , e = 1;
        this.P.Px() && (e = 2);
        return (c + "&scaler=" + e).replace(/-(\d+)/gi, "M$1")
    }
    ;
    var Rd = [A.url.proto + A.url.domain.TILES_YUN_HOST[0] + "/georender/gss", A.url.proto + A.url.domain.TILES_YUN_HOST[1] + "/georender/gss", A.url.proto + A.url.domain.TILES_YUN_HOST[2] + "/georender/gss", A.url.proto + A.url.domain.TILES_YUN_HOST[3] + "/georender/gss"]
      , Sd = A.url.proto + A.url.domain.main_domain_nocdn.baidu + "/style/poi/rangestyle"
      , Td = 100;
    function vb(a, b) {
        Jd.call(this);
        var c = this;
        this.yM = q;
        try {
            document.createElement("canvas").getContext("2d")
        } catch (e) {}
        Pb(a) ? b = a || {} : (c.Zn = a,
        b = b || {});
        b.geotableId && (c.Kf = b.geotableId);
        b.databoxId && (c.Zn = b.databoxId);
        var f = A.vd + "geosearch";
        c.fb = {
            HN: b.pointDensity || Td,
            GY: f + "/detail/",
            HY: f + "/v2/detail/",
            YJ: b.age || 36E5,
            $t: b.q || "",
            F0: "png",
            S4: [5, 5, 5, 5],
            nZ: {
                backgroundColor: "#FFFFD5",
                borderColor: "#808080"
            },
            cC: b.ak || ra,
            EO: b.tags || "",
            filter: b.filter || "",
            vO: b.sortby || "",
            fE: b.hotspotName || "tile_md_" + (1E5 * Math.random()).toFixed(0),
            $F: q
        };
        Xa.load("clayer", function() {
            c.Ed()
        })
    }
    vb.prototype = new Jd;
    vb.prototype.za = function(a, b) {
        Jd.prototype.za.call(this, a, b);
        this.P = a
    }
    ;
    vb.prototype.getTilesUrl = function(a, b) {
        var c = a.x
          , e = a.y
          , f = this.fb
          , c = Rd[Math.abs(c + e) % Rd.length] + "/image?grids=" + c + "_" + e + "_" + b + "&q=" + f.$t + "&tags=" + f.EO + "&filter=" + f.filter + "&sortby=" + f.vO + "&ak=" + this.fb.cC + "&age=" + f.YJ + "&page_size=" + f.HN + "&format=" + f.F0;
        f.$F || (f = (1E5 * Math.random()).toFixed(0),
        c += "&timeStamp=" + f);
        this.Kf ? c += "&geotable_id=" + this.Kf : this.Zn && (c += "&databox_id=" + this.Zn);
        return c
    }
    ;
    vb.prototype.enableUseCache = function() {
        this.fb.$F = q
    }
    ;
    vb.prototype.disableUseCache = function() {
        this.fb.$F = t
    }
    ;
    vb.eU = /^point\(|\)$/ig;
    vb.fU = /\s+/;
    vb.hU = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
    var Ud = {};
    function Vd(a, b) {
        this.bd = a;
        this.lQ = 18;
        this.m = {
            Au: 256,
            Dc: new R
        };
        x.extend(this.m, b || {})
    }
    var Wd = [0, 0, 0, 8, 7, 7, 6, 6, 5, 5, 4, 3, 3, 3, 2, 2, 1, 1, 0, 0, 0, 0]
      , Xd = [512, 2048, 4096, 32768, 65536, 262144, 1048576, 4194304, 8388608]
      , Yd = [0, 0, 0, 3, 5, 5, 7, 7, 9, 9, 10, 12, 12, 12, 15, 15, 17, 17, 19, 19, 19, 19]
      , Zd = [0, 0, 0, 256, 256, 512, 256, 512, 256, 512, 256, 256, 512, 1024, 256, 512, 512, 1024, 512, 1024, 2048, 4096];
    Vd.prototype = {
        getName: u("bd"),
        le: function(a) {
            return "na" === this.bd ? Zd[a] : this.m.Au
        },
        rp: function(a) {
            return "na" === this.bd ? Yd[a] : a
        },
        Aj: function() {
            return this.m.Dc
        },
        Wb: function(a) {
            return Math.pow(2, this.lQ - a)
        },
        SD: function(a) {
            return "na" === this.bd ? Xd[Wd[a]] : this.Wb(a) * this.le(a)
        },
        zX: function(a) {
            a = Math.floor(a);
            return "na" === this.bd ? Zd[Yd[a]] : this.m.Au
        }
    };
    var $d = {
        drawPoly: function(a, b, c, e, f, g) {
            var i = a[1];
            if (i)
                for (var a = a[6], k = 0; k < i.length; k++) {
                    var m = i[k][0]
                      , n = f.Cj(m, "polygon", c, g);
                    if (n && n.length)
                        for (var o = i[k][1], p = 0; p < o.length; p++) {
                            var v = o[p][1];
                            f.Uc(v[0], c) && (v["cache" + c] || (v["cache" + c] = f.dn(v[1], c, e, a)),
                            v = v["cache" + c],
                            f.P.Mo(b.canvas.id, v, {
                                type: "polygon",
                                Yb: m,
                                style: n
                            }),
                            this.SW(b, v, n, c))
                        }
                }
        },
        SW: function(a, b, c, e) {
            c = c[0];
            if (!c.Yb || !(6 < e && (71013 === c.Yb || 71012 === c.Yb || 71011 === c.Yb) || 6 === e && (71011 === c.Yb || 71012 === c.Yb) || 5 === e && (71011 === c.Yb || 71013 === c.Yb) || 5 > e && (71012 === c.Yb || 71013 === c.Yb))) {
                a.fillStyle = c.ox;
                a.beginPath();
                a.moveTo(b[0], b[1]);
                for (var e = 2, f = b.length; e < f; e += 2)
                    a.lineTo(b[e], b[e + 1]);
                a.closePath();
                c.borderWidth && (a.strokeStyle = c.So,
                a.lineWidth = c.borderWidth / 2,
                a.stroke());
                a.fill()
            }
        },
        drawGaoqingRoadBorder: function(a, b, c, e, f) {
            var g = a[1];
            if (g)
                for (var a = a[6], i = 0; i < g.length; i++) {
                    var k = g[i][0]
                      , m = f.Cj(k, "polygon", c);
                    if (m && m.length && m[0].borderWidth)
                        for (var n = g[i][1], o = 0; o < n.length; o++) {
                            var p = n[o][1];
                            f.Uc(p[0], c) && (p["cache" + c] || (p["cache" + c] = f.dn(p[1], c, e, a)),
                            p = p["cache" + c],
                            f.P.Mo(b.canvas.id, p, {
                                type: "polygon",
                                Yb: k,
                                style: m
                            }),
                            this.UW(b, p, m))
                        }
                }
        },
        drawGaoqingRoadFill: function(a, b, c, e, f) {
            var g = a[1];
            if (g)
                for (var a = a[6], i = 0; i < g.length; i++) {
                    var k = g[i][0]
                      , m = f.Cj(k, "polygon", c);
                    if (m && m.length)
                        for (var n = g[i][1], o = 0; o < n.length; o++) {
                            var p = n[o][1];
                            f.Uc(p[0], c) && (p["cache" + c] || (p["cache" + c] = f.dn(p[1], c, e, a)),
                            p = p["cache" + c],
                            f.P.Mo(b.canvas.id, p, {
                                type: "polygon",
                                Yb: k,
                                style: m
                            }),
                            this.VW(b, p, m))
                        }
                }
        },
        UW: function(a, b, c) {
            c = c[0];
            a.beginPath();
            a.moveTo(b[0], b[1]);
            for (var e = 2, f = b.length; e < f; e += 2)
                a.lineTo(b[e], b[e + 1]);
            a.closePath();
            a.strokeStyle = c.So;
            a.lineWidth = c.borderWidth / 2;
            a.stroke()
        },
        VW: function(a, b, c) {
            a.fillStyle = c[0].ox;
            a.beginPath();
            a.moveTo(b[0], b[1]);
            for (var c = 2, e = b.length; c < e; c += 2)
                a.lineTo(b[c], b[c + 1]);
            a.closePath();
            a.fill()
        }
    };
    var ae = {
        drawArrow: function(a, b, c, e, f, g) {
            b.lineWidth = 1.5;
            b.lineCap = "butt";
            b.lineJoin = "miter";
            b.strokeStyle = "rgba(153,153,153,1)";
            var i = a[7];
            if (i) {
                a = i[1];
                e = g.dn(i[0], c, e);
                for (i = 0; i < a.length; i++)
                    if (g.Uc(a[i], c)) {
                        var k = e[4 * i]
                          , m = e[4 * i + 1]
                          , n = e[4 * i + 2]
                          , o = e[4 * i + 3]
                          , p = (k + n) / 2
                          , v = (m + o) / 2
                          , n = (k - n) / f
                          , o = (m - o) / f
                          , k = p + n / 2
                          , n = p - n / 2
                          , m = v + o / 2
                          , o = v - o / 2;
                        this.KW(b, k, m, n, o)
                    }
            }
        },
        KW: function(a, b, c, e, f) {
            a.beginPath();
            a.moveTo(b, c);
            a.lineTo(e, f);
            a.stroke();
            c = this.zV([b, c], [e, f]);
            b = c[0];
            c = c[1];
            a.beginPath();
            a.moveTo(b[0], b[1]);
            a.lineTo(c[0], c[1]);
            a.lineTo(e, f);
            a.closePath();
            a.stroke()
        },
        zV: function(a, b) {
            var c = b[0] - a[0]
              , e = b[1] - a[1]
              , f = 1.8 * Math.sqrt(c * c + e * e)
              , g = b[0] + 4.8410665352790705 * (c / f)
              , f = b[1] + 4.8410665352790705 * (e / f)
              , c = Math.atan2(e, c) + Math.PI;
            return [[g + 4.8410665352790705 * Math.cos(c - 0.3), f + 4.8410665352790705 * Math.sin(c - 0.3)], [g + 4.8410665352790705 * Math.cos(c + 0.3), f + 4.8410665352790705 * Math.sin(c + 0.3)]]
        }
    };
    var be = {
        drawHregion: function(a, b, c, e, f) {
            var g = a[1];
            if (g)
                for (var a = a[6], i = 0; i < g.length; i++) {
                    var k = g[i][0]
                      , m = f.Cj(k, "polygon3d", c);
                    if (m && m.length)
                        for (var n = g[i][1], o = 0; o < n.length; o++) {
                            var p = n[o][2];
                            if (f.Uc(p[0], c)) {
                                var v = p[2];
                                p["cache" + c] || (p["cache" + c] = f.dn(p[1], c, e, a));
                                p = p["cache" + c];
                                f.P.Mo(b.canvas.id, p, {
                                    type: "polygon",
                                    Yb: k,
                                    style: m
                                });
                                this.TW(b, p, v, m)
                            }
                        }
                }
        },
        TW: function(a, b, c, e) {
            e = e[0];
            if (!(c < e.filter)) {
                a.fillStyle = e.kX;
                a.beginPath();
                a.moveTo(b[0], b[1]);
                for (var c = 2, f = b.length; c < f; c += 2)
                    a.lineTo(b[c], b[c + 1]);
                a.closePath();
                e.borderWidth && (a.strokeStyle = e.So,
                a.lineWidth = e.borderWidth / 2,
                a.stroke());
                a.fill()
            }
        }
    };
    var ce = {
        parse: function(a, b, c, e, f) {
            for (var g = e.P, i = g.la(), k = Math.pow(2, 18 - i), m = g.Dc.zi(g.Hb()), n = m.lng, o = m.lat, m = g.wb(), p = m.width, v = m.height, m = [], w = 0; w < a.length; w++) {
                var y = []
                  , z = a[w].D0;
                y.x = z[0];
                y.y = z[1];
                y.h7 = z[2];
                for (var B = (z[0] * c * k - n) / k + p / 2, D = (o - (z[1] + 1) * c * k) / k + v / 2, G = 0; G < a[w].length; G++)
                    a[w][G].EM ? this.DN(a[w][G].EM, z, e, b, c, B, D, i, k, p, v, y) : a[w][G].NY ? this.DN(a[w][G].NY, z, e, b, c, B, D, i, k, p, v, y, q, window.W4) : this.ZZ(a[w][G].oZ, z, e, b, c, B, D, i, k, p, v, y, f);
                m.push(y)
            }
            if (/collision=0/.test(location.search)) {
                a = [];
                for (w = 0; w < m.length; w++)
                    for (G = 0; G < m[w].length; G++)
                        a.push(m[w][G])
            } else
                a = this.m_(m, e.P.la());
            g.NV();
            for (w = 0; w < a.length; w++)
                if (c = a[w],
                !c.At)
                    if (G = [c.bg, c.cg, c.bg, c.Di, c.Ci, c.Di, c.Ci, c.cg, c.bg, c.cg],
                    c.style && g.Mo("poi", G, {
                        type: "polygon",
                        Yb: c.style.Yb,
                        style: c.style
                    }),
                    "fixed" === c.type) {
                        G = t;
                        c.Ce && (c.style && 4 === c.direction) && (G = q);
                        if (c.Ce)
                            if (G) {
                                var E = this;
                                this.Qs(b, c, e, G, function(a) {
                                    for (var c = 0; c < a.Cf.length; c++)
                                        E.VK(b, a.Cf[c].he, a.Cf[c].ie, a.Cf[c].text, a.style, e)
                                })
                            } else
                                this.Qs(b, c, e);
                        if (c.style && !G)
                            for (G = 0; G < c.Cf.length; G++)
                                this.VK(b, c.Cf[G].he, c.Cf[G].ie, c.Cf[G].text, c.style, e)
                    } else if ("line" === c.type)
                        for (G = 0; G < c.lP.length; G++)
                            f = c.lP[G],
                            ce.NW(b, f.he, f.ie, f.cV, f.jP, f.width, f.height, c.style, e);
            return m
        },
        DN: function(a, b, c, e, f, g, i, k, m, n, o, p, v, w) {
            if (a = a[1])
                for (b = 0; b < a.length; b++) {
                    var y = a[b]
                      , z = y[0]
                      , B = c.Cj(z, "point", k, w)
                      , z = c.Cj(z, "pointText", k, w)
                      , y = y[1]
                      , D = s
                      , G = 100
                      , E = 0
                      , C = 0;
                    B && B[0] && (B = B[0],
                    D = B.Ce,
                    G = B.zoom || 100);
                    z = z && z[0] ? z[0] : s;
                    for (B = 0; B < y.length; B++) {
                        var H = y[B][4];
                        if (H && c.Uc(H[2], k)) {
                            var I = Math.round(H[0] / 100) / m + g
                              , N = f - Math.round(H[1] / 100) / m + i;
                            if (v || !(-50 > I || -50 > N || I > n + 50 || N > o + 50)) {
                                var T = H[7] || ""
                                  , ea = {
                                    type: "fixed",
                                    uid: H[3] || "",
                                    name: T,
                                    Cy: H[4],
                                    vt: s,
                                    Cf: [],
                                    ny: [I, N],
                                    style: z
                                };
                                if (D) {
                                    var ba = window.iconSetInfo_high[D] || window.iconSetInfo_high["MapRes/" + D];
                                    if (!ba) {
                                        var Ba = D.charCodeAt(0);
                                        48 <= Ba && 57 >= Ba && (ba = window.iconSetInfo_high["_" + D])
                                    }
                                    ba && (E = ba[2],
                                    C = ba[3],
                                    E = E / 2 * G / 100,
                                    C = C / 2 * G / 100,
                                    ea.vt = {
                                        he: I - E / 2,
                                        ie: N - C / 2,
                                        width: E,
                                        height: C
                                    },
                                    ea.Ce = D)
                                }
                                if (z) {
                                    H = H[5];
                                    "number" !== typeof H && (H = 0);
                                    var ua = ba = 0
                                      , Ba = (z.fontSize || 12) / 2
                                      , Ha = 0.2 * Ba;
                                    e.font = ce.ux(z, c);
                                    var T = T.split("\\")
                                      , ta = T.length;
                                    ea.direction = H;
                                    for (var Za = 0; Za < ta; Za++) {
                                        var Me = T[Za]
                                          , bd = e.measureText(Me).width;
                                        switch (H) {
                                        case 3:
                                            ua = N - Ba / 2 * ta - Ha * (ta - 1) / 2;
                                            ba = I - bd - E / 2;
                                            ua = ua + Ba * Za + Ha * Za;
                                            break;
                                        case 1:
                                            ua = N - Ba / 2 * ta - Ha * (ta - 1) / 2;
                                            ba = I + E / 2;
                                            ua = ua + Ba * Za + Ha * Za;
                                            break;
                                        case 2:
                                            ua = N - C / 2 - Ba * ta - Ha * (ta - 1) - Ha;
                                            ba = I - bd / 2;
                                            ua = ua + Ba * Za + Ha * Za;
                                            break;
                                        case 0:
                                            ua = N + C / 2 + Ha / 2;
                                            ba = I - bd / 2;
                                            ua = ua + Ba * Za + Ha * Za;
                                            break;
                                        case 4:
                                            ua = N - Ba / 2 * ta - Ha * (ta - 1) / 2,
                                            ba = I - bd / 2,
                                            ua = ua + Ba * Za + Ha * Za
                                        }
                                        ea.Cf.push({
                                            he: ba,
                                            ie: ua,
                                            width: bd,
                                            height: Ba,
                                            text: Me
                                        })
                                    }
                                }
                                p.push(ea)
                            }
                        }
                    }
                }
        },
        ZZ: function(a, b, c, e, f, g, i, k, m, n, o, p, v) {
            b = a[7].length;
            if ((n = c.Cj(a[0], "pointText", k)) && n.length) {
                n = n[0];
                e.font = ce.ux(n, c);
                var o = n.fontSize / 2
                  , w = a[1]
                  , y = a[2];
                if (y) {
                    for (var z = y.split("").length, B = a[4], D = B.slice(0, 2), G = 2; G < B.length; G += 2)
                        D[G] = D[G - 2] + B[G],
                        D[G + 1] = D[G - 1] + B[G + 1];
                    for (G = 2; G < B.length; G += 2)
                        0 === G % (2 * z) || 1 === G % (2 * z) || (D[G] = D[G - 2] + B[G] / v,
                        D[G + 1] = D[G - 1] + B[G + 1] / v);
                    for (v = 0; v < b; v++)
                        if (c.Uc(a[7][v], k)) {
                            var G = []
                              , E = l
                              , C = l
                              , H = l
                              , I = l
                              , N = y.split("");
                            a[6][v] && N.reverse();
                            for (var B = 2 * v * z, B = D.slice(B, B + 2 * z), T = 0; T < z; T++) {
                                var ea = a[5][z * v + T]
                                  , ba = B[2 * T] / 100 / m + g
                                  , Ba = f - B[2 * T + 1] / 100 / m + i
                                  , ua = N[T]
                                  , Ha = e.measureText(ua).width;
                                if (E === l)
                                    E = ba - Ha / 2,
                                    C = Ba - o / 2,
                                    H = E + Ha,
                                    I = C + o;
                                else {
                                    var ta = ba - Ha / 2
                                      , Za = Ba - o / 2;
                                    ta < E && (E = ta);
                                    Za < C && (C = Za);
                                    ta + Ha > H && (H = ta + Ha);
                                    Za + o > I && (I = Za + o)
                                }
                                G.push({
                                    jP: ua,
                                    he: ba,
                                    ie: Ba,
                                    cV: ea,
                                    width: Ha,
                                    height: o
                                })
                            }
                            p.push({
                                type: "line",
                                Cy: w,
                                style: n,
                                lP: G,
                                bg: E,
                                cg: C,
                                Ci: H,
                                Di: I
                            })
                        }
                }
            }
        },
        Qs: function(a, b, c, e, f) {
            var g = b.Ce;
            if ("lanche" !== g)
                if (ce.Qx[g])
                    this.SK(a, b, ce.Qx[g], e, f);
                else if (c = c.CL(g)) {
                    var i = new Image;
                    i.setAttribute("crossOrigin", "anonymous");
                    var k = this;
                    i.onload = function() {
                        ce.Qx[g] = this;
                        k.SK(a, b, this, e, f);
                        i.onload = s
                    }
                    ;
                    i.src = c
                }
        },
        SK: function(a, b, c, e, f) {
            var g = b.vt
              , i = g.he
              , k = g.ie
              , m = s
              , n = s
              , o = q
              , p = b.style ? b.style.Yb : s;
            if (b.style && 62203 === p) {
                for (var v = n = m = 0; v < b.Cf.length; v++)
                    m < b.Cf[v].width && (m = b.Cf[v].width),
                    n += 20;
                m = Math.ceil(m) + 10
            }
            e && 519 === p && (o = t);
            m !== s && n !== s ? this.RW(a, b, c, 8, m, n) : e && o ? (m = Math.ceil(b.Cf[0].width) + 6,
            this.JW(a, b, c, 12, m, c.height / 2)) : a.drawImage(c, i, k, g.width, g.height);
            f && f(b)
        },
        RW: function(a, b, c, e, f, g) {
            var i = b.ny[0] - f / 2
              , b = b.ny[1] - g / 2;
            0 < navigator.userAgent.indexOf("iPhone") && (b += 1);
            var k = e / 2;
            a.drawImage(c, 0, 0, e, e, i, b, k, k);
            a.drawImage(c, e, 0, 1, e, i + k, b, f - 2 * k, k);
            a.drawImage(c, c.width - e, 0, e, e, i + f - k, b, k, k);
            a.drawImage(c, 0, e, e, 1, i, b + k, k, g - 2 * k);
            a.drawImage(c, e, e, 1, 1, i + k, b + k, f - 2 * k, g - 2 * k);
            a.drawImage(c, c.width - e, e, e, 1, i + f - k, b + k, k, g - 2 * k);
            a.drawImage(c, 0, c.height - e, e, e, i, b + g - k, k, k);
            a.drawImage(c, e, c.height - e, 1, e, i + k, b + g - k, f - 2 * k, k);
            a.drawImage(c, c.width - e, c.height - e, e, e, i + f - k, b + g - k, k, k)
        },
        JW: function(a, b, c, e, f, g) {
            var i = b.ny[0] - f / 2
              , b = b.ny[1] - g / 2
              , g = e / 2;
            a.drawImage(c, 0, 0, e, c.height, i, b, g, c.height / 2);
            a.drawImage(c, e, 0, 1, c.height, i + g, b, f - 2 * g, c.height / 2);
            a.drawImage(c, c.width - e, 0, e, c.height, i + f - g, b, g, c.height / 2)
        },
        NW: function(a, b, c, e, f, g, i, k, m) {
            a.font = ce.ux(k, m);
            a.fillStyle = k.lL;
            g /= 2;
            i /= 2;
            a.save();
            a.translate(b, c);
            a.rotate(-e / 180 * Math.PI);
            0 < k.Ix && (a.lineWidth = k.Ix,
            a.strokeStyle = k.dM,
            a.strokeText(f, -g, -i));
            a.fillText(f, -g, -i);
            a.restore()
        },
        VK: function(a, b, c, e, f, g) {
            a.font = ce.ux(f, g);
            a.fillStyle = f.lL;
            0 < f.Ix && (a.lineWidth = f.Ix,
            a.strokeStyle = f.dM,
            a.strokeText(e, b, c));
            a.fillText(e, b, c)
        },
        ux: function(a, b) {
            var c = a.fontSize / 2
              , e = 10 * a.fontWeight;
            return e = b.tE ? e + " bold" + (" " + c + "px") + ' arial, "PingFang SC", sans-serif' : e + (" " + c + "px") + " arial, sans-serif"
        },
        m_: function(a, b) {
            var c = []
              , e = 0;
            5 === b && (e = 1);
            a.sort(function(a, b) {
                return a.x * a.y < b.x * b.y ? -1 : 1
            });
            for (var f = 0, g = a.length; f < g; f++)
                for (var i = a[f], k = 0, m = i.length; k < m; k++) {
                    var n = i[k]
                      , o = l
                      , p = l
                      , v = l
                      , w = l;
                    if ("fixed" === n.type) {
                        var y = n.vt
                          , z = n.Cf;
                        y && (o = y.he,
                        p = y.ie,
                        v = y.he + y.width,
                        w = y.ie + y.height);
                        for (y = 0; y < z.length; y++) {
                            var B = z[y];
                            o !== l ? (B.he < o && (o = B.he),
                            B.ie < p && (p = B.ie),
                            B.he + B.width > v && (v = B.he + B.width),
                            B.ie + B.height > w && (w = B.ie + B.height)) : (o = B.he,
                            p = B.ie,
                            v = B.he + B.width,
                            w = B.ie + B.height)
                        }
                    } else
                        "line" === n.type ? (o = n.bg,
                        p = n.cg,
                        v = n.Ci,
                        w = n.Di) : "biaopai" === n.type && (w = n.V5,
                        o = w.he,
                        p = w.ie,
                        v = w.he + w.width,
                        w = w.ie + w.height);
                    o !== l && (n.bg = o,
                    n.cg = p,
                    n.Ci = v,
                    n.Di = w,
                    c.push(n))
                }
            c.sort(function(a, b) {
                return b.Cy - a.Cy || b.bg - a.bg || b.cg - a.cg
            });
            f = 0;
            for (g = c.length; f < g; f++) {
                m = c[f];
                m.At = t;
                m.dK = [];
                for (k = f + 1; k < g; k++)
                    i = c[k],
                    m.Ci - e < i.bg || (m.bg > i.Ci - e || m.Di - e < i.cg || m.cg > i.Di - e) || m.dK.push(k)
            }
            f = 0;
            for (g = c.length; f < g; f++)
                if (k = c[f],
                k.At === t) {
                    e = k.dK;
                    k = 0;
                    for (m = e.length; k < m; k++)
                        c[e[k]].At = q
                }
            return c
        },
        Qx: {}
    };
    var de = ["round", "butt", "square"]
      , ee = ["miter", "round", "bevel"]
      , fe = {
        daojiao: [{
            stroke: "#FF6600",
            tb: 1,
            rb: "round",
            sb: "round",
            Zc: [4, 3]
        }],
        daojiao_bai: [{
            stroke: "#f5f3f0",
            tb: 1,
            rb: "round",
            sb: "round",
            Zc: [4, 3]
        }],
        junhuoxian: [],
        lundu: [{
            stroke: "#5c91c5",
            tb: 1,
            rb: "round",
            sb: "round",
            Zc: [10, 11]
        }],
        shengjie: [],
        weidingguojie: [{
            stroke: "#aea08a",
            tb: 1,
            rb: "round",
            sb: "round",
            Zc: [4, 3]
        }],
        weidingguojie_guowai: [{
            stroke: "#a29e96",
            tb: 2,
            rb: "round",
            sb: "round",
            Zc: [4, 3]
        }],
        weidingguojie_guonei: [],
        weidingshengjie_guowai: []
    }
      , ge = {
        weidingshengjie_guowai: [{
            stroke: "#737373",
            tb: 1,
            rb: "round",
            sb: "round",
            Zc: [4, 3]
        }],
        junhuoxian: [{
            stroke: "#DB7093",
            tb: 1.5,
            rb: "round",
            sb: "round",
            Zc: [4, 3]
        }],
        shengjie: [{
            stroke: "#737373",
            tb: 1,
            rb: "round",
            sb: "round",
            Zc: [10, 4, 5, 4]
        }],
        weidingguojie_guonei: [{
            stroke: "#b2a471",
            tb: 2,
            rb: "round",
            sb: "round",
            Zc: [4, 3]
        }]
    }
      , he = {};
    function ie(a, b, c) {
        if (/^tielu|^MapRes\/tielu/.test(a)) {
            if ("off" === window[c + "zoomFrontStyle"][b].bmapRailwayVisibility)
                return [];
            var e = "#ffffff"
              , f = "#949494";
            window[c + "zoomFrontStyle"] && (window[c + "zoomFrontStyle"][b] && window[c + "zoomFrontStyle"][b].bmapRailwayStrokeColor) && (e = window[c + "zoomFrontStyle"][b].bmapRailwayStrokeColor);
            window[c + "zoomFrontStyle"] && (window[c + "zoomFrontStyle"][b] && window[c + "zoomFrontStyle"][b].bmapRailwayFillColor) && (f = window[c + "zoomFrontStyle"][b].bmapRailwayFillColor);
            if (4 <= b && 9 >= b || 10 <= b && 16 >= b)
                return [{
                    stroke: e,
                    tb: 1.5,
                    rb: "butt",
                    sb: "round",
                    Zc: [10, 11]
                }, {
                    stroke: f,
                    tb: 2,
                    rb: "round",
                    sb: "round"
                }];
            if (17 <= b && 18 >= b)
                return [{
                    stroke: e,
                    tb: 2.5,
                    rb: "butt",
                    sb: "round",
                    Zc: [15, 16]
                }, {
                    stroke: f,
                    tb: 5,
                    rb: "round",
                    sb: "round"
                }];
            if (19 <= b && 20 >= b)
                return [{
                    stroke: e,
                    tb: 4.5,
                    rb: "butt",
                    sb: "round",
                    Zc: [25, 26]
                }, {
                    stroke: f,
                    tb: 5,
                    rb: "round",
                    sb: "round"
                }]
        } else if (0 === a.indexOf("ditie_zj") || 0 === a.indexOf("MapRes/ditie_zj")) {
            if (12 <= b && 16 >= b)
                return [{
                    stroke: "#868686",
                    tb: 1,
                    rb: "round",
                    sb: "round",
                    Zc: [7, 4]
                }];
            if (17 <= b && 18 >= b || 19 <= b && 20 >= b)
                return [{
                    stroke: "#6e6e6e",
                    tb: 1,
                    rb: "round",
                    sb: "round",
                    Zc: [7, 4]
                }]
        } else if (/^tongdaomian|^MapRes\/tongdaomian/.test(a)) {
            if (17 === b)
                return [{
                    stroke: "#e5e5e5",
                    tb: 4,
                    rb: "square",
                    sb: "round"
                }, {
                    stroke: "#a8a8a8",
                    tb: 6,
                    rb: "square",
                    sb: "round"
                }];
            if (18 === b)
                return [{
                    stroke: "#e5e5e5",
                    tb: 6,
                    rb: "square",
                    sb: "round"
                }, {
                    stroke: "#a8a8a8",
                    tb: 8,
                    rb: "square",
                    sb: "round"
                }];
            if (19 <= b && 21 >= b)
                return [{
                    stroke: "#e5e5e5",
                    tb: 8,
                    rb: "square",
                    sb: "round"
                }, {
                    stroke: "#a8a8a8",
                    tb: 10,
                    rb: "square",
                    sb: "round"
                }]
        } else if (/^jietizhongduan|^dixiatongdaojieti|^MapRes\/jietizhongduan|^MapRes\/dixiatongdaojieti/.test(a)) {
            if (17 === b)
                return [{
                    stroke: "#e5e5e5",
                    tb: 4,
                    rb: "butt",
                    sb: "round",
                    Zc: [2, 1]
                }, {
                    stroke: "#bebebe",
                    tb: 6,
                    rb: "butt",
                    sb: "round"
                }];
            if (18 === b)
                return [{
                    stroke: "#e5e5e5",
                    tb: 6,
                    rb: "butt",
                    sb: "round",
                    Zc: [3, 1]
                }, {
                    stroke: "#bebebe",
                    tb: 8,
                    rb: "butt",
                    sb: "round"
                }];
            if (19 <= b && 21 >= b)
                return [{
                    stroke: "#e5e5e5",
                    tb: 8,
                    rb: "butt",
                    sb: "round",
                    Zc: [4, 2]
                }, {
                    stroke: "#bebebe",
                    tb: 10,
                    rb: "butt",
                    sb: "round"
                }]
        } else if (/^guojietianqiao|^MapRes\/guojietianqiao/.test(a))
            return 18 === b ? [{
                stroke: "#ffffff",
                tb: 6,
                rb: "butt",
                sb: "round",
                Zc: [4, 2]
            }, {
                stroke: "#bebebe",
                tb: 8,
                rb: "butt",
                sb: "round"
            }] : [{
                stroke: "#ffffff",
                tb: 8,
                rb: "butt",
                sb: "round",
                Zc: [4, 2]
            }, {
                stroke: "#bebebe",
                tb: 10,
                rb: "butt",
                sb: "round"
            }];
        return fe[a] || fe[a.replace("MapRes/", "")]
    }
    var je = {
        drawLink: function(a, b, c, e, f) {
            this.da = f.P.da;
            var g = a[1];
            g && (a = a[6],
            this.UO(g, c, e, b, a, f, q),
            this.UO(g, c, e, b, a, f, t))
        },
        UO: function(a, b, c, e, f, g, i) {
            for (var k = 0; k < a.length; k++) {
                var m = a[k][0]
                  , n = g.Cj(m, "line", b);
                if (n && n.length && (!i || n[0].borderWidth))
                    if (!n[0].Dm || ie(n[0].Dm, b, this.da))
                        for (var o = a[k][1], p = 0; p < o.length; p++) {
                            var v = o[p][3];
                            g.Uc(v[0], b) && (v["cache" + b] || (v["cache" + b] = g.dn(v[1], b, c, f)),
                            v = v["cache" + b],
                            g.P.Mo(e.canvas.id, v, {
                                type: "polyline",
                                Yb: m,
                                style: n
                            }),
                            this.OW(e, v, n, i, b))
                        }
            }
        },
        drawSingleTexture: function(a, b, c, e, f) {
            var g = a[1];
            if (g)
                for (var a = a[6], i = 0; i < g.length; i++) {
                    var k = f.Cj(g[i][0], "line", c);
                    if (k && k.length)
                        for (var m = g[i][1], n = 0; n < m.length; n++) {
                            var o = m[n][11];
                            if (f.Uc(o[0], c)) {
                                var p;
                                o["cache" + c] || (o["cache" + c] = f.dn(o[1], c, e, a));
                                p = o["cache" + c];
                                o = o[3];
                                o *= Math.pow(2, c - f.x1[c].Sc);
                                this.PW(b, p, k, o, f)
                            }
                        }
                }
        },
        PW: function(a, b, c, e, f) {
            var g = c[0].Dm
              , i = this;
            if (he[g])
                i.Qs(b, e, a, he[g]);
            else if (c = f.CL(g)) {
                var k = new Image;
                k.onload = function() {
                    he[g] = k;
                    i.Qs(b, e, a, k);
                    k.onload = s
                }
                ;
                k.src = c
            }
        },
        Qs: function(a, b, c, e) {
            var f = [a[0], a[1]]
              , g = [a[2], a[3]]
              , a = g[0] - f[0]
              , g = g[1] - f[1]
              , f = [f[0] + a / 2, f[1] + g / 2]
              , i = Math.sqrt(a * a + g * g)
              , b = b / 10
              , a = Math.atan2(g, a);
            c.save();
            c.translate(f[0], f[1]);
            c.rotate(Math.PI / 2 + a);
            c.drawImage(e, -b / 2, -i / 2, b, i);
            c.restore()
        },
        OW: function(a, b, c, e, f) {
            c = c[0];
            if (!e && c.Dm) {
                var f = ie(c.Dm, f, this.da)
                  , g = ge[c.Dm] || ge[c.Dm.replace("MapRes/", "")];
                if (g) {
                    this.WK(a, b, c, g, q);
                    return
                }
                if (f) {
                    this.WK(a, b, c, f, t);
                    return
                }
            }
            a.beginPath();
            a.moveTo(b[0], b[1]);
            f = 2;
            for (g = b.length; f < g; f += 2)
                a.lineTo(b[f], b[f + 1]);
            c.borderWidth && e ? (a.strokeStyle = c.So,
            a.lineCap = de[c.sV],
            a.lineJoin = ee[1],
            a.lineWidth = c.borderWidth / 2,
            a.stroke()) : e || (a.strokeStyle = c.ox,
            a.lineCap = de[c.jX],
            a.lineJoin = ee[1],
            a.lineWidth = c.hL / 2,
            a.stroke())
        },
        WK: function(a, b, c, e, f) {
            if (c = e[1]) {
                a.strokeStyle = c.stroke;
                a.lineCap = c.rb;
                a.lineJoin = c.sb;
                a.lineWidth = c.tb;
                a.beginPath();
                a.moveTo(b[0], b[1]);
                for (var c = 2, g = b.length; c < g; c += 2)
                    a.lineTo(b[c], b[c + 1]);
                a.stroke()
            }
            if (e = e[0])
                if (e.Zc)
                    f ? this.QW(a, b, e) : this.MW(a, b, e);
                else {
                    a.strokeStyle = e.stroke;
                    a.lineCap = e.rb;
                    a.lineJoin = e.sb;
                    a.lineWidth = e.tb;
                    a.beginPath();
                    a.moveTo(b[0], b[1]);
                    c = 2;
                    for (g = b.length; c < g; c += 2)
                        a.lineTo(b[c], b[c + 1]);
                    a.stroke()
                }
        },
        QW: function(a, b, c) {
            a.strokeStyle = c.stroke;
            a.lineCap = c.rb;
            a.lineJoin = c.sb;
            a.lineWidth = c.tb;
            a.setLineDash(c.Zc);
            a.beginPath();
            for (c = 0; c < b.length - 2; c += 2)
                a.lineTo(b[c], b[c + 1]);
            a.stroke();
            a.setLineDash([])
        },
        MW: function(a, b, c) {
            a.strokeStyle = c.stroke;
            a.lineCap = c.rb;
            a.lineJoin = c.sb;
            a.lineWidth = c.tb;
            var e = q
              , c = c.Zc[0];
            a.beginPath();
            for (var f = 0; f < b.length - 2; f += 2) {
                var g = b[f]
                  , i = b[f + 1]
                  , k = b[f + 2] - g
                  , m = b[f + 3] - i
                  , n = 0 !== k ? m / k : 0 < m ? 1E15 : -1E15
                  , m = Math.sqrt(k * k + m * m)
                  , o = c;
                for (a.moveTo(g, i); 0.1 <= m; ) {
                    o > m && (o = m);
                    var p = Math.sqrt(o * o / (1 + n * n));
                    0 > k && (p = -p);
                    g += p;
                    i += n * p;
                    a[e ? "lineTo" : "moveTo"](g, i);
                    m -= o;
                    e = !e
                }
            }
            a.stroke()
        }
    };
    var ke = 3, le = 4, ne = 7, oe = 8, pe = 15, qe = 16, re = {}, se = {}, te = {}, ue, ve = {
        3: {
            start: 3,
            Sc: 3
        },
        4: {
            start: 4,
            Sc: 5
        },
        5: {
            start: 4,
            Sc: 5
        },
        6: {
            start: 6,
            Sc: 7
        },
        7: {
            start: 6,
            Sc: 7
        },
        8: {
            start: 8,
            Sc: 9
        },
        9: {
            start: 8,
            Sc: 9
        },
        10: {
            start: 10,
            Sc: 10
        },
        11: {
            start: 11,
            Sc: 12
        },
        12: {
            start: 11,
            Sc: 12
        },
        13: {
            start: 11,
            Sc: 12
        },
        14: {
            start: 14,
            Sc: 15
        },
        15: {
            start: 14,
            Sc: 15
        },
        16: {
            start: 16,
            Sc: 17
        },
        17: {
            start: 16,
            Sc: 17
        },
        18: {
            start: 18,
            Sc: 19
        },
        19: {
            start: 18,
            Sc: 19
        },
        20: {
            start: 18,
            Sc: 19
        },
        21: {
            start: 18,
            Sc: 19
        }
    };
    function we(a) {
        this.P = a;
        this.Lc = a.M.devicePixelRatio;
        this.x1 = ve
    }
    we.prototype = {
        VC: function(a, b, c, e, f, g, i, k, m) {
            this.P.zO = {};
            var n = this
              , o = n.P.da;
            m || (m = 0);
            if (!window[o + "StyleBody"] && 100 > m)
                setTimeout(function() {
                    n.VC(a, b, c, e, f, g, i, k, m + 1)
                }, 100);
            else {
                ue || (ue = k);
                var p = b.getContext("2d")
                  , v = b.parentNode;
                v.removeChild(b);
                p.clearRect(0, 0, g, g);
                v.appendChild(b);
                v = this.Lc;
                1 < v && !b._scale && (p.scale(v, v),
                b._scale = q);
                p.fillStyle = this.CN("#F5F3F0");
                window[o + "zoomFrontStyle"][f].bmapLandColor && (p.fillStyle = this.CN(window[o + "zoomFrontStyle"][f].bmapLandColor));
                o = b.style.width;
                b.style.width = "0px";
                b.style.width = o;
                (o = xe.sY(c, g, i)) ? p.fillRect(o[0], o[1], o[2], o[3]) : p.fillRect(0, 0, g, g);
                if (a[0])
                    for (o = 0; o < a[0].length; o++)
                        v = a[0][o],
                        v[0] === ne && $d.drawPoly(v, p, f, g, this);
                17 <= this.P.la() ? (n.UK(a, p, f, g, i, c, e),
                b.$n = q) : setTimeout(function() {
                    if (!b.vH) {
                        n.UK(a, p, f, g, i, c, e);
                        b.$n = q
                    }
                }, 1)
            }
        },
        UK: function(a, b, c, e) {
            var f = this.P.da;
            if (a[0])
                for (var g = 0; g < a[0].length; g++) {
                    var i = a[0][g]
                      , k = i[0];
                    k === le ? je.drawLink(i, b, c, e, this) : k === qe ? je.drawLink(i, b, c, e, this) : k === pe ? ($d.drawGaoqingRoadBorder(i, b, c, e, this),
                    $d.drawGaoqingRoadFill(i, b, c, e, this)) : 18 === k ? window[f + "zoomFrontStyle"] && (window[f + "zoomFrontStyle"][c] && "off" !== window[f + "zoomFrontStyle"][c].bmapRoadarrowVisibility) && ae.drawArrow(i, b, c, e, Math.pow(2, c - ve[c].Sc), this) : k === oe ? be.drawHregion(i, b, c, e, this) : 19 === k && je.drawSingleTexture(i, b, c, e, this)
                }
        },
        TK: function(a, b, c, e, f, g, i) {
            var k = this
              , m = k.P.da;
            i || (i = 0);
            !window[m + "StyleBody"] && 100 > i ? setTimeout(function() {
                k.TK(a, b, c, e, f, g, i + 1)
            }, 100) : (ue || (ue = b),
            a.f_ = ce.parse(a, c, e, this, f))
        },
        Cj: function(a, b, c, e) {
            var f = a + "-" + b + "-" + c;
            if (e)
                return re[f] || (re[f] = this.Hg(a, b, c, e)),
                re[f];
            this.P.zO[f] = this.Hg(a, b, c);
            return this.P.zO[f]
        },
        Hg: function(a, b, c, e) {
            var f = this.P.da, g;
            g = e || window[f + "_bmap_baseFs"];
            f = window[f + "StyleBody"];
            e = g[2];
            if ("arrow" === b)
                return this.VZ(e[2]);
            switch (b) {
            case "point":
                e = e[0];
                f = f[0] || {};
                break;
            case "pointText":
                e = e[1];
                f = f[1] || {};
                break;
            case "line":
                e = e[3];
                f = f[3] || {};
                break;
            case "polygon":
                e = e[4];
                f = f[4] || {};
                break;
            case "polygon3d":
                e = e[5],
                f = f[5] || {}
            }
            var i = []
              , c = g[1][c - 1][0][a];
            if (!c)
                return i;
            for (g = 0; g < c.length; g++) {
                var k = f[c[g]] || e[c[g]];
                if (k) {
                    switch (b) {
                    case "polygon":
                        k = this.d_(k, a);
                        break;
                    case "line":
                        k = this.$Z(k, a);
                        break;
                    case "pointText":
                        k = this.b_(k, a);
                        break;
                    case "point":
                        k = this.a_(k, a);
                        break;
                    case "polygon3d":
                        k = this.c_(k, a)
                    }
                    k.C6 = c[g];
                    i[i.length] = k
                }
            }
            return i
        },
        b_: function(a, b) {
            return {
                Yb: b,
                lL: this.Pg(a[0]),
                dM: this.Pg(a[1]),
                U2: this.Pg(a[2]),
                fontSize: a[3],
                Ix: a[4],
                fontWeight: a[5],
                fontStyle: a[6],
                uW: a[7]
            }
        },
        a_: function(a, b) {
            return {
                Yb: b,
                Cy: a[0],
                U6: a[1],
                Ce: a[2],
                JY: a[3],
                D5: a[4],
                uW: a[5],
                zoom: a[6]
            }
        },
        $Z: function(a, b) {
            return {
                Yb: b,
                So: this.Pg(a[0]),
                ox: this.Pg(a[1]),
                borderWidth: a[2],
                hL: a[3],
                sV: a[4],
                jX: a[5],
                K4: a[6],
                L4: a[7],
                M4: a[8],
                e5: a[9],
                f5: a[10],
                tV: a[11],
                Dm: a[12],
                uV: a[13],
                G3: a[14],
                c5: a[15],
                I4: a[16],
                C5: a[17],
                h6: a[18]
            }
        },
        d_: function(a, b) {
            return {
                Yb: b,
                ox: this.Pg(a[0]),
                So: this.Pg(a[1]),
                borderWidth: a[2],
                tV: a[3],
                uV: a[4],
                c7: a[5],
                H4: a[6],
                G6: a[7],
                H6: this.Pg(a[8])
            }
        },
        c_: function(a, b) {
            return {
                Yb: b,
                filter: a[0],
                ON: a[1],
                J4: a[2],
                borderWidth: a[3],
                So: this.Pg(a[4]),
                kX: this.Pg(a[5]),
                F3: this.Pg(a[6]),
                T5: a[7]
            }
        },
        VZ: function(a) {
            for (var b in a)
                return a = a[b],
                {
                    color: this.Pg(a[0]),
                    JY: a[1],
                    Ce: a[2]
                }
        },
        Pg: function(a) {
            var b = a;
            if (te[b])
                return te[b];
            a >>>= 0;
            te[b] = "rgba(" + (a & 255) + "," + (a >> 8 & 255) + "," + (a >> 16 & 255) + "," + (a >> 24 & 255) / 255 + ")";
            return te[b]
        },
        CN: function(a) {
            a = a.replace("#", "");
            6 === a.length && (a += "ff");
            for (var b = "rgba(", c = 0; 8 > c; c += 2)
                b = 6 > c ? b + (parseInt(a.slice(c, c + 2), 16) + ",") : b + (parseInt(a.slice(c, c + 2), 16) / 255 + ")");
            return b
        },
        Uc: function(a, b) {
            var c;
            se[a] || (c = a.toString(2),
            8 > c.length && (c = Array(8 - c.length + 1).join("0") + c),
            se[a] = c);
            c = se[a];
            return "1" === c[b - ve[b].start]
        },
        dn: function(a, b, c) {
            var e = []
              , b = Math.pow(2, b - ve[b].Sc) / 100
              , f = a[0] * b
              , g = a[1] * b;
            e[e.length] = f;
            e[e.length] = c - g;
            for (var i = 2; i < a.length; i += 2)
                f += a[i] * b,
                g += a[i + 1] * b,
                e[e.length] = f,
                e[e.length] = c - g;
            return e
        },
        CL: function(a) {
            if (a) {
                var b = a.length % ue.length
                  , c = this.PX();
                return ue[b] + a + ".png?v=" + c.bG + "&udt=" + c.YF
            }
        },
        PX: function() {
            if (this.iE)
                return this.iE;
            var a = "undefined" !== typeof MSV ? MSV.t5 : {};
            return this.iE = {
                bG: a.version ? a.version : "001",
                YF: a.Z0 ? a.Z0 : "20150621"
            }
        }
    };
    O = x.lang.Pu;
    ke = 3;
    le = 4;
    ne = 7;
    oe = 8;
    pe = 15;
    qe = 16;
    function Id(a, b, c) {
        c = c || {};
        this.P = a;
        this.xw = b;
        this.Lc = b.ON;
        this.fb = {
            E0: "na",
            zIndex: 0,
            GO: c.tileUrls || {
                http: ["http://maponline0.bdimg.com/pvd/?qt=vtile", "http://maponline1.bdimg.com/pvd/?qt=vtile", "http://maponline2.bdimg.com/pvd/?qt=vtile", "http://maponline3.bdimg.com/pvd/?qt=vtile", "http://maponline0.bdimg.com/pvd/?qt=vtile"],
                https: ["https://maponline0.bdimg.com/pvd/?qt=vtile", "https://maponline1.bdimg.com/pvd/?qt=vtile", "https://maponline2.bdimg.com/pvd/?qt=vtile", "https://maponline3.bdimg.com/pvd/?qt=vtile", "https://maponline0.bdimg.com/pvd/?qt=vtile"]
            },
            hE: c.iconUrls || ["https://maponline0.bdimg.com/sty/map_icons2x/", "https://maponline1.bdimg.com/sty/map_icons2x/"],
            DF: q
        };
        this.MB = "";
        this.bT = {};
        var c = c.urlOpts || {
            styles: "pl",
            extdata: 1,
            textimg: 0,
            mesh3d: 0,
            limit: 30
        }, e;
        for (e in c)
            c.hasOwnProperty(e) && (this.MB = this.MB + "&" + e + "=" + c[e]);
        this.th = {};
        this.Bs = [];
        this.Ht = 0;
        this.Wx = t;
        this.Qx = {};
        a = this.fb.E0;
        Ud[a] ? a = Ud[a] : (b = new Vd(a,l),
        a = Ud[a] = b);
        this.Id = a;
        this.P.Id = this.Id
    }
    window.VectorIndoorTileLayer = "VectorIndoorTileLayer";
    ga = Id.prototype;
    ga.za = function() {
        var a = this.P
          , b = a.ef;
        if (!this.Io) {
            var c = b.Vq(this.fb.zIndex);
            c.style.WebkitTransform = "translate3d(0px, 0px, 0)";
            this.Io = c
        }
        b.ng.appendChild(this.Io);
        b.X4 = c;
        if (this.fb.DF) {
            ye(this);
            var e = this;
            a.addEventListener("checkvectorclick", function(a) {
                var b;
                a: {
                    b = a.offsetX;
                    var c = a.offsetY
                      , k = e.Bs.f_;
                    if (k)
                        for (var m = 0; m < k.length; m++)
                            for (var n = k[m], o = 0; o < n.length; o++)
                                if (a = n[o],
                                !a.At && a.vt && b > a.bg && b < a.Ci && c > a.cg && c < a.Di) {
                                    b = a.vt;
                                    b = {
                                        type: 9,
                                        name: a.name,
                                        uid: a.uid,
                                        point: {
                                            x: b.he + b.width / 2,
                                            y: b.ie + 6
                                        }
                                    };
                                    break a
                                }
                    b = s
                }
                b && (a = new O("onvectorclick"),
                a.T4 = b,
                a.Xe = "base",
                this.dispatchEvent(a))
            })
        }
    }
    ;
    function ye(a) {
        var b = a.P
          , c = b.ef
          , e = a.Lc
          , f = b.wb()
          , g = f.width
          , f = f.height
          , i = F("canvas");
        i.style.cssText = "position: absolute;left:0;top:0;width:" + g + "px;height:" + f + "px;z-index:2;";
        i.width = g * e;
        i.height = f * e;
        a.$x = i;
        a.Kp = i.getContext("2d");
        a.Kp.scale(e, e);
        a.Kp.textBaseline = "top";
        c.ng.appendChild(i);
        b.MS = i
    }
    ga.tY = u("Id");
    ga.update = function(a, b) {
        b = b || {};
        this.ZF = b.ZF;
        b.Cm && (this.$0 = b.Cm);
        if (this.fb.DF && (b.tm && this.tm(),
        b.m0)) {
            var c = this.Lc
              , e = this.P.wb()
              , f = e.width
              , e = e.height
              , g = this.$x
              , i = g.style;
            i.width = f + "px";
            i.height = e + "px";
            g.width = f * c;
            g.height = e * c;
            this.Kp.scale(c, c);
            this.Kp.textBaseline = "top"
        }
        if (b.X6) {
            c = this.Io;
            f = 0;
            for (e = c.childNodes.length; f < e; f++)
                c.childNodes[f].$n = t
        }
        this.dx = a;
        this.Np(a)
    }
    ;
    ga.Np = function(a) {
        this.Bs = [];
        var b = this.P
          , c = b.la()
          , e = b.Dc.zi(b.ge)
          , f = this.Id.Wb(c)
          , e = [Math.round(-e.lng / f), Math.round(e.lat / f)]
          , f = this.Id.le(c)
          , g = b.da.replace(/^TANGRAM_/, "")
          , i = this.Id.rp(c)
          , b = this.P
          , k = -b.offsetY + b.height / 2
          , m = this.Io;
        m.style.left = -b.offsetX + b.width / 2 + "px";
        m.style.top = k + "px";
        this.Ue ? this.Ue.length = 0 : this.Ue = [];
        b = 0;
        for (k = m.childNodes.length; b < k; b++) {
            var n = m.childNodes[b];
            n.tr = t;
            this.Ue.push(n)
        }
        if (b = this.an)
            for (var o in b)
                delete b[o];
        else
            this.an = {};
        this.Ve ? this.Ve.length = 0 : this.Ve = [];
        b = 0;
        for (k = a.length; b < k; b++) {
            var n = a[b][0]
              , p = a[b][1];
            o = xe.sm(a[b][0], a[b][2], a[b][3]);
            o.offsetX && (a[b][0] = o.Ag,
            a[b][4] = n,
            a[b][5] = o.offsetX / 2,
            n = o.Ag);
            o = 0;
            for (var v = this.Ue.length; o < v; o++) {
                var w = this.Ue[o];
                if (w.id === g + "_" + n + "_" + p + "_" + i + "_" + c) {
                    w.tr = q;
                    this.an[w.id] = w;
                    break
                }
            }
        }
        b = 0;
        for (k = this.Ue.length; b < k; b++)
            w = this.Ue[b],
            w.tr || (w.QB = s,
            delete w.QB,
            w.$n = t,
            this.Ve.push(w));
        o = [];
        v = f * this.Lc;
        b = 0;
        for (k = a.length; b < k; b++) {
            var n = a[b][0]
              , p = a[b][1]
              , w = a[b][4] ? a[b][4] * f + e[0] + a[b][5] : n * f + e[0]
              , y = (-1 - p) * f + e[1]
              , z = g + "_" + n + "_" + p + "_" + i + "_" + c
              , B = this.an[z]
              , D = s;
            if (B)
                D = B.style,
                D.left = w + "px",
                D.top = y + "px",
                D.width = f + "px",
                D.height = f + "px",
                B.$n ? B.PF && B.PF && this.Bs.push(B.PF) : (B.vH = q,
                B.QB = s,
                delete B.QB,
                o.push([n, p, B]));
            else {
                if (0 < this.Ve.length) {
                    var B = this.Ve.shift()
                      , G = B.getContext("2d");
                    B.getAttribute("width") !== v && (B._scale = t);
                    B.setAttribute("width", v);
                    B.setAttribute("height", v);
                    D = B.style;
                    D.width = f + "px";
                    D.height = f + "px";
                    G.clearRect(0, 0, v, v)
                } else
                    B = document.createElement("canvas"),
                    D = B.style,
                    D.position = "absolute",
                    this.fb.backgroundColor && (D.background = this.fb.backgroundColor),
                    D.width = f + "px",
                    D.height = f + "px",
                    B.setAttribute("width", v),
                    B.setAttribute("height", v),
                    m.appendChild(B);
                B.id = z;
                D.left = w + "px";
                D.top = y + "px";
                o.push([n, p, B])
            }
            B.style.visibility = ""
        }
        b = 0;
        for (k = this.Ve.length; b < k; b++)
            this.Ve[b].style.visibility = "hidden";
        if (0 === o.length) {
            ze(this);
            a = this.P.da.replace(/^TANGRAM_/, "");
            c = this.P.la();
            e = this.Id.rp(c);
            f = {};
            for (g = 0; g < this.dx.length; g++)
                i = this.dx[g],
                i = a + "_" + i[0] + "_" + i[1] + "_" + e + "_" + c,
                this.th[i] && (f[i] = this.th[i],
                this.ZF && this.xw.WC.VC(this.th[i].m1, this.th[i].C0, this.th[i].Ag, this.th[i].ln, this.th[i].JE, this.Id.le(this.th[i].JE), this.Id.SD(this.th[i].JE), this.fb.hE));
            this.th = f
        } else {
            this.Ht = o.length;
            this.Wx = t;
            c = this.Id.rp(this.P.la());
            for (e = 0; e < a.length; e++)
                a[e][3] = c;
            for (e = 0; e < o.length; e++)
                a = o[e][2],
                f = o[e][0],
                g = o[e][1],
                o[e][3] = c,
                a.$n = t,
                a.vH = t,
                Ae(this, f, g, c, a)
        }
    }
    ;
    function Ae(a, b, c, e, f) {
        var g = b + "_" + c + "_" + e
          , i = a.bT;
        if (i[g]) {
            if ("loading" === i[g].status)
                return
        } else
            i[g] = {
                status: "init",
                VN: 0
            };
        var k = a
          , m = k.P
          , n = []
          , n = "0" === A.Hu ? k.fb.GO.http : k.fb.GO.https
          , o = Math.abs(b + c) % n.length
          , p = "x=" + b + "&y=" + c + "&z=" + e
          , v = Be(a.xw)
          , w = v.bG
          , v = v.YF
          , y = "_" + (0 > b ? "_" : "") + (0 > c ? "$" : "") + parseInt(Math.abs(b) + "" + Math.abs(c) + "" + e, 10).toString(36)
          , p = p + a.MB + "v=" + w + "&udt=" + v + "&fn=window." + y
          , w = n[o] + "&" + p
          , w = n[o] + "&param=" + window.encodeURIComponent(Rb(p));
        window[y] = function(a) {
            clearTimeout(i[g].kl);
            i[g] = s;
            if (a) {
                var n = m.la(), o;
                a: {
                    for (o = 0; o < k.dx.length; o++) {
                        var p = k.dx[o];
                        if (p[0] === b && p[1] === c && p[3] === e) {
                            o = q;
                            break a
                        }
                    }
                    o = t
                }
                if (o !== t) {
                    o = new O("updateindoor");
                    o.IndoorCanvas = [];
                    o.IndoorCanvas.push({
                        canvasDom: f,
                        data: a,
                        canvasID: f.id,
                        ratio: k.Lc
                    });
                    m.dispatchEvent(o);
                    if (m.M.Fk) {
                        if (k.th[f.id] = {
                            m1: a,
                            C0: f,
                            Ag: b,
                            ln: c,
                            JE: n
                        },
                        k.xw.WC.VC(a, f, b, c, n, k.Id.le(n), k.Id.SD(n), k.fb.hE),
                        k.fb.DF) {
                            n = [];
                            n.D0 = [b, c, e];
                            if (a[0])
                                for (o = 0; o < a[0].length; o++)
                                    a[0][o][0] === ke && n.push({
                                        EM: a[0][o]
                                    });
                            if (a[2])
                                for (o = 0; o < a[2].length; o++)
                                    n.push({
                                        oZ: a[2][o]
                                    });
                            f.PF = n;
                            k.Bs.push(n);
                            k.Wx === t && k.Ht--;
                            (0 === k.Ht || k.Wx === q) && ze(k)
                        }
                    } else
                        k.Ht--,
                        (0 === k.Ht || k.Wx === q) && ze(k);
                    delete window[y]
                }
            }
        }
        ;
        sa(w);
        i[g].status = "loading";
        k = a;
        i[g].kl = setTimeout(function() {
            3 > i[g].VN ? (i[g].VN++,
            i[g].status = "init",
            Ae(k, b, c, e, f)) : i[g] = s
        }, 4E3)
    }
    function ze(a) {
        if (a.$x) {
            var b = a.P;
            a.$x.style.left = -b.offsetX + "px";
            a.$x.style.top = -b.offsetY + "px";
            var c = new O("updateindoorlabel");
            c.labelCanvasDom = b.MS;
            b.dispatchEvent(c);
            if (b.M.Fk) {
                a.tm();
                var c = a.Id
                  , e = b.la()
                  , f = c.rp(b.la());
                a.xw.WC.TK(a.Bs, a.fb.hE, a.Kp, c.le(e), Math.pow(2, e - f), e);
                "moving" !== a.$0 && b.dispatchEvent(new O("ontilesloaded"))
            }
        }
    }
    ga.tm = function() {
        var a = this.P.wb()
          , b = this.Lc;
        this.Kp.clearRect(0, 0, a.width * b, a.height * b)
    }
    ;
    ga.remove = function() {
        var a = this.P.ef;
        this.Io && a.ng.removeChild(this.Io)
    }
    ;
    function Hd(a) {
        this.P = a.map;
        this.jf = [];
        this.cs = {};
        this.ON = this.P.M.devicePixelRatio;
        this.WC = new we(this.P);
        this.za()
    }
    window.VectorIndoorTileMgr = "VectorIndoorTileMgr";
    ga = Hd.prototype;
    ga.za = function() {
        var a = this
          , b = this.P;
        b.addEventListener("addtilelayer", function(b) {
            a.Te(b.target)
        });
        b.addEventListener("removetilelayer", function(b) {
            a.fg(b.target)
        });
        setTimeout(function() {
            b.addEventListener("onmoveend", function(b) {
                "centerAndZoom" !== b.Zz && a.update({
                    Cm: "moveend"
                })
            });
            b.addEventListener("onmoving", function() {
                a.update({
                    Cm: "moving"
                })
            });
            b.addEventListener("onzoomend", function(b) {
                "centerAndZoom" !== b.Zz && a.update({
                    tm: q,
                    Cm: "zoomend"
                })
            });
            b.addEventListener("centerandzoom", function() {
                a.update({
                    tm: q,
                    Cm: "centerandzoom"
                })
            });
            b.addEventListener("onupdatestyles", function() {
                a.update({
                    tm: q,
                    ZF: q,
                    Cm: "updatestyles"
                });
                a.P.Af(a.P.Hb());
                setTimeout(function() {
                    a.P.dispatchEvent(new O("onvectordrawend"))
                }, 10)
            });
            b.addEventListener("onmaptypechange", function(b) {
                b.Va === Ra && a.update({
                    tm: q,
                    Cm: "maptypechange"
                })
            })
        }, 1);
        b.addEventListener("indoor_data_refresh", ca());
        b.addEventListener("onresize", function() {
            a.update({
                m0: q
            })
        });
        a.update()
    }
    ;
    ga.Te = function(a) {
        if (a instanceof Id) {
            for (var b = 0; b < this.jf.length; b++)
                if (this.jf[b] === a)
                    return;
            this.jf.push(a);
            a.za();
            this.P.loaded && this.update()
        }
    }
    ;
    ga.fg = function(a) {
        if (a instanceof Id) {
            for (var b = 0; b < this.jf.length; b++)
                if (this.jf[b] === a) {
                    this.jf.splice(b, 1);
                    break
                }
            a.remove()
        }
    }
    ;
    ga.UL = function(a) {
        var b = a.getName();
        if (this.cs[b])
            return this.cs[b];
        var c = this.P
          , e = c.la()
          , f = a.rp(e)
          , g = c.Jb
          , g = xe.iC(g)
          , i = a.SD(Math.floor(e))
          , a = a.zX(e);
        c.da.replace(/^TANGRAM_/, "");
        var e = Math.ceil(g.lng / i)
          , g = Math.ceil(g.lat / i)
          , k = 0
          , m = 0
          , n = c.BX()
          , n = xe.CV(n, c.Jb);
        n.kf.lng > xe.qg && (c = xe.ML(f),
        k = Math.ceil(c / a));
        n.nf.lng < xe.hh && (c = xe.ML(f),
        m = Math.ceil(c / a));
        if (1.9505879362428114E7 < n.kf.lat || -1.5949096637571886E7 > n.nf.lat)
            n.kf.lat = 1.9505879362428114E7,
            n.nf.lat = -1.5949096637571886E7;
        for (var c = [Math.floor(n.nf.lng / i) - m, Math.floor(n.nf.lat / i)], o = [Math.floor(n.kf.lng / i) + k, Math.floor(n.kf.lat / i)], k = [], n = o[0] + 1, m = c[1], o = o[1] + 1, c = c[0]; c < n; c++)
            if (xe.Xx(c, f, a) !== q)
                for (var p = m; p < o; p++)
                    k.push([c, p, f, a]);
        k = xe.jC(k, f, a, i);
        k.sort(function(a) {
            return function(b, c) {
                return 0.4 * Math.abs(b[0] - a[0]) + 0.6 * Math.abs(b[1] - a[1]) - (0.4 * Math.abs(c[0] - a[0]) + 0.6 * Math.abs(c[1] - a[1]))
            }
        }([e, g]));
        this.cs[b] = k;
        return this.cs[b]
    }
    ;
    function Be(a) {
        if (a.cG)
            return a.cG;
        a.cG = {
            bG: "001",
            YF: Zb("normal")
        };
        return a.cG
    }
    ga.update = function(a) {
        this.cs = {};
        for (var b = 0; b < this.jf.length; b++) {
            var c = this.jf[b]
              , e = this.UL(c.Id);
            c.update(e, a)
        }
    }
    ;
    function Ce(a, b, c) {
        this.bd = a;
        this.jf = b instanceof Jd ? [b] : b.slice(0);
        c = c || {};
        this.m = {
            H0: c.tips || "",
            DE: "",
            kc: c.minZoom || 4,
            qc: c.maxZoom || 18,
            R4: c.minZoom || 4,
            Q4: c.maxZoom || 18,
            Au: 256,
            OF: c.textColor || "black",
            pD: c.errorImageUrl || "",
            jb: new lb(new P(-21364736,-16023552),new P(23855104,19431424)),
            Dc: c.projection || new R
        };
        1 <= this.jf.length && (this.jf[0].Ow = q);
        x.extend(this.m, c)
    }
    x.extend(Ce.prototype, {
        getName: u("bd"),
        kt: function() {
            return this.m.H0
        },
        l4: function() {
            return this.m.DE
        },
        rY: function() {
            return this.jf[0]
        },
        B4: u("jf"),
        le: function() {
            return this.m.Au
        },
        sf: function() {
            return this.m.kc
        },
        Ye: function() {
            return this.m.qc
        },
        setMaxZoom: function(a) {
            this.m.qc = a
        },
        Om: function() {
            return this.m.OF
        },
        Aj: function() {
            return this.m.Dc
        },
        e4: function() {
            return this.m.pD
        },
        le: function() {
            return this.m.Au
        },
        Wb: function(a) {
            return Math.pow(2, 18 - a)
        },
        ZL: function(a) {
            return this.Wb(a) * this.le()
        },
        yF: function(a) {
            this.Aj().eO(a)
        }
    });
    var De = [A.url.proto + A.url.domain.TILE_BASE_URLS[0], A.url.proto + A.url.domain.TILE_BASE_URLS[1], A.url.proto + A.url.domain.TILE_BASE_URLS[2], A.url.proto + A.url.domain.TILE_BASE_URLS[3]]
      , Ee = [A.url.proto + A.url.domain.TILE_ONLINE_URLS[0] + "/tile/", A.url.proto + A.url.domain.TILE_ONLINE_URLS[1] + "/tile/", A.url.proto + A.url.domain.TILE_ONLINE_URLS[2] + "/tile/", A.url.proto + A.url.domain.TILE_ONLINE_URLS[3] + "/tile/"]
      , Fe = {
        dark: "dl",
        light: "ll",
        normal: "pl"
    }
      , Ge = new Jd;
    Ge.sO = q;
    Ge.getTilesUrl = function(a, b, c) {
        var e = a.x
          , a = a.y
          , f = Zb("normal")
          , g = 1
          , c = Fe[c];
        this.map.Px() && (g = 2);
        e = this.map.ef.sm(e, b).Ag;
        return (Ee[Math.abs(e + a) % Ee.length] + "?qt=vtile&x=" + (e + "").replace(/-/gi, "M") + "&y=" + (a + "").replace(/-/gi, "M") + "&z=" + b + "&styles=" + c + "&scaler=" + g + (6 == x.ga.oa ? "&color_dep=32&colors=50" : "") + "&udt=" + f + "&from=jsapi3_0").replace(/-(\d+)/gi, "M$1")
    }
    ;
    var Ra = new Ce("\u5730\u56fe",Ge,{
        tips: "\u663e\u793a\u666e\u901a\u5730\u56fe",
        maxZoom: 19
    })
      , He = new Jd;
    He.FO = [A.url.proto + A.url.domain.TIlE_PERSPECT_URLS[0] + "/resource/mappic/", A.url.proto + A.url.domain.TIlE_PERSPECT_URLS[1] + "/resource/mappic/", A.url.proto + A.url.domain.TIlE_PERSPECT_URLS[2] + "/resource/mappic/", A.url.proto + A.url.domain.TIlE_PERSPECT_URLS[3] + "/resource/mappic/"];
    He.getTilesUrl = function(a, b) {
        var c = a.x
          , e = a.y
          , f = 256 * Math.pow(2, 20 - b)
          , e = Math.round((9998336 - f * e) / f) - 1;
        return url = this.FO[Math.abs(c + e) % this.FO.length] + this.map.Qb + "/" + this.map.Tw + "/3/lv" + (21 - b) + "/" + c + "," + e + ".jpg"
    }
    ;
    var Ua = new Ce("\u4e09\u7ef4",He,{
        tips: "\u663e\u793a\u4e09\u7ef4\u5730\u56fe",
        minZoom: 15,
        maxZoom: 20,
        textColor: "white",
        projection: new nb
    });
    Ua.Wb = function(a) {
        return Math.pow(2, 20 - a)
    }
    ;
    Ua.Jk = function(a) {
        if (!a)
            return "";
        var b = J.oC, c;
        for (c in b)
            if (-1 < a.search(c))
                return b[c].vy;
        return ""
    }
    ;
    Ua.vL = function(a) {
        return {
            bj: 2,
            gz: 1,
            sz: 14,
            sh: 4
        }[a]
    }
    ;
    var Ie = new Jd({
        Ow: q
    });
    Ie.getTilesUrl = function(a, b) {
        var c = a.x
          , e = a.y;
        return (De[Math.abs(c + e) % De.length] + "u=x=" + c + ";y=" + e + ";z=" + b + ";v=009;type=sate&fm=46&udt=" + Zb("satellite")).replace(/-(\d+)/gi, "M$1")
    }
    ;
    var eb = new Ce("\u536b\u661f",Ie,{
        tips: "\u663e\u793a\u536b\u661f\u5f71\u50cf",
        minZoom: 4,
        maxZoom: 19,
        textColor: "white"
    })
      , Je = new Jd({
        transparentPng: q
    });
    Je.getTilesUrl = function(a, b) {
        var c = a.x
          , e = a.y
          , f = Zb("satelliteStreet");
        return (Ee[Math.abs(c + e) % Ee.length] + "?qt=vtile&x=" + (c + "").replace(/-/gi, "M") + "&y=" + (e + "").replace(/-/gi, "M") + "&z=" + b + "&styles=sl" + (6 == x.ga.oa ? "&color_dep=32&colors=50" : "") + "&udt=" + f).replace(/-(\d+)/gi, "M$1")
    }
    ;
    var Wa = new Ce("\u6df7\u5408",[Ie, Je],{
        tips: "\u663e\u793a\u5e26\u6709\u8857\u9053\u7684\u536b\u661f\u5f71\u50cf",
        labelText: "\u8def\u7f51",
        minZoom: 4,
        maxZoom: 19,
        textColor: "white"
    });
    var Ke = 1
      , X = {};
    window.B1 = X;
    function Y(a, b) {
        x.lang.Ja.call(this);
        this.od = {};
        this.qn(a);
        b = b || {};
        b.na = b.renderOptions || {};
        this.m = {
            na: {
                Aa: b.na.panel || s,
                map: b.na.map || s,
                zg: b.na.autoViewport || q,
                du: b.na.selectFirstResult,
                Qm: b.na.highlightMode,
                jc: b.na.enableDragging || t
            },
            St: b.onSearchComplete || ca(),
            rN: b.onMarkersSet || ca(),
            qN: b.onInfoHtmlSet || ca(),
            tN: b.onResultsHtmlSet || ca(),
            pN: b.onGetBusListComplete || ca(),
            oN: b.onGetBusLineComplete || ca(),
            mN: b.onBusListHtmlSet || ca(),
            lN: b.onBusLineHtmlSet || ca(),
            TE: b.onPolylinesSet || ca(),
            Yp: b.reqFrom || ""
        };
        this.m.na.zg = "undefined" != typeof b && "undefined" != typeof b.renderOptions && "undefined" != typeof b.renderOptions.autoViewport ? b.renderOptions.autoViewport : q;
        this.m.na.Aa = x.Ic(this.m.na.Aa)
    }
    x.xa(Y, x.lang.Ja);
    x.extend(Y.prototype, {
        getResults: function() {
            return this.Kc ? this.Xi : this.ka
        },
        enableAutoViewport: function() {
            this.m.na.zg = q
        },
        disableAutoViewport: function() {
            this.m.na.zg = t
        },
        qn: function(a) {
            a && (this.od.src = a)
        },
        ku: function(a) {
            this.m.St = a || ca()
        },
        setMarkersSetCallback: function(a) {
            this.m.rN = a || ca()
        },
        setPolylinesSetCallback: function(a) {
            this.m.TE = a || ca()
        },
        setInfoHtmlSetCallback: function(a) {
            this.m.qN = a || ca()
        },
        setResultsHtmlSetCallback: function(a) {
            this.m.tN = a || ca()
        },
        Mm: u("Re")
    });
    var Le = {
        HG: A.vd,
        lb: function(a, b, c, e, f) {
            this.p_(b);
            var g = (1E5 * Math.random()).toFixed(0);
            A._rd["_cbk" + g] = function(b) {
                b.result && b.result.error && 202 === b.result.error ? alert("\u8be5AK\u56e0\u4e3a\u6076\u610f\u884c\u4e3a\u5df2\u7ecf\u88ab\u7ba1\u7406\u5458\u5c01\u7981\uff01") : (c = c || {},
                a && a(b, c),
                delete A._rd["_cbk" + g])
            }
            ;
            e = e || "";
            b = c && c.e1 ? Nb(b, encodeURI) : Nb(b, encodeURIComponent);
            this.HG = c && c.dL ? c.TN ? c.TN : A.Op : A.vd;
            e = this.HG + e + "?" + b + "&ie=utf-8&oue=1&fromproduct=jsapi";
            f || (e += "&res=api");
            e += "&ak=" + ra;
            sa(e + ("&callback=BMap._rd._cbk" + g))
        },
        p_: function(a) {
            if (a.qt) {
                var b = "";
                switch (a.qt) {
                case "bt":
                    b = "z_qt|bt";
                    break;
                case "nav":
                    b = "z_qt|nav";
                    break;
                case "walk":
                    b = "z_qt|walk";
                    break;
                case "bse":
                    b = "z_qt|bse";
                    break;
                case "nse":
                    b = "z_qt|nse";
                    break;
                case "drag":
                    b = "z_qt|drag"
                }
                "" !== b && A.alog("cus.fire", "count", b)
            }
        }
    };
    window.P1 = Le;
    A._rd = {};
    var hb = {};
    window.O1 = hb;
    hb.eF = function(a) {
        a = a.replace(/<\/?[^>]*>/g, "");
        return a = a.replace(/[ | ]* /g, " ")
    }
    ;
    hb.WZ = function(a) {
        return a.replace(/([1-9]\d*\.\d*|0\.\d*[1-9]\d*|0?\.0+|0|[1-9]\d*),([1-9]\d*\.\d*|0\.\d*[1-9]\d*|0?\.0+|0|[1-9]\d*)(,)/g, "$1,$2;")
    }
    ;
    hb.XZ = function(a, b) {
        return a.replace(RegExp("(((-?\\d+)(\\.\\d+)?),((-?\\d+)(\\.\\d+)?);)(((-?\\d+)(\\.\\d+)?),((-?\\d+)(\\.\\d+)?);){" + b + "}", "ig"), "$1")
    }
    ;
    var Pe = 2
      , Qe = 6
      , Re = 8
      , Se = 2
      , Te = 3
      , Ue = 6
      , Ve = 0
      , We = "bt"
      , Xe = "nav"
      , Ye = "walk"
      , Ze = "bl"
      , $e = "bsl"
      , af = "ride"
      , bf = 15
      , cf = 18;
    A.I = window.Instance = x.lang.Tc;
    function df(a, b, c) {
        x.lang.Ja.call(this);
        if (a) {
            this.cb = "object" == typeof a ? a : x.Ic(a);
            this.page = 1;
            this.Od = 100;
            this.bK = "pg";
            this.eg = 4;
            this.mK = b;
            this.update = q;
            a = {
                page: 1,
                M6: 100,
                Od: 100,
                eg: 4,
                bK: "pg",
                update: q
            };
            c || (c = a);
            for (var e in c)
                "undefined" != typeof c[e] && (this[e] = c[e]);
            this.Ba()
        }
    }
    x.extend(df.prototype, {
        Ba: function() {
            this.za()
        },
        za: function() {
            this.IV();
            this.cb.innerHTML = this.hW()
        },
        IV: function() {
            isNaN(parseInt(this.page)) && (this.page = 1);
            isNaN(parseInt(this.Od)) && (this.Od = 1);
            1 > this.page && (this.page = 1);
            1 > this.Od && (this.Od = 1);
            this.page > this.Od && (this.page = this.Od);
            this.page = parseInt(this.page);
            this.Od = parseInt(this.Od)
        },
        s4: function() {
            location.search.match(RegExp("[?&]?" + this.bK + "=([^&]*)[&$]?", "gi"));
            this.page = RegExp.$1
        },
        hW: function() {
            var a = []
              , b = this.page - 1
              , c = this.page + 1;
            a.push('<p style="margin:0;padding:0;white-space:nowrap">');
            if (!(1 > b)) {
                if (this.page >= this.eg) {
                    var e;
                    a.push('<span style="margin-right:3px"><a style="color:#7777cc" href="javascript:void(0)" onclick="{temp1}">\u9996\u9875</a></span>'.replace("{temp1}", "BMap.I('" + this.da + "').toPage(1);"))
                }
                a.push('<span style="margin-right:3px"><a style="color:#7777cc" href="javascript:void(0)" onclick="{temp2}">\u4e0a\u4e00\u9875</a></span>'.replace("{temp2}", "BMap.I('" + this.da + "').toPage(" + b + ");"))
            }
            if (this.page < this.eg)
                e = 0 == this.page % this.eg ? this.page - this.eg - 1 : this.page - this.page % this.eg + 1,
                b = e + this.eg - 1;
            else {
                e = Math.floor(this.eg / 2);
                var f = this.eg % 2 - 1
                  , b = this.Od > this.page + e ? this.page + e : this.Od;
                e = this.page - e - f
            }
            this.page > this.Od - this.eg && this.page >= this.eg && (e = this.Od - this.eg + 1,
            b = this.Od);
            for (f = e; f <= b; f++)
                0 < f && (f == this.page ? a.push('<span style="margin-right:3px">' + f + "</span>") : 1 <= f && f <= this.Od && (e = '<span><a style="color:#7777cc;margin-right:3px" href="javascript:void(0)" onclick="{temp3}">[' + f + "]</a></span>",
                a.push(e.replace("{temp3}", "BMap.I('" + this.da + "').toPage(" + f + ");"))));
            c > this.Od || a.push('<span><a style="color:#7777cc" href="javascript:void(0)" onclick="{temp4}">\u4e0b\u4e00\u9875</a></span>'.replace("{temp4}", "BMap.I('" + this.da + "').toPage(" + c + ");"));
            a.push("</p>");
            return a.join("")
        },
        toPage: function(a) {
            a = a ? a : 1;
            "function" == typeof this.mK && (this.mK(a),
            this.page = a);
            this.update && this.Ba()
        }
    });
    function jb(a, b) {
        Y.call(this, a, b);
        b = b || {};
        b.renderOptions = b.renderOptions || {};
        this.tn(b.pageCapacity);
        "undefined" != typeof b.renderOptions.selectFirstResult && !b.renderOptions.selectFirstResult ? this.OC() : this.hD();
        this.ua = [];
        this.Ef = [];
        this.La = -1;
        this.Qa = [];
        var c = this;
        Xa.load("local", function() {
            c.Hz()
        }, q)
    }
    x.xa(jb, Y, "LocalSearch");
    jb.zq = 10;
    jb.K1 = 1;
    jb.Ln = 100;
    jb.vG = 2E3;
    jb.EG = 1E5;
    x.extend(jb.prototype, {
        search: function(a, b) {
            this.Qa.push({
                method: "search",
                arguments: [a, b]
            })
        },
        mn: function(a, b, c) {
            this.Qa.push({
                method: "searchInBounds",
                arguments: [a, b, c]
            })
        },
        dq: function(a, b, c, e) {
            this.Qa.push({
                method: "searchNearby",
                arguments: [a, b, c, e]
            })
        },
        we: function() {
            delete this.Ka;
            delete this.Re;
            delete this.ka;
            delete this.ra;
            this.La = -1;
            this.Wa();
            this.m.na.Aa && (this.m.na.Aa.innerHTML = "")
        },
        Pm: ca(),
        hD: function() {
            this.m.na.du = q
        },
        OC: function() {
            this.m.na.du = t
        },
        tn: function(a) {
            this.m.Xk = "number" == typeof a && !isNaN(a) ? 1 > a ? jb.zq : a > jb.Ln ? jb.zq : a : jb.zq
        },
        uf: function() {
            return this.m.Xk
        },
        toString: fa("LocalSearch")
    });
    var ef = jb.prototype;
    U(ef, {
        clearResults: ef.we,
        setPageCapacity: ef.tn,
        getPageCapacity: ef.uf,
        gotoPage: ef.Pm,
        searchNearby: ef.dq,
        searchInBounds: ef.mn,
        search: ef.search,
        enableFirstResultSelection: ef.hD,
        disableFirstResultSelection: ef.OC
    });
    function ff(a, b) {
        Y.call(this, a, b)
    }
    x.xa(ff, Y, "BaseRoute");
    x.extend(ff.prototype, {
        we: ca()
    });
    function gf(a, b) {
        Y.call(this, a, b);
        b = b || {};
        this.vn(b.policy);
        this.uF(b.intercityPolicy);
        this.zF(b.transitTypePolicy);
        this.tn(b.pageCapacity);
        this.Eb = We;
        this.Mn = Ke;
        this.ua = [];
        this.La = -1;
        this.m.Al = b.enableTraffic || t;
        this.Qa = [];
        var c = this;
        Xa.load("route", function() {
            c.Ed()
        })
    }
    gf.Ln = 100;
    gf.CP = [0, 1, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 1, 1, 1];
    gf.DP = [0, 3, 4, 0, 0, 0, 5];
    x.xa(gf, ff, "TransitRoute");
    x.extend(gf.prototype, {
        vn: function(a) {
            this.m.Pd = 0 <= a && 5 >= a ? a : 0
        },
        uF: function(a) {
            this.m.Um = 0 <= a && 2 >= a ? a : 0
        },
        zF: function(a) {
            this.m.An = 0 <= a && 2 >= a ? a : 0
        },
        GA: function(a, b) {
            this.Qa.push({
                method: "_internalSearch",
                arguments: [a, b]
            })
        },
        search: function(a, b) {
            this.Qa.push({
                method: "search",
                arguments: [a, b]
            })
        },
        tn: function(a) {
            if ("string" === typeof a && (a = parseInt(a, 10),
            isNaN(a))) {
                this.m.Xk = gf.Ln;
                return
            }
            this.m.Xk = "number" !== typeof a ? gf.Ln : 1 <= a && a <= gf.Ln ? Math.round(a) : gf.Ln
        },
        toString: fa("TransitRoute"),
        E2: function(a) {
            return a.replace(/\(.*\)/, "")
        }
    });
    var hf = gf.prototype;
    U(hf, {
        _internalSearch: hf.GA
    });
    function jf(a, b) {
        Y.call(this, a, b);
        this.ua = [];
        this.La = -1;
        this.Qa = [];
        var c = this
          , e = this.m.na;
        1 !== e.Qm && 2 !== e.Qm && (e.Qm = 1);
        this.bo = this.m.na.jc ? q : t;
        Xa.load("route", function() {
            c.Ed()
        });
        this.Tx && this.Tx()
    }
    jf.SP = " \u73af\u5c9b \u65e0\u5c5e\u6027\u9053\u8def \u4e3b\u8def \u9ad8\u901f\u8fde\u63a5\u8def \u4ea4\u53c9\u70b9\u5185\u8def\u6bb5 \u8fde\u63a5\u9053\u8def \u505c\u8f66\u573a\u5185\u90e8\u9053\u8def \u670d\u52a1\u533a\u5185\u90e8\u9053\u8def \u6865 \u6b65\u884c\u8857 \u8f85\u8def \u531d\u9053 \u5168\u5c01\u95ed\u9053\u8def \u672a\u5b9a\u4e49\u4ea4\u901a\u533a\u57df POI\u8fde\u63a5\u8def \u96a7\u9053 \u6b65\u884c\u9053 \u516c\u4ea4\u4e13\u7528\u9053 \u63d0\u524d\u53f3\u8f6c\u9053".split(" ");
    x.xa(jf, ff, "DWRoute");
    x.extend(jf.prototype, {
        search: function(a, b, c) {
            this.Qa.push({
                method: "search",
                arguments: [a, b, c]
            })
        }
    });
    function kf(a, b) {
        jf.call(this, a, b);
        b = b || {};
        this.m.Al = b.enableTraffic || t;
        this.vn(b.policy);
        this.Eb = Xe;
        this.Mn = Te
    }
    x.xa(kf, jf, "DrivingRoute");
    kf.prototype.vn = function(a) {
        this.m.Pd = 0 <= a && 5 >= a ? a : 0
    }
    ;
    function lf(a, b) {
        jf.call(this, a, b);
        this.Eb = Ye;
        this.Mn = Se;
        this.bo = t
    }
    x.xa(lf, jf, "WalkingRoute");
    function mf(a, b) {
        jf.call(this, a, b);
        b = b || {};
        this.m.Al = b.enableTraffic || t;
        this.XS = b.renderOptions.lineType || 0;
        this.Eb = Xe;
        this.Mn = Te
    }
    x.xa(mf, jf, "TruckRoute");
    mf.prototype.vn = function(a) {
        this.m.Pd = 0 <= a && 5 >= a ? a : 0
    }
    ;
    function nf(a, b) {
        jf.call(this, a, b);
        this.Eb = af;
        this.Mn = Ue;
        this.bo = t
    }
    x.xa(nf, jf, "RidingRoute");
    function of(a, b) {
        x.lang.Ja.call(this);
        this.ag = [];
        this.Zk = [];
        this.m = b;
        this.Hj = a;
        this.map = this.m.na.map || s;
        this.aO = this.m.aO;
        this.Fb = s;
        this.Dk = 0;
        this.LF = "";
        this.rf = 1;
        this.oD = "";
        this.Zp = [0, 0, 0, 0, 0, 0, 0];
        this.PM = [];
        this.zs = [1, 1, 1, 1, 1, 1, 1];
        this.NO = [1, 1, 1, 1, 1, 1, 1];
        this.$p = [0, 0, 0, 0, 0, 0, 0];
        this.kn = [0, 0, 0, 0, 0, 0, 0];
        this.Kb = [{
            B: "",
            Jd: 0,
            Bn: 0,
            x: 0,
            y: 0,
            sa: -1
        }, {
            B: "",
            Jd: 0,
            Bn: 0,
            x: 0,
            y: 0,
            sa: -1
        }, {
            B: "",
            Jd: 0,
            Bn: 0,
            x: 0,
            y: 0,
            sa: -1
        }, {
            B: "",
            Jd: 0,
            Bn: 0,
            x: 0,
            y: 0,
            sa: -1
        }, {
            B: "",
            Jd: 0,
            Bn: 0,
            x: 0,
            y: 0,
            sa: -1
        }, {
            B: "",
            Jd: 0,
            Bn: 0,
            x: 0,
            y: 0,
            sa: -1
        }, {
            B: "",
            Jd: 0,
            Bn: 0,
            x: 0,
            y: 0,
            sa: -1
        }];
        this.oi = -1;
        this.Cu = [];
        this.WF = [];
        Xa.load("route", ca())
    }
    x.lang.xa(of, x.lang.Ja, "RouteAddr");
    var pf = navigator.userAgent;
    /ipad|iphone|ipod|iph/i.test(pf);
    var qf = /android/i.test(pf);
    function rf(a) {
        this.$e = a || {}
    }
    x.extend(rf.prototype, {
        $N: function(a, b, c) {
            var e = this;
            Xa.load("route", function() {
                e.Ed(a, b, c)
            })
        }
    });
    function sf(a) {
        this.m = {};
        x.extend(this.m, a);
        this.Qa = [];
        var b = this;
        Xa.load("othersearch", function() {
            b.Ed()
        })
    }
    x.xa(sf, x.lang.Ja, "Geocoder");
    x.extend(sf.prototype, {
        Lm: function(a, b, c) {
            this.Qa.push({
                method: "getPoint",
                arguments: [a, b, c]
            })
        },
        Im: function(a, b, c) {
            this.Qa.push({
                method: "getLocation",
                arguments: [a, b, c]
            })
        },
        toString: fa("Geocoder")
    });
    var tf = sf.prototype;
    U(tf, {
        getPoint: tf.Lm,
        getLocation: tf.Im
    });
    function Geolocation(a) {
        a = a || {};
        this.M = {
            timeout: a.timeout || 1E4,
            maximumAge: a.maximumAge || 6E5,
            enableHighAccuracy: a.enableHighAccuracy || t,
            Ri: a.SDKLocation || t
        };
        this.ue = [];
        var b = this;
        Xa.load("othersearch", function() {
            for (var a = 0, e; e = b.ue[a]; a++)
                b[e.method].apply(b, e.arguments)
        })
    }
    x.extend(Geolocation.prototype, {
        getCurrentPosition: function(a, b) {
            this.ue.push({
                method: "getCurrentPosition",
                arguments: arguments
            })
        },
        getStatus: function() {
            return Pe
        },
        enableSDKLocation: function() {
            K() && (this.M.Ri = q)
        },
        disableSDKLocation: function() {
            this.M.Ri = t
        }
    });
    function uf(a) {
        a = a || {};
        a.na = a.renderOptions || {};
        this.m = {
            na: {
                map: a.na.map || s
            }
        };
        this.Qa = [];
        var b = this;
        Xa.load("othersearch", function() {
            b.Ed()
        })
    }
    x.xa(uf, x.lang.Ja, "LocalCity");
    x.extend(uf.prototype, {
        get: function(a) {
            this.Qa.push({
                method: "get",
                arguments: [a]
            })
        },
        toString: fa("LocalCity")
    });
    function vf() {
        this.Qa = [];
        var a = this;
        Xa.load("othersearch", function() {
            a.Ed()
        })
    }
    x.xa(vf, x.lang.Ja, "Boundary");
    x.extend(vf.prototype, {
        get: function(a, b) {
            this.Qa.push({
                method: "get",
                arguments: [a, b]
            })
        },
        toString: fa("Boundary")
    });
    function wf(a, b) {
        Y.call(this, a, b);
        this.PP = Ze;
        this.RP = bf;
        this.OP = $e;
        this.QP = cf;
        this.Qa = [];
        var c = this;
        Xa.load("buslinesearch", function() {
            c.Ed()
        })
    }
    wf.Hv = J.ta + "iw_plus.gif";
    wf.LS = J.ta + "iw_minus.gif";
    wf.DU = J.ta + "stop_icon.png";
    x.xa(wf, Y);
    x.extend(wf.prototype, {
        getBusList: function(a) {
            this.Qa.push({
                method: "getBusList",
                arguments: [a]
            })
        },
        getBusLine: function(a) {
            this.Qa.push({
                method: "getBusLine",
                arguments: [a]
            })
        },
        setGetBusListCompleteCallback: function(a) {
            this.m.pN = a || ca()
        },
        setGetBusLineCompleteCallback: function(a) {
            this.m.oN = a || ca()
        },
        setBusListHtmlSetCallback: function(a) {
            this.m.mN = a || ca()
        },
        setBusLineHtmlSetCallback: function(a) {
            this.m.lN = a || ca()
        },
        setPolylinesSetCallback: function(a) {
            this.m.TE = a || ca()
        }
    });
    function xf(a) {
        Y.call(this, a);
        a = a || {};
        this.fb = {
            input: a.input || s,
            fC: a.baseDom || s,
            types: a.types || [],
            St: a.onSearchComplete || ca()
        };
        this.od.src = a.location || "\u5168\u56fd";
        this.nj = "";
        this.wg = s;
        this.cI = "";
        this.ej();
        Va(Na);
        var b = this;
        Xa.load("autocomplete", function() {
            b.Ed()
        })
    }
    x.xa(xf, Y, "Autocomplete");
    x.extend(xf.prototype, {
        ej: ca(),
        show: ca(),
        aa: ca(),
        AF: function(a) {
            this.fb.types = a
        },
        qn: function(a) {
            this.od.src = a
        },
        search: da("nj"),
        Iy: da("cI"),
        ku: function(a) {
            this.fb.St = a
        }
    });
    var Ya;
    function Ta(a, b) {
        function c() {
            f.m.visible ? ("inter" === f.Oe && $a() && f.m.haveBreakId && f.m.indoorExitControl === q ? x.U.show(f.qr) : x.U.aa(f.qr),
            this.ud && this.m.closeControl && this.If && this.P && this.P.Ta() === this.R ? x.U.show(f.If) : x.U.aa(f.If),
            this.m.forceCloseControl && x.U.show(f.If)) : (x.U.aa(f.If),
            x.U.aa(f.qr))
        }
        this.R = "string" == typeof a ? x.fa(a) : a;
        this.da = yf++;
        this.m = {
            enableScrollWheelZoom: q,
            panoramaRenderer: Sa() ? "javascript" : "flash",
            swfSrc: A.xh("main_domain_nocdn", "res/swf/") + "APILoader.swf",
            visible: q,
            indoorExitControl: q,
            indoorFloorControl: t,
            linksControl: q,
            clickOnRoad: q,
            navigationControl: q,
            closeControl: q,
            indoorSceneSwitchControl: q,
            albumsControl: t,
            albumsControlOptions: {},
            copyrightControlOptions: {},
            forceCloseControl: t,
            haveBreakId: t
        };
        var b = b || {}, e;
        for (e in b)
            this.m[e] = b[e];
        b.closeControl === q && (this.m.forceCloseControl = q);
        b.useWebGL === t && Sa(t);
        this.Oa = {
            heading: 0,
            pitch: 0
        };
        this.lo = [];
        this.Ob = this.hb = s;
        this.sk = this.nr();
        this.ua = [];
        this.Rc = 1;
        this.Oe = this.iT = this.$g = "";
        this.Ne = {};
        this.Uf = s;
        this.kh = [];
        this.Gr = [];
        "cvsRender" == this.sk || Sa() ? (this.lk = 90,
        this.nk = -90) : "cssRender" == this.sk && (this.lk = 45,
        this.nk = -45);
        this.Kr = t;
        var f = this
          , g = (1E5 * Math.random()).toFixed(0);
        A._rd = A._rd || {};
        A._rd["_cbk" + g] = function(a) {
            if (!a || a.error === l || a.error !== 0)
                Oc("PANORAMA");
            else {
                this.sk === "flashRender" ? Xa.load("panoramaflash", function() {
                    f.ej()
                }, q) : Xa.load("panorama", function() {
                    f.ob()
                }, q);
                b.Xe == "api" ? Va(Ja) : Va(Ka)
            }
            delete A._rd["_cbk" + g]
        }
        ;
        this.mo = function() {
            Nc("PANORAMA", "BMap._rd._cbk" + g);
            this.mo = ca()
        }
        ;
        this.m.VS !== q && (this.mo(),
        A.Jq("cus.fire", "count", "z_loadpanoramacount"));
        this.PT(this.R);
        this.addEventListener("id_changed", function() {
            Va(Ia, {
                from: b.Xe
            })
        });
        this.dQ();
        this.addEventListener("indoorexit_options_changed", c);
        this.addEventListener("scene_type_changed", c);
        this.addEventListener("onclose_options_changed", c);
        this.addEventListener("onvisible_changed", c)
    }
    var zf = 4
      , Af = 1
      , Bf = 5
      , yf = 0;
    x.lang.xa(Ta, x.lang.Ja, "Panorama");
    x.extend(Ta.prototype, {
        dQ: function() {
            var a = this
              , b = this.If = F("div");
            b.className = "pano_close";
            b.style.cssText = "z-index: 1201;display: none";
            b.title = "\u9000\u51fa\u5168\u666f";
            b.onclick = function() {
                a.aa()
            }
            ;
            this.R.appendChild(b);
            var c = this.qr = F("a");
            c.className = "pano_pc_indoor_exit";
            c.style.cssText = "z-index: 1201;display: none";
            c.innerHTML = '<span style="float:right;margin-right:12px;">\u51fa\u53e3</span>';
            c.title = "\u9000\u51fa\u5ba4\u5185\u666f";
            c.onclick = function() {
                a.mp()
            }
            ;
            this.R.appendChild(c);
            window.ActiveXObject && !document.addEventListener && (b.style.backgroundColor = "rgb(37,37,37)",
            c.style.backgroundColor = "rgb(37,37,37)")
        },
        mp: ca(),
        PT: function(a) {
            var b, c;
            b = a.style;
            c = ab(a).position;
            "absolute" != c && "relative" != c && (b.position = "relative",
            b.zIndex = 0);
            if ("absolute" === c || "relative" === c)
                if (a = ab(a).zIndex,
                !a || "auto" === a)
                    b.zIndex = 0
        },
        UX: u("lo"),
        ac: u("hb"),
        uY: u("rw"),
        qO: u("rw"),
        ma: u("Ob"),
        Na: u("Oa"),
        la: u("Rc"),
        Fg: u("$g"),
        u4: function() {
            return this.A2 || []
        },
        n4: u("iT"),
        jt: u("Oe"),
        My: function(a) {
            a !== this.Oe && (this.Oe = a,
            this.dispatchEvent(new O("onscene_type_changed")))
        },
        pO: function(a) {
            a !== Bf && (Bf = a)
        },
        kO: function(a) {
            a !== zf && (zf = a)
        },
        Gc: function(a, b, c) {
            "object" === typeof b && (c = b,
            b = l);
            a != this.hb && (this.Jl = this.hb,
            this.Kl = this.Ob,
            this.hb = a,
            this.Oe = b || "street",
            this.Ob = s,
            c && c.pov && this.zd(c.pov))
        },
        va: function(a) {
            a.Vb(this.Ob) || (this.Jl = this.hb,
            this.Kl = this.Ob,
            this.Ob = a,
            this.hb = s)
        },
        zd: function(a) {
            if (a) {
                var a = this.Oa.pitch
                  , b = this.Oa.heading
                  , b = this.HC(b);
                a > this.lk ? a = this.lk : a < this.nk && (a = this.nk);
                this.Kr = q;
                this.Oa.pitch = a;
                this.Oa.heading = b
            }
        },
        c0: function(a, b) {
            this.nk = 0 <= a ? 0 : a;
            this.lk = 0 >= b ? 0 : b
        },
        HC: function(a) {
            return a - 360 * Math.floor(a / 360)
        },
        Xc: function(a) {
            a != this.Rc && (a > zf && (a = zf),
            a < Af && (a = Af),
            a != this.Rc && (this.Rc = a),
            "cssRender" === this.sk && this.zd(this.Oa))
        },
        zB: function() {
            if (this.P)
                for (var a = this.P.Cx(), b = 0; b < a.length; b++)
                    (a[b]instanceof W || a[b]instanceof rd) && a[b].point && this.ua.push(a[b])
        },
        vF: da("P"),
        ju: function(a) {
            this.Uf = a || "none"
        },
        Mj: function(a) {
            for (var b in a) {
                if ("object" == typeof a[b])
                    for (var c in a[b])
                        this.m[b][c] = a[b][c];
                else
                    this.m[b] = a[b];
                a.closeControl === q && (this.m.forceCloseControl = q);
                a.closeControl === t && (this.m.forceCloseControl = t);
                switch (b) {
                case "linksControl":
                    this.dispatchEvent(new O("onlinks_visible_changed"));
                    break;
                case "clickOnRoad":
                    this.dispatchEvent(new O("onclickonroad_changed"));
                    break;
                case "navigationControl":
                    this.dispatchEvent(new O("onnavigation_visible_changed"));
                    break;
                case "indoorSceneSwitchControl":
                    this.dispatchEvent(new O("onindoor_default_switch_mode_changed"));
                    break;
                case "albumsControl":
                    this.dispatchEvent(new O("onalbums_visible_changed"));
                    break;
                case "albumsControlOptions":
                    this.dispatchEvent(new O("onalbums_options_changed"));
                    break;
                case "copyrightControlOptions":
                    this.dispatchEvent(new O("oncopyright_options_changed"));
                    break;
                case "closeControl":
                    this.dispatchEvent(new O("onclose_options_changed"));
                    break;
                case "indoorExitControl":
                    this.dispatchEvent(new O("onindoorexit_options_changed"));
                    break;
                case "indoorFloorControl":
                    this.dispatchEvent(new O("onindoorfloor_options_changed"))
                }
            }
        },
        Tk: function() {
            this.Sl.style.visibility = "hidden"
        },
        Qy: function() {
            this.Sl.style.visibility = "visible"
        },
        $W: function() {
            this.m.enableScrollWheelZoom = q
        },
        AW: function() {
            this.m.enableScrollWheelZoom = t
        },
        show: function() {
            this.m.visible = q
        },
        aa: function() {
            this.m.visible = t
        },
        nr: function() {
            return $a() && !K() && "javascript" != this.m.panoramaRenderer ? "flashRender" : !K() && Wb() ? "cvsRender" : "cssRender"
        },
        Ra: function(a) {
            this.Ne[a.qd] = a
        },
        Lb: function(a) {
            delete this.Ne[a]
        },
        Hx: function() {
            return this.m.visible
        },
        vh: function() {
            return new M(this.R.clientWidth,this.R.clientHeight)
        },
        Ta: u("R"),
        sL: function() {
            var a = A.xh("baidumap", "?")
              , b = this.ac();
            if (b) {
                var b = {
                    panotype: this.jt(),
                    heading: this.Na().heading,
                    pitch: this.Na().pitch,
                    pid: b,
                    panoid: b,
                    from: "api"
                }, c;
                for (c in b)
                    a += c + "=" + b[c] + "&"
            }
            return a.slice(0, -1)
        },
        Mx: function() {
            this.Mj({
                copyrightControlOptions: {
                    logoVisible: t
                }
            })
        },
        EF: function() {
            this.Mj({
                copyrightControlOptions: {
                    logoVisible: q
                }
            })
        },
        XB: function(a) {
            function b(a, b) {
                return function() {
                    a.Gr.push({
                        aN: b,
                        $M: arguments
                    })
                }
            }
            for (var c = a.getPanoMethodList(), e = "", f = 0, g = c.length; f < g; f++)
                e = c[f],
                this[e] = b(this, e);
            this.kh.push(a)
        },
        fF: function(a) {
            for (var b = this.kh.length; b--; )
                this.kh[b] === a && this.kh.splice(b, 1)
        },
        tF: ca()
    });
    var Cf = Ta.prototype;
    U(Cf, {
        setId: Cf.Gc,
        setPosition: Cf.va,
        setPov: Cf.zd,
        setZoom: Cf.Xc,
        setOptions: Cf.Mj,
        getId: Cf.ac,
        getPosition: Cf.ma,
        getPov: Cf.Na,
        getZoom: Cf.la,
        getLinks: Cf.UX,
        getBaiduMapUrl: Cf.sL,
        hideMapLogo: Cf.Mx,
        showMapLogo: Cf.EF,
        enableDoubleClickZoom: Cf.C3,
        disableDoubleClickZoom: Cf.t3,
        enableScrollWheelZoom: Cf.$W,
        disableScrollWheelZoom: Cf.AW,
        show: Cf.show,
        hide: Cf.aa,
        addPlugin: Cf.XB,
        removePlugin: Cf.fF,
        getVisible: Cf.Hx,
        addOverlay: Cf.Ra,
        removeOverlay: Cf.Lb,
        getSceneType: Cf.jt,
        setPanoramaPOIType: Cf.ju,
        exitInter: Cf.mp,
        setInteractiveState: Cf.tF
    });
    U(window, {
        BMAP_PANORAMA_POI_HOTEL: "hotel",
        BMAP_PANORAMA_POI_CATERING: "catering",
        BMAP_PANORAMA_POI_MOVIE: "movie",
        BMAP_PANORAMA_POI_TRANSIT: "transit",
        BMAP_PANORAMA_POI_INDOOR_SCENE: "indoor_scene",
        BMAP_PANORAMA_POI_NONE: "none",
        BMAP_PANORAMA_INDOOR_SCENE: "inter",
        BMAP_PANORAMA_STREET_SCENE: "street"
    });
    function Df() {
        x.lang.Ja.call(this);
        this.qd = "PanoramaOverlay_" + this.da;
        this.W = s;
        this.Xa = q
    }
    x.lang.xa(Df, x.lang.Ja, "PanoramaOverlayBase");
    x.extend(Df.prototype, {
        q4: u("qd"),
        za: function() {
            aa("initialize\u65b9\u6cd5\u672a\u5b9e\u73b0")
        },
        remove: function() {
            aa("remove\u65b9\u6cd5\u672a\u5b9e\u73b0")
        },
        Tf: function() {
            aa("_setOverlayProperty\u65b9\u6cd5\u672a\u5b9e\u73b0")
        }
    });
    function Ef(a, b) {
        Df.call(this);
        var c = {
            position: s,
            altitude: 2,
            displayDistance: q
        }, b = b || {}, e;
        for (e in b)
            c[e] = b[e];
        this.Ob = c.position;
        this.Yj = a;
        this.Kq = c.altitude;
        this.qR = c.displayDistance;
        this.OF = c.color;
        this.gM = c.hoverColor;
        this.backgroundColor = c.backgroundColor;
        this.eK = c.backgroundHoverColor;
        this.borderColor = c.borderColor;
        this.iK = c.borderHoverColor;
        this.fontSize = c.fontSize;
        this.padding = c.padding;
        this.jE = c.imageUrl;
        this.size = c.size;
        this.De = c.image;
        this.width = c.width;
        this.height = c.height;
        this.MY = c.imageData;
        this.borderWidth = c.borderWidth
    }
    x.lang.xa(Ef, Df, "PanoramaLabel");
    x.extend(Ef.prototype, {
        T3: u("borderWidth"),
        getImageData: u("MY"),
        Om: u("OF"),
        i4: u("gM"),
        P3: u("backgroundColor"),
        Q3: u("eK"),
        R3: u("borderColor"),
        S3: u("iK"),
        g4: u("fontSize"),
        r4: u("padding"),
        j4: u("jE"),
        wb: u("size"),
        wx: u("De"),
        va: function(a) {
            this.Ob = a;
            this.Tf("position", a)
        },
        ma: u("Ob"),
        Pc: function(a) {
            this.Yj = a;
            this.Tf("content", a)
        },
        Kk: u("Yj"),
        nF: function(a) {
            this.Kq = a;
            this.Tf("altitude", a)
        },
        pp: u("Kq"),
        Na: function() {
            var a = this.ma()
              , b = s
              , c = s;
            this.W && (c = this.W.ma());
            if (a && c)
                if (a.Vb(c))
                    b = this.W.Na();
                else {
                    b = {};
                    b.heading = Ff(a.lng - c.lng, a.lat - c.lat) || 0;
                    var a = b
                      , c = this.pp()
                      , e = this.fo();
                    a.pitch = Math.round(180 * (Math.atan(c / e) / Math.PI)) || 0
                }
            return b
        },
        fo: function() {
            var a = 0, b, c;
            this.W && (b = this.W.ma(),
            (c = this.ma()) && !c.Vb(b) && (a = R.Lk(b, c)));
            return a
        },
        aa: function() {
            aa("hide\u65b9\u6cd5\u672a\u5b9e\u73b0")
        },
        show: function() {
            aa("show\u65b9\u6cd5\u672a\u5b9e\u73b0")
        },
        Tf: ca()
    });
    var Gf = Ef.prototype;
    U(Gf, {
        setPosition: Gf.va,
        getPosition: Gf.ma,
        setContent: Gf.Pc,
        getContent: Gf.Kk,
        setAltitude: Gf.nF,
        getAltitude: Gf.pp,
        getPov: Gf.Na,
        show: Gf.show,
        hide: Gf.aa
    });
    function Hf(a, b) {
        Df.call(this);
        var c = {
            icon: "",
            title: "",
            panoInfo: s,
            altitude: 2
        }, b = b || {}, e;
        for (e in b)
            c[e] = b[e];
        this.Ob = a;
        this.$H = c.icon;
        this.yJ = c.title;
        this.Kq = c.altitude;
        this.AT = c.panoInfo;
        this.Oa = {
            heading: 0,
            pitch: 0
        }
    }
    x.lang.xa(Hf, Df, "PanoramaMarker");
    x.extend(Hf.prototype, {
        va: function(a) {
            this.Ob = a;
            this.Tf("position", a)
        },
        ma: u("Ob"),
        Hc: function(a) {
            this.yJ = a;
            this.Tf("title", a)
        },
        zp: u("yJ"),
        Xb: function(a) {
            this.$H = icon;
            this.Tf("icon", a)
        },
        sp: u("$H"),
        nF: function(a) {
            this.Kq = a;
            this.Tf("altitude", a)
        },
        pp: u("Kq"),
        UD: u("AT"),
        Na: function() {
            var a = s;
            if (this.W) {
                var a = this.W.ma()
                  , b = this.ma()
                  , a = Ff(b.lng - a.lng, b.lat - a.lat);
                isNaN(a) && (a = 0);
                a = {
                    heading: a,
                    pitch: 0
                }
            } else
                a = this.Oa;
            return a
        },
        Tf: ca()
    });
    var If = Hf.prototype;
    U(If, {
        setPosition: If.va,
        getPosition: If.ma,
        setTitle: If.Hc,
        getTitle: If.zp,
        setAltitude: If.nF,
        getAltitude: If.pp,
        getPanoInfo: If.UD,
        getIcon: If.sp,
        setIcon: If.Xb,
        getPov: If.Na
    });
    function Ff(a, b) {
        var c = 0;
        if (0 !== a && 0 !== b) {
            var c = 180 * (Math.atan(a / b) / Math.PI)
              , e = 0;
            0 < a && 0 > b && (e = 90);
            0 > a && 0 > b && (e = 180);
            0 > a && 0 < b && (e = 270);
            c = (c + 90) % 90 + e
        } else
            0 === a ? c = 0 > b ? 180 : 0 : 0 === b && (c = 0 < a ? 90 : 270);
        return Math.round(c)
    }
    function Sa(a) {
        if ("boolean" === typeof Jf)
            return Jf;
        if (a === t || !window.WebGLRenderingContext)
            return Jf = t;
        if (x.platform.Ej) {
            a = 0;
            try {
                var b = s
                  , c = navigator.userAgent.toLowerCase();
                0 < c.indexOf("android") && (b = (c.match(/android [\d._]+/gi) + "").replace(/[^0-9|_.]/gi, "").replace(/_/gi, "."),
                b = parseInt(b.split(".")[0], 10));
                a = b
            } catch (e) {
                console.error("\u83b7\u53d6\u5b89\u5353\u7248\u672c\u5931\u8d25 => " + e)
            }
            if (5 > a)
                return Jf = t
        }
        c = document.createElement("canvas");
        a = s;
        try {
            a = c.getContext("webgl")
        } catch (f) {
            Jf = t
        }
        return Jf = a === s ? t : q
    }
    var Jf;
    function Kf() {
        if ("boolean" === typeof Lf)
            return Lf;
        Lf = q;
        if (x.platform.tE)
            return q;
        var a = navigator.userAgent;
        return -1 < a.indexOf("Chrome") || -1 < a.indexOf("SAMSUNG-GT-I9508") ? q : Lf = t
    }
    var Lf;
    function ad(a, b) {
        this.W = a || s;
        var c = this;
        c.W && c.ha();
        Xa.load("pservice", function() {
            c.JQ()
        });
        "api" == (b || {}).Xe ? Va(La) : Va(Ma);
        this.Dd = {
            getPanoramaById: [],
            getPanoramaByLocation: [],
            getVisiblePOIs: [],
            getRecommendPanosById: [],
            getPanoramaVersions: [],
            checkPanoSupportByCityCode: [],
            getPanoramaByPOIId: [],
            getCopyrightProviders: []
        }
    }
    A.Yk(function(a) {
        "flashRender" !== a.nr() && new ad(a,{
            Xe: "api"
        })
    });
    x.extend(ad.prototype, {
        ha: function() {
            function a(a) {
                if (a) {
                    if (a.id != b.rw) {
                        b.qO(a.id);
                        b.ia = a;
                        Kf() || b.dispatchEvent(new O("onthumbnail_complete"));
                        b.hb != s && (b.Kl = b._position);
                        for (var c in a)
                            if (a.hasOwnProperty(c))
                                switch (b["_" + c] = a[c],
                                c) {
                                case "position":
                                    b.Ob = a[c];
                                    break;
                                case "id":
                                    b.hb = a[c];
                                    break;
                                case "links":
                                    b.lo = a[c];
                                    break;
                                case "zoom":
                                    b.Rc = a[c]
                                }
                        if (b.Kl) {
                            var g = b.Kl
                              , i = b._position;
                            c = g.lat;
                            var k = i.lat
                              , m = S(k - c)
                              , g = S(i.lng - g.lng);
                            c = Math.sin(m / 2) * Math.sin(m / 2) + Math.cos(S(c)) * Math.cos(S(k)) * Math.sin(g / 2) * Math.sin(g / 2);
                            b.sH = 6371E3 * 2 * Math.atan2(Math.sqrt(c), Math.sqrt(1 - c))
                        }
                        c = new O("ondataload");
                        b.show();
                        c.data = a;
                        b.dispatchEvent(c);
                        b.dispatchEvent(new O("onposition_changed"));
                        b.dispatchEvent(new O("onlinks_changed"));
                        b.dispatchEvent(new O("oncopyright_changed"), {
                            copyright: a.copyright
                        });
                        a.qm ? (b.Mj({
                            haveBreakId: q
                        }),
                        $a() && b.m.closeControl && x.U.show(b.qr)) : x.U.aa(b.qr)
                    }
                } else
                    b.hb = b.Jl,
                    b.Ob = b.Kl,
                    b.dispatchEvent(new O("onnoresult"))
            }
            var b = this.W
              , c = this;
            b.addEventListener("id_changed", function() {
                A.az("y");
                c.xp(b.ac(), a)
            });
            b.addEventListener("iid_changed", function() {
                A.az("y");
                c.vg(ad.tl + "qt=idata&iid=" + b.wA + "&fn=", function(b) {
                    if (b && b.result && 0 == b.result.error) {
                        var b = b.content[0].interinfo
                          , f = {};
                        f.qm = b.BreakID;
                        for (var g = b.Defaultfloor, i = s, k = 0; k < b.Floors.length; k++)
                            if (b.Floors[k].Floor == g) {
                                i = b.Floors[k];
                                break
                            }
                        f.id = i.StartID || i.Points[0].PID;
                        c.xp(f.id, a, f)
                    }
                }, q)
            });
            b.addEventListener("position_changed_inner", function() {
                A.az("y");
                c.zj(b.ma(), a)
            })
        },
        xp: function(a, b) {
            this.Dd.getPanoramaById.push(arguments)
        },
        zj: function(a, b, c) {
            this.Dd.getPanoramaByLocation.push(arguments)
        },
        dE: function(a, b, c, e) {
            this.Dd.getVisiblePOIs.push(arguments)
        },
        Fx: function(a, b) {
            this.Dd.getRecommendPanosById.push(arguments)
        },
        Ex: function(a) {
            this.Dd.getPanoramaVersions.push(arguments)
        },
        mC: function(a, b) {
            this.Dd.checkPanoSupportByCityCode.push(arguments)
        },
        Dx: function(a, b) {
            this.Dd.getPanoramaByPOIId.push(arguments)
        },
        wL: function(a) {
            this.Dd.getCopyrightProviders.push(arguments)
        }
    });
    var Mf = ad.prototype;
    U(Mf, {
        getPanoramaById: Mf.xp,
        getPanoramaByLocation: Mf.zj,
        getPanoramaByPOIId: Mf.Dx
    });
    function $c(a) {
        Jd.call(this);
        "api" == (a || {}).Xe ? Va(Fa) : Va(Ga)
    }
    $c.MG = A.xh("pano", "");
    $c.prototype = new Jd;
    $c.prototype.getTilesUrl = function(a, b) {
        var c = $c.MG[(a.x + a.y) % $c.MG.length] + "?udt=20150114&qt=tile&styles=pl&x=" + a.x + "&y=" + a.y + "&z=" + b;
        x.ga.oa && 6 >= x.ga.oa && (c += "&color_dep=32");
        var e = Tb(c);
        e ? (e = Qc(e.path, {
            Hp: t
        }),
        c += "&" + e) : c = s;
        return c
    }
    ;
    $c.prototype.Gt = fa(q);
    Nf.ae = new R;
    function Nf() {}
    x.extend(Nf, {
        BW: function(a, b, c) {
            c = x.lang.Tc(c);
            b = {
                data: b
            };
            "position_changed" == a && (b.data = Nf.ae.Kj(new Q(b.data.mercatorX,b.data.mercatorY)));
            c.dispatchEvent(new O("on" + a), b)
        }
    });
    var Of = Nf;
    U(Of, {
        dispatchFlashEvent: Of.BW
    });
    var Pf = {
        FP: 50
    };
    Pf.Tu = A.xh("pano")[0];
    Pf.Ru = {
        width: 220,
        height: 60
    };
    x.extend(Pf, {
        pM: function(a, b, c, e) {
            if (!b || !c || !c.lngLat || !c.panoInstance)
                e();
            else {
                this.to === l && (this.to = new ad(s,{
                    Xe: "api"
                }));
                var f = this;
                this.to.mC(b, function(b) {
                    b ? f.to.zj(c.lngLat, Pf.FP, function(b) {
                        if (b && b.id) {
                            var g = b.id
                              , m = b.Fh
                              , b = b.Gh
                              , n = ad.ae.Lg(c.lngLat)
                              , o = f.nS(n, {
                                x: m,
                                y: b
                            })
                              , m = f.HL(g, o, 0, Pf.Ru.width, Pf.Ru.height);
                            a.content = f.oS(a.content, m, c.titleTip, c.beforeDomId);
                            a.addEventListener("open", function() {
                                ka.V(x.Ic("infoWndPano"), "click", function() {
                                    c.panoInstance.Gc(g);
                                    c.panoInstance.show();
                                    c.panoInstance.zd({
                                        heading: o,
                                        pitch: 0
                                    })
                                })
                            })
                        }
                        e()
                    }) : e()
                })
            }
        },
        oS: function(a, b, c, e) {
            var c = c || "", f;
            !e || !a.split(e)[0] ? (e = a,
            a = "") : (e = a.split(e)[0],
            f = e.lastIndexOf("<"),
            e = a.substring(0, f),
            a = a.substring(f));
            f = [];
            var g = Pf.Ru.width
              , i = Pf.Ru.height;
            f.push(e);
            f.push("<div id='infoWndPano' class='panoInfoBox' style='height:" + i + "px;width:" + g + "px; margin-top: -19px;'>");
            f.push("<img class='pano_thumnail_img' width='" + g + "' height='" + i + "' border='0' alt='" + c + "\u5916\u666f' title='" + c + "\u5916\u666f' src='" + b + "' onerror='Pano.PanoEntranceUtil.thumbnailNotFound(this, " + g + ", " + i + ");' />");
            f.push("<div class='panoInfoBoxTitleBg' style='width:" + g + "px;'></div><a href='javascript:void(0)' class='panoInfoBoxTitleContent' >\u8fdb\u5165\u5168\u666f&gt;&gt;</a>");
            f.push("</div>");
            f.push(a);
            return f.join("")
        },
        nS: function(a, b) {
            var c = 90 - 180 * Math.atan2(a.y - b.y, a.x - b.x) / Math.PI;
            0 > c && (c += 360);
            return c
        },
        HL: function(a, b, c, e, f) {
            var g = Pf.Tu + "?qt=pr3d&fovy=75&quality=80&panoid={panoId}&heading={panoHeading}&pitch={panoPitch}&width={width}&height={height}"
              , i = {
                panoId: a,
                panoHeading: b || 0,
                panoPitch: c || 0,
                width: e,
                height: f
            }
              , g = g.replace(/\{(.*?)\}/g, function(a, b) {
                return i[b]
            });
            return (a = Tb(g)) ? (a = Qc(a.path, {
                Hp: t
            }),
            g + ("&" + a)) : s
        }
    });
    var Qf = document, Rf = Math, Sf = Qf.createElement("div").style, Tf;
    a: {
        for (var Uf = ["t", "webkitT", "MozT", "msT", "OT"], Vf, Wf = 0, Xf = Uf.length; Wf < Xf; Wf++)
            if (Vf = Uf[Wf] + "ransform",
            Vf in Sf) {
                Tf = Uf[Wf].substr(0, Uf[Wf].length - 1);
                break a
            }
        Tf = t
    }
    var Yf = Tf ? "-" + Tf.toLowerCase() + "-" : ""
      , $f = Zf("transform")
      , ag = Zf("transitionProperty")
      , cg = Zf("transitionDuration")
      , dg = Zf("transformOrigin")
      , eg = Zf("transitionTimingFunction")
      , fg = Zf("transitionDelay")
      , qf = /android/gi.test(navigator.appVersion)
      , gg = /iphone|ipad/gi.test(navigator.appVersion)
      , hg = /hp-tablet/gi.test(navigator.appVersion)
      , ig = Zf("perspective")in Sf
      , jg = "ontouchstart"in window && !hg
      , kg = Tf !== t
      , lg = Zf("transition")in Sf
      , mg = "onorientationchange"in window ? "orientationchange" : "resize"
      , ng = jg ? "touchstart" : "mousedown"
      , og = jg ? "touchmove" : "mousemove"
      , pg = jg ? "touchend" : "mouseup"
      , qg = jg ? "touchcancel" : "mouseup"
      , rg = Tf === t ? t : {
        "": "transitionend",
        webkit: "webkitTransitionEnd",
        Moz: "transitionend",
        O: "otransitionend",
        ms: "MSTransitionEnd"
    }[Tf]
      , sg = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(a) {
        return setTimeout(a, 1)
    }
      , tg = window.cancelRequestAnimationFrame || window.e7 || window.webkitCancelRequestAnimationFrame || window.mozCancelRequestAnimationFrame || window.oCancelRequestAnimationFrame || window.msCancelRequestAnimationFrame || clearTimeout
      , ug = ig ? " translateZ(0)" : "";
    function vg(a, b) {
        var c = this, e;
        c.Gn = "object" == typeof a ? a : Qf.getElementById(a);
        c.Gn.style.overflow = "hidden";
        c.Sb = c.Gn.children[0];
        c.options = {
            Dp: q,
            Cn: q,
            x: 0,
            y: 0,
            To: q,
            vV: t,
            iy: q,
            HE: q,
            ml: q,
            Oi: t,
            M0: 0,
            Rw: t,
            Jx: q,
            vi: q,
            Pi: q,
            uD: qf,
            Nx: gg,
            iX: gg && ig,
            kF: "",
            zoom: t,
            ol: 1,
            uq: 4,
            EW: 2,
            kP: "scroll",
            ru: t,
            Ty: 1,
            sN: s,
            kN: function(a) {
                a.preventDefault()
            },
            vN: s,
            jN: s,
            uN: s,
            iN: s,
            my: s,
            wN: s,
            nN: s,
            Tp: s,
            xN: s,
            Sp: s
        };
        for (e in b)
            c.options[e] = b[e];
        c.x = c.options.x;
        c.y = c.options.y;
        c.options.ml = kg && c.options.ml;
        c.options.vi = c.options.Dp && c.options.vi;
        c.options.Pi = c.options.Cn && c.options.Pi;
        c.options.zoom = c.options.ml && c.options.zoom;
        c.options.Oi = lg && c.options.Oi;
        c.options.zoom && qf && (ug = "");
        c.Sb.style[ag] = c.options.ml ? Yf + "transform" : "top left";
        c.Sb.style[cg] = "0";
        c.Sb.style[dg] = "0 0";
        c.options.Oi && (c.Sb.style[eg] = "cubic-bezier(0.33,0.66,0.66,1)");
        c.options.ml ? c.Sb.style[$f] = "translate(" + c.x + "px," + c.y + "px)" + ug : c.Sb.style.cssText += ";position:absolute;top:" + c.y + "px;left:" + c.x + "px";
        c.options.Oi && (c.options.uD = q);
        c.refresh();
        c.ha(mg, window);
        c.ha(ng);
        !jg && "none" != c.options.kP && (c.ha("DOMMouseScroll"),
        c.ha("mousewheel"));
        c.options.Rw && (c.HV = setInterval(function() {
            c.HQ()
        }, 500));
        this.options.Jx && (Event.prototype.stopImmediatePropagation || (document.body.removeEventListener = function(a, b, c) {
            var e = Node.prototype.removeEventListener;
            a === "click" ? e.call(document.body, a, b.fM || b, c) : e.call(document.body, a, b, c)
        }
        ,
        document.body.addEventListener = function(a, b, c) {
            var e = Node.prototype.addEventListener;
            a === "click" ? e.call(document.body, a, b.fM || (b.fM = function(a) {
                a.o_ || b(a)
            }
            ), c) : e.call(document.body, a, b, c)
        }
        ),
        c.ha("click", document.body, q))
    }
    vg.prototype = {
        enabled: q,
        x: 0,
        y: 0,
        Nj: [],
        scale: 1,
        CC: 0,
        DC: 0,
        af: [],
        yf: [],
        eC: s,
        cz: 0,
        handleEvent: function(a) {
            switch (a.type) {
            case ng:
                if (!jg && 0 !== a.button)
                    break;
                this.jw(a);
                break;
            case og:
                this.kT(a);
                break;
            case pg:
            case qg:
                this.qv(a);
                break;
            case mg:
                this.sB();
                break;
            case "DOMMouseScroll":
            case "mousewheel":
                this.PU(a);
                break;
            case rg:
                this.LU(a);
                break;
            case "click":
                this.RQ(a)
            }
        },
        HQ: function() {
            !this.Eh && (!this.pl && !(this.nm || this.Hy == this.Sb.offsetWidth * this.scale && this.cq == this.Sb.offsetHeight * this.scale)) && this.refresh()
        },
        Zv: function(a) {
            var b;
            this[a + "Scrollbar"] ? (this[a + "ScrollbarWrapper"] || (b = Qf.createElement("div"),
            this.options.kF ? b.className = this.options.kF + a.toUpperCase() : b.style.cssText = "position:absolute;z-index:100;" + ("h" == a ? "height:7px;bottom:1px;left:2px;right:" + (this.Pi ? "7" : "2") + "px" : "width:7px;bottom:" + (this.vi ? "7" : "2") + "px;top:2px;right:1px"),
            b.style.cssText += ";pointer-events:none;" + Yf + "transition-property:opacity;" + Yf + "transition-duration:" + (this.options.iX ? "350ms" : "0") + ";overflow:hidden;opacity:" + (this.options.Nx ? "0" : "1"),
            this.Gn.appendChild(b),
            this[a + "ScrollbarWrapper"] = b,
            b = Qf.createElement("div"),
            this.options.kF || (b.style.cssText = "position:absolute;z-index:100;background:rgba(0,0,0,0.5);border:1px solid rgba(255,255,255,0.9);" + Yf + "background-clip:padding-box;" + Yf + "box-sizing:border-box;" + ("h" == a ? "height:100%" : "width:100%") + ";" + Yf + "border-radius:3px;border-radius:3px"),
            b.style.cssText += ";pointer-events:none;" + Yf + "transition-property:" + Yf + "transform;" + Yf + "transition-timing-function:cubic-bezier(0.33,0.66,0.66,1);" + Yf + "transition-duration:0;" + Yf + "transform: translate(0,0)" + ug,
            this.options.Oi && (b.style.cssText += ";" + Yf + "transition-timing-function:cubic-bezier(0.33,0.66,0.66,1)"),
            this[a + "ScrollbarWrapper"].appendChild(b),
            this[a + "ScrollbarIndicator"] = b),
            "h" == a ? (this.bM = this.cM.clientWidth,
            this.EY = Rf.max(Rf.round(this.bM * this.bM / this.Hy), 8),
            this.DY.style.width = this.EY + "px") : (this.cP = this.dP.clientHeight,
            this.i1 = Rf.max(Rf.round(this.cP * this.cP / this.cq), 8),
            this.h1.style.height = this.i1 + "px"),
            this.tB(a, q)) : this[a + "ScrollbarWrapper"] && (kg && (this[a + "ScrollbarIndicator"].style[$f] = ""),
            this[a + "ScrollbarWrapper"].parentNode.removeChild(this[a + "ScrollbarWrapper"]),
            this[a + "ScrollbarWrapper"] = s,
            this[a + "ScrollbarIndicator"] = s)
        },
        sB: function() {
            var a = this;
            setTimeout(function() {
                a.refresh()
            }, qf ? 200 : 0)
        },
        Jr: function(a, b) {
            this.pl || (a = this.Dp ? a : 0,
            b = this.Cn ? b : 0,
            this.options.ml ? this.Sb.style[$f] = "translate(" + a + "px," + b + "px) scale(" + this.scale + ")" + ug : (a = Rf.round(a),
            b = Rf.round(b),
            this.Sb.style.left = a + "px",
            this.Sb.style.top = b + "px"),
            this.x = a,
            this.y = b,
            this.tB("h"),
            this.tB("v"))
        },
        tB: function(a, b) {
            var c = "h" == a ? this.x : this.y;
            this[a + "Scrollbar"] && (c *= this[a + "ScrollbarProp"],
            0 > c ? (this.options.uD || (c = this[a + "ScrollbarIndicatorSize"] + Rf.round(3 * c),
            8 > c && (c = 8),
            this[a + "ScrollbarIndicator"].style["h" == a ? "width" : "height"] = c + "px"),
            c = 0) : c > this[a + "ScrollbarMaxScroll"] && (this.options.uD ? c = this[a + "ScrollbarMaxScroll"] : (c = this[a + "ScrollbarIndicatorSize"] - Rf.round(3 * (c - this[a + "ScrollbarMaxScroll"])),
            8 > c && (c = 8),
            this[a + "ScrollbarIndicator"].style["h" == a ? "width" : "height"] = c + "px",
            c = this[a + "ScrollbarMaxScroll"] + (this[a + "ScrollbarIndicatorSize"] - c))),
            this[a + "ScrollbarWrapper"].style[fg] = "0",
            this[a + "ScrollbarWrapper"].style.opacity = b && this.options.Nx ? "0" : "1",
            this[a + "ScrollbarIndicator"].style[$f] = "translate(" + ("h" == a ? c + "px,0)" : "0," + c + "px)") + ug)
        },
        RQ: function(a) {
            if (a.JR === q)
                return this.TB = a.target,
                this.nx = Date.now(),
                q;
            if (this.TB && this.nx) {
                if (600 < Date.now() - this.nx)
                    return this.nx = this.TB = s,
                    q
            } else {
                for (var b = a.target; b != this.Sb && b != document.body; )
                    b = b.parentNode;
                if (b == document.body)
                    return q
            }
            for (b = a.target; 1 != b.nodeType; )
                b = b.parentNode;
            b = b.tagName.toLowerCase();
            if ("select" != b && "input" != b && "textarea" != b)
                return a.stopImmediatePropagation ? a.stopImmediatePropagation() : a.o_ = q,
                a.stopPropagation(),
                a.preventDefault(),
                this.nx = this.TB = s,
                t
        },
        jw: function(a) {
            var b = jg ? a.touches[0] : a, c, e;
            if (this.enabled) {
                this.options.kN && this.options.kN.call(this, a);
                (this.options.Oi || this.options.zoom) && this.CJ(0);
                this.pl = this.nm = this.Eh = t;
                this.MC = this.LC = this.Dw = this.Cw = this.RC = this.QC = 0;
                this.options.zoom && (jg && 1 < a.touches.length) && (e = Rf.abs(a.touches[0].pageX - a.touches[1].pageX),
                c = Rf.abs(a.touches[0].pageY - a.touches[1].pageY),
                this.O0 = Rf.sqrt(e * e + c * c),
                this.oy = Rf.abs(a.touches[0].pageX + a.touches[1].pageX - 2 * this.eG) / 2 - this.x,
                this.py = Rf.abs(a.touches[0].pageY + a.touches[1].pageY - 2 * this.fG) / 2 - this.y,
                this.options.Tp && this.options.Tp.call(this, a));
                if (this.options.iy && (this.options.ml ? (c = getComputedStyle(this.Sb, s)[$f].replace(/[^0-9\-.,]/g, "").split(","),
                e = +(c[12] || c[4]),
                c = +(c[13] || c[5])) : (e = +getComputedStyle(this.Sb, s).left.replace(/[^0-9-]/g, ""),
                c = +getComputedStyle(this.Sb, s).top.replace(/[^0-9-]/g, "")),
                e != this.x || c != this.y))
                    this.options.Oi ? this.ee(rg) : tg(this.eC),
                    this.Nj = [],
                    this.Jr(e, c),
                    this.options.my && this.options.my.call(this);
                this.Ew = this.x;
                this.Fw = this.y;
                this.vu = this.x;
                this.wu = this.y;
                this.Fh = b.pageX;
                this.Gh = b.pageY;
                this.startTime = a.timeStamp || Date.now();
                this.options.vN && this.options.vN.call(this, a);
                this.ha(og, window);
                this.ha(pg, window);
                this.ha(qg, window)
            }
        },
        kT: function(a) {
            var b = jg ? a.touches[0] : a
              , c = b.pageX - this.Fh
              , e = b.pageY - this.Gh
              , f = this.x + c
              , g = this.y + e
              , i = a.timeStamp || Date.now();
            this.options.jN && this.options.jN.call(this, a);
            if (this.options.zoom && jg && 1 < a.touches.length)
                f = Rf.abs(a.touches[0].pageX - a.touches[1].pageX),
                g = Rf.abs(a.touches[0].pageY - a.touches[1].pageY),
                this.N0 = Rf.sqrt(f * f + g * g),
                this.pl = q,
                b = 1 / this.O0 * this.N0 * this.scale,
                b < this.options.ol ? b = 0.5 * this.options.ol * Math.pow(2, b / this.options.ol) : b > this.options.uq && (b = 2 * this.options.uq * Math.pow(0.5, this.options.uq / b)),
                this.Lp = b / this.scale,
                f = this.oy - this.oy * this.Lp + this.x,
                g = this.py - this.py * this.Lp + this.y,
                this.Sb.style[$f] = "translate(" + f + "px," + g + "px) scale(" + b + ")" + ug,
                this.options.xN && this.options.xN.call(this, a);
            else {
                this.Fh = b.pageX;
                this.Gh = b.pageY;
                if (0 < f || f < this.qe)
                    f = this.options.To ? this.x + c / 2 : 0 <= f || 0 <= this.qe ? 0 : this.qe;
                if (g > this.wf || g < this.yd)
                    g = this.options.To ? this.y + e / 2 : g >= this.wf || 0 <= this.yd ? this.wf : this.yd;
                this.QC += c;
                this.RC += e;
                this.Cw = Rf.abs(this.QC);
                this.Dw = Rf.abs(this.RC);
                6 > this.Cw && 6 > this.Dw || (this.options.HE && (this.Cw > this.Dw + 5 ? (g = this.y,
                e = 0) : this.Dw > this.Cw + 5 && (f = this.x,
                c = 0)),
                this.Eh = q,
                this.Jr(f, g),
                this.LC = 0 < c ? -1 : 0 > c ? 1 : 0,
                this.MC = 0 < e ? -1 : 0 > e ? 1 : 0,
                300 < i - this.startTime && (this.startTime = i,
                this.vu = this.x,
                this.wu = this.y),
                this.options.uN && this.options.uN.call(this, a))
            }
        },
        qv: function(a) {
            if (!(jg && 0 !== a.touches.length)) {
                var b = this, c = jg ? a.changedTouches[0] : a, e, f, g = {
                    Ia: 0,
                    time: 0
                }, i = {
                    Ia: 0,
                    time: 0
                }, k = (a.timeStamp || Date.now()) - b.startTime;
                e = b.x;
                f = b.y;
                b.ee(og, window);
                b.ee(pg, window);
                b.ee(qg, window);
                b.options.iN && b.options.iN.call(b, a);
                if (b.pl)
                    e = b.scale * b.Lp,
                    e = Math.max(b.options.ol, e),
                    e = Math.min(b.options.uq, e),
                    b.Lp = e / b.scale,
                    b.scale = e,
                    b.x = b.oy - b.oy * b.Lp + b.x,
                    b.y = b.py - b.py * b.Lp + b.y,
                    b.Sb.style[cg] = "200ms",
                    b.Sb.style[$f] = "translate(" + b.x + "px," + b.y + "px) scale(" + b.scale + ")" + ug,
                    b.pl = t,
                    b.refresh(),
                    b.options.Sp && b.options.Sp.call(b, a);
                else {
                    if (b.Eh) {
                        if (300 > k && b.options.iy) {
                            g = e ? b.qI(e - b.vu, k, -b.x, b.Hy - b.Ku + b.x, b.options.To ? b.Ku : 0) : g;
                            i = f ? b.qI(f - b.wu, k, -b.y, 0 > b.yd ? b.cq - b.Hn + b.y - b.wf : 0, b.options.To ? b.Hn : 0) : i;
                            e = b.x + g.Ia;
                            f = b.y + i.Ia;
                            if (0 < b.x && 0 < e || b.x < b.qe && e < b.qe)
                                g = {
                                    Ia: 0,
                                    time: 0
                                };
                            if (b.y > b.wf && f > b.wf || b.y < b.yd && f < b.yd)
                                i = {
                                    Ia: 0,
                                    time: 0
                                }
                        }
                        g.Ia || i.Ia ? (c = Rf.max(Rf.max(g.time, i.time), 10),
                        b.options.ru && (g = e - b.Ew,
                        i = f - b.Fw,
                        Rf.abs(g) < b.options.Ty && Rf.abs(i) < b.options.Ty ? b.scrollTo(b.Ew, b.Fw, 200) : (g = b.pJ(e, f),
                        e = g.x,
                        f = g.y,
                        c = Rf.max(g.time, c))),
                        b.scrollTo(Rf.round(e), Rf.round(f), c)) : b.options.ru ? (g = e - b.Ew,
                        i = f - b.Fw,
                        Rf.abs(g) < b.options.Ty && Rf.abs(i) < b.options.Ty ? b.scrollTo(b.Ew, b.Fw, 200) : (g = b.pJ(b.x, b.y),
                        (g.x != b.x || g.y != b.y) && b.scrollTo(g.x, g.y, g.time))) : b.wo(200)
                    } else {
                        if (jg)
                            if (b.MK && b.options.zoom)
                                clearTimeout(b.MK),
                                b.MK = s,
                                b.options.Tp && b.options.Tp.call(b, a),
                                b.zoom(b.Fh, b.Gh, 1 == b.scale ? b.options.EW : 1),
                                b.options.Sp && setTimeout(function() {
                                    b.options.Sp.call(b, a)
                                }, 200);
                            else if (this.options.Jx) {
                                for (e = c.target; 1 != e.nodeType; )
                                    e = e.parentNode;
                                f = e.tagName.toLowerCase();
                                "select" != f && "input" != f && "textarea" != f ? (f = Qf.createEvent("MouseEvents"),
                                f.initMouseEvent("click", q, q, a.view, 1, c.screenX, c.screenY, c.clientX, c.clientY, a.ctrlKey, a.altKey, a.shiftKey, a.metaKey, 0, s),
                                f.JR = q,
                                e.dispatchEvent(f)) : e.focus()
                            }
                        b.wo(400)
                    }
                    b.options.wN && b.options.wN.call(b, a)
                }
            }
        },
        wo: function(a) {
            var b = 0 <= this.x ? 0 : this.x < this.qe ? this.qe : this.x
              , c = this.y >= this.wf || 0 < this.yd ? this.wf : this.y < this.yd ? this.yd : this.y;
            if (b == this.x && c == this.y) {
                if (this.Eh && (this.Eh = t,
                this.options.my && this.options.my.call(this)),
                this.vi && this.options.Nx && ("webkit" == Tf && (this.cM.style[fg] = "300ms"),
                this.cM.style.opacity = "0"),
                this.Pi && this.options.Nx)
                    "webkit" == Tf && (this.dP.style[fg] = "300ms"),
                    this.dP.style.opacity = "0"
            } else
                this.scrollTo(b, c, a || 0)
        },
        PU: function(a) {
            var b = this, c, e;
            if ("wheelDeltaX"in a)
                c = a.wheelDeltaX / 12,
                e = a.wheelDeltaY / 12;
            else if ("wheelDelta"in a)
                c = e = a.wheelDelta / 12;
            else if ("detail"in a)
                c = e = 3 * -a.detail;
            else
                return;
            if ("zoom" == b.options.kP) {
                if (e = b.scale * Math.pow(2, 1 / 3 * (e ? e / Math.abs(e) : 0)),
                e < b.options.ol && (e = b.options.ol),
                e > b.options.uq && (e = b.options.uq),
                e != b.scale)
                    !b.cz && b.options.Tp && b.options.Tp.call(b, a),
                    b.cz++,
                    b.zoom(a.pageX, a.pageY, e, 400),
                    setTimeout(function() {
                        b.cz--;
                        !b.cz && b.options.Sp && b.options.Sp.call(b, a)
                    }, 400)
            } else
                c = b.x + c,
                e = b.y + e,
                0 < c ? c = 0 : c < b.qe && (c = b.qe),
                e > b.wf ? e = b.wf : e < b.yd && (e = b.yd),
                0 > b.yd && b.scrollTo(c, e, 0)
        },
        LU: function(a) {
            a.target == this.Sb && (this.ee(rg),
            this.FB())
        },
        FB: function() {
            var a = this, b = a.x, c = a.y, e = Date.now(), f, g, i;
            a.nm || (a.Nj.length ? (f = a.Nj.shift(),
            f.x == b && f.y == c && (f.time = 0),
            a.nm = q,
            a.Eh = q,
            a.options.Oi) ? (a.CJ(f.time),
            a.Jr(f.x, f.y),
            a.nm = t,
            f.time ? a.ha(rg) : a.wo(0)) : (i = function() {
                var k = Date.now(), m;
                if (k >= e + f.time) {
                    a.Jr(f.x, f.y);
                    a.nm = t;
                    a.options.OZ && a.options.OZ.call(a);
                    a.FB()
                } else {
                    k = (k - e) / f.time - 1;
                    g = Rf.sqrt(1 - k * k);
                    k = (f.x - b) * g + b;
                    m = (f.y - c) * g + c;
                    a.Jr(k, m);
                    if (a.nm)
                        a.eC = sg(i)
                }
            }
            ,
            i()) : a.wo(400))
        },
        CJ: function(a) {
            a += "ms";
            this.Sb.style[cg] = a;
            this.vi && (this.DY.style[cg] = a);
            this.Pi && (this.h1.style[cg] = a)
        },
        qI: function(a, b, c, e, f) {
            var b = Rf.abs(a) / b
              , g = b * b / 0.0012;
            0 < a && g > c ? (c += f / (6 / (6.0E-4 * (g / b))),
            b = b * c / g,
            g = c) : 0 > a && g > e && (e += f / (6 / (6.0E-4 * (g / b))),
            b = b * e / g,
            g = e);
            return {
                Ia: g * (0 > a ? -1 : 1),
                time: Rf.round(b / 6.0E-4)
            }
        },
        pk: function(a) {
            for (var b = -a.offsetLeft, c = -a.offsetTop; a = a.offsetParent; )
                b -= a.offsetLeft,
                c -= a.offsetTop;
            a != this.Gn && (b *= this.scale,
            c *= this.scale);
            return {
                left: b,
                top: c
            }
        },
        pJ: function(a, b) {
            var c, e, f;
            f = this.af.length - 1;
            c = 0;
            for (e = this.af.length; c < e; c++)
                if (a >= this.af[c]) {
                    f = c;
                    break
                }
            f == this.CC && (0 < f && 0 > this.LC) && f--;
            a = this.af[f];
            e = (e = Rf.abs(a - this.af[this.CC])) ? 500 * (Rf.abs(this.x - a) / e) : 0;
            this.CC = f;
            f = this.yf.length - 1;
            for (c = 0; c < f; c++)
                if (b >= this.yf[c]) {
                    f = c;
                    break
                }
            f == this.DC && (0 < f && 0 > this.MC) && f--;
            b = this.yf[f];
            c = (c = Rf.abs(b - this.yf[this.DC])) ? 500 * (Rf.abs(this.y - b) / c) : 0;
            this.DC = f;
            f = Rf.round(Rf.max(e, c)) || 200;
            return {
                x: a,
                y: b,
                time: f
            }
        },
        ha: function(a, b, c) {
            (b || this.Sb).addEventListener(a, this, !!c)
        },
        ee: function(a, b, c) {
            (b || this.Sb).removeEventListener(a, this, !!c)
        },
        JC: ia(2),
        refresh: function() {
            var a, b, c, e = 0;
            b = 0;
            this.scale < this.options.ol && (this.scale = this.options.ol);
            this.Ku = this.Gn.clientWidth || 1;
            this.Hn = this.Gn.clientHeight || 1;
            this.wf = -this.options.M0 || 0;
            this.Hy = Rf.round(this.Sb.offsetWidth * this.scale);
            this.cq = Rf.round((this.Sb.offsetHeight + this.wf) * this.scale);
            this.qe = this.Ku - this.Hy;
            this.yd = this.Hn - this.cq + this.wf;
            this.MC = this.LC = 0;
            this.options.sN && this.options.sN.call(this);
            this.Dp = this.options.Dp && 0 > this.qe;
            this.Cn = this.options.Cn && (!this.options.vV && !this.Dp || this.cq > this.Hn);
            this.vi = this.Dp && this.options.vi;
            this.Pi = this.Cn && this.options.Pi && this.cq > this.Hn;
            a = this.pk(this.Gn);
            this.eG = -a.left;
            this.fG = -a.top;
            if ("string" == typeof this.options.ru) {
                this.af = [];
                this.yf = [];
                c = this.Sb.querySelectorAll(this.options.ru);
                a = 0;
                for (b = c.length; a < b; a++)
                    e = this.pk(c[a]),
                    e.left += this.eG,
                    e.top += this.fG,
                    this.af[a] = e.left < this.qe ? this.qe : e.left * this.scale,
                    this.yf[a] = e.top < this.yd ? this.yd : e.top * this.scale
            } else if (this.options.ru) {
                for (this.af = []; e >= this.qe; )
                    this.af[b] = e,
                    e -= this.Ku,
                    b++;
                this.qe % this.Ku && (this.af[this.af.length] = this.qe - this.af[this.af.length - 1] + this.af[this.af.length - 1]);
                b = e = 0;
                for (this.yf = []; e >= this.yd; )
                    this.yf[b] = e,
                    e -= this.Hn,
                    b++;
                this.yd % this.Hn && (this.yf[this.yf.length] = this.yd - this.yf[this.yf.length - 1] + this.yf[this.yf.length - 1])
            }
            this.Zv("h");
            this.Zv("v");
            this.pl || (this.Sb.style[cg] = "0",
            this.wo(400))
        },
        scrollTo: function(a, b, c, e) {
            var f = a;
            this.stop();
            f.length || (f = [{
                x: a,
                y: b,
                time: c,
                q_: e
            }]);
            a = 0;
            for (b = f.length; a < b; a++)
                f[a].q_ && (f[a].x = this.x - f[a].x,
                f[a].y = this.y - f[a].y),
                this.Nj.push({
                    x: f[a].x,
                    y: f[a].y,
                    time: f[a].time || 0
                });
            this.FB()
        },
        disable: function() {
            this.stop();
            this.wo(0);
            this.enabled = t;
            this.ee(og, window);
            this.ee(pg, window);
            this.ee(qg, window)
        },
        enable: function() {
            this.enabled = q
        },
        stop: function() {
            this.options.Oi ? this.ee(rg) : tg(this.eC);
            this.Nj = [];
            this.nm = this.Eh = t
        },
        zoom: function(a, b, c, e) {
            var f = c / this.scale;
            this.options.ml && (this.pl = q,
            e = e === l ? 200 : e,
            a = a - this.eG - this.x,
            b = b - this.fG - this.y,
            this.x = a - a * f + this.x,
            this.y = b - b * f + this.y,
            this.scale = c,
            this.refresh(),
            this.x = 0 < this.x ? 0 : this.x < this.qe ? this.qe : this.x,
            this.y = this.y > this.wf ? this.wf : this.y < this.yd ? this.yd : this.y,
            this.Sb.style[cg] = e + "ms",
            this.Sb.style[$f] = "translate(" + this.x + "px," + this.y + "px) scale(" + c + ")" + ug,
            this.pl = t)
        }
    };
    function Zf(a) {
        if ("" === Tf)
            return a;
        a = a.charAt(0).toUpperCase() + a.substr(1);
        return Tf + a
    }
    Sf = s;
    function wg(a) {
        this.m = {
            anchor: Uc,
            offset: new M(0,0),
            maxWidth: "100%",
            imageHeight: 80
        };
        var a = a || {}, b;
        for (b in a)
            this.m[b] = a[b];
        this.cm = new ad(s,{
            Xe: "api"
        });
        this.qk = [];
        this.W = s;
        this.mg = {
            height: this.m.imageHeight,
            width: this.m.imageHeight * xg
        };
        this.Yc = this.uB = this.qm = this.dd = s
    }
    var yg = [0, 1, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 4, 5, 5, 5, 6, 6, 7, 8, 8, 8, 9, 10]
      , zg = "\u5176\u4ed6 \u6b63\u95e8 \u623f\u578b \u8bbe\u65bd \u6b63\u95e8 \u9910\u996e\u8bbe\u65bd \u5176\u4ed6\u8bbe\u65bd \u6b63\u95e8 \u8bbe\u65bd \u89c2\u5f71\u5385 \u5176\u4ed6\u8bbe\u65bd".split(" ");
    A.Yk(function(a) {
        var b = s;
        a.addEventListener("position_changed", function() {
            a.m.visible && a.m.albumsControl === q && (b ? b.Dy(a.ac()) : (b = new wg(a.m.albumsControlOptions),
            b.za(a)))
        });
        a.addEventListener("albums_visible_changed", function() {
            a.m.albumsControl === q ? (b ? b.Dy(a.ac()) : (b = new wg(a.m.albumsControlOptions),
            b.za(a)),
            b.show()) : b.aa()
        });
        a.addEventListener("albums_options_changed", function() {
            b && b.Mj(a.m.albumsControlOptions)
        });
        a.addEventListener("visible_changed", function() {
            b && (a.Hx() ? a.m.albumsControl === q && (b.R.style.visibility = "visible") : b.R.style.visibility = "hidden")
        })
    });
    var xg = 1.8;
    K() && (xg = 1);
    x.extend(wg.prototype, {
        Mj: function(a) {
            for (var b in a)
                this.m[b] = a[b];
            a = this.m.imageHeight + "px";
            this.wc(this.m.anchor);
            this.R.style.width = isNaN(Number(this.m.maxWidth)) === q ? this.m.maxWidth : this.m.maxWidth + "px";
            this.R.style.height = a;
            this.uk.style.height = a;
            this.ci.style.height = a;
            this.mg = {
                height: this.m.imageHeight,
                width: this.m.imageHeight * xg
            };
            this.tk.style.height = this.mg.height - 6 + "px";
            this.tk.style.width = this.mg.width - 6 + "px";
            this.Dy(this.W.ac(), q)
        },
        za: function(a) {
            this.W = a;
            this.ys();
            this.pQ();
            this.UY();
            this.Dy(a.ac())
        },
        ys: function() {
            var a = this.m.imageHeight + "px";
            this.R = F("div");
            var b = this.R.style;
            b.cssText = "background:rgb(37,37,37);background:rgba(37,37,37,0.9);";
            b.position = "absolute";
            b.zIndex = "2000";
            b.width = isNaN(Number(this.m.maxWidth)) === q ? this.m.maxWidth : this.m.maxWidth + "px";
            b.padding = "8px 0";
            b.visibility = "hidden";
            b.height = a;
            this.uk = F("div");
            b = this.uk.style;
            b.position = "absolute";
            b.overflow = "hidden";
            b.width = "100%";
            b.height = a;
            this.ci = F("div");
            b = this.ci.style;
            b.height = a;
            this.uk.appendChild(this.ci);
            this.R.appendChild(this.uk);
            this.W.R.appendChild(this.R);
            this.tk = F("div", {
                "class": "pano_photo_item_seleted"
            });
            this.tk.style.height = this.mg.height - 6 + "px";
            this.tk.style.width = this.mg.width - 6 + "px";
            this.wc(this.m.anchor)
        },
        LH: function(a) {
            for (var b = this.qk, c = b.length - 1; 0 <= c; c--)
                if (b[c].panoId == a)
                    return c;
            return -1
        },
        Dy: function(a, b) {
            if (b || !this.qk[this.dd] || !(this.qk[this.dd].panoId == a && 3 !== this.qk[this.dd].recoType)) {
                var c = this
                  , e = this.LH(a);
                !b && -1 !== e && this.qk[e] && 3 !== this.qk[e].recoType ? this.gq(e) : this.iY(function(a) {
                    for (var b = {}, e, k, m = t, n = [], o = 0, p = a.length; o < p; o++)
                        e = a[o].catlog,
                        k = a[o].floor,
                        l !== e && ("" === e && l !== k ? (m = q,
                        b[k] || (b[k] = []),
                        b[k].push(a[o])) : (b[yg[e]] || (b[yg[e]] = []),
                        b[yg[e]].push(a[o])));
                    for (var v in b)
                        m ? n.push({
                            data: v + "F",
                            index: v
                        }) : n.push({
                            data: zg[v],
                            index: v
                        });
                    c.gH = b;
                    c.cj = n;
                    c.jj(a);
                    0 == a.length ? c.aa() : c.show()
                })
            }
        },
        iW: function() {
            if (!this.Zi) {
                var a = this.XX(this.cj)
                  , b = F("div");
                b.style.cssText = ["width:" + 134 * this.cj.length + "px;", "overflow:hidden;-ms-user-select:none;-moz-user-select:none;-webkit-user-select:none;"].join("");
                b.innerHTML = a;
                a = F("div");
                a.appendChild(b);
                a.style.cssText = "position:absolute;top:-25px;background:rgb(37,37,37);background:rgba(37,37,37,0.9);border-bottom:1px solid #4e596a;width:100%;line-height:25px;height:25px;overflow:scroll;outline:0";
                new vg(a,{
                    To: t,
                    iy: q,
                    vi: t,
                    Pi: t,
                    Cn: t,
                    HE: q,
                    Rw: q,
                    Jx: q
                });
                this.R.appendChild(a);
                for (var c = this, e = b.getElementsByTagName("span"), f = 0, g = e.length; f < g; f++)
                    b = e[f],
                    x.V(b, "click", function() {
                        if (this.getAttribute("dataindex")) {
                            c.jj(c.gH[this.getAttribute("dataindex")]);
                            for (var a = 0, b = e.length; a < b; a++)
                                e[a].style.color = "#FFFFFF";
                            this.style.color = "#3383FF"
                        }
                    });
                this.Zi = a
            }
        },
        fW: function() {
            if (this.Zi)
                a = this.uL(this.cj),
                this.FQ.innerHTML = a;
            else {
                var a = this.uL(this.cj)
                  , b = F("ul")
                  , c = this;
                b.style.cssText = "list-style: none;padding:0px;margin:0px;display:block;width:60px;position:absolute;top:7px";
                b.innerHTML = a;
                x.V(b, "click", function(a) {
                    if (a = (a.srcElement || a.target).getAttribute("dataindex")) {
                        c.jj(c.gH[a]);
                        for (var e = b.getElementsByTagName("li"), f = 0, g = e.length; f < g; f++)
                            e[f].childNodes[0].getAttribute("dataindex") === a ? x.U.ib(e[f], "pano_catlogLiActive") : x.U.rc(e[f], "pano_catlogLiActive")
                    }
                });
                var a = F("div")
                  , e = F("a")
                  , f = F("span")
                  , g = F("a")
                  , i = F("span")
                  , k = ["background:url(" + J.ta + "panorama/catlog_icon.png) no-repeat;", "display:block;width:10px;height:7px;margin:0 auto;"].join("");
                f.style.cssText = k + "background-position:-18px 0;";
                e.style.cssText = "background:#1C1C1C;display:block;position:absolute;width:58px;";
                i.style.cssText = k + "background-position:0 0;";
                g.style.cssText = "background:#1C1C1C;display:block;position:absolute;width:58px;";
                g.style.top = this.m.imageHeight - 7 + "px";
                a.style.cssText = "position:absolute;top:0px;left:0px;width:60px;";
                e.appendChild(f);
                g.appendChild(i);
                x.V(e, "mouseover", function() {
                    var a = parseInt(b.style.top, 10);
                    7 !== a && (f.style.backgroundPosition = "-27px 0");
                    new Bb({
                        Nc: 60,
                        fc: Cb.Rs,
                        duration: 300,
                        Ba: function(c) {
                            b.style.top = a + (7 - a) * c + "px"
                        }
                    })
                });
                x.V(e, "mouseout", function() {
                    f.style.backgroundPosition = "-18px 0"
                });
                x.V(g, "mouseover", function() {
                    var a = parseInt(b.style.top, 10)
                      , e = c.m.imageHeight - 14;
                    if (!(parseInt(b.offsetHeight, 10) < e)) {
                        var f = e - parseInt(b.offsetHeight, 10) + 7;
                        f !== a && (i.style.backgroundPosition = "-9px 0");
                        new Bb({
                            Nc: 60,
                            fc: Cb.Rs,
                            duration: 300,
                            Ba: function(c) {
                                b.style.top = a + (f - a) * c + "px"
                            }
                        })
                    }
                });
                x.V(g, "mouseout", function() {
                    i.style.backgroundPosition = "0 0"
                });
                a.appendChild(e);
                a.appendChild(g);
                e = F("div");
                e.style.cssText = ["position:absolute;z-index:2001;left:20px;", "height:" + this.m.imageHeight + "px;", "width:62px;overflow:hidden;background:rgb(37,37,37);background:rgba(37,37,37,0.9);"].join("");
                e.appendChild(b);
                e.appendChild(a);
                this.Zi = e;
                this.FQ = b;
                this.R.appendChild(e)
            }
        },
        gW: function() {
            if (this.cj && !(0 >= this.cj.length)) {
                var a = F("div");
                a.innerHTML = this.$z;
                a.style.cssText = "position:absolute;background:#252525";
                this.R.appendChild(a);
                this.Us = a;
                this.Yc.og.style.left = this.mg.width + 8 + "px";
                this.Zi && (this.Zi.style.left = parseInt(this.Zi.style.left, 10) + this.mg.width + 8 + "px");
                var b = this;
                x.V(a, "click", function() {
                    b.W.Gc(b.dX)
                })
            }
        },
        jj: function(a) {
            this.qk = a;
            this.m.showCatalog && (0 < this.cj.length ? ($a() ? this.fW() : this.iW(),
            this.Yc.offsetLeft = 60) : (this.Us && (this.R.removeChild(this.Us),
            this.Us = s,
            this.Yc.og.style.left = "0px"),
            this.Zi && (this.R.removeChild(this.Zi),
            this.Zi = s),
            this.Yc.offsetLeft = 0));
            var b = this.RX(a);
            $a() && (this.cj && 0 < this.cj.length && this.m.showExit && this.$z) && (this.Yc.offsetLeft += this.mg.width + 8,
            this.Us ? this.Us.innerHTML = this.$z : this.gW());
            this.ci.innerHTML = b;
            this.ci.style.width = (this.mg.width + 8) * a.length + 8 + "px";
            a = this.R.offsetWidth;
            b = this.ci.offsetWidth;
            this.Yc.at && (b += this.Yc.at());
            b < a - 2 * this.Yc.Si - this.Yc.offsetLeft ? this.R.style.width = b + this.Yc.offsetLeft + "px" : (this.R.style.width = isNaN(Number(this.m.maxWidth)) === q ? this.m.maxWidth : this.m.maxWidth + "px",
            b < this.R.offsetWidth - 2 * this.Yc.Si - this.Yc.offsetLeft && (this.R.style.width = b + this.Yc.offsetLeft + "px"));
            this.Yc.refresh();
            this.uB = this.ci.children;
            this.ci.appendChild(this.tk);
            this.tk.style.left = "-100000px";
            a = this.LH(this.W.ac(), this.D2);
            -1 !== a && this.gq(a)
        },
        XX: function(a) {
            for (var b = "", c, e = 0, f = a.length; e < f; e++)
                c = '<div style="color:white;opacity:0.5;margin:0 35px;float:left;text-align: center"><span  dataIndex="' + a[e].index + '">' + a[e].data + "</span></div>",
                b += c;
            return b
        },
        uL: function(a) {
            for (var b = "", c, e = 0, f = a.length; e < f; e++)
                c = '<li class="pano_catlogLi"><span style="display:block;width:100%;" dataIndex="' + a[e].index + '">' + a[e].data + "</span></li>",
                b += c;
            return b
        },
        RX: function(a) {
            for (var b, c, e, f, g = [], i = this.mg.height, k = this.mg.width, m = 0; m < a.length; m++)
                b = a[m],
                recoType = b.recoType,
                e = b.panoId,
                f = b.name,
                c = b.heading,
                b = b.pitch,
                c = Pf.HL(e, c, b, 198, 108),
                b = '<a href="javascript:void(0);" class="pano_photo_item" data-index="' + m + '"><img style="width:' + (k - 2) + "px;height:" + (i - 2) + 'px;" data-index="' + m + '" name="' + f + '" src="' + c + '" alt="' + f + '"/><span class="pano_photo_decs" data-index="' + m + '" style="width:' + k + "px;font-size:" + Math.floor(i / 6) + "px; line-height:" + Math.floor(i / 6) + 'px;"><em class="pano_poi_' + recoType + '"></em>' + f + "</span></a>",
                3 === recoType ? $a() ? (this.$z = b,
                this.dX = e,
                a.splice(m, 1),
                m--) : (b = '<a href="javascript:void(0);" class="pano_photo_item" data-index="' + m + '"><img style="width:' + (k - 2) + "px;height:" + (i - 2) + 'px;" data-index="' + m + '" name="' + f + '" src="' + c + '" alt="' + f + '"/><div style="background:rgba(37,37,37,0.5);position:absolute;top:0px;left:0px;width:100%;height:100%;text-align: center;line-height:' + this.m.imageHeight + 'px;" data-index="' + m + '"><img src="' + J.ta + 'panorama/photoexit.png" style="border:none;vertical-align:middle;" data-index="' + m + '" alt=""/></div></a>',
                g.push(b)) : g.push(b);
            return g.join("")
        },
        iY: function(a) {
            var b = this
              , c = this.W.ac();
            c && this.cm.Fx(c, function(e) {
                b.W.ac() === c && a(e)
            })
        },
        wc: function(a) {
            if (!cb(a) || isNaN(a) || a < Sc || 3 < a)
                a = this.defaultAnchor;
            var b = this.R
              , c = this.m.offset.width
              , e = this.m.offset.height;
            b.style.left = b.style.top = b.style.right = b.style.bottom = "auto";
            switch (a) {
            case Sc:
                b.style.top = e + "px";
                b.style.left = c + "px";
                break;
            case Tc:
                b.style.top = e + "px";
                b.style.right = c + "px";
                break;
            case Uc:
                b.style.bottom = e + "px";
                b.style.left = c + "px";
                break;
            case 3:
                b.style.bottom = e + "px",
                b.style.right = c + "px"
            }
        },
        pQ: function() {
            this.nQ()
        },
        nQ: function() {
            var a = this;
            x.V(this.R, "touchstart", function(a) {
                a.stopPropagation()
            });
            x.V(this.uk, "click", function(b) {
                if ((b = (b.srcElement || b.target).getAttribute("data-index")) && b != a.dd)
                    a.gq(b),
                    a.W.Gc(a.qk[b].panoId)
            });
            x.V(this.ci, "mouseover", function(b) {
                b = (b.srcElement || b.target).getAttribute("data-index");
                b !== s && a.wK(b, q)
            });
            this.W.addEventListener("size_changed", function() {
                isNaN(Number(a.m.maxWidth)) && a.Mj({
                    maxWidth: a.m.maxWidth
                })
            })
        },
        gq: function(a) {
            this.tk.style.left = this.uB[a].offsetLeft + 8 + "px";
            this.tk.setAttribute("data-index", this.uB[a].getAttribute("data-index"));
            this.dd = a;
            this.wK(a)
        },
        wK: function(a, b) {
            var c = this.mg.width + 8
              , e = 0;
            this.Yc.at && (e = this.Yc.at() / 2);
            var f = this.uk.offsetWidth - 2 * e
              , g = this.ci.offsetLeft || this.Yc.x
              , g = g - e
              , i = -a * c;
            i > g && this.Yc.scrollTo(i + e);
            c = i - c;
            g -= f;
            c < g && (!b || b && 8 < i - g) && this.Yc.scrollTo(c + f + e)
        },
        UY: function() {
            this.Yc = K() ? new vg(this.uk,{
                To: t,
                iy: q,
                vi: t,
                Pi: t,
                Cn: t,
                HE: q,
                Rw: q,
                Jx: q
            }) : new Ag(this.uk)
        },
        aa: function() {
            this.R.style.visibility = "hidden"
        },
        show: function() {
            this.R.style.visibility = "visible"
        }
    });
    function Ag(a) {
        this.R = a;
        this.mh = a.children[0];
        this.Wr = s;
        this.Si = 20;
        this.offsetLeft = 0;
        this.za()
    }
    Ag.prototype = {
        za: function() {
            this.mh.style.position = "relative";
            this.refresh();
            this.ys();
            this.gC()
        },
        refresh: function() {
            this.ro = this.R.offsetWidth - this.at();
            this.UA = -(this.mh.offsetWidth - this.ro - this.Si);
            this.Lv = this.Si + this.offsetLeft;
            this.mh.style.left = this.Lv + "px";
            this.mh.children[0] && (this.Wr = this.mh.children[0].offsetWidth);
            this.og && (this.og.children[0].style.marginTop = this.Pr.children[0].style.marginTop = this.og.offsetHeight / 2 - this.og.children[0].offsetHeight / 2 + "px")
        },
        at: function() {
            return 2 * this.Si
        },
        ys: function() {
            this.$v = F("div");
            this.$v.innerHTML = '<a class="pano_photo_arrow_l" style="background:rgb(37,37,37);background:rgba(37,37,37,0.9);" href="javascript:void(0)" title="\u4e0a\u4e00\u9875"><span class="pano_arrow_l"></span></a><a class="pano_photo_arrow_r" style="background:rgb(37,37,37);background:rgba(37,37,37,0.9);" href="javascript:void(0)" title="\u4e0b\u4e00\u9875"><span class="pano_arrow_r"></span></a>';
            this.og = this.$v.children[0];
            this.Pr = this.$v.children[1];
            this.R.appendChild(this.$v);
            this.og.children[0].style.marginTop = this.Pr.children[0].style.marginTop = this.og.offsetHeight / 2 - this.og.children[0].offsetHeight / 2 + "px"
        },
        gC: function() {
            var a = this;
            x.V(this.og, "click", function() {
                a.scrollTo(a.mh.offsetLeft + a.ro)
            });
            x.V(this.Pr, "click", function() {
                a.scrollTo(a.mh.offsetLeft - a.ro)
            })
        },
        MU: function() {
            x.U.rc(this.og, "pano_arrow_disable");
            x.U.rc(this.Pr, "pano_arrow_disable");
            var a = this.mh.offsetLeft;
            a >= this.Lv && x.U.ib(this.og, "pano_arrow_disable");
            a - this.ro <= this.UA && x.U.ib(this.Pr, "pano_arrow_disable")
        },
        scrollTo: function(a) {
            a = a < this.mh.offsetLeft ? Math.ceil((a - this.Si - this.ro) / this.Wr) * this.Wr + this.ro + this.Si - 8 : Math.ceil((a - this.Si) / this.Wr) * this.Wr + this.Si;
            a < this.UA ? a = this.UA : a > this.Lv && (a = this.Lv);
            var b = this.mh.offsetLeft
              , c = this;
            new Bb({
                Nc: 60,
                fc: Cb.Rs,
                duration: 300,
                Ba: function(e) {
                    c.mh.style.left = b + (a - b) * e + "px"
                },
                finish: function() {
                    c.MU()
                }
            })
        }
    };
    function Bg() {
        var a = 256 * Math.pow(2, 15)
          , b = 3 * a
          , c = R.Sa(new P(180,0)).lng
          , b = b - c
          , e = -3 * a
          , a = R.Sa(new P(-180,0)).lng
          , e = a - e;
        this.NU = c / Math.pow(2, 15);
        this.qg = c;
        this.hh = a;
        this.Ll = b + e;
        this.ih = c - a;
        this.zU = b;
        this.dT = e
    }
    Bg.prototype = {
        sm: function(a, b, c) {
            for (var e = 0, c = 1536 * Math.pow(2, b - 3) / (c || 256), f = c / 2 - 1, g = -c / 2; a > f; )
                a -= c,
                e -= this.Ll;
            for (; a < g; )
                a += c,
                e += this.Ll;
            var i = e
              , e = Math.round(e / Math.pow(2, 18 - b));
            return {
                offsetX: e,
                O3: i,
                Ag: a,
                Q1: c,
                y5: f,
                z5: g
            }
        },
        iC: function(a) {
            for (var b = a.lng; b > this.qg; )
                b -= this.ih;
            for (; b < this.hh; )
                b += this.ih;
            a.lng = b;
            return a
        },
        CV: function(a, b) {
            for (var c = b || a.Hb(), e = a.nf.lng, f = a.kf.lng; c.lng > this.qg; )
                c.lng -= this.ih,
                e -= this.ih,
                f -= this.ih;
            for (; c.lng < this.hh; )
                c.lng += this.ih,
                e += this.ih,
                f += this.ih;
            a.nf.lng = e;
            a.kf.lng = f;
            return a
        },
        jC: function(a, b, c, e) {
            for (var c = c || 256, f = e || Math.pow(2, 18 - b) * c, e = Math.floor(this.qg / f), g = Math.floor(this.hh / f), i = Math.floor(this.Ll / f), f = [], k = 0; k < a.length; k++) {
                var m = a[k]
                  , n = m[0]
                  , m = m[1];
                if (n >= e) {
                    if (n += i,
                    this.Xx(n, b, c) !== q) {
                        var o = "id_" + n + "_" + m + "_" + b;
                        a[o] || (a[o] = q,
                        f.push([n, m, b, c]))
                    }
                } else
                    n <= g && (n -= i,
                    this.Xx(n, b, c) !== q && (o = "id_" + n + "_" + m + "_" + b,
                    a[o] || (a[o] = q,
                    f.push([n, m, b, c]))))
            }
            k = 0;
            for (e = f.length; k < e; k++)
                a.push(f[k]);
            for (k = a.length - 1; 0 <= k; k--)
                n = a[k][0],
                this.Xx(n, b, c) && a.splice(k, 1);
            return a
        },
        Xx: function(a, b, c) {
            for (var e = Math.pow(2, b - 3), b = Math.round(this.NU * e), e = 1536 * e / c; a > e / 2 - 1; )
                a -= e;
            for (; a < -(e / 2); )
                a += e;
            return 0 < a && a * c > b || 0 > a && Math.abs((a + 1) * c) > b ? q : t
        },
        qM: function(a, b) {
            return a < this.hh || b > this.qg
        },
        ML: function(a) {
            return Math.round((this.zU + this.dT) / Math.pow(2, 18 - a))
        },
        sY: function(a, b, c) {
            var b = b || 256
              , e = Math.ceil(this.qg / c)
              , f = Math.floor(this.hh / c);
            return a === e - 1 ? (a = (this.qg - c * (e - 1)) / c * b,
            a = Math.round(a),
            [0, 0, a, b]) : a === f ? (a = (this.hh - c * f) / c * b,
            a = Math.round(Math.abs(a)),
            [a, 0, b, b]) : s
        }
    };
    var xe = new Bg;
    A.Map = Qa;
    A.Hotspot = ob;
    A.MapType = Ce;
    A.Point = P;
    A.Pixel = Q;
    A.Size = M;
    A.Bounds = lb;
    A.TileLayer = Jd;
    A.Projection = gd;
    A.MercatorProjection = R;
    A.PerspectiveProjection = nb;
    A.Copyright = function(a, b, c) {
        this.id = a;
        this.jb = b;
        this.content = c
    }
    ;
    A.Overlay = jd;
    A.Label = rd;
    A.GroundOverlay = sd;
    A.PointCollection = wd;
    A.Marker = W;
    A.CanvasLayer = zd;
    A.Icon = nd;
    A.IconSequence = pd;
    A.Symbol = od;
    A.Polyline = Dd;
    A.Polygon = Cd;
    A.InfoWindow = qd;
    A.Circle = Ed;
    A.Control = Rc;
    A.NavigationControl = rb;
    A.GeolocationControl = Vc;
    A.OverviewMapControl = tb;
    A.CopyrightControl = Wc;
    A.ScaleControl = sb;
    A.MapTypeControl = ub;
    A.CityListControl = Xc;
    A.PanoramaControl = Zc;
    A.TrafficLayer = Qd;
    A.CustomLayer = vb;
    A.ContextMenu = cd;
    A.MenuItem = fd;
    A.LocalSearch = jb;
    A.TransitRoute = gf;
    A.DrivingRoute = kf;
    A.TruckRoute = mf;
    A.WalkingRoute = lf;
    A.RidingRoute = nf;
    A.Autocomplete = xf;
    A.RouteSearch = rf;
    A.Geocoder = sf;
    A.LocalCity = uf;
    A.Geolocation = Geolocation;
    A.Convertor = id;
    A.BusLineSearch = wf;
    A.Boundary = vf;
    A.Panorama = Ta;
    A.PanoramaLabel = Ef;
    A.PanoramaService = ad;
    A.PanoramaCoverageLayer = $c;
    A.PanoramaFlashInterface = Nf;
    function U(a, b) {
        for (var c in b)
            a[c] = b[c]
    }
    U(window, {
        BMap: A,
        _jsload2: function(a, b) {
            ka.Uy.gZ && ka.Uy.set(a, b);
            Xa.GV(a, b)
        },
        BMAP_API_VERSION: "2.0"
    });
    var Cg = Qa.prototype;
    U(Cg, {
        getBounds: Cg.ke,
        getCenter: Cg.Hb,
        getMapType: Cg.ya,
        getSize: Cg.wb,
        setSize: Cg.He,
        getViewport: Cg.mt,
        getZoom: Cg.la,
        centerAndZoom: Cg.xd,
        panTo: Cg.Hi,
        panBy: Cg.Og,
        setCenter: Cg.Af,
        setCurrentCity: Cg.rF,
        setMapType: Cg.Sg,
        setViewport: Cg.Tg,
        setZoom: Cg.Xc,
        highResolutionEnabled: Cg.Px,
        zoomTo: Cg.Vg,
        zoomIn: Cg.gG,
        zoomOut: Cg.hG,
        addHotspot: Cg.VB,
        removeHotspot: Cg.s_,
        clearHotspots: Cg.Vw,
        checkResize: Cg.JV,
        addControl: Cg.js,
        removeControl: Cg.PN,
        getContainer: Cg.Ta,
        addContextMenu: Cg.jm,
        removeContextMenu: Cg.Xp,
        addOverlay: Cg.Ra,
        removeOverlay: Cg.Lb,
        clearOverlays: Cg.tK,
        openInfoWindow: Cg.Vc,
        closeInfoWindow: Cg.Mc,
        pointToOverlayPixel: Cg.cf,
        overlayPixelToPoint: Cg.zN,
        getInfoWindow: Cg.wh,
        getOverlays: Cg.Cx,
        getPanes: function() {
            return {
                floatPane: this.ce.vD,
                markerMouseTarget: this.ce.KE,
                floatShadow: this.ce.kL,
                labelPane: this.ce.CE,
                markerPane: this.ce.YM,
                markerShadow: this.ce.ZM,
                mapPane: this.ce.Mt,
                vertexPane: this.ce.gP
            }
        },
        addTileLayer: Cg.Te,
        removeTileLayer: Cg.fg,
        pixelToPoint: Cg.cc,
        pointToPixel: Cg.vc,
        setFeatureStyle: Cg.v6,
        selectBaseElement: Cg.o6,
        setMapStyle: Cg.hu,
        enable3DBuilding: Cg.hp,
        disable3DBuilding: Cg.xW,
        getPanorama: Cg.ht,
        initIndoorLayer: Cg.VY,
        setNormalMapDisplay: Cg.Jy,
        setMapStyleV2: Cg.X_,
        setBMapCopyrightOffset: Cg.qF,
        getVectorContainer: Cg.yY
    });
    U(window, {
        BMAP_COORD_BD09: 5,
        BMAP_COORD_GCJ02: 3
    });
    var Dg = Ce.prototype;
    U(Dg, {
        getTileLayer: Dg.rY,
        getMinZoom: Dg.sf,
        getMaxZoom: Dg.Ye,
        getProjection: Dg.Aj,
        getTextColor: Dg.Om,
        getTips: Dg.kt
    });
    U(window, {
        BMAP_NORMAL_MAP: Ra,
        BMAP_PERSPECTIVE_MAP: Ua,
        BMAP_SATELLITE_MAP: eb,
        BMAP_HYBRID_MAP: Wa
    });
    var Eg = R.prototype;
    U(Eg, {
        lngLatToPoint: Eg.Lg,
        pointToLngLat: Eg.Kj
    });
    var Fg = nb.prototype;
    U(Fg, {
        lngLatToPoint: Fg.Lg,
        pointToLngLat: Fg.Kj
    });
    var Gg = lb.prototype;
    U(Gg, {
        equals: Gg.Vb,
        containsPoint: Gg.ws,
        containsBounds: Gg.VV,
        intersects: Gg.yt,
        extend: Gg.extend,
        getCenter: Gg.Hb,
        isEmpty: Gg.Gj,
        getSouthWest: Gg.Be,
        getNorthEast: Gg.tf,
        toSpan: Gg.TF
    });
    var Hg = jd.prototype;
    U(Hg, {
        isVisible: Hg.Uc,
        show: Hg.show,
        hide: Hg.aa
    });
    jd.getZIndex = jd.Rk;
    var Ig = mb.prototype;
    U(Ig, {
        openInfoWindow: Ig.Vc,
        closeInfoWindow: Ig.Mc,
        enableMassClear: Ig.wj,
        disableMassClear: Ig.zW,
        show: Ig.show,
        hide: Ig.aa,
        getMap: Ig.zx,
        addContextMenu: Ig.jm,
        removeContextMenu: Ig.Xp
    });
    var Jg = W.prototype;
    U(Jg, {
        setIcon: Jg.Xb,
        getIcon: Jg.sp,
        setPosition: Jg.va,
        getPosition: Jg.ma,
        setOffset: Jg.Rd,
        getOffset: Jg.yj,
        getLabel: Jg.ct,
        setLabel: Jg.Lj,
        setTitle: Jg.Hc,
        setTop: Jg.Li,
        enableDragging: Jg.jc,
        disableDragging: Jg.Hs,
        setZIndex: Jg.kq,
        getMap: Jg.zx,
        setAnimation: Jg.nn,
        setShadow: Jg.Ny,
        hide: Jg.aa,
        setRotation: Jg.Ly,
        getRotation: Jg.LL
    });
    U(window, {
        BMAP_ANIMATION_DROP: 1,
        BMAP_ANIMATION_BOUNCE: 2
    });
    var Kg = rd.prototype;
    U(Kg, {
        setStyle: Kg.Td,
        setStyles: Kg.Ki,
        setContent: Kg.Pc,
        setPosition: Kg.va,
        getPosition: Kg.ma,
        setOffset: Kg.Rd,
        getOffset: Kg.yj,
        setTitle: Kg.Hc,
        setZIndex: Kg.kq,
        getMap: Kg.zx,
        getContent: Kg.Kk
    });
    var Lg = nd.prototype;
    U(Lg, {
        setImageUrl: Lg.fO,
        setSize: Lg.He,
        setAnchor: Lg.wc,
        setImageOffset: Lg.gu,
        setImageSize: Lg.R_,
        setInfoWindowAnchor: Lg.U_,
        setPrintImageUrl: Lg.f0
    });
    var Mg = qd.prototype;
    U(Mg, {
        redraw: Mg.re,
        setTitle: Mg.Hc,
        setContent: Mg.Pc,
        getContent: Mg.Kk,
        getPosition: Mg.ma,
        enableMaximize: Mg.uh,
        disableMaximize: Mg.hx,
        isOpen: Mg.eb,
        setMaxContent: Mg.iu,
        maximize: Mg.gy,
        enableAutoPan: Mg.Ss
    });
    var Ng = ld.prototype;
    U(Ng, {
        getPath: Ng.Ze,
        setPath: Ng.Sd,
        setPositionAt: Ng.wn,
        getStrokeColor: Ng.oY,
        setStrokeWeight: Ng.jq,
        getStrokeWeight: Ng.PL,
        setStrokeOpacity: Ng.hq,
        getStrokeOpacity: Ng.pY,
        setFillOpacity: Ng.fu,
        getFillOpacity: Ng.KX,
        setStrokeStyle: Ng.iq,
        getStrokeStyle: Ng.OL,
        getFillColor: Ng.JX,
        getBounds: Ng.ke,
        enableEditing: Ng.ze,
        disableEditing: Ng.yW,
        getEditing: Ng.GX,
        getGeodesicPath: Ng.NX
    });
    var Og = Ed.prototype;
    U(Og, {
        setCenter: Og.Af,
        getCenter: Og.Hb,
        getRadius: Og.JL,
        setRadius: Og.Bf
    });
    var Pg = Cd.prototype;
    U(Pg, {
        getPath: Pg.Ze,
        setPath: Pg.Sd,
        setPositionAt: Pg.wn
    });
    var Qg = ob.prototype;
    U(Qg, {
        getPosition: Qg.ma,
        setPosition: Qg.va,
        getText: Qg.ZD,
        setText: Qg.lu
    });
    P.prototype.equals = P.prototype.Vb;
    Q.prototype.equals = Q.prototype.Vb;
    M.prototype.equals = M.prototype.Vb;
    U(window, {
        BMAP_ANCHOR_TOP_LEFT: Sc,
        BMAP_ANCHOR_TOP_RIGHT: Tc,
        BMAP_ANCHOR_BOTTOM_LEFT: Uc,
        BMAP_ANCHOR_BOTTOM_RIGHT: 3
    });
    var Rg = Rc.prototype;
    U(Rg, {
        setAnchor: Rg.wc,
        getAnchor: Rg.CD,
        setOffset: Rg.Rd,
        getOffset: Rg.yj,
        show: Rg.show,
        hide: Rg.aa,
        isVisible: Rg.Uc,
        toString: Rg.toString
    });
    var Sg = rb.prototype;
    U(Sg, {
        getType: Sg.Bp,
        setType: Sg.xn
    });
    U(window, {
        BMAP_NAVIGATION_CONTROL_LARGE: 0,
        BMAP_NAVIGATION_CONTROL_SMALL: 1,
        BMAP_NAVIGATION_CONTROL_PAN: 2,
        BMAP_NAVIGATION_CONTROL_ZOOM: 3
    });
    var Tg = tb.prototype;
    U(Tg, {
        changeView: Tg.ve,
        setSize: Tg.He,
        getSize: Tg.wb
    });
    var Ug = sb.prototype;
    U(Ug, {
        getUnit: Ug.xY,
        setUnit: Ug.BF
    });
    U(window, {
        BMAP_UNIT_METRIC: "metric",
        BMAP_UNIT_IMPERIAL: "us"
    });
    var Vg = Wc.prototype;
    U(Vg, {
        addCopyright: Vg.Iw,
        removeCopyright: Vg.dF,
        getCopyright: Vg.Fm,
        getCopyrightCollection: Vg.KD
    });
    U(window, {
        BMAP_MAPTYPE_CONTROL_HORIZONTAL: Yc,
        BMAP_MAPTYPE_CONTROL_DROPDOWN: 1,
        BMAP_MAPTYPE_CONTROL_MAP: 2
    });
    var Wg = Jd.prototype;
    U(Wg, {
        getMapType: Wg.ya,
        getCopyright: Wg.Fm,
        isTransparentPng: Wg.Gt
    });
    var Xg = cd.prototype;
    U(Xg, {
        addItem: Xg.ks,
        addSeparator: Xg.YB,
        removeSeparator: Xg.gF
    });
    var Yg = fd.prototype;
    U(Yg, {
        setText: Yg.lu
    });
    var Zg = Y.prototype;
    U(Zg, {
        getStatus: Zg.Mm,
        setSearchCompleteCallback: Zg.ku,
        getPageCapacity: Zg.uf,
        setPageCapacity: Zg.tn,
        setLocation: Zg.qn,
        disableFirstResultSelection: Zg.OC,
        enableFirstResultSelection: Zg.hD,
        gotoPage: Zg.Pm,
        searchNearby: Zg.dq,
        searchInBounds: Zg.mn,
        search: Zg.search
    });
    U(window, {
        BMAP_STATUS_SUCCESS: 0,
        BMAP_STATUS_CITY_LIST: 1,
        BMAP_STATUS_UNKNOWN_LOCATION: Pe,
        BMAP_STATUS_UNKNOWN_ROUTE: 3,
        BMAP_STATUS_INVALID_KEY: 4,
        BMAP_STATUS_INVALID_REQUEST: 5,
        BMAP_STATUS_PERMISSION_DENIED: Qe,
        BMAP_STATUS_SERVICE_UNAVAILABLE: 7,
        BMAP_STATUS_TIMEOUT: Re
    });
    U(window, {
        BMAP_POI_TYPE_NORMAL: 0,
        BMAP_POI_TYPE_BUSSTOP: 1,
        BMAP_POI_TYPE_BUSLINE: 2,
        BMAP_POI_TYPE_SUBSTOP: 3,
        BMAP_POI_TYPE_SUBLINE: 4
    });
    U(window, {
        BMAP_TRANSIT_POLICY_RECOMMEND: 0,
        BMAP_TRANSIT_POLICY_LEAST_TIME: 4,
        BMAP_TRANSIT_POLICY_LEAST_TRANSFER: 1,
        BMAP_TRANSIT_POLICY_LEAST_WALKING: 2,
        BMAP_TRANSIT_POLICY_AVOID_SUBWAYS: 3,
        BMAP_TRANSIT_POLICY_FIRST_SUBWAYS: 5,
        BMAP_LINE_TYPE_BUS: 0,
        BMAP_LINE_TYPE_SUBWAY: 1,
        BMAP_LINE_TYPE_FERRY: 2,
        BMAP_LINE_TYPE_TRAIN: 3,
        BMAP_LINE_TYPE_AIRPLANE: 4,
        BMAP_LINE_TYPE_COACH: 5
    });
    U(window, {
        BMAP_TRANSIT_TYPE_POLICY_TRAIN: 0,
        BMAP_TRANSIT_TYPE_POLICY_AIRPLANE: 1,
        BMAP_TRANSIT_TYPE_POLICY_COACH: 2
    });
    U(window, {
        BMAP_INTERCITY_POLICY_LEAST_TIME: 0,
        BMAP_INTERCITY_POLICY_EARLY_START: 1,
        BMAP_INTERCITY_POLICY_CHEAP_PRICE: 2
    });
    U(window, {
        BMAP_TRANSIT_TYPE_IN_CITY: 0,
        BMAP_TRANSIT_TYPE_CROSS_CITY: 1
    });
    U(window, {
        BMAP_TRANSIT_PLAN_TYPE_ROUTE: 0,
        BMAP_TRANSIT_PLAN_TYPE_LINE: 1
    });
    var $g = ff.prototype;
    U($g, {
        clearResults: $g.we
    });
    hf = gf.prototype;
    U(hf, {
        setPolicy: hf.vn,
        toString: hf.toString,
        setPageCapacity: hf.tn,
        setIntercityPolicy: hf.uF,
        setTransitTypePolicy: hf.zF
    });
    U(mf.prototype, {
        setPolicy: mf.vn,
        toString: mf.toString,
        setPageCapacity: mf.tn,
        setIntercityPolicy: mf.uF,
        setTransitTypePolicy: mf.zF
    });
    U(window, {
        BMAP_DRIVING_POLICY_DEFAULT: 0,
        BMAP_DRIVING_POLICY_AVOID_HIGHWAYS: 3,
        BMAP_DRIVING_POLICY_AVOID_CONGESTION: 5,
        BMAP_DRIVING_POLICY_FIRST_HIGHWAYS: 4
    });
    U(window, {
        BMAP_MODE_DRIVING: "driving",
        BMAP_MODE_TRANSIT: "transit",
        BMAP_MODE_WALKING: "walking",
        BMAP_MODE_NAVIGATION: "navigation"
    });
    var ah = rf.prototype;
    U(ah, {
        routeCall: ah.$N
    });
    U(window, {
        BMAP_HIGHLIGHT_STEP: 1,
        BMAP_HIGHLIGHT_ROUTE: 2
    });
    U(window, {
        BMAP_ROUTE_TYPE_DRIVING: Te,
        BMAP_ROUTE_TYPE_WALKING: Se,
        BMAP_ROUTE_TYPE_RIDING: Ue
    });
    U(window, {
        BMAP_ROUTE_STATUS_NORMAL: Ve,
        BMAP_ROUTE_STATUS_EMPTY: 1,
        BMAP_ROUTE_STATUS_ADDRESS: 2
    });
    var bh = kf.prototype;
    U(bh, {
        setPolicy: bh.vn
    });
    var ch = xf.prototype;
    U(ch, {
        show: ch.show,
        hide: ch.aa,
        setTypes: ch.AF,
        setLocation: ch.qn,
        search: ch.search,
        setInputValue: ch.Iy
    });
    U(vb.prototype, {});
    var dh = vf.prototype;
    U(dh, {
        get: dh.get
    });
    U($c.prototype, {});
    U(window, {
        BMAP_POINT_DENSITY_HIGH: 200,
        BMAP_POINT_DENSITY_MEDIUM: Td,
        BMAP_POINT_DENSITY_LOW: 50
    });
    U(window, {
        BMAP_POINT_SHAPE_STAR: 1,
        BMAP_POINT_SHAPE_WATERDROP: 2,
        BMAP_POINT_SHAPE_CIRCLE: td,
        BMAP_POINT_SHAPE_SQUARE: 4,
        BMAP_POINT_SHAPE_RHOMBUS: 5
    });
    U(window, {
        BMAP_POINT_SIZE_TINY: 1,
        BMAP_POINT_SIZE_SMALLER: 2,
        BMAP_POINT_SIZE_SMALL: 3,
        BMAP_POINT_SIZE_NORMAL: ud,
        BMAP_POINT_SIZE_BIG: 5,
        BMAP_POINT_SIZE_BIGGER: 6,
        BMAP_POINT_SIZE_HUGE: 7
    });
    U(window, {
        BMap_Symbol_SHAPE_CAMERA: 11,
        BMap_Symbol_SHAPE_WARNING: 12,
        BMap_Symbol_SHAPE_SMILE: 13,
        BMap_Symbol_SHAPE_CLOCK: 14,
        BMap_Symbol_SHAPE_POINT: 9,
        BMap_Symbol_SHAPE_PLANE: 10,
        BMap_Symbol_SHAPE_CIRCLE: 1,
        BMap_Symbol_SHAPE_RECTANGLE: 2,
        BMap_Symbol_SHAPE_RHOMBUS: 3,
        BMap_Symbol_SHAPE_STAR: 4,
        BMap_Symbol_SHAPE_BACKWARD_CLOSED_ARROW: 5,
        BMap_Symbol_SHAPE_FORWARD_CLOSED_ARROW: 6,
        BMap_Symbol_SHAPE_BACKWARD_OPEN_ARROW: 7,
        BMap_Symbol_SHAPE_FORWARD_OPEN_ARROW: 8
    });
    U(window, {
        BMAP_CONTEXT_MENU_ICON_ZOOMIN: dd,
        BMAP_CONTEXT_MENU_ICON_ZOOMOUT: ed
    });
    U(window, {
        BMAP_SYS_DRAWER: Pa,
        BMAP_SVG_DRAWER: 1,
        BMAP_VML_DRAWER: 2,
        BMAP_CANVAS_DRAWER: 3,
        BMAP_SVG_DRAWER_FIRST: 4
    });
    A.dV();
    A.az();
}
)()
