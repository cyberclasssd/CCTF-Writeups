# Telegraph
* **Category:** Crypto
* **Points:** 200
## Problem
Someone sent a message in the format CCTF{XXXXX-XXXX-XXX}. Could you help me decrypt it? (We're given a .wav file)
## Solution
The .wav file's contents can be interpreted as morse code. We can use an online decoder like https://morsecode.world/international/decoder/audio-decoder-adaptive.html to decode and get the flag.

Flag: `CCTF{MOOSE-GOES-MOO}`
