# Karauke
### An online companion for ukulele players with karaoke lyrics and dynamic chord tabs

![logo](https://raw.githubusercontent.com/ermarasigan/capstone-proj2/master/img/background/ukulele.png)

### Summary of Actions Allowed
The table below lists the allowed actions per type of user

| Role          | Action            | Allowed? |
| ------------- |-------------------|:--------:|
| Visitor       | Play Song         |   No     |
|               | Create Song       |   No     |
|               | Update Song       |   No     |
|               | Delete Song       |   No     |
|               | Update Password   |   No     |
|               | Delete Account    |   No     |
|               | Add Song to Picks |   No     |
|               | Search songs      |   Yes    |
|               | Sign up           |   Yes    |
| Regular       | Play Song         |   Yes    |
|               | Create Song       |   No     |
|               | Update Song       |   No     |
|               | Delete Song       |   No     |
|               | Update Password   |   Yes    |
|               | Delete Account    |   Yes    |
|               | Add Song to Picks |   Yes    |
|               | Search songs      |   Yes    |
| Admin         | Play Song         |   Yes    |
|               | Create Song       |   Yes    |
|               | Update Song       |   Yes    |
|               | Delete Song       |   Yes    |
|               | Update Password   |   Yes    |
|               | Delete Account    |   Yes    |
|               | Add Song to Picks |   Yes    |
|               | Search songs      |   Yes    |

Visitors to the website (users not logged in)
will be able to search songs and sign up

Upon signing up, a user will be assigned a regular role
and will be able to search songs (in the search bar)
play songs (by clicking the Play button), 
add songs to Picks (adding to favorites by clicking the Star button),
update password and delete own account.

The admin user, in addition to the capabilities of a regular role
will be able to add, update and delete songs in the database.
(A delete button appears beside the Play button for the Admin
and songs can be added/updated thru the Update Songs button in the header)

Song Title/artist/year are saved in mysql tables to enable searching
and to preserve data integrity for multiple users

Song Chords and lyrics are saved in json files for faster response times
and because it is ready to be used with ajax
