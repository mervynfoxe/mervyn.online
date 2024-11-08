---
title: "The Great Email Migration"
date: 2024-11-14
type: post
draft: false
slug: the-great-email-migration
category: Life
tags:
  - email
  - life_organization
excerpt: Merv's saga of finally breaking free from the clutches of Gmail
image: /blog/img/het-gmail.png
comments: true
comments_header:
---
![Russian anti-alcohol poster showing a man refusing a drink, with the text "HET!" The drink has been overlapped with the Gmail logo.](het-gmail.png)

There's just something *freeing* about giving even a tiny "fuck you" to a massive corporation, even if they're too big to give a single shit about my morals.

Over the past month-ish I got it into my head that it's time to finally try and de-Google my life a bit. Not entirely by any means&mdash;aside from the fact that I still do find some of their services useful, it's unfortunately not very tenable to go 100% Google-free and live a normal life online&mdash;but even small steps are significant as far as I'm concerned.

> **Editorial Note:** This was originally supposed to be a semi-detailed post about how I've gone about setting up and using a terminal-based email client, but things kinda got away from me and it turned into a loooong post detailing a lot of aspects of my life with and relationship to email. I've decided to not let this be the computing equivalent of a cake recipe blog post, and am just gonna let this post be my experience with migrating email providers and mailboxes. I'm splitting off the more technical stuff into another post that I should hopefully have up soon!

## How we got here

