import java.util.Scanner;
public class Main
{
  public static void main(String[] args) {
      String password = "ba`_ba`_srqpedcbzyxwonmlnmlkmlkjjihg210/xwvuLKJI3210MLKJ|{zy";

      System.out.println(undo(password));
  }
  public static String undo(String input) {
      String ret = "";
      for (int i = 0; i<input.length(); i+=4) {
          ret+=(char)(input.charAt(i)+1);
      }
      return ret;
  }
}
