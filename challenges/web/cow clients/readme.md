# Cow Clients
* **Category:** Web
* **Points:** 250
## Problem
Moo! (We are given a website with a login box.)
## Solution
If we try to enter a random password into the login box, we get the following alert: "nice try i suppose; moo"

Looking at the source code (Ctrl + U), we see some obfuscated code:
```
var _0x79ed=["\x63\x63\x74\x66\x7B\x63\x6C\x31\x33\x6E\x74\x5F\x73\x31\x64\x65\x5F\x6B\x31\x6E\x64\x34\x5F\x64\x30\x6E\x6B\x7D","\x76\x61\x6C\x75\x65","\x70\x61\x73\x73","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x79\x65\x73\x2E\x20\x79\x6F\x75\x20\x61\x72\x65\x20\x6E\x6F\x74\x20\x64\x6F\x6E\x6B\x2E\x20\x69\x6E\x20\x66\x61\x63\x74\x20\x69\x20\x74\x68\x69\x6E\x6B\x20\x79\x6F\x75\x20\x6D\x69\x67\x68\x74\x20\x62\x65\x20\x63\x6F\x77\x2E","\x6E\x69\x63\x65\x20\x74\x72\x79\x20\x69\x20\x73\x75\x70\x70\x6F\x73\x65\x3B\x20\x6D\x6F\x6F"];function Verify(){_0x79ed[0]== document[_0x79ed[3]](_0x79ed[2])[_0x79ed[1]]?alert(_0x79ed[4]):alert(_0x79ed[5])}
```

It looks like it's in hex, so we plug what we have into a hex to ascii decoder and get the following:
```
cctf{cl13nt_s1de_k1nd4_d0nk}valuepassgetElementByIdyes. you are not donk. in fact i think you might be cow.nice try i suppose; moo
```

Flag: `cctf{cl13nt_s1de_k1nd4_d0nk}`
