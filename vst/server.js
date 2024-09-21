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
	if(process.env.NODE_ENV !== 'production' && req.path.startsWith("/setup"))
		return res.render('setup.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts});
	if(process.env.NODE_ENV !== 'production' && req.path.startsWith("/cover"))
		return res.render('cover.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts});
	else if(req.path.startsWith("/download/")) {
		for(var key in vstcodes) if(req.path.includes("/"+key+"/")) {
			var os = ""
			if(req.path.includes("/linux")) os = "Linux"
			if(req.path.includes("/win64")) os = "Win64"
			if(req.path.includes("/mac")) os = "Mac"
			if(os != "") return res.download(__dirname + '/builds/'+vstcodes[key]+' '+os+'.zip');
		}
	}

	return res.render('index.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts});
});

app.listen(6665, function(){
	console.log("VST server started on port 6665");
});
