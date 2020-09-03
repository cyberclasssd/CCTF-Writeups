# Meinkraft
* **Category:** Web
* **Points:** 250
## Problem
Get ~~punted~~ donked. (We are given a [*very incredibly Much Big helpful*] challenge description as well as a website with [yet another] login box.)
## Solution
After being blinded by the absolutely *glorious* CSS of the webpage, we may try to log in.

Here, we use the username `pigeonsSmell` and the password `password`.

![image](https://user-images.githubusercontent.com/69173442/92047826-fc991b80-ed3a-11ea-81eb-5e47f630de15.png)


Unfortunately, we get an error message saying that the password is already taken by another user.

![image](https://user-images.githubusercontent.com/69173442/92047730-bba10700-ed3a-11ea-81bd-35fa8c800622.png)

Very methodically, we head over to the login page (which you can hopefully see thanks to the very practical CSS) to see if we can log in as `cnffjbeq` since apparently they have the password `password`.

![image](https://user-images.githubusercontent.com/69173442/92048027-85b05280-ed3b-11ea-9407-c2ae5f14dd0d.png)

We are let in!

![image](https://user-images.githubusercontent.com/69173442/92048058-9e206d00-ed3b-11ea-98c6-01108af0ecf6.png)

Woot woot! We now get meinkraft! Since we do not care about the CTF competition, and only care about meinkraft, we happily skip away with our new meinkraft game metaphorically tucked under our arm, excited to try it out and excited by our provincial life with its simple joys.

Fin.

Alternatively, we do care about the CTF. In this case, we will proceed:

The page says that we do not get flag since we are not admin. So, we try to login as admin. We enter username as `admin` and password as `aaa`. This does not seem to work.

![image](https://user-images.githubusercontent.com/69173442/92048690-33703100-ed3d-11ea-98db-b2908a8dbbe1.png)

Let's go back and examine our first registration attempt. We put `pigeonsSmell` as the username and `password` as the password. We got the error that user `cnffjbeq` had taken our password. Aa! !!:

After some staring, we may realize that our password, `password`, is similar to `cnffjbeq`. In fact, it is probably some type of shift. We stare some more and realize that the encryption being used is Rot-13 (Caesar cipher with shift of 13). Rot-13 also happens to be symmetrical, meaning if I Rot-13 `password`, I get `cnffjbeq`, and if I Rot-13 `cnffjbeq`, I get `password` again.

This means that we know every user's password; it is just their username, but encrypted in Rot-13. This means I have the admin password! The string `admin` encrypted in Rot-13 is `nqzva`.

We log in with username `admin` and password `nqzva` and get to this page.

![image](https://user-images.githubusercontent.com/69173442/92049077-3a4b7380-ed3e-11ea-8aa7-7dd22f55615a.png)

There is the flag!

Flag: ```cctf{untrustworthy_poptarts}```
