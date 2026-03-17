
window.timeLeft=0;
window.pausedtimeLeft=0;
window.pausedColor='white';
window.amt=0;
class Ae{
	constructor(onExpired,onActive,bal,st,symbol,timeLeft1,color=''){

window.onActive=onActive;
window.onExpired=onExpired;
window.bal=Number(bal);
window.st=st;
window.symbol=symbol;

		if (timeLeft==0) {
			timeLeft=(timeLeft1*1000);
			pausedtimeLeft=timeLeft;
			pausedColor=color;
		}



		var color="";

		amt=Number(0);


		//console.log({onExpired,onActive});
		if (onExpired) {
			const {ending_time,target_hours,target_amount,updated_at,restart_from}=onExpired;

			amt=Number(target_amount);
			//color="white";
			color=pausedColor;

		}else if (onActive) {
			const {ending_time,target_hours,target_amount,updated_at,restart_from}=onActive;

			if (timeLeft==0) {

				amt=Number(target_amount);
				color="white";
			}else{

				if (restart_from==0) { 
					amt=Ae.earned(ending_time,new Date().getTime(),target_hours,target_amount);


					try{
					if (lastAmt) {
						if (lastAmt>amt) {
							//red
							color="#f23645";
						}else{
							//green
							color="#089981";
						} 
					}}catch(e){}

				}else{

					color=pausedColor;
					amt=Ae.earnedPaused(ending_time,new Date(updated_at).getTime(),target_hours,target_amount);
				}
			}

			/*if (new Date().getTime()>=new Date(ending_time).getTime()) {
				//expired
				//target_amount
				amt=Number(target_amount);
				color="white";
			}else{
				if (restart_from==0) {
					//console.log({ending_time,b:new Date().toString(),c:new Date(st).toString()});
					amt=Ae.earned(ending_time,new Date().getTime(),target_hours,target_amount);


					try{
					if (lastAmt) {
						if (lastAmt>amt) {
							//red
							color="red";
						}else{
							//green
							color="green";
						} 
					}}catch(e){}

				}else{

					color="white";
					amt=Ae.earnedPaused(ending_time,new Date(updated_at).getTime(),target_hours,target_amount);
				}
			}*/


		}else{

			//color="white";
			color=pausedColor;

		}

		window.lastAmt=amt;
		//console.log({amt,bal,color,a:amt.toFixed(2)});
		
		try{
		    //document.getElementById("earn").innerHTML=`${symbol} ${amt.toFixed(2)}`; 
			document.getElementById("earn").innerHTML=`${symbol}${new Intl.NumberFormat('en-US').format(amt.toFixed(2))}`;
			if (amt==0) {
				document.getElementById("earn").innerHTML=`${symbol}0.00`; 
			}
			document.getElementById("earn").style.color=color;
		}catch(e){
			console.log(e);
		}
		try{
			var newa=bal+amt;
			//document.getElementById("tobal").innerHTML=`${symbol} ${newa.toFixed(2)}`;
			document.getElementById("tobal").innerHTML=`${symbol}${new Intl.NumberFormat('en-US').format(newa.toFixed(2))}`;
			
			if (newa==0) {
				document.getElementById("tobal").innerHTML=`${symbol}0.00`; 
			}
			document.getElementById("tobal").style.color=color;
		}catch(e){
			console.log(e);
		}
	} 

	static earned(a,from,target_hours,target_amount){


		var fn2=timeLeft/3600000 ; 
		
		var plu=((fn2/Number(target_hours))*Number(target_amount)); 
		
		var either=Math.random() * plu; 
		var fn=target_amount-plu;
		fn=fn*Math.random() ;  
		if (fn<0) {
			fn=0;
		}
		return fn;
	}
	/*static earned(a,from,target_hours,target_amount){

		var v=new Date(a).getTime();
		var n=v-from;
		//$n=strtotime($a)-$from;
		//var fn2=n/60/60/1000;
		var fn2=n/3600000 ;
		//console.log({v,from,fn2,target_hours,target_amount});
		
		var plu=((fn2/Number(target_hours))*Number(target_amount));
		//console.log({plu});
		
		var either=Math.random() * plu;
		//var fn=target_amount-either;
		var fn=target_amount-plu;
		fn=fn*Math.random() ; 
		//return number_format($fn,2);
		if (fn<0) {
			fn=0;
		}
		return fn;
	}*/

	static earnedPaused(a,from,target_hours,target_amount){
 
		//var fn2=timeLeft/3600000 ;
		var fn2=pausedtimeLeft/3600000 ;
		//console.log({v,from,fn2,target_hours,target_amount});
		
		var plu=((fn2/Number(target_hours))*Number(target_amount));
		//console.log({plu});
		
		//var either=Math.random() * plu;
		var fn=Number(target_amount)-plu;
		//return number_format($fn,2);
		if (fn<0) {
			fn=0;
		}
		return fn;
	}
	/*static earnedPaused(a,from,target_hours,target_amount){

		var v=new Date(a).getTime();
		var n=v-from;
		//$n=strtotime($a)-$from;
		var fn2=n/60/60/1000;
		fn2=n/3600000 ;
		//console.log({v,from,fn2,target_hours,target_amount});
		
		var plu=((fn2/Number(target_hours))*Number(target_amount));
		//console.log({plu});
		
		//var either=Math.random() * plu;
		var fn=Number(target_amount)-plu;
		//return number_format($fn,2);
		if (fn<0) {
			fn=0;
		}
		return fn;
	}
	*/
	static ls(){
		setInterval(function(){
			timeLeft-=4000;
			new Ae(onExpired,onActive,bal,st,symbol);
		},4000);
	}
}
window.Ae=Ae;