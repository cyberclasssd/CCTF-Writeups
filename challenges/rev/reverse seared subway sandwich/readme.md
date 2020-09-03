# Reverse Seared Subway Sandwich
* **Category:** Rev
* **Points:** 175
## Problem
Today, Ponkey went to Subway to try to purchase a reverse seared Subway sandwich, but it was password protected! Please help Ponkey find the password so she can eat her sandwich.
## Solution
This code encrypts the password with a substitution cipher. The cipher and plaintext alphabets are created in arrays:
```java
public static char plain[]  = { 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z' };
public static char cipher[] = { 'P', 'O', 'N', 'K', 'E', 'Y', 'A', 'B', 'C', 'D', 'F', 'G', 'H', 'I', 'J', 'L', 'M', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Z' };
```
The encrypt() function performs the substitution. Again, the function scans for the password and checks if the encrypted password is equal to the given value:
```java
String password = encrypt(sc.next());
if (password.equals("NNSY{DT5S_4_RTO5S1STSC0I_NCLB3Q}")) {
  System.out.println("congrats! you got the flag.");
}
else {
  System.out.println("hnhgh not really.");
}
```
To reverse the encrypt() function, we can just swap plaintext/ciphertext alphabets.
```java
public static char plain[]   = { 'P', 'O', 'N', 'K', 'E', 'Y', 'A', 'B', 'C', 'D', 'F', 'G', 'H', 'I', 'J', 'L', 'M', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Z' };
public static char cipher[]  = { 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z' };
```
Alternatively, we can find a substitution cipher decryptor and manually input the cipher alphabet.

Flag: `cctf{ju5t_4_sub5t1tuti0n_ciph3r}`
