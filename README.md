# Twitter-Muter
Mutes users on twitter using Codebird (https://github.com/jublonet/codebird-php)

## Installation
Download files and upload to a directory on your website
Edit muter.php and edit the following: 
 - $CONSUMER_KEY = '';
 - $CONSUMER_SECRET = '';
 - $ACCESS_TOKEN = '';
 - $ACCESS_TOKEN_SECRET = '';
 
Run mute.php in your web browser

The script will go through all your followers and mute users who

 - Username is blank
 - Don't have a background image
 - Language is not Engish 

## RoadMap
- Turn off retweets for all users option
