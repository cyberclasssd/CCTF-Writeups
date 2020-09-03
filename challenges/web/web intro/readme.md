# Intro to Web
* **Category:** Web
* **Points:** 150
## Problem
Greetings! (We are given a website.)

## Solution
The website tells us the following:
`What is Web Exploitation?
Web exploitation is the art of finding vulnerabilities in websites and using them to gain access to higher privileges or confidential information. In websites, there are generally three components: HTML, CSS, and JavaScript. HTML is the language used to create website content, CSS is used to style websites, and JS is used to make them interactive!

We can look at these three components by viewing the source code with Ctrl-U or using Developer Tools with Ctrl-Shift-I. This shows us the HTML. The CSS and JS are linked in the HTML. Try finding some information on this website!
`
We're prompted to view source code. We do this and find a comment at the bottom of the HTML that gives us the first part of the flag:
```html
 <!-- hello ;o here is part 1/3 of the flag: cctf{intr0_t -->
```

The website also told us that CSS and Javascript files are linked to the top of the HTML. We find the linked CSS file called `style.css` at the top of the page. When we click the link, we can view the CSS. Scrolling down, we find another comment that gives us the second part of our flag:
```css
/* Welcome to the CSS page! Here you find all of the magic behind making our website look pretty. Part 2/3 of the flag: 0_w3b_exp */
```

Finally, we can check out the Javascript file called `script.js` that's linked to the top of the HTML. Visiting that link, we find another comment which gives us the third part of the flag:
```js
/* JavaScript makes websites interactive! Part 3/3 of the flag: l0itat1on}*/
```


Flag: `cctf{intr0_t0_w3b_expl0itat1on}`
