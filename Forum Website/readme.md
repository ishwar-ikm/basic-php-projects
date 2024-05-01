# Forum Application Project

This project is a simple forum application built using PHP and MySQL. It provides a platform for users to engage in discussions, share knowledge, and seek help within different categories. The forum allows users to register for accounts, log in, post threads, comment on threads, and browse discussions by category.

## Features:

- **User Authentication**: Users can register for new accounts and log in securely.
- **Category-based Discussions**: Threads are organized into different categories for easy navigation and browsing.
- **Thread Posting**: Authenticated users can create new threads within specific categories.
- **Commenting**: Users can participate in discussions by commenting on existing threads.
- **Responsive Design**: The application is designed to be responsive, ensuring a seamless experience across different devices.

## Technologies Used:

- **PHP**: Backend scripting language used for server-side logic.
- **MySQL**: Relational database management system used for storing forum data.
- **Bootstrap**: Frontend framework used for styling and layout.

## Project Structure:

The project consists of the following main components:


#### 1. index.php

- **Purpose**: Displays the home page of the forum.
- **Usage**: Users can browse different categories and explore threads.

#### 2. navbar.php

- **Purpose**: Navigation bar included in every page for easy navigation.
- **Usage**: Provides links for home, login, register, and logout depending on user's authentication status.

#### 3. index.php

- **Purpose**: Displays a list of categories and their descriptions.
- **Usage**: Users can browse different categories and start discussions.

#### 4. threadlist.php

- **Purpose**: Displays a list of threads within a specific category.
- **Usage**: Users can view and participate in discussions within a chosen category.

#### 5. thread.php

- **Purpose**: Displays a single thread along with comments.
- **Usage**: Users can view thread details and add comments to the thread.

#### 6. login.php

- **Purpose**: Allows users to log in to their accounts.
- **Usage**: Users provide email and password to authenticate.

#### 7. register.php

- **Purpose**: Allows users to register for a new account.
- **Usage**: Users provide email and password to create a new account.

#### 8. dbconnect.php

- **Purpose**: Establishes a connection to the MySQL database.
- **Usage**: Included in every file that requires database interaction.

#### 9. includes folder

- **Purpose**: Contains reusable code snippets like navbar and database connection.
- **Usage**: Included in various pages for code modularity and reusability.

## Database Schema:

- **categories**: Stores information about different forum categories.
- **users**: Stores user account information.
- **comments**: Stores comments posted by users on threads.
- **thread**: Stores information about threads posted within different categories.

## Installation:

To set up the forum application locally, follow these steps:

1. Clone the repository to your local machine.
2. Configure the database connection settings in `dbconnect.php`.
3. Run the sql queries in `table.sql` to create table in the database.
4. Insert few categories in the categories table.
5. Start a local server and navigate to the project directory.

## Usage:

Once the application is set up, users can:

- Register for a new account or log in with existing credentials.
- Browse different categories and explore threads.
- Post new threads within specific categories.
- Comment on existing threads to participate in discussions.
