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
vstcodes = {
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

					++metrics.daily[0][pluginname][dlindex];
					++metrics.monthly[0][pluginname][dlindex];

					if(shouldsave) save();
				}

				return res.download(__dirname + '/builds/'+vstcodes[key]+' '+os+'.zip');
			}
		}
	}

	return res.render('index.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts});
});

app.listen(6665, function(){
	console.log("VST server started on port 6665");
});

process.stdin.resume();
var exited = false;
function exitHandler(options, exitCode) {
	if(exited) return;
	exited = true;
	let jsonString = JSON.stringify(metrics);
	try {
		fs.writeFileSync(__dirname + "/metrics.json", jsonString);
	} catch(err) {
		console.log("ERROR WRITING METRICS: ", err);
	}
	if(options.exit) process.exit();
}
process.on('exit', exitHandler.bind(null,{}));
process.on('SIGINT', exitHandler.bind(null, {exit:true}));
process.on('SIGUSR1', exitHandler.bind(null, {exit:true}));
process.on('SIGUSR2', exitHandler.bind(null, {exit:true}));
process.on('uncaughtException', exitHandler.bind(null, {exit:true}));
