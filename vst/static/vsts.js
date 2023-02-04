var vsts = [
	{
		title: "About",
		id: "about",
		color: "orange",
		description: `hi! ✌<br/>
im ari (they them). on the internet i release stuff under the name unplugred.<br/>
after studying audio engineering i decided to make my own vst plugins for me and my friends because i was frustrated with the current offerrings.<br/>
eventually i decided to release them onto the internet as open source because why not.<br/>
in here youd find no resistors, transitors, capacitors, or diodes modeled. no emulation of anything.<br/>
these are completely a result of my own exploration of code and sound, and as a result some of them are good, while others not so much.<br/>
i hope these bring you joy and would love to hear what u make with them.<br/>
u can reach me on discord (red#3510) and email (hello@unplug.red).<br/>
shout out to my friend lau she makes rly good music <a href="https://laulaulau.bandcamp.com/" target="_blank">check her out</a>.`,
		hideicon: true
	},{
		title: "FAQ",
		id: "faq",
		color: "orange",
		description: `
<b>Q: I found a bug!<br/>
A:</b> THANK YOU for your effort to report bugs<br/>
bug reports are always always appreciated.<br/>
it would mean a lot for me if you could include:<br/>
- graphics card model<br/>
- cpu model<br/>
- operating system<br/>
- daw<br/>
- vst2 or vst3?<br/>
- detailed steps to reproduce the bug<br/>
- a screenshot if applicable<br/>
send the bug reports to either my mail (hello@unplug.red) or my discord (red#3510).<br/>
thanks again, greatly appreciated.<br/>
<b>Q: Can I get 32bit support?<br/>
A:</b> right now maintaining 32bit versions is not worth the effort.<br/>
<b>Q: Can I get AAX support?<br/>
A:</b> unfortunately i do not have the money to buy a pro tools license, nor do i intend on supporting their guidelines to get a developer license, which require anti piracy measures to be installed.<br/>
i think these kind of measures make the end product worse, annoy the customer, and ultimately do not achieve their goal.<br/>
<b>Q: Can I get VST2 support?<br/>
A:</b> steinberg has stopped issueing developer licenses for vst2 in 2018, and unfortunately its illegal for me to distribute vst2 versions without one.<br/>
<b>Q: I use Logic and its not working!<br/>
A:</b> logic uses the AU format, which i currently do not support.<br/>
in order to properly test and support it, id need to buy a mac computer as well as a logic license, and well right now thats not in the options.<br/>
<b>Q: Can I have ___ feature?<br/>
A:</b> you are more than welcome to shoot me an email at hello@unplug.red, but do know that i am just one person and i dont do this full time, and i cant afford to add every requested feature as they take a lot of time to make.<br/>
custom versions of the plugins are an option with appropriate financial compensation.<br/>
<b>Q: How do you make these?<br/>
A:</b> the plugins are made in C++ via the JUCE framework.<br/>
ui is made with blender, paint.net, glimpse, and imagemagick.<br/>
demo videos are made and edited in blender for no good reason.<br/>
music is made in reaper.<br/>
text editor is neovide (vim).<br/>
<b>Q: Whats the difference between the free and paid versions?<br/>
A:</b> in the paid version you support me and in the other u dont.<br/>
also, the free version has a strip that says ur using the free version.<br/>
also also using the paid version statistically means ur about 20% more handsome.<br/>
<b>Q: I have a cat video to send you!! (its rly cute)<br/>
A:</b> what are you waiting for??<br/>
all cat videos are welcome at mail (hello@unplug.red) or discord (red#3510).
id also love to hear any music you made with my plugins, and feel free to send me any album recommendations of bands youd think id like as well.`,
		hideicon: true,
	},{
		title: "Discord",
		id: "discord",
		color: "orange",
		description: `
<br/>
<br/>
<br/>
<center>i have a discord if thats your kind of thing.<br/>
<b><a href="https://discord.gg/EwMx5dnJrA" target="_blank">join</a></b></center>`,
		url: "https://discord.gg/EwMx5dnJrA",
		hideicon: true,
		separator: true
	},{
		title: "Plastic Funeral",
		id: "pf",
		color: "teal",
		tagline: "Distortion that sounds like a laser beam.",
		description: `
forget about warmth.<br/>
this refreshing take on fold distortion gives off a harsh and metallic sound that is guaranteed to destroy any mix.<br/>
<br/>
<center><a class="demo" href="javascript:void(0);" onclick='setpopup(1, 0, "Demo made by @a1https://soundcloud.com/the_real_astrodex@a2Astrodex@a3.", "/pf/demo1.mp3", true, false)'>▶ Demo</a> (loud)</center><br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		freedownload: {id:"wGlzc",url:"https://shop.unplug.red/b/plasticfuneralfree"},
		paiddownload: {id:"pq29M",url:"https://shop.unplug.red/b/plasticfuneral",price:5},
		decoration: {width:90,height:370},
		ui: {width:242,height:462,deg:40}
	},{
		title: "VU",
		id: "vu",
		color: "teal",
		rating: "(Good)",
		tagline: "VU meter for your VU metering needs.",
		description: `
very simple and to the point vu meter. has:<br/>
- stereo and mono modes<br/>
- scalable ui<br/>
- adjustable reaction speed<br/>
- adjustable nominal operation level (NoL)<br/>
- peak led<br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		freedownload: {id:"kiV10",url:"https://shop.unplug.red/b/vufree"},
		paiddownload: {id:"sE1Od",url:"https://shop.unplug.red/b/vu",price:10},
		decoration: {width:288,height:300},
		ui: {width:438,height:260,deg:40}
	},{
		title: "ClickBox",
		id: "cb",
		color: "teal",
		tagline: "Randomized click generator.",
		description: `
generates randomized digital clicks<br/>
made after people complained i fixed the annoying clicking issue in my first vst, plastic funeral (why??)<br/>
not useful for much but i made it so might as well put it out there.<br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		freedownload: {id:"GI9s7",url:"https://shop.unplug.red/b/clickbox"},
		decoration: {width:150,height:300},
		ui: {width:256,height:256,deg:40}
	},{
		title: "Pisstortion",
		id: "ps",
		color: "teal",
		rating: "(Very good)",
		tagline: "Advanced sinefold distortion plugin.",
		description: `
my take on sine fold distortion.<br/>
sounds similar to plastic funeral but a bit softer.<br/>
<br/>
<i><b>Coming in a future update:</b><br/>
 - Ability to toggle between fold and sine fold</i><br/>
 - Automatic gain compensation</i><br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		freedownload: {id:"b6lXi",url:"https://shop.unplug.red/b/pisstortionfree"},
		paiddownload: {id:"MgzNJ",url:"https://shop.unplug.red/b/pisstortion",price:5},
		decoration: {width:94,height:300},
		ui: {width:242,height:462,deg:40}
	},{
		title: "PNCH",
		id: "pnch",
		rating: "(Good)",
		color: "teal",
		tagline: "Weird knob that makes ur stuff tight.",
		description: `
a type of effect that causes added harmonics as well as a gating effect.<br/>
compared to typical gates and expanders, this one does not use an envelope follower for the gating effect, resulting in gating without pumping<br/>
the added harmonics might not be noticeable or even pleasant on an already dirty signal such as a guitar.<br/>
as a result, this makes it great for applications such as removing humming on a direct guitar signal before applying heavy distortion.<br/>
also sounds great on drum loops and results in a very choppy effect.<br/>
APPLY BEFORE DISTORTION FOR IDEAL EFFECT.<br/>
<br/>
<center><a class="demovid" href="javascript:void(0);" onclick='setpopup(1, 3, "PNCH demo.", "https://www.youtube.com/embed/UFdOg7CEaGQ?autoplay=1", false, true, 20, 15)'>▶ PNCH in action</a> (demo video)</center><br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		freedownload: {id:"05Odt",url:"https://shop.unplug.red/b/pnchfree"},
		paiddownload: {id:"sGw0T",url:"https://shop.unplug.red/b/pnch",price:10},
		decoration: {width:200,height:182},
		ui: {width:128,height:148,deg:40}
	},{
		title: "Red Bass",
		id: "rb",
		color: "teal",
		tagline: "Low-end enchancer excellent for kicks and speech.",
		description: `
sub oscillator sidechained to incoming signal.<br/>
put a drum loop or a kick thats lacking some oompth in there and the result will be instantly thick.<br/>
apply with caution if not in a proper mixing environment.<br/>
<br/>
<center><a class="demovid" href="javascript:void(0);" onclick='setpopup(1, 1, "Instructional demo for Red Bass.", "https://www.youtube.com/embed/4iIJjWvpb_s?autoplay=1", false, true, 20, 15)'>▶ How to use</a> (demo video)</center><br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		freedownload: {id:"57CKW",url:"https://shop.unplug.red/b/redbassfree"},
		paiddownload: {id:"Rz8aC",url:"https://shop.unplug.red/b/redbass",price:20},
		decoration: {width:240,height:157},
		ui: {width:322,height:408,deg:40}
	},{
		title: "MPaint",
		id: "mp",
		color: "teal",
		rating: "(Good)",
		tagline: "A sampler from a popular video game.",
		description: `
this one is a reproduction of a sampler present in a music making feature that was in a video game thats near and dear to my childhood.<br/>
this plugin attempts to preserve the unique voice limitations of the original sampler,<br/>
and the samples were recorded with a high quality reproduction of the soundcard of the originating console, preserving the unique artefacts of the digital to analog conversion of the original chip.<br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		freedownload: {id:"8eD6Y",url:"https://shop.unplug.red/b/mpaint"},
		decoration: {width:131,height:208},
		ui: {width:468,height:40,deg:40}
	},{
		title: "CRMBL",
		id: "crmbl",
		color: "teal",
		rating: "(Very good)",
		tagline: "Delay for insane people.",
		description: `
a highly versitile delay plugin with a large feature-set,<br/>
which in the right hands can produce highly textural results.<br/>
among the features are pitch shifting on the feedback, asymetric ping pong, reverse delay, and more...<br/>
the parameters are highly automatable and can produce a dub delay effect when automating the time parameter.<br/>
<br/>
<center><a class="demovid" href="javascript:void(0);" onclick='setpopup(1, 2, "Instructional demo for CRMBL.", "https://www.youtube.com/embed/1E9sQJNHKg4?autoplay=1", false, true, 26.666, 15)'>▶ How to use</a> (demo video)</center><br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		freedownload: {id:"rAx4d",url:"https://shop.unplug.red/b/crmblfree"},
		paiddownload: {id:"IyJoD",url:"https://shop.unplug.red/b/crmbl",price:30},
		decoration: {width:240,height:231},
		ui: {width:507,height:465,deg:30}
	},{
		title: "Prisma",
		id: "prsm",
		color: "teal",
		rating: "(Very good)",
		tagline: "Modular multiband distortion plugin.",
		description: `
multiband distoriton plugin for advanced tone shaping.<br/>
up to four modules can be added to any one of the four bands.<br/>
as of writing, there are 16 modules available to choose from.<br/>
in the right hands the plugin can produce highly complex and intricate tones.<br/>
common usecases include very harsh distortions being applied on a narrow band to create more subtle effects,<br/>
and bass recordings being distorted on the higher frequencies without hurting the low end.<br/>
<br/>
<i><b>Coming in a future update:</b><br/>
 - Dry/Wet module<br/>
 - Ring Mod module<br/>
 - Stereo DC module<br/>
 - Stereo Rectify module<br/>
 - Possibly a noise module<br/>
 - Ability to drag modules<br/>
 - Ability to change the amount of modules per band<br/>
 - Prismon, a non multiband version of prisma<br/>
 - More</i><br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		freedownload: {id:"Tbrox",url:"https://shop.unplug.red/b/prismafree"},
		paiddownload: {id:"mK70t",url:"https://shop.unplug.red/b/prisma",price:40},
		decoration: {width:138,height:267},
		ui: {width:478,height:561,deg:20}
	},{
		title: "Everything Bundle",
		id: "bndl",
		color: "teal",
		tagline: "Think of the savings!",
		description: `
grammy winning producers dont want you to know this simple trick!<br/>
get the paid versions of all of my plugins at a funny price.<br/>
also saves u a few clicks as u can bulk download everything.<br/>
<br/>
Available for Linux, Windows and Mac, in CLAP and VST3 formats, 64bit only.`,
		paiddownload: {id:"agUFM",url:"https://shop.unplug.red/b/everything",price:100}
	}
]
