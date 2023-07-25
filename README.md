This Accessiblity Pulgin was developed in my internship in Indian Institute Of Technology Mumbai . The www.et.iitb.ac.in is the official website of the Educational Technology department at IIT Bombay. This website showcases multiple labs that facilitate research and development of Educational Technology.

The ET IITB website shows the collaborative research and development work by Ph.D. research scholars in emerging technology areas, as well as showcases state-of-the-art infrastructure like Virtual Reality HMDs, 3D printers, physical computing devices and high-end workstations.

# AccessibiltyPlugin
 
Aim - To design a Plugin that adds new functions to THE ET IITB website without altering the host program itself. The aim is to improve the website’s accessibility overall. This helps in making website more customizable by for example -

1- An older, visually challenged person adds extra contrast. Someone who is photosensitive provides a lower contrast.

2- A visually challenged with low visual power makes the font larger. Someone with tunnel vision makes the fonts smaller.

3- Someone with dyslexia uses a diffrent font, while the rest of the users see a normal font.

4- Older people choose the simplified, alternative version with a simple UI. Young people view the standard, modern version


Languages Used - HTML,CSS,JAVA,JAVASCRIPT,PHP



This provides a plugin widget which becomes the go-to option for any accessibility functions to test and implement. It has 6 different features all in one option. It ensures that all of the potential users, including people with disabilities, have a decent user experience and are able to easily access their information and also improving the usability of the site for all users.
Features - 

(1) Zoom In Zoom Out - This provides a Zoom in and Zoom out feature for the website page.

(2) Bigger Mouse Cursor

(3) Invert the current Colour Theme of Website

(4) Change Brightness of the website screen

(5) Greyscale the screen

(6) Undo All Changes -Undo all changes applied on the website page


How to install - (For drupal)
1) Install module using composer or normal way
2) Configure the settings for  AccessibilityPlugin
   /admin/config/user-interface/AccessibilityPlugin
3) Provide permission for the access configuration page
4) Place the Open Accessibility Block into your region.


Use tools like - WordPress Migrate,Migrate Plus,Migrate Tools,CTools to make plugin work in other hosting sites like wordpress.




Langual support - 
In order to use other language add the locale script file right after the open-accessibility.babel libary.

<script src="dist/open-accessibility.min.js"></script>

<script src="dist/locale.min.js"></script>

and use localization property in configuration to set the primary language

localization: ['en']

You may want to extend the locale.json file, or the $.fn.openAccessibility.locale property in order to add your own language!

          
     

