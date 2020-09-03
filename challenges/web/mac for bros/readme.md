# mac for bros
* **Category:** Web
* **Points:** 200
## Problem
Head over to Chinchellin's Wigwam to be served some quality mac n cheese. (We are given a website with a login box.)
## Solution
If we enter a random password into the login box, we get an alert.
<br> <br>
![image](https://user-images.githubusercontent.com/69173442/92046000-c9ed2400-ed36-11ea-999b-aa78576a0c0c.png)

We can view the page source (Ctrl+U). We see a function called Verify() that checks if our password is correct.

```javascript
function Verify(){
        var checkpass = document.getElementById("pass").value;
        if (encodeURIComponent(checkpass) == "cctf%7Burlenc0d%25nGye3h%40w%7D") {
          alert("ya bro that is the flag");
        }
        else {
          alert("na bro no mac n cheese 4 u my man");
        }
      }
```
It seems that whatever password we enter will get URL encoded by `encodeURIComponent(checkpass)`. If the result of the URL encoding is equal to `cctf%7Burlenc0d%25nGye3h%40w%7D` we get the alert "ya bro that is the flag." Otherwise (`else`), we get the alert "na bro no mac n cheese 4 u my man."

If we want the flag, we simply have to decode the given URL encoded string, `cctf%7Burlenc0d%25nGye3h%40w%7D`. (Since the flag is synonymous to the password for logging in, if we enter the decoded string into the login box, the `encodeURIComponent(checkpass)` will encode it to be the same as `cctf%7Burlenc0d%25nGye3h%40w%7D` which would log us in.)

We can use an online URL decoder.

Flag: `cctf{urlenc0d%nGye3h@w}`
