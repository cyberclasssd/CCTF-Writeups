# Donkiestembly
* **Category:** Rev
* **Points:** 400
## Problem
What does donkierembly(0x100,0x100,0x100) return? Submit the answer as a hexadecimal number in flag format, for example: cctf{0x30B}.

## Solution

The following three lines set up things:
```
<+0>:	push   ebp
<+1>:	mov    ebp,esp
<+3>:	sub    esp,0x10
```
Next, we load `0x1000` into `ebp-0x4`.
```
<+6>:	mov    DWORD PTR [ebp-0x4],0x1000
```
Then, we move `ebp+0xc` into `eax`. This is our second input. We add it with `ebp+0x8`, our first input, and store it in `ebp+0x8`. Both inputs are `0x100`, so `0x200` gets stored in `ebp+0x8`.
```
<+13>:	mov    eax,DWORD PTR [ebp+0xc]
<+16>:	add    DWORD PTR [ebp+0x8],eax
```
We now move `ebp+0x8` (storing `0x200`) into `edx`, and `ebp+0x10`, the third input, into `eax`. Then, we add `edx` and `eax` and store it in `edx`: `0x200 + 0x100 = 0x300` gets stored in `eax` and `ebp+0xc`.
```
<+19>:	mov    edx,DWORD PTR [ebp+0x8]
<+22>:	mov    eax,DWORD PTR [ebp+0x10]
<+25>:	add    eax,edx
<+27>:	mov    DWORD PTR [ebp+0xc],eax
<+30>:	mov    eax,DWORD PTR [ebp+0xc]
```
We now add `ebp+0x10` and `eax`, which currently store `0x100` and `0x300`, respectively, and store this (`0x400`) in `ebp+0x10`. We also load `ebp-0x4`, or `0x1000`, into `eax`.
```
<+33>:	add    DWORD PTR [ebp+0x10],eax
<+36>:	mov    eax,DWORD PTR [ebp-0x4]
```
Next, we compare `eax`, which is `0x1000` with `ebp+0x10`, which is `0x400`. `jbe` means we jump if the left side is less than or equal to, but `0x1000` is greater than `0x400`, so we do not jump.
```
<+39>:	cmp    eax,DWORD PTR [ebp+0x10]
<+42>:	jbe    0x804845d <donkiestembly+82>
```
Now, we move `ebp-0x4`, or `0x1000`, into `eax`. We integer multiply this with `ebp+0xc`, or `0x300`, to get `0x300000`. Then, we store this in `ebp-0x4`.
```
<+44>:	mov    eax,DWORD PTR [ebp-0x4]
<+47>:	imul   eax,DWORD PTR [ebp+0xc]
<+51>:	mov    DWORD PTR [ebp-0x4],eax
```
Then, we move `ebp+0xc` into `eax`, which is `0x300`. Subtract `eax` from `ebp-0x4`, store in `ebp-0x4`. `0x300000-0x300 = 0x2ffd00`. Now, jump to `<donkiestembly+82>`.
```
<+54>:	mov    eax,DWORD PTR [ebp+0xc]
<+57>:	sub    DWORD PTR [ebp-0x4],eax
<+60>:	jmp    0x804845d <donkiestembly+82>
```
Compare `ebp-0x4` to `0x2`. Obviously, the former is larger. `ja` means jump if above, so we jump to `<donkiestembly+62>`.
``` 
<+82>:	cmp    DWORD PTR [ebp-0x4],0x2
<+86>:	ja     0x8048449 <donkiestembly+62>
```
Now, we move `ebp-0x4` into `eax`, and `0x0` into `edx`. `eax` is now `0x2ffd00`, and we divide it by `ebp+0x8`, or `0x200`. `0x2ffd00/0x200, rounded down = 0x17fe`. We store this in `ebp-0x4` and `eax`. We also compute `ebp+0xc XOR eax`: `0x300 XOR 0x17fe = 0x14fe`. We store this in `ebp+0xc`.
```
<+62>:	mov    eax,DWORD PTR [ebp-0x4]
<+65>:	mov    edx,0x0
<+70>:	div    DWORD PTR [ebp+0x8]
<+73>:	mov    DWORD PTR [ebp-0x4],eax
<+76>:	mov    eax,DWORD PTR [ebp-0x4]
<+79>:	xor    DWORD PTR [ebp+0xc],eax
```
We have returned to the same comparison and jump statement: we are in a loop. Clearly, `ebp-0x4` is still greater than `0x2`, so we keep looping. Keep looping until the cmp condition is false. After the second loop, `ebp-0x4 = 0xb`. After the third loop, `ebp-0x4 = 0x0`, so we are done. At this point, `ebp+0xc = 0x14f5`.
```
<+82>:	cmp    DWORD PTR [ebp-0x4],0x2
<+86>:	ja     0x8048449 <donkiestembly+62>
```
Now we just return the value of `ebp+0xc`, or `0x14f5`.
```
<+88>:	mov    eax,DWORD PTR [ebp+0xc]
<+91>:	leave  
<+92>:	ret 
```
<br>

## Solution
Flag: `cctf{0x14F5}`
