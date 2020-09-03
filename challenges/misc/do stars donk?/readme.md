# Do stars donk?
* **Category:** Misc
* **Points:** 250
## Problem
This is an osint challenge.

Hello there! I like to read and write things on Webtoon.

PS. My favorite constellation is that of a fox

PPS. My favorite number is 12.

-Ghost
## Solution
From the message from Ghost, we conclude the following: The words "fox" and "constellation" indicate the fox shaped constellation called "Vulpecula." 
We go to Episode 12 of the webtoon named Vulpecula.

Note: There is only one webtoon called Vulpecula that has 12 or more episodes (at the time CCTF took place).

There is a base64 encoded message in the author's note: `d2hvIGlzIHNub2NiZWVmIG9uIGluc3RhZ3JhbT8=`
Decoding this gives: `who is snocbeef? Stalk them *ig*` ?

After some googling, we find that "ig" is an abbreviation for "I guess" and "Instagram."

Search for snocbeef's profile on Instagram. There is a pastebin link in the bio: [pastebin.com/4HzbhgkW](pastebin.com/4HzbhgkW).
The pastebin contains the following message:

```
My mom told me we're going to see stars at 2am. My poor sleep schedule :( I have also spent the whole day trying to figure out docker files I didn't even have time to eat my caesar salad >:c (kwwsv://glvfrug.frp/fkdqqhov/744782244941529130/744782245377867818/745048163466870836)
```

The mention of a caesar salad may tip us off that the given URL is encoded in Caesar cipher.
Decrypting (brute force) gives the following: https://discord.com/channels/744782244941529130/744782245377867818/745048163466870836
(A Caesar shift of 3.)

The link is the link of a message in the CyberClassCTF Discord server. The message contains a link to a pastebin, which says:

```
Wow hi. You can stop right here or keep going. Either way, here's a flag: cctf{twink1e_t03s_f0x}. Ghost is still sleepy right now, but it's not cus they went and saw the stars at 2am. The stars trip got cancelled :/ Ghost is sleepy since they've gone done too much pwn and donker files. Check out more of Ghost's story on Wattpad (they're writing a STORY to take a break from pwn and donker files.) sccgp://aaa.amccgmw.yhu/pchdx/237288985-wh-pcmdp-whjn
```

We've got our first osint flag.

Flag: `cctf{twink1e_t03s_f0x}`
