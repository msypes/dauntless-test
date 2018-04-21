# About this repo

Dauntless Test was written as a assessment exercise for a potential job.

## Here is the original assignment

### PHP Developer test
### Updated Apr 18, 2018 
Have a CRUD functionality for a property name, address, description, image
Add availability for a property. start_date, end_date
User must be able to find accommodations available between dates chosen. Response must include number of days that each property is available, for dates provided.
Ex: Between 15 April - 25 April some properties will be available for 2 days, as availability of those is 10-17th April.
User must be able to book an accommodation for number of days provided. You must handle errors when users are cheeky 😃 


Optional:
* Create basic User Interface with CSS framework of your choice that consumes your API
* Create User Authentication
* Find properties by distance (3 miles) provided from a location (latitude: xxx, longitude: xxx)


Add any tables and models you think are required.

--------------------

## How to use this repository

1. Install with git
1. Create a database, user, and password to your liking
1. Copy the `.env.example` file to `.env` and put your database credentials there.
1. From the root directory run `php artisan migrate`. This will create the necessary tables for you.
1. Do whatever you usually do to serve up the site and point your browser to it.

In order to do anything, you need to login as a user, so the first thing you'll need to do is register one.

I recommend creating multiple users so you can see how things may look for different people.

Once logged in, create one or more properties with booking dates.

As another user do the same.

Each user can see all properties and book available dates.
Users can also modify the properties they have created.

**Enjoy!**

### Additional information
I used Laravel's semi-built-in user authentication system for this exercise, and just extended my Blade templates from the stock ones Laravel generates in the interest of time.

I did not bother to provide the ability to delete properties, and users cannot change/cancel/delete booking dates, purely in the interest of time.

If you would like to see additional code samples, I have more hre on GitHub as well as [BitBucket](https://bitbucket.org/msypes/), where you can look at both repositories and snippets.
