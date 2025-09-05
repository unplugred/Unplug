if(process.env.NODE_ENV === 'production') {
	global.protocol = "https://";
	global.assets = "https://assets.unplug.red";
} else {
	global.protocol = "http://";
	global.assets = "http://assets.localhost";
}

//i dont wanna hear anything about bad practice.
const fs = require('fs');
eval(fs.readFileSync(__dirname + '/static/vsts.js').toString());

var metrics = {
	loaded: false,
	hour: -1,
	daily: [],
	monthly: []
}
fs.readFile(__dirname + "/metrics.json", 'utf8', (err, jsonString) => {
	if(err) {
		console.log("ERROR READING METRICS: ", err);
	} else try {
		metrics = JSON.parse(jsonString);
		if(metrics.loaded === undefined) {
			metrics.loaded = false;
		} if(metrics.hour === undefined) {
			metrics.hour = -1;
			metrics.loaded = false;
		}
	} catch(error) {
		console.log("ERROR PARSING METRICS: ", error);
	}

	fs.readFile(__dirname + "/metricsbackup.json", 'utf8', (err, jsonString) => {
		if(err){
			console.log("ERROR READING BACKUP METRICS: ", err);
		} else try {
			let metricsbackup = JSON.parse(jsonString);
			if((metricsbackup.hour > metrics.hour) || !metrics.loaded)
				metrics = metricsbackup;
		} catch(error) {
			console.log("ERROR PARSING BACKUP METRICS: ", error);
		}

		if(!metrics.loaded) metrics.loaded = true;
	});
});

function save() {
	let jsonString = JSON.stringify(metrics);
	fs.writeFile(__dirname + "/metrics.json", jsonString, err => {
		if(err) console.log("ERROR WRITING METRICS: ", err);
	});
	fs.writeFile(__dirname + "/metricsbackup.json", jsonString, err => {
		if(err) console.log("ERROR WRITING BACKUP METRICS: ", err);
	});
}

var pledges = [];
var patrons = '{"10":[{"name":"FAILED TO READ PATREON DATA"}]}';
var patrons_temp = {};
var patreon_refresh_rate = 1;
var overrides = {};
var last_checked_patreon = Math.floor(Date.now()/1000/60/60/patreon_refresh_rate);
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
			if(tier < 10) continue;

			let userdata = { "name": null };
			for(let user = 0; user < data['included'].length; ++user) {
				if(data['included'][user]['id'] != data['data'][pledge]['relationships']['patron']['data']['id'])
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
			if(overrides[String(data['data'][pledge]['relationships']['patron']['data']['id'])] != undefined)
				for (const [key, value] of Object.entries(overrides[String(data['data'][pledge]['relationships']['patron']['data']['id'])]))
					userdata[key] = value;
			if(userdata['name'] == null) continue;

			if(patrons_temp[String(tier)] == undefined)
				patrons_temp[String(tier)] = [];
			patrons_temp[String(tier)].push(userdata);
		}
		if(data["links"]["next"] != undefined && data["links"]["next"].includes("page%5Bcursor%5D=")) {
			refresh_patrons(data["links"]["next"].split('page%5Bcursor%5D=',2)[1].split("&",1)[0]);
		} else {
			patrons = JSON.stringify(patrons_temp);
			patrons_temp = {};
		}
	}).catch(error => console.error('ERROR FETCHING PATREON DATA:', error));
}
var keys = {
	creator_id: "",
	campaign_id: 0,
	tier_ids: {}
};
fs.readFile(__dirname + "/patreon.json", 'utf8', (err, jsonString) => {
	if(err) {
		console.log("ERROR READING PATREON DATA: ", err);
	} else {
		try {
			let obj = JSON.parse(jsonString);
			patreon_refresh_rate = obj['refresh_rate']
			keys = obj['keys'];
			patrons = obj['cache'];
			overrides = obj['overrides'];
		} catch(error) {
			console.log("ERROR PARSING PATREON DATA: ", error);
		}
	}
	if(patrons.includes("FAILED TO READ PATREON DATA"))
		refresh_patrons();
});

const express = require('express');
const app = express();
app.set('view engine', 'ejs');
app.set('views', __dirname + "/pages");

app.use((req, res, next) => {
//lowercase
	req.url = req.url.toLowerCase();
	req.path = req.path.toLowerCase();
	next();
});

