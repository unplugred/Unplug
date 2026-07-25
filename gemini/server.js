const gemini = require('@derhuerst/gemini');
const fs = require('fs');
const path = require('path');
const ejs = require('ejs');

pages = {};
var _getFiles = function(dir) {
	fs.readdirSync(dir).forEach(function(file) {
		file = dir+'/'+file;
		var stat = fs.statSync(file);
		if(stat && stat.isDirectory())
			_getFiles(file)
		else
			pages[file] = fs.readFileSync(file,'utf-8');
	});
}
_getFiles(path.resolve(__dirname,"unplug"));
_getFiles(path.resolve(__dirname,"vst"));

eval(fs.readFileSync(__dirname+'/../vst/static/vsts.js').toString());

var patrons = {"10":[{"name":"FAILED TO READ PATREON DATA"}]};
var patreon_refresh_rate = 1;
var last_checked_patreon = Math.floor(Date.now()/1000/60/60/patreon_refresh_rate);
function refresh_patrons() {
	fs.readFile(__dirname+"/../vst/patreon.json",'utf8',(err,jsonString) => {
		if(err) {
			console.log("ERROR READING PATREON DATA: ",err);
		} else {
			try {
				let obj = JSON.parse(jsonString);
				patrons = obj['cache'];
			} catch(error) {
				console.log("ERROR PARSING PATREON DATA: ",error);
			}
		}
	});
}
refresh_patrons();

const MIME_TYPES = {
	".ejs" : "text/gemini; charset=utf-8",
	".txt" : "text/plain; charset=utf-8",
	".png" : "image/png",
	".jpeg": "image/jpeg",
	".jpg" : "image/jpeg",
	".webp": "image/webp",
	".gif" : "image/gif",
	".svg" : "image/svg+xml",
	".mp3" : "audio/mp3",
	".zip" : "application/zip",
	".pdf" : "application/pdf"
};
const handleRequest = (req,res) => {
	let host = "";
	let dirs = [];
	let searchpath = req.path.replace(/^\/+/,'');
	let extension = path.extname(req.path).toLowerCase();
	if(extension == ".ejs") {
		searchpath = "index.ejs";
	} else if(extension == "") {
		searchpath += ".ejs";
		extension = ".ejs";
	}

	if(
		req.url.startsWith("gemini://localhost/assets/") ||
		req.url.startsWith("gemini://www.localhost/assets/") ||
		req.url.startsWith("gemini://unplug.red/assets/") ||
		req.url.startsWith("gemini://www.unplug.red/assets/") ||
		req.url.startsWith("gemini://g.unplug.red/assets/") ||
		req.url.startsWith("gemini://www.g.unplug.red/assets/")) {
		host = "assets";
		searchpath = searchpath.substring(7).replace(/^\/+/,'');
		dirs = [path.resolve(__dirname,"..","unplug","static","assets")];
	} else if(
		req.url.startsWith("gemini://vst.localhost") ||
		req.url.startsWith("gemini://vst.unplug.red") ||
		req.url.startsWith("gemini://vst.g.unplug.red") ||
		req.url.startsWith("gemini://localhost/vst") ||
		req.url.startsWith("gemini://unplug.red/vst") ||
		req.url.startsWith("gemini://www.unplug.red/vst") ||
		req.url.startsWith("gemini://g.unplug.red/vst") ||
		req.url.startsWith("gemini://www.g.unplug.red/vst")) {
		host = "vst";
		if(searchpath.startsWith("vst"))
			searchpath = searchpath.substring(4).replace(/^\/+/,'');

		if(extension === ".zip") {
			for(let i = 0; i < vsts.length; ++i) {
				if(req.path.startsWith("/vst/download/"+vsts[i].title.replace(/\s/g,"").toLowerCase()) && vsts[i].freedownload !== undefined) {
					let dlpath = "/vst/download/"+vsts[i].title.replace(/\s/g,"").toLowerCase()+(vsts[i].paiddownload===undefined?"_":"_free_");
					let os = "";
					if(req.path == (dlpath+"linux.zip")) os = "Linux";
					if(req.path == (dlpath+"win64.zip")) os = "Win64";
					if(req.path == (dlpath+"mac.zip"  )) os = "Mac";
					if(os != "") {
						res.mimeType = MIME_TYPES[".zip"];
						fs.createReadStream(path.resolve(__dirname,"..","vst","builds",vsts[i].title+(vsts[i].paiddownload===undefined?" ":" Free ")+os+".zip")).pipe(res);
						return;
					}
				}
			}
		}

		dirs = [path.resolve(__dirname,"vst"),path.resolve(__dirname,"..","vst","static")];
	} else if(
		req.url.startsWith("gemini://localhost") ||
		req.url.startsWith("gemini://www.localhost") ||
		req.url.startsWith("gemini://unplug.red") ||
		req.url.startsWith("gemini://www.unplug.red") ||
		req.url.startsWith("gemini://g.unplug.red") ||
		req.url.startsWith("gemini://www.g.unplug.red")) {
		host = "unplug";
		dirs = [path.resolve(__dirname,"unplug"),path.resolve(__dirname,"..","unplug","static","unplug")];
	} else {
		return res.notFound();
	}

	for(let i = 0; i < dirs.length; ++i) {
		let filepath = path.resolve(dirs[i],searchpath);

		if(!filepath.startsWith(dirs[i]+path.sep) || !fs.existsSync(filepath) || !fs.statSync(filepath).isFile())
			continue;

		res.mimeType = MIME_TYPES[extension] || "application/octet-stream";

		if(extension == ".ejs")
			return res.end(ejs.render(pages[filepath]));

		fs.createReadStream(filepath).pipe(res);
		return;
	}

	extension = ".ejs";
	if(host == "assets") host = "unplug";
	filepath = path.resolve(__dirname,host,"index.ejs");
	res.mimeType = MIME_TYPES[extension] || "application/octet-stream";
	if(host == "vst") {
		res.end(ejs.render(pages[filepath],{pagename:req.path,vsts:vsts,patrons:patrons}));

		let hour = Math.floor(Date.now()/1000/60/60/patreon_refresh_rate);
		if(hour != last_checked_patreon) {
			last_checked_patreon = hour;
			refresh_patrons();
		}

		return;
	} else {
		return res.end(ejs.render(pages[filepath],{pagename:req.path}));
	}
};

const app = gemini.createServer({
	cert: fs.readFileSync(path.resolve(__dirname,"cert.pem")),
	key : fs.readFileSync(path.resolve(__dirname,"key.pem"))
},handleRequest);
app.listen(1965);
app.on('error',console.error);
console.log("gemini server started on port 1965");
