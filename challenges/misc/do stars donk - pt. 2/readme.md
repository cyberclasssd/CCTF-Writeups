# Do stars donk? - Pt. 2
* **Category:** Misc
* **Points:** 300
## Problem
This is a continuation of the challenge "Do Stars Donk?"
At the end of that challenge, we were left with this message:

`
Wow hi. You can stop right here or keep going. Either way, here's a flag: cctf{twink1e_t03s_f0x}. Ghost is still sleepy right now, but it's not cus they went and saw the stars at 2am. The stars trip got cancelled :/ Ghost is sleepy since they've gone done too much pwn and donker files. Check out more of Ghost's story on Wattpad (they're writing a STORY to take a break from pwn and donker files. sccgp://aaa.amccgmw.yhu/pchdx/237288985-wh-pcmdp-whjn)
`
## Solution
We infer that the string `sccgp://aaa.amccgmw.yhu/pchdx/237288985-wh-pcmdp-whjn` is a link that has been encoded using some cipher, and that it is the link to the story on Wattpad that was mentioned. Using general knowledge of URLs, we can also assume that the link has the phrases "http," "www," and "wattpad". Using this information, we can manually solve the substitution cipher. We find that the decrypted link is: https://www.wattpad.com/story/237288985-do-stars-donk.

Following the link, we get to a page where there is a story written by Ghost.
There is a comment on the story that says "dinosauce111". Since dinosauce is a cultural phenomenon that originated from the social media platform Reddit, we may assume that this is the username of a user on Reddit. Heading over to Reddit, we search up this account to find it. They have two posts, and one includes the word "flag". In this post, another user has commented. Heading over to that user's profile, we see that on the right side of the page is their bio which contains the flag.

## Flag
Flag:  `cctf{1ve_d3cided_th4t_stars_DO_d0nk}`
