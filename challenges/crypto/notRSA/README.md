# notRSA
* **Category:** Crypto
* **Points:** 500
## Problem
Ok we've learned our lesson. We've made our modulus really big this time and even doubled our exponent! It's so secure that even we're having trouble decrypting it.
## Solution
The exponent is even so we can only get m^2 from calculating the inverse. We approach this mathematically. We know how c is generated, namely c = m^131074 (mod n). By calculating the inverse, d, of 65537 (mod phi(n)) we get c^d = m^2 (mod n). From this, we can compute m by taking the square root. Since I forgot to pad the message, simply performing an integer square root using binary search retrieves the flag.

The intended solution here was to apply a technique found in the [Rabin Cryptosystem](https://en.wikipedia.org/wiki/Rabin_cryptosystem) and to use Euler's Criterion to take the square root. Since there are two possible squareroots, you subtract from n to get the actual flag.

Flag: `cctf{rabin_but_with_extra_steps}`
