# Donkierembly
* **Category:** Rev
* **Points:** 300
## Problem
What does donkierembly(0x2B) return? Submit the answer as a hexadecimal number in flag format, for example: cctf{0x30B}.

## Solution

The following three lines set up things:
```
<+0>:	push   ebp
<+1>:	mov    ebp,esp
<+3>:	sub    esp,0x10
```
Next, `0x19` is subtracted from our parameter `0x2b`.
```
<+6>:	sub    DWORD PTR [ebp+0x8],0x19
```
Then, we move `0x0` into `ebp-0x4` and jump to `<donkierembly+29>`.
```
<+10>:	mov    DWORD PTR [ebp-0x4],0x0
<+17>:	jmp    0x8048464 <donkierembly+29>
```
Here, we compare `ebp-0x4` with `0x4`. If the first value is less than or equal to the second, the function will jump back to `<donkierembly+19>`. Otherwise, it will continue. `0x0` is indeed less than `0x4`, so we jump to `<donkierembly+19>`. 
```
<+29>:	cmp    DWORD PTR [ebp-0x4],0x4
<+33>:	jle    0x804845a <donkierembly+19>
```
We move `ebp-0x4`, which is currently `0x0`, into `eax`. Both locations now currently store `0x0`.
```
<+19>:	mov    eax,DWORD PTR [ebp-0x4]
```
Next, we xor our parameter (which is now `0x12`) and `eax`, storing the result in our parameter. XORing `0x0` and `0x12` will give us `0x12`.
```
<+22>:	xor    DWORD PTR [ebp+0x8],eax
```
Then, we add `0x1` to `ebp-0x4`, storing the result in that location. `ebp-0x4` now becomes `0x1`.
```
<+25>:	add    DWORD PTR [ebp-0x4],0x1
```
Next, we compare `ebp-0x4` with `0x4`. If the first value is less than or equal to the second, the function will jump back to `<donkierembly+19>`. Otherwise, it will continue. `0x1` is still less than `0x4`, so we jump back to `<donkierembly+19>`. 
```
<+29>:	cmp    DWORD PTR [ebp-0x4],0x4
<+33>:	jle    0x804845a <donkierembly+19>
```
At this point, we notice we're looping. We will add `0x1` to `ebp-0x4` every time we loop through, until `ebp-0x4` is strictly greater than `0x4`. This means we will loop through the function three more times. Every time we loop through, we will XOR our parameter and the value stored in `ebp-0x4`. We can manually do this and get `0x16`. Next:
``` 
<+35>:	cmp    DWORD PTR [ebp+0x8],0x16
<+39>:	jg     0x804847a <donkierembly+51>
```
This will compare `ebp+0x8` and `0x16`. If `ebp+0x8` is greater than `0x16`, we will jump to `<donkeyembly+51>`. It's not, so we continue.
```
<+41>:	mov    eax,DWORD PTR [ebp+0x8]
<+44>:	imul   eax,DWORD PTR [ebp+0x8]
<+48>:	mov    DWORD PTR [ebp+0x8],eax
<+51>:	mov    eax,DWORD PTR [ebp+0x8]
<+54>:	leave  
<+55>:	ret
```
The rest will move `0x16` into `eax`, multiply `0x16` into `eax`, resulting in `0x1E4`, then return. Therefore, our final return value is `0x1E4`.

Flag: `cctf{0x1E4}`
