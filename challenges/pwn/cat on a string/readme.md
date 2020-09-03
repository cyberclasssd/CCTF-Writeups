# Cat on a String
* **Category:** Pwn
* **Points:** 350
## Problem
Worm on a string, but cat. Invent instrument, pwn binary, get flag!

`nc challenges.ctfd.io 30062`

## Solution
This is a format string vulnerability. The vulnerable code is the use of the `strcat()` function along with `printf()`: 
```c
printf(strcat(instrument, " says TOOOOOOOOOT!\n"));
```
Format strings are used to combine strings of characters with some elements that are to be replaced with other values, such as strings and integers. In C, the function printf takes a format string as input and prints out the correct strings. For example, to insert an integer into a string, we can use `printf("This is an integer: %d.", int_var);`, where %d is to be replaced with int_var and int_var is an integer. 
When an attacker provides more format specifiers than there are function arguments to fill its place, printf will begin to read whatever value is next on the stack. For example, %x would cause printf() to read a hex value, which is the actual memory address. %s would cause it to try to read the next address as a pointer, then read the string at the pointer. Next, we examine how the flag is stored:

```c
char * buf = malloc(sizeof(char)*128);
FILE *f = fopen("flag.txt","r");
fgets(buf,128,f);
```

From the code above, we can see that although the flag is stored on the heap with `malloc()`, a local variable is created that points to the address of the flag on the heap. Because the pointer is stored on the stack, we can exploit the format string vulnerability and read the string stored at the address.

Thus, our goal is to exploit the format string vulnerability and force printf to read strings off of the stack until it finds the flag. We can try brute forcing the offset between the current location on the stack and the flag with a simple bash one-liner:

```sh
for i in {1..30} ; do echo %$i\$s | REPLACE THIS!!!! ; done
```
Note: to examine the nth string on the stack, use `%n$s`.
If we grep or scroll through the output, we can quickly find the flag at `%14$s`.

Flag: `cctf{b4d_str_k1tty}`
