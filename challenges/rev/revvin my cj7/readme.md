# Revvin' my CJ7
* **Category:** Rev
* **Points:** 150
## Problem
Snoc has inherited an old CJ7! Now she is [revvin' her CJ7](https://www.youtube.com/watch?v=D87hTPD9GEY). But there is a password. Find the flag.
## Solution
The password is encrypted with the following function:
  ```java
    public static String encrypt(String input) {
      int len = input.length();
      char[] ret = new char[len];
      for (int i = 0; i<len; i++) {
        if (i % 2 == 0) {
        	ret[i] = input.charAt(i);
        }
        else {
        	ret[i] = input.charAt(len-i);
        }
      }
      String retstr = new String (ret);
      return retstr;
  }
  ```
The function loops through every character in a for loop. If the character has an even index, it is left unchanged. If the character has an odd index, it is set to the character at index `len-i` of the input.
This means the characters with an odd index are backwards. To reverse this, we can manually reverse the odd index characters, or we can run the encrypt function again to reverse its effects.
  ```java
  encrypt("c}tn{bLyp11pyLf_07ppt1_f0fkc");
  ```

Flag: `cctf{fL1pp17y_fL0pp1ty_b0nk}`
