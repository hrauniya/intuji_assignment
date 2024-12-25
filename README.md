> ⚠️ **Warning: AI Usage Policy**  
> Using any AI tools or assistance during this coding test is strictly prohibited.  
> 🚫 **Violation of this policy will result in automatic disqualification.**  
> **Focus on demonstrating your skills and problem-solving abilities.**

# Task List for Backend Developer

As a Backend Developer, you will be responsible for designing, implementing, and maintaining the backend infrastructure of our blogging platform. The following tasks outline the key functionalities and features you need to develop. Each task includes detailed requirements to ensure clarity and comprehensive coverage.

---

## Tech Stack

The task should be implemented using one of the following technologies:
- **Backend Frameworks/Languages:** PHP 8.3+ or Node.js 22.11+
  - Recommended frameworks: Laravel 11.x (PHP) or NestJS 10.x (Node.js).
- **Database:** PostgreSQL 17.2.x or MySQL 8.4.x.
- **Containerization:** Docker 27.x for environment consistency and deployment.

### Preferred Approach:
Developers who choose to implement the tasks using **Core PHP** (without a framework) and **PostgreSQL** will receive special consideration, as this demonstrates deeper understanding and adaptability. However, you are free to select any of the listed technologies based on your expertise and comfort level. Ensure adherence to best practices for the chosen stack.

---

### 1. **Initialize Super Admin User**
- Create a script or migration to seed a default super admin user with credentials.
- Use a basic password hashing method (e.g., bcrypt).

**Acceptance Criteria:**
- The super admin user is seeded with pre-defined credentials.
- Password is securely hashed.

---

### 2. **User Registration and Login**
- Implement a basic user registration endpoint that stores a username and hashed password.
- Create a login endpoint to validate user credentials and return a token.

**Possible Routes:**
- `POST /api/users/register`
- `POST /api/users/login`

**Stretch Goal:** Include input validation for username and password.

**Acceptance Criteria:**
- Users can register and log in successfully.
- Tokens are generated upon login.

---

### 3. **Blog Post Management API**
- Build endpoints to create and read blog posts.
- Store only essential data: title, content, and author.

**Possible Routes:**
- `POST /api/posts`
- `GET /api/posts`
- `GET /api/posts/:id`

**Stretch Goal:** Add update and delete functionality for posts.

**Acceptance Criteria:**
- Authenticated users can create and view blog posts.

---

### 4. **Comment Management API**
- Implement an endpoint to add comments to blog posts.
- Add functionality to view all comments for a specific blog post.

**Possible Routes:**
- `POST /api/posts/:postId/comments`
- `GET /api/posts/:postId/comments`

**Acceptance Criteria:**
- Users can add comments and view all comments for a blog post.

---

### 5. **Image Upload API**
- Create an endpoint for a single image upload linked to a blog post.
- Validate file types (e.g., allow only JPEG or PNG).

**Possible Routes:**
- `POST /api/posts/:postId/images`

**Stretch Goal:** Add an endpoint to delete images.

**Acceptance Criteria:**
- Users can upload and associate an image with a blog post.

---

### 6. **Authentication Middleware**
- Implement a middleware to secure API routes using a simple token check.

**Stretch Goal:** Include role-based access control.

**Acceptance Criteria:**
- Protected routes are accessible only to authenticated users.

---

### 7. **Basic User Profile Management**
- Allow users to view their profile information (e.g., username, email).
- Implement an endpoint to update their profile information.

**Possible Routes:**
- `GET /api/users/profile`
- `PATCH /api/users/profile`

**Acceptance Criteria:**
- Users can view and update their profile information.

---

### 8. **Basic Error Handling**
- Implement basic error handling for API endpoints to return appropriate HTTP status codes and messages.

**Acceptance Criteria:**
- Users receive meaningful error messages for invalid requests.

---

### General:
- Provide clear commit messages.
- Write basic tests for the endpoints you develop.
- Document API usage examples in a simple README file.
- Follow coding best practices and maintain code readability.

### Submission Guidelines

After completing the assigned task, please follow these steps to submit your work for review:

1. Ensure your GitHub repository is up-to-date and reflects the completed task.
2. Go to the submission form: **[Task Submission Form](https://docs.google.com/forms/d/e/1FAIpQLSe0CE-mtbyHxWPVBG_vo8Ot-M3n9wEN_3vVFjdR9MEOJx42jA/viewform?usp=sharing)**.
3. Fill out the form with the following details:
   - Your full name and email address.
   - The GitHub repository URL where your task is completed.
   - Any additional comments, challenges faced, or suggestions (if applicable).

Submissions will be reviewed promptly. Please ensure all required fields in the form are filled out accurately.

Thank you for your effort and dedication!
