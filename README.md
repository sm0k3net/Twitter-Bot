# Twitter-Bot
Bot for twitter to search for specific words or hashtags
Works with regular expressions, twitter API, PHP, cURL, sendmail and MySQL

<pre>
<b>To install bot need to do the following steps:</b>
1. Import into MySQL database sql script
2. Configre DB connection file in 'includes/conn.php' with your credentials
3. In 'includes/parse.php' configure your regular expression for $pattern_1 or $pattern_2 variables
4. Enter your twitter api credentials in 'includes/parse.php'
5. Update 'email' parameter in bot settings and in file 'includes/parse.php' on line 70

<b>Requirements:</b>
* Twitter API keys
* MySQL
* PHP, PHP cURL
* sendmail
* cron (need to add 'includes/parse.php' into cron, time is optional on your choise)
</pre>
