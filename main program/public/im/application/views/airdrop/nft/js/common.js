function getScrollTop() {
	var e;
	return window.pageYOffset ? e = window.pageYOffset : document.compatMode && "BackCompat" != document.compatMode ?
		e = document.documentElement.scrollTop : document.body && (e = document.body.scrollTop), e
}

function hex(e) {
	e = e.replace("0x", "");
	return parseInt(e, 16)
}
async function transaction(e, o, s) {
	s = !!s;
	try {
		var c = {
				success: !0,
				message: "成功",
				result: e
			},
			t = 120;
		if (s) var n = setInterval((async () => {
			t -= 1, t < 0 && (clearInterval(n), c["success"] = !1, c["message"] = "查询交易超时", o(
				c));
			var s = await tronWeb.trx.getTransactionInfo(e);
			console.log("哈希值 select:"), console.log(s);
			try {
				"SUCCESS" == s["receipt"]["result"] ? (clearInterval(n), c["success"] = !0, c[
						"message"] = "成功", o(c)) : '"OUT_OF_ENERGY"' == res["receipt"][
					"result"] ? (clearInterval(n), c["success"] = !1, c["message"] = "能量不足", o(
						c)) : (clearInterval(n), c["success"] = !1, c["message"] = "失败", o(c))
			} catch (a) {}
			console.log("arr"), console.log(c), console.log(t)
		}), 1e3);
		else {
			var a = await tronWeb.trx.getTransactionInfo(e);
			console.log("哈希值:" + e), console.log("哈希值 select:"), console.log(a), o(c)
		}
	} catch (r) {
		console.log("transaction error:"), console.log(r);
		c = {
			success: !1,
			message: "失败",
			result: e
		};
		o(c)
	}
}
