---
title: Hello, (my) world
date: 2024-09-23
type: post
content_type: article
draft: false
slug: hello-world
category: Life
tags: ['blog_meta', 'social_media', 'cohost']
excerpt: Thoughts on social media, isolation, writing, and setting up this blog.
image: /blog/img/construction.gif
---
![CGI road construction barrier, with an orange light on top, reading "Under Construction"](construction.png)

Well, guess I'm here now. Please excuse the mess while I make this all look/function better.

I think one thing I've learned over the past couple years is just how much it sucks to rely on one or two places to exist socially online. I've never had the mental capacity to maintain an online presence on more than one social media site at a time, but goddamn does it feel bad having to pack it all up and move my primary online space every six months; whether because [some rich transphobic asshole that bought the site](http://web.archive.org/web/20240917175643/https://www.cnbc.com/2022/04/25/twitter-accepts-elon-musks-buyout-deal.html) has been [making it hell to exist on](http://web.archive.org/web/20240829140755/https://www.sfchronicle.com/politics/article/Elon-Musk-is-leaning-into-transphobia-17649577.php), or because [some rich transphobic asshole that bought the site](http://web.archive.org/web/20240917175901/https://www.theverge.com/2019/8/12/20802639/tumblr-verizon-sold-wordpress-blogging-yahoo-adult-content) has been [making it hell to exist on](http://web.archive.org/web/20240917180053/https://techcrunch.com/2024/02/22/tumblr-ceo-publicly-spars-with-trans-user-over-account-ban-revealing-private-account-names-in-the-process/), or maybe the one site that actually felt comfortable to exist on and was run by good caring people just [couldn't pay the bills](http://web.archive.org/web/20240917103538/https://cohost.org/staff/post/7611443-cohost-to-shut-down/).

I did write a short [post](https://web.archive.org/web/20240917180709/https://cohost.org/mervyn/post/7659823-well-fuck) on Cohost last week about how un-social I've been feeling lately, and how despite that it still has been a decent gut punch to learn that the place I've been feeling most comfortable is going away. I don't really have too much more to say that won't be just me failing to put my feelings into words, but suffice to say it doesn't feel great, even though I fully understand the position the site was in and that they did everything they could to avoid things reaching this point. I dunno, it sucks.

## So what now?

I've never been good at long-form journaling or maintaining a blog. Over the years I've failed to keep up with journal entries on deviantArt and Fur Affinity, and my Tumblr and Cohost pages always just ended up being more shares than my own thoughts. But... I dunno, something's been nagging at the back of my mind for the better part of a year, telling me I should try writing more. Honestly even well before the Cohost shutdown announcement I'd been thinking about adding a blog section to my website, something to make it more than just a "here's my profile links" landing page. I guess now's a good a time as any to really give that a try.

For now, I'm going to not force myself to do too much at once. The first order of business is to get this online and playing nicely with my existing landing page, then maybe I can look at tying the whole thing together so it's not just this out-of-the-box blogging platform with a bunch of years-old raw PHP hacked in to show my homepage. And in between all that I'll try to find time to write down my thoughts on... probably anything? I really don't know what I'm gonna talk about here yet. Maybe will spend more time with the hobbies I've been neglecting, so don't be surprised if I start posting some of my photography or talking about coffee or something. Keeping a public log of my interests and what I'm working on, that sounds nice. I hope it sounds nice to you too.

## Speaking of the blog

This is all still very much getting set up, and I'm actively writing this post in my notes app instead of on the site, but I think I'm gonna want to just get this online as soon as I can, before Cohost goes read-only. There's not gonna be much functionality past "here are my posts" for now because of that, and because I'm still trying to settle on exactly what kinda setup I want here.

Right now I'm using a neat little package for Laravel called [Prezet](https://prezet.com/), which is a Markdown-based blogging platform. I decided pretty much right away that I wanted a file-based system for this blog, for a few reasons:
- **I can more easily write from anywhere.** I don't need to be online at a desktop/laptop, logged into an admin panel to work on a post. I can just open up any notes app, possibly synced across my devices, and just jot down some thoughts in a simple and universal syntax. Lower friction == I'll probably write more.
- **I don't need to worry about maintaining a whole web stack.** As comfortable as I am doing whole server management, it's not something I want to dedicate that much time to for a small personal site. I spent quite a while playing around with porting my landing page to Laravel and getting complicated database relations set up for my social links before realizing that's all just... so much overkill.
- **It's extremely portable.** Sure I have a whole Lando/Docker container I spin up to work on the site and there are a multitude of dependencies to build and deploy, but everything I need to bring the site up anywhere can be contained within one repository. And, crucially, all of my posts can be saved in the repo too. I don't need to worry about database backups because all of the content is just in files. The only database Prezet uses is a single SQLite file for indexing and metadata.

I'm not 100% married to Prezet yet, and it does have some shortcomings I'm already seeing (some concerns about extensibility wrt adding new post metadata, but most egregiously it doesn't support embedding .gifs or even transparent PNGs, as I learned while writing this post), but it's been very quick to get set up, and has most of the core functionality I need at this point. I'd like to poke at setting up an RSS feed and... dare I even think about finding a way to allow comments (probably not, for a multitude of reasons)? The important thing is that my posts are just here in plain text, easy to read or move to any other platform at any time. Having that kind of ownership and control over my work is more important to me now than ever.

## So, really, what now?

Now? Now I see if I can stick with this, see what kinda things I feel good writing about, and hope that I can carve out a little spot for myself here on a page that's entirely mine.

If you do want to stay in touch with me directly, I still maintain a list of links on [my homepage](https://mervyn.online) that you can find me at. Time will tell how much I get back into bigger social media sites, but I welcome chatting with new and old friends alike, so feel free to hit me up on Discord or Telegram or wherever (I hear Revolt Chat is up and coming, may look into that).

Until then!

&mdash;Mervyn
