const fs = require('fs');

var patrons = {};
var patrons_temp = {};
var overrides = {};
function refresh_patrons(cursor = null) {
	var url = cursor;
	if(url == null)
		url = "https://api.patreon.com/oauth2/v2/campaigns/"+String(keys['campaign_id'])+"/members?page%5Bcount%5D=1000&include=currently_entitled_tiers&fields%5Bmember%5D=full_name";
	fetch(url, {
		method: 'GET',
		headers: { 'Authorization': "Bearer "+keys['creator_id'] }
	}).then(response => response.json()).then((data) => {
		if(data['errors'] !== undefined) {
			for(let error = 0; error < data['errors'].length; ++error)
				console.error(data['errors'][error]['detail']);
		}
		if(data['data'] === undefined) {
			console.error('Undefined response from Patreon');
			return;
		}
		for(let member = 0; member < data['data'].length; ++member) {
			let htier = 0;
			if(data['data'][member]['relationships']['currently_entitled_tiers']['data'] != null) {
				for(let tier = 0; tier < data['data'][member]['relationships']['currently_entitled_tiers']['data'].length; ++tier) {
					let c = keys['tier_ids'][data['data'][member]['relationships']['currently_entitled_tiers']['data'][tier]['id']];
					if(c != undefined && c > htier) htier = c;
				}
			}
			if(htier == 0) continue;

			let userdata = { "id": data['data'][member]['id'], "name": data['data'][member]['attributes']['full_name'] };
			if(overrides[String(data['data'][member]['id'])] != undefined)
				for(const [key, value] of Object.entries(overrides[String(data['data'][member]['id'])]))
					userdata[key] = value;
			if(userdata['name'] == undefined || userdata['name'] == null) continue;

			if(patrons_temp[String(htier)] == undefined)
				patrons_temp[String(htier)] = [];
			patrons_temp[String(htier)].push(userdata);
		}
		if(data["links"] != undefined && data["links"]["next"] != undefined) {
			setTimeout(function() {
				refresh_patrons(data["links"]["next"]);
			},1000);
		} else {
			patrons = patrons_temp;
			patrons_temp = {};
			console.log(patrons);
		}
	}).catch(error => console.error('Error:', error));
}
var keys = {
	creator_id: "",
	campaign_id: 0,
	tier_ids: {}
};
readfile = false;
fs.readFile(__dirname + "/patreon.json", 'utf8', (err, jsonString) => {
	if(err) {
		console.log("ERROR READING KEYS: ", err);
	} else {
		try {
			let obj = JSON.parse(jsonString);
			keys = obj['keys'];
			patrons = obj['patrons'];
		} catch(error) {
			console.log("ERROR PARSING KEYS: ", error);
		}
		if(readfile) refresh_patrons();
		readfile = true;
	}
});
fs.readFile(__dirname + "/patreonoverride.json", 'utf8', (err, jsonString) => {
	if(err) {
		console.log("ERROR READING PATREON OVERRIDE KEYS: ", err);
	} else {
		try {
			let obj = JSON.parse(jsonString);
			overrides = obj['overrides'];
		} catch(error) {
			console.log("ERROR PARSING OVERRIDE KEYS: ", error);
		}
		if(readfile) refresh_patrons();
		readfile = true;
	}
});