Truth be told this project has more been driven by the desire to consolidate my online life a bit, particularly when it comes to email, and make managing accounts easier and cleaner. I touched on this in my [October update](08-fox-status-october) but I've built up a *lot* of email archives over my life. Technically my first personal email address came provided by our ISP in '99. We had just moved to North Carolina and got blazing fast new internet with Road Runner, and my parents kindly got 6-year-old me all set up with a fancy `nc.rr.com` address. Unfortunately, those archives are probably lost forever; Road Runner as a named service went away and after some time I lost access to that account, and the old [Dell Dimension](https://en.wikipedia.org/wiki/Dell_Dimension) I had everything downloaded to is long gone.

Thankfully, before TWC retired the Road Runner brand, some little-known startup by the name of Google launched their own (free!) email service. I can't say I jumped on it immediately, but sometime around late 2007 (when they added IMAP support) I decided I wanted an email I had some control over, instead of a mailbox monitored by my parents and attached to my legal name. So I signed up for the Gmail beta and soon got in!

To be honest most of the history between then and now is less interesting than how it all got started, but over the years my inbox went through a *lot* of changes. What started (and lasted for a while) as a way to <del>talk to</del> <ins>annoy the shit out of</ins> my school friends ended up becoming a hell-pile of Facebook or forum reply notifications, marketing emails, login codes, and newsletters I didn't sign up for.

![Screenshot of an email exchange on November 19, 2007 with the subject line: "Funny funny funny funny FUNNY movie!!!". Email from me to a list of anonymized recipients, reading: "Everyone, WATCH THIS MOVIE!!!!!!! If you've seen badger badger badger, you'll get it. It's still funny otherwise, tho. Oh, and [REDACTED], it's not youtube, so it should be ok for you to see. http://thefifthdistrict.com/potter/ -- Pie sure is funny. Do not question it." Email from an anonymized sender to me, reading: "okay... wat is it?"](old-email-3.png)

![Screenshot of an email exchange on December 14, 2007. Email from me to a list of anonymized recipients, reading: "Just so you know, everyone, I just got a facebook. Add me to your friends! Name is obvious ([REDACTED]), and my profile is the one filled with all the random stuff (I worship pie, I am gay, I live in Antarctica, I am the president of Apple, etc.) soo... yeah... -- Pie sure is funny. Do not question it." Email from an anonymized sender to me, reading: "oh, so that is why u act so strange u r gay. that is funny. so then u and [REDACTED] go out then. invite me to your wedding. I wonder which one of you will have the kids!"](old-email-2.png)

![Screenshot of an email from an anonymized sender to me, reading: "why are you doing all this random stuff? Facebook, MyTI, and now this??? :(("](old-email-1.png)

![Screenshot of an email from an anonymized sender to me, with the subject "so many emails...", reading: "i just realized, i have gotten two hundred eighty-six emails in 19 days!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!"](old-email-4.png)

> I was a hellion the second I got this account. Those were the good old days.

I also went through more than a couple identity changes overtime. Not so much in the "I'm trans" sense since that revelation somehow didn't happen until over a decade later, but I started shifting away from the complete "lol random \*holds up spork\*" personality I maintained through middle school (which was very much reflected in that first gmail address), and separately found the need to once again maintain a more "professional" address as I started to look at college and find work. At the same time, constantly logging into and out of Gmail accounts was a pain, so instead of dealing with that I set up all of my new addresses to forward to that original inbox. At this point, I had other services like Google+, phone app purchases, and all sorts of stuff tied to that account, so it cemented itself as my "main" account even though it was the address I wanted to distance myself from the most. I actually just looked and I haven't received an email to that address from another actual person since February 2012. And yet it's saved in my password manager as "Google - Main."

## Deciding to migrate

So! Back to what I was saying before taking that trip down memory lane, I realized that it's a lot easier to manage one mailbox than a scrillion, but needed a cleaner way of doing so than what I had been doing. Additionally, I really wanted to get myself set up with email on my own domain. Professionalism/cool factor aside, using my own domain would make any future migrations easier, since I can just update DNS records to whatever future provider and not have to set up Yet Another Forward and update a ton of online accounts.

And, like I said, a chunk of this is also wanting to move at least a bit away from Google. There's a couple caveats here that make this not my primary reason, but it's worth mentioning since it is something I'm aiming to change a bit in my online life.

## But where to?

Despite Gmail's domination of the email address space, there's a lot of different email providers out there! They're hosted all over the world and with a wide variety of features, price ranges, and security options. This isn't a full review post I'm making here so I'm not going to go into too much detail on the options I didn't end up with, but I did spend a good bit of time researching what was out there, and thinking about what I wanted or needed out of a provider. And I promise none of this is any sort of paid promotion, I'll probably end up sounding a bit like I'm trying to sell something but I'm mostly just excited about trying new things.

Ultimately, it came down to a few key criteria, coming from things I do/don't like about Gmail or other providers I've tried in the past:

1. Must have IMAP support so I don't have to use a proprietary web/phone app.
    -  Ideally "true" IMAP instead of whatever the fuck Gmail is doing with its label mapping.
2. Must allow custom domains, and ideally multiple domains within one account (so I can collect both my personal and work emails to the same inbox without setting up forwarding).
3. Ideally allow native alias support, masked addresses a plus so I don't have to rely on separate services like [SimpleLogin](https://simplelogin.io/) or [Firefox Relay](https://relay.firefox.com/) (though they are both great services I've used in the past).
4. Ideally some form of contact/calendar support, so I can move those off of Google as well.

