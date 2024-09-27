/**
 <!--************************************************************-->
 <!-- Designed  &  Developed by COLORGB    http://colorgb.com    -->
 <!-- giaphv@colorgb.com, hoangdv@colorgb.com, datnt@colorgb.com -->
 <!--************************************************************-->
 */
function setCookie(t,e,n){var i=new Date;i.setTime(i.getTime()+24*n*60*60*1e3);var o="expires="+i.toUTCString();document.cookie=t+"="+e+";"+o+";path=/"}function getCookie(t){for(var e=t+"=",n=decodeURIComponent(document.cookie).split(";"),i=0;i<n.length;i++){for(var o=n[i];" "==o.charAt(0);)o=o.substring(1);if(0==o.indexOf(e))return o.substring(e.length,o.length)}return""}
const loadScriptsTimer=setTimeout(loadScripts,4200),userInteractionEvents=["mouseover","keydown","touchstart","touchmove","wheel"];function triggerScriptLoader(){loadScripts(),clearTimeout(loadScriptsTimer),userInteractionEvents.forEach(function(t){window.removeEventListener(t,triggerScriptLoader,{passive:!0})})}function loadScripts(){document.querySelectorAll('script[data-type="lazy"]').forEach(function(t){t.setAttribute("src",t.getAttribute("data-src"))})}userInteractionEvents.forEach(function(t){window.addEventListener(t,triggerScriptLoader,{passive:!0})});
!function (t, e) {
    "use strict";
    "undefined" != typeof module && module.exports ? module.exports = e(require("jquery"), require("bootstrap")) : "function" == typeof define && define.amd ? define("bootstrap-dialog", ["jquery", "bootstrap"], function (t) {
        return e(t)
    }) : t.BootstrapDialog = e(t.jQuery)
}(this, function (t) {
    "use strict";
    var e = t.fn.modal.Constructor, n = function (t, n) {
        e.call(this, t, n)
    };
    n.getModalVersion = function () {
        var e = null;
        return e = "undefined" == typeof t.fn.modal.Constructor.VERSION ? "v3.1" : /3\.2\.\d+/.test(t.fn.modal.Constructor.VERSION) ? "v3.2" : /3\.3\.[1,2]/.test(t.fn.modal.Constructor.VERSION) ? "v3.3" : "v3.3.4"
    }, n.ORIGINAL_BODY_PADDING = parseInt(t("body").css("padding-right") || 0, 10), n.METHODS_TO_OVERRIDE = {}, n.METHODS_TO_OVERRIDE["v3.1"] = {}, n.METHODS_TO_OVERRIDE["v3.2"] = {
        hide: function (e) {
            if (e && e.preventDefault(), e = t.Event("hide.bs.modal"), this.$element.trigger(e), this.isShown && !e.isDefaultPrevented()) {
                this.isShown = !1;
                var n = this.getGlobalOpenedDialogs();
                0 === n.length && this.$body.removeClass("modal-open"), this.resetScrollbar(), this.escape(), t(document).off("focusin.bs.modal"), this.$element.removeClass("in").attr("aria-hidden", !0).off("click.dismiss.bs.modal"), t.support.transition && this.$element.hasClass("fade") ? this.$element.one("bsTransitionEnd", t.proxy(this.hideModal, this)).emulateTransitionEnd(300) : this.hideModal()
            }
        }
    }, n.METHODS_TO_OVERRIDE["v3.3"] = {
        setScrollbar: function () {
            var t = n.ORIGINAL_BODY_PADDING;
            this.bodyIsOverflowing && this.$body.css("padding-right", t + this.scrollbarWidth)
        }, resetScrollbar: function () {
            var t = this.getGlobalOpenedDialogs();
            0 === t.length && this.$body.css("padding-right", n.ORIGINAL_BODY_PADDING)
        }, hideModal: function () {
            this.$element.hide(), this.backdrop(t.proxy(function () {
                var t = this.getGlobalOpenedDialogs();
                0 === t.length && this.$body.removeClass("modal-open"), this.resetAdjustments(), this.resetScrollbar(), this.$element.trigger("hidden.bs.modal")
            }, this))
        }
    }, n.METHODS_TO_OVERRIDE["v3.3.4"] = t.extend({}, n.METHODS_TO_OVERRIDE["v3.3"]), n.prototype = {
        constructor: n, getGlobalOpenedDialogs: function () {
            var e = [];
            return t.each(o.dialogs, function (t, n) {
                n.isRealized() && n.isOpened() && e.push(n)
            }), e
        }
    }, n.prototype = t.extend(n.prototype, e.prototype, n.METHODS_TO_OVERRIDE[n.getModalVersion()]);
    var o = function (e) {
        this.defaultOptions = t.extend(!0, {id: o.newGuid(), buttons: [], data: {}, onshow: null, onshown: null, onhide: null, onhidden: null}, o.defaultOptions), this.indexedButtons = {}, this.registeredButtonHotkeys = {}, this.draggableData = {isMouseDown: !1, mouseOffset: {}}, this.realized = !1, this.opened = !1, this.initOptions(e), this.holdThisInstance()
    };
    return o.BootstrapDialogModal = n, o.NAMESPACE = "bootstrap-dialog", o.TYPE_DEFAULT = "type-default", o.TYPE_INFO = "type-info", o.TYPE_PRIMARY = "type-primary", o.TYPE_SUCCESS = "type-success", o.TYPE_WARNING = "type-warning", o.TYPE_DANGER = "type-danger", o.DEFAULT_TEXTS = {}, o.DEFAULT_TEXTS[o.TYPE_DEFAULT] = "Information", o.DEFAULT_TEXTS[o.TYPE_INFO] = "Information", o.DEFAULT_TEXTS[o.TYPE_PRIMARY] = "Information", o.DEFAULT_TEXTS[o.TYPE_SUCCESS] = "Success", o.DEFAULT_TEXTS[o.TYPE_WARNING] = "Warning", o.DEFAULT_TEXTS[o.TYPE_DANGER] = "Danger", o.DEFAULT_TEXTS.OK = "OK", o.DEFAULT_TEXTS.CANCEL = "Cancel", o.DEFAULT_TEXTS.CONFIRM = "Confirmation", o.SIZE_NORMAL = "size-normal", o.SIZE_SMALL = "size-small", o.SIZE_WIDE = "size-wide", o.SIZE_LARGE = "size-large", o.BUTTON_SIZES = {}, o.BUTTON_SIZES[o.SIZE_NORMAL] = "", o.BUTTON_SIZES[o.SIZE_SMALL] = "", o.BUTTON_SIZES[o.SIZE_WIDE] = "", o.BUTTON_SIZES[o.SIZE_LARGE] = "btn-lg", o.ICON_SPINNER = "glyphicon glyphicon-asterisk", o.BUTTONS_ORDER_CANCEL_OK = "btns-order-cancel-ok", o.BUTTONS_ORDER_OK_CANCEL = "btns-order-ok-cancel", o.defaultOptions = {
        type: o.TYPE_PRIMARY,
        size: o.SIZE_NORMAL,
        cssClass: "",
        title: null,
        message: null,
        nl2br: !0,
        closable: !0,
        closeByBackdrop: !0,
        closeByKeyboard: !0,
        closeIcon: "&#215;",
        spinicon: o.ICON_SPINNER,
        autodestroy: !0,
        draggable: !1,
        animate: !0,
        description: "",
        tabindex: -1,
        btnsOrder: o.BUTTONS_ORDER_CANCEL_OK
    }, o.configDefaultOptions = function (e) {
        o.defaultOptions = t.extend(!0, o.defaultOptions, e)
    }, o.dialogs = {}, o.openAll = function () {
        t.each(o.dialogs, function (t, e) {
            e.open()
        })
    }, o.closeAll = function () {
        t.each(o.dialogs, function (t, e) {
            e.close()
        })
    }, o.getDialog = function (t) {
        var e = null;
        return "undefined" != typeof o.dialogs[t] && (e = o.dialogs[t]), e
    }, o.setDialog = function (t) {
        return o.dialogs[t.getId()] = t, t
    }, o.addDialog = function (t) {
        return o.setDialog(t)
    }, o.moveFocus = function () {
        var e = null;
        t.each(o.dialogs, function (t, n) {
            n.isRealized() && n.isOpened() && (e = n)
        }), null !== e && e.getModal().focus()
    }, o.METHODS_TO_OVERRIDE = {}, o.METHODS_TO_OVERRIDE["v3.1"] = {
        handleModalBackdropEvent: function () {
            return this.getModal().on("click", {dialog: this}, function (t) {
                t.target === this && t.data.dialog.isClosable() && t.data.dialog.canCloseByBackdrop() && t.data.dialog.close()
            }), this
        }, updateZIndex: function () {
            if (this.isOpened()) {
                var e = 1040, n = 1050, i = 0;
                t.each(o.dialogs, function (t, e) {
                    e.isRealized() && e.isOpened() && i++
                });
                var s = this.getModal(), a = s.data("bs.modal").$backdrop;
                s.css("z-index", n + 20 * (i - 1)), a.css("z-index", e + 20 * (i - 1))
            }
            return this
        }, open: function () {
            return !this.isRealized() && this.realize(), this.getModal().modal("show"), this.updateZIndex(), this
        }
    }, o.METHODS_TO_OVERRIDE["v3.2"] = {handleModalBackdropEvent: o.METHODS_TO_OVERRIDE["v3.1"].handleModalBackdropEvent, updateZIndex: o.METHODS_TO_OVERRIDE["v3.1"].updateZIndex, open: o.METHODS_TO_OVERRIDE["v3.1"].open}, o.METHODS_TO_OVERRIDE["v3.3"] = {}, o.METHODS_TO_OVERRIDE["v3.3.4"] = t.extend({}, o.METHODS_TO_OVERRIDE["v3.1"]), o.prototype = {
        constructor: o, initOptions: function (e) {
            return this.options = t.extend(!0, this.defaultOptions, e), this
        }, holdThisInstance: function () {
            return o.addDialog(this), this
        }, initModalStuff: function () {
            return this.setModal(this.createModal()).setModalDialog(this.createModalDialog()).setModalContent(this.createModalContent()).setModalHeader(this.createModalHeader()).setModalBody(this.createModalBody()).setModalFooter(this.createModalFooter()), this.getModal().append(this.getModalDialog()), this.getModalDialog().append(this.getModalContent()), this.getModalContent().append(this.getModalHeader()).append(this.getModalBody()).append(this.getModalFooter()), this
        }, createModal: function () {
            var e = t('<div class="modal" role="dialog" aria-hidden="true"></div>');
            return e.prop("id", this.getId()), e.attr("aria-labelledby", this.getId() + "_title"), e
        }, getModal: function () {
            return this.$modal
        }, setModal: function (t) {
            return this.$modal = t, this
        }, createModalDialog: function () {
            return t('<div class="modal-dialog"></div>')
        }, getModalDialog: function () {
            return this.$modalDialog
        }, setModalDialog: function (t) {
            return this.$modalDialog = t, this
        }, createModalContent: function () {
            return t('<div class="modal-content"></div>')
        }, getModalContent: function () {
            return this.$modalContent
        }, setModalContent: function (t) {
            return this.$modalContent = t, this
        }, createModalHeader: function () {
            return t('<div class="modal-header"></div>')
        }, getModalHeader: function () {
            return this.$modalHeader
        }, setModalHeader: function (t) {
            return this.$modalHeader = t, this
        }, createModalBody: function () {
            return t('<div class="modal-body"></div>')
        }, getModalBody: function () {
            return this.$modalBody
        }, setModalBody: function (t) {
            return this.$modalBody = t, this
        }, createModalFooter: function () {
            return t('<div class="modal-footer"></div>')
        }, getModalFooter: function () {
            return this.$modalFooter
        }, setModalFooter: function (t) {
            return this.$modalFooter = t, this
        }, createDynamicContent: function (t) {
            var e = null;
            return e = "function" == typeof t ? t.call(t, this) : t, "string" == typeof e && (e = this.formatStringContent(e)), e
        }, formatStringContent: function (t) {
            return this.options.nl2br ? t.replace(/\r\n/g, "<br />").replace(/[\r\n]/g, "<br />") : t
        }, setData: function (t, e) {
            return this.options.data[t] = e, this
        }, getData: function (t) {
            return this.options.data[t]
        }, setId: function (t) {
            return this.options.id = t, this
        }, getId: function () {
            return this.options.id
        }, getType: function () {
            return this.options.type
        }, setType: function (t) {
            return this.options.type = t, this.updateType(), this
        }, updateType: function () {
            if (this.isRealized()) {
                var t = [o.TYPE_DEFAULT, o.TYPE_INFO, o.TYPE_PRIMARY, o.TYPE_SUCCESS, o.TYPE_WARNING, o.TYPE_DANGER];
                this.getModal().removeClass(t.join(" ")).addClass(this.getType())
            }
            return this
        }, getSize: function () {
            return this.options.size
        }, setSize: function (t) {
            return this.options.size = t, this.updateSize(), this
        }, updateSize: function () {
            if (this.isRealized()) {
                var e = this;
                this.getModal().removeClass(o.SIZE_NORMAL).removeClass(o.SIZE_SMALL).removeClass(o.SIZE_WIDE).removeClass(o.SIZE_LARGE), this.getModal().addClass(this.getSize()), this.getModalDialog().removeClass("modal-sm"), this.getSize() === o.SIZE_SMALL && this.getModalDialog().addClass("modal-sm"), this.getModalDialog().removeClass("modal-lg"), this.getSize() === o.SIZE_WIDE && this.getModalDialog().addClass("modal-lg"), t.each(this.options.buttons, function (n, o) {
                    var i = e.getButton(o.id), s = ["btn-lg", "btn-sm", "btn-xs"], a = !1;
                    if ("string" == typeof o.cssClass) {
                        var d = o.cssClass.split(" ");
                        t.each(d, function (e, n) {
                            -1 !== t.inArray(n, s) && (a = !0)
                        })
                    }
                    a || (i.removeClass(s.join(" ")), i.addClass(e.getButtonSize()))
                })
            }
            return this
        }, getCssClass: function () {
            return this.options.cssClass
        }, setCssClass: function (t) {
            return this.options.cssClass = t, this
        }, getTitle: function () {
            return this.options.title
        }, setTitle: function (t) {
            return this.options.title = t, this.updateTitle(), this
        }, updateTitle: function () {
            if (this.isRealized()) {
                var t = null !== this.getTitle() ? this.createDynamicContent(this.getTitle()) : this.getDefaultText();
                this.getModalHeader().find("." + this.getNamespace("title")).html("").append(t).prop("id", this.getId() + "_title")
            }
            return this
        }, getMessage: function () {
            return this.options.message
        }, setMessage: function (t) {
            return this.options.message = t, this.updateMessage(), this
        }, updateMessage: function () {
            if (this.isRealized()) {
                var t = this.createDynamicContent(this.getMessage());
                this.getModalBody().find("." + this.getNamespace("message")).html("").append(t)
            }
            return this
        }, isClosable: function () {
            return this.options.closable
        }, setClosable: function (t) {
            return this.options.closable = t, this.updateClosable(), this
        }, setCloseByBackdrop: function (t) {
            return this.options.closeByBackdrop = t, this
        }, canCloseByBackdrop: function () {
            return this.options.closeByBackdrop
        }, setCloseByKeyboard: function (t) {
            return this.options.closeByKeyboard = t, this
        }, canCloseByKeyboard: function () {
            return this.options.closeByKeyboard
        }, isAnimate: function () {
            return this.options.animate
        }, setAnimate: function (t) {
            return this.options.animate = t, this
        }, updateAnimate: function () {
            return this.isRealized() && this.getModal().toggleClass("fade", this.isAnimate()), this
        }, getSpinicon: function () {
            return this.options.spinicon
        }, setSpinicon: function (t) {
            return this.options.spinicon = t, this
        }, addButton: function (t) {
            return this.options.buttons.push(t), this
        }, addButtons: function (e) {
            var n = this;
            return t.each(e, function (t, e) {
                n.addButton(e)
            }), this
        }, getButtons: function () {
            return this.options.buttons
        }, setButtons: function (t) {
            return this.options.buttons = t, this.updateButtons(), this
        }, getButton: function (t) {
            return "undefined" != typeof this.indexedButtons[t] ? this.indexedButtons[t] : null
        }, getButtonSize: function () {
            return "undefined" != typeof o.BUTTON_SIZES[this.getSize()] ? o.BUTTON_SIZES[this.getSize()] : ""
        }, updateButtons: function () {
            return this.isRealized() && (0 === this.getButtons().length ? this.getModalFooter().hide() : this.getModalFooter().show().find("." + this.getNamespace("footer")).html("").append(this.createFooterButtons())), this
        }, isAutodestroy: function () {
            return this.options.autodestroy
        }, setAutodestroy: function (t) {
            this.options.autodestroy = t
        }, getDescription: function () {
            return this.options.description
        }, setDescription: function (t) {
            return this.options.description = t, this
        }, setTabindex: function (t) {
            return this.options.tabindex = t, this
        }, getTabindex: function () {
            return this.options.tabindex
        }, updateTabindex: function () {
            return this.isRealized() && this.getModal().attr("tabindex", this.getTabindex()), this
        }, getDefaultText: function () {
            return o.DEFAULT_TEXTS[this.getType()]
        }, getNamespace: function (t) {
            return o.NAMESPACE + "-" + t
        }, createHeaderContent: function () {
            var e = t("<div></div>");
            return e.addClass(this.getNamespace("header")), e.append(this.createTitleContent()), e.prepend(this.createCloseButton()), e
        }, createTitleContent: function () {
            var e = t("<div></div>");
            return e.addClass(this.getNamespace("title")), e
        }, createCloseButton: function () {
            var e = t("<div></div>");
            e.addClass(this.getNamespace("close-button"));
            var n = t('<button class="close" aria-label="close"></button>');
            return n.append(this.options.closeIcon), e.append(n), e.on("click", {dialog: this}, function (t) {
                t.data.dialog.close()
            }), e
        }, createBodyContent: function () {
            var e = t("<div></div>");
            return e.addClass(this.getNamespace("body")), e.append(this.createMessageContent()), e
        }, createMessageContent: function () {
            var e = t("<div></div>");
            return e.addClass(this.getNamespace("message")), e
        }, createFooterContent: function () {
            var e = t("<div></div>");
            return e.addClass(this.getNamespace("footer")), e
        }, createFooterButtons: function () {
            var e = this, n = t("<div></div>");
            return n.addClass(this.getNamespace("footer-buttons")), this.indexedButtons = {}, t.each(this.options.buttons, function (t, i) {
                i.id || (i.id = o.newGuid());
                var s = e.createButton(i);
                e.indexedButtons[i.id] = s, n.append(s)
            }), n
        }, createButton: function (e) {
            var n = t('<button class="btn"></button>');
            return n.prop("id", e.id), n.data("button", e), "undefined" != typeof e.icon && "" !== t.trim(e.icon) && n.append(this.createButtonIcon(e.icon)), "undefined" != typeof e.label && n.append(e.label), "undefined" != typeof e.title && n.attr("title", e.title), n.addClass("undefined" != typeof e.cssClass && "" !== t.trim(e.cssClass) ? e.cssClass : "btn-default"), "object" == typeof e.data && e.data.constructor === {}.constructor && t.each(e.data, function (t, e) {
                n.attr("data-" + t, e)
            }), "undefined" != typeof e.hotkey && (this.registeredButtonHotkeys[e.hotkey] = n), n.on("click", {dialog: this, $button: n, button: e}, function (t) {
                var e = t.data.dialog, n = t.data.$button, o = n.data("button");
                return o.autospin && n.toggleSpin(!0), "function" == typeof o.action ? o.action.call(n, e, t) : void 0
            }), this.enhanceButton(n), "undefined" != typeof e.enabled && n.toggleEnable(e.enabled), n
        }, enhanceButton: function (t) {
            return t.dialog = this, t.toggleEnable = function (t) {
                var e = this;
                return "undefined" != typeof t ? e.prop("disabled", !t).toggleClass("disabled", !t) : e.prop("disabled", !e.prop("disabled")), e
            }, t.enable = function () {
                var t = this;
                return t.toggleEnable(!0), t
            }, t.disable = function () {
                var t = this;
                return t.toggleEnable(!1), t
            }, t.toggleSpin = function (e) {
                var n = this, o = n.dialog, i = n.find("." + o.getNamespace("button-icon"));
                return "undefined" == typeof e && (e = !(t.find(".icon-spin").length > 0)), e ? (i.hide(), t.prepend(o.createButtonIcon(o.getSpinicon()).addClass("icon-spin"))) : (i.show(), t.find(".icon-spin").remove()), n
            }, t.spin = function () {
                var t = this;
                return t.toggleSpin(!0), t
            }, t.stopSpin = function () {
                var t = this;
                return t.toggleSpin(!1), t
            }, this
        }, createButtonIcon: function (e) {
            var n = t("<span></span>");
            return n.addClass(this.getNamespace("button-icon")).addClass(e), n
        }, enableButtons: function (e) {
            return t.each(this.indexedButtons, function (t, n) {
                n.toggleEnable(e)
            }), this
        }, updateClosable: function () {
            return this.isRealized() && this.getModalHeader().find("." + this.getNamespace("close-button")).toggle(this.isClosable()), this
        }, onShow: function (t) {
            return this.options.onshow = t, this
        }, onShown: function (t) {
            return this.options.onshown = t, this
        }, onHide: function (t) {
            return this.options.onhide = t, this
        }, onHidden: function (t) {
            return this.options.onhidden = t, this
        }, isRealized: function () {
            return this.realized
        }, setRealized: function (t) {
            return this.realized = t, this
        }, isOpened: function () {
            return this.opened
        }, setOpened: function (t) {
            return this.opened = t, this
        }, handleModalEvents: function () {
            return this.getModal().on("show.bs.modal", {dialog: this}, function (t) {
                var e = t.data.dialog;
                if (e.setOpened(!0), e.isModalEvent(t) && "function" == typeof e.options.onshow) {
                    var n = e.options.onshow(e);
                    return n === !1 && e.setOpened(!1), n
                }
            }), this.getModal().on("shown.bs.modal", {dialog: this}, function (t) {
                var e = t.data.dialog;
                e.isModalEvent(t) && "function" == typeof e.options.onshown && e.options.onshown(e)
            }), this.getModal().on("hide.bs.modal", {dialog: this}, function (t) {
                var e = t.data.dialog;
                if (e.setOpened(!1), e.isModalEvent(t) && "function" == typeof e.options.onhide) {
                    var n = e.options.onhide(e);
                    return n === !1 && e.setOpened(!0), n
                }
            }), this.getModal().on("hidden.bs.modal", {dialog: this}, function (e) {
                var n = e.data.dialog;
                n.isModalEvent(e) && "function" == typeof n.options.onhidden && n.options.onhidden(n), n.isAutodestroy() && (n.setRealized(!1), delete o.dialogs[n.getId()], t(this).remove()), o.moveFocus(), t(".modal").hasClass("in") && t("body").addClass("modal-open")
            }), this.handleModalBackdropEvent(), this.getModal().on("keyup", {dialog: this}, function (t) {
                27 === t.which && t.data.dialog.isClosable() && t.data.dialog.canCloseByKeyboard() && t.data.dialog.close()
            }), this.getModal().on("keyup", {dialog: this}, function (e) {
                var n = e.data.dialog;
                if ("undefined" != typeof n.registeredButtonHotkeys[e.which]) {
                    var o = t(n.registeredButtonHotkeys[e.which]);
                    !o.prop("disabled") && o.focus().trigger("click")
                }
            }), this
        }, handleModalBackdropEvent: function () {
            return this.getModal().on("click", {dialog: this}, function (e) {
                t(e.target).hasClass("modal-backdrop") && e.data.dialog.isClosable() && e.data.dialog.canCloseByBackdrop() && e.data.dialog.close()
            }), this
        }, isModalEvent: function (t) {
            return "undefined" != typeof t.namespace && "bs.modal" === t.namespace
        }, makeModalDraggable: function () {
            return this.options.draggable && (this.getModalHeader().addClass(this.getNamespace("draggable")).on("mousedown", {dialog: this}, function (t) {
                var e = t.data.dialog;
                e.draggableData.isMouseDown = !0;
                var n = e.getModalDialog().offset();
                e.draggableData.mouseOffset = {top: t.clientY - n.top, left: t.clientX - n.left}
            }), this.getModal().on("mouseup mouseleave", {dialog: this}, function (t) {
                t.data.dialog.draggableData.isMouseDown = !1
            }), t("body").on("mousemove", {dialog: this}, function (t) {
                var e = t.data.dialog;
                e.draggableData.isMouseDown && e.getModalDialog().offset({top: t.clientY - e.draggableData.mouseOffset.top, left: t.clientX - e.draggableData.mouseOffset.left})
            })), this
        }, realize: function () {
            return this.initModalStuff(), this.getModal().addClass(o.NAMESPACE).addClass(this.getCssClass()), this.updateSize(), this.getDescription() && this.getModal().attr("aria-describedby", this.getDescription()), this.getModalFooter().append(this.createFooterContent()), this.getModalHeader().append(this.createHeaderContent()), this.getModalBody().append(this.createBodyContent()), this.getModal().data("bs.modal", new n(this.getModal(), {backdrop: "static", keyboard: !1, show: !1})), this.makeModalDraggable(), this.handleModalEvents(), this.setRealized(!0), this.updateButtons(), this.updateType(), this.updateTitle(), this.updateMessage(), this.updateClosable(), this.updateAnimate(), this.updateSize(), this.updateTabindex(), this
        }, open: function () {
            return !this.isRealized() && this.realize(), this.getModal().modal("show"), this
        }, close: function () {
            return !this.isRealized() && this.realize(), this.getModal().modal("hide"), this
        }
    }, o.prototype = t.extend(o.prototype, o.METHODS_TO_OVERRIDE[n.getModalVersion()]), o.newGuid = function () {
        return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (t) {
            var e = 16 * Math.random() | 0, n = "x" === t ? e : 3 & e | 8;
            return n.toString(16)
        })
    }, o.show = function (t) {
        return new o(t).open()
    }, o.alert = function () {
        var e = {}, n = {type: o.TYPE_PRIMARY, title: null, message: null, closable: !1, draggable: !1, buttonLabel: o.DEFAULT_TEXTS.OK, buttonHotkey: null, callback: null};
        e = "object" == typeof arguments[0] && arguments[0].constructor === {}.constructor ? t.extend(!0, n, arguments[0]) : t.extend(!0, n, {message: arguments[0], callback: "undefined" != typeof arguments[1] ? arguments[1] : null});
        var i = new o(e);
        return i.setData("callback", e.callback), i.addButton({
            label: e.buttonLabel, hotkey: e.buttonHotkey, action: function (t) {
                return "function" == typeof t.getData("callback") && t.getData("callback").call(this, !0) === !1 ? !1 : (t.setData("btnClicked", !0), t.close())
            }
        }), i.onHide("function" == typeof i.options.onhide ? function (t) {
            var e = !0;
            return !t.getData("btnClicked") && t.isClosable() && "function" == typeof t.getData("callback") && (e = t.getData("callback")(!1)), e === !1 ? !1 : e = this.onhide(t)
        }.bind({onhide: i.options.onhide}) : function (t) {
            var e = !0;
            return !t.getData("btnClicked") && t.isClosable() && "function" == typeof t.getData("callback") && (e = t.getData("callback")(!1)), e
        }), i.open()
    }, o.confirm = function () {
        var e = {}, n = {type: o.TYPE_PRIMARY, title: null, message: null, closable: !1, draggable: !1, btnCancelLabel: o.DEFAULT_TEXTS.CANCEL, btnCancelClass: null, btnCancelHotkey: null, btnOKLabel: o.DEFAULT_TEXTS.OK, btnOKClass: null, btnOKHotkey: null, btnsOrder: o.defaultOptions.btnsOrder, callback: null};
        e = "object" == typeof arguments[0] && arguments[0].constructor === {}.constructor ? t.extend(!0, n, arguments[0]) : t.extend(!0, n, {message: arguments[0], callback: "undefined" != typeof arguments[1] ? arguments[1] : null}), null === e.btnOKClass && (e.btnOKClass = ["btn", e.type.split("-")[1]].join("-"));
        var i = new o(e);
        i.setData("callback", e.callback);
        var s = [{
            label: e.btnCancelLabel, cssClass: e.btnCancelClass, hotkey: e.btnCancelHotkey, action: function (t) {
                return "function" == typeof t.getData("callback") && t.getData("callback").call(this, !1) === !1 ? !1 : t.close()
            }
        }, {
            label: e.btnOKLabel, cssClass: e.btnOKClass, hotkey: e.btnOKHotkey, action: function (t) {
                return "function" == typeof t.getData("callback") && t.getData("callback").call(this, !0) === !1 ? !1 : t.close()
            }
        }];
        return e.btnsOrder === o.BUTTONS_ORDER_OK_CANCEL && s.reverse(), i.addButtons(s), i.open()
    }, o.warning = function (t, e) {
        return new o({type: o.TYPE_WARNING, message: t}).open()
    }, o.danger = function (t, e) {
        return new o({type: o.TYPE_DANGER, message: t}).open()
    }, o.success = function (t, e) {
        return new o({type: o.TYPE_SUCCESS, message: t}).open()
    }, o
});

