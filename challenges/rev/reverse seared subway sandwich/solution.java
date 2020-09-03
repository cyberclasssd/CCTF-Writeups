import java.util.Scanner;
public class solution
{
    public static char plain[]  = { 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z' };
    public static char cipher[] = { 'P', 'O', 'N', 'K', 'E', 'Y', 'A', 'B', 'C', 'D', 'F', 'G', 'H', 'I', 'J', 'L', 'M', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Z' };
 
    public static String decrypt(String s)
    {
        char ret[] = new char[(s.length())];
        for (int i = 0; i < s.length(); i++)
        {
            for (int j = 0; j < 27; j++)
            {
                if (j == 26) {
                  ret[i] = s.charAt(i);
                  break;
                }
                if (cipher[j] == s.charAt(i))
                {
                    ret[i] = plain[j];
                    break;
                }
            }
        }
        return (new String(ret));
    }
 
    public static void main(String args[])
    {
        String password = decrypt("NNSY{DT5S_4_RTO5S1STSC0I_NCLB3Q}");
        System.out.println(password);
    }
}
