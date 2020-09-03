# Jason in a Bin
* **Category:** Misc
* **Points:** 250
## Problem
It's a beautiful summer day. You go to the park and see a snowman walking inside a trash bin, so you decide to take a picture. Find the flag.
## Solution
First, we can try to run strings on the PNG to see if the flag is appended to the end of the image. Unfortunately, there is no flag in sight; however, we do see some other interesting information! At the end of the PNG, there are several strings that are typically part of ELF executables, or binaries.

```
.rodata
.eh_frame_hdr
.eh_frame
.init_array
.fini_array
.jcr
.dynamic
.got.plt
.data
.bss
.comment
```
From this, we can infer that there might be an executable file hidden inside the PNG! We can use binwalk to extract all hidden files: `binwalk -e jasoninabin.png`. If the previous command does not work, `binwalk --dd=".*" file_name` will extract any file type, not just files with known headers. After running the command, a new directory is created, and the following is output:
```
DECIMAL       HEXADECIMAL     DESCRIPTION
--------------------------------------------------------------------------------
0             0x0             PNG image, 934 x 800, 8-bit/color RGBA, non-interlaced
91            0x5B            Zlib compressed data, compressed
618719        0x970DF         ELF, 64-bit LSB executable, AMD x86-64, version 1 (SYSV)
```
Now we can see that there was indeed an ELF executable hidden in the PNG. The executable binwalk extracted is stored in a new directory named after the PNG file. To run the executable, add execute permission using `chmod` and run with `./file_name`. Running the binary gives us the flag!

Flag: `cctf{binwalk_more_like_win_walk}`
