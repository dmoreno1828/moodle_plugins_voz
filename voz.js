$(document).ready(function(){

 function strip(html)
{
var tmp = document.createElement("div");
tmp.innerHTML = html;
return tmp.textContent || tmp.innerText;
}


var inicio=localStorage.getItem("principal");
if(inicio!=1){
var inicio=$("#prueba").text();
$("#myModal").modal('show');
speak(inicio);
localStorage.setItem("principal","1");
}


		var data_url=$("#home_dir").val();
	    var i=1;
		$("a,.fheader").each(function(){
		i++;
			$(this).attr("id","voz_a_"+i);
			var texto=$(this).text();
			$(this).attr("onmouseover","speak('"+texto.trim()+"')");
		 
		});
	    var i=1;
		$(".div").each(function(){
		i++;
			$(this).attr("id","voz_div_"+i);
			var texto=strip($(this).html());
if(texto!=" "){
			$(this).attr("onmouseover","speak('"+texto.trim()+"')");}
			
 
		});
    	var i=1;
		$("h3,h2,h1,h4,h5,h6").each(function(){
		i++;
			$(this).attr("id","voz_h_"+i);
			var texto=$(this).text();
			$(this).attr("onmouseover","speak('"+texto.trim()+"')"); 
	 
		});
 
		$(".texto").each(function(){
		i++;
	 
			var texto=$(this).html();
			$(this).attr("onmouseover","speak('"+texto.trim()+"')"); 
	 
 
		
		}); 		
$(".text").each(function(){
		i++;
	 
			var texto=$(this).html();
			$(this).attr("onmouseover","speak('"+texto.trim()+"')"); 
 
 
		
		}); 
 
		$("#texto").each(function(){
		i++;
 
			var texto=$(this).html();
			$(this).attr("onmouseover","speak('"+texto.trim()+"')"); 
		 
 
		
		});
		$("label").each(function(){
		i++;
 
			var texto=$(this).html();
			$(this).attr("onmouseover","speak('"+texto.trim()+"')"); 
			 
 
		
		});
		$("input[type='submit']").each(function(){
		i++;
 
			var texto=$(this).val();
			$(this).attr("onmouseover","speak('"+texto.trim()+"')"); 
			var data_url=$("#home_dir").val(); 
 
		
		});

	 
 
 });

var synth = window.speechSynthesis;
 
var voices = [];


function speak(data){
 
    var utterThis = new SpeechSynthesisUtterance(data);
    var selectedOption = 'Google español';
    for(i = 0; i < voices.length ; i++) {
      if(voices[i].name === selectedOption) {
        utterThis.voice = voices[i];
      }
    }
    utterThis.pitch = 1;
    utterThis.rate = 1;
    synth.speak(utterThis);

}
 

function getAbsolutePath() {
var URLdomain =document.domain;
return URLdomain;
}

 
