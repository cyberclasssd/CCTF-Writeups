# Donkeyembly
* **Category:** Rev
* **Points:** 150
## Problem
What does donkeyembly(0xA) return?
Submit the answer as a hexadecimal number in flag format, for example: cctf{0x30B}.
## Solution
Disclaimer: we (snoc) made a boo boo. Sorry. I'm bad.

The donkeyembly series is a series of challenges written in assembly language. We can manually complete this one. The first two lines are:
```
<+0>:	push   ebp
<+1>:	mov    ebp,esp
```
These set up the stack. 
```
<+3>:	cmp    DWORD PTR [ebp+0x8],0x4
<+7>:	jle    0x8048415 <donkeyembly+15>
```
These two lines will compare our parameter `0xA` to `0x4`. If the first value is less than or equal to the second value, we will jump to `<donkeyembly+15>`. `0xA` is not less than `0x4`, so we won't make the jump.
```
<+9>:	add    DWORD PTR [ebp+0x8],0x1
<+13>:	jmp    0x8048419 <donkeyembly+19>
```
We will add 1 to our parameter. `0xA` becomes `0xB`. Then:
```
<+19>:	mov    eax,DWORD PTR [ebp+0x8]
```
We jump here. This will move our parameter into EAX, where the return value of functions is stored. 
```
<+22>:	pop    ebp
<+23>:	ret 
```
These two lines will return from the function. So, the final value returned is `0xB`.

But snoc didn't know `0xA` was greater than `0x4` so she accidentally subtracted 1 instead of adding 1. So the flag in the contest was `cctf{0x9}`. 

Correct Flag: `cctf{0xB}`

Sad Flag: `cctf{0x9}`
