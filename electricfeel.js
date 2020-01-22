global.portt = 6660;
global.assets = "/assets";
require('./app/app.js');
const electron = require('electron');
var {app, BrowserWindow} = electron;

app.on('ready', function(){
	var res = electron.screen.getPrimaryDisplay().size;
	var vmin = Math.min(res.width, res.height);
	global.unplugWindow = new BrowserWindow({
		backgroundColor: '#000000',
		width: 522,
		height: 370,
		x: res.width*.5 - 261,
		y: res.height*.5 - 185,
		darkTheme: true,
		frame: false,
		opacity: 0,
		resizable: false,
		alwaysOnTop: true,
		webPreferences: {
			nodeIntegration: true
		}
	});
	global.unplugWindow.removeMenu();
	global.unplugWindow.loadURL("http://localhost:6660/unplug?6660");


	global.mainWindow = new BrowserWindow({
		backgroundColor: '#000000',
		width: res.width*.6 + vmin*.3,
		height: res.height*.6 + vmin*.3,
		x: res.width*.25 - vmin*.2,
		y: res.height*.2 - vmin*.15,
		darkTheme: true,
		frame: false,
		webPreferences: {
			nodeIntegration: true
		}
	});
	global.mainWindow.hide();
	global.mainWindow.removeMenu();
	global.mainWindow.loadURL("http://localhost:6660/browser?6660");

	global.byeWindow = new BrowserWindow({
		transparent: true,
		fullscreen: true,
		darkTheme: true,
		frame: false,
		opacity: 0,
		resizable: false,
		alwaysOnTop: true,
		webPreferences: {
			nodeIntegration: true
		}
	});
	global.byeWindow.hide();
	global.byeWindow.removeMenu();
	global.byeWindow.setIgnoreMouseEvents(true);
});