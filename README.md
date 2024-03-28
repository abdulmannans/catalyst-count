
# Catalyst-Count

Welcome to the Catalyst-Count project! Below, you'll find all the necessary information to get started, including an overview of the project's pages and some notes about the development experience.

## Prequistes 

Make sure you have the following prerequisites before getting started:
``` 
Laravel: 9^
PHP: 8^ 

```

## Getting Started
After cloning the project, run the following commands in your terminal:

```
composer install
php artisan migrate

```

## Pages Overview
The overview of the developed pages.

### 1. Home 
- The home page features a list of companies with an accompanying form placed above the list. If the list is empty, the form is not displayed, and a "No Data Found" message is shown. Users can query based on unique reference and company name. Filtering is implemented using the "kblais/query-filter" package (version ^3.1), inspired by one of Jeffery Way's videos. Total record count is displayed before and after filtering, and the data is presented in paginated form. Indexing is applied to filtering columns to enhance performance.

### 2. User
- The user page displays a paginated list of users along with the total number of users.


### 3. Upload
- This page handles the upload functionality, particularly for 1GB files. Uploading such large files via form submission can be resource-intensive, so the approach used involves chunking data at the client side. A real-time progress bar is displayed during the upload process. The "maatwebsite/excel" package (version ^3.1) is used for importing data into the table. The updateOrCreate method is used to avoid record duplication, with the first column serving as a unique reference. Special considerations are made for handling inconsistencies in CSV data files, especially after reaching 100,000 records there are few problem with the data.

##
It was a wonderful experience working on this project, and I truly enjoyed the task. If you have any questions or encounter issues, feel free to reach out. Happy coding!

