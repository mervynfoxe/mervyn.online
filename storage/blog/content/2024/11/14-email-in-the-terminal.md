---
title: "Email in the Terminal: A Completely Normal Way to do Things"
date: 2024-11-14
type: post
draft: true
slug: email-in-the-terminal
category: Development
tags: [email]
excerpt: Lorem ipsum
image:
comments: true
comments_header:
---
Since my [last post](14-the-great-email-migration.md) kinda got away from me as I was writing it, I thought it best to split off all the stuff on setting up and using email through the terminal into its own post. I was hesitant to do this since now I'm basically just reiterating all of the other blog posts I referenced in getting this setup going, but it's probably better than delaying getting *something* posted even longer, and I don't want to scare people off with one single 10,000-word post out of nowhere.

## Picking up where we left off...

To summarize where we are now, I've made the decision to switch email providers and pull over my 17 years of archives in an attempt to stop using Gmail. This ultimately resolved itself in pulling over a select few important threads from those archives and storing a more complete archived mbox separately for future reference.

Now I have my new inbox and workflow set up, with mail fetch going to pull in stuff from my now-legacy addresses until I've comfortably migrated all of my online accounts and subscriptions. I've been spending at least a few minutes each day changing over small handfuls of accounts, which is its own project with its own headaches (far too many sites really don't want you changing your email address...). Now it's time to get to the really fun part: immediately ignoring the nice fancy webmail client I'm given and accessing email through my terminal emulator!

I'm normal I'm so normal.

## Setting up the clients (TUIs FTW!)

For the sake of simplicity, I'm going to go through this section more like a tutorial rather than a detailing of my process in getting to my current setup, because my process was "find a hundred different articles and reddit posts on various setups and copy bits and pieces from each until I had something workable," and that'll be about impossible to follow if you want to get something similar set up. I'll add links to the most helpful articles I found at the bottom of this post if you want a more detailed look at setup options.

So let's get started!

### Optional: just use a GUI like a normal person

Admittedly I do have my account connected to Thunderbird as well, though I open it much less often. It serves more as the app I use to manage my calendar and contacts (since those in particular are tougher to deal with in a TUI/CLI), or if I really need to read/write a complex HTML email for some reason. Thunderbird setup is super straightforward though. Fastmail offers OAuth authentication so I just added a new account as normal and logged in. The only extra setup I did here was to change the email address (not server cred username) to my main alias, add a couple of identities mapping to the main aliases I'll be sending emails from, and add my GPG key for signing/encryption.

### Install our prerequisites

First off, here's a list of everything to install. Some of these aren't absolutely required, and are just nice to have for a cleaner/more usable setup. I'll note which packages those are and why you may/may not want to install them yourself. Most of these should be available in just about any package manager, but their versions may vary between platforms, and you may have to build some from source. That's a bit beyond the scope of this post so since I'm generally doing this setup on MacOS I'll dump the [Homebrew](https://brew.sh/) commands, and will leave any more advanced setup to you to figure out/ask me directly about.

required: **[aerc](https://aerc-mail.org/)**

```shell
$ brew install aerc
```
Try to ensure you have at least version 0.18 to ensure all the custom commands and templates I'll touch on will work, I've noticed some repositories are pretty out of date.

This is the TUI MUA (text-based user interface mail user agent) itself, and the one program I actually manually invoke to do Email Things. Technically this is all we really need to take in and manage email, if the server supports IMAP/JMAP we can use aerc as a "live" client and maintain a persistent connection to the server, seeing emails as they come in and being able to move them around or delete them. We'll still need to configure *sending* mail over SMTP separately in either case, but we'll get to that. In the meantime, ideally we'd like to be able to still have access to the mailbox without needing a persistent connection, so let's get a tool to handle that.

highly recommended: **[isync](https://isync.sourceforge.io/)**

```shell
$ brew install isync
```
Be *absolutely* sure you have at least version 1.5.0 for this, as it has some significant changes that'll affect your config. Most repositories are out of date at the time I'm writing this so if you're on anything but MacOS you'll probably need to build from source.

`isync` (the executable itself is called `mbsync`) is a tool to synchronize mailboxes between an IMAP server and a local maildir store. Maildir is a method of storing emails on a file system that makes things work nicely with a multitude of clients, aerc included. We'll configure this to run in the background periodically to download new email and push up any changes to our local folders and sent mail.

required: **[msmtp](https://marlam.de/msmtp/)**

```shell
$ brew install msmtp
```
As far as I can tell, a recent enough version of this package is in all common repositories. I personally have 1.8.27 installed currently.

This is the program to handle sending email. On its own you can call it from the terminal to send individual emails through an SMTP server, but we'll configure it to work with aerc so it can all happen within the client.

highly recommended: **[msmtp*q*](https://github.com/neuhalje/msmtp-queue/)**

This is a wrapper script and associated set of services to queue outgoing messages and send them when able. By default `msmtp` will simply try to send an email when called, and if it fails (e.g. if you're offline) then it just panics and quits. With msmtpq we can instead add any emails we want to send to the queue, and the service will keep trying to send them until it's successful. So if you're going to be offline for a bit but want to have some emails ready to shoot off instead of sitting in drafts, this helps a ton.

Full disclosure here: I personally haven't tried this exact script, which is modified explicitly for MacOS support. I should give it a try tbh, but what I've got right now is [this script](https://git.marlam.de/gitweb/?p=msmtp.git;a=blob_plain;f=scripts/msmtpq/msmtpq;hb=HEAD) from within the msmtp repository. It doesn't work with MacOS out of the box, and I personally just hacked at it until I could get it to work by commenting out various lines in the script, so I wouldn't recommend following in my footsteps there unless you really want to.

highly recommended: **[gnupg](https://gnupg.org/)/[pass](https://www.passwordstore.org/)**

```shell
$ brew install gnupg pass
```

By default, all of our various configs for connecting to the email server are going to expect credentials to be stored in plaintext in config files. While you can probably be relatively safe by locking down permissions on those files, I'm not a huge fan of this, especially if you want to put your configs under version control to share between computers. GPG is, for better or for worse, the standard for encrypting email, files, and text in a lot of Unix-like environments, so it'll be helpful to have at the very least `gnupg` installed and a keypair generated. That again is a bit more than I want to go into here, but there are a plethora of tutorials out there on getting started with GPG (without making any explicit endorsements, [this guide](https://www.linuxbabe.com/security/a-practical-guide-to-gpg-part-1-generate-your-keypair) that came up on a quick search just now seems fairly comprehensive).

Password-store (`pass`) is a password manager that makes use of GPG to encrypt text files that you can store your passwords, secrets, or really any sensitive text in. With it, you can store your server credentials in files encrypted with your key and tell aerc/isync/msmtp to run a command that decrypts them and passes the decrypted password along. That way you never have your secrets stored in plain text or alongside your config files.

Personally, I found this full setup to be a tad cumbersome, because it means you'll randomly get prompts to unlock your private key when isync wants to run. Instead I have a symmetrically-encrypted file with my credentials, and tell isync to decrypt those with a given randomly-generated password. It's a tad less secure but vastly less annoying.

optional: **[go](https://go.dev/)/[goimapnotify](https://gitlab.com/shackra/goimapnotify)**

```shell
$ brew install go
$ go install gitlab.com/shackra/goimapnotify@latest
```

goimapnotify is a helper tool that lets you run scripts or commands immediately upon receiving a new email notification via IMAP IDLE. With our default setup, we'll only see new emails arrive in the maildir (and therefore aerc's inbox) when isync runs periodically, or if you invoke it manually. With this we can have the computer listen for effectively a push notification from the mail server and tell it to immediately sync the inbox when something new shows up in it.

optional: **[w3m](https://w3m.sourceforge.net/)/[dante](https://www.inet.no/dante/)/[pandoc](https://pandoc.org/)**

These are just a few helper packages for managing HTML email. Ideally, we'd love to only ever [use plaintext email](https://useplaintext.email/), but the reality is a lot of incoming email (especially from companies that want to shove a host of [tracking pixels](https://en.wikipedia.org/wiki/Spy_pixel) at you) comes in HTML format only, and if they do include a `text/plain` alternative they tend to be pretty poorly formatted.

By default aerc doesn't want to deal with HTML, and will only offer to open such emails in your default browser for viewing (thereby loading any remote content and tracking embedded). This set of packages helps by giving you an option to keep everything within aerc, though it won't always be the prettiest-looking.

`w3m` is a text-based web browser. It's pretty neat in and of itself, but for our purposes it will allow us to reformat those HTML emails into something readable in the terminal.

`dante` is a [SOCKS](https://en.wikipedia.org/wiki/SOCKS) proxy server/client, which aerc's HTML formatter invokes alongside `w3m` in order to redirect any embedded links in HTML emails and prevent them from alerting the home server that the email was downloaded/opened.

Finally, `pandoc` is a tool for converting text between various formats. This is mostly helpful for writing HTML emails, as we can configure it to take in something like Markdown and process it into HTML before sending off the email.

And that's pretty much it! The only other package I personally have installed is `notmuch`, a database for quickly indexing and searching emails, but I haven't actually configured aerc to work with it yet, since the Homebrew version of aerc isn't built with notmuch support by default. Oops.

### Write some config

Alright, enough installing things, let's make it all *work*!

First off we'll handle mailbox syncing with isync. This is what's going to let us keep our mail on our computer with regular background updates, so if you're somewhere without internet access for a while, you can still check up on anything that came in while you did have a connection, and even manage/organize your mail to have it sync back up to the IMAP server when you come back online.

![Screenshot of a terminal emulator running an email agent, showing a selected inbox with two messages from "Lufthansa Flight Servi..."](aerc-inbox-offline.png)
> In fact, I'm writing this section of the post while on a plane above the Atlantic Ocean, and I can still see the email that came in before I finished packing!

To start, you'll need to make sure you can authenticate reliably with the IMAP server. I've personally set myself up with a handful of app passwords through Fastmail for this, since it's much more straightforward (oAuth is great for security, but a pain in the entire ass to get working with terminal applications, so I'm keeping it simple).

The isync config is generally stored in `~/.config/isyncrc` and is where we're going to define credential info, as well as mappings between remote and local mailboxes. A very very basic version of my own config looks more or less like this:

```
Sync All
Expunge Near
Create Both
Remove Both
SyncState *
CopyArrivalDate yes

IMAPAccount fastmail
Host imap.fastmail.com
Port 993
AuthMechs LOGIN
User <username>
PassCmd "gpg -d --batch --passphrase-file ~/.secrets/email.pass ~/.secrets/mail-key | head -n1"
TLSType IMAPS
TLSVersions +1.2

IMAPStore fastmail-remote
Account fastmail

# Local maildir
MaildirStore fastmail-local
Path ~/.mail/fastmail/
Inbox ~/.mail/fastmail/Inbox
SubFolders Verbatim

# Sync everything
Channel fastmail-all
Far :fastmail-remote:
Near :fastmail-local:
Patterns *
```

Here, the first section defines some defaults that get applied to all accounts and mail stores. I have everything synced by default, with `Create` and `Remove` directives telling isync to create/delete folders within my mailbox as I do so on either end. `Expunge Near` means that emails that are fully deleted (rather than moved to the trash) will be reflected only on the downstream&mdash;if I fully delete a local file it shouldn't propagate up to the server, but anything permanently deleted server-side should reflect locally. I set this mostly because I'm afraid of accidentally `rm`-ing a file locally and not being able to get it back, but files that Fastmail clears from trash/spam after a month still get properly removed on my machine. `CopyArrivalDate` ensures that the file created/modified timestamps match the "arrival" timestamp from the email, so that your folders are sorted properly.

The `IMAPAccount` section is pretty straightforward, providing creds for the IMAP server to make sure you can connect and sync. The `PassCmd` setting takes any shell command available on your `PATH` and passes the resulting output to the server. Depending on your setup you can change this up a bit; you can just use `Pass` to set a plaintext password (if you do so, make sure your file perms are set restrictively for the config file), or if you use `password-store` you can set it to your `pass path/to/password` command (though as I mentioned earlier this can lead to random GPG passphrase prompts when isync runs in the background).

---

(remaining isync config)
```
# Sync just the inboxes
Channel fastmail-inbox
Far :fastmail-remote:INBOX
Near :fastmail-local:Inbox
Create Near
Remove None

# Sync archive folder
Channel fasatmail-archive
Far :fastmail-remote:Archive
Near :fastmail-local:Archive

# Sync drafts folder
Channel fastmail-drafts
Far :fastmail-remote:Drafts
Near :fastmail-local:Drafts

# Sync sent folder
Channel fastmail-sent
Far :fastmail-remote:Sent
Near :fastmail-local:Sent

# Sync important non-inbox folders
Channel fastmail-folders
Far :fastmail-remote:
Near :fastmail-local:
Patterns * !"INBOX" !"Archive" !"Drafts" !"Sent" !"Junk" !"Junk Mail" !"Spam" !"Trash"

# Sync unimportant folders
Channel fastmail-junk
Far :fastmail-remote:
Near :fastmail-local:
Patterns "Junk" "Junk Mail" "Spam" "Trash"
Expunge Both

Group fastmail
Channel fastmail-inbox
Channel fasatmail-archive
Channel fastmail-drafts
Channel fastmail-sent
Channel fastmail-folders
Channel fastmail-junk

Group fastmail-important
Channel fastmail-inbox
Channel fastmail-folders
```

(msmtp config)
```
# Set default values for all following accounts.
defaults
auth           on
tls            on
tls_trust_file /opt/homebrew/etc/openssl@3/cert.pem
logfile        ~/.msmtp.log

account        fastmail
host           smtp.fastmail.com
port           465
auth           on
tls            on
tls_starttls   off
tls_certcheck  on
from           Jane Smith <name@example.com>
user           <smtp_login>
passwordeval   "gpg -d --batch --passphrase-file ~/.secrets/email.pass ~/.secrets/mail-key | head -n1"
account default : fastmail
```

(aerc config)
```
[Fastmail]
source                     = maildir://~/.mail/fastmail
outgoing                   = msmtpq -a fastmail
from                       = Jane Smith <name@example.com>
folder-map                 = ~/Library/Preferences/aerc/maps/fmap-fastmail.conf
default                    = Inbox
copy-to                    = Sent
folders-sort               = Inbox,GInbox,1.Today,2.This Week,3.This Month,4.Backlog,Social,Dev,Work,Lists,Updates,Promos,Finance,Health,Home,Travel,Commissions,Downloads,Masked,LearnSpam,LearnHam
pgp-key-id                 = 0x12345678ABCDEFG0
pgp-auto-sign              = true
pgp-self-encrypt           = true
pgp-attach-key             = false
pgp-opportunistic-encrypt  = true
```

(goimapnotify config)
```
configurations:
    -
        host: imap.fastmail.com
        port: 993
        tls: true
        tlsOptions:
            rejectUnauthorized: false
        username: '<username>'
        passwordCMD: 'gpg -d --batch --passphrase-file ~/.secrets/email.pass ~/.secrets/mail-key | head -n1'
        onNewMail: 'mbsync fastmail'
        onNewMailPost: 'notmuch new'
        boxes:
            -
                mailbox: INBOX
                onNewMail: 'mbsync fastmail-inbox'
                onNewMailPost: 'notmuch new'
```

(details on installing aerc, testing with IMAP, then configuring isync and msmtpq, cron, IDLE push, etc. discuss custom keybinds to work with my workflow)

(dealing with reading unavoidable HTML email, and writing it w/ pandoc)

(blurb about also connecting thunderbird for occasional use or calendar/contact management)

---

References:

[Email in the terminal: a complete guide to the unix way of email](https://bence.ferdinandy.com/2023/07/20/email-in-the-terminal-a-complete-guide-to-the-unix-way-of-email/)

[My email setup with Aerc and Git](https://www.acarg.ch/posts/aerc-email-setup/)

[My Email Setup with Notmuch and Alot](https://usher.dev/posts/2021-03-17-my-email-setup/)

[Sync Fastmail with isync](https://petar.dev/notes/sync-fastmail-with-isync/)

[Instant offline emails on Mac with goimapnotify, mbsync and mu](https://myke.blog/posts/push-offline-emails-mbsync)

[aerc homepage](https://aerc-mail.org/)

[aerc wiki - html quoted_reply](https://man.sr.ht/~rjarry/aerc/configurations/htmlquote.md)

[aerc wiki - writing html email](https://man.sr.ht/~rjarry/aerc/configurations/htmlmail.md)

[mbsync config docs](https://isync.sourceforge.io/mbsync.html)

[msmtpq/-queue](https://github.com/neuhalje/msmtp-queue/)

[inbox zero](https://www.43folders.com/43-folders-series-inbox-zero)
