@echo off
:loop
SET /P _mode=[d]ebug/[p]roduction/[e]lectron? 
If /I "%_mode%"=="p" goto p
If /I "%_mode%"=="d" goto d
If /I "%_mode%"=="e" goto e
goto loop

:p
echo PRODUCTION MODE
git pull
pm2 startOrRestart ecosystem.config.js --env production
pm2 log
goto end

:d
echo DEBUG MODE
:dl
SET /P _start=Sure? [y/n] 
If /I "%_start%"=="y" goto ds
If /I "%_start%"=="n" goto end
goto dl

:ds
pm2 startOrRestart ecosystem.config.js
pm2 log
goto end

:e
echo ELECTRON MODE
:el
SET /P _start=[p]roduction/[d]ebug? 
If /I "%_start%"=="p" goto ep
If /I "%_start%"=="d" goto ed
goto el

:ep
electron "./unplug/electricfeel.js"
goto end

:ed
electron "./unplug/electricfeel.js" --debug
goto end

:end
pause