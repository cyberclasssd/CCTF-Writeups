public class Main
{

  public static void main(String[] args) {
      String password = "aavhyp1x1t]e2pp_]e/x1]w2s]sr{";

      System.out.println(undo(password));
  }
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
}
