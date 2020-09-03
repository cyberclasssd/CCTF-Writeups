# Pretty Good Problem
* **Category:** Crypto
* **Points:** 200
## Problem
Decrypt this message with the given key.
```
-----BEGIN PGP MESSAGE-----
Version: Keybase OpenPGP v2.1.13
Comment: https://keybase.io/crypto

wYwDqJHbmCE3SY4BA/9Jg2UDgsBNFYrBYgqZxe8uxucDa4WULsBep/2PVxalQMyh
z5BlUQtTRYBgd7ElltsmV0qPtZD4ICg4TSLQIuGjkZQeC6W7Oo7Uotd1EFR2wOSp
VJ5Lq0cfKCu2OrDnjB2eTtRkLKEl9l+HiIs6WDvMWxLHtO6jL/GpQHIEp8w/otJ5
ARuwD4mBEb6Y52GGpa6EpUVWSzOiKd781lfjLM/3c0brtZdkRdrQtUDYX6+cHIKX
7InJqCPuaefsXFQo7DgzREYC8XS/eXUSsk0cXQTWTDVWrgzuwcGisBmYkkW3vfgc
FkVNICoHzVAzpGGgTg/fryqoc/22IeZKXw==
=Ln2W
-----END PGP MESSAGE-----
```

## Solution
The message is encrypted with PGP, and the provided key is a private key. We can decrypt the message with the key using [CyberChef](https://gchq.github.io/CyberChef/). Select the recipe "PGP Decrypt" and input the PGP message as input and the given key as the private key, then click bake!

Flag: `cctf{k1nda_g00d_pr1vacy}`
