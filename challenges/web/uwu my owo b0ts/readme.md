# uwu my owo b0ts
* **Category:** Web
* **Points:** 200
## Problem
uwu (We are given a website.)
## Solution
Our website looks like this. There is no login box or anything to click, so we head over to the page source (Ctrl+U).

![image](https://user-images.githubusercontent.com/69173442/92057759-e3489d00-ed43-11ea-9cfb-9c9f8dcbb17c.png)
(Irrelevant tangent: In case you were wondering about some text on the website, here is a translation. "This chall is dedicated to uwu my owo b0ts, the name of Pacific Trails MS's first CyberPatriot team.")

After some googling around, we find that a classic web exploitation CTF challenge involving key word "robots" is one that has to do with a file called `robots.txt`, which is a file that gives instruction to web crawlers and can be found by appending `/robots.txt` to the end of a website's host name in the URL.

Knowing this, we append `/robots.txt` to our challenge's URL so that we get `http://challenges.ctfd.io:30045/uwu/robots.txt`. Heading over to this page, we get:

![image](https://user-images.githubusercontent.com/69173442/92059398-f3fa1280-ed45-11ea-98cd-9195c95aac11.png)

We find that the page `/b0tos.html` is disallowed, meaning web crawlers cannot access it. We head over there for a visit. (We change our URL to `http://challenges.ctfd.io:30045/uwu/b0tos.html`.)

![image](https://user-images.githubusercontent.com/69173442/92059081-1dff0500-ed45-11ea-9dec-a50e52e5e622.png)

Nice! We found the bots (and the flag)!

Flag: `cctf{y00w00mywobot5}`
