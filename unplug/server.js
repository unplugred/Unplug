if(global.domain === undefined) {
	if(process.env.NODE_ENV === 'production') {
		global.protocol = "https://";
		global.domain = "unplug.red";
	} else {
		global.protocol = "http://";
		global.domain = "localhost";
	}
}
const fs = require('fs');
const express = require('express');
const app = express();
global.assets = global.protocol + "assets." + global.domain;
var version = 0;
app.set('view engine', 'ejs');
app.set('views', __dirname + "/pages");


var savefile = {
	viscount: 152
}
fs.readFile(__dirname + "/savefile.json", 'utf8', (err, jsonString) => {
	if(err) {
		console.log("ERROR READING SAVEFILE: ", err);
	} else try {
		savefile = JSON.parse(jsonString);
		console.log("visitor count according to main: " + savefile.viscount);
	} catch(error) {
		console.log("ERROR PARSING SAVEFILE: ", error);
	}

	fs.readFile(__dirname + "/savefilebackup.json", 'utf8', (err, jsonString) => {
		if(err){
			console.log("ERROR READING BACKUP SAVEFILE: ", err);
		} else try {
			let savefilebackup = JSON.parse(jsonString);
			console.log("visitor count according to backup: " + savefile.viscount);
			if(savefilebackup.viscount > savefile.viscount) {
				savefile = savefilebackup;
			}
		} catch(error) {
			console.log("ERROR PARSING BACKUP SAVEFILE: ", error);
		}
	});
});

function save() {
	let jsonString = JSON.stringify(savefile);
	fs.writeFile(__dirname + "/savefile.json", jsonString, err => {
		if(err) console.log("ERROR WRITING SAVEFILE: ", err);
	});
	fs.writeFile(__dirname + "/savefilebackup.json", jsonString, err => {
		if(err) console.log("ERROR WRITING BACKUP SAVEFILE: ", err);
	});
}


app.use((req, res, next) => {
//log
	if(req.headers.host === undefined)
	{
		if(req.hostname === undefined)
			console.log("^" + req.protocol + "://????" + req.originalUrl);
		else
			console.log("^" + req.protocol + "://" + req.hostname + ":????" + req.originalUrl);
	}
	else console.log("^" + req.protocol + "://" + req.headers.host + req.originalUrl);

//lowercase
	req.url = req.url.toLowerCase();
	req.path = req.path.toLowerCase();

//weird error
	if(req.headers.host === undefined) req.headers.host = "localhost";
	if(req.hostname === undefined) req.hostname = "localhost";

//favicon
	if(req.path === "/favicon.ico")
		return res.sendFile(__dirname + '/static/assets/favicon.ico');

/*	ASSETS--------------------------*/
	if(req.headers.host === 'assets.' + global.domain) {
		if(req.url.endsWith("?dnld")) {
			return res.download(__dirname + "/static/assets/" + decodeURIComponent(req.path), function(err) {
				if(err) {
					if(err.message.indexOf('no such file or directory') !== -1) return next();
					if(err.message.indexOf('Request aborted') !== -1) return res.end();
					throw err;
				}
			});
		}
		return next();
	}

/*	ELECTRON------------------------*/
	if(global.domain === "localhost:6663") {
		if(
		req.path === "/privacy-policy" ||
		req.path === "/brand-guidelines")
			return res.status(404).render('partials/404.ejs',{assets:global.assets,host:global.protocol + req.headers.host,version:version});

		if(req.url.endsWith("?6660")) {
			if(req.path === "/browser")
				return res.render('electron/browser.ejs',{assets:global.assets,host:global.protocol + req.headers.host,version:version});
			if(req.path === "/bye")
				return res.render('electron/bye.ejs',{assets:global.assets,host:global.protocol + req.headers.host,version:version});
			if(req.path === "/unplug")
				return res.render('electron/unplug.ejs',{assets:global.assets,host:global.protocol + req.headers.host,version:version});
		}
	}

	//index
	if(req.path === '/')
		return res.render('partials/index.ejs',{assets:global.assets,host:global.protocol + req.headers.host,version:version});

	//important.txt
	if(req.path === '/important.txt')
		return res.download(__dirname + '/static/unplug/important.txt');

	//time
	if(req.path === '/time') {
		savefile.viscount++;
		save();
		return res.render('unplug/time.ejs',{assets:global.assets,host:global.protocol + req.headers.host,version:version,viscount:savefile.viscount});
	}

	return res.render("unplug" + req.path + ".ejs", {assets:global.assets,host:global.protocol + req.headers.host,version:version}, function(err, html) {
		if(err) {
			if(err.message.indexOf('Failed to lookup view') !== -1) return next();
			throw err;
		}
		return res.send(html);
	});
});

//static
app.use((req, res, next) => {
	if(req.headers.host === 'www.' + global.domain || req.headers.host.startsWith("localhost")) req.url = "unplug" + req.path;
	req.url = req.hostname.substring(0,req.hostname.indexOf(".")) + req.path;
	return next();
});
app.use(express.static(__dirname + '/static', {
	index: false,
	redirect: false,
	maxAge: 2592000000,
	setHeaders: function(res, path, stat) {
		res.set('Access-Control-Allow-Origin','*');
	}
}));

//404
app.use((req, res, next) => {
	return res.status(404).render('partials/404.ejs',{assets:global.assets,host:global.protocol + req.headers.host,version:version});
});



fs.readdir(__dirname + '/pages/unplug', (err, files) => {
	version = ((files.length+2)*.01).toFixed(2);

	//startup sequence
	const startseq = ([
   80,' '
,  80,' +------------------\\'
, 100,' | \\                 \\'
, 110,' |  \\                 \\'
, 120,' |   \\-----------------\\'
,  90,' |   |                 |'
,  80,' |   |    %%%  %%%     |'
,  80,' |   |   %%%%%%%%%%    |'
,  70,' \\   |    %%%%%%%%     |'
,  90,'  \\  |     %%%%%%      |'
, 100,'   \\ |       %%        |'
, 100,'    \\|                 |'
,  90,'     \\-----------------+'
,  80,' '
,  80,'Unplug, v' + version
,  90,'CUBE Tech Ltd.'
, 110,'All rights reserved.'
, 100,' '
,2000,' '
,1400,'Booting.'
, 800,'Booting..'
,1200,'Booting...'
,1000,'Booting....'
,1400,'Booting.....'
, 800,'Booting......'
,1200,'Booting.......'
,1000,'Booting........'
,2400,'Booting.........'
,  70,'Booted successfully!'
, 100,' '
, 120,'All systems operational.'
,  90,'Asset dir: ' + global.assets
,  80,' '
, 120,' '
,  80,'CUBE Tech Ltd. wishes you happy surfing!']).reverse();

	function seq() {
		if(startseq.length === 0) return;
		setTimeout(seq, startseq.pop());
		console.log(startseq.pop());
	}
	app.listen(6663, seq);
});