Looking online at the countless "what email provider do you use?" forum and Reddit threads, a few names (that aren't Gmail/Yahoo/Hotmail/etc.) stood out:

- [Proton](https://proton.me/mail)
- [Tuta](https://tuta.com/)
- [Fastmail](https://www.fastmail.com/)
- [PurelyMail](https://purelymail.com/)
- [mailbox.org](https://mailbox.org/en/)
- [Zoho](https://www.zoho.com/mail/)
- [Hey](https://www.hey.com/)

There's a good range here from fully-independent providers (PurelyMail is [maintained by one guy](https://purelymail.com/about)) to large, well-known companies. And they all seem like good, reputable providers.

That said, I was able to rule out a couple off the bat. As popular as Proton is (and I actually do still have a free account with them), their focus on security and encryption doesn't quite fit my risk model. The trade-off for E2EE email (that's a lot of E's) is it ranges from a pain-in-the-ass to impossible to manage your mailbox from anything other than their official clients. The bridge app for desktop seems annoying to deal with (admittedly I haven't actually tried), and on mobile you're forced to use their app no matter what. On top of that, the Proton suite provides more than what I'm looking for; I don't need a bundled VPN and password manager and everything, especially for $120/yr.

Tuta got cut for much the same reason. They're very privacy-focused, but they straight up don't have any IMAP/SMTP support at all. If I really need to have encrypted conversations, I can easily do so on a per-email basis with GPG.

Hey sounds neat on the surface and seems to be pretty popular, but dear lord is it over-engineered for my needs. I'm specifically trying to get away from a service that thinks it knows how to sort my emails for me, and if I wanted to bring in my custom domains I'd end up paying more *each month* than an entire year of almost any of the other options. I believe they also don't support IMAP at all so. No thanks.

PurelyMail seemed very attractive at a wildly cheap $10/year, and I do like the idea of supporting small companies/devs, but in the end they don't *quite* fit my needs. It's email only, no included calendar or contact syncing, which isn't itself a deal-breaker but other services did offer this all rolled in. More importantly, as this is such a big personal project for me, I want to get it done with a service that has proven reliability, and I do have some concerns about managing such a large mailbox under a provider with a one-person team if things get screwed up at any point.

Finally, mailbox.org, Fastmail, and Zoho. These all seemed like pretty comparable options, with the main differences being their client interfaces and where they're hosted. I actually didn't spend as much time as you may think pondering over these. Despite being a tad more expensive, Fastmail ended up the winner for me. They checked off all my boxes and even have some nice features I didn't expect to like as much as I do (namely catch-all aliases). They've been around for decades and have proven to be reliable, and they've even heavily invested in the development of email standards and the JMAP protocol, which if nothing else tells me they actually give a shit about email and aren't going to give me some warped IMAP implementation. Their biggest downside (and it really is a serious consideration) is that they're hosted in Australia, which are part of the [Five Eyes](https://en.wikipedia.org/wiki/Five_Eyes). So for privacy I'm not gaining everything by moving here from Google, but again if I truly need privacy I'm not going to be using plaintext email. And a big goal here is to not be having my emails actively scanned for advertising purposes, so that's a big plus.

## Setting up the inbox

Before I could even think about consolidating my archives, I had to get the new account all up and running. This sounds straightforward enough, but since part of this Whole Thing is also changing how I manage email, I wanted to put some thought into organization. This is mostly going to be me talking about what I think will work for me (and tbh I'm still feeling things out), but hopefully it can serve as a good point of reference for anyone else looking to change up their inbox management!

### Where do the emails go...?

First off, I wanted to start being a lot more rigorous about keeping my inbox to a minimum. Back in the day I didn't even hit the "Archive" button in Gmail; everything was in the inbox forever and ever, and if I needed to remember to get back to something I kept it marked as unread. This of course meant I never actually got around to anything I meant to get around to, and things got lost very easily if I forgot to mark unread or just let new emails pile in and push something important off the screen.

I finally changed up my habits a bit when [Inbox](https://en.wikipedia.org/wiki/Inbox_by_Gmail) was introduced. I got in during the invite period and used the precious few years I had with it, before Google did its Google thing and killed it off, getting my mailbox under control. Things I didn't need anymore got archived and anything I might still need stuck around. This wasn't perfect but having an inbox of a few hundred emails instead of tens of thousands was a big improvement. I've kept up those habits since Inbox's shutdown, hitting Archive whenever I'm done with an email. But this still isn't really ideal. For one, I've never had any real organization method for *when* I wanted to get back to something (the email snooze functionality never stuck for me). So I'd still have a decent pile of emails in the inbox that had some nebulous "I might need this at some point?" mental note attached to them, but they weren't actionable. Secondly, my archive was now the space in my mailbox that was out of control. Because I never actually *deleted* anything, the archive became a monolith of all the stuff I actually wanted to archive and every other spam/OTP/newsletter email that I truly would never need again.

So time to finally change that!

First and foremost, I made the decision to switch from labels to folders. Fastmail lets you choose either method, and freely swap between them. Labels behave more like Gmail; an email can have multiple labels to categorize it, there's a default "Inbox" label that gets applied to incoming mail, and the archive ("All Mail") is simply a list of emails that don't have the Inbox, Spam, or Trash label. I don't like this at all, I've decided. I want archiving an email to be a more intentional action, instead of "oh this isn't in the inbox anymore so it gets lumped in with everything else." On top of that I already mentioned how much I dislike Gmail's weird implementation of IMAP, and a big part of that is how labels get mapped to folders when synced to a local client. That means any email with multiple labels gets duplicated into multiple folders and takes up extra space, and adding/removing labels means copying or deleting an email from a single local folder. Which means that to "delete" an email can mean two things from a technical standpoint, and I don't like that.

So I'm using folders. Next step is deciding what those folders should be. I wanted to have a clear way of organizing things based on what area of my life they fit into. So a place to dump emails related to work, travel, development (not as part of a job), and social stuff seemed pretty obvious. But making a handful of folders that I'd have to check up on regularly would also be messy and time-consuming, and I want a setup that can facilitate an actual "workflow" for dealing with my inbox. I've been a fan of the [GTD](https://en.wikipedia.org/wiki/Getting_Things_Done) methodology when it comes to work, and while I'm far from a zealot about it I've found it useful enough to try and incorporate a bit here. After some thought I ended up with this:

![Screenshot of a list of email folders, as follows: 1.Today, 2.This Week, 3.This Month,4.Backlog, Social, Dev, Work, Lists, Updates, Promos, Finance, Home, Health, Travel, Commissions, Downloads](fastmail-folders.png)

All of the non-numbered folders are still kinda subject to change as I decide if they're useful, but the important ones are those first four. Whenever I go through my inbox, I take a glance at each email and decide if it's something I can *do* something with, and if so *when* I should do something about it. If I have to reply and can do so within a few minutes, I just get it out of the way and do so (granted I haven't received many emails that fall under this category since starting this system, so it remains to be seen how this works out in practice). If it's important but not something I can deal with immediately, it gets sorted into one of those four folders so I can keep track of when I do need to take care of them. I'm not as rigorous about keeping "un-actionable" emails out of those folders; if I get a receipt or a notice of a new Patreon post that I can't technically reply to but want to remember exists later (e.g. logging the purchase in my budget or looking at an artist's latest drawing of naked animal people on not-my-work-computer), those get sorted too. But anything else gets either moved into a category folder or immediately deleted. And if it's some marketing nonsense that I definitely didn't sign up for but some website decided I wanted to see anyway, I take a moment to unsubscribe and/or block the sender.

As for the Archive folder, I haven't fully figured that out yet. If I'm categorizing emails into folders after they're no longer "actionable," what goes in the archive? Maybe that's where I'll put my actual conversations, where the threads between friends can go when the topic's closed and done. That'll be my version of a desk drawer full of letters to look back on someday. I dunno, I'll figure those things out as they come I suppose.

So far this setup has been a huge mental relief though, since I've been dealing with a lot of "verify your email" or "here's your login link/passcode" emails as I move various online accounts over. I've been able to quickly deal with and trash those as they come, and that leaves space for actually reading and replying to the emails from real people (few they may be). I'm going to try and stick with this workflow for a good while, and make sure it does work for me, but after a few weeks of working this way it's felt very Nice!

### ...and where do they come from?

The other piece to all of this is managing how emails get to me in the first place. Email spam is a forever problem that I don't think is going anywhere, but there are some steps I can take to help cut down on it.

With Gmail, they've long since offered an aliasing functionality to help categorize emails as they come in. If your address is `XxTheDarkOnexX@gmail.com` you can give someone `XxTheDarkOnexX+banking@gmail.com`, and any emails they send to that address still come to your inbox. This lets you set up filters to direct any mail sent to that address to a folder/label, and also can alert you if a company starts selling your data (if you start getting emails from CryptoCoinBank, Inc. directed at `furryfox91+mcdonalds@gmail.com`, you know exactly who sold you out).

There are a couple of issues with this specific approach, however. The more minor one is pure preference for me but I think that aliasing method looks a little ugly. I prefer clean and concise addresses where possible, and this just feels messier to me. The bigger issues are that this method is both more obvious and more likely to run into verification issues. If a website form is dumb it may be very strictly pattern-matching something like [`[A-Za-z1-9]+@[A-Za-z1-9]+\.[A-Za-z]{3}`](https://regex101.com/r/NDdVga/1), which would reject any address with non-alphanumeric characters (not to mention any TLD with more than 3 characters like `.co.uk`). And if a webform is *smart*, it'll know that everything after the `+` is superfluous and be able to strip it out and have your base address anyway.

There are two much more preferable approaches here. I'm making a mixed use of both:

1. Masked addresses. These are completely randomly-generated addresses that have no direct association with your inbox, and simply serve to forward/redirect any emails to you while keeping your actual address completely secret. There are a few services that offer this functionality on its own, like SimpleLogin and Firefox Relay, mentioned above. Fastmail has their own masked email functionality built in so I'm just using that since it lets me keep everything in one place, and they even integrate nicely with my password manager so I can generate a new address while creating an account somewhere in a single step.
2. "Email Address" aliases and catch-alls. These are effectively the same as a plus-address alias, but their setup will differ a bit between providers, and importantly they're formatted more cleanly and can fully obfuscate your "true" address. For example, even though I might own the domain `example.com` and have my actual address be `me@example.com`, I can sign up for a site with `facebook@example.com`. Emails sent to that address still come to me, are much more likely to be accepted by form validation, and there's nothing linking that address to my main one. If I start getting spam to that alias I can just delete/block it. And if I want to take things a step further, I can also buy `domain2.com` and give certain sites `something@domain2.com`, providing even more obfuscation (though at this point I may be better off generating a masked address, depending on what I'm signing up for).

All together, I'm hoping that I can really crack down on spam (and set up rules to help categorize incoming mail) much more effectively this way. I'm sure it's not a completely watertight system&mdash;I still have my general contact email listed on my [homepage](/) and I'm sure some web crawler is smart enough to scrape that&mdash;but it should help a lot.

## Bringing the old stuff over

Of course though, it couldn't be all quite so easy. Despite my desires to cut down on all the email cruft, I'm a horrible horrible data hoarder (side-eyeing my 15TB+ of storage in my desktop that's perpetually near-full). So I couldn't let myself just say fuck it and start fully fresh. No, I needed to import all of my old mailboxes into this new account because I'm just Like That. So I sat out to take on the incredibly daunting task of sorting through 17 years of Gmail history, to trash things I don't actually need, and categorize things I do/might.

Spoiler alert, this part of the project hasn't gone at all according to plan, for better or worse.

The first step within this step is to run a simple mailbox migration. This was pretty straightforward with the built-in tools Fastmail has, that let you just sign in with Google to pull everything in (as well as a host of other services, direct IMAP connection, or MBOX upload), but if it came to it I was ready to download my entire archive and manually sync things over.

I decided to start small and migrate my two most recent Gmail accounts first. These accounts were created within the past few years, when I started leaning more into my identity as Mervyn and also began pursuing a legal name change. As a result these mailboxes were pretty painless to bring in; one of them had only a few hundred emails total, and everything I wanted to keep was already nicely labeled. The most I had to do was sort through a few threads with multiple labels to deduplicate them.

The other account was slightly larger and less organized, but still only a couple thousand total emails, and most of them were from predictable noreply addresses so they were easy to run a search on and mass-delete. Deduplication was a bit more of a pain here. A lot of correspondences had labels applied to the thread as a whole in Gmail, which reasonably equates to each email in that thread getting put into a matching folder. But that included emails I sent in those threads, so I had to spend some time sorting through those and removing everything *from* me from those individual folders, while making sure they remained in the Sent box. This was more than a little awkward to do in the web interface so I ended up just doing it all on my computer and syncing the maildir back up.

While I was at it I also set up continuous mail fetch, so I could keep pulling in any new mail to those old addresses. Since it's going to be a while before I have all my online accounts updated with new aliases, I would still like to spend less time signed in to multiple different places for email. For now I just have a rule set up to direct newly imported email to a dedicated "Inbox - Gmail" to remind me that anything coming in there should be updated.

And then I got to my "main" account.

This is where I started to break down mentally. Right off the bat it's intimidating enough, looking at near-exactly 17 years worth of emails and trying to conceptualize how much that might add up to (that's over half of my entire life so far!)

The grand total? Well, I don't have an exact count because of Gmail's grouping of email threads and duplication across labels, but I scanned my synced archive on that account and came up with nearly **202,000** total emails. Add in everything in my sent box and it's closer to 213,000.

Yeah, I've got my work cut out for me.

After working up the courage to do so, I kicked off the migration before bed one night, not sure how long it would take to complete. By the time I woke up it was all done, with seemingly no issues! I dumped everything that got imported into a subfolder to deal with over time, so I could keep the rest of my inbox/workflow moving smoothly. In fact, I went ahead and sorted through the imported inbox with my new methodology, and quickly brought it down from 70-something to zero.

I spent chunks of time over the next few days trying my best to sort through things. I had a handful of labels/folders that thankfully were well-organized; stuff like everything involving my high school robotics team, or everything from college. These were easy to deal with. The hardest part was telling myself that no, I didn't have a real need to keep around the folder of topic reply notifications from the Warrior Cats RPG forums in 2009. Some of the other labels I waffled back and forth on for a while, ultimately opting to keep things like correspondences with clients when I did freelance work. I doubt I'll ever really need those emails but I can at least categorize them cleanly.

The Archive folder has, by *far*, been the worst to deal with. I started off doing a few mass searches for emails from domains I knew I could delete; mostly any companies and mailing list/newsletter updates. Then I went for things like old receipts and long-since paid invoices, having to manually sort through those results to make sure I pulled out anything actually important (namely, invoices for something I'm still waiting to receive, or for very significant purchases like my car or fursuit). After dozens of mass deletions from filters like `from:("pizza hut" OR "wendy's" OR "newegg" OR "united-ti.org")` I had surprisingly managed to trim the archive down by about 90k. Not bad at all!

That's when things got tough though. Because amongst the remaining swaths of emails, many of which my searches hadn't caught but still needed to go, were countless threads involving actual people. Conversations with friends, partners, family, professors, and online acquaintances from years ago. The hard part was no longer picking out the automated trash, it was looking through the human connections that happened.

I'm now certain that one of the hardest things in the world is reading a thread between you and your best friend that you haven't talked to in a decade, and making the decision to click delete.

Ultimately, I couldn't actually make that decision. At least not on an individual basis. Instead I spent days reading through those old conversations. Reliving memories of what I now recognize as a simpler time, even though I didn't appreciate it for what it was back then. Remembering the names of people I haven't thought about in too long. All those 10+ person threads I started to be annoying at my friends in, sending stupid memes and jokes for days on end.

Reading texts between myself and the first partner I had after realizing I wasn't straight, reading texts between myself and them *on the day of* realizing I wasn't straight.

I shook myself out of it, eventually. I logged into that old Gmail account one more time, started up a takeout request to download my entire mailbox, backed up the 10GB file for safekeeping, and deleted the entire remaining imported folder from Fastmail. It's time to start a new desk drawer of letters, and to store the old one safely in the attic. Maybe I'll have a need, or a desire, to revisit those memories someday. But until then they should remain truly archived.

With that done, I now, finally, had everything set up nicely for myself. Shiny new email addresses, detailed organization methods, and a plan to try and make the most out of having an email account.

## But what does it all mean?

In the end, the question that really matters is: what am I hoping to get out of all of this? Am I just making a big deal over something as simple as a new email address? People change emails all the time, why is this worth a 5,000-word essay? All very good questions. I'm sorry for the 5,000 words.

But I guess what it boils down to is... this isn't just a new address (or set of aliases or what have you). This is me taking my first steps in a long time at taking some real control over my life and presence online. This is all part of a shift in how I want to engage with the internet, with social media, and with people. For years my inbox was not too different from any given social media feed; endless lines of content to scroll past, glance at, and click away from, with more advertisements visible at any given time than anything coming from a real person. But it doesn't have to be like that at all. Now more than ever, there's little that's more valuable than real human connection. Now that I'm this far into it, I realize that's what I want from this project: a mindset where I can focus on people, and on being a person. Is that pretentious? Sure as hell. Is it still a worthy aim? I think so.

In the end it's not even really about de-Googling. It's a nice moral stance to take, but a less achievable goal than my own. After all, [Google Has Most of My Email Because It Has All of Yours](https://mako.cc/copyrighteous/google-has-most-of-my-email-because-it-has-all-of-yours).

Thank you for reading,

Mervyn Fox
