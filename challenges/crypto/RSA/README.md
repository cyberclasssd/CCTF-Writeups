# RSA
* **Category:** Crypto
* **Points:** 250
## Problem
We encoded a message using the super secure [RSA Algorithm](https://simple.wikipedia.org/wiki/RSA_algorithm). You'll never get the flag!
## Solution
A classic RSA problem. n is relatively small here so we can decrypt after factoring it using a tool such as https://www.alpertron.com.ar/ECM.HTM and then applying RSA results in the flag. Here, I simply took the Euler Totient directly from Alpertron.

Flag: `cctf{really_secure}`
