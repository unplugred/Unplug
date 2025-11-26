var vsts = [
	{
		title: "About",
		id: "about",
		color: "orange",
		description: `hi! ✌<br/>
im melody. on the internet i release stuff under the name unplugred.<br/>
after studying audio engineering i decided to make my own vst plugins for me and my friends because i didnt have money to buy them and almost nothing was available on linux.<br/>
i decided to release them onto the internet as open source after my friends convinced me theyre good and begged me to put them out there.<br/>
in here youd find no modeling of capacitors or diodes. no emulation of anything.<br/>
these are completely a result of my own exploration of code and sound, and as a result some of them are good, while others not so much.<br/>
i hope these bring you joy and would love to hear what u make with them.<br/>
u can reach me via discord (@unplugred) and email (melody@unplug.red).<br/>
also! our discord community made two collaborative albums. <a href="https://unplugcord.bandcamp.com/" target="_blank">check them out!</a><br/>
lastly, thanks to <a href="https://laulaulau.bandcamp.com/" target="_blank">lau</a>, this wouldnt exist without her.`,
		hideicon: true
	},{
		title: "FAQ",
		id: "faq",
		color: "orange",
		description: `
<br/>
<b>Q: Why Patreon?<br/>
A:</b> i cannot afford to pay rent only some of the time.<br/>
before i moved to patreon the income i got from this fluctuated a lot.<br/>
patreon allows me to have a stable income i can rely on.<br/>
<br/>
<b>Q: But I dont like subscriptions<br/>
A:</b> the everything bundle used to be worth 100$ before i moved to patreon.<br/>
this is a low price considering people pay 90$ for a single plugin.<br/>
if youre at the lowest tier of my patreon, it would take u 3 years to get to that same amount.<br/>
if having a reoccuring payment stresses you out, u are welcomed to use the free version for now.<br/>
though i appreciate your willingness to help, one time donations wont help me do this full time.<br/>
<br/>
<b>Q: But I don't have money<br/>
A:</b> music creation should not be gatekept by money.<br/>
thats why i made the free versions.<br/>
theres no shame in using them and they are fully functional.<br/>
i promise i wont judge.<br/>
<br/>
<b>Q: I found a bug!<br/>
A:</b> THANK YOU for your effort to report bugs<br/>
bug reports are always always appreciated.<br/>
it would mean a lot for me if you could include:<br/>
- graphics card model<br/>
- operating system<br/>
- daw<br/>
- vst3/clap/au?<br/>
- detailed steps to reproduce the bug<br/>
- a screenshot if applicable<br/>
- does it happen in other daws? (reaper has infinite trial)<br/>
send the bug reports to either my mail (melody@unplug.red) or my discord (@unplugred).<br/>
thanks again, greatly appreciated.<br/>
<br/>
<b>Q: Can I get 32bit support?<br/>
A:</b> right now maintaining 32bit versions is not worth the effort.<br/>
<br/>
<b>Q: Can I get AAX support?<br/>
A:</b> unfortunately i do not have the money to buy a pro tools license, nor do i intend on supporting their guidelines to get a developer license, which require anti piracy measures to be installed.<br/>
i think these kind of measures make the end product worse, annoy the customer, and ultimately do not achieve their goal.<br/>
<br/>
<b>Q: Can I get VST2 support?<br/>
A:</b> steinberg has stopped issueing developer licenses for vst2 in 2018, and unfortunately its illegal for me to distribute vst2 versions without one.<br/>
<br/>
<b>Q: Can I have ___ feature?<br/>
A:</b> you are more than welcome to shoot me an email at melody@unplug.red, but do know that i am just one person.<br/>
i dont do this full time, and i cant afford to add every requested feature as they take a lot of time to make.<br/>
custom versions of the plugins are an option with appropriate financial compensation.<br/>
<br/>
<b>Q: How do you make these?<br/>
A:</b> the plugins are made in c++ via the juce framework.<br/>
ui is made with blender, paint.net, gimp, and inkscape.<br/>
website is written with vanilla js, html and css, with a little bit of nodejs.<br/>
demo videos are made and edited in blender for no good reason.<br/>
music is made in reaper.<br/>
<br/>
<b>Q: How do I make these???<br/>
A:</b> <a href="https://www.kvraudio.com/forum/viewtopic.php?t=329696" target="_blank">theres an excellent thread on the kvr forums</a> about good entry points to audio plugin making and audio programming in general.<br/>
<br/>
<b>Q: Whats the difference between the free and paid versions?<br/>
A:</b> in the paid version you support me and in the other u dont.<br/>
also, the free version has a strip that says ur using the free version.<br/>
also also using the paid version statistically means ur about 20% more handsome.<br/>
<br/>
<b>Q: I have a cat video to send you!! (its rly cute)<br/>
A:</b> what are you waiting for??<br/>
any and all cat videos are welcome at mail (melody@unplug.red) or discord (@unplugred).
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
		title: "Everything Bundle",
		id: "bndl",
		color: "teal",
		tagline: "Think of the savings!",
		description: `
grammy winning producers dont want you to know this simple trick!<br/>
get the paid versions of all of my plugins at a funny price.<br/>
also saves u a few clicks as u can bulk download everything.`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		paiddownload: {url:"https://www.patreon.com/posts/everything-79100062"}
	},{
		title: "Prisma",
		id: "prsm",
		color: "teal",
		tagline: "Modular multiband distortion plugin.",
		description: `
multiband distortion plugin for advanced tone shaping.<br/>
up to four modules can be added to any one of the four bands.<br/>
as of writing, there are 21 modules available to choose from.<br/>
in the right hands the plugin can produce highly complex and intricate tones.<br/>
common usecases include very harsh distortions being applied on a narrow band to create more subtle effects,<br/>
and bass recordings being distorted on the higher frequencies without hurting the low end.<br/>
also included is a single band version called prismon.`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/prisma-free-79099898"},
		paiddownload: {url:"https://www.patreon.com/posts/prisma-79099945"},
		decoration: {width:138,height:267},
		ui: {width:478,height:561,deg:15}
	},{
		title: "CRMBL",
		id: "crmbl",
		color: "teal",
		tagline: "Delay for insane people.",
		description: `
a highly versitile delay plugin with a large feature-set,<br/>
which in the right hands can produce highly textural results.<br/>
among the features are pitch shifting on the feedback, asymetric ping pong, reverse delay, and more...<br/>
the parameters are highly automatable and can produce a dub delay effect when automating the time parameter.<br/>
<br/>
<center><a class="demovid" href="javascript:void(0);" onclick='setpopup(1, 3, "Instructional demo for CRMBL.", "https://www.youtube.com/embed/1E9sQJNHKg4?autoplay=1", false, true, 26.666, 15)'>▶ How to use</a> (demo video)<br/>
<a class="demo" href="javascript:void(0);" onclick='setpopup(1, 4, "Demo made by @a1https://brobomusic.com@a2brobo@a3.", "/crmbl/demo1.mp3", true, false)'>▶ Demo by brobo</a><br/>
<a class="demo" href="javascript:void(0);" onclick='setpopup(1, 5, "Demo made by @a1https://linktr.ee/woodthrush@a2woodthrush@a3.", "/crmbl/demo2.mp3", true, false)'>▶ Demo by woodthrush</a></center>`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/crmbl-free-79099779"},
		paiddownload: {url:"https://www.patreon.com/posts/crmbl-79099843"},
		decoration: {width:240,height:231},
		ui: {width:507,height:465,deg:20}
	},{
		title: "ModMan",
		id: "mm",
		color: "teal",
		tagline: "Adds movement.",
		description: `
modulation effect that produces organic and ever changing randomized movements, based on a perlin noise algorithm.<br/>
allows modulating a tape drift, low pass and its resonance, saturation, and amplitude.<br/>
with this effect you can add movement to a pad, widen the stereo field, create a tape style effect, or experiment with bizzare settings to create interesting textures.<br/>
its cool!`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/modman-free-136081903"},
		paiddownload: {url:"https://www.patreon.com/posts/modman-136081521"},
		decoration: {width:163,height:324},
		ui: {width:660,height:330,deg:15}
	},{
		title: "SunBurnt",
		id: "sb",
		color: "teal",
		tagline: "Multi-curve reverb delay.",
		description: `
unique reverb plugin whose characteristics you can draw in the form of a curve.<br/>
for example, you can have a reverse reverb with an oscillating lowpass, with a tail that starts panned left and ends up panned right.<br/>
or, you could have a reverb with a tail that goes wub wub wub wub and the end of the tail is pitched up an octave.<br/>
<br/>
hold ctrl while dragging the length knob to sync to bpm.<br/>
more chaotic and textural results can be achieved by reducing the density parameter, and the plugin can enter multi-tap delay mode by turning the density knob all the way down.<br/>
<br/>
due to the plugin's extensive use of convolution, it is somewhat cpu heavy.<br/>
if youre experiencing problems, try increasing the buffer size!`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/sunburnt-free-99259946"},
		paiddownload: {url:"https://www.patreon.com/posts/sunburnt-99260540"},
		decoration: {width:230,height:221},
		ui: {width:552,height:501,deg:15}
	},{
		title: "PNCH",
		id: "pnch",
		color: "teal",
		tagline: "Knob that makes ur stuff tight.",
		description: `
a type of effect that causes added harmonics as well as a gating effect.<br/>
compared to typical gates and expanders, this one does not use an envelope follower for the gating effect, resulting in gating without pumping<br/>
the added harmonics might not be noticeable or even pleasant on an already dirty signal such as a guitar.<br/>
as a result, this makes it great for applications such as removing humming on a direct guitar signal before applying heavy distortion.<br/>
also sounds great on drum loops and results in a very choppy effect.<br/>
APPLY BEFORE DISTORTION FOR IDEAL EFFECT.<br/>
<br/>
<center><a class="demovid" href="javascript:void(0);" onclick='setpopup(1, 1, "PNCH demo.", "https://www.youtube.com/embed/UFdOg7CEaGQ?autoplay=1", false, true, 20, 15)'>▶ PNCH in action</a> (demo video)</center>`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/pnch-free-79086018"},
		paiddownload: {url:"https://www.patreon.com/posts/pnch-79086091"},
		decoration: {width:200,height:182},
		ui: {width:128,height:148,deg:40}
	},{
		title: "Magic Carpet",
		id: "mc",
		color: "teal",
		tagline: "Three delays feedbacking into the atmosphere.",
		description: `
three delay lines with a shared feedback path, makes a delay that starts sparse but continues to get denser with each feedback.<br/>
the result is a very full-sounding delay with not a lot of gaps.<br/>
can also be used to create noise by enabling noise mode via the right click menu, which raises the feedback to unstable levels (loud)`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/magic-carpet-123519153"},
		paiddownload: {url:"https://www.patreon.com/posts/magic-carpet-123519610"},
		decoration: {width:300,height:198},
		ui: {width:360,height:420,deg:15}
	},{
		title: "Diet Audio",
		id: "da",
		color: "teal",
		tagline: "Spectral gate.",
		description: `
a spectral gate plugin with a unique sound, very good at separating transient information from the rest of the audio.<br/>
two copies of the plugin can be used in order to process transients differently than the rest, for example by distorting only the transients.<br/>
the plugin can also produce unique artifacts when used in fast release mode, which resemble mp3 compression.`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/diet-audio-free-112826556"},
		paiddownload: {url:"https://www.patreon.com/posts/diet-audio-112826367"},
		decoration: {width:402,height:219},
		ui: {width:384,height:384,deg:20}
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
<center><a class="demovid" href="javascript:void(0);" onclick='setpopup(1, 2, "Instructional demo for Red Bass.", "https://www.youtube.com/embed/4iIJjWvpb_s?autoplay=1", false, true, 20, 15)'>▶ How to use</a> (demo video)</center>`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/red-bass-free-79087099"},
		paiddownload: {url:"https://www.patreon.com/posts/red-bass-79087143"},
		decoration: {width:240,height:157},
		ui: {width:322,height:408,deg:20}
	},{
		title: "Scope",
		id: "sp",
		color: "teal",
		tagline: "Cool oscilloscope.",
		description: `
a neat oscilloscope with a skewmorphic design inspired by the electron beam scopes of the past.<br/>
<br/>
included inside are:<br/>
 - advanced sync algorithm that produces stable waves<br/>
 - waveform mode in addition to stereo-field xy panorama mode<br/>
 - adjustable colors and customizability`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/scope-free-118560672"},
		paiddownload: {url:"https://www.patreon.com/posts/scope-118561181"},
		decoration: {width:286,height:300},
		ui: {width:533,height:400,deg:15}
	},{
		title: "MPaint",
		id: "mp",
		color: "teal",
		tagline: "A sampler from a popular video game.",
		description: `
this one is a reproduction of a sampler present in a music making feature that was in a video game thats near and dear to my childhood.<br/>
this plugin attempts to preserve the unique voice limitations of the original sampler,<br/>
and the samples were recorded with a high quality reproduction of the soundcard of the originating console, preserving the unique artefacts of the digital to analog conversion of the original chip.<br/>
<br/>
<center><a class="demo" href="javascript:void(0);" onclick='setpopup(1, 0, "Demo made by @a1https://paperaviator.bandcamp.com/music@a2paper aviator@a3.", "/mp/demo1.mp3", true, false)'>▶ Demo</a></center>`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/mpaint-79087173"},
		decoration: {width:131,height:208},
		ui: {width:468,height:40,deg:40}
	},{
		title: "Pisstortion",
		id: "ps",
		color: "teal",
		tagline: "Advanced sinefold distortion plugin.",
		description: `
a better attempt at achieving what plastic funeral tried to achieve.<br/>
harsh and metallic fold distortion with a lot of controls and an innovative stereo widening algorithm.<br/>
guarenteed to destroy any mix.`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/pisstortion-free-79085897"},
		paiddownload: {url:"https://www.patreon.com/posts/pisstortion-79085974"},
		decoration: {width:94,height:300},
		ui: {width:242,height:462,deg:25}
	},{
		title: "VU",
		id: "vu",
		color: "teal",
		tagline: "VU meter for your VU metering needs.",
		description: `
very simple and to the point vu meter. has:<br/>
- stereo and mono modes<br/>
- scalable ui<br/>
- adjustable rise and decay speed<br/>
- adjustable nominal operation level (NoL)<br/>
- peak indicator`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/vu-free-version-79085437"},
		paiddownload: {url:"https://www.patreon.com/posts/vu-79085607"},
		decoration: {width:288,height:300},
		ui: {width:438,height:260,deg:30}
	},{
		title: "Plastic Funeral",
		id: "pf",
		color: "teal",
		tagline: "Distortion that sounds like a laser beam.",
		description: `
forget about warmth.<br/>
this refreshing take on fold distortion gives off a harsh and metallic sound that is guaranteed to destroy any mix.<br/>
this plugin has been mostly replaced by pisstortion.<br/>
<br/>
<center><a class="demo" href="javascript:void(0);" onclick='setpopup(1, 0, "Demo made by @a1https://soundcloud.com/the_real_astrodex@a2Astrodex@a3.", "/pf/demo1.mp3", true, false)'>▶ Demo</a> (loud)</center>`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/plastic-funeral-78716847"},
		paiddownload: {url:"https://www.patreon.com/posts/plastic-funeral-78717124"},
		decoration: {width:90,height:370},
		ui: {width:242,height:462,deg:25}
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
winner of the britpop awards <a href="https://www.instagram.com/p/DGdrw-wI3ae/?img_index=7" target="_blank">plugin of the decade</a> ????`,
		supported: ["Windows","MacOS","Linux","64 Bit","Open Source","VST3","Audio Unit","CLAP"],
		freedownload: {url:"https://www.patreon.com/posts/clickbox-79085747"},
		decoration: {width:150,height:300},
		ui: {width:256,height:256,deg:35}
	}
]
