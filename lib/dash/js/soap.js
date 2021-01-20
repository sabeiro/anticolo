function xml2json(xml) {
    try {
	var obj = {};
	if (xml.children.length > 0) {
	    for (var i = 0; i < xml.children.length; i++) {
		var item = xml.children.item(i);
		var nodeName = item.nodeName;

		if (typeof (obj[nodeName]) == "undefined") {
		    obj[nodeName] = xml2json(item);
		} else {
		    if (typeof (obj[nodeName].push) == "undefined") {
			var old = obj[nodeName];

			obj[nodeName] = [];
			obj[nodeName].push(old);
		    }
		    obj[nodeName].push(xml2json(item));
		}
	    }
	} else {
	    obj = xml.textContent;
	}
	return obj;
    } catch (e) {
	console.log(e.message);
    }
}
function x_callback(xmlhttp){
    var x2js = new X2JS();
    var jsonObj = x2js.xml_str2json(xmlhttp.responseText);
    console.log(jsonObj);
    
    // console.log(xml2json(xmlhttp.response));
    // console.log(xmlToJSON(xmlhttp.response));
    //document.getElementById("resultArea").value = xml2json(xmlhttp.response);
    document.getElementById("resultArea").value = JSON.stringify(jsonObj);
}

function soap() {
    try {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open('POST', 'http://osb11g.mediaset.it:8021/PalinsestiOSB/PS/PS_MHPService?getMHPData?callback=x_callback', true);
	var params = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:mhp="http://rti.mediaset.it/onair/main/MHPService">' + 
	    '<soapenv:Header/>' + 
	    '<soapenv:Body>' + 
	    '<mhp:MhpInput>' + 
	    '<mhp:channel>C5</mhp:channel>' + 
	    '<mhp:startdttime>22/10/2016 06:00:00</mhp:startdttime>' + 
	    '<mhp:enddttime>22/10/2016 12:00:00</mhp:enddttime>' +
	    '<mhp:duration>5</mhp:duration>' + 
	    '</mhp:MhpInput>' + 
	    '</soapenv:Body>' + 
	    '</soapenv:Envelope>';
	
	xmlhttp.setRequestHeader("Content-type", "text/xml");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	//xmlhttp.setRequestHeader("Access-Control-Request-Headers","access-control-allow-origin")
	xmlhttp.setRequestHeader( 'Access-Control-Allow-Origin', '*');
	//xmlhttp.withCredentials = false;
	
	xmlhttp.onreadystatechange = function() {
	    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		x_callback(xmlhttp);
	    }
	}
	xmlhttp.send(params);
    } catch(e) {alert(e);}
}

soap();


function createCORSRequest(method, url) {
  var xhr = new XMLHttpRequest();
  if ("withCredentials" in xhr) {
    xhr.open(method, url, true);
  } else if (typeof XDomainRequest != "undefined") {
    xhr = new XDomainRequest();
    xhr.open(method, url);
  } else {
    xhr = null;
  }
  return xhr;
}
function getTitle(text) {
  return text.match('<title>(.*)?</title>')[1];
}
function makeCorsRequest() {
  var url = 'http://html5rocks-cors.s3-website-us-east-1.amazonaws.com/index.html';
  var xhr = createCORSRequest('GET', url);
  if (!xhr) {
    alert('CORS not supported');
    return;
  }
  xhr.onload = function() {
    var text = xhr.responseText;
    var title = getTitle(text);
    alert('Response from CORS request to ' + url + ': ' + title);
  };
  xhr.onerror = function() {
    alert('Woops, there was an error making the request.');
  };
  xhr.send();
}
var xhr = createCORSRequest('GET', url);
if (!xhr) {
  throw new Error('CORS not supported');
}
// var url = 'http://api.alice.com/cors';
// var xhr = createCORSRequest('GET', url);
// xhr.setRequestHeader('X-Custom-Header', 'value');
// xhr.send();

// $.ajax({
//   type: 'GET',
//   url: 'http://html5rocks-cors.s3-website-us-east-1.amazonaws.com/index.html',
//   contentType: 'text/plain',
//   xhrFields: {
//     withCredentials: false
//   },
//   headers: {
//   },
//   success: function() {
//   },
//   error: function() {
//   }
// });


