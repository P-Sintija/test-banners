## Project description 
<p>A test site where you can upload banners, count clicks, when they have been clicked on, and views when they were viewed.</p>  
<p> On the front page (/) you can see the possible banner positions and open them on the site. More banners can be placed in one position. The top banner is a slider, the rest are static and only change if the page is reloaded.</p>
<p> On the upload page (/upload) you can upload banner images, add their corresponding URLs in the site, choose the browsers window where to open it, and set the position of the banner on the front page.</p> 
<p> On the statistics pages (/statistics/clicks and /statistics/views) you can see the count of clicks when banners were clicked
on and views when they were viewed.</p>

## Installation instructions
* create a **local database**
* run **composer install**
* rename the **.env.example** file to **.env** and fill in your database information (database name, username, password)
* run php artisan **key:generate**
* run php artisan **migrate**
* run php artisan **storage:link**
* run php artisan **serve**
