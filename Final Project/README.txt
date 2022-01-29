Name: Samuel Munoz
Name: Erik Cohen

This document is meant to illstrate how the different javascript functions and php file are connected to one another when some event occurs

LOGIN
- After user enters their log in credentials, form redirects authenticate.php which checks if the database contains the user credentials
- if the credentials are stored, then redirect page to home page with _SESSION variables create to store admin email

FILTER
- User presses the filter button. When a click box is clicked, make_query is called with the values of all databases, frontend, and backend values checked 
- make_query gets all the data for any projects that stored and prints that data in a csv file
- create_card is the callback function for the ajax request. it reads the csv-formatted data, parse into arrays and create HTML elements into insert back into the page

EDIT
- calls AJAX request to get_developers.php to get names of every developer stored in database for select option
- display_edit is the callback function. display_edit adds the inputs fields to the webpage

UPDATE
- when update is clicked, it reads all the data in the different input fields. it will send POST message to update_project.php
- update_project.php will update all the values in Project table for the given project. it will remove any frontend, backend, and developer links from the ProjectFrontEnd, ProjectBackEnd, and ProjectDeveloper tables. Then, it inserts the new links set on the update
- pre_display_view is callback function. we want to display the updated results, but we want to reuse our display_view function to do this. however, that function cannot parse the text block that the php return. thus, this function parses that data and passes the formated data to display_view
- display_view creates the HTML elements to display the data in paragraphs. thus, the user can only view the data