var KrajeeDialog;
!function () {
    "use strict";
    var o, t;
    o = function (o, t) {
        try {
            return window[o](t)
        } catch (n) {
            return "confirm" === o ? !0 : null
        }
    }, t = function (o) {
        return o && 0 !== o.length ? o : {}
    }, KrajeeDialog = function (o, n, a) {
        var i = this;
        a = a || {}, i.useBsDialog = o, i.options = t(n), i.defaults = t(a)
    }, KrajeeDialog.prototype = {
        constructor: KrajeeDialog, usePlugin: function () {
            return this.useBsDialog && !!window.BootstrapDialog
        }, getOpts: function (o) {
            var t = this;
            return window.jQuery.extend({}, t.defaults[o], t.options)
        }, _dialog: function (t, n, a) {
            var i, e, l = this;
            if ("function" != typeof a) throw"Invalid callback passed for KrajeeDialog." + t;
            return l.usePlugin() ? "prompt" === t ? void l.bdPrompt(n, a) : (i = l.getOpts(t), i.message = n, void("confirm" === t ? (i.callback = a, window.BootstrapDialog.confirm(i)) : window.BootstrapDialog.show(i))) : (e = o(t, n), void(e && a(e)))
        }, alert: function (o) {
            var t = this, n = t.getOpts("alert");
            t.usePlugin() ? (n.message = o, window.BootstrapDialog.alert(n)) : window.alert(o)
        }, confirm: function (o, t) {
            this._dialog("confirm", o, t)
        }, prompt: function (o, t) {
            this._dialog("prompt", o, t)
        }, dialog: function (o, t) {
            this._dialog("dialog", o, t)
        }, bdPrompt: function (o, t) {
            var n, a, i, e, l, r = this, s = "", c = r.getOpts("prompt"), u = "";
            for (n = function (o) {
                var n, a = o.getModalBody();
                n = a.find("input")[0].value || "", t(n), o.close()
            }, a = function (o) {
                o.close(), t(null)
            }, i = [{id: "btn-cancel", label: "Cancel", cssClass: "btn btn-default", action: a}, {id: "btn-ok", label: "Ok", cssClass: "btn btn-primary", action: n}], e = c.buttons || [], "object" == typeof o ? (void 0 !== o.label && (s = '<label for="krajee-dialog-prompt" class="control-label">' + o.label + "</label>"), void 0 !== o.placeholder && (u = ' placeholder="' + o.placeholder + '"'), s += '<input type="text" name="krajee-dialog-prompt" class="form-control"' + u + ">") : s = o, c.message = s, l = 0; l < i.length; l++) e[l] = window.jQuery.extend(!0, {}, i[l], e[l]);
            c.buttons = e, window.BootstrapDialog.show(c)
        }
    }
}();

