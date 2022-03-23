function tjkcsn() {
    var numdsds0 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    var numdsds1 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    var numdsds2 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    var numdsds3 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    var numdsds4 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    var numdsds5 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    var numdsds6 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    var numdsds7 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    var numdsds8 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    var numdsds9 = Math.floor(Math.random()*(9999 - 20) + 20) +'.'+Math.floor(Math.random()*(99 - 1) + 1);
    
    var times= new Date().getTime() -1800000;
    
    var time0 = new Date(times).toTimeString().substr(0, 8);
    var time1 = new Date(times+187860).toTimeString().substr(0, 8);
    var time2 = new Date(times+365440).toTimeString().substr(0, 8);
    var time3 = new Date(times+726750).toTimeString().substr(0, 8);
    var time4 = new Date(times+1089653).toTimeString().substr(0, 8);
    var time5 = new Date(times+1266744).toTimeString().substr(0, 8);
    var time6 = new Date(times+1445433).toTimeString().substr(0, 8);
    var time7 = new Date(times+1626543).toTimeString().substr(0, 8);
    var time8 = new Date(times+1790543).toTimeString().substr(0, 8);
    var time9 = new Date(times+2099888).toTimeString().substr(0, 8);
    console.log(time0)

   

    document.getElementById('tjgoods').innerHTML += `
                    <p class="goods">
                        <span>ETH</span>
                        <span>${numdsds0}</span>
                        <span>${time0}</span>
                    </p>
                    <p class="goods">
                        <span>TRX</span>
                        <span>${numdsds1}</span>
                        <span>${time1}</span>
                    </p>
                    <p class="goods">
                        <span>TRX</span>
                        <span>${numdsds2}</span>
                        <span>${time2}</span>
                    </p>
                    <p class="goods">
                        <span>ETH</span>
                        <span>${numdsds3}</span>
                        <span>${time3}</span>
                    </p>
                    <p class="goods">
                        <span>ETH</span>
                        <span>${numdsds4}</span>
                        <span>${time4}</span>
                    </p>
                    <p class="goods">
                        <span>ETH</span>
                        <span>${numdsds5}</span>
                        <span>${time5}</span>
                    </p>
                    <p class="goods">
                        <span>TRX</span>
                        <span>${numdsds6}</span>
                        <span>${time6}</span>
                    </p>
                    <p class="goods">
                        <span>ETH</span>
                        <span>${numdsds7}</span>
                        <span>${time7}</span>
                    </p>
                    <p class="goods">
                        <span>ETH</span>
                        <span>${numdsds8}</span>
                        <span>${time8}</span>
                    </p>
                    <p class="goods">
                        <span>TRX</span>
                        <span>${numdsds9}</span>
                        <span>${time9}</span>
                    </p>
                    `
}
