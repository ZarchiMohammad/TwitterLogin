![GitHub repo size](https://img.shields.io/github/repo-size/ZarchiMohammad/TwitterLogin)
[![GitHub forks](https://img.shields.io/github/forks/ZarchiMohammad/TwitterLogin.svg)](https://github.com/ZarchiMohammad/TwitterLogin)
![GitHub issues](https://img.shields.io/github/issues/ZarchiMohammad/TwitterLogin)
![GitHub contributors](https://img.shields.io/github/contributors/ZarchiMohammad/TwitterLogin)
![Twitter Follow](https://img.shields.io/twitter/follow/ZarchiMohammad?style=social)

# TwitterLogin
Get the twitter user authentication keys

<b>Step 1:</b><br>
- Go to <a href="https://developer.twitter.com/">Twitter Developer Portal</a> and Apply to create app.<br><br>

<b>Step 2:</b><br>
- Go to app setting and enable 3-legged OAuth and set Callback urls like this (if you want to run localhost):<br>

![2021-11-05_0-27-04](https://user-images.githubusercontent.com/11005782/140419615-148a4fe4-520d-4d03-85ad-39e6e335f2b8.jpg) <br><br>


<b>Step 3:</b><br>
- Create login directory and clone abraham/twitteroauth by this command:<br>

 ```bash command-line
composer require abraham/twitteroauth
```
<br><br>

<b>Step 4:</b><br>
- Replace this line in index.php where variables == "*****" with your keys:<br>

 ```bash command-line
const CONSUMER_KEY = '*****';
const CONSUMER_SECRET = '*****';
```
<br><br>
