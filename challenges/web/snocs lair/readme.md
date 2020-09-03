# Snocci's Quaint Lair
* **Category:** Web
* **Points:** 350

## Problem
Snocci has recently redecorated her lair. It is now very quaint. (We are given a website with a login box.)

## Solution
We are given a login box, so we try to login with some random credentials.

![image](https://user-images.githubusercontent.com/69173442/92049634-ce6a0a80-ed3f-11ea-8822-b1127b6b4e45.png)

Unfortunately, we are told to get out.

![image](https://user-images.githubusercontent.com/69173442/92055213-21918c80-ed43-11ea-96cf-fedda2375412.png)

After checking the source code, being confused by the 100,000,000^99999999 number, and maybe even trying to brute force our way in (rude), we discover that there is a thing that exists called SQL injections.

We apply the basic SQL injection, `' or 1=1--` for the username, leaving the password empty (since we may assume that username and password are in the same query, and `--` should comment out everything after itself, meaning if username is first and password follows, the password part has already been commented out so there is not need for injection).

Unfortunately, this does not work, but we get a helpful error message.

![image](https://user-images.githubusercontent.com/69173442/92053473-8b5d6680-ed42-11ea-8d7e-5e3b846ae8e6.png)

After reading up on some SQL syntax, we find that if a database is using MySQL instead of SQL, the syntax varies a little. To comment in MySQL, there must be a trailing whitespace after the two dashes: `-- `.

With this in mind, we inject `or 1=1-- ` for the username. We get a logged in page which displays a flag!

![image](https://user-images.githubusercontent.com/69173442/92055396-2e15e500-ed43-11ea-9ce1-d63022a5e7ae.png)


Alternatively, something like `' or 1=1--` for the username and `'` for the password also works. The only thing that matters is that the quotes in the query match. This gives the solution that injection to both user and password at the SAME time using `' or 1=1--` will work, since this injection begins with a quote.

Additionally, since `#` doesn't require trailing whitespace, injecting `' or 1=1#` into the username field also works.

Flag: `cctf{m4ngo_p0psicles_jus7_w0nt_do!}`
