

function setD(s,c,r,f,s1,c1,r1,f1 ,s2){

    let yw = Number(`${s1 || 0}`);
    if (yw == 0) {
        $(`#ltcnt`).remove();
    } else {
        $(`#ltcnt`).css('width', `${yw}%`);
    }
    
    let ywPerc = Number(`${s1 || 0}`);
    $(`#ltcperc`).text(`${ywPerc || 0}%`);
    
    let cw = Number(`${c1 || 0}`);
    if (cw == 0) {
        $(`#dogent`).remove();
    } else {
        $(`#dogent`).css('width', `${cw}%`);
    }
    
    let cwPerc = Number(`${c1 || 0}`);
    $(`#dogeperc`).text(`${cwPerc || 0}%`);
    
    let rw = Number(`${r1 || 0}`);
    if (rw == 0) {
        $(`#xrpnt`).remove();
    } else {
        $(`#xrpnt`).css('width', `${rw}%`);
    }
    
    let rwPerc = Number(`${r1 || 0}`);
    $(`#xrpperc`).text(`${rwPerc || 0}%`);
    
    let fw = Number(`${f1 || 0}`);
    if (fw == 0) {
        $(`#shibant`).remove();
    } else {
        $(`#shibant`).css('width', `${fw}%`);
    }
    
    let fwPerc = Number(`${f1 || 0}`);
    $(`#shibaperc`).text(`${fwPerc || 0}%`);
    
    let sw = Number(`${s || 0}`);
    if (sw == 0) {
        $(`#btcnt`).remove();
    } else {
        $(`#btcnt`).css('width', `${sw}%`);
    }
    
    let swPerc = Number(`${s || 0}`);
    $(`#btcperc`).text(`${swPerc || 0}%`);
    
    let cwEth = Number(`${c || 0}`);
    if (cwEth == 0) {
        $(`#ethnt`).remove();
    } else {
        $(`#ethnt`).css('width', `${cwEth}%`);
    }
    
    let cwEthPerc = Number(`${c || 0}`);
    $(`#ethperc`).text(`${cwEthPerc || 0}%`);
    
    let rwUsdt = Number(`${r || 0}`);
    if (rwUsdt == 0) {
        $(`#usdtnt`).remove();
    } else {
        $(`#usdtnt`).css('width', `${rwUsdt}%`);
    }
    
    let rwUsdtPerc = Number(`${r || 0}`);
    $(`#usdtperc`).text(`${rwUsdtPerc || 0}%`);
    
    let fwBnb = Number(`${f || 0}`);
    if (fwBnb == 0) {
        $(`#bnbnt`).remove();
    } else {
        $(`#bnbnt`).css('width', `${fwBnb}%`);
    }
    
    let fwBnbPerc = Number(`${f || 0}`);
    $(`#bnbperc`).text(`${fwBnbPerc || 0}%`);
    
    let swSol = Number(`${s2 || 0}`);
    if (swSol == 0) {
        $(`#solnt`).remove();
    } else {
        $(`#solnt`).css('width', `${swSol}%`);
    }
    
    let swSolPerc = Number(`${s2 || 0}`);
    $(`#solperc`).text(`${swSolPerc || 0}%`);
    


    /*$(`#ltcnt`).css('width',`${s1||0}%`);
    $(`#ltcperc`).text(`${s1||0}%`);

    $(`#dogent`).css('width',`${c1||0}%`);
    $(`#dogeperc`).text(`${c1||0}%`);

    $(`#xrpnt`).css('width',`${r1||0}%`);
    $(`#xrpperc`).text(`${r1||0}%`);

    $(`#shibant`).css('width',`${f1||0}%`);
    $(`#shibaperc`).text(`${f1||0}%`);

    $(`#btcnt`).css('width',`${s||0}%`);
    $(`#btcperc`).text(`${s||0}%`);

    $(`#ethnt`).css('width',`${c||0}%`);
    $(`#ethperc`).text(`${c||0}%`);

    $(`#usdtnt`).css('width',`${r||0}%`);
    $(`#usdtperc`).text(`${r||0}%`);

    $(`#bnbnt`).css('width',`${f||0}%`);
    $(`#bnbperc`).text(`${f||0}%`);


    $(`#solnt`).css('width',`${s2||0}%`);
    $(`#solperc`).text(`${s2||0}%`);
    */
 
}