app.use(express.static(__dirname + '/static', {
	index: false,
	redirect: false,
	maxAge: 2592000000,
	setHeaders: function(res,path,stat) {
		res.set('Access-Control-Allow-Origin','*');
	}
}));

// yea im aware these are open source but whatever
var vstcodes = {
	"w0zy59f5dmdc5uzs": "Plastic Funeral",
	"n4bb7kg8xgyq0hpy": "Plastic Funeral Free",
	"v6urdk6rkdhdphiy": "VU",
	"b7n5nbwpwt30auht": "VU Free",
	"pg1xh7ci5j386k1n": "ClickBox",
	"2blqz8y2hadsphpa": "Pisstortion",
	"58fqarl3dkaj03fz": "Pisstortion Free",
	"6csyb3j69w17fni9": "PNCH",
	"z3cmosbf05wd171s": "PNCH Free",
	"65e6tnwlhucyfcwu": "Red Bass",
	"8yjwnfevjtoqatf0": "Red Bass Free",
	"q5w9lqcsa0wywcvr": "MPaint",
	"qdyf3s0u4y04iudz": "CRMBL",
	"h32w79jrlagc1ou1": "CRMBL Free",
	"s21e6vtwpbdn65dr": "Prisma",
	"ov9zlfghbkpij81f": "Prisma Free",
	"1s1h4rjd5etv4mne": "SunBurnt",
	"r89u1onfe5dj4tlz": "SunBurnt Free",
	"1343k2r2owvaa9v8": "Diet Audio",
	"10j7dx45cyjqgnil": "Diet Audio Free",
	"uy34w22vn4k29gug": "Scope",
	"39y5hl5rr4tvmy0y": "Scope Free",
	"643q1m286fto7wan": "Magic Carpet",
	"2e7k8zug41gaq6nv": "Magic Carpet Free",
	"9b88oa7123xnhtqt": "ModMan",
	"4h3v8w25whu8emtp": "ModMan Free",
	"mmle2ls85rexid0m": "Everything Bundle"
}
app.use((req, res, next) => {
	if(req.path.startsWith("/setup") && process.env.NODE_ENV !== 'production')
		return res.render('setup.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts});
	if(req.path.startsWith("/cover") && process.env.NODE_ENV !== 'production')
		return res.render('cover.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts});
	if(req.path.startsWith("/metrics"))
		return res.render('metrics.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts,metrics:metrics});
	if(req.path.startsWith("/download/")) {
		for(let key in vstcodes) if(req.path.includes("/"+key+"/")) {
			var os = ""
			if(req.path.includes("/linux")) os = "Linux"
			if(req.path.includes("/win64")) os = "Win64"
			if(req.path.includes("/mac")) os = "Mac"
			if(os != "") {
				if(metrics.loaded) {
					let shouldsave = false;
					let hour = Math.floor(Date.now()/1000/60/60);
					if(metrics.hour < hour) {
						metrics.hour = hour;
						let currentday = Math.floor(hour/24);
						if(metrics.daily.length < 1 || metrics.daily[0].day != currentday) {
							if(metrics.daily.length >= 1 && metrics.daily[0].day > currentday)
								metrics.daily[0].day = currentday-1;
							let delta = metrics.daily.length<1?1:(currentday-metrics.daily[0].day);
							let date = new Date();
							date.setDate(date.getDate()-delta);
							for(let i = 0; i < delta; ++i) {
								date.setDate(date.getDate()+1);
								metrics.daily.unshift({
									"day": currentday-(delta-i-1),
									"name": String(date.getUTCDate())+'/'+String(date.getUTCMonth()+1),
									"Plastic Funeral":		[0,0,0,0,0,0],
									"VU":					[0,0,0,0,0,0],
									"ClickBox":				[0,0,0,0,0,0],
									"Pisstortion":			[0,0,0,0,0,0],
									"PNCH":					[0,0,0,0,0,0],
									"Red Bass":				[0,0,0,0,0,0],
									"MPaint":				[0,0,0,0,0,0],
									"CRMBL":				[0,0,0,0,0,0],
									"Prisma":				[0,0,0,0,0,0],
									"SunBurnt":				[0,0,0,0,0,0],
									"Diet Audio":			[0,0,0,0,0,0],
									"Scope":				[0,0,0,0,0,0],
									"Magic Carpet":			[0,0,0,0,0,0],
									"ModMan":				[0,0,0,0,0,0],
									"Everything Bundle":	[0,0,0,0,0,0]
								});
							}
							while(metrics.daily.length > 90)
								metrics.daily.pop();
						}
						date = new Date();
						let currentmonth = date.getUTCMonth()+date.getUTCFullYear()*12;
						if(metrics.monthly.length < 1 || metrics.monthly[0].month != currentmonth) {
							if(metrics.monthly.length >= 1 && metrics.monthly[0].month > currentmonth)
								metrics.monthly[0].month = currentmonth-1;
							let delta = metrics.monthly.length<1?1:(currentmonth-metrics.monthly[0].month);
							date.setMonth(date.getMonth()-delta);
							for(let i = 0; i < delta; ++i) {
								date.setMonth(date.getMonth()+1);
								metrics.monthly.unshift({
									"month": currentmonth-(delta-i-1),
									"name": String(date.getUTCMonth()+1)+'/'+String(date.getUTCFullYear()),
									"Plastic Funeral":		[0,0,0,0,0,0],
									"VU":					[0,0,0,0,0,0],
									"ClickBox":				[0,0,0,0,0,0],
									"Pisstortion":			[0,0,0,0,0,0],
									"PNCH":					[0,0,0,0,0,0],
									"Red Bass":				[0,0,0,0,0,0],
									"MPaint":				[0,0,0,0,0,0],
									"CRMBL":				[0,0,0,0,0,0],
									"Prisma":				[0,0,0,0,0,0],
									"SunBurnt":				[0,0,0,0,0,0],
									"Diet Audio":			[0,0,0,0,0,0],
									"Scope":				[0,0,0,0,0,0],
									"Magic Carpet":			[0,0,0,0,0,0],
									"ModMan":				[0,0,0,0,0,0],
									"Everything Bundle":	[0,0,0,0,0,0]
								});
							}
						}

						shouldsave = true;
					}

					let dlindex = 3;
					if(os == "Win64") dlindex = 4;
					else if(os == "Mac") dlindex = 5;
					let pluginname = vstcodes[key];
					if(pluginname.endsWith(" Free")) {
						pluginname = pluginname.substring(0,pluginname.length-5);
						dlindex -= 3;
					} else if(pluginname == "MPaint" || pluginname == "ClickBox") {
						dlindex -= 3;
					}

					if(metrics.daily[0][pluginname] == undefined)
						metrics.daily[0][pluginname] = [0,0,0,0,0,0];
					if(metrics.monthly[0][pluginname] == undefined)
						metrics.monthly[0][pluginname] = [0,0,0,0,0,0];
					++metrics.daily[0][pluginname][dlindex];
					++metrics.monthly[0][pluginname][dlindex];

					if(shouldsave) save();
				}

				return res.download(__dirname + '/builds/'+vstcodes[key]+' '+os+'.zip');
			}
		}
	}

	let hour = Math.floor(Date.now()/1000/60/60/patreon_refresh_rate);
	if(hour != last_checked_patreon) {
		last_checked_patreon = hour;
		refresh_patrons();
	}

	return res.render('index.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts,patrons:patrons});
});

app.listen(6665, function(){
	console.log("VST server started on port 6665");
});

process.stdin.resume();
var exited = false;
function exitHandler(options, exitCode) {
	if(exited) return;
	exited = true;
	try {
		fs.writeFileSync(__dirname + "/metrics.json", JSON.stringify(metrics));
	} catch(err) {
		console.log("ERROR WRITING METRICS: ", err);
	}
	if(!patrons.includes("FAILED TO READ PATREON DATA")) {
		try {
			//*/
			fs.writeFileSync(__dirname + "/patreon.json", JSON.stringify({
				"refresh_rate": patreon_refresh_rate,
				"keys": keys,
				"cache": patrons,
				"overrides": overrides
			}));
			//*/
		} catch(err) {
			console.log("ERROR WRITING PATREON DATA: ", err);
		}
	}
	if(options.exit) process.exit();
}
process.on('exit', exitHandler.bind(null,{}));
process.on('SIGINT', exitHandler.bind(null, {exit:true}));
process.on('SIGUSR1', exitHandler.bind(null, {exit:true}));
process.on('SIGUSR2', exitHandler.bind(null, {exit:true}));
process.on('uncaughtException', exitHandler.bind(null, {exit:true}));