var krajeeDialog_63269c26 = {"id": "colorgb"};
var krajeeDialogDefaults_19466c26 = {"alert": {"type": "type-info", "title": "Thông tin", "buttonLabel": "<span class=\"glyphicon glyphicon-ok\"></span> Đồng ý"}, "confirm": {"type": "type-warning", "title": "Xác nhận", "btnOKClass": "btn-warning", "btnOKLabel": "<span class=\"glyphicon glyphicon-ok\"></span> Đồng ý", "btnCancelLabel": "<span class=\"glyphicon glyphicon-ban-circle\"></span> Hủy bỏ"}, "prompt": {"draggable": false, "title": "Thông tin", "buttons": [{"label": "Hủy bỏ", "icon": "glyphicon glyphicon-ban-circle"}, {"label": "Đồng ý", "icon": "glyphicon glyphicon-ok", "class": "btn-primary"}], "closable": false}, "dialog": {"draggable": true, "title": "Thông tin", "buttons": [{"label": "Hủy bỏ", "icon": "glyphicon glyphicon-ban-circle"}, {"label": "Đồng ý", "icon": "glyphicon glyphicon-ok", "class": "btn-primary"}]}};
var krajeeDialog = new KrajeeDialog(true, krajeeDialog_63269c26, krajeeDialogDefaults_19466c26);

