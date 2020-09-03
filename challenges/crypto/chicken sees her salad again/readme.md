# Chicken Sees Her Salad Again
* **Category:** Crypto
* **Points:** 150
## Problem
Decrypt the following to find the flag:
18 18 9 21{9 23 16 9 8 22 4 9 9 16 17 20 16 22 4 4 19 8 16 1 16 19}

Note: submit in all caps.
## Solution
The cipher is an A1Z26 cipher. Decrypting with [this tool](https://planetcalc.com/4884/), we get `rriu{iwpihvdiipqtpvddshpaps}`. Next, based on the name of the challenge, we can try brute forcing a caesar shift with [this tool](https://www.dcode.fr/caesar-cipher). Finally, we get `CCTF{THATSGOTTABEAGOODSALAD}`.

Flag: `CCTF{THATSGOTTABEAGOODSALAD}`
