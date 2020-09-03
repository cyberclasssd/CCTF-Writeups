# Kirkland Signature Variety Cookie Tray
* **Category:** Web
* **Points:** 200
## Problem
You are trying to buy cookies from Costco, but you keep trying to break into the cookie storage room, where you are not allowed! Find the flag.
## Solution
After we log in, we get a message stating we do not have permission to be in the room:
```
dear bro, you don't have permission to be in here! no flag for you >:c
```
Based on the challenge title, we can check the cookies using Developer Tools > Application > Storage > Cookies. There, we see a cookie named `admin` that currently has a value of `False`. To gain permissions, we can change the value of the `admin` cookie to `True` and reload. This gives us:

![image](https://user-images.githubusercontent.com/58750937/90200367-65205880-dd8c-11ea-8a81-9ee46b766631.png)

Flag: `cctf{ask_nic3ly_4nd_you11_g3t_c00k13s}`
