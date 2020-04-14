global.debug = process.argv[2] === "--debug";
global.protocol = "http://";
global.domain = "localhost:6660";
require('./server.js');
const electron = require('electron');
var {app, BrowserWindow} = electron;
var icon = "./unplug/static/assets/favicon.ico";

app.on('ready', function() {
	if(process.platform === "win32" || process.platform === "darwin") {
		openwin();
	} else {
		setTimeout(openwin, 500);
		icon = "./unplug/static/assets/shortcut-icon.png";
	}
});
function openwin() {
	var res = electron.screen.getPrimaryDisplay().size;
	var vmin = Math.min(res.width, res.height);
	global.unplugWindow = new BrowserWindow({
		title: "unplug",
		icon: icon,
		transparent: true,
		width: 522,
		height: 370,
		x: res.width*.5 - 261,
		y: res.height*.5 - 185,
		darkTheme: true,
		frame: false,
		resizable: false,
		movable: false,
		alwaysOnTop: true,
		webPreferences: { nodeIntegration: true }
	});
	global.unplugWindow.removeMenu();
	global.unplugWindow.loadURL(global.protocol + global.domain + "/unplug?6660");

	global.mainWindow = new BrowserWindow({
		title: "unplug",
		icon: icon,
		backgroundColor: '#000000',
		width: res.width*.6 + vmin*.3,
		height: res.height*.6 + vmin*.3,
		x: res.width*.25 - vmin*.2,
		y: res.height*.2 - vmin*.15,
		darkTheme: true,
		frame: global.debug,
		webPreferences: { nodeIntegration: true },
		show: false
	});
	if(!global.debug) global.mainWindow.removeMenu();
	global.mainWindow.loadURL(global.protocol + global.domain + "/browser?6660");

	global.byeWindow = new BrowserWindow({
		title: "bye",
		icon: icon,
		transparent: true,
		darkTheme: true,
		frame: false,
		resizable: false,
		movable: false,
		alwaysOnTop: true,
		webPreferences: { nodeIntegration: true },
		show: false
	});
	global.byeWindow.removeMenu();
	global.byeWindow.setIgnoreMouseEvents(true);
}