Number.prototype.formatMoney = function (c, d, t) {
    var n = this,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

var colorgbActionDelete;
(function ($) {
    "use strict";
    colorgbActionDelete = function (opts) {
        $('.' + opts.css).off('click.krajee').on('click.krajee', function (e, options) {
            var $btn = $(this), $row = $btn.closest('tr'), $cell = $btn.closest('td'), lib = window[opts.lib];
            var msg = opts.msg ? opts.msg : $btn.attr('title');

            options = options || {};
            if (!options.proceed) {
                e.stopPropagation();
                e.preventDefault();
                lib.confirm(msg, function (result) {
                    if (!result) {
                        return;
                    }
                    if (opts.pjax) {

                        $.ajax({
                            method: 'POST',
                            url: $btn.attr('href'),
                            success: function (result) {
                                var json = $.parseJSON(result);
                                $btn.find('span').removeClass('icon-spinner2 spinner');
                                if (json.status === 1) {
                                    colorgbJGrowl('bg-green', json.message);
                                    $btn.removeClass('text-blue').addClass('text-success');
                                    $.pjax.reload({container: '#' + opts.pjaxContainer});

                                }
                                else {
                                    colorgbJGrowl('bg-danger', json.message);
                                    $btn.removeClass('text-blue').addClass('text-danger');
                                }
                            }
                        });
                    } else {
                        $btn.data('method', 'post').trigger('click', {proceed: true});
                    }
                });
            }
        });
    };
})(window.jQuery);

(function () {
    if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd) var e = jQuery.fn.select2.amd;
    return e.define("select2/i18n/vi", [], function () {
        return {
            inputTooLong: function (e) {
                var t = e.input.length - e.maximum, n = "Vui lòng nhập ít hơn " + t + " ký tự";
                return t != 1 && (n += "s"), n
            }, inputTooShort: function (e) {
                var t = e.minimum - e.input.length, n = "Vui lòng nhập nhiều hơn " + t + ' ký tự"';
                return n
            }, loadingMore: function () {
                return "Đang lấy thêm kết quả…"
            }, maximumSelected: function (e) {
                var t = "Chỉ có thể chọn được " + e.maximum + " lựa chọn";
                return t
            }, noResults: function () {
                return "Không tìm thấy kết quả"
            }, searching: function () {
                return "Đang tìm…"
            }
        }
    }), {define: e.define, require: e.require}
})();

