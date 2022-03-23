

function RandomNumBoth(Min, Max) {
	var Range = Max - Min;
	var Rand = Math.random();
	var num = Min + Math.round(Rand * Range); //四舍五入
	return num;
};
let arrAddress=[
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231",
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231",
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231",
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231",
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231",
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231",
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231",
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231",
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231",
	"T78e61d8a4821c47f4fc691193d7c60d031d0c9231"
];
//生成列表
function createList(maxNumber,type=false){
	let html="";
	for(let i=maxNumber-50;i<maxNumber;i++){
				html+=`<li class="scroll_item"><b class="address">${arrAddress[RandomNumBoth(0,arrAddress.length-1)]}</b> <div class="rrr">获得 <em>${RandomNumBoth(100,1666)}</em> EVO</div></li>`;
	};

	return html;
};
