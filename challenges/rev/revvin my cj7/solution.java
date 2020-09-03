import java.util.Scanner;
public class Main
{
  public static void main(String[] args) {
      String password="c}tn{bLyp11pyLf_07ppt1_f0fkc";
      System.out.println(decrypt(password));
  }
  
  public static String decrypt(String input) {
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
}