var colorgbAction = function (opts) {
    $('.' + opts.css).on('click.krajee').on('click.krajee', function (e, options) {
        var $btn = $(this), lib = window[opts.lib];
        var msg = opts.msg ? opts.msg : $btn.attr('title');

        options = options || {};
        if (!options.proceed) {
            e.stopPropagation();
            e.preventDefault();
            lib.confirm(msg, function (result) {


                if (!result) {
                    return;
                }
                if (opts.pjax) {

                    var reload = $btn.data('reload');
                    if(reload == true) {
                        window.location = $btn.attr('href');
                    }

                    $btn.attr('disabled', 'disabled');
                    $btn.find('span:nth-child(1)').addClass('icon-spinner2 spinner');


                    $.ajax({
                        url: $btn.attr('href'),
                        success: function (result) {


                            var json = $.parseJSON(result);
                            $btn.find('span:nth-child(1)').removeClass('icon-spinner2 spinner');
                            if (json.status === 1) {
                                colorgbJGrowl('bg-green', json.message);
                                $btn.removeClass('text-blue').addClass('text-success');

                            }
                            else {
                                colorgbJGrowl('bg-danger', json.message);
                                $btn.removeClass('text-blue').addClass('text-danger');
                            }

                            if ($('#' + opts.pjaxContainer).length > 0) $.pjax.reload({container: '#' + opts.pjaxContainer});

                            var ctp = $('.colorgb-table-pjax');
                            $.ajax({
                                url: baseUrl + ctp.data('url'), success: function (result) {
                                    ctp.html(result);
                                    boltJs();
                                    colorgbJs();

                                }
                            });

                            getData();

                        }
                    });


                } else {
                    $btn.data('method', 'post').trigger('click', {proceed: true});
                }

            });
        }
    });
};


function colorgbGridReload() {

    if ($('#colorgb-pjax-pjax').length > 0) $.pjax.reload({container: '#colorgb-pjax-pjax'});
    $('.colorgb-pace-demo').removeClass('hide');
    $('.colorgb-content-wrapper').removeClass('show');

    var ctp = $('.colorgb-table-pjax');
    if(ctp.length > 0){
        $.ajax({
            url: baseUrl + ctp.data('url'), success: function (result) {
                ctp.html(result);
                boltJs();
                colorgbJs();
            }
        });
    }

    getData();
}

function addTableRowSettleFee() {
    var tr = $('#tableRowSettleFee tbody tr:last-child');
    var i = tr.length > 0 ? tr.data('i') + 1 : 0;
    var tempTr = $('<tr data-i="' + i + '"> <td> <div class="input-group"><input type="number" min="0" class="form-control" name="ContractType[settleFee][' + i + '][from_period_val]"><span class="input-group-addon">tháng</span> </div> </td> <td> <div class="input-group"><input type="number" min="0" class="form-control" name="ContractType[settleFee][' + i + '][to_period_val]"><span class="input-group-addon">tháng</span> </div> </td> <td> <div class="input-group"><input type="number" min="0" class="form-control" name="ContractType[settleFee][' + i + '][fee_rate]"><span class="input-group-addon">%</span> </div> </td> <td> <button type="button" class="btn btn-danger btn-remove-row"><i class="icon-minus3"></i></button> </td> </tr>').on('click', function () {
        $('.btn-remove-row').click(function () {
            $(this).closest('tr').remove();
        });
    });
    $("#tableRowSettleFee").append(tempTr);
}


function formatRepo(repo) {
    if (repo.loading) {
        return repo.name;
    }
    var img = repo.image ? '/data/' + repo.image : '/bolt/assets/images/placeholder.jpg'

    var markup = "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-repository__avatar'><img src='" + cdnUrl + img + "' style='width: 32px !important;' /></div>" +
        "<div class='select2-result-repository__meta'>" +
        "<div class='select2-result-repository__title'>" + repo.name + "</div>" +
        "<div class='select2-result-repository__description'>" + repo.mobile + " <br/> " + repo.email_addr + "</div>" +
        "</div>" +
        "</div>";

    return markup;
}


function colorgbJGrowl(bg, message) {
    $('body').find('.jGrowl').attr('class', '').attr('id', '').hide();
    $.jGrowl(message, {
        position: 'bottom-left',
        theme: bg,
        life: 10000,
        header: 'Thông báo'
    });
}

function modalIframe() {
    var pm = $('#colorgbIframeModal');
    var mi = pm.find('.modal-body iframe');
    mi.attr('src', '');
    if ($(window).width() > 768) {
        mi.attr({
            'src': $(this).data('bolt-src'),
            'height': $(window).height() - 120,
            'width': '100%'
        });




    } else {
        mi.attr({
            'src': $(this).data('bolt-src'),
            'height': $(window).height() - 100,
            'width': '100%'
        });
    }
}

$(document).on("click", ".btn-iframe", function(e) {

    e.stopPropagation();
    var pm = $('#colorgbIframeModal');
    var mi = pm.find('.modal-body iframe');
    mi.attr('src', '');
    if ($(window).width() > 768) {
        mi.attr({
            'src': $(this).data('bolt-src'),
            'height': $(window).height() - 120,
            'width': '100%'
        });




    } else {
        mi.attr({
            'src': $(this).data('bolt-src'),
            'height': $(window).height() - 100,
            'width': '100%'
        });
    }

});
function modalIframeRef(e) {
    e.preventDefault();
    var pm = $('#colorgbIframeModal');
    var mi = pm.find('.modal-body iframe');
    var href = $(this).attr('href');
    href = href.indexOf("?") != -1 ? href + '&layout=sub' : href + '?layout=sub';

    if ($(window).width() > 768) {
        mi.attr({
            'src': href,
            'height': $(window).height() - 120,
            'width': '100%'
        });

    } else {
        mi.attr({
            'src': href,
            'height': $(window).height() - 100,
            'width': '100%'
        });
    }

    pm.modal({backdrop: 'static'});
    pm.modal('show');

}

function colorgbFormatDate(date, format) {
    var dd = date.getDate();
    var d;
    var mm = date.getMonth() + 1;
    var yyyy = date.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    d = format === 'Ymd' ? yyyy + '' + mm + '' + dd : dd + '/' + mm + '/' + yyyy;
    return d;
}

