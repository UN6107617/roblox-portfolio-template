# Roblox Developer Portfolio Template

A modern and responsive portfolio template specifically designed for Roblox developers. This template bridges the gap between your Roblox profile and a professional web presence.

### Automatically Fetches:
* Public Experiences: Displays games directly from the Roblox API with live icons.
* Avatar: Your current headshot is used for the profile picture and favicon.
* Dynamic Meta: Generates SEO tags based on your configuration.

## Features

* Single file setup (index.php)
* PHP based with no database required
* TailwindCSS styling
* Automatic game thumbnails and descriptions
* Tech stack modal for skill details
* SEO ready for Discord and Twitter previews
* Mobile responsive design

## Requirements

* PHP hosting (Version 7.4 or higher)
* cURL extension enabled


## Live Demo

You can view a live demonstration of the portfolio system here:

https://UN6107617.dev

The demo showcases:

- Automatic game fetching
- Dynamic avatar loading
- Responsive layout
- Tech stack modal system
- Contact link configuration


## Free Hosting Guide

Since this template uses PHP to fetch live data, it cannot be hosted on static platforms like GitHub Pages. Use these free alternatives instead:

### 1. FreeHostia
Recommended for an ad-free experience.
* Plan: Sign up for the Chocolate free plan.
* Setup: Upload index.php to your root directory via the File Manager.

### 2. InfinityFree
* Setup: Upload your file to the htdocs folder.
* Feature: Provides free subdomains.

### Cloudflare Security
To ensure a professional appearance with an SSL certificate (HTTPS), it is recommended to use the free tier of Cloudflare. Enable the Proxy (Orange Cloud) and activate Always Use HTTPS in the SSL/TLS settings.



## Installation

1. Download index.php.
2. Open the file in a text editor.
3. Edit the configuration section at the top (Lines 7 to 51).
4. Define variables such as roblox_id, theme_color, bio, and title.
5. Upload the file to your hosting provider.


## Docs

This portfolio system uses official public Roblox Web APIs to dynamically fetch game and avatar data.


### 1. User Created Games

API Endpoint:  
https://games.roblox.com/v2/users/{userId}/games  

Official Documentation:  
https://create.roblox.com/docs/en-us/cloud/reference/domains/games?auth=none#games_get_v2_users__userId__games  

Description:  
Returns a list of public experiences created by the specified user.

Used for:
- Fetching public games
- Retrieving universeId and rootPlaceId
- Displaying game name and description

Parameters used in this project:
- accessFilter=2 (Public games only)
- limit=10
- sortOrder=Asc

Example:
https://games.roblox.com/v2/users/319189457/games?accessFilter=2&limit=10&sortOrder=Asc


### 2. Game Thumbnail Assets

API Endpoint:  
https://thumbnails.roblox.com/v1/assets  

Official Documentation:  
https://create.roblox.com/docs/en-us/cloud/reference/features/thumbnails?auth=none#thumbnails_get_v1_assets  

Description:  
Returns thumbnail images for Roblox assets.

Used for:
- Fetching visual preview images for games
- Displaying thumbnails inside the portfolio cards

Note:  
This project specifically uses the games icons endpoint under the thumbnails domain.


### 3. User Avatar Headshot

API Endpoint:  
https://thumbnails.roblox.com/v1/users/avatar-headshot  

Official Documentation:  
https://create.roblox.com/docs/en-us/cloud/reference/domains/thumbnails?auth=none#thumbnails_get_v1_users_avatar_headshot  

Description:  
Returns the avatar headshot image for a specific user.

Used for:
- Displaying the developer profile picture on the homepage

Parameters used:
- userIds
- size=420x420
- format=Png
- isCircular=false

Example:
https://thumbnails.roblox.com/v1/users/avatar-headshot?userIds=319189457&size=420x420&format=Png&isCircular=false

## Notes

- All endpoints used are public.
- No authentication or API key is required.
- cURL must be enabled on the hosting environment.
- Responses are parsed using JSON decoding in PHP.



## License

Custom Free License – Attribution Required

You may:
* Modify the template.
* Use it for personal or commercial projects.

You may NOT:
* Remove the visible footer credit.
* Remove the HTML license comment.
* Claim the template as your own work.
* Redistribute as your own template.

Credit removal requires a paid license.

Copyright 2026 UN6107617
