#!/bin/bash
if [[ $EUID -ne 0 ]]; then
	echo "This script must be run as root" 1>&2
	exit 1
fi
echo "--UPDATING PM2"
npm install -g pm2@latest
pm2 update
echo "--UPDATING NPM"
npm install -g npm@latest
echo "--FLUSHING LOGS"
pm2 flush
echo "--UPDATING UBUNTU PACKAGES"
apt-get update
echo "--UPGRADING UBUNTU PACKAGES"
apt-get upgrade
echo "--BYE BYE"
reboot