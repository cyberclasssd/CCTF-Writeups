# Laser Sharks
* **Category:** Misc
* **Points:** 200
## Problem
You are trying to invade Keto's island, and your team's scout has collected the following information for you. Find the flag.
# Solution
Open the packet capture in Wireshark.

![image](https://user-images.githubusercontent.com/58750937/92071864-b48eee80-ed64-11ea-8b34-108ef0087e57.png)

We can try following the different data streams to find the flag. Often times, we can find the flag in a UDP data stream.

![image](https://user-images.githubusercontent.com/58750937/92071972-fe77d480-ed64-11ea-871a-01b0091b050e.png)

Eventually, we find the flag in UDP stream 7:
<br><br>
![image](https://user-images.githubusercontent.com/58750937/92072039-25360b00-ed65-11ea-8020-7bdc8830e501.png)


Flag: `cctf{ket0_has_new_sharks}`