function colorgbConvertDate(date) {
    return date.substring(0, 4) + '-' + date.substring(4, 6) + '-' + date.substring(6, 8);
}
// Switchery
var _componentSwitchery = function() {
    if (typeof Switchery == 'undefined') {
        console.warn('Warning - switchery.min.js is not loaded.');
        return;
    }

    // Initialize
    var elems = Array.prototype.slice.call(document.querySelectorAll('.form-control-switchery'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });
};
function boltJs() {

    $('[data-fancybox]').fancybox({
        closeClickOutside: false,
    })

    if ($('input[type="radio"]').length > 0) {
        $('input[type="radio"]').uniform({
            radioClass: 'choice'
        });
    }

    if ($('#contract-invest_value').length > 0) {
        setInterval(function () {
            var invest_unit_qty = ($('#contract-invest_value').val() / $('#contract-fund_unit_price').val()).toFixed(0);
            $('#contract-invest_unit_qty').val(invest_unit_qty);
        }, 100);
    }

    if ($('#contract-invest_value').length > 0) {
        setInterval(function () {
            var invest_unit_qty = ($('#contract-invest_value').val() / $('#contract-fund_unit_price').val()).toFixed(0);
            $('#contract-invest_unit_qty').val(invest_unit_qty);
        }, 100);
    }

    if ($('#contractnewform-invest_value').length > 0) {
        setInterval(function () {
            var invest_unit_qty = ($('#contractnewform-invest_value').val() / $('#contractnewform-fund_unit_price').val()).toFixed(0);
            $('#contractnewform-invest_unit_qty').val(invest_unit_qty);
        }, 100);
    }

    $('.settle-form-edit .form-control').each(function () {
        $(this).removeAttr('disabled');
    });


    if ($('#contractsettleform-end_date_real').length > 0) {

        setInterval(function () {
            var attr_1 = $('#attr_1 input').val(), attr_2, attr_3, attr_4, attr_5, attr_6, attr_7, attr_8, attr_9, attr_10, attr_11, attr_12, attr_13, attr_14, attr_15, attr_16, attr_17, tax_rate;
            var begin_date = $('#begin_date input').val();
            var end_date_real_disp = $('#contractsettleform-end_date_real-disp').val();
            var end_date_real = $('#contractsettleform-end_date_real').val();
            var end_date_est = $('#contractsettleform-end_date_est').val();

            $('#end_date_real span').html(end_date_real_disp);
            $('#end_date_real input').val(end_date_real);

            var sd = colorgbConvertDate(begin_date);
            var ed = colorgbConvertDate(end_date_real);
            var start = new Date(sd),
                end = new Date(ed),
                diff = new Date(end - start),
                contract_days = diff / 1000 / 60 / 60 / 24;

            var ed_est = colorgbConvertDate(end_date_est);
            var start_est = new Date(sd),
                end_est = new Date(ed_est),
                diff_est = new Date(end_est - start_est),
                contract_days_est = diff_est / 1000 / 60 / 60 / 24;


            $('#contract_days span').html(contract_days);
            $('#contract_days input').val(contract_days);

            var base_profit_rate = $('#contractsettleform-base_profit_rate').val();

            if (contract_days < contract_days_est) {
                attr_2 = (base_profit_rate * contract_days / 365);
            } else {
                attr_2 = base_profit_rate;
            }

            $('#attr_2 span').html(attr_2.toFixed(2) + '%');
            $('#attr_2 input').val(attr_2.toFixed(2));

            attr_3 = Math.ceil(attr_1 * attr_2 / 100);
            $('#attr_3 span').html(colorgbPrice(attr_3));
            $('#attr_3 input').val(attr_3);

            var invest_unit_qty = $('#contractsettleform-invest_unit_qty').val();
            var fund_unit_price = $('#fund_unit_price').val();
            attr_4 = invest_unit_qty * fund_unit_price;
            $('#attr_4 span').html(colorgbPrice(attr_4));
            $('#attr_4 input').val(attr_4);

            attr_5 = attr_4 - attr_1;
            if (attr_5 > 0) {
                $('#attr_5 span').addClass('text-green-600');
            } else {
                $('#attr_5 span').addClass('text-warning');
            }
            $('#attr_5 span').html(colorgbPrice(attr_5));
            $('#attr_5 input').val(attr_5);


            // Check rate
            if (attr_5 / attr_1 > attr_2 / 100) {

                if ($('#contractsettleform-contract_type_id').val() == 2) {
                    attr_6 = Math.ceil(attr_3 + (attr_5 - attr_3) / 2);
                }

                if ($('#contractsettleform-contract_type_id').val() == 1) {
                    attr_6 = Math.ceil(attr_3 + (attr_5 - attr_3) * 80 / 100);
                }


            } else if (attr_5 / attr_1 > 0 && attr_5 / attr_1 < attr_2 / 100) {
                attr_6 = attr_5;

            } else {
                attr_6 = attr_5;

            }
            $('#attr_6 span').html(colorgbPrice(attr_6));
            $('#attr_6 input').val(attr_6);

            attr_7 = 0;
            $('#attr_7 span').html(attr_7 + '%');
            $('#attr_7 input').val(attr_7);

            $('.settle-fee-row').each(function () {
                t = $(this);
                if (t.data('from') <= contract_days && contract_days <= t.data('to') && contract_days < contract_days_est) {
                    attr_7 = t.data('fee');
                    $('#attr_7 span').html(attr_7 + '%');
                    $('#attr_7 input').val(attr_7);
                }
            });

            attr_8 = attr_1 * $('#attr_7 input').val() / 100;
            $('#attr_8 span').html(colorgbPrice(attr_8));
            $('#attr_8 input').val(attr_8);

            // Check rate
            if (attr_5 / attr_1 > attr_2 / 100) {
                attr_9 = 0;

            } else if (attr_5 / attr_1 > 0 && attr_5 / attr_1 < attr_2 / 100) {
                attr_9 = 0;

            } else {
                attr_9 = 0;
            }
            $('#attr_9 span').html(colorgbPrice(attr_9));
            $('#attr_9 input').val(attr_9);

            attr_10 = attr_6 - attr_8 + attr_9;
            $('#attr_10 span').html(colorgbPrice(attr_10));
            $('#attr_10 input').val(attr_10);

            tax_rate = $('#tax_rate').val();
            attr_11 = (attr_10 * tax_rate / 100).toFixed(0);
            attr_11 = attr_11 > 0 ? attr_11 : 0;
            $('#attr_11 span').html(colorgbPrice(attr_11));
            $('#attr_11 input').val(attr_11);

            attr_12 = attr_10 - attr_11;
            $('#attr_12 span').html(colorgbPrice(attr_12));
            $('#attr_12 input').val(attr_12);

            attr_13 = parseInt(attr_1) + parseInt(attr_12);
            $('#attr_13 span').html(colorgbPrice(attr_13));
            $('#attr_13 input').val(attr_13);

            // Check rate
            if (attr_5 / attr_1 > attr_2 / 100) {

                if ($('#contractsettleform-contract_type_id').val() == 2) {
                    attr_14 = Math.ceil((attr_5 - attr_3) / 2);
                }
                if ($('#contractsettleform-contract_type_id').val() == 1) {
                    attr_14 = Math.ceil((attr_5 - attr_3) * 20 / 100);
                }


            } else if (attr_5 / attr_1 > 0 && attr_5 / attr_1 < attr_2 / 100) {
                attr_14 = 0;

            } else {
                attr_14 = 0;
            }
            $('#attr_14 span').html(colorgbPrice(attr_14));
            $('#attr_14 input').val(attr_14);

            attr_15 = attr_8;
            $('#attr_15 span').html(colorgbPrice(attr_15));
            $('#attr_15 input').val(attr_15);

            attr_16 = attr_9;
            $('#attr_16 span').html(colorgbPrice(attr_16));
            $('#attr_16 input').val(attr_16);

            attr_17 = parseInt(attr_14) + parseInt(attr_15) - attr_16;
            $('#attr_17 span').html(colorgbPrice(attr_17));
            $('#attr_17 input').val(attr_17);


        }, 100);

    }

    $('.input-group.date').each(function () {
        if ($(this).find('input').val() != '' && $(this).find('input[disabled]').length == 0) {
            $(this).find('.kv-date-remove').addClass('colorgb-show');
        }
    });

    if ($('#contract-contract_type_id').length > 0) {
        $('.field-contract-invest_value > div').append('<div class="append"></div>');
        setInterval(function () {
            var ct = $('#contract-contract_type_id option[value="' + $('#contract-contract_type_id').val() + '"]');
            var bpr = $('#contract-base_profit_rate');
            var pr = $('#contract-profit_rate');
            var pt = $('#contract-period_type');
            var pv = $('#contract-period_val');
            var iv = $('#contract-invest_value').val().replace(',', '');
            bpr.val(ct.data('base_profit_rate'));
            pr.val(ct.data('profit_rate'));
            pt.val(ct.data('period_type')).trigger('change.select2');
            pv.val(ct.data('period_val'));

            var min_invest_value = ct.data('min_invest_value');
            var max_invest_value = ct.data('max_invest_value')

            if (iv < min_invest_value) {
                $('.field-contract-invest_value').addClass('has-error');
                $('.field-contract-invest_value > div > .append').html('<div class="help-block help-block-error ">Giá trị đầu tư tối thiểu là ' + colorgbPrice(min_invest_value) + ' đ</div>');
            }

            if (iv > max_invest_value) {
                $('.field-contract-invest_value').addClass('has-error');
                $('.field-contract-invest_value > div > .append').html('<div class="help-block help-block-error ">Giá trị đầu tư tối đa là ' + colorgbPrice(max_invest_value) + ' đ</div>');

            }
        }, 100);
    }

    if ($('#contract-begin_date-disp').length > 0 && $('#contract-begin_date-disp[disabled]').length == 0) {
        setInterval(function () {

            var bd = $('#contract-begin_date').val();
            var bdd = colorgbConvertDate(bd);
            var d = new Date(bdd);
            d.setDate(d.getDate() - 1);
            var t = parseInt($('#contract-period_val').val());
            var period_type = $('#contract-period_type').val();
            var end_date_est_dk = $('#contract-end_date_est-disp-kvdate');
            var end_date_est = $('#contract-end_date_est');

            if (period_type == 1) {
                d.setFullYear(parseInt(d.getFullYear() + t));

            } else if (period_type == 2) {
                d.setMonth(parseInt(d.getMonth() + t * 3));

            } else if (period_type == 3) {
                d.setMonth(parseInt(d.getMonth() + t));

            }
            end_date_est.val(colorgbFormatDate(d, 'Ymd'));
            end_date_est_dk.kvDatepicker({"format": 'd/mm/yyyy'});
            end_date_est_dk.kvDatepicker("update", d);


        }, 100);
    }

    if ($('#contractrenewform-contract_type_id').length > 0) {
        setInterval(function () {

            var bd = $('#contractrenewform-end_date_est').val();
            var bdd = colorgbConvertDate(bd);
            var d = new Date(bdd);
            var t = parseInt($('#contractrenewform-period_val').val());
            var period_type = $('#contractrenewform-period_type').val();
            var new_end_date_d = $('#contractrenewform-new_end_date-disp');
            var new_end_date = $('#contractrenewform-new_end_date');

            if (period_type == 1) {
                d.setFullYear(parseInt(d.getFullYear() + t));

            } else if (period_type == 2) {
                d.setMonth(parseInt(d.getMonth() + t * 3));

            } else if (period_type == 3) {
                d.setMonth(parseInt(d.getMonth() + t));

            }
            new_end_date.val(colorgbFormatDate(d, 'Ymd'));
            new_end_date_d.val(colorgbFormatDate(d));


        }, 100);
    }

    if ($('#contractsettleform-contract_type_id').length > 0) {
        setInterval(function () {

            var bd = $('#contractsettleform-begin_date').val();
            var bdd = colorgbConvertDate(bd);
            var d = new Date(bdd);
            var t = parseInt($('#contractsettleform-period_val').val());
            var period_type = $('#contractsettleform-period_type').val();
            var end_date_est_dk = $('#contractsettleform-end_date_est-disp-kvdate');
            var end_date_est = $('#contractsettleform-end_date_est');

            if (period_type == 1) {
                d.setFullYear(parseInt(d.getFullYear() + t));

            } else if (period_type == 2) {
                d.setMonth(parseInt(d.getMonth() + t * 3));

            } else if (period_type == 3) {
                d.setMonth(parseInt(d.getMonth() + t));

            }
            end_date_est.val(colorgbFormatDate(d, 'Ymd'));

        }, 100);
    }

    $('.btn-tab .btn').click(function () {
        $('a[href="#justified-left-icon-tab1"]').trigger('click');
    });


    /*$('.btn-colorgb-jg').click(function (e) {
        e.preventDefault();
        var t = $(this);
        t.addClass('text-blue');
        t.find('span').addClass('icon-spinner2 spinner');
        $.ajax({
            url: t.attr('href'), success: function (response) {
                var json = $.parseJSON(response);
                t.find('span').removeClass('icon-spinner2 spinner');
                if (json.status === 1) {
                    colorgbJGrowl('bg-green', json.message);
                    t.removeClass('text-blue').addClass('text-success');

                }
                else {
                    colorgbJGrowl('bg-danger', json.message);
                    t.removeClass('text-blue').addClass('text-danger');
                }

            }
        });
    });*/

    $('.colorgb-customer-search').select2({
        ajax: {
            url: baseUrl + "/ajax/customer-search",
            dataType: 'json',
            data: function (params) {
                return {
                    q: params.term,
                    page: params.page
                };
            },
            processResults: function (data, params) {

                params.page = params.page || 1;

                return {
                    results: data.items,
                    pagination: {
                        more: (params.page * 20) < data.total_count
                    }
                };
            },
            cache: true
        },
        escapeMarkup: function (markup) {
            return markup;
        },
        minimumInputLength: 2,
        templateResult: formatRepo,
        templateSelection: function (item) {

            if (item.mobile) {
                return item.name;
            } else {
                return item.text;
            }


        }
    });


    $('.btn-add-settle-fee-row').on('click', function () {
        addTableRowSettleFee();
    });

    $('.btn-remove-row').click(function () {
        $(this).closest('tr').remove();
    });

    $('a[href="#"]').click(function (e) {
        e.preventDefault();
        return false;
    })

    if ($('.kv-grid-table .bolt-label.bg-danger-600').length > 0) {
        $('.skip-export.kv-align-center.kv-align-middle').hide();
    }

    if ($('#permissionform-permission_role').length > 0) {
        var s = $('#permissionform-permission_role');
        s.select2('destroy');
    }
    var cfsel = $('.colorgb-form select');
    cfsel.each(function () {
        var t = $(this);
        var scfsel = t.attr('id');
        if (t.length > 0 && scfsel && scfsel.indexOf('-status') !== -1) {
            $(this).find('option[value="9"]').remove();
        }
    });

    colorgbActionDelete({"css": "colorgb-pjax-action-del-show", "pjax": true, "pjaxContainer": "colorgb-pjax-pjax", "lib": "krajeeDialog", "msg": "Bạn có chắc là sẽ xóa mục này không?"});

    $('#colorgbIframeModal').on('hidden.bs.modal', function () {
        $('#colorgbIframeModal iframe').removeAttr('src');
        $('#colorgbIframeModal .close').removeAttr('onclick');

    });

    $('.kv-grid-table thead .form-control').attr('placeholder', 'Tìm kiếm...');
    $('.kv-grid-table thead a').attr('title', 'Nhấn vào đây để sắp xếp');

    var pathname = window.location.pathname;

    $('.navigation-main > li > a').each(function () {
        var pn = pathname.toLowerCase().replace('/index', '');
        if (pn.split('/').pop() === $(this).attr('href').split('/').pop()) {
            $(this).parent().addClass('active');
        }

    });

    $('.sidebar .navigation > li > a').each(function () {
        var pn = pathname.toLowerCase().replace('/index', '');
        if (pn.split('/').pop() === $(this).attr('href').split('/').pop()) {
            $(this).parent().addClass('active');
        }

    });


    if ($('input.price').length > 0) {
        $('input.price').number(true, 0);

    }

    //$('.btn-iframe').click(modalIframe);
    $('.btn-colorgb-popup,.skip-export > a[title="Xem"],.skip-export > a[title="Sửa"],.btn-toolbar a[title="Thêm mới"]').click(modalIframeRef);

    $(window).resize(function () {
        var pm = $('#colorgbIframeModal');
        var mi = pm.find('.modal-body iframe');

        if ($(window).width() > 768) {
            mi.attr({
                'src': mi.attr('href'),
                'height': $(window).height() - 120,
                'width': '100%'
            });

        } else {
            mi.attr({
                'src': mi.attr('href'),
                'height': $(window).height() - 100,
                'width': '100%'
            });
        }
    });

    //
    $('.sidebar-main-toggle').on('click', function (e) {
        e.preventDefault();
        $.pjax.reload({container: '#colorgb-pjax-pjax'});
    });

    //
    $('.btn-colorgb-cjg').click(function (e) {

        e.preventDefault();
        var $btn = $(this);
        $btn.attr('disabled', 'disabled');
        $btn.find('span').addClass('icon-spinner2 spinner');
        $.ajax({
            method: 'POST',
            url: $btn.attr('href'),
            success: function (result) {
                var json = $.parseJSON(result);
                $btn.find('span').removeClass('icon-spinner2 spinner');
                if (json.status === 1) {
                    colorgbJGrowl('bg-green', json.message);

                }
                else if (json.status === 2) {
                    colorgbJGrowl('bg-info', json.message);

                }
                else {
                    colorgbJGrowl('bg-danger', json.message);
                }
            }
        });

    });

    $('.company-profile .custom-block .button .btn-save').click(function () {

        var btn = $(this);
        btn.find('.fa').addClass('icon-spinner2 spinner');

        $(this).parent().parent().find('.form-control').each(function (index) {
            n = $(this).attr('name');
            v = $(this).val();

            $.ajax({
                url: baseUrl + '/ajax/company-profile',
                type: "post",
                dateType: "text",
                data: {
                    name: n,
                    value: v
                },
                success: function (response) {
                    btn.find('.fa').removeClass('icon-spinner2 spinner');
                    response = $.parseJSON(response);
                    if (index == 0) colorgbJGrowl('bg-green', 'Cập nhật dữ liệu ' + response.message);
                }, error: function (response) {
                    if (index == 0) colorgbJGrowl('bg-danger', 'Đã có lỗi xảy ra. Vui lòng thử lại sau');
                }
            });

        });

    });

    $('.list-inline-condensed .editable').editable({
        url: baseUrl + '/api/update-info',
        type: 'text',
        pk: 1,
        success: function (response, newValue) {
            response = $.parseJSON(response);
            t = $(this).data('original-title');
            n = $(this).data('name');
            if (response.status == 1) {
                colorgbJGrowl('bg-green', t + response.message);

            } else {
                colorgbJGrowl('bg-danger', t + response.message);
            }
        },
        error: function (response, newValue) {
            colorgbJGrowl('bg-danger', t + response.message);
        }
    });

    $('.company-profile .custom-block .css-checkbox[type="checkbox"]').click(function () {
        if ($(this).is(':checked')) {
            $(this).val(1);
        }
        else {
            $(this).val(0);
        }
        $('.checker .styled').prop("checked", $(this).is(':checked'));
    });

    colorgbAction({"css": "btn-colorgb-jg", "pjax": true, "pjaxContainer": "colorgb-pjax-pjax", "lib": "krajeeDialog"});
    colorgbAction({"css": "btn-colorgb-report-all", "pjax": true, "pjaxContainer": "colorgb-pjax-pjax", "lib": "krajeeDialog"});
    colorgbAction({"css": "btn-colorgb-report-pending", "pjax": true, "pjaxContainer": "colorgb-pjax-pjax", "lib": "krajeeDialog"});
    colorgbAction({"css": "btn-colorgb-warning", "pjax": true, "pjaxContainer": "colorgb-pjax-pjax", "lib": "krajeeDialog"});

    //
    $('.touchspin-set-value').TouchSpin({
        initval: 1,
        min: 1,
        max: 9999,
    });


    $('.btn-delete-product').click(function () {
        $(this).parent().parent().parent().remove();
        colorgbChangeOrderTotal();
    });

    $('select.colorgb-select2-img').select2({
        templateResult: addImg,
        templateSelection: addImg
    });

    $('.btn-discount').click(function () {
        var t = $(this);
        var c = $('.media.pid-' + t.data('pid') + ' .price-change');
        var i = $('input[name="ColorgbOrder[price][' + t.data('pid') + ']"]');

        i.val(t.data('price') - t.data('price') * t.data('discount') / 100);

        if (t.data('discount') != 0) {
            var price = String(t.data('price')).replace(/(.)(?=(\d{3})+$)/g, '$1,');
            c.removeClass('hide').text('Giá gốc: ' + price + ' ' + t.data('unit') + ' - Giảm giá ' + t.data('discount') + '%');

        } else {
            c.addClass('hide');
        }

        colorgbChangeOrderTotal();

    });

    $('input.qty').change(function () {
        colorgbChangeOrderTotal();
    });

    $('input.price').change(function () {
        var t = $(this);
        var c = $('.media.pid-' + t.data('pid') + ' .price-change');
        var price = colorgbPrice(t.data('price'));
        var v = t.val().replace(/,/g, '');
        var n;

        if (t.data('price') > v) {
            n = colorgbPrice(parseInt(t.data('price') - v));
            c.removeClass('hide').text('Giá gốc: ' + price + ' ' + t.data('unit') + ' - Giảm giá ' + n + ' ' + t.data('unit'));

        } else if (t.data('price') < v) {

            n = colorgbPrice(parseInt(v - t.data('price')));
            c.removeClass('hide').text('Giá gốc: ' + price + ' ' + t.data('unit') + ' - Tăng giá ' + n + ' ' + t.data('unit'));
        } else {
            c.addClass('hide');
        }

        colorgbChangeOrderTotal();

    });


    function addImg(opt) {
        if (!opt.id) {
            return opt.text;
        }
        var optimage = $(opt.element).data('img');
        if (!optimage) {
            return opt.text;
        } else {
            var $opt = $(
                '<span class="colorgb"><img src="' + optimage + '" class="colorgb-img" width="20" /> ' + $(opt.element).text() + '</span>'
            );
            return $opt;
        }
    };


}

