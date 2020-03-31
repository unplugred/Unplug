@echo off
:loop
SET /P _mode= [d]ebug/[p]roduction/[e]lectron?
If /I "%_mode%"=="p" goto p
If /I "%_mode%"=="d" goto d
If /I "%_mode%"=="e" goto e
goto loop

:p
echo "PRODUCTION MODE"
git pull
cd app
:pl
SET /P _start= [s]tart/[r]estart?
If /I "%_start%"=="s" goto ps
If /I "%_start%"=="r" goto pr
goto pl

:ps
pm2 start servprod.js --time
pm2 log
goto end

:pr
pm2 restart servprod.js --time
pm2 log
goto end

:d
echo "DEBUG MODE"
cd app
:dl
SET /P _start= [S]tart/[R]estart?
If /I "%_start%"=="s" goto ds
If /I "%_start%"=="r" goto dr
goto dl

:ds
pm2 start servdebug.js --time
pm2 log
goto end

:dr
pm2 restart servdebug.js --time
pm2 log
goto end

:e
echo "ELECTRON MODE"
cd app
:el
SET /P _start= [P]roduction/[D]ebug?
If /I "%_start%"=="p" goto ep
If /I "%_start%"=="d" goto ed
goto el

:ep
electron electprod.js
goto end

:ed
electron electdebug.js
goto end

:end
pause