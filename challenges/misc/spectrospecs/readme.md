# Spectrospecs
* **Category:** Misc
* **Points:** 150
## Problem
Luna Lovegood says that using her Spectrospecs, she can see the wrackspurts in your head, and advises that you get rid of them immediately by listening to [one hour of bonk](https://www.youtube.com/watch?v=nQ6JapKK1mQ). You ask to borrow her spectrospecs in an attempt to see the hidden wrackspurts, and conclude that you should listen to this short clip of audio instead. Find the flag?

(We are given a .wav file.)
## Solution
We can analyze the WAV file using [Sonic Visualizer](https://www.sonicvisualiser.org/), which is a tool used for viewing and analyzing the contents of audio files. In this challenge, we will use it to display a spectrogram displaying the different frequencies of the audio. Import the file into Sonic Visualizer, then click on Layer > Add Spectrogram > All channels mixed.

![image](https://user-images.githubusercontent.com/58750937/90165316-52d2fa00-dd4d-11ea-8427-0418ec0ee9fe.png)


This will display the spectrogram for the audio file, which contains the flag! Use the scroll bars to zoom out or stretch the timeline so that you can easily see the flag.


![image](https://user-images.githubusercontent.com/58750937/90165449-83b32f00-dd4d-11ea-85e4-40b368767cfe.png)


Flag: `cctf{a_bunch_of_nargles}`
