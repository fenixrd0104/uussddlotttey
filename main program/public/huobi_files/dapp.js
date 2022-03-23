(window.webpackJsonp = window.webpackJsonp || []).push([
	[20], {
		26: function(e, t, a) {
			a("u+rH"), e.exports = a("nIPx")
		},
		J05j: function(e, t, a) {
			"use strict";
			var n = a("o0o1"),
				s = a.n(n),
				l = a("rePB"),
				o = a("1OyB"),
				c = a("vuIU"),
				r = a("md7G"),
				i = a("foSv"),
				p = a("Ji7U"),
				d = a("q1tI"),
				m = a("ozjc"),
				u = a("1heK"),
				b = a("0GYh"),
				f = a("LvDl"),
				g = a.n(f),
				v = d.createElement;

			function h(e, t) {
				var a = Object.keys(e);
				if(Object.getOwnPropertySymbols) {
					var n = Object.getOwnPropertySymbols(e);
					t && (n = n.filter((function(t) {
						return Object.getOwnPropertyDescriptor(e, t).enumerable
					}))), a.push.apply(a, n)
				}
				return a
			}

			function _(e) {
				for(var t = 1; t < arguments.length; t++) {
					var a = null != arguments[t] ? arguments[t] : {};
					t % 2 ? h(Object(a), !0).forEach((function(t) {
						Object(l.a)(e, t, a[t])
					})) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(a)) : h(Object(a)).forEach((function(t) {
						Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(a, t))
					}))
				}
				return e
			}
			t.a = function(e) {
				return function(t) {
					function a() {
						return Object(o.a)(this, a), Object(r.a)(this, Object(i.a)(a).apply(this, arguments))
					}
					return Object(p.a)(a, t), Object(c.a)(a, [{
						key: "componentDidCatch",
						value: function(e) {
							console.log(e)
						}
					}, {
						key: "componentDidMount",
						value: function() {
							Object(m.f)(this.props.locale), Object(u.d)("locale", this.props.locale, 7);
							var e = g.a.debounce((function(e) {
								var t = document.getElementById("mobile-download");
								t && (window.scrollY > 750 ? t.style.display = "inline-block" : t.style.display = "none")
							}), 50);
							window.addEventListener("scroll", e)
						}
					}, {
						key: "render",
						value: function() {
							return v(e, this.props)
						}
					}], [{
						key: "getInitialProps",
						value: function(t) {
							var a, n, l;
							return s.a.async((function(o) {
								for(;;) switch(o.prev = o.next) {
									case 0:
										if("function" !== typeof e.getInitialProps) {
											o.next = 4;
											break
										}
										return o.next = 3, s.a.awrap(e.getInitialProps(t));
									case 3:
										a = o.sent;
									case 4:
										return t.req || window.location.reload(), n = t.req ? t.req.headers["user-agent"] : navigator.userAgent, l = Object(u.c)(t), b.a[l.toLowerCase()] || (l = m.a), o.abrupt("return", _({}, a, {
											locale: l,
											userAgent: n
										}));
									case 9:
									case "end":
										return o.stop()
								}
							}))
						}
					}]), a
				}(d.Component)
			}
		},
		LFMV: function(e, t, a) {
			"use strict";
			var n = a("q1tI"),
				s = a.n(n),
				l = (a("WzLk"), s.a.createElement);
			t.a = function(e) {
				var t = e.title,
					a = e.subtitle,
					n = e.extra,
					s = e.bannerSrc;
				return l("section", {
					className: "common-banner"
				}, l("div", {
					className: "banner-inner"
				}, l("div", null, l("h2", {
					className: "title"
				}, t), l("p", {
					className: "subtitle"
				}, a), n), l("img", {
					className: "home-banner",
					src: s,
					alt: ""
				})))
			}
		},
		QIvD: function(e, t, a) {
			"use strict";
			var n = a("1OyB"),
				s = a("vuIU"),
				l = a("md7G"),
				o = a("foSv"),
				c = a("Ji7U"),
				r = a("q1tI"),
				i = a.n(r),
				p = (a("idpm"), i.a.createElement),
				d = function(e) {
					function t() {
						return Object(n.a)(this, t), Object(l.a)(this, Object(o.a)(t).apply(this, arguments))
					}
					return Object(c.a)(t, e), Object(s.a)(t, [{
						key: "render",
						value: function() {
							var e = this.props,
								t = e.className,
								a = e.children,
								n = e.title,
								s = e.subtitle,
								l = e.id,
								o = e.subtitleExtra;
							return p("section", {
								className: "section-wrap ".concat(t),
								id: l
							}, p("div", {
								className: "section-inner"
							}, n && p("p", {
								className: "title"
							}, n), s && p("p", {
								className: "subtitle"
							}, s), o, a))
						}
					}]), t
				}(r.Component);
			t.a = d
		},
		U4ru: function(e, t, a) {},
		WzLk: function(e, t, a) {},
		YuTi: function(e, t) {
			e.exports = function(e) {
				return e.webpackPolyfill || (e.deprecate = function() {}, e.paths = [], e.children || (e.children = []), Object.defineProperty(e, "loaded", {
					enumerable: !0,
					get: function() {
						return e.l
					}
				}), Object.defineProperty(e, "id", {
					enumerable: !0,
					get: function() {
						return e.i
					}
				}), e.webpackPolyfill = 1), e
			}
		},
		hfKI: function(e, t, a) {
			"use strict";
			a("w0MD");
			var n = a("aOJk"),
				s = a.n(n);

			function l() {
				return(l = Object.assign || function(e) {
					for(var t = 1; t < arguments.length; t++) {
						var a = arguments[t];
						for(var n in a) Object.prototype.hasOwnProperty.call(a, n) && (e[n] = a[n])
					}
					return e
				}).apply(this, arguments)
			}
			var o = a("q1tI"),
				c = a("D1Df"),
				r = a.n(c),
				i = a("ozjc"),
				p = (a("U4ru"), o.createElement);
			t.a = function(e) {
				var t = e.locale,
					a = e.userAgent,
					n = e.page,
					o = "https://itunes.apple.com/us/app/imtoken2/id1384798940",
					c = "https://token.im/download?index=0&locale=".concat(t),
					d = /android/i.test(a),
					m = /iPhone|iPad/i.test(a),
					u = /Mobile/i.test(a),
					b = /^zh$/i.test(t) || /zh-cn/i.test(t),
					f = p("a", l({
						className: "js_download",
						href: o
					}, {
						"data-source": "".concat(n, "-app-store")
					}), p("img", {
						src: "/images/download/app-store.svg",
						className: "app-store",
						alt: "app store"
					}));
				m && (f = null);
				var g = p("a", l({
					className: "js_download",
					href: "https://files.token.im/downloads/imToken-intl-v2.apk"
				}, {
					"data-source": "".concat(n, "-android-apk")
				}, {
					target: "_blank"
				}), p("img", {
					src: "/images/download/apk-".concat(b ? "zh" : "en", ".svg"),
					className: "app-store",
					alt: "downoad apk"
				}));
				return d && (f = g), p("div", {
					className: "flex-column platforms mini-download"
				}, p("div", {
					className: "flex-row"
				}, p("div", {
					className: "flex-column"
				}, f, !u && !1), p("div", {
					className: "flex-column"
				}, m ? p("a", l({
					className: "js_download",
					href: o
				}, {
					"data-source": "".concat(n, "-app-store")
				}), p("img", {
					src: "/images/download/app-store.svg",
					className: "app-store",
					alt: "app store"
				})) : p("a", l({
					className: "js_download",
					href: "https://play.google.com/store/apps/details?id=im.token.app"
				}, {
					"data-source": "".concat(n, "-android-play")
				}), p("img", {
					src: "/images/download/google-play.svg",
					className: "app-store",
					alt: "google play"
				}))), !u && p("div", {
					className: "flex-column"
				}, g), !u && p(s.a, {
					trigger: "hover",
					overlayClassName: "qrcode-popover",
					placement: "bottom",
					content: p("div", {
						className: "flex-column",
						style: {
							alignItems: "center"
						}
					}, p(r.a, {
						value: c,
						size: 180,
						style: {
							padding: 10
						}
					}), p("span", null, Object(i.b)("download_by_qrcode")))
				}, p("div", {
					className: "flex-column qrcode"
				}, p("img", {
					src: "/images/download/qr-code.svg"
				})))), "download" === n && b && (m || !u) && p("p", {
					className: "desc"
				}, p("span", null, "\u6ce8\uff1aApp Store \u4e0b\u8f7d\u9700\u8981\u9664\u4e2d\u56fd\u5927\u9646\u533a\u5916\u7684 ID \u8d26\u53f7"), p("a", {
					className: "more-detail link-hover",
					href: "https://imtoken.fans/t/topic/243"
				}, "\u4e86\u89e3\u8be6\u60c5")))
			}
		},
		idpm: function(e, t, a) {},
		lfrx: function(e, t, a) {
			"use strict";
			var n = a("q1tI"),
				s = a("hfKI"),
				l = a("ozjc"),
				o = (a("U4ru"), n.createElement);
			t.a = function(e) {
				var t = e.userAgent,
					a = e.page,
					n = e.locale;
				return /Mobile/i.test(t) ? null : o("div", {
					className: "download waist download-footer"
				}, o("div", {
					className: "content"
				}, o("div", {
					className: "flex-row"
				}, o("div", {
					className: "flex-row"
				}, o("img", {
					src: "/images/download/appLogo.svg",
					className: "app-logo"
				}), o("div", null, o("p", {
					className: "title"
				}, Object(l.b)("download")), o("p", {
					className: "subtitle"
				}, Object(l.b)("download_subtitle")))), o(s.a, {
					locale: n,
					userAgent: t,
					page: a
				})), o("img", {
					src: "/images/download/app-example.png",
					className: "example"
				})))
			}
		},
		nIPx: function(e, t, a) {
			(window.__NEXT_P = window.__NEXT_P || []).push(["/dapp", function() {
				return a("zeDl")
			}])
		},
		rePB: function(e, t, a) {
			"use strict";

			function n(e, t, a) {
				return t in e ? Object.defineProperty(e, t, {
					value: a,
					enumerable: !0,
					configurable: !0,
					writable: !0
				}) : e[t] = a, e
			}
			a.d(t, "a", (function() {
				return n
			}))
		},
		zeDl: function(e, t, a) {
			"use strict";
			a.r(t);
			var n = a("1OyB"),
				s = a("vuIU"),
				l = a("md7G"),
				o = a("foSv"),
				c = a("JX7q"),
				r = a("Ji7U"),
				i = a("rePB"),
				p = a("q1tI"),
				d = (a("eznW"), a("J05j")),
				m = a("0zJ3"),
				u = a("ozjc"),
				b = a("wzFB"),
				f = a("8Kt/"),
				g = a.n(f),
				v = a("LFMV"),
				h = a("QIvD"),
				_ = a("lfrx"),
				j = p.createElement,
				O = [{
					name: "Maker",
					link: "https://makerdao.com/"
				}, {
					name: "Compound",
					link: "https://compound.finance/"
				}, {
					name: "HyperDragons",
					link: "https://hyperdragons.alfakingdom.com/guide"
				}, {
					name: "HyperSnakes",
					link: "https://www.hypersnakes.io/t/t/d/index.html"
				}, {
					name: "LocalCryptos",
					link: "https://localcryptos.com/"
				}, {
					name: "CoinSwitch",
					link: "https://coinswitch.co/"
				}, {
					name: "Gods Unchained",
					link: "https://godsunchained.com/"
				}],
				w = function(e) {
					function t() {
						var e, a;
						Object(n.a)(this, t);
						for(var s = arguments.length, r = new Array(s), p = 0; p < s; p++) r[p] = arguments[p];
						return a = Object(l.a)(this, (e = Object(o.a)(t)).call.apply(e, [this].concat(r))), Object(i.a)(Object(c.a)(a), "renderDApps", (function() {
							if(/Mobile/i.test(a.props.userAgent)) {
								var e = [O.slice(0, 2), O.slice(2, 5), O.slice(5, 8)];
								return j("div", {
									className: "flex-row"
								}, e.map((function(e, t) {
									return j("div", {
										className: "dapp-row ".concat(t % 2 === 0 ? "old" : "even"),
										key: t
									}, e.map((function(e) {
										return j("a", {
											className: "flex-col",
											href: e.link,
											key: e.name
										}, j("img", {
											src: "/images/dapp/".concat(e.name, ".png")
										}), j("p", {
											className: "link-hover"
										}, e.name))
									})))
								})))
							}
							return j("div", {
								className: "flex-row"
							}, O.map((function(e, t) {
								return j("a", {
									className: "flex-col",
									href: e.link,
									key: e.name
								}, j("img", {
									src: "/images/dapp/".concat(e.name, ".png")
								}), j("p", {
									className: "link-hover"
								}, e.name))
							})))
						})), a
					}
					return Object(r.a)(t, e), Object(s.a)(t, [{
						key: "render",
						value: function() {
							var e = this.props.locale,
								t = /zh/i.test(e);
							return j("div", {
								className: "dapp-page"
							}, j(g.a, null, j("title", null, Object(u.b)("dapp_page_title")), j("meta", {
								name: "description",
								content: Object(u.b)("dapp_page_desc")
							}), j("meta", {
								name: "keywords",
								content: Object(u.b)("keywords")
							}), j("meta", {
								name: "generator",
								content: Object(u.b)("generator")
							})), j(m.a, {
								userAgent: this.props.userAgent,
								locale: this.props.locale
							}), j("div", null, j(v.a, {
								title: Object(u.b)("dapp_slogan_title"),
								subtitle: Object(u.b)("dapp_slogan_subtitle"),
								extra: j("p", {
									className: "learn-more"
								}, j("a", {
									href: "https://support.token.im/hc/".concat(t ? "zh-cn" : "en-us", "/articles/115000957933"),
									className: "more-detail link-hover"
								}, j("span", null, Object(u.b)("learn_more")))),
								bannerSrc: "/images/dapp/banner.png"
							}), j(h.a, {
								className: "example-section"
							}, j("div", {
								className: "flex-row"
							}, j("img", {
								src: "/images/dapp/example.png",
								className: "example"
							}), j("div", null, j("p", {
								className: "i-title"
							}, Object(u.b)("dapp_module_example_title")), j("p", {
								className: "i-subtitle"
							}, Object(u.b)("dapp_module_example_subtitle1")), j("p", {
								className: "i-subtitle"
							}, Object(u.b)("dapp_module_example_subtitle2"))))), j(h.a, {
								title: Object(u.b)("dapp_module_third_party_dapps_title"),
								subtitle: Object(u.b)("dapp_module_third_party_dapps_subtitle"),
								className: "co-section"
							}, this.renderDApps()), j(h.a, {
								title: Object(u.b)("contact_us"),
								className: "contact-section"
							}, j("div", {
								className: "flex-row"
							}, j("div", {
								className: "flex-column"
							}, j("img", {
								src: "/images/dapp/dapp-doc.svg"
							}), j("div", null, j("p", {
								className: "title"
							}, Object(u.b)("dapp_module_contact_sdk_title")), j("p", {
								className: "subtitle"
							}, Object(u.b)("dapp_module_contact_sdk_subtitle")), j("a", {
								className: "link-btn more-detail link-hover",
								href: "https://docs.token.im/"
							}, j("span", null, Object(u.b)("dapp_module_contact_sdk_btn"))))), j("div", {
								className: "flex-column"
							}, j("img", {
								src: "/images/dapp/submit-dapp.svg"
							}), j("div", null, j("p", {
								className: "title"
							}, Object(u.b)("dapp_module_contact_submit_title")), j("p", {
								className: "subtitle"
							}, Object(u.b)("dapp_module_contact_submit_subtitle")), j("a", {
								className: "link-btn more-detail link-hover",
								href: t ? "https://jinshuju.net/f/GVxHWK" : "https://forms.gle/oAGH6vPmLKFz8u8J7"
							}, j("span", null, Object(u.b)("dapp_module_contact_submit_btn"))))), j("div", {
								className: "flex-column"
							}, j("img", {
								src: "/images/dapp/bd.svg"
							}), j("div", null, j("p", {
								className: "title"
							}, Object(u.b)("dapp_module_contact_bd_title")), j("p", {
								className: "subtitle"
							}, Object(u.b)("dapp_module_contact_bd_subtitle")), j("a", {
								className: "link-btn more-detail link-hover",
								href: "mailto:bd@token.im"
							}, j("span", null, Object(u.b)("dapp_module_contact_bd_btn")))))))), j(_.a, {
								locale: this.props.locale,
								userAgent: this.props.userAgent,
								page: "dapp"
							}), j(b.a, {
								locale: e,
								userAgent: this.props.userAgent
							}))
						}
					}]), t
				}(p.Component);
			t.default = Object(d.a)(w)
		}
	},
	[
		[26, 1, 2, 5, 6, 0, 3, 4, 7]
	]
]);