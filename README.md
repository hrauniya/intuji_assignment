### API **documentation**
### Postman Collection
    This Postman Collection demonstrates API usage in full detail
    https://www.postman.com/harsharrr/intuji-assessment/collection/b9hz32b/intuji?action=share&creator=22704649
### 1. **User Registration and Login**
- Implement a basic user registration endpoint that stores a username and hashed password.
      Endpoint implemented in /api/users/register
      Allows users to register with their name, email, password, username, role
      Hashes the password in database
      Validates necessary fields(password greater than 8 characters etc)
      
- Create a login endpoint to validate user credentials and return a token.
      Endpoint implemented in /api/users/login
      Allows user to login with username and password
      Checks if the credentials are correct, and if so generates a token to be used for future requests(authentication purposes)

### 2. **Blog Post Management API**

  The following endpoints are implemented for these set of APIs.
  Only authenticated users have access to these and the request should be sent with the bearer token generated during login.
- `POST /api/posts` (Allows users to create posts)
- `GET /api/posts`    (Gets all posts in the platform using Eloquent)
- `GET /api/posts/:id` (Gets a specific post with an ID)


### 4. **Comment Management API**
The following endpoints are implemented for these set of APIs.
  Only authenticated users have access to these and the request should be sent with the bearer token generated during login.
- `POST /api/posts/:postId/comments (Allows user to create comments for a specific post). 
- `GET /api/posts/:postId/comments (Allows user to retrieve comments for a specific post--> Uses relationship between Post and Comment models to retrieve comments for a post


### 5. **Image Upload API**
The following endpoints are implemented for these set of APIs.
Only authenticated users have access to these and the request should be sent with the bearer token generated during login.
- `POST /api/posts/:postId/images( Allows users to upload images an associate to a blog post). A new field called 'image_path' is added to Posts table. The API uploads the image and stores the path to the image in the record(not actual image files).


### 7. **Basic User Profile Management**
The following endpoints are implemented for these set of APIs.
- `GET /api/users/profile`(Checks if the current user matches the requested users information. If this passes the endpoint allows to display a particular user's information)
- `PATCH /api/users/profile`((Checks if the current user matches the requested users information. If this passes the endpoint allows user's to update their information)
