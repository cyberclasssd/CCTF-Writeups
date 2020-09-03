# AESthetic
* **Category:** Crypto
* **Points:** 200
## Problem
You've been given a file, a key, and an IV. What's the flag?
```
Key: cyberclasscrypto
IV: muchbigaesthetic
```
## Solution
The file is a text file encrypted with AES. [Decrypting with the given key and IV](https://gchq.github.io/CyberChef/#recipe=AES_Decrypt(%7B'option':'UTF8','string':'cyberclasscrypto'%7D,%7B'option':'UTF8','string':'muchbigaesthetic'%7D,'CBC','Raw','Raw',%7B'option':'Hex','string':''%7D)Render_Image('Raw')) will return a PNG image, which contains the flag.

Flag: `cctf{a_pr3TTY_m0unta1n}`
