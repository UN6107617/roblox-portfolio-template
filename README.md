# Roblox Developer Portfolio Template

A modern and responsive portfolio template specifically designed for Roblox developers. This template bridges the gap between your Roblox profile and a professional web presence.

## How It Works

This version no longer connects directly to Roblox endpoints.

Instead, it uses a custom API that handles:
- Fetching Roblox data
- Caching responses for 1 hour
- Reducing request load
- Preventing IP rate limits or temporary blocks

This ensures better performance, reliability, and compatibility with hosting providers.

## Automatically Fetches

Public Experiences using the API  
Avatar headshot for profile picture and favicon  
Game thumbnails and descriptions  
Dynamic SEO meta tags based on your configuration  

## Features

Single file setup (index.php)  
PHP based with no database required  
TailwindCSS styling  
Automatic game thumbnails and descriptions  
Tech stack modal for skill details  
Custom extra projects support  
SEO ready for Discord and Twitter previews  
Mobile responsive design  

## Requirements

PHP hosting (Version 7.4 or higher)  
cURL extension enabled  

## Live Demo

https://UN6107617.dev

The demo showcases:

Automatic game fetching  
Dynamic avatar loading  
Responsive layout  
Tech stack modal system  
Contact link configuration  

## Free Hosting Guide

Since this template uses PHP, it cannot be hosted on static platforms like GitHub Pages.

Use these alternatives instead:

FreeHostia  
Sign up for the Chocolate free plan  
Upload index.php via the File Manager  

InfinityFree  
Upload your file to the htdocs folder  
Free subdomains included  

Cloudflare Security  
Use Cloudflare for SSL  
Enable Proxy and Always Use HTTPS  

## Installation

1. Download index.php  
2. Open the file in a text editor  
3. Edit the configuration section at the top  
4. Define variables such as roblox_id, theme_color, bio, and title  
5. Upload the file to your hosting provider  

## Configuration

Basic settings:

roblox_id = "123456789"  
name = "YourName"  
title = "Roblox Developer"  
bio = "Your description"  

Extra projects can now be added:

extra_projects = [
    
        name: "Project Name",
        desc: "Description",
        image: "https://...",
        link: "https://..."
    
]

## API Usage

Endpoint:
https://api.un6107617.dev/portfolio/{userId}

Returns:
User avatar  
Public Roblox games  
Game thumbnails  
Game descriptions  

Example:
https://api.un6107617.dev/portfolio/319189457

## Caching

All API responses are cached for 1 hour.

Benefits:
Faster load times  
Reduced API requests  
Prevents Roblox rate limiting or IP blocking  

## Notes

No API key required  
No authentication required  
Uses external API for data fetching  
cURL must be enabled on the hosting environment  
Responses are parsed using JSON in PHP  

## Also Available as HTML Version

A fully static HTML version of this portfolio is also available.

This version does not require PHP and can be hosted on platforms like GitHub Pages. It uses the same API system with caching for optimal performance.

View the HTML version here:
https://github.com/UN6107617/roblox-portfolio-template-html/

## License

Custom Free License with attribution required

You may:
Modify the template  
Use it for personal or commercial projects  

You may not:
Remove the visible footer credit  
Remove the HTML license comment  
Claim the template as your own work  
Redistribute as your own template  

Credit removal requires a paid license  

## Copyright

Copyright 2026 UN6107617
