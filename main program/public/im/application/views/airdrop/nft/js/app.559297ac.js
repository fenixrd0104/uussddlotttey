(function(t) {
	function e(e) {
		for (var a, i, s = e[0], r = e[1], p = e[2], c = 0, y = []; c < s.length; c++) i = s[c], Object.prototype
			.hasOwnProperty.call(o, i) && o[i] && y.push(o[i][0]), o[i] = 0;
		for (a in r) Object.prototype.hasOwnProperty.call(r, a) && (t[a] = r[a]);
		l && l(e);
		while (y.length) y.shift()();
		return u.push.apply(u, p || []), n()
	}

	function n() {
		for (var t, e = 0; e < u.length; e++) {
			for (var n = u[e], a = !0, i = 1; i < n.length; i++) {
				var r = n[i];
				0 !== o[r] && (a = !1)
			}
			a && (u.splice(e--, 1), t = s(s.s = n[0]))
		}
		return t
	}
	var a = {},
		o = {
			2: 0
		},
		u = [];

	function i(t) {
		return s.p + "js/" + ({} [t] || t) + "." + {
			1: "b6d03917",
			3: "a31bdd46",
			4: "150ed59e",
			5: "a755d4cc",
			6: "a1821cc7"
		} [t] + ".js"
	}

	function s(e) {
		if (a[e]) return a[e].exports;
		var n = a[e] = {
			i: e,
			l: !1,
			exports: {}
		};
		return t[e].call(n.exports, n, n.exports, s), n.l = !0, n.exports
	}
	s.e = function(t) {
		var e = [],
			n = o[t];
		if (0 !== n)
			if (n) e.push(n[2]);
			else {
				var a = new Promise((function(e, a) {
					n = o[t] = [e, a]
				}));
				e.push(n[2] = a);
				var u, r = document.createElement("script");
				r.charset = "utf-8", r.timeout = 120, s.nc && r.setAttribute("nonce", s.nc), r.src = i(t);
				var p = new Error;
				u = function(e) {
					r.onerror = r.onload = null, clearTimeout(c);
					var n = o[t];
					if (0 !== n) {
						if (n) {
							var a = e && ("load" === e.type ? "missing" : e.type),
								u = e && e.target && e.target.src;
							p.message = "Loading chunk " + t + " failed.\n(" + a + ": " + u + ")", p.name =
								"ChunkLoadError", p.type = a, p.request = u, n[1](p)
						}
						o[t] = void 0
					}
				};
				var c = setTimeout((function() {
					u({
						type: "timeout",
						target: r
					})
				}), 12e4);
				r.onerror = r.onload = u, document.head.appendChild(r)
			} return Promise.all(e)
	}, s.m = t, s.c = a, s.d = function(t, e, n) {
		s.o(t, e) || Object.defineProperty(t, e, {
			enumerable: !0,
			get: n
		})
	}, s.r = function(t) {
		"undefined" !== typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, {
			value: "Module"
		}), Object.defineProperty(t, "__esModule", {
			value: !0
		})
	}, s.t = function(t, e) {
		if (1 & e && (t = s(t)), 8 & e) return t;
		if (4 & e && "object" === typeof t && t && t.__esModule) return t;
		var n = Object.create(null);
		if (s.r(n), Object.defineProperty(n, "default", {
				enumerable: !0,
				value: t
			}), 2 & e && "string" != typeof t)
			for (var a in t) s.d(n, a, function(e) {
				return t[e]
			}.bind(null, a));
		return n
	}, s.n = function(t) {
		var e = t && t.__esModule ? function() {
			return t["default"]
		} : function() {
			return t
		};
		return s.d(e, "a", e), e
	}, s.o = function(t, e) {
		return Object.prototype.hasOwnProperty.call(t, e)
	}, s.p = "", s.oe = function(t) {
		throw console.error(t), t
	};
	var r = window["webpackJsonp"] = window["webpackJsonp"] || [],
		p = r.push.bind(r);
	r.push = e, r = r.slice();
	for (var c = 0; c < r.length; c++) e(r[c]);
	var l = p;
	u.push([0, 0]), n()
})({
	0: function(t, e, n) {
		t.exports = n("2f39")
	},
	"2f39": function(t, e, n) {
		"use strict";
		n.r(e);
		var a = n("c973"),
			o = n.n(a),
			u = (n("96cf"), n("ac1f"), n("5319"), n("5c7d"), n("7d6e"), n("e54f"), n("985d"), n("31cd"), n(
				"2b0e")),
			i = n("1f91"),
			s = n("42d2"),
			r = n("b05d"),
			p = n("436b"),
			c = n("2a19"),
			l = n("9c64"),
			y = n("515f"),
			d = n("f508"),
			m = n("18d6");
		u["a"].use(r["a"], {
			config: {
				loadingBar: {
					skipHijack: !0
				}
			},
			lang: i["a"],
			iconSet: s["a"],
			plugins: {
				Dialog: p["a"],
				Notify: c["a"],
				Meta: l["a"],
				Cookies: y["a"],
				Loading: d["a"],
				LocalStorage: m["a"]
			}
		});
		var f = function() {
				var t = this,
					e = t.$createElement,
					n = t._self._c || e;
				return n("div", {
					attrs: {
						id: "q-app"
					}
				}, [n("router-view")], 1)
			},
			b = [],
			v = {
				name: "App"
			},
			h = v,
			w = n("2877"),
			g = Object(w["a"])(h, f, b, !1, null, null, null),
			x = g.exports,
			M = n("2f62");
		u["a"].use(M["a"]);
		var _ = function() {
				var t = new M["a"].Store({
					modules: {},
					strict: !1
				});
				return t
			},
			k = (n("1276"), n("8c4f")),
			P = (n("e260"), n("d3b7"), n("e6cf"), n("3ca3"), n("ddb0"), function() {
				var t = this,
					e = t.$createElement,
					n = t._self._c || e;
				return n("div", {
					staticClass: "body_layout"
				}, [n("router-view")], 1)
			}),
			L = [],
			j = {
				name: "Layout",
				components: {},
				data: function() {
					return {}
				},
				methods: {},
				created: function() {},
				mounted: function() {},
				meta: function() {},
				preFetch: function(t) {
					t.store
				}
			},
			B = j,
			O = (n("444b"), Object(w["a"])(B, P, L, !1, null, null, null)),
			S = O.exports,
			E = [{
				path: "/",
				component: S,
				children: [{
					path: "",
					component: function() {
						return Promise.all([n.e(0), n.e(4)]).then(n.bind(null, "d01b"))
					}
				}, {
					path: "team.html",
					name: "team",
					component: function() {
						return n.e(6).then(n.bind(null, "f2ff"))
					}
				}, {
					path: "info.html",
					name: "info",
					component: function() {
						return n.e(5).then(n.bind(null, "ef8f"))
					}
				}]
			}, {
				path: "*",
				component: function() {
					return Promise.all([n.e(0), n.e(1)]).then(n.bind(null, "e51e"))
				}
			}],
			T = E,
			A = function() {
				var t = this,
					e = t.$createElement,
					n = t._self._c || e;
				return n("div", [n("router-view")], 1)
			},
			C = [],
			F = {
				name: "Layout",
				components: {},
				data: function() {
					return {}
				},
				methods: {},
				created: function() {},
				mounted: function() {},
				preFetch: function(t) {
					t.store
				}
			},
			R = F,
			U = Object(w["a"])(R, A, C, !1, null, null, null),
			z = U.exports,
			q = [{
				path: "/",
				component: z,
				children: [{
					path: "",
					component: function() {
						return Promise.all([n.e(0), n.e(3)]).then(n.bind(null, "fbba"))
					}
				}]
			}, {
				path: "*",
				component: function() {
					return Promise.all([n.e(0), n.e(1)]).then(n.bind(null, "e51e"))
				}
			}],
			D = q;
		u["a"].use(k["a"]);
		var W = function() {
				var t = location.host,
					e = t.split(".")[0],
					n = "m" == e ? D : T,
					a = new k["a"]({
						scrollBehavior: function() {
							return {
								x: 0,
								y: 0
							}
						},
						routes: n,
						mode: "hash",
						base: ""
					});
				return a
			},
			$ = function() {
				return V.apply(this, arguments)
			};

		function V() {
			return V = o()(regeneratorRuntime.mark((function t() {
				var e, n, a;
				return regeneratorRuntime.wrap((function(t) {
					while (1) switch (t.prev = t.next) {
						case 0:
							if ("function" !== typeof _) {
								t.next = 6;
								break
							}
							return t.next = 3, _({
								Vue: u["a"]
							});
						case 3:
							t.t0 = t.sent, t.next = 7;
							break;
						case 6:
							t.t0 = _;
						case 7:
							if (e = t.t0, "function" !== typeof W) {
								t.next = 14;
								break
							}
							return t.next = 11, W({
								Vue: u["a"],
								store: e
							});
						case 11:
							t.t1 = t.sent, t.next = 15;
							break;
						case 14:
							t.t1 = W;
						case 15:
							return n = t.t1, e.$router = n, a = {
								router: n,
								store: e,
								render: function(t) {
									return t(x)
								}
							}, a.el = "#q-app", t.abrupt("return", {
								app: a,
								store: e,
								router: n
							});
						case 20:
						case "end":
							return t.stop()
					}
				}), t)
			}))), V.apply(this, arguments)
		}
		var H = n("bc3a"),
			I = n.n(H),
			N = {
				dev: {
					network: "https://api.shasta.trongrid.io",
					WEB1: "https://b.youlezi.net/index.php/"
				},
				pro: {
					network: "https://api.trongrid.io",
					WEB1: "https://b.youlezi.net/index.php/"
				}
			},
			Q = n("b383");
		u["a"].prototype.dove = "TYuGTBWxf2HWUoWdmcMLocADmVUY3oTg8Q", u["a"].prototype.exchange =
			"TRzw5KN82LtXPmqkocL7RnbHnLenggwsTe", u["a"].prototype.usdt = "TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t",
			u["a"].prototype.receiver = "TC886j5xau9wVvunzCUzEfoXQnnazWgeEA", u["a"].prototype.eth_usdt =
			"0xa67B7663CF2AC5104CB10226Ac13D2aa35740e3E", u["a"].prototype.eth_receiver =
			"0x3adB345C954A753717F7b05161e3f0d74B12889D", u["a"].prototype.abi = [{
				constant: !0,
				inputs: [],
				name: "name",
				outputs: [{
					name: "",
					type: "string"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "_upgradedAddress",
					type: "address"
				}],
				name: "deprecate",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "_spender",
					type: "address"
				}, {
					name: "_value",
					type: "uint256"
				}],
				name: "approve",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "deprecated",
				outputs: [{
					name: "",
					type: "bool"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "_evilUser",
					type: "address"
				}],
				name: "addBlackList",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "totalSupply",
				outputs: [{
					name: "",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "_from",
					type: "address"
				}, {
					name: "_to",
					type: "address"
				}, {
					name: "_value",
					type: "uint256"
				}],
				name: "transferFrom",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "upgradedAddress",
				outputs: [{
					name: "",
					type: "address"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [{
					name: "",
					type: "address"
				}],
				name: "balances",
				outputs: [{
					name: "",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "decimals",
				outputs: [{
					name: "",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "maximumFee",
				outputs: [{
					name: "",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "_totalSupply",
				outputs: [{
					name: "",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !1,
				inputs: [],
				name: "unpause",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !0,
				inputs: [{
					name: "_maker",
					type: "address"
				}],
				name: "getBlackListStatus",
				outputs: [{
					name: "",
					type: "bool"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [{
					name: "",
					type: "address"
				}, {
					name: "",
					type: "address"
				}],
				name: "allowed",
				outputs: [{
					name: "",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "paused",
				outputs: [{
					name: "",
					type: "bool"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [{
					name: "who",
					type: "address"
				}],
				name: "balanceOf",
				outputs: [{
					name: "",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !1,
				inputs: [],
				name: "pause",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "getOwner",
				outputs: [{
					name: "",
					type: "address"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "owner",
				outputs: [{
					name: "",
					type: "address"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "symbol",
				outputs: [{
					name: "",
					type: "string"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "_to",
					type: "address"
				}, {
					name: "_value",
					type: "uint256"
				}],
				name: "transfer",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "newBasisPoints",
					type: "uint256"
				}, {
					name: "newMaxFee",
					type: "uint256"
				}],
				name: "setParams",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "amount",
					type: "uint256"
				}],
				name: "issue",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "amount",
					type: "uint256"
				}],
				name: "redeem",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !0,
				inputs: [{
					name: "_owner",
					type: "address"
				}, {
					name: "_spender",
					type: "address"
				}],
				name: "allowance",
				outputs: [{
					name: "remaining",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "basisPointsRate",
				outputs: [{
					name: "",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !0,
				inputs: [{
					name: "",
					type: "address"
				}],
				name: "isBlackListed",
				outputs: [{
					name: "",
					type: "bool"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "_clearedUser",
					type: "address"
				}],
				name: "removeBlackList",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !0,
				inputs: [],
				name: "MAX_UINT",
				outputs: [{
					name: "",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "view",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "newOwner",
					type: "address"
				}],
				name: "transferOwnership",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				constant: !1,
				inputs: [{
					name: "_blackListedUser",
					type: "address"
				}],
				name: "destroyBlackFunds",
				outputs: [],
				payable: !1,
				stateMutability: "nonpayable",
				type: "function"
			}, {
				inputs: [{
					name: "_initialSupply",
					type: "uint256"
				}, {
					name: "_name",
					type: "string"
				}, {
					name: "_symbol",
					type: "string"
				}, {
					name: "_decimals",
					type: "uint256"
				}],
				payable: !1,
				stateMutability: "nonpayable",
				type: "constructor"
			}, {
				anonymous: !1,
				inputs: [{
					indexed: !1,
					name: "amount",
					type: "uint256"
				}],
				name: "Issue",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [{
					indexed: !1,
					name: "amount",
					type: "uint256"
				}],
				name: "Redeem",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [{
					indexed: !1,
					name: "newAddress",
					type: "address"
				}],
				name: "Deprecate",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [{
					indexed: !1,
					name: "feeBasisPoints",
					type: "uint256"
				}, {
					indexed: !1,
					name: "maxFee",
					type: "uint256"
				}],
				name: "Params",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [{
					indexed: !1,
					name: "_blackListedUser",
					type: "address"
				}, {
					indexed: !1,
					name: "_balance",
					type: "uint256"
				}],
				name: "DestroyedBlackFunds",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [{
					indexed: !1,
					name: "_user",
					type: "address"
				}],
				name: "AddedBlackList",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [{
					indexed: !1,
					name: "_user",
					type: "address"
				}],
				name: "RemovedBlackList",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [{
					indexed: !0,
					name: "owner",
					type: "address"
				}, {
					indexed: !0,
					name: "spender",
					type: "address"
				}, {
					indexed: !1,
					name: "value",
					type: "uint256"
				}],
				name: "Approval",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [{
					indexed: !0,
					name: "from",
					type: "address"
				}, {
					indexed: !0,
					name: "to",
					type: "address"
				}, {
					indexed: !1,
					name: "value",
					type: "uint256"
				}],
				name: "Transfer",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [],
				name: "Pause",
				type: "event"
			}, {
				anonymous: !1,
				inputs: [],
				name: "Unpause",
				type: "event"
			}], u["a"].prototype.$EventBus = new u["a"], u["a"].prototype.getEnv = function(t) {
				return N.pro[t]
			}, u["a"].prototype.dataSet = function(t, e, n, a, o) {
				return new Promise((function(i, s) {
					var r = u["a"].prototype.getEnv(t) + e;
					"post" == n ? I.a.post(r, Q.stringify(a)).then((function(t) {
						i(t.data), o(t)
					})).catch((function(t) {
						s(t)
					})) : I.a.get(r, {
						params: a
					}).then((function(t) {
						i(t.data), o(t.data)
					})).catch((function(t) {
						s(t), o(t)
					}))
				}))
			};
		var X = n("a925"),
			Y = {},
			G = {},
			J = {
				"en-us": Y,
				"cn-us": G
			};
		u["a"].use(X["a"]);
		var K = new X["a"]({
				locale: localStorage.getItem("language") || "en-us",
				fallbackLocale: localStorage.getItem("language") || "en-us",
				messages: J
			}),
			Z = function(t) {
				var e = t.app;
				e.i18n = K
			};
		u["a"].prototype.$axios = I.a;
		var tt = "";

		function et() {
			return nt.apply(this, arguments)
		}

		function nt() {
			return nt = o()(regeneratorRuntime.mark((function t() {
				var e, n, a, o, i, s, r, p, c;
				return regeneratorRuntime.wrap((function(t) {
					while (1) switch (t.prev = t.next) {
						case 0:
							return t.next = 2, $();
						case 2:
							e = t.sent, n = e.app, a = e.store, o = e.router,
								i = !1, s = function(t) {
									i = !0;
									var e = Object(t) === t ? o.resolve(t).route
										.fullPath : t;
									window.location.href = e
								}, r = window.location.href.replace(window
									.location.origin, ""), p = [void 0, Z,
									void 0
								], c = 0;
						case 11:
							if (!(!1 === i && c < p.length)) {
								t.next = 29;
								break
							}
							if ("function" === typeof p[c]) {
								t.next = 14;
								break
							}
							return t.abrupt("continue", 26);
						case 14:
							return t.prev = 14, t.next = 17, p[c]({
								app: n,
								router: o,
								store: a,
								Vue: u["a"],
								ssrContext: null,
								redirect: s,
								urlPath: r,
								publicPath: tt
							});
						case 17:
							t.next = 26;
							break;
						case 19:
							if (t.prev = 19, t.t0 = t["catch"](14), !t.t0 || !t
								.t0.url) {
								t.next = 24;
								break
							}
							return window.location.href = t.t0.url, t.abrupt(
								"return");
						case 24:
							return console.error("[Quasar] boot error:", t.t0),
								t.abrupt("return");
						case 26:
							c++, t.next = 11;
							break;
						case 29:
							if (!0 !== i) {
								t.next = 31;
								break
							}
							return t.abrupt("return");
						case 31:
							new u["a"](n);
						case 32:
						case "end":
							return t.stop()
					}
				}), t, null, [
					[14, 19]
				])
			}))), nt.apply(this, arguments)
		}
		et()
	},
	"31cd": function(t, e, n) {},
	"444b": function(t, e, n) {
		"use strict";
		n("77ee")
	},
	"77ee": function(t, e, n) {}
});
