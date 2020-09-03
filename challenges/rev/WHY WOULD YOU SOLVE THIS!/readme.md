# WHY WOULD YOU SOLVE THIS!
* **Category:** Rev
* **Points:** 500
## Problem
I have improved my password encrypting algorithm! I bet you can't get my password now!!!!!! 
## Solution
We now have 5 functions to encrypt the password (and another function to do math). Lets start by reversing the `never` function; the new function is called `neverR`. This function is the same one in the "please don't solve this" challenge.:
```java
public static String never(String input) {
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
  public static String neverR(String input) {
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
The `gonna` function adds 2 to each character's value and shifts them to the left by 3 places. To reverse this, we need to shift the characters to the right by 3 and add 2 to their value. This is demonstrated in the `gonnaR` function:
```java
  public static String gonna(String input) {
	  String ret = "";
	  for (int i = 0; i<input.length();i++) {
		  ret+=(char)(2+input.charAt((i+3)%input.length()));
	  }
	  return ret;
  }
  public static String gonnaR(String input) {
	  String ret = "";
	  for (int i = 0; i<input.length(); i++ ) {
		  int pos = Math.floorMod(i-3, input.length());
		  ret+=(char)(input.charAt(pos)-2);
	  }
	  return ret;
  }
  ```
The `give` function base64 encodes the input string. We can base64 decode this (as shown in the `giveR` function) or use an online tool:
```java
  public static String give(String input) {
	  return Base64.getEncoder().encodeToString(input.getBytes());
  }
  public static String giveR(String input) {
	  return new String(Base64.getDecoder().decode(input));
  }
  ```
The `you` function XOR's each character with 3. The inverse of XOR is also XOR, so the reversed `youR` function is the exact same as `you`:
```java
  public static String you(String input) {
	  String ret = "";
	  for (int i = 0; i<input.length(); i++) {
		  ret+= (char)(input.charAt(i)^3 );
	  }
	  return ret;	  
  }
  ```
 The `up` function reduces each character's value by 1 and repeats the character for a certain amount of times given by the function method. To reverse this, add 1 to the current character's value and skip ahead by a certain amount that the function gives. We keep 2 variables: `i` and `counter`. `i` iterates through the encrypted string, and increases according to the function. `counter` represents the index of the original list and is the input to the function. This can be demonstrated in the `upR` function:
 ```java
   public static String up(String input) {
	  String ret = "";
	  for (int i = 0; i<input.length(); i++) {
		  for (int j = 0; j<function(i); j++) {
			  ret += (char)(input.charAt(i)-1);
		  }
	  }
	  return ret;
  }
  public static int function(int input) {
	  return Math.abs((int)(3 + 2.3*Math.sin(input)+0.8*Math.tan(2.3*input)+1));
  }
 public static String upR(String input) {
	  String ret = "";
	  int counter = 0;
	  for (int i = 0; i<input.length();i++) {
		  int num = function(counter);
		  ret+=(char)(input.charAt(i)+1);
		  i = (i+num-1);
		  counter++;
	  }
    return ret;
    }
```
  
If we create a string `test` that is equal to the encrypted password, and we run `upR(youR(giveR(gonnaR(neverR(test)))))`, we will get `cctf{tttps://tinyurl.com/qtd2ref}`. Note the comment at the top of the code to turn `t` to `h` (it should be obvious why). The character that we change from `t` to `h` doesn't actually affect the code for some reason, and any value of that character in that code will result in a correct password. However, for obvious reasons, the only flag accepted has an h.
Flag: `cctf{https://tinyurl.com/qtd2ref}`



<br> <br>

**Note**: Upon further examination, the issue where a character did not matter was due to a bug in the function method (bad naming sorry). The method is a mathematical function that determines how many times to repeat a certain character, so it should be greater than 0. The code was `return Math.abs((int)(3 + 2.3*Math.sin(input)+0.8*Math.tan(2.3*input)+1));`, but the +1 should have been placed outside of the absolute value: `return Math.abs((int)(3 + 2.3*Math.sin(input)+0.8*Math.tan(2.3*input)))+1;`. This would've changed the encrypted text, but would've removed the need to change a character after solving.
<br><br><br><br><br><br><br><br><br><br>



<sup>smile :)</sup>
