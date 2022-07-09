const data = null;

const xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
	if (this.readyState === this.DONE) {
        var test  = JSON.parse(this.responseText) ; 
        console.log(test);
		document.getElementById('location').innerHTML="Location: " + test['location']['country'] + ", " + test['location']['name'] ;
        document.getElementById('Localtime').innerHTML="Local Time in " + test['location']['tz_id'] + " is: " + test['location']['localtime'];
        document.getElementById('Temperature').innerHTML="Current Temperature: " + test['current']['temp_c'] + " degrees :(" ;
	}
});

xhr.open("GET", "https://weatherapi-com.p.rapidapi.com/current.json?q=Roodepoort");
xhr.setRequestHeader("X-RapidAPI-Key", "86a47d5c17msh4de7a9a246d23cfp17bc8ejsnf2c7bfb7615d");
xhr.setRequestHeader("X-RapidAPI-Host", "weatherapi-com.p.rapidapi.com");

xhr.send(data);