# Project_security

Website Security, Anti-Spam & Firewall
Item Details Support
Project SECURITY is a powerful website security app that will protect your website from hackers, attacks and other threats. It could protect your website from SQLi Attacks (SQL Injections), XSS Vulnerabilities, Proxy Visitors, Spammers and many other types of threats.

Description
Project SECURITY is a powerful website security app that will protect your website from hackers, attacks and other threats. It could protect your website from SQLi Attacks (SQL Injections), XSS Vulnerabilities, Proxy Visitors, Spammers and many other types of threats.

It uses an intelligent algorithms (similar to the ones used by major industry companies) to detect all known hacker attacks as well as new unknown threats using code recognition and patterns, and automatically takes action.

Project SECURITY comes with powerful admin panel from which you can view all logs and it is also integrated with Ban System from which can be viewed and banned users and countries. The Admin Panel has many features and settings. Through it can be easily managed the security of your website.
---------------------------------------------------------------------------------------------------------------------------------------------------------
 ## Features
 
## SQLi Protection
Protection from SQL Injections (SQLi) and XSS Vulnerabilities (Cross-Site Scripting).
## Proxy Protection
Protection from Proxy, VPN and TOR Visitors or so-called people hiding behind proxies.
## Spam Protection
Protection from Spammers and Spam Bots that aim to spam your website.
## Input Sanitization
Protection Module that automatically sanitize all incoming and outgoing requests and responses.
Bad Words Filtering
Protection module that filters profanity, bad words, bad links, bad sentences and other bad content in real-time.
## DNSBL Integration
Integration with some of the best Spam Databases (DNSBL) to protect your website from Bad Visitors.
## Intelligent Pattern Recognition
Detects Unknown and Zero-Day Attacks and Exploits.
Industrial-Strength Algorithms
Detects Known Hacker Attacks.
 ## Ban System
Helps you to block and redirect Visitors / Users (IP Addresses), Countries, IP Ranges, Operating Systems, Browsers, Internet Service Providers (ISP) and Referrers.
Bad Bots and Crawlers Protection
Blocks many Bad Bots and Crawlers that will waste your website bandwidth.
## Fake Bots Protection
Verifying search engine bots that visit your website whether they are real or fake bots.
Headers Check
Every visitor's response headers will be checked and if there are suspicious objects their access to the website will be denied.
Real-Time Scanning of All Requests
GET, POST and other types of data.
## Auto Ban
Function that will automatically block attackers and threats such as Bad Bots, Crawlers and other.
## Threat Logs
Each threat and attack is logged into the database, so you can view them later. (No duplicates)
## Detailed Logs
The logs contain many information about the Threat / Attack like Browser, Operating System, Country, State, City, User Agent, Location on the Map and other useful information.
## IP Lookup
Tool that help you investigate IP Address and check if it is blacklisted.
## E-Mail Notifications
You will receive an E-Mail Notifications when attack or threat is detected.
## Dashboard with Stats
On the Dashboard you can check the Stats for the protection of your website.
## Useful Tools
Collection of Tools such as .htaccess Editor, Hash Generator and other.
## Errors Monitoring
Useful tool that shows all logged errors from your website.
## .htaccess Editor
Edit your .htaccess file directly from the Admin Panel, no need to open it in any external editor.
## IP & File Whitelist
A list of IP Addresses and Files that will be ignored by the app and will not be blocked.
## Live Traffic
Observe your visitors in real time as they interact with your website.
## Visit Analytics
Track and analyze how people use your website.
PHP Configuration Checker
Check current PHP Configuration for potential security flaws.
## System Information
Page with a huge amount of information and statistics about your web host.
Very Optimized
The script is very lightweight and won't slow down your website loading time.
Fully Responsive
Looks good on many devices and screen resolutions.
Easy to setup
The script is integrated with Installation Wizard that will help you to install the app.
Easy for use
Include only one line of code in one main .php file of your website to protect it.
and many more...
Requirements
PHP
MySQL

--------------------------------------------------------------------------------------------------------------

 ## Installation & Integration
Create a subfolder named “security” under your website’s root directory (www / public_html) via FTP or File Manager
Upload the files from the "Source" folder of the script into the newly created subdirectory
Set CHMod 777 permissions to the "security" folder and all its subfolders and files
Create a MySQL database (Your hosting provider can assist)
Visit your website where you uploaded the files (For example: yourwebsite.com/security)
The Installation Wizard will open automatically, just follow the steps
Copy the Integration Code that you will see at the end of the Installation Wizard
Put the copied Integration Code in the top (or bottom) part of one main .php file of your website
(Examples: index.php file; database config (connection) file; functions file; header file; core file that is included in all other .php files)
Integration code:
include "security/config.php";
include "security/project-security.php";



Note: If you are updating the script replace all its files with the updated except config_settings.php.
If problems appear delete the config.php file of Project SECURITY and follow the Installation Steps. To backup your data export all Project SECURITY related database tables.

Update instructions for v4.8 => Run these SQL queries in PHPMyAdmin:
ALTER TABLE `psec_bans` CHANGE `ip` `ip` CHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `psec_bans-ranges` CHANGE `ip_range` `ip_range` CHAR(19) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `psec_ip-whitelist` CHANGE `ip` `ip` CHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `psec_live-traffic` CHANGE `ip` `ip` CHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `psec_logs` CHANGE `ip` `ip` CHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;
ALTER TABLE `psec_logins` CHANGE `ip` `ip` CHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL;


Update instructions for v5.0.6 => If you use SpamHaus DNSBLs in SPAM Protection Module, please change to different DNSBL which is active (for example bl.spamcop.net)
Sources and Credits
Font Awesome Icons - FontAwesome.com
Bootstrap Framework - GetBootstrap.com
DataTables - DataTables.net
jQuery - jQuery.com
AdminLTE - github.com/almasaeed2010/AdminLTE
Select2 - select2.github.io
OpenLayers - github.com/openlayers/openlayers
Chart.js - Chartjs.org
Flag Sprites - Flag-Sprites.com
iP.NF - ip.nf
ipapi.co - ipapi.co
IPHub - iphub.info
proxycheck.io - proxycheck.io
IPHunter - iphunter.info
Switchery - abpetkov.github.io/switchery
Popper.JS - popper.js.org
OverlayScrollbars - github.com/KingSora/OverlayScrollbars