var colorgbFu = function () {

    var fna = $('#fundunit-fund_net_asset');
    var fuq = $('#fundunit-fund_unit_qty');
    var fup = $('#fundunit-fund_unit_price');

    if (fna.length > 0 && fuq.length > 0 && fna.val() !== '' && fuq.val() !== '') {
        var fnav = fna.val();
        if (fnav.indexOf(',') !== -1) fnav.replace(',', '');
        var fuqv = fuq.val();
        if (fuqv.indexOf(',') !== -1) fuqv.replace(',', '');
        var fupv = Math.round(fnav / fuqv);
        fup.val(fupv);
    }

}

var colorgOrg = function () {

    var cot = $('#customer-org_type');
    var coi = $('#customer-org_info');
    var cg = $('#customer-gender');

    if (cot.val() == 2) {
        coi.removeAttr('disabled');
        cg.val(3).trigger('change.select2');

    }
    if (cot.val() == 1) {
        coi.attr('disabled', 'disabled');

    }

}

var colorgbJs = function () {



    colorgbAction({"css": "btn-colorgb-jgd", "pjax": true, "pjaxContainer": "colorgb-pjax-pjax", "lib": "krajeeDialog"});


    $('#colorgbIframeModal').on('shown.bs.modal', function () {
        setTimeout(function () {
            $('#colorgbIframeModal .close').attr('onclick', 'colorgbGridReload();');
        }, 5000);

        setTimeout(function () {
            $('.colorgb-pace-demo').addClass('hide');
            $('.colorgb-content-wrapper').addClass('show');
        }, 1000);
    });

    $('#fundunit-fund_net_asset,#fundunit-fund_unit_qty').change(colorgbFu);
    $('#customer-org_type').change(colorgOrg);
    colorgbFu();
    colorgOrg();

    $('.styled').uniform();

    var s = $('select.product');
    s.on('select2:select', function (e) {

        var sp = $(e.currentTarget).find('option:selected');
        var html = '<li class="media pid-' + sp.val() + '">\n' +
            '                    <div class="media-left">\n' +
            '                        <a href="javascript:void(0)"><img src="' + sp.data('img') + '" class="img-circle media-preview" alt=""></a>\n' +
            '                    </div>\n' +
            '                    <div class="media-body">\n' +
            '                        <div class="row">\n' +
            '                            <p class="text-left text-green-800 media-heading mb-10 col-sm-8">' + sp.text() + '</p>\n' +
            '                            <a class="text-right col-sm-4 text-warning btn-delete-product" data-pid="' + sp.val() + '" href="javascript:void(0)" title="Xóa bỏ sản phẩm"><i class="icon-trash"></i></a>\n' +
            '                        </div>\n' +
            '                        <div class="row">\n' +
            '                            <div class="col-sm-9">\n' +
            '                                <div class="input-group">\n' +
            '                                    <div class="input-group-btn">\n' +
            '                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">\n' +
            '                                            <i class="fa fa-cog"></i> Tùy chỉnh giá\n' +
            '                                        </button>\n' +
            '                                        <ul class="dropdown-menu pull-left">\n' +
            '                                            <li><a href="javascript:void(0)" class="btn-discount" data-price="' + sp.data('price') + '" data-unit="' + sp.data('unit') + '" data-pid="' + sp.val() + '" data-discount="1"><i class="icon-point-down"></i> Giảm giá 1%</a></li>\n' +
            '                                            <li><a href="javascript:void(0)" class="btn-discount" data-price="' + sp.data('price') + '" data-unit="' + sp.data('unit') + '" data-pid="' + sp.val() + '" data-discount="2"><i class="icon-point-down"></i> Giảm giá 2%</a></li>\n' +
            '                                            <li><a href="javascript:void(0)" class="btn-discount" data-price="' + sp.data('price') + '" data-unit="' + sp.data('unit') + '" data-pid="' + sp.val() + '" data-discount="3"><i class="icon-point-down"></i> Giảm giá 3%</a></li>\n' +
            '                                            <li><a href="javascript:void(0)" class="btn-discount" data-price="' + sp.data('price') + '" data-unit="' + sp.data('unit') + '" data-pid="' + sp.val() + '" data-discount="4"><i class="icon-point-down"></i> Giảm giá 4%</a></li>\n' +
            '                                            <li><a href="javascript:void(0)" class="btn-discount" data-price="' + sp.data('price') + '" data-unit="' + sp.data('unit') + '" data-pid="' + sp.val() + '" data-discount="5"><i class="icon-point-down"></i> Giảm giá 5%</a></li>\n' +
            '                                            <li class="divider"></li>\n' +
            '                                            <li><a href="javascript:void(0)" class="btn-discount" data-price="' + sp.data('price') + '" data-unit="' + sp.data('unit') + '" data-pid="' + sp.val() + '" data-discount="0"><i class="icon-sync"></i> Không giảm giá</a></li>\n' +
            '                                        </ul>\n' +
            '                                    </div>\n' +
            '                                    <input placeholder="Giá bán" type="text" data-price="' + sp.data('price') + '" data-unit="' + sp.data('unit') + '" data-pid="' + sp.val() + '"  value="' + sp.data('price') + '" name="ColorgbOrder[price][' + sp.val() + ']" class="price form-control">\n' +
            '                                    <span class="input-group-addon">' + sp.data('unit') + '</span>\n' +
            '                                </div>\n' +
            '                                <span class="help-block text-left text-warning price-change hide"></span>\n' +
            '                            </div>\n' +
            '                            <div class="col-sm-3">\n' +
            '                                <input placeholder="Số lượng" value="1" name="ColorgbOrder[qty][' + sp.val() + ']" class="touchspin-set-value qty form-control">\n' +
            '                                <span class="help-block text-right">(số lượng)</span>\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </li>';

        $('.product-order-list').append(html);
        s.select2('val', '');
        boltJs();
        colorgbChangeOrderTotal();
    });


}
var colorgbChangeOrderTotal = function () {
    var st = 0;
    $('.bolt-order-form .product-order-list > li').each(function () {
        var t = $(this);
        st += parseInt(t.find('input.price').val() * t.find('input.qty').val());
    });

    $('.bolt-order-form .subtotal span').text(colorgbPrice(st));

    var tx = st * $('.tax').data('tax') / 100;
    var tt = parseInt(st + tx);

    $('.bolt-order-form .tax-value span').text(colorgbPrice(tx));
    $('.bolt-order-form .total .text-semibold span').text(colorgbPrice(tt));
}

var colorgbPrice = function (price) {
    var str = String(price).replace(/(.)(?=(\d{3})+$)/g, '$1,');
    str = str.replace('-,', '-');
    return str;
}

$(document).on('pjax:complete', boltJs());
$(document).ready(boltJs);
$(document).ready(colorgbJs);


if("function"!=typeof ga){function ga(e,n,t,a,f,o){gtag("event",a,{event_category:t,event_label:f,value:o})};};
