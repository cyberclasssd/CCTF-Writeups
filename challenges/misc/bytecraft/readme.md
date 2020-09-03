# Bytecraft
* **Category:** Misc
* **Points:** 400
## Problem
Barn has made a huge redstone [contraption](./minecraft.PNG)! What is its message? All of the chests are empty. An [example](./example.PNG) module of the contraption is given for you to examine. A (probably broken) [world download](./cctf) is also available.
[Minecraft redstone](https://minecraft.gamepedia.com/Mechanics/Redstone/Circuit#Power)
## Solution
Due to the varying lengths, we can infer that the message is related to signal strength. Indeed, signal strength ranges from 0 to 15, which can be one hexadecimal digit, and the modules are grouped in groups of 2, so each group is 1 byte.

The values of the hexadecimal values are the signal strengths coming out of the comparator needed to turn the redstone lamp on. This means that the signal must be strong enough to reach the redstone torch, but weak enough to not go into the repeater. The correct signal strength can be determined by finding the difference of blocks between the torch and the comparator.

We get 63 63 74 66 7b 33 70<sup>[1](#footnote)</sup> 31 63 5f 6d 31 6e 33 63 72 34 66 74 32 39 34 65 7d

Convert from hex to ascii to get the flag.

Flag: `cctf{3p1c_m1n3cr4ft294e}`













<a name="footnote">1</a>: This is 0 because the light was on, but the chest was empty. This module varied slightly from the example to allow for 0 to be represented.
