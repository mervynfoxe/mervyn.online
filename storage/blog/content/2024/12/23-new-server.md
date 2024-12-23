---
title: New Server!
date: 2024-12-23
type: post
draft: false
slug: new-server
category: Updates
tags: []
excerpt: My biggest claim to fame is switching everything over without UptimeRobot even catching it
image: 
comments: true
comments_header:
---
Quick site update, I moved things over to a fresh new server today! I've been going through a lot of my monthly expenses lately and out of web hosting stuff AWS has been consistently costing me a good bit more than anything else so it's time to accept that I really don't need that scale of infrastructure for this site. For about a third of the cost I can spin up a small VM on [DigitalOcean](https://www.digitalocean.com/), and I've already been maintaining DNS with my email provider (which feels a little wrong to say but I'd rather that be the entrypoint to prioritize MX records automatically staying up to date).

This was a pretty quick spin-up of a fresh VM so I would not be at all surprised if I missed something. My [deploy process](../09/25-rebuilding-mervyn-online#content-3-push-it-live) seems to work just fine (actually a little cleaner, it's looking like I don't need to reset file perms every deployment anymore) and so far pages are all seemingly functional, so fingers crossed! Hopefully this post goes out just fine and you can read it on the site and any RSS readers. But if you do notice anything off please do drop a comment and let me know (or if somehow comments are what broke, [shoot me an email](mailto:site@contact.mervyn.online)).
