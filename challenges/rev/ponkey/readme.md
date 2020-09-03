# Ponkey
* **Category:** Rev
* **Points:** 175
## Problem
Ponkey has written a Java program to check passwords! The program encrypts the password then checks it. What's the password?
## Solution
In the Java program, the following code encrypts the password:
```java
  public static String encrypt(String input) {
      String ret = "";
      for (int i = 0; i<input.length(); i++) {
        for (int h = 1; h < 5; h++) {
          ret+=(char)(input.charAt(i)-(h%5));
        }
      }
      return ret;
  }
```
For every character inputted into the program, the program generates four new characters. The first character generated is the original character decreased by one bit, the second is decreased by two bits, etc. 
In order to reverse this, for each four characters in the encrypted password, we can simply take the first of these four characters and increase it by one bit. We can write a new function to do this:
```java
  public static String undo(String input) {
      String ret = "";
      for (int i = 0; i<input.length(); i+=4) {
          ret+=(char)(input.charAt(i)+1);
      }
      return ret;
  }
  ```
  Now we can use this function to decrypt our encrypted password and get the flag!
  
  Flag: `cctf{ponk3yM4N}`
