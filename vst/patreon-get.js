const fs = require('fs');

var pledges = [];
var patrons = {};
var patrons_temp = {};
var overrides = {};
function refresh_patrons(cursor = null) {
	var url = "https://api.patreon.com/oauth2/api/campaigns/"+String(keys['campaign_id'])+"/pledges?page%5Bcount%5D=25";
	if(cursor != null) url += "&page%5Bcursor%5D="+cursor;
	url += "&include=patron,reward&fields%5Buser%5D=full_name,first_name,last_name&fields%5Bpledge%5D=null&fields%5Breward%5D=null&fields%5Bcampaign%5D=null";
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
		for(let pledge = 0; pledge < data['data'].length; ++pledge) {
			let tier = 0;
			if(data['data'][pledge]['relationships']['reward']['data'] != null)
				tier = keys['tier_ids'][data['data'][pledge]['relationships']['reward']['data']['id']];
			//if(tier < 10) continue;

			let userdata = { "id": data['data'][pledge]['relationships']['patron']['data']['id'], "name": null };
			for(let user = 0; user < data['included'].length; ++user) {
				if(data['included'][user]['id'] != userdata['id'])
					continue;

				if(data['included'][user]['attributes']['full_name'] != undefined) {
					userdata['name'] = data['included'][user]['attributes']['full_name'];
				} else if(data['included'][user]['attributes']['first_name'] != undefined) {
					userdata['name'] = data['included'][user]['attributes']['first_name'];
					if(data['included'][user]['attributes']['last_name'] != undefined)
						userdata['name'] += data['included'][user]['attributes']['last_name'];
				}
				break;
			}
			if(overrides[String(userdata['id'])] != undefined)
				for (const [key, value] of Object.entries(overrides[String(userdata['id'])]))
					userdata[key] = value;
			if(userdata['name'] == null) continue;

			if(patrons_temp[String(tier)] == undefined)
				patrons_temp[String(tier)] = [];
			patrons_temp[String(tier)].push(userdata);
		}
		if(data["links"]["next"] != undefined && data["links"]["next"].includes("page%5Bcursor%5D=")) {
			refresh_patrons(data["links"]["next"].split('page%5Bcursor%5D=',2)[1].split("&",1)[0]);
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
fs.readFile(__dirname + "/patreon.json", 'utf8', (err, jsonString) => {
	if(err) {
		console.log("ERROR READING KEYS: ", err);
	} else {
		try {
			let obj = JSON.parse(jsonString);
			keys = obj['keys'];
			patrons = obj['patrons'];
			overrides = obj['overrides'];
		} catch(error) {
			console.log("ERROR PARSING KEYS: ", error);
		}
		refresh_patrons();
	}
});
