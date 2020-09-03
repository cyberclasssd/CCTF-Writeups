# Please don't solve this!
* **Category:** Rev
* **Points:** 200
## Problem
Please don't crack my amazing password encrypter and figure out the password!
## Solution
In the Java program, the following code encrypts the password:
```java
  public static String encrypt(String input) {
      String ret = "";
      int len = input.length();
      for (int i = 0; i<len; i++) {
    	int a = input.charAt(i);
        if ((int)(a)%2 == 0) {
        	ret+=(char)(a+2);
        }
        else {
        	ret+=(char)(a-2);
        }
      }
      return ret;
  }
```
If the int value of a character is even, it is increased by 2. If it is odd, it is decreased by 2. This preserves even/odd numbers, so we can just do the opposite to get back to the original password.
```java
  public static String undo(String input) {
      String ret = "";
      int len = input.length();
      for (int i = 0; i<len; i++) {
    	int a = input.charAt(i);
        if ((int)(a)%2 == 0) {
        	ret+=(char)(a-2);
        }
        else {
        	ret+=(char)(a+2);
        }
      }
      return ret;
  }
  ```
  Now we can use this function to decrypt our encrypted password and get the flag!
  
  Flag: `cctf{n3v3r_g0nna_g1v3_y0u_up}`
