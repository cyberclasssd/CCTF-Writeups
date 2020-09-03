//the first t should be an h
import java.util.*;
import java.lang.Math;
public class Main
{
  public static void main(String[] args) {
      String test = "lYWJlYWJlcLFwcLFwcLFwcLFwcG^m^m^5e\\FwcLFwcLFwcLFsfG|sfLJ|Ono:Oi4xP\\FwcLFwcLFwcGxva6xva6xufm5ufrx7h3h3h3h3crNoaGloPi8uPmJlYWJlYWJxfW1xfy1~c3R~cLFwcLFgYGFgYHIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMnIyMrNycmhmj39/j39/j3<=YWJ";
      System.out.println(upR(youR(giveR(gonnaR(neverR(test))))));
  }
  public static int function(int input) {
	  return Math.abs((int)(3 + 2.3*Math.sin(input)+0.8*Math.tan(2.3*input)+1));
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
  public static String gonnaR(String input) {
	  String ret = "";
	  for (int i = 0; i<input.length(); i++ ) {
		  int pos = Math.floorMod(i-3, input.length());
		  ret+=(char)(input.charAt(pos)-2);
	  }
	  return ret;
  }
  public static String giveR(String input) {
	  return new String(Base64.getDecoder().decode(input));
	
  }
  public static String youR(String input) {
	  String ret = "";
	  for (int i = 0; i<input.length(); i++) {
		  ret+= (char)(input.charAt(i)^3 );
	  }
	  return ret;
	  
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
}
